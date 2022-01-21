<?php
require_once "../../_settings/db.php";

$maquina = $_POST['maquina'];
$hr      = $_POST['hr'];
$value   = $_POST['value'];
$date    = date("Y-m-d H:i:s");
$id = $_POST['id'];
$number_item = $_POST['number_item'];

//$query_order = "SELECT * FROM hr_plan WHERE plan_asset = '".$maquina."' AND status = 1";
$query_order = "SELECT * FROM plan_hrxhr WHERE plan_asset = '".$maquina."' AND (status = 0 OR status = 1)";
$run_query_order = mysqli_query($connection, $query_order);
if(!$run_query_order){
    die("Failed $query_order");
}
$row = mysqli_fetch_array($run_query_order);
$order = $row['plan_id'];


$query = "INSERT INTO hour_registry (reg_qty, reg_time_block, reg_real_time, reg_order_id) VALUES ($value, '$hr', '$date', $order)";
$result = mysqli_query($connection, $query);
if(!$result)
{
    die("Failed $query");
}

$query_item_number = "UPDATE plan_hrxhr SET $id";
$result_item_number = mysqli_query($connection, $query_item_number);
if(!$result_item_number){
    die("Failed $query");
}
$row = mysqli_fetch_array($result_item_number); 
