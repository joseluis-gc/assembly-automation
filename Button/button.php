<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../views/_assets/css/styles.css" rel="stylesheet" />
    <!-- <link href="./../views/_assets/css/input_styles.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="./../views/_assets/css/input.css" />
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
    <title>Button</title>
</head>

<body class="bg-light">
    <main class="container margin_form">
        <div class="row justify-content-center text-center">
            <div class="col-xxl-7 col-xl-10">
                <div class="card card-raised shadow-10 mt-xl-10 mb-5">
                    <div class="card-body p-5">
                        <div class="w-100 m-auto d-block">
                            <p class="mb-0">ITEM NUMBER</p>
                            <h1 class="display-3 mb-0">
                                <strong>AC1005HF</strong>
                            </h1>
                            <div class="input-group d-flex justify-content-center mt-5 mb-3">
                                <div class="input-group-prepend" id="button-addon3">
                                    <button id="buttonMinus" onclick="buttonMinus();" style="left:-13rem !important;" class="btn btn-raised-dark" type="button">
                                        <span style="width: 100%; display: block; margin: auto;">
                                            <i class="leading-icon material-icons" style="width: 100%; display: block; margin: auto;">minimize</i>
                                        </span>
                                    </button>
                                </div>
                                <div class="">
                                    <span class="h3" id="click">0</span><span class="h3">/10,000</span>
                                </div>
                                <div class="input-group-prepend" id="button-addon3">
                                    <button onclick="getSnackbar();" style="right:-13rem !important;" class="btn btn-raised-dark" type="button">
                                        <span>
                                            <i class="leading-icon material-icons" style="width: 100%; display: block; margin: auto;">add</i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button onclick="getSnackbar();" class="btn btn-raised-primary shadow-5 ripple-info btn-xl btn-lg" type="button">
                                <span style="width: 100%; display: block; margin: auto;">
                                    Capturar
                                </span>
                            </button>
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
    <script type="module" src="./../views/_assets/js/material.js"></script>
    <script>
        var click = 0;
        url = "localhost";
        method: "POST";

        function getSnackbar() {
            click++;
            let getClick = document.getElementById("click");

            getClick.innerHTML = click || 0;
            let snackbar = document.querySelector('#snackbarAlert');
            snackbar.labelText = "has been captured" + " " + click + " " + "parts";
            snackbar.show();

            $.ajax({
                url: url,
                method: method,
                data: "",
                success: function(data) {
                //code
                },
                error: function(error) {
                    console.log("error" + error);
                }
            });
        };

        function buttonMinus() {
            click--;

            if (click < 0) {
                click = 0;
            }

            let getClick = document.getElementById("click");
            let buttonMinus = document.getElementById("buttonMinus");
            getClick.innerHTML = click;
            let snackbar = document.querySelector('#snackbarAlert');
            snackbar.labelText = "has been captured" + " " + click + " " + "parts";
        };
    </script>
</body>

</html>