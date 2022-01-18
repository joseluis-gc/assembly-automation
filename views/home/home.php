<!-- Main dashboard content-->
    <div class="container-xl p-5">
        <div class="row justify-content-between align-items-center mb-5">
            <div class="col flex-shrink-0 mb-5 mb-md-0">
                <h1 class="display-4 mb-0">Panel de control</h1>
                <div class="text-muted">Aplicaciones Disponibles</div>
            </div>
            <div class="col-12 col-md-auto">
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <mwc-select class="mw-50 mb-2 mb-md-0" outlined label="View by">
                        <mwc-list-item selected value="0">Order type</mwc-list-item>
                        <mwc-list-item value="1">Segment</mwc-list-item>
                        <mwc-list-item value="2">Customer</mwc-list-item>
                    </mwc-select>
                    <mwc-select class="mw-50" outlined label="Sales from">
                        <mwc-list-item value="0">Last 7 days</mwc-list-item>
                        <mwc-list-item value="1">Last 30 days</mwc-list-item>
                        <mwc-list-item value="2">Last month</mwc-list-item>
                        <mwc-list-item selected value="3">Last year</mwc-list-item>
                    </mwc-select>
                </div>
            </div>
        </div>
        <!-- Colored status cards-->
        <div class="row gx-5">
            <div class="col-xxl-3 col-md-6 mb-5">
                <div class="card card-raised border-start border-primary border-4">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5">Andon</div>
                                <div class="card-text">Interrupciones de flujo</div>
                            </div>
                            <div class="icon-circle bg-primary text-white"><i class="material-icons">download</i></div>
                        </div>
                        <!--
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6 mb-5">
                <div class="card card-raised border-start border-info border-4">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5">Hora x Hora</div>
                                <div class="card-text">Seguimiento</div>
                            </div>
                            <div class="icon-circle bg-info text-white"><i class="material-icons">storefront</i></div>
                        </div>
                        <!--
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
            <!--
            <div class="col-xxl-3 col-md-6 mb-5">
                <div class="card card-raised border-start border-secondary border-4">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5">5.3K</div>
                                <div class="card-text">Customers</div>
                            </div>
                            <div class="icon-circle bg-secondary text-white"><i class="material-icons">people</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6 mb-5">
                <div class="card card-raised border-start border-info border-4">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5">7</div>
                                <div class="card-text">Channels</div>
                            </div>
                            <div class="icon-circle bg-info text-white"><i class="material-icons">devices</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            -->
        </div>
        <div class="row gx-5">
            <!-- Revenue breakdown chart example-->
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
                            <div class="dropdown">
                                <button class="btn btn-lg btn-text-gray btn-icon me-n2 dropdown-toggle" id="segmentsDropdownButton" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></button>
                                <ul class="dropdown-menu" aria-labelledby="segmentsDropdownButton">
                                    <li><a class="dropdown-item" href="#!">Action</a></li>
                                    <li><a class="dropdown-item" href="#!">Another action</a></li>
                                    <li><a class="dropdown-item" href="#!">Something else here</a></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href="#!">Separated link</a></li>
                                    <li><a class="dropdown-item" href="#!">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex h-100 w-100 align-items-center justify-content-center">
                            <div class="w-100" style="max-width: 20rem"><canvas id="myPieChart"></canvas></div>
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
        <div class="row gx-5">
            <!-- Privacy suggestions illustrated card-->
            <div class="col-xl-6 mb-5">
                <div class="card card-raised h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between">
                            <div class="me-4">
                                <h2 class="card-title mb-0">Privacy Suggestions</h2>
                                <p class="card-text">Take our privacy checkup to choose which settings are right for you.</p>
                            </div>
                            <img src="assets/img/illustrations/security.svg" alt="..." style="height: 6rem" />
                        </div>
                    </div>
                    <div class="card-footer bg-transparent position-relative ripple-gray px-4"><a class="stretched-link text-decoration-none" href="#!">Review suggestions (4)</a></div>
                </div>
            </div>
            <!-- Account storage illustrated card-->
            <div class="col-xl-6 mb-5">
                <div class="card card-raised h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between">
                            <div class="me-4">
                                <h2 class="card-title mb-0">Account Storage</h2>
                                <p class="card-text">Your account storage is shared across all devices.</p>
                                <div class="progress mb-2" style="height: 0.25rem"><div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="30"></div></div>
                                <div class="card-text">10 GB of 30 GB used</div>
                            </div>
                            <img src="assets/img/illustrations/cloud.svg" alt="..." style="height: 6rem" />
                        </div>
                    </div>
                    <div class="card-footer bg-transparent position-relative ripple-gray px-4"><a class="stretched-link text-decoration-none" href="#!">Manage storage</a></div>
                </div>
            </div>
        </div>
        <div class="card card-raised">
            <div class="card-header bg-transparent px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-4">
                        <h2 class="card-title mb-0">Orders</h2>
                        <div class="card-subtitle">Details and history</div>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-lg btn-text-primary btn-icon" type="button"><i class="material-icons">download</i></button>
                        <button class="btn btn-lg btn-text-primary btn-icon" type="button"><i class="material-icons">print</i></button>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <!-- Simple DataTables example-->
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Ext.</th>
                        <th>City</th>
                        <th data-type="date" data-format="YYYY/MM/DD">Start Date</th>
                        <th>Completion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Unity Pugh</td>
                        <td>9958</td>
                        <td>Curicó</td>
                        <td>2005/02/11</td>
                        <td>37%</td>
                    </tr>
                    <tr>
                        <td>Theodore Duran</td>
                        <td>8971</td>
                        <td>Dhanbad</td>
                        <td>1999/04/07</td>
                        <td>97%</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
