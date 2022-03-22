<?php
    require_once "classes/models/PlantModel.php";
    require_once "classes/models/AreaModel.php";
?>

<div class="container">
    <div class="card card-raised">
        <div class="card-header bg-transparent px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title mb-0">Areas</h2>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-lg btn-icon" type="button"><i class="material-icons">download</i></button>
                    <button class="btn btn-lg btn-icon" type="button"><i class="material-icons">print</i></button>
                </div>
            </div>


            <form method="post" autocomplete="off" 
            
            <?php if (isset($action) && $action == 'edit' ): ?>
                action="index.php?page=areas&action=update"
            <?php else: ?>
                action="index.php?page=areas&action=insert"
            <?php endif; ?>          
            >

            <div class="row mb-4 mt-3">
                
                <div class="form-group col-md-6">

                <label for="inputPlant">Plant Name</label>
                <select id="inputPlant" class="form-select" name="plant_id" aria-label="Plant Selection">
                    <option value="-1">[Select a Plant]</option>

                    <?php 
                    $plantModel = new PlantModel;                    
                    foreach($plantModel->getAll() as $plant)
                    {
                        $selected = '';
                        if (isset($action) && $action == 'edit' && $plant_id == $plant->plant_id )
                        {
                            $selected = 'selected';
                        }
                        
                        $option = '<option value="' . $plant->plant_id . '"' . $selected .  '>' . $plant->plant_name . '</option>';
                        echo $option;
                    }
                    ?>

                </select>
                </div>

                <div class="form-group col-md-6">
                    
                <label for="inputAreaName">Area Name</label>
                <input type="text" name="site_name" class="form-control" id="inputAreaName" 

                        <?php if (isset($action) && $action == 'edit' ): ?>
                            value="<?php echo $site_name ?>"
                        <?php else: ?>
                            value=""
                         <?php endif; ?>
                         >

                </div>
                <div class="text-end">
                <?php if (isset($action) && $action == 'edit' ): ?>
                        <a class="btn btn-secondary mt-3" href="index.php?page=areas">Cancelar</a>
                        <?php endif; ?>

                        <button class="btn btn-primary mt-3" type="submit">
                        <?php if (isset($action) && $action == 'edit' ): ?>
                            Update
                        <?php else: ?>
                            Create Area
                <?php endif; ?>
                        </button>
                </div>
            </div>

            </form>

        </div>
        <div class="card-body p-4">
            <!-- Simple DataTables example-->

            <?php 
                if (isset($_SESSION['errors'])) 
                {
                    echo $_SESSION['errors'];

                    $_SESSION['errors'] = NULL;
                }
            ?>
                
            

            <table id="datatablesSimple" class="text-center">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Area name</th>
                        <th class="text-center">Plant</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                <?php 

                $areaModel = new AreaModel;
                
                //foreing_key, foreign_table, foreign_column_id, column
                $innerjoins = array();
                array_push($innerjoins, ['foreign_key' => 'plant_id', 'foreign_table' => 'plant', 'foreign_column_id' => 'plant_id', 'column' => 'plant.plant_name as plant'] );

                $areas = $areaModel->getAll($innerjoins); 
                foreach($areas as $site)
                {
                    
                    echo <<<EOF
                        <tr>
                        <td>{$site->site_id}</td>   
                        <td>{$site->site_name}</td>
                        <td>{$site->plant}</td>
                        <td>
                            <a href="index.php?page=areas&action=edit&id={$site->site_id}" class="btn btn-warning">
                                <i class="material-icons icon-sm me-1 text-light">edit</i>
                            </a>
                            <a  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#YesNoModal" 
                                data-bs-area-id="{$site->site_id}"
                                data-bs-area-name="{$site->site_name}"
                                >
                                <i class="material-icons icon-sm me-1">delete</i>

                            </a>
                        </td>
                        </tr>
EOF;
}
?>


                </tbody>
            </table>
        </div>
    </div>
</div>