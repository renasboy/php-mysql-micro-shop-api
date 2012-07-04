<?php
namespace api\model;

class category extends \api\simple_model {

    // this is the fields/types for the model
    protected $_fields              = [
        'id'                        => 'number',
        'created'                   => 'datetime',
        'modified'                  => 'datetime',
        'seo'                       => 'text',
        'name'                      => 'text',
        'img'                       => 'text',
        'active'                    => 'flag',
    ];

    // these are the relations for the model
    protected $_relations           = [
        'many_one'                  => [],
        'one_many'                  => [
            'product'
        ],
        'many_many'                 => []
    ];

    protected $_dependencies        = [
        'product'                   => null
    ];

    protected $_validate            = [
        'save'                      => [
            'relation'              => [],
            'field'                 => [
                'seo',
                'name',
                'img'
            ]
        ]
    ];

    // FIND
    // each of these methods maps to the
    // list of "with" options in the
    // resource get method
    public function find_products () {
        // get dependency model object
        $model      = $this->_dependencies['product'];

        // compose options for the find call
        $options    = [
            'category_id'      => $this->id,
            'active'        => 1,
            'offset_start'  => 0,
            'offset_end'    => 1000
        ];

        // execute find call and return result
        return $model->find($options);
    }
}
