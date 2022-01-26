<?php
require_once "../../_settings/db.php";

$maquina = $_POST['maquina'];
$hr      = $_POST['hr'];
$value   = $_POST['value'];
$date    = date("Y-m-d H:i:s");
$id = $_POST['id'];
$plan = $_POST['plan'];
$item_name = $_POST['item_name'];

$query_order = "SELECT * FROM plan_hrxhr WHERE plan_asset = " . $maquina . " AND (status = 0 OR status = 1)";
$run_query_order = mysqli_query($connection, $query_order);
if (!$run_query_order) {
    die("Failed $query_order");
}
$row = mysqli_fetch_array($run_query_order);

$query = "INSERT INTO hour_registry (reg_qty, reg_time_block, reg_real_time, reg_order_id) VALUES ('$value', '$hr', '$date', '$plan')";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Failed $query");
}

$query_item_number = "UPDATE plan_hrxhr SET $id";
$result_item_number = mysqli_query($connection, $query_item_number);
if (!$result_item_number) {
    die("Failed $query_item_number");
}
$row = mysqli_fetch_array($result_item_number);

$query_item_name = "UPDATE plan_hrxhr SET pn_'.$id.'";
$result_item_name = mysqli_query($connection, $query_item_name);
if (!$result_item_name) {
    die("Failed $query_item_name");
}
$row = mysqli_fetch_array($result_item_name);
