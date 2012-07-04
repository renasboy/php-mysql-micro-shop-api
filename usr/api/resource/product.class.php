<?php
namespace api\resource;

class product extends \api\simple_resource {

    // this is the data structure for the resource
    protected $_data                	= [
        'id'                          	=> null,
        'created'                   	=> null,
        'modified'                   	=> null,
        'category'                      => null,
        'category_seo'                  => null,
        'sku'                       	=> null,
        'seo'                       	=> null,
        'name'                       	=> null,
        'img'                       	=> null,
        'price'                       	=> null
    ];

    // these are default request options
    protected $_default_options     	= [
        'get'                       	=> [
            'with'                  	=> [],
            'filter'                	=> [
                'id'                	=> [],
                'created_before'        => [],
                'created_after'         => [],
                'category_id'           => [],
                'sku'                   => [],
                'seo'               	=> [],
                'search'            	=> [],
                'active'            	=> [1],
                'offset_start'      	=> 0,
                'offset_end'        	=> 100
            ]
        ],
        'post'                      	=> [
            'fields'                	=> [
                'id'                	=> null,
                'created'               => true,
                'modified'              => null,
                'category'              => null,
                'category_id'           => null,
                'sku'               	=> null,
                'seo'               	=> null,
                'name'               	=> null,
                'img'               	=> null,
                'price'               	=> null,
                'active'            	=> 1
            ],
            'relations'             	=> []
        ],
        'delete'                    	=> [
            'fields'                	=> [
                'id'                	=> null,
                'seo'               	=> null
            ]
        ]
    ];
}
