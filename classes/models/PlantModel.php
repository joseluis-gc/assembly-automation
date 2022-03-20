<?php


require_once "Model.php";


class PlantModel extends Model
{

    protected $table = 'plant';
    protected $column_id = 'plant_id';

    
    function __construct() {
        parent::__construct();
        //print "En el constructor SubClass\n";
    }


    //plant_id, plant_name, use_pass, plant_password, date_create, date_update, plant_active

}


?>