<?php
require_once "../../_settings/db.php";

$maquina = $_POST['maquina'];
$id = $_POST['id'];
$number_item = $_POST['number_item'];

$query = "SELECT * FROM plan_hrxhr WHERE plan_asset = '".$maquina."' ";
$result = mysqli_query($connection, $query);
if(!$result){
    die("Failed $query");
}
$row = mysqli_fetch_array($result);
$order = $row['plan_id'];
$item_number = $row[$id];

echo $item_number;