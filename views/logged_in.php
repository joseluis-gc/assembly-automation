<?php
include_once("includes/header.php");
include_once("includes/topbar.php");
include_once("includes/sidebar.php");


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
            include("views/hr/plan/captura_manual.php");
            break;

        case "andon":
            include("views/andon/dashboard.php");
            break;

        case "areas":
            include("views/andon/areas.php");
            break;

        case "plants":
            include("views/andon/plants.php");
            break;

        case "machines":
            include("views/andon/machines.php");
            break;
        default:
            include("pages/home/home.php");
            break;
    }
} else {
    include("views/home/home.php");
}


include_once("includes/footer.php");
