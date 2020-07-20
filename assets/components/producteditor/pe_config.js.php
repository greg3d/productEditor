<?php

/**
 * @package productEditor
 * @var modX $modx
 */

ini_set('display_errors',1);
error_reporting(E_ALL);

header("Content-type: application/javascript");

define('MODX_REQP',false);
define('MODX_CONNECTOR_INCLUDED',true);

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';



$modx->getService('error','error.modError');

$pe_config = array();

$pe_config['auth_token'] = $modx->user->getUserToken($modx->context->get('key'));
$pe_config['assets_url'] = $modx->getOption('assets_url');
$pe_config['manager_url'] = $modx->getOption('manager_url');
$pe_config['manager_language'] = $modx->getOption('manager_language');

//lexicon
$modx->getService('lexicon','modLexicon');
$modx->lexicon->load($pe_config['manager_language'].':shopkeeper3:manager');
//$pe_config['lang'] = $modx->lexicon->fetch('shk3.');

foreach($modx->config as $key => $val){
    
    if(substr($key, 0, 4) == 'pe1'){
        $pe_config[$key] = $val;
    }
    
}

//settings
/*$response = $modx->runProcessor('getsettings',
    array(),
    array('processors_path' => $modx->getOption( 'core_path' ) . 'components/producteditor/processors/mgr/')
);

if ($response->isError()) {
    echo $response->getMessage();
}

if($result = $response->getResponse()){
    $settings = $result['object'];    
    $pe_config['settings'] = $settings;
} */

echo "
/* productEditor global config */
var pe_config = ".(defined('JSON_PRETTY_PRINT') ? json_encode($pe_config,JSON_PRETTY_PRINT) : json_encode($pe_config)).";
";