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



