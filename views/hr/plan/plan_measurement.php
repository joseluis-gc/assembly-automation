<?php
if(isset($_GET['plan_site']) && is_numeric($_GET['plan_site'])) {
    $plan_site = $_GET['plan_site'];
}else{
    die("No Parameter!".$_GET['plan_site']);
}
?>
<!-- Page header-->
<header class="bg-dark">
    <div class="container-xl px-5"><h1 class="text-white py-3 mb-0 display-6">Selección de puntos de medición</h1></div>
</header>
<div class="container-xl p-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 gx-5">

        <?php
        $shift = getShift();
        //$query = "SELECT * FROM assets WHERE asset_site = $plan_site AND pom = 1";
        //$query = "SELECT * FROM assets INNER JOIN plan_hrxhr ON plan_asset = asset_id  WHERE asset_site = $plan_site AND pom = 1";
        //$query = "SELECT * FROM assets INNER JOIN plan_hrxhr ON plan_asset = asset_id  WHERE asset_site = $plan_site AND pom = 1";

        $query = "SELECT * FROM assets WHERE asset_site = $plan_site AND pom = 1";
        $result = mysqli_query($connection,$query);
        if(!$result):
            die("Query Error");

        else:
            $today = Today();
            while($row = mysqli_fetch_array($result)):
            $get_plan = "SELECT * FROM plan_hrxhr WHERE plan_asset = {$row['asset_id']} AND shift = $shift AND date =  '$today' ";
            $run_get_plan = mysqli_query($connection, $get_plan);
            if(mysqli_num_rows($run_get_plan)>0){
                $warning_test = "Ya existe un plan para este dia.";
            }else{
                $warning_test = "";
            }
        ?>

                <div class="col">
                    <!-- Collapsible card (users)-->
                    <a style="text-decoration: none;" href="index.php?page=plan_form&asset_id=<?php echo $row['asset_id']; ?>">
                    <div class="card card-raised card-collapsible mb-5" id="usersCollapse">
                        <div class="card-header bg-transparent" data-bs-toggle="collapse" data-bs-target="#usersCollapseContent" aria-expanded="true" aria-controls="usersCollapseContent">
                            <div class="d-flex align-items-center">
                                <i class="material-icons text-primary">person</i>
                                <div class="ms-3">
                                    <div class="fs-6 mb-1 fw-500"><?php echo $row['asset_name'] ?></div>
                                    <div class="small">Seleccionar este punto</div>
                                    <div class="small text-primary"><?php echo $warning_test ?></div>
                                </div>
                            </div>
                            <i class="material-icons card-header-icon">expand_less</i>
                        </div>
                    </div>
                    </a>
                </div>

            <?php
            endwhile;
        endif;
        ?>
    </div>
</div>
