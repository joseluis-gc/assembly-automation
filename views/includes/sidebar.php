<!-- Layout wrapper-->
<div id="layoutDrawer">
    <!-- Layout navigation-->
    <div id="layoutDrawer_nav">
        <!-- Drawer navigation-->
        <nav class="drawer accordion drawer-light bg-white" id="drawerAccordion">
            <div class="drawer-menu">
                <div class="nav">
                    <!-- Drawer section heading (Account)-->
                    <div class="drawer-menu-heading d-sm-none">Account</div>
                    <!-- Drawer link (Notifications)-->
                    <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i class="material-icons">notifications</i></div>
                        Notifications
                    </a>
                    <!-- Drawer link (Messages)-->
                    <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i class="material-icons">mail</i></div>
                        Messages
                    </a>
                    <!-- Divider-->
                    <div class="drawer-menu-divider d-sm-none"></div>
                    <!-- Drawer section heading (Interface)-->
                    <div class="drawer-menu-heading">Andon App</div>
                    <!-- Drawer link (Overview)-->
                    <a class="nav-link" href="index.html">
                        <div class="nav-link-icon"><i class="material-icons">language</i></div>
                        Andon
                    </a>
                    <!-- Drawer link (Dashboards)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                        <div class="nav-link-icon"><i class="material-icons">dashboard</i></div>
                        Alertas
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>
                    <!-- Nested drawer nav (Dashboards)-->
                    <div class="collapse" id="collapseDashboards" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                        <nav class="drawer-menu-nested nav">
                            <a class="nav-link" href="app-dashboard-default.html">Lista de alertas</a>
                            <a class="nav-link" href="app-dashboard-minimal.html">Crear Alertas</a>
                        </nav>
                    </div>



                    <!-- Drawer link (Layouts)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="nav-link-icon"><i class="material-icons">view_compact</i></div>
                        Perfiles
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>
                    <!-- Nested drawer nav (Layouts)-->
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                        <nav class="drawer-menu-nested nav">
                            <a class="nav-link" href="layout-dark.html">Lista de perfiles</a>
                            <a class="nav-link" href="layout-light.html">Crear Perfiles</a>
                            <a class="nav-link" href="layout-static.html">Asignar Perfiles</a>
                        </nav>
                    </div>


                    <!-- Drawer link (Layouts)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseReports" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="nav-link-icon"><i class="material-icons">view_compact</i></div>
                        Reportes
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>
                    <!-- Nested drawer nav (Layouts)-->
                    <div class="collapse" id="collapseReports" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                        <nav class="drawer-menu-nested nav">
                            <a class="nav-link" href="layout-dark.html">Reporte Diario</a>
                            <a class="nav-link" href="layout-light.html">Reporte Personalizado</a>
                        </nav>
                    </div>










                    <!-- Divider-->
                    <div class="drawer-menu-divider"></div>
                    <!-- Drawer section heading (UI Toolkit)-->
                    <div class="drawer-menu-heading">Hora x Hora</div>
                    <!-- Drawer link (Components)-->
                    <!-- Drawer link (Pages)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseHr" aria-expanded="false" aria-controls="collapsePages">
                        <div class="nav-link-icon"><i class="material-icons">layers</i></div>
                        Hora x Hora
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>



                    <!-- Nested drawer nav (Pages)-->

                    <div class="collapse" id="collapseHr" aria-labelledby="headingTwo" data-bs-parent="#drawerAccordion">
                        <nav class="drawer-menu-nested nav accordion" id="drawerAccordionPages">
                            <!-- Drawer link (Pages -> Account)-->
                            <?php
                            $cont = 1;
                            $query = "SELECT * FROM plant WHERE plant_active = 1;";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($result)):
                            ?>


                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount<?php echo $cont ?>" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                <?php echo $row['plant_name']; ?>
                                <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                            </a>
                            <!-- Nested drawer nav (Pages -> Account)-->
                            <div class="collapse" id="pagesCollapseAccount<?php echo $cont ?>" aria-labelledby="headingOne" data-bs-parent="#drawerAccordionPages">
                                <nav class="drawer-menu-nested nav">
                                    <a class="nav-link" href="index.php?page=plan_main&plant_id=<?php echo $row['plant_id']; ?>">Cargar Plan</a>
                                    <a class="nav-link" href="app-account-notifications.html">Captura Manual</a>
                                    <a class="nav-link" href="app-account-profile.html">Puntos de medicion</a>
                                </nav>
                            </div>
                            <?php
                            $cont++;
                            endwhile;
                            ?>
                        </nav>






                    </div>



                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseOptions" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="nav-link-icon"><i class="material-icons">view_compact</i></div>
                        Plan
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>
                    <!-- Nested drawer nav (Layouts)-->
                    <div class="collapse" id="collapseOptions" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                        <nav class="drawer-menu-nested nav">
                            <a class="nav-link" href="index.php?page=plan_main">Cargar Plan</a>
                        </nav>
                    </div>












                    <!-- Divider-->
                    <div class="drawer-menu-divider"></div>
                    <!-- Drawer section heading (Plugins)-->
                    <div class="drawer-menu-heading">Configuración</div>
                    <!-- Drawer link (Charts)-->
                    <a class="nav-link" href="plugins-charts.html">
                        <div class="nav-link-icon"><i class="material-icons">bar_chart</i></div>
                        Charts
                    </a>
                    <!-- Drawer link (Code Blocks)-->
                    <a class="nav-link" href="plugins-code-blocks.html">
                        <div class="nav-link-icon"><i class="material-icons">code</i></div>
                        Code Blocks
                    </a>
                    <!-- Drawer link (Data Tables)-->
                    <a class="nav-link" href="plugins-data-tables.html">
                        <div class="nav-link-icon"><i class="material-icons">filter_alt</i></div>
                        Data Tables
                    </a>
                    <!-- Drawer link (Date Picker)-->
                    <a class="nav-link" href="plugins-date-picker.html">
                        <div class="nav-link-icon"><i class="material-icons">date_range</i></div>
                        Date Picker
                    </a>
                </div>
            </div>
            <!-- Drawer footer        -->
            <div class="drawer-footer border-top">
                <div class="d-flex align-items-center">
                    <i class="material-icons text-muted">account_circle</i>
                    <div class="ms-3">
                        <div class="caption">Logged in as:</div>
                        <div class="small fw-500"><?php echo $_SESSION['user_name']; ?></div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Layout content-->
    <div id="layoutDrawer_content">
        <!-- Main page content-->
        <main>
            <!-- Main dashboard content-->
