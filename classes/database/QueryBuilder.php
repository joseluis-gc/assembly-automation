<?php

    class QueryBuilder
    {

        protected $table;
        protected $select;

        protected $query;

        public function __construct() {
            $this->select = "*";
        }
            
        
        public function select($fields)
        {
            $this->select = $fields;
        }


        public function get($table)
        {
            $this->table = $table;
            $this->query = 'SELECT ' . $this->select . ' FROM ' . $this->table;
            return $this->query;
        }

        
        public function getColumns()
        {
            $data = explode(', ', $this->select );
            return $data;
        }


        public function getData()
        {
            $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
                $result = mysqli_query($connection, $this->query);
                if (!$result) {
                    return FALSE;
                }

                $response = array();

                while ($row_data = mysqli_fetch_array($result)) {
                    array_push($response, $row_data );
                }

                mysqli_free_result($result);

                $connection->close();

            return $response;
        }





    }


?>