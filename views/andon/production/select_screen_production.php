<div class="container-xl p-5">
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-5 col-xl-10 col-xxl-5">
            <div class="card card-raised">
                <div class="card-header bg-light shadow-5 p-3">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-auto">
                            <img class="mb-2" src="./views/_assets/img/transparente.png" alt="..." style="height: 80px" />
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-5 mb-5 text-center">
                        <form method="post" action="index.php?page=production">
                            <div class="card-body">
                                <div class="form-floating">
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
                            </div>
                            <div class="btn-group w-100 mt-4">
                                <button class="btn btn-primary m-auto w-100 d-block">Iniciar pantalla</button>
                            </div>
                        </form>
                    </div>
                </div>
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
    };
</script>