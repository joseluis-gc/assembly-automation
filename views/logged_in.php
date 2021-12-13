<?php
include_once ("includes/header.php");
include_once ("includes/topbar.php");
include_once ("includes/sidebar.php");


if (!empty($page)) {
    switch ($page){

        case "plan_main":
            include ("views/hr/plan/plan_main.php");
        break;

        case "plan_measurement":
            include ("views/hr/plan/plan_measurement.php");
        break;


        default:
            include ("views/home/home.php");
        break;
    }
}else{
    include ("views/home/home.php");
}


include_once ("includes/footer.php");
