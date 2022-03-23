<?php
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
            <div class="row mb-4 mt-3">

                <div class="form-group col-md-6">
                    <label for="inputPlantName">Nombre de la Planta</label>
                    <select class="form-select" id="inputPlanName" aria-label="Seleccione la Planta">
                        <option selected>Seleccione la Planta</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <!--<mwc-textfield class="w-100" label="Plant" outlined type="text" value=""></mwc-textfield>-->
                </div>
                <div class="form-group col-md-6">
                    <label for="inputArea">Nombre del Área</label>
                    <input type="text" name="plant_name" class="form-control" id="inputArea" 

                    <?php if (isset($action) && $action == 'edit' ): ?>
                            value="<?php echo $plant_name ?>"
                    <?php else: ?>
                           value=""
                         <?php endif; ?>
                    >
                </div>
                <div class="text-end"><button class="btn btn-primary mt-3" type="button">Save changes</button></div>
            </div>
        </div>
        <div class="card-body p-4">


            <!-- Simple DataTables example-->
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

                //foreign_key, foreign_table, foreign_column_id, column, 
                $includes = array();
                array_push($includes, ['foreign_key' => 'plant_id', 'foreign_table' => 'plant','foreign_column_id' => 'plant_id', 'column' => 'plant.plant_name as plant']);

                $areaModel = new AreaModel;    
                $sites = $areaModel->getAll($includes);       

                foreach($sites as $site)
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
                                data-bs-plant-id="{$site->site_id}"
                                data-bs-plant-name="{$site->site_name}"
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