<?php
include_once ("includes/header_btn.php");
include_once ("includes/header_trigger.php");

if (!empty($page)) {
    switch ($page){

        case "menu":
            include ("views/button/menu.php");
            break;

        case "asset_option":
            include ("views/button/asset_option.php");
            break;

        case "button":
            include ("views/button/button.php");
            break;

        case "trigger":
            include ("views/trigger/trigger.php");
        break;
            
        case "report":
            include ("views/trigger/trigger_report.php");
            break;

        default:
            include ("views/auth/login.php");
            break;
    }
}else{
    include ("views/auth/login.php");
}


include_once ("includes/footer_btn.php");
include_once ("includes/footer_trigger.php");

