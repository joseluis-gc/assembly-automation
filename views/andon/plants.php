<?php
require_once "classes/models/PlantModel.php";
?>

<div class="container">
    <div class="card card-raised">
        <div class="card-header bg-transparent px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title mb-0">Plants</h2>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-lg btn-icon" type="button"><i class="material-icons">download</i></button>
                    <button class="btn btn-lg btn-icon" type="button"><i class="material-icons">print</i></button>
                </div>
            </div>
            <div class="row mb-4 mt-3">
                <div class="col-md-6">
                    <mwc-textfield class="w-100" label="Plant name" outlined type="text" value=""></mwc-textfield>
                </div>
                <div class="col-md-6">
                    <mwc-textfield class="w-100" label="Password" outlined type="password" value=""></mwc-textfield>
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
                        <th class="text-center">Plant name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>


                    <?php 

                        $plantModel = new PlantModel;                    
                        foreach($plantModel->getAll() as $plant)
                        {
                            echo <<<OUT
                                <tr>
                                <td>{$plant->plant_id}</td>
                                <td>{$plant->plant_name}</td>
                                <td>
                                    <a href="" class="btn btn-warning">
                                        <i class="material-icons icon-sm me-1 text-light">edit</i>
                                    </a>
                                    <a href="" class="btn btn-danger">
                                        <i class="material-icons icon-sm me-1">delete</i>
        
                                    </a>
                                </td>
                                </tr>
                            OUT;                   
                        }  
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>