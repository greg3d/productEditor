<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

if (!defined('MODX_API_MODE')) {
    define('MODX_API_MODE', false);
}

include('/var/www/biogumus/www/config.core.php');
if (!defined('MODX_CORE_PATH')) define('MODX_CORE_PATH', dirname(dirname(dirname(dirname(__FILE__)))) . '/core/');

include_once (MODX_CORE_PATH . "model/modx/modx.class.php");
$modx = new modX();
$modx->initialize('mgr');
$modx->lexicon->load('core:default');

if( !$modx->user->isAuthenticated('mgr') ){
    echo $modx->lexicon('permission_denied');
    exit;
}

$modx->getService('error','error.modError');
$modx->getService('smarty','smarty.modSmarty');

$templates = array( 'home' );

//$modx->smarty->assign('var', $results);
$modx->smarty->caching = false;
$assets = '/assets/';
$modx->smarty->template_dir = '/var/www/biogumus/www/assets/components/producteditor/views/';
$template_name = isset($_GET['a']) && in_array( $_GET['a'], $templates ) ? $_GET['a'] : 'index';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>productEditor</title>
   
    
    <!-- tagManager config -->
    <script src="<?php echo $assets; ?>components/producteditor/pe_config.js.php?wctx=mgr"></script>
    <script src="<?php echo $assets; ?>components/producteditor/js/libs.js"></script>
    <script src="<?php echo $assets; ?>components/producteditor/js/templates.js"></script>
    <script src="<?php echo $assets; ?>components/producteditor/js/app.js"></script> 
    
</head>
<body>
    
    <div id="modx-content">
        
    <?php
        print_r($modx->smarty->template_dir);

        $modx->smarty->display( 'index.html' );
    
    ?>
    
    </div>
    
</body>
</html>