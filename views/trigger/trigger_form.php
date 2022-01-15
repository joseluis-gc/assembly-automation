<?php
global $connection;

if (!empty($_POST["plant_id"])) {

    echo $query = "SELECT * FROM site WHERE plant_id = " . $_POST['plant_id'] . " ";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        echo '<option value="">Select Site</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['site_id'] . '">' . $row['site_name'] . '</option>';
        }
    } else {
        echo '<option value="">No Sites.</option>';
    }
} elseif (!empty($_POST["site_id"])) {
    $query = "SELECT * FROM assets WHERE asset_site = " . $_POST['site_id'] . " ";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        echo '<option value="">Select Asset</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['asset_id'] . '">' . $row['asset_name'] . '</option>';
        }
    } else {
        echo '<option value="">No Assets Available.</option>';
    }
}
