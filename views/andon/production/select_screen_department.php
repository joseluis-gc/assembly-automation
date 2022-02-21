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
                        <form method="post" action="index.php?page=department">
                            <div class="card-body">
                                <div class="form-floating">
                                    <select class="form-control" name="site" id="site_id" aria-label="Floating label select example">
                                        <option id="site" selected>Seleccione departamento</option>
                                        <?php getSite(); ?>
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