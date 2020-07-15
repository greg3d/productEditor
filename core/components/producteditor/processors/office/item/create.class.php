<?php

class productEditorOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'productEditorItem';
    public $classKey = 'productEditorItem';
    public $languageTopics = ['producteditor'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('producteditor_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('producteditor_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'productEditorOfficeItemCreateProcessor';