<?php
require_once("_settings/db.php");

function getQuantity($row, $id)
{
    global $connection;

    $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = $id";
    $run_current_num = mysqli_query($connection, $get_current_num);
    $row_current = mysqli_fetch_array($run_current_num);

    $response = <<<DELIMETER
        <span id='id_new_quantity_$id'>{$row_current['quantity']}</span>
        <span class="text-primary">/</span>
        <span id="id_quantity_$id">{$row[$id]}</span>
   DELIMETER;

    echo $response;
}

function getStation($row, $hour)
{
    if ($row['pn_' . $hour] = 'pn_0') {
        $response = <<<DELIMETER
        <div>
        <p>{$row['asset_name']}</p>
        <p class="text-primary fw-bold">
            {$row['pn_24']}
        </p>
        </div>
        DELIMETER;
        echo $response;
    } else {
        $response = <<<DELIMETER
        <div>
        <p>{$row['asset_name']}</p>
        <p class="text-primary fw-bold">
            {$row['pn_' .$hour]}
        </p>
        </div>
    DELIMETER;
        echo $response;
    }
}
