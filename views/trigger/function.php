<?php
function escape_string($string)
{
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

function getPlants()
{
    global $connection;

    $query = "SELECT * FROM plant";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query error");
    }
    if (mysqli_num_rows($result) == 0) {
        die("Nothing worked");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $plant = <<<DELIMETER
        <option value='{$row['plant_id']}'>{$row['plant_name']}</option>
        DELIMETER;
        echo $plant;
    };
};

function getAssets()
{
    global $connection;

    $query = "SELECT * FROM assets";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query error");
    }
    if (mysqli_num_rows($result) == 0) {
        die("Nothing worked");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $asset = <<<DELIMETER
        <option value='{$row['asset_id']}'>{$row['asset_control_number']}</option>
        DELIMETER;
        echo $asset;
    };
};

function getCapture()
{
    global $connection;

    $query = "SELECT * FROM users_backup";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query error");
    }
    if (mysqli_num_rows($result) == 0) {
        die("Nothing worked");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $capture = <<<DELIMETER
        <option value='{$row['asset_id']}'>{$row['user_firstname']} {$row['user_lastname']}</option>
        DELIMETER;
        echo $capture;
    };
};

function getSite()
{
    global $connection;

    $query = "SELECT * FROM site"; 
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query error");
    }
    if (mysqli_num_rows($result) == 0) {
        die("Nothing worked");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $site = <<<DELIMETER
        <option value='{$row['site_id']}'>{$row['site_name']}</option>
        DELIMETER;
        echo $site;
    };
};

function getAlertName()
{
    global $connection;

    $query = "SELECT * FROM alerts  WHERE alert_id = " . escape_string($_GET['alert_id']) . "";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query error");
    }
    if (mysqli_num_rows($result) == 0) {
        die("Nothing worked");
    }
    $row = mysqli_fetch_array($result);
    echo "{$row['alert_name']}";
}

function addInput($name, $id, $label)
{
    $input = <<<DELEMETER
    <label for='$id'>$label</label>
    <input class='form-control' name='$name' id='$id' >
    DELEMETER;
    echo $input;
};

function getAlertChild()
{
    global $connection;

    $query = "SELECT * FROM alert_child  WHERE alert_id = " . escape_string($_GET['alert_id']) . "";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query error");
    }
    if (mysqli_num_rows($result) == 0) {
        die("Nothing worked");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $alert_child = <<<DELIMETER
        <option value='{$row['child_id']}'>{$row['child_name']}</option>
        DELIMETER;
        echo $alert_child;
    };
}
