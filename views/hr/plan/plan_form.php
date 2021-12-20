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
?>
<div class="container-xl p-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 gx-5">
        <div>
            <table class="table text-center table-success table-bordered mb-0 mt-3">
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
                            <input type="text" id="hc-head" onkeyup="addHC()" />
                        </th>
                        <th scope="col" class="fw-bold"><small>DATE:</small></th>
                        <th scope="col" class="table-light" contenteditable><input style="min-width: 10rem; border: 0; background-color: transparent;" class="form-control" type="date" value="<?php echo date("Y-m-d") ?>"></th>
                        <th scope="col" class="fw-bold"><small>SUPERVISOR:</small></th>
                        <th scope="col" class="table-light" contenteditable></th>
                    </tr>
                </thead>
            </table>
            <div>
                <table class="table text-center table-bordered mb-0 mt-4">
                    <thead>
                        <tr class="table-success">
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
                                <input type="text" class="hc" name="hc" id="hc_1" onchange="operations(1)" />
                            </td>
                            <td>
                                <input style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_1" onchange="getValueSelectedItemNumber(this, 1);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                                <datalist id="pn"></datalist>
                            </td>
                            <td contenteditable></td>
                            <td id="plan_by_hr">
                                <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_1" />
                            </td>
                            <td class="table-info" id="cum_plan_1" name="cum_plan">0</td>
                            <td class="table-light">
                                <select style="min-width: 15rem; border: 0; background-color: transparent;" onchange="add_Select(this, 1);" class="form-control" required>
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
                            <td class="table-info" id="less_time"><input type="text" name="less_time" id="less_time_1" disabled="true"></td>
                            <td class="table-info" id="stnd_time"><input type="text" name="stnd_time" id="stnd_time_1" disabled="true"></td>
                            <td class="table-info" style="min-width: 8rem;" id="qty_by_hr"><input type="text" name="qty_by_hr" id="qty_by_hr_1" value="0" disabled="true"></td>
                        </tr>
                        <tr>
                            <th class="table-info">7:00-8:00am</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" id="hc_2" onchange="operations(2)" />
                            </td>
                            <td>
                                <input style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_2" onchange="getValueSelectedItemNumber(this, 2);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                                <datalist id="pn"></datalist>
                            </td>
                            <td contenteditable></td>
                            <td id="plan_by_hr">
                                <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_2" />
                            </td>
                            <td class="table-info" id="cum_plan_2" name="cum_plan">0</td>
                            <td class="table-light">
                                <select style="min-width: 10rem; border: 0; background-color: transparent;" onchange="add_Select(this, 2);" class="form-control" required>
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
                            <td class="table-info" id="less_time"><input type="text" name="less_time" id="less_time_2" disabled="true"></td>
                            <td class="table-info" id="stnd_time"><input type="text" name="stnd_time" id="stnd_time_2" disabled="true"></td>
                            <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr" id="qty_by_hr_2" disabled="true"></td>
                        </tr>
                        <tr>
                            <th class="table-info">9:00-10:00am</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" id="hc_3" onchange="operations(3)"/>
                            </td>
                            <td>
                                <input style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_3" onchange="getValueSelectedItemNumber(this, 3);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                                <datalist id="pn"></datalist>
                            </td>
                            <td contenteditable></td>
                            <td id="plan_by_hr">
                                <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_3" />
                            </td>
                            <td class="table-info" id="cum_plan_3" name="cum_plan">0</td>
                            <td class="table-light">
                                <select style="min-width: 10rem; border: 0; background-color: transparent;" onchange="add_Select(this, 3);" class="form-control" required>
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
                            <td class="table-info" id="less_time"><input type="text" name="less_time" id="less_time_3" disabled="true"></td>
                            <td class="table-info" id="stnd_time"><input type="text" name="stnd_time" id="stnd_time_3" disabled="true"></td>
                            <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr" id="qty_by_hr_3" disabled="true"></td>
                        </tr>
                        <tr>
                            <th class="table-info">10:00-11:00am</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" id="hc_4" onchange="operations(4)" />
                            </td>
                            <td>
                                <input style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_4" onchange="getValueSelectedItemNumber(this, 4);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                                <datalist id="pn"></datalist>
                            </td>
                            <td contenteditable></td>
                            <td id="plan_by_hr">
                                <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_4" />
                            </td>
                            <td class="table-info" id="cum_plan_4" name="cum_plan">0</td>
                            <td class="table-light">
                                <select style="min-width: 10rem; border: 0; background-color: transparent;" onchange="add_Select(this, 4);" class="form-control" required>
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
                            <td class="table-info" id="less_time"><input type="text" name="less_time" id="less_time_4" disabled="true"></td>
                            <td class="table-info" id="stnd_time"><input type="text" name="stnd_time" id="stnd_time_4" disabled="true"></td>
                            <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr" id="qty_by_hr_4" disabled="true"></td>
                        </tr>
                        <tr>
                            <th class="table-info">11:00-12:00pm</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" id="hc_5" onchange="operations(5)" />
                            </td>
                            <td>
                                <input style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_5" onchange="getValueSelectedItemNumber(this, 5);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                                <datalist id="pn"></datalist>
                            </td>
                            <td contenteditable></td>
                            <td id="plan_by_hr">
                                <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_5" />
                            </td>
                            <td class="table-info" id="cum_plan_5" name="cum_plan">0</td>
                            <td class="table-light">
                                <select style="min-width: 10rem; border: 0; background-color: transparent;" onchange="add_Select(this, 5);" class="form-control" required>
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
                            <td class="table-info" id="less_time"><input type="text" name="less_time" id="less_time_5" disabled="true"></td>
                            <td class="table-info" id="stnd_time"><input type="text" name="stnd_time" id="stnd_time_5" disabled="true"></td>
                            <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr" id="qty_by_hr_5" disabled="true"></td>
                        </tr>
                        <tr>
                            <th class="table-info">12:00-13:00pm</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" id="hc_6" onchange="operations(6)" />
                            </td>
                            <td>
                                <input style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_6" onchange="getValueSelectedItemNumber(this, 6);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                                <datalist id="pn"></datalist>
                            </td>
                            <td contenteditable></td>
                            <td id="plan_by_hr">
                                <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_6" />
                            </td>
                            <td class="table-info" id="cum_plan_6" name="cum_plan">0</td>
                            <td class="table-light">
                                <select style="min-width: 10rem; border: 0; background-color: transparent;" onchange="add_Select(this, 6);" class="form-control" required>
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
                            <td class="table-info" id="less_time"><input type="text" name="less_time" id="less_time_6" disabled="true"></td>
                            <td class="table-info" id="stnd_time"><input type="text" name="stnd_time" id="stnd_time_6" disabled="true"></td>
                            <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr" id="qty_by_hr_6" disabled="true"></td>
                        </tr>
                        <tr>
                            <th class="table-info">13:00-14:00pm</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" id="hc_7" onchange="operations(7)" />
                            </td>
                            <td>
                                <input style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_7" onchange="getValueSelectedItemNumber(this, 7);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                                <datalist id="pn"></datalist>
                            </td>
                            <td contenteditable></td>
                            <td id="plan_by_hr">
                                <input type="text" class="planByHr" onkeyup="calculo(this, 7);" name="plan_by_hr_7" />
                            </td>
                            <td class="table-info" id="cum_plan_7" name="cum_plan">0</td>
                            <td class="table-light">
                                <select style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_8" onchange="getValueSelectedItemNumber(this, 7);" class="form-control" required>
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
                            <td class="table-info" id="less_time"><input type="text" name="less_time" id="less_time_7" disabled="true"></td>
                            <td class="table-info" id="stnd_time"><input type="text" name="stnd_time" id="stnd_time_7" disabled="true"></td>
                            <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr" id="qty_by_hr_7" disabled="true"></td>
                        </tr>
                        <tr>
                            <th class="table-info">14:00-15:30pm</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" id="hc_8" onchange="operations(8)" />
                            </td>
                            <td>
                                <input style="min-width: 10rem; border: 0; background-color: transparent;" id="input_item_number_8" onchange="getValueSelectedItemNumber(this, 8);" placeholder="Select" type="text" list="pn" name="partno" class="form-control" />
                                <datalist id="pn"></datalist>
                            </td>
                            <td contenteditable></td>
                            <td id="plan_by_hr">
                                <input type="text" class="planByHr" onkeyup="calculo(this);" name="plan_by_hr_8" />
                            </td>
                            <td class="table-info" id="cum_plan_8" name="cum_plan">0</td>
                            <td class="table-light">
                                <select style="min-width: 10rem; border: 0; background-color: transparent;" onchange="add_Select(this, 8);" class="form-control" required>
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
                            <td class="table-info" id="less_time"><input type="text" name="less_time" id="less_time_8" disabled="true"></td>
                            <td class="table-info" id="stnd_time"><input type="text" name="stnd_time" id="stnd_time_8" disabled="true"></td>
                            <td class="table-info" id="qty_by_hr"><input type="text" name="qty_by_hr" id="qty_by_hr_8" value="0" disabled="true"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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
        if (nombre === "plan_by_hr_1") {
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
        let url = "http://localhost/assembly-automation/functions/ItemNumberSelect/item_number_select.php"

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

    function operations(id) {
        var hc = document.getElementById("hc_"+id);
        var stnd_time = document.getElementById("stnd_time_"+id);
        var less_time = document.getElementById("less_time_"+id);
        
        result = ((hc.value - less_time.value) / (stnd_time.value)) || 0;
        var getQtyByHr = document.getElementById("qty_by_hr_"+id);

        if (result === "" || result === null || result === "undefined" || isNaN(result) || result < 0) {
            return getQtyByHr.value = 0;
        }
        getQtyByHr.value = result || 0;
    };

    //GET LESS TIME
    function add_Select(element, id) {
        var valueSelected = element.value;
        var elementSelected = document.getElementById("less_time_" + id);
        elementSelected.value = valueSelected || 0;
        elementSelected.value = valueSelected || 0;

        operations(id);
    };
</script>