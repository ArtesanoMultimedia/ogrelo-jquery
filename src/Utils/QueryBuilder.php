<?php

namespace src\Utils;

use src\Database\Database;
use src\Database\DB;

class QueryBuilder
{
    protected $select = '';
    protected $where = '';
    protected $from = '';
    protected $join = '';
    protected $order = '';
    protected $query = '';
    protected $result;
    protected $table;
    private $do = false;
    private $db;

    public function __construct()
    {
        $this->db = new DB(
            Database::$dbhost,
            Database::$dbuser,
            Database::$dbpass,
            Database::$dbname);
    }

    protected function select(Array $campos) {
        $this->select = ($this->select ? $this->select . ', ' : '') . implode(', ', $campos);
        return $this;
    }

    protected function selectAll() {
        $this->select = '*';
        return $this;
    }

    protected function from(String $from = null) {
        if ($from == null) {
            $this->from = $this->table;
        }
        $this->from = $from;
        return $this;
    }

    protected function ljoin($tabla, $campoFrom, $campoTabla) {
        $this->join .= " LEFT JOIN $tabla ON $this->from.$campoFrom = $tabla.$campoTabla ";
        return $this;
    }

    protected function rjoin($tabla, $campoFrom, $campoTabla) {
        $this->join .= " RIGHT JOIN $tabla ON $this->from.$campoFrom = $tabla.$campoTabla ";
        return $this;
    }

    protected function join($tabla, $campoFrom, $campoTabla) {
        $this->join .= " INNER JOIN $tabla ON $this->from.$campoFrom = $tabla.$campoTabla ";
        return $this;
    }

    protected function where($param1, $param2 = null, $param3 = null) {

        if ($this->where === '') {
            $this->where = 'WHERE ';
        } else {
            $this->where .= 'AND ';
        }

        if ($param2 == null && $param3 == null) {
            $this->where .= $param1 . ' ';
        } elseif ($param3 == null) {
            $this->where .= "$param1 = $param2 ";
        } else {
            $this->where .= "$param1 $param2 $param3 ";
        }

        return $this;

    }

    protected function order($orden, $tipo = 'ASC') {
        if ($this->order === '') {
            $this->order = 'ORDER BY';
        } else {
            $this->order .= ', ';
        }

        if (strpos($orden, ',') === false) {
            $this->order .= " $orden $tipo";
        } else {
            $this->order .= ' ' . $orden;
        }
    }

    protected function build() {
        if (!$this->select) {
            $this->selectAll();
        }
        if (!$this->from) {
            $this->from();
        }
        $this->query = "SELECT $this->select FROM $this->from $this->join $this->where $this->order";
        return $this;
    }

    protected function do() {

        if (!$this->query) {
            $this->build();
        }
        $this->do = true;
        $this->result = $this->db->query($this->query);
        return $this;
    }

    protected function fetchAll() {
        if ($this->do) {
            $this->result = $this->db->fetchAll();
        } else {
            $this->result = $this->db->query($this->query)->fetchAll();
        }
        return $this->result;
    }

    protected function fetchArray() {
        if ($this->do) {
            $this->result = $this->db->fetchArray();
        } else {
            $this->result = $this->db->query($this->query)->fetchArray();
        }
        return $this->result;
    }

}
