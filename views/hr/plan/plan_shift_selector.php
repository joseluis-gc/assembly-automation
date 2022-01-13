<?php
$shift = getShift();
$asset_id = check_parameter($_GET['asset_id']);

if($shift == 1){
    header("Location: index.php?page=plan_form&asset_id=$asset_id");
}
elseif ($shift == 2){
    header("Location: index.php?page=plan_form_2&asset_id=$asset_id");
}
else{
    header("Location: index.php?page=plan3_form&asset_id=$asset_id");
}
