<?php

require_once "Model.php";

class ShiftModel extends Model
{

    //Fields
    //shift_id, name, start_hour, end_hour

    protected $table = 'shift';
    protected $column_id = 'shift_id';

    
    function __construct() {
        parent::__construct();
        //print "En el constructor SubClass\n";
    }


}


?>