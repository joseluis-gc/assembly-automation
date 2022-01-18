<?php
if (isset($_POST['submit'])) {
    echo ("plant: " . $_POST['plant'] . "<br />");
    echo ("site: " . $_POST['site'] . "<br />");
    echo ("machine: " . $_POST['machine'] . "<br />");
    echo ("capture: " . $_POST['capture'] . "<br />");
    echo ("problem: " . $_POST['problem'] . "<br />");
    echo ("no_part: " . $_POST['no_part'] . "<br />");
    echo ("no_order: " . $_POST['no_order'] . "<br />");
    echo ("describe: " . $_POST['describe'] . "<br />");
}
?>
<div class="container-xl p-5">
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-9 col-xl-10 col-xxl-9">
            <div class="card card-raised">
                <div class="card-header bg-light shadow-5 p-4">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <img class="mb-3" src="./views/_assets/img/transparente.png" alt="..." style="height: 80px" />
                        </div>
                        <div class="col-auto text-end d-lg-block">
                            <h5 class="text-uppercase"><?php getAlertName() ?></h5>
                        </div>
                    </div>
                </div>
                <form method="post" action="index.php?response_form">
                    <div class="card-body">
                        <div class="form-floating mt-4">
                            <select class="form-control" name="plant" id="plant_id" aria-label="Floating label select example">
                                <option id="plant" selected>Seleccione planta</option>
                                <?php getPlants(); ?>
                            </select>
                            <label for="plant">Planta</label>
                        </div>
                        <div class="form-floating mt-4">
                            <select class="form-select" name="site" id="site_id" aria-label="Floating label select example">
                                <option id="site" selected>Seleccione Departamento</option>
                            </select>
                            <label for="site">Departamento</label>
                        </div>
                        <div class="form-floating mt-4">
                            <select class="form-select" name="machine" id="machine_id" aria-label="Floating label select example">
                                <option id="machine" selected>Seleccione Máquina</option>
                            </select>
                            <label for="machine">Máquina</label>
                        </div>
                        <div class="form-floating mt-4">
                            <select class="form-select" name="problem" id="problem_id" aria-label="Floating label select example">
                                <option id="problem" selected>Problema</option>
                                <?php getAlertChild(); ?>
                            </select>
                            <label for="capture">Problema</label>
                        </div>
                        <div class="form-floating mt-4">
                            <select class="form-select" name="capture" id="capture_id" aria-label="Floating label select example">
                                <option id="capture" selected>Capturado por</option>
                                <?php getCapture(); ?>
                            </select>
                            <label for="capture">Capturado por</label>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label class="form-label" for="formControlInput_1">Número de parte</label>
                                <input class="form-control" name="no_part" id="formControlInput_1" type="text">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="formControlInput_2">Número de orden</label>
                                <input class="form-control" name="no_order" id="formControlInput_2" type="text">
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="form-label" for="formControlTextarea">Describe el problema</label>
                            <textarea class="form-control" name="describe" id="formControlTextarea" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-auto text-end d-lg-block">
                            <a href="index.php?page=trigger" class="btn btn-light">Regresar</a>
                            <button type="submit" name="submit" class="btn btn-danger">Reportar Error</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var siteID;
    var plantaID;
    window.onload = function() {
        document.querySelector('#plant_id').addEventListener('change', function() {
            plantaID = $(this).val();
            if (plantaID) {
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/assembly-automation/views/trigger/trigger_form.php?plant_id=' + plantaID,
                    data: 'plant_id=' + plantaID,
                    success: function(html) {
                        $('#site_id').html(html);
                    }
                });
            } else {
                $('#site_id').html('<option value="">Seleccione planta primero</option>');
                $('#machine_id').html('<option value="">Seleccione departamento</option>');
            }
        });
        document.querySelector('#site_id').addEventListener('change', function() {
            siteID = $(this).val();
            if (siteID) {
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/assembly-automation/views/trigger/trigger_form.php?site_id=' + siteID,
                    data: 'site_id=' + siteID,
                    success: function(html) {
                        $('#machine_id').html(html);
                    }
                });
            } else {
                $('#machine_id').html('<option value="">Seleccione departamento primero</option>');
            }
        });
    };
</script>