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
        $key = $this->modx->getOption('key', $scriptProperties, '');
        $value = 
        $success = false;



        $output = array(
            'success' => true,
            'message' => 'success!',
            'object' => $this->modx->getOption('key', $scriptProperties, '')
        );
        
        return $output;
    }
   
}

return 'ProductUpdateProcessor';
