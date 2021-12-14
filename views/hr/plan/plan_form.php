
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
                        <th scope="col" class="table-light" contenteditable></th>
                        <th scope="col" class="fw-bold"><small>SHIFT:</small></th>
                        <th scope="col" class="table-light" contenteditable><?php echo getShift() ?></th>
                        <th scope="col" class="fw-bold"><small>HC:</small></th>
                        <th scope="col" class="table-light">
                            <input type="text" id="hc-head" onkeyup="addHC()" />
                        </th>
                        <th scope="col" class="fw-bold"><small>DATE:</small></th>
                        <th scope="col" class="table-light" contenteditable><?php echo date("m/d/Y") ?></th>
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
                            <th class="table-info">6:00-7:00am</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" />
                            </td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td class="table-info"></td>
                            <td class="table-light">
                            <select style="border: 0; background-color: transparent;" onchange="add_Select(this);" class="form-control" id="1" required>
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
                            <td class="table-info" id="less-time-1"></td>
                            <td class="table-info"></td>
                            <td class="table-info"></td>
                        </tr>
                        <tr>
                            <th class="table-info">7:00-8:00am</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" />
                            </td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td class="table-info"></td>
                            <td class="table-light">
                            <select style="border: 0; background-color: transparent;" onchange="add_Select(this);" class="form-control" id="2" required>
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
                            <td class="table-info" id="less-time-2"></td>
                            <td class="table-info"></td>
                            <td class="table-info"></td>
                        </tr>
                        <tr>
                            <th class="table-info">9:00-10:00am</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" />
                            </td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td class="table-info"></td>
                            <td class="table-light">
                            <select style="border: 0; background-color: transparent;" onchange="add_Select(this);" class="form-control" id="3" required>
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
                            <td class="table-info" id="less-time-3"></td>
                            <td class="table-info"></td>
                            <td class="table-info"></td>
                        </tr>
                        <tr>
                            <th class="table-info">10:00-11:00am</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" />
                            </td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td class="table-info"></td>
                            <td class="table-light">
                            <select style="border: 0; background-color: transparent;" onchange="add_Select(this);" class="form-control" id="4" required>
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
                            <td class="table-info" id="less-time-4"></td>
                            <td class="table-info"></td>
                            <td class="table-info"></td>
                        </tr>
                        <tr>
                            <th class="table-info">11:00-12:00pm</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" />
                            </td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td class="table-info"></td>
                            <td class="table-light">
                            <select style="border: 0; background-color: transparent;" onchange="add_Select(this);" class="form-control" id="5" required>
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
                            <td class="table-info" id="less-time-5"></td>
                            <td class="table-info"></td>
                            <td class="table-info"></td>
                        </tr>
                        <tr>
                            <th class="table-info">12:00-13:00pm</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" />
                            </td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td class="table-info"></td>
                            <td class="table-light">
                            <select style="border: 0; background-color: transparent;" onchange="add_Select(this);" class="form-control" id="6" required>
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
                            <td class="table-info" id="less-time-6"></td>
                            <td class="table-info"></td>
                            <td class="table-info"></td>
                        </tr>
                        <tr>
                            <th class="table-info">13:00-14:00pm</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" />
                            </td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td class="table-info"></td>
                            <td class="table-light">
                                <select style="border: 0; background-color: transparent;" onchange="add_Select(this);" class="form-control" id="7" required>
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
                            <td class="table-info" id="less-time-7"></td>
                            <td class="table-info"></td>
                            <td class="table-info"></td>
                        </tr>
                        <tr>
                            <th class="table-info">14:00-15:30pm</th>
                            <td id="hc" class="table-info">
                                <input type="text" class="hc" name="hc" />
                            </td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td contenteditable></td>
                            <td class="table-info"></td>
                            <td class="table-light">
                                <select style="border: 0; background-color: transparent;" onchange="add_Select(this);" class="form-control" id="8" required>
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
                            <td class="table-info" id="less-time-8"></td>
                            <td class="table-info"></td>
                            <td class="table-info"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function addHC() {
        var elements = document.querySelectorAll(".hc");
        var valor = document.getElementById('hc-head').value;

        for (var i = 0; i < elements.length; i++) {
            elements[i].value = valor;
        }
    };

    function add_Select(element) {
        const valueSelected = element.value;
        const elementSelected = document.getElementById("less-time-"+element.id)
        elementSelected.innerHTML = valueSelected; 
    };
</script>