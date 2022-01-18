<div class="container table-responsive">
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
                $cont = 0;
                $today = Today();
                $query_stations = "SELECT * FROM assets 
                LEFT JOIN site ON asset_site = site_id 
                LEFT JOIN plant ON site.plant_id = plant.plant_id 
                LEFT JOIN plan_hrxhr ON plan_hrxhr.plan_asset = asset_id 
                WHERE plan_hrxhr.plant_id = {$_GET['plant_id']}  
                AND plan_hrxhr.date = '$today' 
                AND (plan_hrxhr.status = 0 OR plan_hrxhr.status = 1);";

                $result = mysqli_query($connection, $query_stations);
                if(!$result){
                    echo "Query failed" . $query_stations;
                    die();
                }
                while ($row = mysqli_fetch_array($result)):
                    $cont++
            ?>
            <tr>
                <td class="datacell">
                    <div>
                        <p><?php echo $row['asset_name'] ?></p>
                        <p>
                            <?php
                            $hour = nowHour();
                            echo $row['pn_'.$hour];
                            ?>
                        </p>
                    </div>
                </td>
                <td class="hourcell">
                    <input id="inputValue_1" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 1);"  data-maquina="<?php echo $row['asset_id']; ?>" data-hr="6" type="button" id="6s"   class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>

                    <?php
                    $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 6";
                    $run_current_num = mysqli_query($connection, $get_current_num);
                    $row_current = mysqli_fetch_array($run_current_num);
                    //echo $row_current['quantity'];
                    ?>
                    <span id="<?php echo "col_h6".$cont; ?>" class="hr_output"><?php echo $row_current['quantity']; ?></span>

                    <span class="text-primary">/</span>

                    <?php echo $row['6'] ?>

                </td>
                <td>
                    <input id="inputValue_2" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 2);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_3" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 3);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_4" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 4);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_5" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 5);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_6" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 6);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_7" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 7);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_8" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 8);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_9" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 9);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_10" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 10);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_11" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 11);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_12" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 12);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_13" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 13);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_14" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 14);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_15" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 15);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_16" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 16);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_17" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 17);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_18" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 18);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_19" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 19);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_20" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 20);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_21" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 21);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_22" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 22);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_23" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 23);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
                <td>
                    <input id="inputValue_24" class="form-control" type="number" value="0" style="min-width: 8rem;" />
                    <button onclick="getSnackbar(this, 24);" class="btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <mwc-snackbar id="snackbarAlert" labeltext="">
        <mwc-icon-button icon="close" slot="dismiss"></mwc-icon-button>
    </mwc-snackbar>
</div>

<script>
    function getSnackbar(element, id) {
        let dataValue = document.querySelector('#inputValue_' + id).value;
        let snackbar = document.querySelector('#snackbarAlert');
        snackbar.labelText = "has been captured" + " " + dataValue + " " + "parts";
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

<script>

</script>
