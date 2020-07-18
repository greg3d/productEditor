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
        $this->productEditor->config['jsUrl'] = '/productEditor/assets/components/producteditor/js/';
        $this->productEditor->config['cssUrl'] = '/productEditor/assets/components/producteditor/css/';
        $this->productEditor->config['viewsUrl'] = MODX_BASE_PATH . '/productEditor/assets/components/producteditor/views/';
        parent::initialize();
        echo "<pre>";
        print_r($this->productEditor->config);
        echo "</pre>";
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
       // $this->addHtml( '<script src="' . $this->modx->config['assets_url'] . 'components/tag_manager2/tm_config.js.php"  type="text/javascript"></script>' );
        $this->addJavascript($this->productEditor->config['jsUrl'] . 'libs.js');
        $this->addLastJavascript($this->productEditor->config['jsUrl'] . 'templates.js');
        $this->addLastJavascript($this->productEditor->config['jsUrl'] . 'app.js');
        

        //print_r($this->productEditor->config);
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        //$this->content .= '<div id="producteditor-panel-home-div">ddd</div>';

        return $this->productEditor->config['viewsUrl'] . 'index.html';
    }
}