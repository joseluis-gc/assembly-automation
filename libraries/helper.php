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
    return $shift;
}

function swalMessage($title,$message,$icon){
    echo
    "
    <script>
        Swal.fire(
          '$title',
          '$message',
          '$icon'
        )
    </script>
    ";
}

function swalMessageRedirect($title,$message,$icon,$url,$param1,$param2){
    echo
    "
    <script type='text/javascript'>
            document.addEventListener('DOMContentLoaded', function(event) {            
                swal.fire({
                    title: '$title',
                    icon: '$icon',
                    text: '$message'
                }).then(function() {
                    window.location = 'index.php?page=$url&$param1&$param2';
                });
            });
    </script>
    ";
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
    return date("G");
}



