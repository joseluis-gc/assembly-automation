<?php
if (isset($_GET['asset_id']) && is_numeric($_GET['asset_id']))
{
    $query = "SELECT * FROM assets 
    LEFT JOIN site ON asset_site = site_id 
    LEFT JOIN plant ON plant.plant_id = site.plant_id 
    WHERE asset_id = {$_GET['asset_id']}";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
}
else
{
    die("Invalid Parameter.");
}
require_once "classes/Login.php";
?>
<table class="table container text-center table-info table-bordered mb-0 mt-3">
    <thead>
        <tr>
            <th scope="col" class="fw-bold"><small>PLANT:</small></th>
            <th scope="col" class="table-light" contenteditable><?php echo $row['plant_name'] ?></th>
            <th scope="col" class="fw-bold"><small>AREA:</small></th>
            <th scope="col" class="table-light" contenteditable><?php echo $row['site_name'] ?></th>
            <th scope="col" class="fw-bold"><small>OUTPUT:</small></th>
            <th scope="col" class="table-light" contenteditable><?php echo $row['asset_name']; ?></th>
            <th scope="col" class="fw-bold"><small>SHIFT:</small></th>
            <th scope="col" class="table-light" contenteditable><?php echo getShift() ?></th>
            <th scope="col" class="fw-bold"><small>HC:</small></th>
            <th scope="col" class="table-light">
                <input type="number" id="hc-head" onkeyup="addHC()" />
            </th>
            <th scope="col" class="fw-bold"><small>DATE:</small></th>
            <th scope="col" class="table-light" contenteditable><input style="min-width: 10rem; border: 0; background-color: transparent;" class="form-control" type="date" value="<?php echo date("Y-m-d") ?>"></th>
            <th scope="col" class="fw-bold"><small>SUPERVISOR:</small></th>
            <th scope="col" class="table-light" style="min-width: 6rem;" contenteditable></th>
        </tr>
    </thead>
</table>
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
                <th style="min-width: 9rem;" class="table-info">6:00-7:00am</th>
                <td id="hc" class="table-info">
                    <input type="number" class="hc" name="hc_6_7" id="hc_1" onkeyup="calculatedQtyByHr(1)" />
                </td>
                <td>
                    <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(1)" id="input_item_number_1" onchange="getValueSelectedItemNumber(this, 1);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                    <datalist id="pn"></datalist>
                </td>
                <td contenteditable></td>
                <td id="plan_by_hr">
                    <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_6_7" />
                </td>
                <td class="table-info" id="cum_plan_1" name="cum_plan">0</td>
                <td class="table-light">
                    <select style="min-width: 15rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(1)" onchange="add_Select(this, 1);" class="form-control" required>
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
                <td class="table-info" id="less_time"><input type="text" name="less_time_6_7" id="less_time_1" disabled="true"></td>
                <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_6_7" id="stnd_time_1" disabled="true"></td>
                <td class="table-info" style="min-width: 8rem;" id="qty_by_hr"><input type="text" name="qty_by_hr_6_7" id="qty_by_hr_1" disabled="true"></td>
            </tr>
            <tr>
                <th class="table-info">7:00-8:00am</th>
                <td id="hc" class="table-info">
                    <input type="number" class="hc" name="hc_7_8" id="hc_2" onkeyup="calculatedQtyByHr(2)" />
                </td>
                <td>
                    <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(2)" id="input_item_number_2" onchange="getValueSelectedItemNumber(this, 2);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                    <datalist id="pn"></datalist>
                </td>
                <td contenteditable></td>
                <td id="plan_by_hr">
                    <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_7_8" />
                </td>
                <td class="table-info" id="cum_plan_2" name="cum_plan">0</td>
                <td class="table-light">
                    <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(3)" onchange="add_Select(this, 2);" class="form-control" required>
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
                <td class="table-info" id="less_time"><input type="text" name="less_time_7_8" id="less_time_2" disabled="true"></td>
                <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_7_8" id="stnd_time_2" disabled="true"></td>
                <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_7_8" id="qty_by_hr_2" disabled="true"></td>
            </tr>
            <tr>
                <th class="table-info">8:00-9:00am</th>
                <td id="hc" class="table-info">
                    <input type="number" class="hc" name="hc_8_9" id="hc_3" onkeyup="calculatedQtyByHr(3)" />
                </td>
                <td>
                    <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(3)" id="input_item_number_3" onchange="getValueSelectedItemNumber(this, 3);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                    <datalist id="pn"></datalist>
                </td>
                <td contenteditable></td>
                <td id="plan_by_hr">
                    <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_8_9" />
                </td>
                <td class="table-info" id="cum_plan_3" name="cum_plan">0</td>
                <td class="table-light">
                    <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(3)" onchange="add_Select(this, 3);" class="form-control" required>
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
                <td class="table-info" id="less_time"><input type="text" name="less_time_8_9" id="less_time_3" disabled="true"></td>
                <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_8_9" id="stnd_time_3" disabled="true"></td>
                <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_8_9" id="qty_by_hr_3" disabled="true"></td>
            </tr>
            <tr>
                <th class="table-info">9:00-10:00am</th>
                <td id="hc" class="table-info">
                    <input type="number" class="hc" name="hc_9_10" id="hc_4" onkeyup="calculatedQtyByHr(4)" />
                </td>
                <td>
                    <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(4)" id="input_item_number_4" onchange="getValueSelectedItemNumber(this, 4);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                    <datalist id="pn"></datalist>
                </td>
                <td contenteditable></td>
                <td id="plan_by_hr">
                    <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_9_10" />
                </td>
                <td class="table-info" id="cum_plan_4" name="cum_plan">0</td>
                <td class="table-light">
                    <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(4)" onchange="add_Select(this, 4);" class="form-control" required>
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
                <td class="table-info" id="less_time"><input type="text" name="less_time_9_10" id="less_time_4" disabled="true"></td>
                <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_9_10" id="stnd_time_4" disabled="true"></td>
                <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_9_10" id="qty_by_hr_4" disabled="true"></td>
            </tr>
            <tr>
                <th class="table-info">10:00-11:00am</th>
                <td id="hc" class="table-info">
                    <input type="number" class="hc" name="hc_10_11" id="hc_5" onkeyup="calculatedQtyByHr(5)" />
                </td>
                <td>
                    <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(5)" id="input_item_number_5" onchange="getValueSelectedItemNumber(this, 5);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                    <datalist id="pn"></datalist>
                </td>
                <td contenteditable></td>
                <td id="plan_by_hr">
                    <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_10_11" />
                </td>
                <td class="table-info" id="cum_plan_4" name="cum_plan">0</td>
                <td class="table-light">
                    <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(5)" onchange="add_Select(this, 5);" class="form-control" required>
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
                <td class="table-info" id="less_time"><input type="text" name="less_time_10_11" id="less_time_5" disabled="true"></td>
                <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_10_11" id="stnd_time_5" disabled="true"></td>
                <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_10_11" id="qty_by_hr_5" disabled="true"></td>
            </tr>
            <tr>
                <th class="table-info">11:00-12:00pm</th>
                <td id="hc" class="table-info">
                    <input type="number" class="hc" name="hc_11_12" id="hc_6" onkeyup="calculatedQtyByHr(6)" />
                </td>
                <td>
                    <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(6)" id="input_item_number_6" onchange="getValueSelectedItemNumber(this, 6);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                    <datalist id="pn"></datalist>
                </td>
                <td contenteditable></td>
                <td id="plan_by_hr">
                    <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_11_12" />
                </td>
                <td class="table-info" id="cum_plan_6" name="cum_plan">0</td>
                <td class="table-light">
                    <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(6)" onchange="add_Select(this, 6);" class="form-control" required>
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
                <td class="table-info" id="less_time"><input type="text" name="less_time_11_12" id="less_time_6" disabled="true"></td>
                <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_11_12" id="stnd_time_6" disabled="true"></td>
                <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_11_12" id="qty_by_hr_6" disabled="true"></td>
            </tr>
            <tr>
                <th class="table-info">12:00-13:00pm</th>
                <td id="hc" class="table-info">
                    <input type="number" class="hc" name="hc_12_13" id="hc_7" onkeyup="calculatedQtyByHr(7)" />
                </td>
                <td>
                    <input style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(7)" id="input_item_number_7" onchange="getValueSelectedItemNumber(this, 7);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                    <datalist id="pn"></datalist>
                </td>
                <td contenteditable></td>
                <td id="plan_by_hr">
                    <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_12_13" />
                </td>
                <td class="table-info" id="cum_plan_7" name="cum_plan">0</td>
                <td class="table-light">
                    <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(7)" onchange="add_Select(this, 7);" class="form-control" required>
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
                <td class="table-info" id="less_time"><input type="text" name="less_time_12_13" id="less_time_7" disabled="true"></td>
                <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_12_13" id="stnd_time_7" disabled="true"></td>
                <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_12_13" id="qty_by_hr_7" disabled="true"></td>
            </tr>
            <tr>
                <th class="table-info">13:00-14:00pm</th>
                <td id="hc" class="table-info">
                    <input type="number" class="hc" name="hc_13_14" id="hc_8" onkeyup="calculatedQtyByHr(8)" />
                </td>
                <td>
                    <input style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_8" onkeyup="calculatedQtyByHr(8)" onchange="getValueSelectedItemNumber(this, 8);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                    <datalist id="pn"></datalist>
                </td>
                <td contenteditable></td>
                <td id="plan_by_hr">
                    <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_13_14" />
                </td>
                <td class="table-info" id="cum_plan_8" name="cum_plan">0</td>
                <td class="table-light">
                    <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(8)" onchange="add_Select(this, 8);" class="form-control" required>
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
                <td class="table-info" id="less_time"><input type="text" name="less_time_13_14" id="less_time_8" disabled="true"></td>
                <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_13_14" id="stnd_time_8" disabled="true"></td>
                <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_13_14" id="qty_by_hr_8" disabled="true"></td>
            </tr>
            <tr>
                <th class="table-info">14:00-15:30pm</th>
                <td id="hc" class="table-info">
                    <input type="number" class="hc" name="hc_14_15" id="hc_9" onkeyup="calculatedQtyByHr(9)" />
                </td>
                <td>
                    <input style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_9" onkeyup="calculatedQtyByHr(9)" onchange="getValueSelectedItemNumber(this, 9);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                    <datalist id="pn"></datalist>
                </td>
                <td contenteditable></td>
                <td id="plan_by_hr">
                    <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_14_15" />
                </td>
                <td class="table-info" id="cum_plan_9" name="cum_plan">0</td>
                <td class="table-light">
                    <select style="min-width: 10rem; border: 0; background-color: transparent;" onkeyup="calculatedQtyByHr(9)" onchange="add_Select(this, 9);" class="form-control" required>
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
                <td class="table-info" id="less_time"><input type="text" name="less_time_14_15" id="less_time_9" disabled="true"></td>
                <td class="table-info" id="stnd_time"><input type="text" name="stnd_time_14_15" id="stnd_time_9" disabled="true"></td>
                <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr_14_15" id="qty_by_hr_9" disabled="true"></td>
            </tr>
        </tbody>
    </table>
    <div class="mt-5 d-flex justify-content-end p-5">
        <button onclick="" class="btn btn-primary">SAVE CHANGES</button>
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
        if (nombre === "plan_by_hr_6_7") {
            first_value = element.value;
            document.getElementById("cum_plan_1").innerHTML = first_value;
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
        let url = "http://localhost/development/automation/functions/ItemNumberSelect/item_number_select.php"

        fetch(url, {
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

            resp_standar_time.value = responseInput || 0;
        });
    };

    //CALCULATED QTY BY HR
    function calculatedQtyByHr(id) {
        var hc = document.getElementById("hc_" + id) || 0;
        var stnd_time = document.getElementById("stnd_time_" + id) || 0;
        var less_time = document.getElementById("less_time_" + id) || 0;
        var getQtyByHr = document.getElementById("qty_by_hr_" + id) || 0;

        //OPERACIONES
        result = ((hc.value - less_time.value) / (stnd_time.value)) || 0;

        if (less_time.value === "" || less_time.value === null || less_time.value === "undefined" || isNaN(less_time.value) || less_time.value < 0) {
            return getQtyByHr.value = 0
        };

        if (stnd_time.value === "" || stnd_time.value === null || stnd_time.value === "undefined" || isNaN(stnd_time.value) || stnd_time.value < 0) {
            return getQtyByHr.value = 0
        };

        if (result === "" || result === null || result === "undefined" || isNaN(result) || result < 0 || result === Infinity) {
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
