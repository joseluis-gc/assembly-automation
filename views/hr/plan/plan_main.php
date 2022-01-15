<!-- Page header-->
<style>
    .isDisabled {
        color: currentColor;
        cursor: not-allowed;
        opacity: 0.5;
        text-decoration: none;
    }
</style>
<header class="bg-dark">
    <div class="container-xl px-5"><h1 class="text-white py-3 mb-0 display-6">Selección de celda  para el <b class="text-info"><?php echo shiftString() ?></b> turno. </h1></div>
</header>
<div class="container-xl p-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 gx-5">

        <?php
        if(isset($_GET['plant_id']) && is_numeric($_GET['plant_id'])) {
            //echo "set";
            $query = "SELECT * FROM plant WHERE plant_active = 1 AND plant_id = {$_GET['plant_id']}";
        }else{
            //echo "not set";
            $query = "SELECT * FROM plant WHERE plant_active = 1";
        }
        $result = mysqli_query($connection,$query);
        if(!$result):
            die("Query Error");

        else:
            while($row = mysqli_fetch_array($result)):

        ?>

        <div class="col">
            <!-- Collapsible card (users)-->
            <div class="card card-raised card-collapsible mb-5" id="usersCollapse">
                <div class="card-header bg-transparent" data-bs-toggle="collapse" data-bs-target="#usersCollapseContent" aria-expanded="true" aria-controls="usersCollapseContent">
                    <div class="d-flex align-items-center">
                        <i class="material-icons text-primary">person</i>
                        <div class="ms-3">
                            <div class="fs-6 mb-1 fw-500"><?php echo $row['plant_name'] ?></div>
                            <div class="small">Elige una celda</div>
                        </div>
                    </div>
                    <i class="material-icons card-header-icon">expand_less</i>
                </div>
                <div class="card-body px-0 collapse show" id="usersCollapseContent" data-bs-parent="#usersCollapse">
                    <div class="nav flex-column">
                        <?php
                        $query_sites = "SELECT * FROM site WHERE plant_id = {$row['plant_id']}";
                        $result_sites = mysqli_query($connection, $query_sites);
                        while($row_site = mysqli_fetch_array($result_sites)):

                            $query_assets = "SELECT * FROM assets WHERE asset_site = {$row_site['site_id']} AND pom = 1";
                            $run_query_assets = mysqli_query($connection, $query_assets);
                            $num = mysqli_num_rows($run_query_assets);
                            if($num == 0){
                                $disabled = "isDisabled";
                                $link = "";
                            }else{
                                $disabled ="";
                                $link = "index.php?page=plan_measurement&plan_site={$row_site['site_id']}";
                            }
                        ?>
                            <!--index.php?page=plan_measurement&plan_site=-->
                            <?php // echo $row_site['site_id']; ?>
                            <a class="nav-link ripple-gray px-3 py-2 <?php echo $disabled ?> " href="<?php echo $link; ?>">
                                <?php echo $row_site['site_name']; ?>
                                <span style="float: right;" class="badge bg-primary"><?php echo $num ?></span>
                            </a>
                        <?php
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
                endwhile;
            endif;
        ?>
    </div>
</div>
