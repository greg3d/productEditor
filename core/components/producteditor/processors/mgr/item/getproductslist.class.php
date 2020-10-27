<?php

/**
 * ProductGetListProcessor
 *
 * @package producteditor
 * @subpackage processors
 */

//error_reporting(E_ALL);
//ini_set('display_errors',1);

class ProductGetListProcessor extends modObjectGetListProcessor {

    public function process() {

        $modelpath = $this->modx->getOption('core_path') . 'components/shop/model/';
        $this->modx->addPackage( 'shop', $modelpath );
        $classKey = 'ShopContent';
        
        $scriptProperties = $this->getProperties();
        //$filters = $this->modx->getOption( 'filters', $scriptProperties, array() );
        $page = $this->modx->getOption( 'page', $scriptProperties, 1 );
        $limit = $this->modx->getOption( 'count', $scriptProperties, 100 );
        $offset = $this->modx->getOption( 'offset', $scriptProperties, false );
        //$sorting = $this->modx->getOption( 'sorting', $scriptProperties, array( 'id' => 'desc' ) );
        //$date_format = $this->modx->getOption( 'date_format', $scriptProperties, 'd.m.Y H:i:s' );
        
        //$table_fields = array_keys( $this->modx->getFields($classKey) );
        
        //sorting
        //$opt_sortby = '`id`';
        //$opt_sortdir = 'desc';
        
        $total = $this->modx->getCount($classKey); // class
        
        if( $offset === false ){
            $offset = $limit * ( $page - 1 );
        }
        
        $list = array();
        $query = $this->modx->newQuery( $classKey ); // class
        $query->sortby( 'id', 'ASC' );
        $query->limit( $limit, $offset );
        
        $products = $this->modx->getIterator( $classKey, $query );
        
        if( $products ){
            foreach( $products as $product ){
                $product_data = $product->toArray();
                array_push( $list, $product_data );
                array_push( $productIds, $product->id );  
            }            
        }
        
        $output = array(
            'success' => true,
            'message' => 'success',
            'object' => $list,
            'total' => $total,
            'productIds' => $productIds
        );
        
        return $output;
    }  
}
return 'ProductGetListProcessor';
