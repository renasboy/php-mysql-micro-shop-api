<?php
namespace api\dao;

class shop extends \api\simple_dao {

    protected function _read_query ($filter) {
        $query = 'SELECT shop.* FROM shop';

        $filters    = [];

        $filters[]  = $this->_condition_query('shop.created', 'greater', $filter, 'created_before');
        $filters[]  = $this->_condition_query('shop.created', 'smaller', $filter, 'created_after');

        $filters[]  = $this->_condition_query('shop.id', 'is', $filter, 'id');
        $filters[]  = $this->_condition_query('shop.payment', 'is', $filter, 'payment');
        $filters[]  = $this->_condition_query('shop.status', 'is', $filter, 'status');
        $filters[]  = $this->_condition_query('shop.name', 'is', $filter, 'name');

        $or         = [];
        $or[]       = $this->_condition_query('shop.name', 'like', $filter, 'search');
        $or[]       = $this->_condition_query('shop.address', 'like', $filter, 'search');
        $filters[]  = $this->_logical_condition_query('or', $or);

        $where      = $this->_logical_condition_query('and', $filters);

        if ($where) {
            $query .= ' WHERE ' . $where;
        }
        $query .= ' GROUP BY shop.id';

        $query .= ' ORDER BY shop.id DESC';
        $query .= $this->_limit_query($filter);
        return $query;
    }
}
