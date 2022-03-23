<div id="layoutDrawer">
    <div id="layoutDrawer_nav">
        <nav class="drawer accordion drawer-light bg-white" id="drawerAccordion">
            <div class="drawer-menu">
                <div class="nav">
                    <div class="drawer-menu-heading">Andon App</div>
                    <a class="nav-link" href="index.php?page=andon">
                        <div class="nav-link-icon"><i class="material-icons">dashboard</i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="index.php?page=areas">
                        <div class="nav-link-icon"><i class="material-icons">space_dashboard</i></div>
                        Areas
                    </a>
                    <a class="nav-link" href="index.php?page=machines">
                        <div class="nav-link-icon"><i class="material-icons">precision_manufacturing</i></div>
                        Máquinas
                    </a>
                    <a class="nav-link" href="index.php?page=plants">
                        <div class="nav-link-icon"><i class="material-icons">factory</i></div>
                        Plantas
                    </a>
                    <div class="drawer-menu-divider"></div>
                    <div class="drawer-menu-heading">Hora x Hora</div>
                    <a class="nav-link" href="index.php">
                        <div class="nav-link-icon"><i class="material-icons">dashboard</i></div>
                        Dashboard
                    </a>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseHr" aria-expanded="false" aria-controls="collapsePages">
                        <div class="nav-link-icon"><i class="material-icons">factory</i></div>
                        Administrar por Planta
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>
                    <div class="collapse" id="collapseHr" aria-labelledby="headingTwo" data-bs-parent="#drawerAccordion">
                        <nav class="drawer-menu-nested nav accordion" id="drawerAccordionPages">
                            <?php
                            $cont = 1;
                            $query = "SELECT * FROM plant WHERE plant_active = 1;";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($result)) :
                            ?>
                                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount<?php echo $cont ?>" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                    <?php echo $row['plant_name']; ?>
                                    <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAccount<?php echo $cont ?>" aria-labelledby="headingOne" data-bs-parent="#drawerAccordionPages">
                                    <nav class="drawer-menu-nested nav">
                                        <a class="nav-link" href="index.php?page=plan_main&plant_id=<?php echo $row['plant_id']; ?>">Cargar Plan</a>
                                        <a class="nav-link" href="index.php?page=captura_manual&plant_id=<?php echo $row['plant_id']; ?>">Captura Manual</a>
                                        <a class="nav-link" href="#">Puntos de medicion</a>
                                    </nav>
                                </div>
                            <?php
                                $cont++;
                            endwhile;
                            ?>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseOptions" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="nav-link-icon"><i class="material-icons">table_chart</i></div>
                        Plan de producción
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>
                    <div class="collapse" id="collapseOptions" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                        <nav class="drawer-menu-nested nav">
                            <a class="nav-link" href="index.php?page=plan_main">Cargar Plan</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseReports2" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="nav-link-icon"><i class="material-icons">leaderboard</i></div>
                        Reportes
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>
                    <div class="collapse" id="collapseReports2" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                        <nav class="drawer-menu-nested nav">
                            <a class="nav-link" href="layout-dark.html">Reporte Diario</a>
                            <a class="nav-link" href="layout-light.html">Reporte Personalizado</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="drawer-footer border-top">
                <div class="d-flex align-items-center">
                    <img style="width: 2rem;" src="views/_assets/img/mcolor.png" alt="">
                    <div class="ms-3">
                        <div class="caption">Logged in as:</div>
                        <div class="small fw-500"><?php echo $_SESSION['user_name']; ?></div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutDrawer_content">
        <main>