<?php

class ProductUpdateProcessor extends modObjectUpdateProcessor
{
    public $objectType = 'ShopContent';
    public $classKey = 'ShopContent';
    public $languageTopics = ['producteditor'];
    //public $permission = 'save';

    /**
     * We doing special check of permission
     * because of our objects is not an instances of modAccessibleObject
     *
     * @return bool|string
     */
    public function beforeSave()
    {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }


    public function process() {

        $scriptProperties = $this->getProperties();
        $success = false;
        $messageOut = array();


        $id = $this->modx->getOption('id', $scriptProperties, '');
        $key = $this->modx->getOption('key', $scriptProperties, '');
        $value = $this->modx->getOption('value', $scriptProperties, '');
        
        $modelpath = $this->modx->getOption('core_path') . 'components/shop/model/';
        $this->modx->addPackage( 'shop', $modelpath );
        
        $product = $this->modx->getObject('ShopContent', array('id' => $id));
        $product->set($key, $value);

        if (!$product->save()) {
            // @var modValidator $validator
            $validator = $product->getValidator();
            if ($validator->hasMessages()) {
                foreach ($validator->getMessages() as $message) {
                    array_push($messageOut, $message);
                    $success = false;
                }
            }
        } else {
            $success = true;
            $messageOut = "Update success! id = " . $product->get('id');
        }

        $output = array(
            'success' => $success,
            'message' => $messageOut
        );
        
        return $output;
    }
   
}

return 'ProductUpdateProcessor';
