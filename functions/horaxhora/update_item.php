<?php
require_once "../../_settings/db.php";

$id = $_POST['id'];
$date = date("Y-m-d H:i:s");
$get_value = $_POST['value'];
$get_hr = $_POST['hr'];
$maquina = $_POST['maquina'];
$item_name = $_POST['item_name'];

$query_item_name = "SELECT * FROM plan_hrxhr WHERE plan_asset = ".$maquina."";
$result_item_name = mysqli_query($connection, $query_item_name);
if (!$result_item_name) {
    die("Failed $query_item_name");
}
$row = mysqli_fetch_array($result_item_name);

echo $row['pn_'.$id];
