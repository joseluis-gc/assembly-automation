<?php
require_once "classes/models/PlantModel.php";
?>

<div class="container">
    <div class="card card-raised">
        <div class="card-header bg-transparent px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <?php if (isset($action) && $action == 'edit' ): ?>
                        <h2 class="card-title mb-0">Editing Plant</h2>
                    <?php else: ?>
                        <h2 class="card-title mb-0">Plantas</h2>
                    <?php endif; ?>
                    

                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-lg btn-icon" type="button"><i class="material-icons">download</i></button>
                    <a class="btn btn-lg btn-icon" type="button" href="index.php?page=plants&action=pdf" target="_blank"><i class="material-icons">print</i></a>
                </div>
            </div>


            <form method="post" autocomplete="off" 
            
            <?php if (isset($action) && $action == 'edit' ): ?>
                action="index.php?page=plants&action=update"
            <?php else: ?>
                action="index.php?page=plants&action=insert"
            <?php endif; ?>          
            >
                <div class="row mb-4 mt-3">
                    <!-- <form method="post" action="index.php?page=department"> -->
                    
                    <input type="hidden" name="plant_id"
                        <?php if (isset($action) && $action == 'edit' ): ?>
                            value="<?php echo $plant_id ?>"
                        <?php else: ?>
                            value=""
                         <?php endif; ?>
                    >

                    <div class="form-group col-md-6">
                         <label for="inputPlantName">Plant Name</label>
                         <input type="text" name="plant_name" class="form-control" id="inputPlantName" 

                        <?php if (isset($action) && $action == 'edit' ): ?>
                            value="<?php echo $plant_name ?>"
                        <?php else: ?>
                            value=""
                         <?php endif; ?>
                         >
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPlantPassword">Password</label>
                        <input type="password" name="plant_password" class="form-control" id="inputPlantPassword"  
                        
                        <?php if (isset($action) && $action == 'edit' ): ?>
                            value="<?php echo $plant_password ?>"
                        <?php else: ?>
                            value=""
                         <?php endif; ?>
                        
                        >

                    </div>
                    <div class="text-end">
                         <?php if (isset($action) && $action == 'edit' ): ?>
                        <a class="btn btn-secondary mt-3" href="index.php?page=plants">Cancelar</a>
                        <?php endif; ?>

                        <button class="btn btn-primary mt-3" type="submit">
                        <?php if (isset($action) && $action == 'edit' ): ?>
                            Actualizar
                        <?php else: ?>
                            Crear Planta
                        <?php endif; ?>
                        </button>
                    </div>
                    
                </div>
            </form>
        </div>
        <div class="card-body p-4">
                            
             <?php if ( isset($_SESSION['success'] ) ): ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $_SESSION['success']; unset($_SESSION['success']);  ?>
                </div>
            <?php endif; ?>


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
                            
                            echo <<<EOF
                                <tr>
                                <td>{$plant->plant_id}</td>
                                <td>{$plant->plant_name}</td>
                                <td>
                                    <a href="index.php?page=plants&action=edit&id={$plant->plant_id}" class="btn btn-warning">
                                        <i class="material-icons icon-sm me-1 text-light">edit</i>
                                    </a>
                                    <a  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#YesNoModal" 
                                        data-bs-plant-id="{$plant->plant_id}"
                                        data-bs-plant-name="{$plant->plant_name}"
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


<div class="modal fade" id="YesNoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

  <form action="index.php?page=plants&action=delete" method="post">
                    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hora X Hora</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <label class="col-form-label"></label>
            <input type="text" class="form-control" name="id" hidden>
      </div>
      <div class="modal-footer">
         
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete </button>
      </div>
    </div>

    </form>

  </div>
</div>

<script>
var yesNoModal = document.getElementById('YesNoModal')
yesNoModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var plantId = button.getAttribute('data-bs-plant-id');
  var plantName = button.getAttribute('data-bs-plant-name');
  
  var modalBody = yesNoModal.querySelector('.modal-body label');
  modalBody.textContent = 'Are you sure you want to Delete the Plant ' + plantName;

  var modalInput = yesNoModal.querySelector('.modal-body input');
  modalInput.value = plantId;

  console.log("plantId " + plantId);

})


</script>
