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
                <div class="card-body">
                    <div class="form-floating mt-4">
                        <select class="form-control" id="plant_id" aria-label="Floating label select example">
                            <option id="plant" selected>Seleccione planta</option>
                            <?php getPlants();?>
                        </select>
                        <label for="plant">Planta</label>
                    </div>
                    <div class="form-floating mt-4">
                        <select class="form-select" id="site_id" aria-label="Floating label select example">
                            <option id="site" selected>Seleccione Departamento</option>
                            <?php getSite(); ?>
                        </select>
                        <label for="site">Departamento</label>
                    </div>
                    <div class="form-floating mt-4">
                        <select class="form-select" id="machine_id" aria-label="Floating label select example">
                            <option id="machine" selected>Seleccione Maquina</option>
                            <?php getAssets(); ?>
                        </select>
                        <label for="machine">Maquina</label>
                    </div>
                    <div class="form-floating mt-4">
                        <select class="form-select" id="capture_id" aria-label="Floating label select example">
                            <option id="capture" selected>Capturado por</option>
                            <?php getCapture(); ?>
                        </select>
                        <label for="capture">Capturado por</label>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label class="form-label" for="formControlInput_1">Numero de parte</label>
                            <input class="form-control" id="formControlInput_1" type="text">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="formControlInput_2">Numero de orden</label>
                            <input class="form-control" id="formControlInput_2" type="text">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="form-label" for="formControlTextarea">Describe el problema</label>
                        <textarea class="form-control" id="formControlTextarea" rows="3"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-auto text-end d-lg-block">
                        <a href="index.php?page=trigger" class="btn btn-light">Regresar</a>
                        <button class="btn btn-danger">Reportar Error</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        document.querySelector('#plant_id').addEventListener('click', function() {
            var plantaID = $(this).val();
            if (plantaID) {
                console.log('http://localhost/assembly-automation/views/trigger/trigger_form.php?plant_id='+plantaID)
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/assembly-automation/views/trigger/trigger_form.php?plant_id='+plantaID,
                    data: 'plant_id=' + plantaID,
                    success: function(html) {
                        $('#site_id').html(html);
                        $('#machine_id').html('<option value="">Selecciona un departamento primero [1]</option>');
                    }
                });
            } else {
                $('#site_id').html('<option value="">Selecciona una planta primero [2]</option>');
                $('#machine_id').html('<option value="">Seleccione un departamento [3]</option>');
            }
        });
        document.querySelector('#site_id').addEventListener('click', function() {
            var siteID = $(this).val();
            console.log({siteID});
            if (siteID) {
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/assembly-automation/views/trigger/trigger_form.php?site_id='+siteID,
                    data: 'site_id=' + siteID,
                    success: function(html) {
                        $('#machine').html(html);
                    }
                });
            } else {
                $('#machine_id').html('<option value="">Selecciona un departamento primero[4]</option>');
            }
        });
    };
</script>