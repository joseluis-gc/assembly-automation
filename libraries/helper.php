<?php

function getShift(){

    $now = new DateTime(date("Y-m-d H:i:s"));
    $shift = 0;
    
    if($now >= new DateTime("06:00:00") && $now < new DateTime("15:36:00") ){
        $shift = 1;
    }

    elseif($now >= new DateTime("15:36:00") && $now < new DateTime("00:00:00") ){
        $shift = 2;
    }

    elseif($now >= new DateTime("00:00:00") && $now < new DateTime("06:00:00") ){
        $shift = 3;
    }

    return $shift;
}


