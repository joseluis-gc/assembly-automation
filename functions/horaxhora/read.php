<?php
require_once "../../_settings/db.php";

$maquina = $_POST['maquina'];
$hora    = $_POST['hr'];
$id = $_POST['id'];
$item_name = $_POST['item_name'];
$plan = $_POST['plan'];

$pz = 0;
$query_order = "SELECT * FROM plan_hrxhr WHERE plan_asset = ".$maquina."";
$run_query_order = mysqli_query($connection, $query_order);
if(!$run_query_order){
    die("Failed $query_order");
}
$row = mysqli_fetch_array($run_query_order);

$query = "SELECT * FROM hour_registry WHERE reg_order_id = $plan AND reg_time_block = $hora";
$result = mysqli_query($connection, $query);
if(!$result)
{
    die("Failed $query");
}
while($row_data = mysqli_fetch_array($result)){
    $pz += $row_data['reg_qty'];
}
echo $pz;
