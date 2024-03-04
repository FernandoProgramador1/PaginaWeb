<?php

class Visiones extends Conectar {
    private $table;
    private $view;
    private $id;
    private $lastid;
    public $values = array();

    public function __construct(){
        $con = new Conectar();
        $this->db = $con->conexionBD();
        $this->field = array();
    }

    public function lastId() {
        $this->lastid = $this->db->insert_id;
        return $this->lastid;
    }

    public function setView($v) {
        $this->view = $v;
    }

    public function setTable($t)    {
        $this->table = $t;
    }

    public function setColumns($c)  {
        $this->column[] = $c;
    }

    public function setKey($k)  {
        $this->pkey = $k;
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";

        $result = $this->db->query($sql);
        while($row = $result->fetch_assoc()) {
            $this->field[] = $row;
        }
        return $this->field;
    }

    public function getWhere($value)  {
        $this->id = $value;
        $sql = "SELECT * FROM {$this->table} WHERE {$this->pkey}={$this->id}";

        $result = $this->db->query($sql);
        while($row = $result->fetch_assoc())   {
            $this->field[] = $row;
        }
        return $this->field;
    }

    public function getWhereVision($value)  {
        $this->val = $value;

        $sql = "SELECT * FROM {$this->view} WHERE IdVision='{$this->val}' ";
        // echo $sql;
        $result = $this->db->query($sql);
        while($row = $result->fetch_assoc())   {
            $this->field[] = $row;
        }
        return $this->field;
    }

    // public function getWhere($value)  {
    //     $this->val = $value;

    //     $sql = "SELECT * FROM {$this->view} WHERE IdTipoProducto='{$this->val}' ";
    //     // echo $sql;
    //     $result = $this->db->query($sql);
    //     while($row = $result->fetch_assoc())   {
    //         $this->field[] = $row;
    //     }
    //     return $this->field;
    // }

    public function getView() {
        $sql = "SELECT * FROM {$this->view}";
        echo $sql;
        $result = $this->db->query($sql);
        while($row = $result->fetch_assoc()) {
            $this->field[] = $row;
        }
        return $this->field;
    }

    public function getWhereview($value)  {
        $this->id = $value;
        $sql = "SELECT * FROM {$this->view} WHERE {$this->pkey}={$this->id}";

        $result = $this->db->query($sql);
        while($row = $result->fetch_assoc())   {
            $this->field[] = $row;
        }
        return $this->field;
    }

    public function insertVision($desc) {
        $this->col = implode(",",$this->column);

        // echo $this->col;
        // echo $this->val;
        $sql = "INSERT INTO {$this->table} ({$this->pkey},{$this->col}) VALUE (NULL,'$desc')";
        // echo $sql;
        $this->db->query($sql);
    }

    public function updateVision($value,$desc)  {
        $this->id = $value;     //ATRAPA EL ID QUE SE USARA PARA IDENTIFICAR CUAL SE CAMBIARA
        // $this->col = implode(",",$this->columsn);
        $this->values[] = $this->column[0] ."='". $desc ."'";

        $this->val = implode(",",$this->values);

        $sql = "UPDATE {$this->table} SET {$this->val} WHERE {$this->pkey}='{$this->id}'";
        $this->db->query($sql);
    }

    public function deleteVision($value)  {
        $this->id = $value;
        $sql = "DELETE FROM {$this->table} WHERE {$this->pkey}={$this->id}";
        $this->db->query($sql);
    }
}

?>