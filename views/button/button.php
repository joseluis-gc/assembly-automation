<?php
$today = Today();
echo $shift = getShift();
echo $hour = nowHour();
$hour = str_replace("0", "", $hour);
echo $query = "SELECT * FROM plan_hrxhr WHERE plan_asset = {$_GET['asset_id']} AND date = '$today' AND shift = $shift";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query error");
}
if (mysqli_num_rows($result) == 0) {
    die("No hay un plan para este punto de captura." . "<a href='index.php?page=menu'>Volver</a>");
}
$row = mysqli_fetch_array($result);

//geting number of pz
$pz_query = "SELECT SUM(reg_qty) AS suma FROM hour_registry WHERE reg_order_id = {$row['plan_id']}";
$run_pz_query = mysqli_query($connection, $pz_query);
$row_pz = mysqli_fetch_array($run_pz_query);


require_once "classes/Input.php";
$response = new Input();
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
<form method="post">
    <input type="hidden" name="plan_id" value="<?php echo $row['plan_id'] ?>">
    <main class="container margin_form">
        <div class="row justify-content-center text-center">
            <div class="col-xxl-7 col-xl-10">
                <div class="card card-raised shadow-10 mt-xl-10 mb-5">
                    <div class="card-body p-5">
                        <div class="w-100 m-auto d-block">
                            <p class="mb-0">ITEM NUMBER</p>
                            <h1 class="display-3 mb-0">
                                <strong><?php echo $row['pn_' . $hour] ?></strong>
                            </h1>
                           <div id="alert_container" style="display: none;">
                           <div class="alert alert-info alert-dismissible fade show mt-3" id="alert_id" role="alert">
                                <strong>Agrega nueva captura en el campo color verde!</strong>
                                No olvides guardar la nueva captura agregada.
                            </div>
                           </div>
                            <div class="input-group d-flex justify-content-center mt-5 mb-3">
                                <div>
                                    <span class="h3" id="click">
                                        <input disabled id="input_value" value="<?php echo $row_pz[0] ?>" name="input_hr" style="font-size: 28px; width: 80px;" type="number" value="">
                                    </span><span class="h3">/<?php echo number_format($row[$hour]) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button onclick="getSnackbar();" name="submit" class="btn btn-raised-primary shadow-5 ripple-info btn-xl btn-lg" type="submit">
                                <span style="width: 100%; display: block; margin: auto;">
                                    Capturar
                                </span>
                            </button>
                            <div class="d-flex justify-content-end">
                                <div class="form-check form-switch mt-4 px-0">
                                    <input name="input_check_edit" class="form-check-input mx-0" onchange="edit(this);" type="checkbox" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Modificar captura</label>
                                    <div class="row">
                                        <button name="save_correction" class="btn btn-raised-info btn-sm mt-2 text-light" id="button_save" disabled type="submit">
                                            Guardar nueva captura
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-10 mb-0">
                            <div class="form-check">
                                <input class="form-check-input" style="width: 1.5rem; height: 1.5rem;" onchange="document.getElementById('finished_check').disabled = !this.checked;" id="flexCheckDefault" type="checkbox" value="">
                                <label class="form-check-label" style="margin-left: 1rem; font-size:1rem; margin-top:0.4rem;" for="flexCheckDefault">Finalizar proceso de captura</label>
                            </div>
                            <button class="btn btn-danger" id="finished_check" disabled>Finalizar Captura</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <mwc-snackbar id="snackbarAlert" labeltext="">
            <mwc-icon-button icon="close" slot="dismiss"></mwc-icon-button>
        </mwc-snackbar>
    </main>
</form>
