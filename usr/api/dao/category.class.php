<?php
namespace api\dao;

class category extends \api\simple_dao {

    protected function _read_query ($filter) {
        $query = 'SELECT category.*, COUNT(DISTINCT(product.id)) AS total_products FROM category
        LEFT JOIN product ON category.id = product.category_id';

        $filters    = [];

        $filters[]  = $this->_condition_query('category.created', 'greater', $filter, 'created_before');
        $filters[]  = $this->_condition_query('category.created', 'smaller', $filter, 'created_after');

        $filters[]  = $this->_condition_query('category.id', 'is', $filter, 'id');
        $filters[]  = $this->_condition_query('category.seo', 'is', $filter, 'seo');
        $filters[]  = $this->_condition_query('category.name', 'is', $filter, 'name');
        $filters[]  = $this->_condition_query('category.active', 'is', $filter, 'active');

        $or         = [];
        $or[]       = $this->_condition_query('category.seo', 'like', $filter, 'search');
        $or[]       = $this->_condition_query('category.name', 'like', $filter, 'search');
        $filters[]  = $this->_logical_condition_query('or', $or);

        $where      = $this->_logical_condition_query('and', $filters);

        $query .= ' WHERE ' . $where;
        $query .= ' GROUP BY category.id';

        $query .= ' ORDER BY category.id DESC';
        $query .= $this->_limit_query($filter);
        return $query;
    }
}
