<!-- Main dashboard content-->
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-5">
        <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">Panel de control</h1>
            <div class="text-muted">Aplicaciones Disponibles</div>
        </div>
    </div>
    <!-- Colored status cards-->
    <div class="row gx-5">
        <div class="col-xxl-3 col-md-6 mb-5">
            <div class="card card-raised border-start bg-primary border-4" style="cursor: no-drop;">
                <div class="card-body px-4">
                    <div class="d-flex justify-content-between text-white align-items-center mb-2">
                        <div class="me-2">
                            <div class="display-5 text-white">Andon</div>
                            <div class="card-text">Interrupciones de flujo</div>
                        </div>
                        <div class="icon-circle bg-white-50 text-white"><i class="material-icons">space_dashboard</i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6 mb-5">
            <div class="card card-raised border-start bg-info border-4">
                <div class="card-body px-4">
                    <div class="d-flex justify-content-between text-white align-items-center mb-2">
                        <div class="me-2">
                            <div class="display-5 text-white">Hora x Hora</div>
                            <div class="card-text">Seguimiento</div>
                        </div>
                        <div class="icon-circle bg-white-50 text-white"><i class="material-icons">pending_actions</i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Colored status cards-->
    </div>
    <div class="row gx-5">
        <div class="col-lg-8 mb-5">
            <div class="card card-raised h-100">
                <div class="card-header bg-transparent px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-4">
                            <h2 class="card-title mb-0">Reportes de produccion</h2>
                            <div class="card-subtitle">Plan contra Producción</div>
                        </div>
                        <div class="d-flex gap-2 me-n2">
                            <button class="btn btn-lg btn-text-primary btn-icon" type="button"><i class="material-icons">download</i></button>
                            <button class="btn btn-lg btn-text-primary btn-icon" type="button"><i class="material-icons">print</i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row gx-4">
                        <div class="col-12 col-xxl-2">
                            <div class="d-flex flex-column flex-md-row flex-xxl-column align-items-center align-items-xl-start justify-content-between">
                                <div class="mb-4 text-center text-md-start">
                                    <div class="text-xs font-monospace text-muted mb-1">Producido</div>
                                    <div class="display-5 fw-500">59,482</div>
                                </div>
                                <div class="mb-4 text-center text-md-start">
                                    <div class="text-xs font-monospace text-muted mb-1">Meta</div>
                                    <div class="display-5 fw-500">50,000</div>
                                </div>
                                <div class="mb-4 text-center text-md-start">
                                    <div class="text-xs font-monospace text-muted mb-1">Eficiencia</div>
                                    <div class="display-5 fw-500 text-success">119%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xxl-10"><canvas id="dashboardBarChart"></canvas></div>
                    </div>
                </div>
                <div class="card-footer bg-transparent position-relative ripple-gray">
                    <a class="d-flex align-items-center justify-content-end text-decoration-none stretched-link text-primary" href="#!">
                        <div class="fst-button">Reportar</div>
                        <i class="material-icons icon-sm ms-1">chevron_right</i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Segments pie chart example-->
        <div class="col-lg-4 mb-5">
            <div class="card card-raised h-100">
                <div class="card-header bg-transparent px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-4">
                            <h2 class="card-title mb-0">Interrupciones</h2>
                            <div class="card-subtitle">Alertas</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex h-100 w-100 align-items-center justify-content-center">
                        <div class="w-100" style="max-width: 20rem"><canvas id="myPieChart_HoraxHora"></canvas></div>

                    </div>
                </div>
                <div class="card-footer bg-transparent position-relative ripple-gray">
                    <a class="d-flex align-items-center justify-content-end text-decoration-none stretched-link text-primary" href="#!">
                        <div class="fst-button">Open Report</div>
                        <i class="material-icons icon-sm ms-1">chevron_right</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>