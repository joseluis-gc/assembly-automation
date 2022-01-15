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
                            <div class="d-flex">
                                <button class="btn btn-primary mx-2" type="button">
                                    <i class="material-icons mx-2">build</i>
                                    Atención de errores
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-4">
                    <?php
                    $cont = 0;
                    $query = "SELECT * FROM alerts";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_array($result)) :
                        $cont++;
                    ?>
                        <?php if ($cont == 1) : ?>
                            <div class="row">
                            <?php endif ?>
                            <div class="col-md-6 text-center">
                                <img class="mb-3" src="./views/_assets/img/icons/work-time.png" alt="..." style="height: 50px" />
                                <div class="button_alert" id="maquinaEnsamble">
                                    <a class='btn' type='button' id='button_alert_1' href='index.php?page=report&alert_id=<?php echo $row['alert_id'] ?>'><?php echo $row['alert_name'] ?></a>
                                </div>
                            </div>
                            <?php if ($cont == 2) : ?>
                            </div>
                            <hr>
                        <?php
                                $cont = 0;
                            endif
                        ?>
                    <?php endwhile ?>
                </div> <!-- card-body -->
            </div>
        </div>
    </div>
</div>