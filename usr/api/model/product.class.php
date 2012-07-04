<?php
namespace api\model;

class product extends \api\simple_model {

    // this is the fields/types for the model
    protected $_fields              = [
        'id'                        => 'number',
        'created'                   => 'datetime',
        'modified'                  => 'datetime',
        'category_id'               => 'number',
        'sku'                       => 'text',
        'seo'                       => 'text',
        'name'                      => 'text',
        'img'                       => 'text',
        'price'                     => 'price',
        'active'                    => 'flag',
    ];

    // these are the relations for the model
    protected $_relations           = [
        'many_one'                  => [
            'category'
        ],
        'one_many'                  => [],
        'many_many'                 => []
    ];

    protected $_dependencies        = [
        'category'                  => null,
        'product'                   => null
    ];

    protected $_validate            = [
        'save'                      => [
            'relation'              => [
                'category'
            ],
            'field'                 => [
                'sku',
                'seo',
                'name',
                'img',
                'price',
            ]
        ]
    ];
}
