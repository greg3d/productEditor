<?php

/**
 * productEditor Connector
 *
 * @package producteditor
 */

require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$corePath = $modx->getOption('core_path').'components/producteditor/';

$request = $modx->request;
$request->handleRequest(array(
    'processors_path' => $modx->getOption( 'core_path' ) . 'components/producteditor/processors/',
    'location' => ''
));

// if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
//     /** @noinspection PhpIncludeInspection */
//     require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
// } else {
//     require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
// }
// /** @noinspection PhpIncludeInspection */
// require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
// /** @noinspection PhpIncludeInspection */
// require_once MODX_CONNECTORS_PATH . 'index.php';
// /** @var productEditor $productEditor */
// $productEditor = $modx->getService('productEditor', 'productEditor', MODX_CORE_PATH . 'components/producteditor/model/');
// $modx->lexicon->load('producteditor:default');

// // handle request
// $corePath = $modx->getOption('producteditor_core_path', null, $modx->getOption('core_path') . 'components/producteditor/');
// $path = $modx->getOption('processorsPath', $productEditor->config, $corePath . 'processors/');
// $modx->getRequest();

// /** @var modConnectorRequest $request */
// $request = $modx->request;
// $request->handleRequest([
//     'processors_path' => $path,
//     'location' => '',
// ]);