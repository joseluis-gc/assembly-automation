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
    <title>Production</title>
</head>

<body class="bg-light">
    <main class="container-fluid p-0">
        <table id="datatablesSimple" class="table text-center fs-6">
            <thead>
                <tr class="bg-light h4">
                    <th class="text-center fw-bold">Output</th>
                    <th class="text-center fw-bold">Order no.</th>
                    <th class="text-center fw-bold">Part no.</th>
                    <th class="text-center fw-bold">Advance</th>
                    <th class="text-center fw-bold"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="fw-bold text-primary h4">TIP30</td>
                    <td class="h4">AC1002HF</td>
                    <td class="h4"> AC1830B-C</td>
                    <td class="h4"><span class="fw-bold text-success">10</span>/200</td>
                    <td class="bg-warning bg-gradient text-black">
                        <span class="fw-bold h4">SetUp</span><br>
                        <span class="fs-5">En proceso</span> <br>
                        <span style="font-size: 1rem; font-weight: bold;">
                            47 dia(s), 22 hora(s), 46 minuto(s), 3 segundo(s) activo
                        </span>
                        <br>
                        <span style="font-size: 1rem; font-weight: bold;">Atendido por:</span>
                        <span style="font-size: 1rem;" class="text-danger fw-bold">JGomez</span>
                    </td>
                </tr>
                <tr>
                    <td class="fw-bold text-primary h4">TIP32</td>
                    <td class="h4">AC1002HF</td>
                    <td class="h4"> AC1830B-C</td>
                    <td class="h4"><span class="fw-bold text-success">20</span>/50</td>
                    <td class="bg-danger bg-gradient text-black">
                        <span class="fw-bold h4">Falta de material</span><br>
                        <span class="fs-5">En proceso</span> <br>
                        <span style="font-size: 1rem; font-weight: bold;">
                            47 dia(s), 22 hora(s), 46 minuto(s), 3 segundo(s) activo
                        </span>
                        <br>
                        <span style="font-size: 1rem; font-weight: bold;">Atendido por:</span>
                        <span style="font-size: 1rem;" class="fw-bold">JGomez</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
    <script type="module" src="./../views/_assets/js/material.js"></script>
</body>

</html>