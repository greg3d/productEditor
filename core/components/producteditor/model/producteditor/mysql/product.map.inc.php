<?php
$xpdo_meta_map['Product']= array (
  'package' => 'producteditor',
  'version' => '1.1',
  'table' => 'shop_content',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'resource_id' => NULL,
    'pagetitle' => '',
    'longtitle' => '',
    'alias' => '',
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'introtext' => NULL,
    'content' => NULL,
    'template' => 0,
    'menuindex' => 0,
    'editedon' => 0,
    'editedby' => 0,
    'createdon' => 0,
    'createdby' => 0,
    'publishedon' => 0,
    'unpublishedon' => 0,
    'published' => 0,
    'publishedby' => 0,
    'hidemenu' => 0,
    'price' => 0.0,
    'price_action' => NULL,
    'image' => '',
    'inventory' => '',
    'articul' => '',
    'weight' => 0,
    'rating' => 0,
    'tags' => '',
    'price2' => 0.0,
    'price3' => 0.0,
    'price4' => 0.0,
    'type' => '',
    'delivery' => NULL,
    'instruction' => NULL,
    'sort_order_custom' => NULL,
  ),
  'fieldMeta' => 
  array (
    'resource_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'index',
    ),
    'pagetitle' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
      'index' => 'index',
    ),
    'longtitle' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
      'index' => 'index',
    ),
    'alias' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
      'index' => 'index',
    ),
    'deleted' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'deletedon' => 
    array (
      'dbtype' => 'int',
      'precision' => '20',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'deletedby' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'introtext' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
      'index' => 'index',
    ),
    'content' => 
    array (
      'dbtype' => 'mediumtext',
      'phptype' => 'string',
      'null' => true,
      'index' => 'index',
    ),
    'template' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'menuindex' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'editedon' => 
    array (
      'dbtype' => 'int',
      'precision' => '20',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'editedby' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'createdon' => 
    array (
      'dbtype' => 'int',
      'precision' => '20',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'createdby' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'publishedon' => 
    array (
      'dbtype' => 'int',
      'precision' => '20',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'unpublishedon' => 
    array (
      'dbtype' => 'int',
      'precision' => '20',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'published' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'index',
    ),
    'publishedby' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'hidemenu' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'index',
    ),
    'price' => 
    array (
      'dbtype' => 'float',
      'phptype' => 'float',
      'null' => true,
      'default' => 0.0,
    ),
    'price_action' => 
    array (
      'dbtype' => 'float',
      'phptype' => 'float',
      'null' => false,
    ),
    'image' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'inventory' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'articul' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'weight' => 
    array (
      'dbtype' => 'int',
      'precision' => '255',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'rating' => 
    array (
      'dbtype' => 'int',
      'precision' => '255',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'tags' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'price2' => 
    array (
      'dbtype' => 'float',
      'phptype' => 'float',
      'null' => true,
      'default' => 0.0,
    ),
    'price3' => 
    array (
      'dbtype' => 'float',
      'phptype' => 'float',
      'null' => true,
      'default' => 0.0,
    ),
    'price4' => 
    array (
      'dbtype' => 'float',
      'phptype' => 'float',
      'null' => true,
      'default' => 0.0,
    ),
    'type' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '128',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'delivery' => 
    array (
      'dbtype' => 'mediumtext',
      'phptype' => 'string',
      'null' => true,
    ),
    'instruction' => 
    array (
      'dbtype' => 'mediumtext',
      'phptype' => 'string',
      'null' => true,
      'index' => 'index',
    ),
    'sort_order_custom' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
    ),
  ),
  'indexes' => 
  array (
    'resource_id' => 
    array (
      'alias' => 'resource_id',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'resource_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'alias' => 
    array (
      'alias' => 'alias',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'alias' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
    'published' => 
    array (
      'alias' => 'published',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'published' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'hidemenu' => 
    array (
      'alias' => 'hidemenu',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'hidemenu' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'shop_content_ft_idx' => 
    array (
      'alias' => 'shop_content_ft_idx',
      'primary' => false,
      'unique' => false,
      'type' => 'FULLTEXT',
      'columns' => 
      array (
        'pagetitle' => 
        array (
          'length' => '',
          'collation' => '',
          'null' => false,
        ),
        'longtitle' => 
        array (
          'length' => '',
          'collation' => '',
          'null' => false,
        ),
        'introtext' => 
        array (
          'length' => '',
          'collation' => '',
          'null' => true,
        ),
        'content' => 
        array (
          'length' => '',
          'collation' => '',
          'null' => true,
        ),
      ),
    ),
    'pagetitle' => 
    array (
      'alias' => 'pagetitle',
      'primary' => false,
      'unique' => false,
      'type' => 'FULLTEXT',
      'columns' => 
      array (
        'pagetitle' => 
        array (
          'length' => '',
          'collation' => '',
          'null' => false,
        ),
      ),
    ),
    'longtitle' => 
    array (
      'alias' => 'longtitle',
      'primary' => false,
      'unique' => false,
      'type' => 'FULLTEXT',
      'columns' => 
      array (
        'longtitle' => 
        array (
          'length' => '',
          'collation' => '',
          'null' => false,
        ),
      ),
    ),
    'introtext' => 
    array (
      'alias' => 'introtext',
      'primary' => false,
      'unique' => false,
      'type' => 'FULLTEXT',
      'columns' => 
      array (
        'introtext' => 
        array (
          'length' => '',
          'collation' => '',
          'null' => true,
        ),
      ),
    ),
    'content' => 
    array (
      'alias' => 'content',
      'primary' => false,
      'unique' => false,
      'type' => 'FULLTEXT',
      'columns' => 
      array (
        'content' => 
        array (
          'length' => '',
          'collation' => '',
          'null' => true,
        ),
      ),
    ),
    'instruction' => 
    array (
      'alias' => 'instruction',
      'primary' => false,
      'unique' => false,
      'type' => 'FULLTEXT',
      'columns' => 
      array (
        'instruction' => 
        array (
          'length' => '',
          'collation' => '',
          'null' => true,
        ),
      ),
    ),
  ),
);
