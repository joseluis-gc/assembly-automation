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

        case "plan_form":
            include ("views/hr/plan/plan_form.php");
        break;

        case "plan_form_2":
            include ("views/hr/plan/plan_form_2.php");
        break;

        case "plan_form_3":
            include ("views/hr/plan/plan_form_3.php");
        break;

        case "captura_manual":
            include ("views/hr/plan/captura_manual.php");
        break;
        default:
            include ("views/home/home.php");
        break;
    }
}else{
    include ("views/home/home.php");
}


include_once ("includes/footer.php");
