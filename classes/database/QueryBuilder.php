<?php

    class QueryBuilder
    {

        protected $table;
        protected $select;


        protected $joins_columns;
        protected $joins;


        protected $query;

        public function __construct() {
            $this->select = "*";
        }
            
        
        public function select($fields)
        {
            $this->select = $fields;
        }

        public function table($table)
        {
            $this->table = $table;
        }

        public function get($table)
        {
            $this->table = $table;
            $this->query = 'SELECT ' . $this->select . ' FROM ' . $this->table;
            return $this->query;
        }

        //join foreign_key, foreign_table, foreign_column_id, column,
        public function innerjoin($joins)
        {
            

            $join_sql = "";

            //LEFT JOIN comments ON comments.id = blogs.id
            $cols = array();
            foreach($joins as $join)
            {
                //echo json_encode($join);

                $join_sql .= " INNER JOIN {$join['foreign_table']} ON {$this->table}.{$join['foreign_key']} = {$join['foreign_table']}.{$join['foreign_column_id']}";
                
                array_push($cols, $join['column']);
            }

            $this->joins = $join_sql;
            $this->joins_columns = implode(', ', $cols);
        }


        public function getQuery()
        {

            //$this->query = 'SELECT ' . $this->select . ' FROM ' . $this->table;      
            $query = 'SELECT ' . $this->select;

            //Check if 
            if ($this->joins)
            {
                $query .= ", {$this->joins_columns}";
            }

            $query .= ' FROM ' . $this->table;

            if ($this->joins)
            {
                $query .= $this->joins;
            }

            $this->query = $query;

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