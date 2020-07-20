<?php

/**
 * productEditorItemGetListProcessor
 *
 * @package producteditor
 * @subpackage processors
 */

//error_reporting(E_ALL);
//ini_set('display_errors',1);

class productEditorItemGetListProcessor extends modObjectGetListProcessor {

    public function process() {
        
        $modelpath = $this->modx->getOption('core_path') . 'components/producteditor/model/';
        $this->modx->addPackage( 'producteditor', $modelpath );
        
        $scriptProperties = $this->getProperties();
        $filters = $this->modx->getOption( 'filters', $scriptProperties, array() );
        $page = $this->modx->getOption( 'page', $scriptProperties, 1 );
        $limit = $this->modx->getOption( 'count', $scriptProperties, 100 );
        $offset = $this->modx->getOption( 'offset', $scriptProperties, false );
        $sorting = $this->modx->getOption( 'sorting', $scriptProperties, array( 'id' => 'desc' ) );
        $date_format = $this->modx->getOption( 'date_format', $scriptProperties, 'd.m.Y H:i:s' );
        
        $table_fields = array_keys( $this->modx->getFields('Product') );
        
        //sorting
        //$opt_sortby = '`id`';
        //$opt_sortdir = 'desc';
        
        $total = $this->modx->getCount('Product');
        
        if( $offset === false ){
            $offset = $limit * ( $page - 1 );
        }
        

        $list = array();
        $query = $this->modx->newQuery( 'Product' );
        $query->sortby( 'id', 'ASC' );
        $query->limit( $limit, $offset );
        //$query->select( '(SELECT COUNT(*) FROM ' . $this->modx->getTableName('shop_content') . ' WHERE ' . $this->modx->getTableName('shop_content') . '.`order_id` = `shk_order`.`id`) AS `count_total`' );
        
        $products = $this->modx->getIterator( 'Product', $query );
        
        if( $products ){
            
            foreach( $products as $product ){
                
                $temp = $product->toArray();

                $maskarray = array(
                    'id' => 0,
                    'pagetitle' => '',
                    'longtitle' => '',
                    'introtext' => '',
                    'type' => '',
                    'alias' => '',
                    'deleted' => '',
                    'published' => '',
                    'template' => '',
                    'menuindex' => '',
                    'hidemenu' => '',
                    'image' => '',
                    'inventory' => '',
                    'weight' => '',
                    'articul' => '',
                    'tags' => '',
                    'price' => '',
                    'price2' => '',
                    'sort_order_custom' => ''
                );

                $product_data = array_intersect_key($temp, $maskarray);

                //$product_data = $product->toArray();
                //$product_data['date'] = date( $date_format, strtotime( $order_data['date'] ) );
                //$product_data['sentdate'] = date( $date_format, strtotime( $order_data['sentdate'] ) );

                
                array_push( $list, $product_data );
                array_push( $productIds, $product->id );
                
            }
            
        }
        
        $output = array(
            'success' => true,
            'message' => '',
            'object' => $list,
            'total' => $total
        );
        
        return $output;
    }
    
    
}
return 'productEditorItemGetListProcessor';
