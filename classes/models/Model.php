<?php

include_once ("_settings/db.php");
include_once ("classes/database/QueryBuilder.php");

class Model
{

    private $connection = null;

    protected $table;
    protected $column_id;
    
    protected $time_fields = ['create' => 'date_create', 'update' => 'date_update'];
    protected $table_info = array();

    //protected $column_index = array();

    public $errors = array();


    function __construct() {
        
        $this->connect();
    }

    public function connect()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        //test
        //if (!$this->connection->set_charset("utf8")) {
        //    $this->errors[] = $this->connection->error;
        //}
        $this->loadTableInfo();

        //$data = ['plant_name'=>'test', 'use_pass'=>1];
        //$this->insert($data);
    }


    public function loadTableInfo()
    {
        //DATA_TYPE
        $query = "SELECT * FROM information_schema.COLUMNS WHERE TABLE_NAME = '{$this->table}'";

        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            return FALSE;
        }

        while ($row_data = mysqli_fetch_array($result)) {
            $tmp = [
                    'type' => $row_data['DATA_TYPE'],
                    'default' => $row_data['COLUMN_DEFAULT'],
                    'nullable' => $row_data['IS_NULLABLE'],
                    ];
                    
            //array_push($this->table_info, (object)$tmp );
            $this->table_info[$row_data['COLUMN_NAME']] = $tmp;
        }
                
        mysqli_free_result($result);
        //echo json_encode($this->table_info["plant_id"]["type"] );
    }


    //include  foreign_key, foreign_table, foreign_column_id, column, 
    public function getAll($includes = NULL)
    {
        //$query = "SELECT * FROM {$this->table}";
        $queryBuilder = new QueryBuilder;
        $queryBuilder->table($this->table);

        if($includes != NULL)
            $queryBuilder->innerjoin($includes);

        $query = $queryBuilder->getQuery();

        //echo $query;

        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            return FALSE;
        }

        $response = array();

        while ($row_data = mysqli_fetch_array($result)) {
            array_push($response, (object)$row_data );
        }

        mysqli_free_result($result);

        $this->connection->close();

        return $response;        
    }

    public function get($id)
    {     
        $idField = $this->column_id;
        $idValue = $id;
        $id_type = $this->table_info[$idField]["type"];

        $sql = "SELECT * FROM {$this->table} WHERE {$idField} = ";


        if($id_type == 'varchar')
            $sql .= "'";

        $sql .= $idValue;
        
        if($id_type == 'varchar')
            $sql .= "'";


        $result = mysqli_query($this->connection, $sql);
        if (!$result) {
            return FALSE;
        }

        $response = NULL;
        $row_data = mysqli_fetch_array($result);
        $response = (object)$row_data;

        mysqli_free_result($result);

        $this->connection->close();

        return $response;
    }


    
    public function insert($data)
    {
        
        //inser data
        $data[ $this->time_fields['create'] ] = date("Y-m-d H:i:s");        

        $sql = "INSERT INTO {$this->table} ";

        $keys = array_keys($data);

        $columnPart = "(";
        $valuesPart = "(";
        for($f = 0; $f < count($data) ; $f++)
        {
            $field_name = $keys[$f];
            $type = $this->table_info[$field_name]["type"];
            //print($type);
            
            $columnPart .= $keys[$f];
            if($f != (count($data) - 1))
                $columnPart .= ', ';


            if($type == 'varchar')
                $valuesPart .= "'";
            else if($type == 'timestamp')
                $valuesPart .= "'";

            $valuesPart .= $data[ $field_name ];

            if($type == 'varchar')
                $valuesPart .= "'";
            else if($type == 'timestamp')
                $valuesPart .= "'";

            if($f != (count($data) - 1))
                $valuesPart .= ', ';
        }

        $columnPart .= ")";
        $valuesPart .= ")";

        $sql .= $columnPart . " VALUES " . $valuesPart;

        //echo $sql;

        $inserted = $this->connection->query($sql);

        // if user has been added successfully
        $this->connection->close();

        return $inserted;

    }
    

    /*
    UPDATE table_name
    SET column1 = value1, column2 = value2, ...
    WHERE condition;
    */

    //Tw    o Arrays
    public function update($data, $id)
    {
        //inser data
        $data[ $this->time_fields['create'] ] = date("Y-m-d H:i:s");        

        $sql = "UPDATE {$this->table} SET ";

        $keys = array_keys($data);

        //$columnPart = "(";
        $valuesPart = "";
        for($f = 0; $f < count($data) ; $f++)
        {
            $field_name = $keys[$f];
            $type = $this->table_info[$field_name]["type"];
            //print($type);
            

            $valuesPart .= $keys[$f] . " = ";

            
            if($type == 'varchar')
                $valuesPart .= "'";
            else if($type == 'timestamp')
                $valuesPart .= "'";

            $valuesPart .= $data[ $field_name ];

            if($type == 'varchar')
                $valuesPart .= "'";
            else if($type == 'timestamp')
                $valuesPart .= "'";

            if($f != (count($data) - 1))
                $valuesPart .= ', ';

        }

        //$reset($where);
        $idField = $this->column_id;
        $idValue = $id;
        $id_type = $this->table_info[$idField]["type"];

        $sql .=  $valuesPart . " WHERE " . $idField . " = " ;

        if($id_type == 'varchar')
            $sql .= "'";

        $sql .= $idValue;
        
        if($id_type == 'varchar')
            $sql .= "'";

        //echo $sql;

        $updated = $this->connection->query($sql);

        // if user has been added successfully
        $this->connection->close();

        return $updated;

    }


    /*
        DELETE FROM table_name WHERE condition;
    */

    public function delete($id)
    {

        $idField = $this->column_id;
        $idValue = $id;
        $id_type = $this->table_info[$idField]["type"];


        $sql = "DELETE FROM {$this->table} WHERE {$idField} = ";

    
        if($id_type == 'varchar')
            $sql .= "'";

        $sql .= $idValue;
        
        if($id_type == 'varchar')
            $sql .= "'";

        $deleted = $this->connection->query($sql);

        // if user has been added successfully
        $this->connection->close();

        return $deleted;
       
    }

}
?>