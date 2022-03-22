<?php
include_once("includes/header.php");
include_once("includes/topbar.php");
include_once("includes/sidebar.php");





$value = 'trigger';
$dashboard = 'dashboard';

if (!empty($page)) {
    if (isset($_GET['asset_id'])) {
        $form = getPlanForm($_GET['asset_id']);
    } else {
        $form = null;
    }

    switch ($page) {
        case "plan_main":
            include("views/hr/plan/plan_main.php");
            break;

        case "plan_measurement":
            include("views/hr/plan/plan_measurement.php");
            break;

        case "plan_shift_selector":
            include("views/hr/plan/plan_shift_selector.php");
            break;

        case "plan_form":
            if ($form == 1) {
                include("views/hr/plan/plan_form.php");
            }
            if ($form == 2) {
                include("views/hr/plan/plan_form_2.php");
            }
            if ($form == 3) {
                include("views/hr/plan/plan_form_3.php");
            }
            break;

        case "plan_form_update":
            if ($form == 1) {
                include("views/hr/plan/plan_form_update.php");
            }
            if ($form == 2) {
                include("views/hr/plan/plan_form_update_2.php");
            }
            if ($form == 3) {
                include("views/hr/plan/plan_form_update_3.php");
            }
            break;

        case "plan_form_2":
            include("views/hr/plan/plan_form_2.php");
            break;

        case "plan_form_3":
            include("views/hr/plan/plan_form_3.php");
            break;

        case "captura_manual":
            include("views/hr/inputs/captura_manual.php");
            break;

        case "andon":
            include("views/andon/dashboard.php");
            break;

        case "areas":
            include_once("classes/controllers/AreaController.php");
            $controller = new AreaController;
            break;

        case "plants":
            //Cargar el controlador de Plantas
            include_once("classes/controllers/PlantController.php");

            $controller = new PlantController;
            //include("views/andon/plants.php");
            break;

        case "machines":
            include("views/andon/machines.php");
            break;

        case "daily_report":
            include("views/hr/report/daily_report.php");
            break;

        case "custom_report":
            include("views/hr/report/custom_report.php");
            break;


        default:
            include("views/home/home.php");
            break;
    }
} elseif (isset($_SESSION['newsession'])) {
    if ($_SESSION['newsession'] == 'dashboard') {
        include("views/home/home.php");
    } else {
        include("views/andon/dashboard.php");
    }
} else {
    include("views/home/home.php");
}

include_once("includes/footer.php");
