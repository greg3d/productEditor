<?php

/**
 * The home manager controller for productEditor.
 *
 */
class productEditorHomeManagerController extends modExtraManagerController
{
    /** @var productEditor $productEditor */
    public $productEditor;


    /**
     *
     */
    public function initialize()
    {
        $this->productEditor = $this->modx->getService('productEditor', 'productEditor', MODX_CORE_PATH . 'components/producteditor/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['producteditor:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('producteditor');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->productEditor->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/producteditor.js');
        $this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        productEditor.config = ' . json_encode($this->productEditor->config) . ';
        productEditor.config.connector_url = "' . $this->productEditor->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "producteditor-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="producteditor-panel-home-div"></div>';

        return '';
    }
}