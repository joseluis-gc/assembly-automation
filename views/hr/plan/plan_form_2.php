<style>
    .invisible {
        border: 0;
        background-color: transparent;
    }
</style>
<?php
if (isset($_GET['asset_id']) && is_numeric($_GET['asset_id'])) {
    $query = "SELECT * FROM assets 
    LEFT JOIN site ON asset_site = site_id 
    LEFT JOIN plant ON plant.plant_id = site.plant_id 
    WHERE asset_id = {$_GET['asset_id']}";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
} else {
    die("Invalid Parameter.");
}

require_once "classes/Plan.php";
$response = new Plan();
if (isset($response)) {
    if ($response->errors) {
        foreach ($response->errors as $error) {
            echo $error;
        }
    }
    if ($response->messages) {
        foreach ($response->messages as $message) {
            echo $message;
        }
    }
}
?>
<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="plant_id" value="<?php echo $row['plant_id'] ?>">
    <input type="hidden" name="site_id" value="<?php echo $row['site_id'] ?>">
    <input type="hidden" name="asset_id" value="<?php echo $row['asset_id'] ?>">

    <table class="table container text-center table-info table-bordered mb-0 mt-3">
        <thead>
            <tr>
                <th scope="col" class="fw-bold"><small>PLANT:</small></th>
                <th scope="col" class="table-light">
                    <input type="text" name="plant_name" value="<?php echo $row['plant_name'] ?>">
                </th>
                <th scope="col" class="fw-bold"><small>AREA:</small></th>
                <th scope="col" class="table-light">
                    <input type="text" name="area_id" value="<?php echo $row['site_name'] ?>">
                </th>
                <th scope="col" class="fw-bold"><small>OUTPUT:</small></th>
                <th scope="col" class="table-light">
                    <input type="text" name="output_id" value="<?php echo $row['asset_name']; ?>">
                </th>
                <th scope="col" class="fw-bold"><small>SHIFT:</small></th>
                <th scope="col" class="table-light">
                    <input type="text" name="sift_id" value="<?php echo getShift() ?>">
                </th>
                <th scope="col" class="fw-bold"><small>HC:</small></th>
                <th scope="col" class="table-light">
                    <input type="number" name="hc_id" id="hc-head" onkeyup="addHC()" />
                </th>
                <th scope="col" class="fw-bold"><small>DATE:</small></th>
                <th scope="col" class="table-light">
                    <input style="min-width: 10rem; border: 0; background-color: transparent;" name="date_id" class="form-control" type="date" value="<?php echo date("Y-m-d") ?>">
                </th>
                <th scope="col" class="fw-bold"><small>SUPERVISOR:</small></th>
                <th scope="col" class="table-light">
                    <input type="text" name="supervisor_id" value="">
                </th>
            </tr>
        </thead>
    </table>
    <div class="form-check mt-3 mb-3 d-flex justify-content-end px-5">
            <input class="form-check-input mt-2" style="width: 1.5rem; height: 1.5rem;" id="flexCheckDefault" onchange="document.getElementById('factor_multiplicador').disabled = !this.checked;" type="checkbox" value="">
            <label class="form-check-label px-3 mt-2" for="flexCheckDefault">Factor multiplicador</label>
            <input class="form-control" style="width: 10rem;" type="text" name="factor_multiplicador" disabled id="factor_multiplicador" placeholder="Factor multiplicador">
        </div>
    <div>
        <table class="table container text-center table-bordered mb-0 mt-4">
            <thead>
                <tr class="bg-primary text-light">
                    <th scope="col" class="fw-bold"><small>HR</small></th>
                    <th scope="col" class="fw-bold"><small>HC</small></th>
                    <th scope="col" class="fw-bold"><small>ITEM NUMBER</small></th>
                    <th scope="col" class="fw-bold"><small>WO NUMBER</small></th>
                    <th scope="col" class="fw-bold"><small>PLAN BY HR</small></th>
                    <th scope="col" class="fw-bold"><small>CUM PLAN</small></th>
                    <th scope="col" class="fw-bold"><small>PLANNED INTERRUPTION</small></th>
                    <th scope="col" class="fw-bold"><small>LESS TIME</small></th>
                    <th scope="col" class="fw-bold"><small>STD TIME</small></th>
                    <th scope="col" class="fw-bold">
                        <small> CALCULATED QTY BY HR <br />
                            (HC - LESS TIME) / STD TIME</small>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="min-width: 9rem;" class="table-info">15:30-16:00pm</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_15" id="hc_10" onkeyup="calculatedQtyByHr(10)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(10)" id="input_item_number_10" onchange="getValueSelectedItemNumber(this, 10);" placeholder="Select" type="text" list="pn" name="partno_15" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_15" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_15" />
                    </td>
                    <td class="table-info" id="cum_plan_10" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 15rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(10)" onchange="add_Select(this, 10);" class="form-control" required>
                            <option value="">Select</option>
                            <?php
                            $query = "SELECT * FROM planned_interruptions";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($result)) :
                            ?>
                                <option value="<?php echo $row['i_time'] ?>"><?php echo $row['i_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                    <td class="table-info" id="less_time"><input type="text" name="less_time_15" id="less_time_10" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_15" id="stnd_time_10" disabled="true"></td>
                    <td class="table-info" style="min-width: 8rem;" id="qty_by_hr"><input type="text" name="qty_by_hr_15" id="qty_by_hr_10" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">16:00-17:00pm</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_16" id="hc_11" onkeyup="calculatedQtyByHr(11)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(11)" id="input_item_number_11" onchange="getValueSelectedItemNumber(this, 11);" placeholder="Select" type="text" list="pn" name="partno_16" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_16" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_16" />
                    </td>
                    <td class="table-info" id="cum_plan_11" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(11)" onchange="add_Select(this, 11);" class="form-control">
                            <option value="">Select</option>
                            <?php
                            $query = "SELECT * FROM planned_interruptions";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($result)) :
                            ?>
                                <option value="<?php echo $row['i_time'] ?>"><?php echo $row['i_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                    <td class="table-info" id="less_time"><input type="text" name="less_time_16" id="less_time_11" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_16" id="stnd_time_11" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_16" id="qty_by_hr_11" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">17:00-18:00pm</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_17" id="hc_12" onkeyup="calculatedQtyByHr(12)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(12)" id="input_item_number_12" onchange="getValueSelectedItemNumber(this, 12);" placeholder="Select" type="text" list="pn" name="partno_17" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_17" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_17" />
                    </td>
                    <td class="table-info" id="cum_plan_12" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(12)" onchange="add_Select(this, 12);" class="form-control">
                            <option value="">Select</option>
                            <?php
                            $query = "SELECT * FROM planned_interruptions";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($result)) :
                            ?>
                                <option value="<?php echo $row['i_time'] ?>"><?php echo $row['i_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                    <td class="table-info" id="less_time"><input type="text" name="less_time_17" id="less_time_12" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_17" id="stnd_time_12" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_17" id="qty_by_hr_12" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">18:00-19:00pm</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_18" id="hc_13" onkeyup="calculatedQtyByHr(13)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(13)" id="input_item_number_13" onchange="getValueSelectedItemNumber(this, 13);" placeholder="Select" type="text" list="pn" name="partno_18" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_18" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_18" />
                    </td>
                    <td class="table-info" id="cum_plan_13" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(13)" onchange="add_Select(this, 13);" class="form-control">
                            <option value="">Select</option>
                            <?php
                            $query = "SELECT * FROM planned_interruptions";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($result)) :
                            ?>
                                <option value="<?php echo $row['i_time'] ?>"><?php echo $row['i_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                    <td class="table-info" id="less_time"><input type="text" name="less_time_18" id="less_time_13" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_18" id="stnd_time_13" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_18" id="qty_by_hr_13" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">19:00-20:00pm</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_19" id="hc_14" onkeyup="calculatedQtyByHr(14)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(14)" id="input_item_number_14" onchange="getValueSelectedItemNumber(this, 14);" placeholder="Select" type="text" list="pn" name="partno_19" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_19" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_19" />
                    </td>
                    <td class="table-info" id="cum_plan_14" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(14)" onchange="add_Select(this, 14);" class="form-control">
                            <option value="">Select</option>
                            <?php
                            $query = "SELECT * FROM planned_interruptions";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($result)) :
                            ?>
                                <option value="<?php echo $row['i_time'] ?>"><?php echo $row['i_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                    <td class="table-info" id="less_time"><input type="text" name="less_time_19" id="less_time_14" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_19" id="stnd_time_14" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_19" id="qty_by_hr_14" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">20:00-21:00pm</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_20" id="hc_15" onkeyup="calculatedQtyByHr(15)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(15)" id="input_item_number_15" onchange="getValueSelectedItemNumber(this, 15);" placeholder="Select" type="text" list="pn" name="partno_20" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_20" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_20" />
                    </td>
                    <td class="table-info" id="cum_plan_15" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(15)" onchange="add_Select(this, 15);" class="form-control">
                            <option value="">Select</option>
                            <?php
                            $query = "SELECT * FROM planned_interruptions";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($result)) :
                            ?>
                                <option value="<?php echo $row['i_time'] ?>"><?php echo $row['i_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                    <td class="table-info" id="less_time"><input type="text" name="less_time_20" id="less_time_15" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_20" id="stnd_time_15" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_20" id="qty_by_hr_15" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">21:00-22:00pm</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_21" id="hc_16" onkeyup="calculatedQtyByHr(16)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(16)" id="input_item_number_16" onchange="getValueSelectedItemNumber(this, 16);" placeholder="Select" type="text" list="pn" name="partno_21" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_21" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_21" />
                    </td>
                    <td class="table-info" id="cum_plan_16" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(16)" onchange="add_Select(this, 16);" class="form-control">
                            <option value="">Select</option>
                            <?php
                            $query = "SELECT * FROM planned_interruptions";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($result)) :
                            ?>
                                <option value="<?php echo $row['i_time'] ?>"><?php echo $row['i_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                    <td class="table-info" id="less_time"><input type="text" name="less_time_21" id="less_time_16" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_21" id="stnd_time_16" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_21" id="qty_by_hr_16" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">22:00-23:00pm</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_22" id="hc_17" onkeyup="calculatedQtyByHr(17)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_17" onkeyup="calculatedQtyByHr(17)" onchange="getValueSelectedItemNumber(this, 17);" placeholder="Select" type="text" list="pn" name="partno_22" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_22" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_22" />
                    </td>
                    <td class="table-info" id="cum_plan_17" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(17)" onchange="add_Select(this, 17);" class="form-control">
                            <option value="">Select</option>
                            <?php
                            $query = "SELECT * FROM planned_interruptions";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($result)) :
                            ?>
                                <option value="<?php echo $row['i_time'] ?>"><?php echo $row['i_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                    <td class="table-info" id="less_time"><input type="text" name="less_time_22" id="less_time_17" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_22" id="stnd_time_17" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_22" id="qty_by_hr_17" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">23:00-00:00pm</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_23" id="hc_18" onkeyup="calculatedQtyByHr(18)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_18" onkeyup="calculatedQtyByHr(18)" onchange="getValueSelectedItemNumber(this, 18);" placeholder="Select" type="text" list="pn" name="partno_23" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_23" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_23" />
                    </td>
                    <td class="table-info" id="cum_plan_18" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(18)" onchange="add_Select(this, 18);" class="form-control">
                            <option value="">Select</option>
                            <?php
                            $query = "SELECT * FROM planned_interruptions";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($result)) :
                            ?>
                                <option value="<?php echo $row['i_time'] ?>"><?php echo $row['i_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                    <td class="table-info" id="less_time"><input type="text" name="less_time_23" id="less_time_18" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_23" id="stnd_time_18" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_23" id="qty_by_hr_18" disabled="true"></td>
                </tr>
            </tbody>
        </table>
        <div class="mt-5 d-flex justify-content-end p-5">
            <button type="submit" name="register_plan" class="btn btn-primary">SAVE CHANGES</button>
        </div>
    </div>
</form>

<script>
    //ADD HC IN CELLS
    function addHC() {
        var elements = document.querySelectorAll(".hc");
        var valor = document.getElementById('hc-head').value;

        for (var i = 0; i < elements.length; i++) {
            elements[i].value = valor;
        };
    };

    //PLAN BY HR
    function calculo(element) {
        var first_value = 0;
        var nombre = element.name;
        var nombre_input = 'input[name="' + nombre + '"]';

        //Primer valor del CUM PLAN
        if (nombre === "plan_by_hr_15") {
            first_value = element.value;
            document.getElementById("cum_plan_10").innerHTML = first_value;
        };

        //Suma de Filas
        var total = 0;
        var filas_plan_by_hr = document.querySelectorAll(".planByHr");

        //Suma
        for (var x = 0; x < filas_plan_by_hr.length; x++) {
            var values = filas_plan_by_hr[x].value;
            var cum_plan = document.getElementsByName("cum_plan");

            if (isNaN(values) || values === null) {
                return alert("Ingrese numeros validos")
            };
            total += parseInt(values);
            cum_plan[x].innerHTML = total || 0;
        }
    };

    //GET ITEM NUMBER
    window.onload = function(element) {
        let find_item = document.querySelector("#pn");
        let stndr_time = document.querySelector("#stnd_time");

        // let url = "http://localhost/development/automation/functions/ItemNumberSelect/item_number_select.php"
        let url_magui = "http://localhost/assembly-automation/functions/ItemNumberSelect/item_number_select.php";


        fetch(url_magui, {
                method: 'GET',
            })
            .then(res => res.text())
            .then((html) => {
                find_item.innerHTML = html;
            })
            .catch((e) => {
                console.log(e);
            });
    };

    // GET VALUE SELECTED ITEM NUMBER
    function getValueSelectedItemNumber(element, id) {
        $("input[name*='partno']").on('keyup', function() {
            var resp = element.value;
            var responseInput = $('#pn [value="' + resp + '"]').data('hrs');
            var resp_standar_time = document.getElementById("stnd_time_" + id);
            var less_time = document.getElementById("less_time_" + id);

            resp_standar_time.value = responseInput || 0;
            calculatedQtyByHr(id);
        });
    };

    //CALCULATED QTY BY HR
    function calculatedQtyByHr(id) {
        var hc = document.getElementById("hc_" + id);
        var stnd_time = document.getElementById("stnd_time_" + id);
        var less_time = document.getElementById("less_time_" + id);
        var getQtyByHr = document.getElementById("qty_by_hr_" + id);

    //OPERACIONES
    result = ((hc.value - less_time.value) / (stnd_time.value));

        if (result === "" || result === null || result === "undefined" || isNaN(result) || result === Infinity) {
            return getQtyByHr.value = 0;
        };
        getQtyByHr.value = result || 0;
        };

    //GET LESS TIME
    function add_Select(element, id) {
        var valueSelected = element.value;
        var elementSelected = document.getElementById("less_time_" + id);
        elementSelected.value = valueSelected || 0;
        elementSelected.value = valueSelected || 0;

        calculatedQtyByHr(id);
    };
</script>
