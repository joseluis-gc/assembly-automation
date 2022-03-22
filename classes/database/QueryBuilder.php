<?php

class QueryBuilder
{

    protected $columns = array();
    protected $table;

    //array of itmes item mush have foreing_key, foreign_table, foreign_column_id, column
    protected $innerjoins = array();

    public function __constructor()
    {
    }


    public function table($table)
    {
        $this->table = $table;
    }

    public function columns($columns)
    {
        $this->$columns = array_merge($this->$columns, $columns);
    }

    public function add_column($column)
    {
        array_push($this->columns, $column );
    }




    public function add_innerjoin($join)
    {
        //foreing_key, foreign_table, foreign_column_id, column
        //print_r($join);

        array_push($this->innerjoins, $join);
    }

    

    public function select()
    {
        $query = 'SELECT ';


        /* 
            SELECT column_name(s)
FROM table1
INNER JOIN table2
ON table1.column_name = table2.column_name;
        */
        //Agregar los inners joins
        //array of itmes item mush have foreing_key, foreign_table, foreign_column_id, column
        $inner_joins_part = "";
        
        //print_r($this->innerjoins);

        if( count($this->innerjoins) > 0)
        {
            for($i = 0;  $i < count($this->innerjoins) ;$i++  )
            {
                //print_r($innerjoint);
                $inner_join_item = "";

                $innerjoin = $this->innerjoins[$i];
                
                $inner_joins_part .= " INNER JOIN " . $innerjoin['foreign_table'] . " ON " . $this->table . "." . $innerjoin['foreign_key'] . " = ";
                $inner_joins_part .= $innerjoin['foreign_table']. "." . $innerjoin['foreign_column_id'];

                

                if( count ($this->columns) == 0 )
                {
                    $this->add_column("*");    
                }

                $this->add_column( $innerjoin['column'] );
            }
        }
    

        
        if( $this->columns == NULL)
        {
            $query .= "*";
        } else
        {
            $query .= implode(', ', $this->columns);
        }

        $query .= " FROM " . $this->table;

        $query .= $inner_joins_part;

        return $query;
    }


}

?>