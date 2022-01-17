<?php
require_once("./../../_settings/db.php");
global $connection;

if (!empty($_POST["plant_id"])) {

    echo $query = "SELECT * FROM site WHERE plant_id = " . $_POST['plant_id'] . " ";
    $result = mysqli_query($connection, $query);

    if ($result->num_rows > 0) {
        echo '<option value="">Seleccione un departamento</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['site_id'] . '">' . $row['site_name'] . '</option>';
        }
    } else {
        echo '<option value="">Seleccione planta primero</option>';
    }
} elseif (!empty($_POST["site_id"])) {
    $query = "SELECT * FROM assets WHERE asset_site = " . $_POST['site_id'] . " ";
    $result = mysqli_query($connection, $query);

    if ($result->num_rows > 0) {
        echo '<option value="">Seleccione máquina</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['asset_id'] . '">' . $row['asset_name'] . '</option>';
        }
    } else {
        echo '<option value="">Seleccione departamento primero</option>';
    }
}
