<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2017 B2W Companhia Digital. (http://www.bseller.com.br/)
 * @author        Luiz Tucillo <luiz.tucillo@e-smart.com.br>
 */

namespace B2W\Skyhub\Model\Data;


/**
 * Class Select
 * @package B2W\Skyhub\Model\Data
 */
class Select
{
    /**
     * @var array
     */
    protected $_colums  = array();
    /**
     * @var array
     */
    protected $_from    = array();
    /**
     * @var array
     */
    protected $_join    = array();
    /**
     * @var array
     */
    protected $_where   = array();
    protected $_group   = array();

    /**
     * @param $table
     * @param null $alias
     * @return $this
     */
    public function addColumn($column, $alias = null)
    {
        if (is_array($column)) {
            foreach ($column as $cl) {
                $this->addColumn($cl);
            }

            return $this;
        }

        $this->_colums[] = array(
            'table' => $column,
            'alias' => $alias
        );

        return $this;
    }

    /**
     * @param $table
     * @param $alias
     * @return $this
     */
    public function from($table, $alias)
    {
        $this->_from = array(
            'table' => $table,
            'alias' => $alias
        );

        return $this;
    }

    /**
     * @param $table
     * @param $on
     * @param null $alias
     * @param null $type
     * @return $this
     */
    public function join($table, $on, $alias = null, $type = null)
    {
        $this->_join[] = array(
            'table' => $table,
            'on'    => $on,
            'alias' => $alias,
            'type'  => $type
        );

        return $this;
    }

    /**
     * @param $where
     * @return $this
     */
    public function where($where)
    {
        $this->_where[] = $where;
        return $this;
    }

    public function group($group)
    {
        $this->_group[] = $group;
        return $this;
    }

    /**
     * @return string
     */
    public function prepare()
    {
        $query = "SELECT ";

        $columns = array();
        foreach ($this->_colums as $column) {
            $c = $column['table'];
            if (isset($column['alias']) && !empty($column['alias'])) {
                $c .= " AS " . $column['alias'];
            }
            $columns[] = $c;
        }
        $query .= implode(', ', $columns);
        $query .= "\n";

        $query .= "FROM " . $this->_from['table'];
        if (isset($this->_from['alias']) && !empty($this->_from['alias'])) {
            $query .= " AS " . $this->_from['alias'];
        }

        foreach ($this->_join as $join) {
            $query .= "\n";
            if (isset($join['type']) & !empty($join['type'])) {
                $query .= strtoupper($join['type']);
            }
            $query .= " JOIN " . $join['table'];
            if (isset($join['alias']) && !empty($join['alias'])) {
                $query .= " AS " . $join['alias'];
            }
            $query .= " ON " . $join['on'];
        }

        if (!empty($this->_where)) {
            $query .= "\n";
            $query .= " WHERE ";
            $query .= implode(' AND ', $this->_where);
        }

        if (!empty($this->_group)) {
            $query .= "\n";
            $query .= "GROUP BY " . implode(',', $this->_group);
        }

        return $query;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->prepare();
    }
}