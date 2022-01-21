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
            if (!$result) {
                echo "Query failed" . $query_stations;
                die();
            }
            while ($row = mysqli_fetch_array($result)) :
                $cont++;
                echo $cont;
                echo $cont, "<br>";
            ?>
                <tr>
                    <td class="datacell">
                        <div>
                            <p><?php echo $row['asset_name'] ?></p>
                            <p class="text-primary fw-bold">
                                <?php
                                $hour = nowHour();
                                echo $row['pn_' . $hour];
                                ?>
                            </p>
                        </div>
                    </td>

                    <td class="hourcell">
                        <span id='pn_6' class="pn_now"><?php echo $row['pn_6'] ?></span>
                        <input id="inputValue_1" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 1);" data-item='<?php echo $row['pn_6'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="6" type="button" id="6" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 6";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h6" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf6" class="hr_output2"><?php echo $row['6'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_7' class="pn_now"><?php echo $row['pn_7'] ?></span>
                        <input id="inputValue_2" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 2);" data-item='<?php echo $row['pn_7'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="7" type="button" id="7" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 7";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h7" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf7" class="hr_output2"><?php echo $row['7'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_8' class="pn_now"><?php echo $row['pn_8'] ?></span>
                        <input id="inputValue_3" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 3);" data-item='<?php echo $row['pn_8'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="8" type="button" id="8" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 8";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h8" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf8" class="hr_output2"><?php echo $row['8'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_9' class="pn_now"><?php echo $row['pn_9'] ?></span>
                        <input id="inputValue_4" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 4);" data-item='<?php echo $row['pn_9'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="9" type="button" id="9" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 9";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h9" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf9" class="hr_output2"><?php echo $row['9'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_10' class="pn_now"><?php echo $row['pn_10'] ?></span>
                        <input id="inputValue_5" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 5);" data-item='<?php echo $row['pn_10'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="10" type="button" id="10" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 10";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h10" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf10" class="hr_output2"><?php echo $row['10'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_11' class="pn_now"><?php echo $row['pn_11'] ?></span>
                        <input id="inputValue_6" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 6);" data-item='<?php echo $row['pn_11'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="11" type="button" id="11" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 11";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h11" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf11" class="hr_output2"><?php echo $row['11'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_<?php echo $cont ?>' class="pn_now"><?php echo $row['pn_12'] ?></span>
                        <input id="inputValue_7" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 7);" data-item='<?php echo $row['pn_12'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="12" type="button" id="12" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 12";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h12" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf12" class="hr_output2"><?php echo $row['12'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_13' class="pn_now"><?php echo $row['pn_13'] ?></span>
                        <input id="inputValue_8" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 8);" data-item='<?php echo $row['pn_13'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="13" type="button" id="13" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 13";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h13" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf13" class="hr_output2"><?php echo $row['13'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_14' class="pn_now"><?php echo $row['pn_14'] ?></span>
                        <input id="inputValue_9" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 9);" data-item='<?php echo $row['pn_14'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="14" type="button" id="14" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 14";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h14" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf14" class="hr_output2"><?php echo $row['14'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_15' class="pn_now"><?php echo $row['pn_15'] ?></span>
                        <input id="inputValue_10" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 10);" data-item='<?php echo $row['pn_15'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="15" type="button" id="15" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 15";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h15" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf15" class="hr_output2"><?php echo $row['15'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_16' class="pn_now"><?php echo $row['pn_16'] ?></span>
                        <input id="inputValue_11" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 11);" data-item='<?php echo $row['pn_16'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="16" type="button" id="16" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 16";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h16" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf16" class="hr_output2"><?php echo $row['16'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_17' class="pn_now"><?php echo $row['pn_17'] ?></span>
                        <input id="inputValue_12" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 12);" data-item='<?php echo $row['pn_17'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="17" type="button" id="17" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 17";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h17" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf17" class="hr_output2"><?php echo $row['17'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_18' class="pn_now"><?php echo $row['pn_18'] ?></span>
                        <input id="inputValue_13" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 13);" data-item='<?php echo $row['pn_18'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="18" type="button" id="18" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 18";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h18" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf18" class="hr_output2"><?php echo $row['18'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_19' class="pn_now"><?php echo $row['pn_19'] ?></span>
                        <input id="inputValue_14" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 14);" data-item='<?php echo $row['pn_19'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="19" type="button" id="19" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 19";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h19" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf19" class="hr_output2"><?php echo $row['19'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_20' class="pn_now"><?php echo $row['pn_20'] ?></span>
                        <input id="inputValue_15" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 15);" data-item='<?php echo $row['pn_20'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="20" type="button" id="20" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 20";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h20" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf20" class="hr_output2"><?php echo $row['20'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_21' class="pn_now"><?php echo $row['pn_21'] ?></span>
                        <input id="inputValue_16" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 16);" data-item='<?php echo $row['pn_21'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="21" type="button" id="21" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 21";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h21" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf21" class="hr_output2"><?php echo $row['21'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_22' class="pn_now"><?php echo $row['pn_22'] ?></span>
                        <input id="inputValue_17" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 17);" data-item='<?php echo $row['pn_22'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="22" type="button" id="22" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 22";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h22" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf22" class="hr_output2"><?php echo $row['22'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_23' class="pn_now"><?php echo $row['pn_23'] ?></span>
                        <input id="inputValue_18" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 18);" data-item='<?php echo $row['pn_23'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="23" type="button" id="23" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 23";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h23" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf23" class="hr_output2"><?php echo $row['23'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_0' class="pn_now"><?php echo $row['pn_0'] ?></span>
                        <input id="inputValue_19" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 19);" data-item='<?php echo $row['pn_0'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="0" type="button" id="0" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 0";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h0" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf0" class="hr_output2"><?php echo $row['0'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_1' class="pn_now"><?php echo $row['pn_1'] ?></span>
                        <input id="inputValue_20" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 20);" data-item='<?php echo $row['pn_1'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="1" type="button" id="1" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 1";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h1" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf1" class="hr_output2"><?php echo $row['1'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_2' class="pn_now"><?php echo $row['pn_2'] ?></span>
                        <input id="inputValue_21" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 21);" data-item='<?php echo $row['pn_2'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="2" type="button" id="2" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 2";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h2" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf2" class="hr_output2"><?php echo $row['2'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_3' class="pn_now"><?php echo $row['pn_3'] ?></span>
                        <input id="inputValue_22" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 22);" data-item='<?php echo $row['pn_3'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="3" type="button" id="3" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 3";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h3" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf3" class="hr_output2"><?php echo $row['3'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_4' class="pn_now"><?php echo $row['pn_4'] ?></span>
                        <input id="inputValue_23" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 23);" data-item='<?php echo $row['pn_4'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="4" type="button" id="4" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 4";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h4" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf4" class="hr_output2"><?php echo $row['4'] ?></span>
                    </td>
                    <td class="hourcell">
                        <span id='pn_5' data_item="item_number" class="pn_now"><?php echo $row['pn_5'] ?></span>
                        <input id="inputValue_24" class="form-control hr_input" type="number" name="value" style="min-width: 8rem;" />
                        <button onclick="getSnackbar(this, 24);" data-item='<?php echo $row['pn_5'] ?>' data-maquina="<?php echo $row['asset_id']; ?>" data-hr="5" type="button" id="5" class="tablahrxhr btn btn-raised-primary shadow-5 ripple-info w-100 m-auto d-block mt-1">Guardar</button>
                        <?php
                        $get_current_num = "SELECT SUM(reg_qty) AS quantity FROM hour_registry WHERE reg_order_id = {$row['plan_id']} AND reg_time_block = 5";
                        $run_current_num = mysqli_query($connection, $get_current_num);
                        $row_current = mysqli_fetch_array($run_current_num);
                        ?>
                        <span id="col_h5" class="hr_output"><?php echo $row_current['quantity']; ?></span>
                        <span class="text-primary">/</span>
                        <span id="col_hf5" class="hr_output2"><?php echo $row['5'] ?></span>
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
<script>
</script>