<?php require_once('functions/horaxhora/functions.php') ?>
<div class="container-fluid table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>Estación</th>
                <th id="th_2">06:00am</th>
                <th id="th_3">07:00am</th>
                <th id="th_4">08:00am</th>
                <th id="th_5">09:00am</th>
                <th id="th_6">10:00am</th>
                <th id="th_7">11:00am</th>
                <th id="th_8">12:00pm</th>
                <th id="th_9">13:00pm</th>
                <th id="th_10">14:00pm</th>
                <th id="th_11">15:00pm</th>
                <th id="th_12">16:00pm</th>
                <th id="th_13">17:00pm</th>
                <th id="th_14">18:00pm</th>
                <th id="th_15">19:00pm</th>
                <th id="th_16">20:00pm</th>
                <th id="th_17">21:00pm</th>
                <th id="th_18">22:00pm</th>
                <th id="th_19">23:00pm</th>
                <th id="th_20">00:00am</th>
                <th id="th_21">01:00am</th>
                <th id="th_22">02:00am</th>
                <th id="th_23">03:00am</th>
                <th id="th_24">04:00am</th>
                <th id="th_25">05:00am</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $cont_id = 0;
            $today = Today();
            $hour = nowHour();
            $query_stations = "SELECT * FROM assets 
                LEFT JOIN site ON asset_site = site_id 
                LEFT JOIN plant ON site.plant_id = plant.plant_id 
                LEFT JOIN plan_hrxhr ON plan_hrxhr.plan_asset = asset_id 
                WHERE plan_hrxhr.plant_id = {$_GET['plant_id']}  
                AND plan_hrxhr.date = '$today' 
                AND (plan_hrxhr.status = 0 OR plan_hrxhr.status = 1);";

            $result = mysqli_query($connection, $query_stations);
            if (!$result) {
                echo "Query failed" . $query_stations;
                die();
            }
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td class="datacell">
                        <?php getStation($row, $hour) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_6'] ? $row['pn_6'] : "N/A"; ?></span>
                        <input id="inputValue_1" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_6'] ?>' data-wrapper="1" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="6" type="button" id="6" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 6) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_7'] ? $row['pn_7'] : "N/A"; ?></span>
                        <input id="inputValue_2" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_7'] ?>' data-wrapper="2" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="7" type="button" id="7" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 7) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_8'] ? $row['pn_8'] : "N/A"; ?></span>
                        <input id="inputValue_3" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_8'] ?>' data-wrapper="3" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="8" type="button" id="8" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 8) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_9'] ? $row['pn_9'] : "N/A"; ?></span>
                        <input id="inputValue_4" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_9'] ?>' data-wrapper="4" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="9" type="button" id="9" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 9) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_10'] ? $row['pn_10'] : "N/A"; ?></span>
                        <input id="inputValue_5" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_10'] ?>' data-wrapper="5" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="10" type="button" id="10" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 10) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_11'] ? $row['pn_11'] : "N/A"; ?></span>
                        <input id="inputValue_6" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_11'] ?>' data-wrapper="6" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="11" type="button" id="11" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 11) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_12'] ? $row['pn_12'] : "N/A"; ?></span>
                        <input id="inputValue_7" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_12'] ?>' data-wrapper="7" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="12" type="button" id="12" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 12) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_13'] ? $row['pn_13'] : "N/A"; ?></span>
                        <input id="inputValue_8" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_13'] ?>' data-wrapper="8" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="13" type="button" id="13" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 13) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_14'] ? $row['pn_14'] : "N/A"; ?></span>
                        <input id="inputValue_9" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_14'] ?>' data-wrapper="9" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="14" type="button" id="14" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 14) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_15'] ? $row['pn_15'] : "N/A"; ?></span>
                        <input id="inputValue_10" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_15'] ?>' data-wrapper="10" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="15" type="button" id="15" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 15) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_16'] ? $row['pn_16'] : "N/A"; ?></span>
                        <input id="inputValue_11" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_16'] ?>' data-wrapper="11" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="16" type="button" id="16" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 16) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_17'] ? $row['pn_17'] : "N/A"; ?></span>
                        <input id="inputValue_12" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_17'] ?>' data-wrapper="12" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="17" type="button" id="17" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3 ">Guardar</button>
                        <?php getQuantity($row, 17) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_18'] ? $row['pn_18'] : "N/A"; ?></span>
                        <input id="inputValue_13" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_18'] ?>' data-wrapper="13" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="18" type="button" id="18" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 18) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_19'] ? $row['pn_19'] : "N/A"; ?></span>
                        <input id="inputValue_14" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_19'] ?>' data-wrapper="14" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="19" type="button" id="19" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 19) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_20'] ? $row['pn_20'] : "N/A"; ?></span>
                        <input id="inputValue_15" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_20'] ?>' data-wrapper="15" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="20" type="button" id="20" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 20) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_21'] ? $row['pn_21'] : "N/A"; ?></span>
                        <input id="inputValue_16" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_21'] ?> ' data-wrapper="16" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="21" type="button" id="21" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 21) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_22'] ? $row['pn_22'] : "N/A"; ?></span>
                        <input id="inputValue_17" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_22'] ?>' data-wrapper="17" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="22" type="button" id="22" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 22) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_23'] ? $row['pn_23'] : "N/A"; ?></span>
                        <input id="inputValue_18" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_23'] ?>' data-wrapper="18" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="23" type="button" id="23" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 23) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_24'] ? $row['pn_24'] : "N/A"; ?></span>
                        <input id="inputValue_19" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_24'] ?>' data-wrapper="19" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="0" type="button" id="0" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 24) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_1'] ? $row['pn_1'] : "N/A"; ?></span>
                        <input id="inputValue_20" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_1'] ?>' data-wrapper="20" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="1" type="button" id="1" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 1) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_2'] ? $row['pn_2'] : "N/A"; ?></span>
                        <input id="inputValue_21" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_2'] ?>' data-wrapper="21" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="2" type="button" id="2" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 2) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_3'] ? $row['pn_3'] : "N/A"; ?></span>
                        <input id="inputValue_22" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_3'] ?>' data-wrapper="22" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="3" type="button" id="3" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 3) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_4'] ? $row['pn_4'] : "N/A"; ?></span>
                        <input id="inputValue_23" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_4'] ?>' data-wrapper="23" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="4" type="button" id="4" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 4) ?>
                    </td>
                    <td class="hourcell">
                        <span id='id_<?php echo ++$cont_id; ?>'><?php echo $row['pn_5'] ? $row['pn_5'] : "N/A"; ?></span>
                        <input id="inputValue_24" class="form-control item_number" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this);" data-item='<?php echo $row['pn_5'] ?>' data-wrapper="24" data-plan="<?php echo $row['plan_id']; ?>" data-maquina="<?php echo $row['asset_id']; ?>" data-hr="5" type="button" id="5" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1 mb-3">Guardar</button>
                        <?php getQuantity($row, 5) ?>
                    </td>
                <?php } ?>
        </tbody>
    </table>
    <mwc-snackbar id="snackbarAlert" labeltext="">
        <mwc-icon-button icon="close" slot="dismiss"></mwc-icon-button>
    </mwc-snackbar>
</div>

<script>
    function getSnackbar(element) {
        var get_id_wrapper = element.getAttribute('data-wrapper');

        console.log(get_id_wrapper)

        let dataValue = document.querySelector('#inputValue_' + get_id_wrapper).value;
        let snackbar = document.querySelector('#snackbarAlert');

        snackbar.labelText = dataValue + " items have been added";
        snackbar.show();
    };

    window.onload = function() {
        var d = new Date();
        var h = d.getHours();

        if (h === 6) {
            $('#th_2').css("background-color", "#E0CCFB");
        }
        if (h === 7) {
            $('#th_3').css("background-color", "#E0CCFB");
        }
        if (h === 8) {
            $('#th_4').css("background-color", "#E0CCFB");
        }
        if (h === 9) {
            $('#th_5').css("background-color", "#E0CCFB");
        }
        if (h === 10) {
            $('#th_6').css("background-color", "#E0CCFB");
        }
        if (h === 11) {
            $('#th_7').css("background-color", "#E0CCFB");
        }
        if (h === 12) {
            $('#th_8').css("background-color", "#E0CCFB");
        }
        if (h === 13) {
            $('#th_9').css("background-color", "#E0CCFB");
        }
        if (h === 14) {
            $('#th_10').css("background-color", "#E0CCFB");
        }
        if (h === 15) {
            $('#th_11').css("background-color", "#E0CCFB");
        }
        if (h === 16) {
            $('#th_12').css("background-color", "#E0CCFB");
        }
        if (h === 17) {
            $('#th_13').css("background-color", "#E0CCFB");
        }
        if (h === 18) {
            $('#th_14').css("background-color", "#E0CCFB");
        }
        if (h === 19) {
            $('#th_15').css("background-color", "#E0CCFB");
        }
        if (h === 20) {
            $('#th_16').css("background-color", "#E0CCFB");
        }
        if (h === 21) {
            $('#th_17').css("background-color", "#E0CCFB");
        }
        if (h === 22) {
            $('#th_18').css("background-color", "#E0CCFB");
        }
        if (h === 23) {
            $('#th_19').css("background-color", "#E0CCFB");
        }
        if (h === 0) {
            $('#th_20').css("background-color", "#E0CCFB");
        }
        if (h === 1) {
            $('#th_21').css("background-color", "#E0CCFB");
        }
        if (h === 2) {
            $('#th_22').css("background-color", "#E0CCFB");
        }
        if (h === 3) {
            $('#th_23').css("background-color", "#E0CCFB");
        }
        if (h === 4) {
            $('#th_24').css("background-color", "#E0CCFB");
        }
        if (h === 5) {
            $('#th_25').css("background-color", "#E0CCFB");
        }
    };
</script>