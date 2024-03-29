<?php

class Productos extends Conectar {
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
        //echo $sql;
        $result = $this->db->query($sql);
        while($row = $result->fetch_assoc()) {
            $this->field[] = $row;
        }
        return $this->field;
    }

    public function getWhere($value)  {
        $this->id = $value;
        $sql = "SELECT * FROM {$this->table} WHERE {$this->pkey}={$this->id}";
        // echo $sql;
        $result = $this->db->query($sql);
        while($row = $result->fetch_assoc())   {
            $this->field[] = $row;
        }
        return $this->field;
    }

    public function getView() {
        $sql = "SELECT * FROM {$this->view}";
// echo $sql;
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

    public function insertProducto($name,$details,$cant,$file,$type,$marca,$tp) {
        $this->col = implode(",",$this->column);

        // echo $this->col;
        // echo $this->val;
        $sql = "INSERT INTO {$this->table} ({$this->pkey},{$this->col}) VALUE (NULL,'$name','$details','$cant','$file','$type','$marca','$tp')";
        // echo $sql;
        $this->db->query($sql);
    }

    public function updateProducto($value,$name,$details,$cant,$file,$type,$marca,$tp)  {
        $this->id = $value;     //ATRAPA EL ID QUE SE USARA PARA IDENTIFICAR CUAL SE CAMBIARA
        // $this->col = implode(",",$this->columsn);
        if(isset($file) && isset($type)){
            $this->values[] = $this->column[0] ."='". $name ."'";
            $this->values[] = $this->column[1] ."='". $details ."'";
            $this->values[] = $this->column[2] ."='". $cant ."'";
            $this->values[] = $this->column[3] ."='". $file ."'";
            $this->values[] = $this->column[4] ."='". $type ."'";
            $this->values[] = $this->column[5] ."='". $marca ."'";
            $this->values[] = $this->column[6] ."='". $tp ."'";
        }else if(isset($marca) && isset($tp)){
            $this->values[] = $this->column[0] ."='". $name ."'";
            $this->values[] = $this->column[1] ."='". $details ."'";
            $this->values[] = $this->column[2] ."='". $cant ."'";
            $this->values[] = $this->column[5] ."='". $marca ."'";
            $this->values[] = $this->column[6] ."='". $tp ."'";
        }else if(isset($marca) && (!isset($tp))){
            $this->values[] = $this->column[0] ."='". $name ."'";
            $this->values[] = $this->column[1] ."='". $details ."'";
            $this->values[] = $this->column[2] ."='". $cant ."'";
            $this->values[] = $this->column[5] ."='". $marca ."'";
        }else if((!isset($marca)) && (isset($tp))){
            $this->values[] = $this->column[0] ."='". $name ."'";
            $this->values[] = $this->column[1] ."='". $details ."'";
            $this->values[] = $this->column[2] ."='". $cant ."'";
            $this->values[] = $this->column[6] ."='". $tp ."'";
        }
        $this->val = implode(",",$this->values);

        $sql = "UPDATE {$this->table} SET {$this->val} WHERE {$this->pkey}='{$this->id}'";
        // echo $sql;  
        $this->db->query($sql);
    }


    public function deleteProducto($value)  {
        $this->id = $value;
        $sql = "DELETE FROM {$this->table} WHERE {$this->pkey}={$this->id}";
        $this->db->query($sql);
    }
}

class ProductoModel extends Productos
{

    private $conArc;
    public  $lastidupd;
    public  $fidUpd;

    public function __construct()
    {
        $conArc = new Publicidades();
        $this->lstid = $conArc->lastId();
    }

    public function uploadFile($fname, $ftype, $fsize, $file)
    {
        // SUBIR ARCHIVOS
        $dir_doc = "recursos/Archivos/";
        $uploadOk = 1;

        $dir_file = $dir_doc . basename($fname);   //  ATRAPA EL ARCHIVO
        $typefile = strtolower(pathinfo($dir_file, PATHINFO_EXTENSION)); //  OBTIENE LA INFORMACION DEL ARCHIVO COMO: RUTA, NOMBRE Y EXTENSION

        //  VERIFICA EL TAMAÑO DEL ARCHIVO
        if ($fsize > 5000000) {
            $uploadOk = 0;
        }

        //  MUEVE EL ARCHIVO AL SERVIDOR SOLO CUANDO TODOS LOS FILTROS ANTERIORES SEAN CORRECTOS
        if ($uploadOk == 0) {
            // $errorfile = 'Error en el tipo de archivo, deben ser "PNG, JPG ó JPEG"';
            $errorfile = 0;
            return $errorfile;
        } else {

            // $fch_r = date('Y-m-d');     //OBTIENE LA FECHA ACTUAL

            $gestor     =   fopen($file, "r");
            $content    = fread($gestor, $fsize);
            $dtarchivo  = addslashes($content);
            fclose($gestor);

            return $dtarchivo;
        }
    }

    public function comprobarType($type)
    {
        if ($type == 'image/jpg') {
            $typeresult = ".jpg";
            return $typeresult;
        } else {
            $typeresult = ".jpeg";
            return $typeresult;
        }
    }
}

?>