<?php
$dashdoard = 'dashboard';
$_SESSION['newsession'] = $dashdoard; 
?>
<div class="container">
    <div class="row gx-5 mt-5">
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="card card-raised border-start border-5 border-success">
                <div class="card-body px-4">
                    <div class="overline text-muted mb-1">Today</div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="display-5 me-3">60</div>
                        <div class="d-flex align-items-center text-success">
                            <i class="material-icons icon-xl me-1">notification_important</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="card card-raised border-start border-4 border-warning">
                <div class="card-body px-4">
                    <div class="overline text-muted mb-1">Pending</div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="display-6 me-3">45</div>
                        <div class="d-flex align-items-center text-warning">
                            <i class="material-icons icon-xl me-1">settings</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="card card-raised border-start border-5 border-info">
                <div class="card-body px-4">
                    <div class="overline text-muted mb-1">Working</div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="display-6 me-3">50</div>
                        <div class="d-flex align-items-center text-info">
                            <i class="material-icons icon-xl me-2">build</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-5">
        <div class="card-header bg-white px-4">
            <!-- <div class="fs-5 my-1">Andon</div> -->
            <div class="display-6 me-3 text-center">Andon Events for: Jan 05 2022</div>
        </div>
        <div class="card-body p-4"><canvas id="myBarChart" width="100" height="30"></canvas></div>
    </div>
    <div class="row gx-5">
    <div class="col-xl-6 col-lg-6 mb-5">
            <div class="card card-raised h-100 overflow-hidden">
                <div class="card-header bg-primary text-white px-4">
                    <div class="fw-500">Needs Solutions</div>
                </div>
                <div class="card-body p-0">
                    <div class="card-header bg-light px-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-4">
                                <h2 class="card-title mb-0">Setup8 : Initial Break</h2>
                                <div class="card-subtitle">47 dia(s), 22 hora(s), 46 minuto(s), 3 segundo(s) activo</div>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-lg btn-icon" type="button"><i class="material-icons">edit</i></button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="fw-500"><strong>Plant: </strong><span>Ensamble</span></div>
                                <div class="fw-500"><strong>Site: </strong><span>Dilators</span></div>
                                <div class="fw-500"><strong>Machine: </strong><span>BOY25</span></div>
                                <div class="fw-500"><strong>Work Center: </strong><span>BOY25</span></div>
                            </div>
                            <div class="col-md-6">
                                <div class="fw-500"><strong>Control No: </strong><span>BOY25</span></div>
                                <div class="fw-500"><strong>Part Number:</strong><span>pn167</span></div>
                                <div class="fw-500"><strong>Work Order:</strong><span>on002</span></div>
                                <div><button class="btn btn-raised-primary btn-xs px-6 mt-1" type="button">Attend</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header bg-light px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-4">
                            <h2 class="card-title mb-0">Setup8 : Initial Break</h2>
                            <div class="card-subtitle">47 dia(s), 22 hora(s), 46 minuto(s), 3 segundo(s) activo</div>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-lg btn-icon" type="button"><i class="material-icons">edit</i></button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="fw-500"><strong>Plant: </strong><span>Ensamble</span></div>
                            <div class="fw-500"><strong>Site: </strong><span>Dilators</span></div>
                            <div class="fw-500"><strong>Machine: </strong><span>BOY25</span></div>
                            <div class="fw-500"><strong>Work Center: </strong><span>BOY25</span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="fw-500"><strong>Control No: </strong><span>BOY25</span></div>
                            <div class="fw-500"><strong>Part Number:</strong><span>pn167</span></div>
                            <div class="fw-500"><strong>Work Order:</strong><span>on002</span></div>
                            <div><button class="btn btn-raised-primary btn-xs px-6 mt-1" type="button">Attend</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent position-relative ripple-gray">
                    <a class="d-flex align-items-center justify-content-end text-decoration-none stretched-link text-primary" href="#!">
                        <div class="fst-button">Manage Attention</div>
                        <i class="material-icons icon-sm ms-1">chevron_right</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 mb-5">
            <div class="card card-raised h-100 overflow-hidden">
                <div class="card-header bg-danger text-white px-4">
                    <div class="fw-500">Needs Attention</div>
                </div>
                <div class="card-body p-0">
                    <div class="card-header bg-light px-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-4">
                                <h2 class="card-title mb-0">Setup8 : Initial Break</h2>
                                <div class="card-subtitle">47 dia(s), 22 hora(s), 46 minuto(s), 3 segundo(s) activo</div>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-lg btn-icon" type="button"><i class="material-icons">edit</i></button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="fw-500"><strong>Plant: </strong><span>Ensamble</span></div>
                                <div class="fw-500"><strong>Site: </strong><span>Dilators</span></div>
                                <div class="fw-500"><strong>Machine: </strong><span>BOY25</span></div>
                                <div class="fw-500"><strong>Work Center: </strong><span>BOY25</span></div>
                            </div>
                            <div class="col-md-6">
                                <div class="fw-500"><strong>Control No: </strong><span>BOY25</span></div>
                                <div class="fw-500"><strong>Part Number:</strong><span>pn167</span></div>
                                <div class="fw-500"><strong>Work Order:</strong><span>on002</span></div>
                                <div><button class="btn btn-raised-danger btn-xs px-6 mt-1" type="button">Attend</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header bg-light px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-4">
                            <h2 class="card-title mb-0">Setup8 : Initial Break</h2>
                            <div class="card-subtitle">47 dia(s), 22 hora(s), 46 minuto(s), 3 segundo(s) activo</div>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-lg btn-icon" type="button"><i class="material-icons">edit</i></button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="fw-500"><strong>Plant: </strong><span>Ensamble</span></div>
                            <div class="fw-500"><strong>Site: </strong><span>Dilators</span></div>
                            <div class="fw-500"><strong>Machine: </strong><span>BOY25</span></div>
                            <div class="fw-500"><strong>Work Center: </strong><span>BOY25</span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="fw-500"><strong>Control No: </strong><span>BOY25</span></div>
                            <div class="fw-500"><strong>Part Number:</strong><span>pn167</span></div>
                            <div class="fw-500"><strong>Work Order:</strong><span>on002</span></div>
                            <div><button class="btn btn-raised-danger btn-xs px-6 mt-1" type="button">Attend</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent position-relative ripple-gray">
                    <a class="d-flex align-items-center justify-content-end text-decoration-none stretched-link text-danger" href="#!">
                        <div class="fst-button">Manage solutions</div>
                        <i class="material-icons icon-sm ms-1">chevron_right</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>