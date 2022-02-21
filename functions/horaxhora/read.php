<?php
require_once "../../_settings/db.php";

$maquina = $_POST['maquina'];
$hora    = $_POST['hr'];
$id = $_POST['id'];
$item_name = $_POST['item_name'];
$plan = $_POST['plan'];
$input_value = $_POST['input_value'];
$get_value = $_POST['value'];

$pz = 0;
$new_pz = 0;
$temp = false;
$query_order = "SELECT * FROM plan_hrxhr WHERE plan_asset = " . $maquina . "";
$run_query_order = mysqli_query($connection, $query_order);

if (!$run_query_order) {
    die("Failed $query_order");
}
$row = mysqli_fetch_array($run_query_order);

$query = "SELECT * FROM hour_registry WHERE reg_order_id = $plan AND reg_time_block = $hora";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Failed $query");
}

while ($row_data = mysqli_fetch_array($result)) {
    if ($item_name === $input_value) {
        $temp = true;
        $pz += $row_data['reg_qty'];
    } else {
        $temp = false;
        $new_pz += $row_data['reg_qty'];
    }
}

if ($temp === true) {
    echo $pz;
} else {
    // echo '<p class="fw-bold">Se ha realizado un cambio en la pieza <span class="text-success">', $item_name ,'</span> por <span class="text-success">', $input_value, '</span></p>';
    echo $new_pz;
};
