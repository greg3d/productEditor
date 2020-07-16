<?php

/**
 * The home manager controller for productEditor.
 *
 */

error_reporting(E_ALL);
ini_set('display_errors',1);

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
        //$this->addCss($this->productEditor->config['cssUrl'] . 'mgr/main.css');
        //$this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/producteditor.js');
        //$this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/misc/utils.js');
        //$this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/misc/combo.js');
        //$this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        //$this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        //$this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        //$this->addJavascript($this->productEditor->config['jsUrl'] . 'mgr/sections/home.js');

        /*
        <script src="runtime.js" defer></script>
        <script src="polyfills.js" defer></script>
        <script src="styles.js" defer></script>
        <script src="vendor.js" defer></script>
        <script src="main.js" defer></script>
        */

        $this->addJavascript($this->productEditor->config['jsUrl'] . 'runtime.js');
        $this->addJavascript($this->productEditor->config['jsUrl'] . 'polyfills.js');
        $this->addJavascript($this->productEditor->config['jsUrl'] . 'styles.js');
        $this->addJavascript($this->productEditor->config['jsUrl'] . 'vendor.js');
        $this->addJavascript($this->productEditor->config['jsUrl'] . 'main.js');

        $this->addHtml('<script type="text/javascript">
        productEditor.config = ' . json_encode($this->productEditor->config) . ';
        productEditor.config.connector_url = "' . $this->productEditor->config['connectorUrl'] . '";
        
        //Ext.onReady(function() {MODx.load({ xtype: "producteditor-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="producteditor-panel-home-div">ddd</div>';

        return '';
    }
}