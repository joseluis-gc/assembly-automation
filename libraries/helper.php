<?php

function getShift(){

    $date = date("Y-m-d H:i:s");

    $now = new DateTime(date("H:i:s"));
    $shift = 0;
    
    if($now >= new DateTime("06:00:00") && $now < new DateTime("15:36:00") ){
        $shift = 1;
    }

    elseif($now >= new DateTime("15:36:00") && $now < new DateTime("23:59:59") ){
        $shift = 2;
    }
    /*
    elseif($now >= new DateTime("23:59:59") && $now < new DateTime("06:00:00") ){
        $shift = 3;
    }
    */

    else{
        $shift = 3;
    }

    return $shift;
}


function shiftString(){
    $shift = getShift();
    if($shift == 1)
        $turno = "1er";
    elseif ($shift == 2)
        $turno = "2do";
    else
        $turno = "3er";

    return $turno;
}


function check_parameter($parameter){
    if (is_numeric($parameter)){
        $p = $parameter;
    }else{
        die("invalid parameter");
    }
    return $p;
}

function getPlanForm($parameter){
    $shift = getShift();
    if (!is_numeric($parameter)) {
        die("Invalid parameter");
    }
    //echo $shift;
    /*$shift = 2;

    $shift = intval($shift);

    if($shift == 1){
        header("Location: index.php?page=plan_form&asset_id=$parameter");
    }
    elseif ($shift == 2){
        header("Location: index.php?page=plan_form_2&asset_id=$parameter");
    }
    else{
        header("Location: index.php?page=plan3_form&asset_id=$parameter");
    }
    */
    return $shift;

}

function Now(){
   return date("Y-m-d H:i:s");
}

function Today(){
   return date("Y-m-d");
}

function nowTime(){
    return date("H:i:s");
}

function nowHour(){
    return date("H");
}



