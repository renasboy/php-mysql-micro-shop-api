<?php
namespace api\resource;

class shop extends \api\simple_resource {

    // this is the data structure for the resource
    protected $_data                	= [
        'id'                          	=> null,
        'created'                   	=> null,
        'modified'                   	=> null,
        'payment'                       => null,
        'status'                       	=> null,
        'email'                       	=> null,
        'name'                       	=> null,
        'address'                       => null,
        'products'                      => [
            'id'                        => null,
            'created'                   => null,
            'modified'                  => null,
            'sku'                       => null,
            'seo'                       => null,
            'name'                      => null,
            'img'                       => null,
            'price'                     => null,
            'quantity'                  => null
        ]
    ];

    // these are default request options
    protected $_default_options     	= [
        'get'                       	=> [
            'with'                  	=> [
                'products'              => false
            ],
            'filter'                	=> [
                'id'                	=> [],
                'created_before'        => [],
                'created_after'         => [],
                'seo'               	=> [],
                'search'            	=> [],
                'offset_start'      	=> 0,
                'offset_end'        	=> 100
            ]
        ],
        'post'                      	=> [
            'fields'                	=> [
                'id'                	=> null,
                'created'               => true,
                'modified'              => null,
                'payment'               => null,
                'status'               	=> null,
                'email'               	=> null,
                'name'               	=> null,
                'address'               => null
            ],
            'relations'             	=> [
                'product_id'            => [
                    'relations'         => [],
                    'fields'            => [
                        'shop_id'       => null,
                        'product_id'    => null,
                        'quantity'      => null
                    ]
                ]
            ]
        ],
        'delete'                    	=> [
            'fields'                	=> [
                'id'                	=> null,
                'seo'               	=> null
            ]
        ]
    ];
}
