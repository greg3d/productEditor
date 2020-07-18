<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/productEditor/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/producteditor')) {
            $cache->deleteTree(
                $dev . 'assets/components/producteditor/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/producteditor/', $dev . 'assets/components/producteditor');
        }
        if (!is_link($dev . 'core/components/producteditor')) {
            $cache->deleteTree(
                $dev . 'core/components/producteditor/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/producteditor/', $dev . 'core/components/producteditor');
        }
    }
}

return true;