<?php
namespace api\model;

class shop extends \api\simple_model {

    // this is the fields/types for the model
    protected $_fields              = [
        'id'                        => 'number',
        'created'                   => 'datetime',
        'modified'                  => 'datetime',
        'payment'                   => 'text',
        'status'                    => 'text',
        'name'                      => 'text',
        'address'                   => 'text'
    ];

    // these are the relations for the model
    protected $_relations           = [
        'many_one'                  => [],
        'one_many'                  => [],
        'many_many'                 => [
            'product'
        ]
    ];

    protected $_dependencies        = [
        'product'                   => null,
        'shop'                      => null,
        'product_shop'              => null
    ];

    protected $_validate            = [
        'save'                      => [
            'relation'              => [],
            'field'                 => [
                'payment',
                'status',
                'name',
                'address'
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
            'shop_id'       => $this->id,
            'active'        => 1,
            'offset_start'  => 0,
            'offset_end'    => 1000
        ];

        // execute find call and return result
        return $model->find($options);
    }

    // SAVE
    // each of these methods maps to the
    // list of "relations" options in the
    // resource post method. Those methods
    // can be used to save object aggregations

    // This method is used if the relations row 
    // already exists in the foreigb table
    public function save_product_id ($options) {
        // get dependency model object
        $model      = $this->_dependencies['product_shop'];

        // populate its own dependencies
        $model->dependencies($this->_dependencies);

        // add this models id to save options
        $options['fields']['shop_id'] = $this->id;

        // validate save options
        $options    = $model->validate_save($options);
        
        // execute save call and return results
        return $model->save($options['fields']);
    }
}
