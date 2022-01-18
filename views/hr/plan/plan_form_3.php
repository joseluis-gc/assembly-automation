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
                    <th style="min-width: 9rem;" class="table-info">00:00-01:00am</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_0" id="hc_19" onkeyup="calculatedQtyByHr(19)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(19)" id="input_item_number_19" onchange="getValueSelectedItemNumber(this, 19);" placeholder="Select" type="text" list="pn" name="partno_0" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_0" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_0" />
                    </td>
                    <td class="table-info" id="cum_plan_19" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 15rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(19)" onchange="add_Select(this, 19);" class="form-control" required>
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
                    <td class="table-info" id="less_time"><input type="text" name="less_time_0" id="less_time_19" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_0" id="stnd_time_19" disabled="true"></td>
                    <td class="table-info" style="min-width: 8rem;" id="qty_by_hr"><input type="text" name="qty_by_hr_0" id="qty_by_hr_19" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">01:00-02:00am</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_1" id="hc_20" onkeyup="calculatedQtyByHr(20)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(20)" id="input_item_number_1" onchange="getValueSelectedItemNumber(this, 20);" placeholder="Select" type="text" list="pn" name="partno_1" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_1" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_1" />
                    </td>
                    <td class="table-info" id="cum_plan_20" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(20)" onchange="add_Select(this, 20);" class="form-control">
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
                    <td class="table-info" id="less_time"><input type="text" name="less_time_1" id="less_time_20" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_1" id="stnd_time_20" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_1" id="qty_by_hr_20" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">02:00-03:00am</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_2" id="hc_21" onkeyup="calculatedQtyByHr(21)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(21)" id="input_item_number_21" onchange="getValueSelectedItemNumber(this, 21);" placeholder="Select" type="text" list="pn" name="partno_2" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_2" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_2" />
                    </td>
                    <td class="table-info" id="cum_plan_21" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(21)" onchange="add_Select(this, 21);" class="form-control">
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
                    <td class="table-info" id="less_time"><input type="text" name="less_time_2" id="less_time_21" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_2" id="stnd_time_21" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_2" id="qty_by_hr_21" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">03:00-04:00am</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_3" id="hc_22" onkeyup="calculatedQtyByHr(22)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(22)" id="input_item_number_22" onchange="getValueSelectedItemNumber(this, 22);" placeholder="Select" type="text" list="pn" name="partno_3" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_3" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_3" />
                    </td>
                    <td class="table-info" id="cum_plan_22" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(22)" onchange="add_Select(this, 22);" class="form-control">
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
                    <td class="table-info" id="less_time"><input type="text" name="less_time_3" id="less_time_22" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_3" id="stnd_time_22" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_3" id="qty_by_hr_22" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">04:00-05:00am</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_4" id="hc_23" onkeyup="calculatedQtyByHr(23)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(23)" id="input_item_number_23" onchange="getValueSelectedItemNumber(this, 23);" placeholder="Select" type="text" list="pn" name="partno_4" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_4" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_4" />
                    </td>
                    <td class="table-info" id="cum_plan_23" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(23)" onchange="add_Select(this, 23);" class="form-control">
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
                    <td class="table-info" id="less_time"><input type="text" name="less_time_4" id="less_time_23" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_4" id="stnd_time_23" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_4" id="qty_by_hr_23" disabled="true"></td>
                </tr>
                <tr>
                    <th class="table-info">05:00-06:00am</th>
                    <td id="hc" class="table-info">
                        <input type="number" class="hc" name="hc_5" id="hc_24" onkeyup="calculatedQtyByHr(24)" />
                    </td>
                    <td>
                        <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(24)" id="input_item_number_24" onchange="getValueSelectedItemNumber(this, 24);" placeholder="Select" type="text" list="pn" name="partno_5" class="form-control" />
                        <datalist id="pn"></datalist>
                    </td>
                    <td>
                        <input type="text" name="wo_number_5" value="">
                    </td>
                    <td id="plan_by_hr">
                        <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_5" />
                    </td>
                    <td class="table-info" id="cum_plan_24" name="cum_plan">0</td>
                    <td class="table-light">
                        <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(24)" onchange="add_Select(this, 24);" class="form-control">
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
                    <td class="table-info" id="less_time"><input type="text" name="less_time_5" id="less_time_24" disabled="true"></td>
                    <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_5" id="stnd_time_24" disabled="true"></td>
                    <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_5" id="qty_by_hr_24" disabled="true"></td>
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
        if (nombre === "plan_by_hr_19") {
            first_value = element.value;
            document.getElementById("cum_plan_0").innerHTML = first_value;
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
        $("input[name*='partno']").on('keyup', function(e) {
            e.preventDefault();
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