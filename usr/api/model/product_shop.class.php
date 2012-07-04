<?php
namespace api\model;

class product_shop extends \api\simple_model {

    // this is the fields/types for the model
    protected $_fields              = [
        'product_id'                => 'number',
        'shop_id'                   => 'number',
        'quantity'                  => 'number'
    ];

    // these are the relations for the model
    protected $_relations           = [
        'many_one'                  => [
            'product',
            'shop'
        ],
        'one_many'                  => [],
        'many_many'                 => []
    ];

    protected $_dependencies        = [
        'product'                   => null,
        'shop'                      => null
    ];

    protected $_validate            = [
        'save'                      => [
            'relation'              => [
                'product',
                'shop'
            ],
            'field'                 => [
                'quantity'
            ]
        ]
    ];
}
