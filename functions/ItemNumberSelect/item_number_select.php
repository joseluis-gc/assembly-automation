<?php
require_once("../../_settings/db.php");

$query = "SELECT DISTINCT routing, hrs FROM hour_pph";
$result = $connection->query($query);

if ($result->num_rows > 0) {
    echo '<option value="">Select Item Number</option>';
    while ($row = $result->fetch_assoc()) {
        echo '<option data-hrs="' . $row['hrs'] . '" value="' . $row['routing'] . '"></option>';
    }
} else {
    echo '<option value="">Item Number invalid</option>';
}
