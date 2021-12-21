<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../views/_assets/css/styles.css" rel="stylesheet" />
    <link href="./../views/_assets/css/input_styles.css" rel="stylesheet" />
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
                        <div>
                            <p class="mb-0">ITEM NUMBER</p>
                            <h1 class="display-3 mb-0">
                                <strong>AC1005HF</strong>
                            </h1>
                            <h3 class="mb-5 mt-5">5,000/10,000</h3>
                        </div>
                        <div class="d-grid gap-2 bg-warning">
                            <button class="btn btn-raised-success shadow-5 ripple-info btn-xl btn-lg" type="button">
                                <span style="width: 100%; display: block; margin: auto;">
                                    Capturar
                                </span>
                            </button>
                        </div>
                        <div class="input-group mt-5 mb-3">
                            <div class="input-group-prepend" id="button-addon3">
                                <button class="btn btn-raised-dark" type="button">
                                    <span style="width: 100%; display: block; margin: auto;">
                                        <i class="leading-icon material-icons" style="width: 100%; display: block; margin: auto;">minimize</i>
                                    </span>
                                </button>
                            </div>
                            <input type="text" class="form-control text-center" placeholder="5,000" disabled="true" aria-label="" aria-describedby="button-addon3">
                            <div class="input-group-prepend" id="button-addon3">
                                <button class="btn btn-raised-dark" type="button">
                                    <span>
                                        <i class="leading-icon material-icons" style="width: 100%; display: block; margin: auto;">add</i>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-10 mb-0">
                            <div class="form-check">
                                <input class="form-check-input" style="width: 1.5rem; height: 1.5rem; background-color: #3A853E; border-color:#3A853E;" onchange="document.getElementById('finished_check').disabled = !this.checked;" id="flexCheckDefault" type="checkbox" value="">
                                <label class="form-check-label" style="margin-left: 1rem; font-size:1rem; margin-top:0.4rem;" for="flexCheckDefault">Finalizar proceso de captura</label>
                            </div>
                            <button class="btn btn-danger" id="finished_check" disabled >Finalizar Captura</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function onCheck(){

        }
    </script>
</body>

</html>