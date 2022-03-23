<?php

include_once("Controller.php");
include_once("classes/models/PlantModel.php");
include_once("classes/reports/PlantsPdfReport.php");
include_once("classes/database/QueryBuilder.php");

class PlantController extends Controller
{

    protected $useDefaultActions = TRUE;

    function __construct() {
        parent::__construct();
        //echo json_encode($_GET);
       
    }

    public function view()
    {
        include("views/andon/plants/plants.php");
    }

    public function insert()
    {
        //Send the data
        $model = new PlantModel;
        $data['plant_name'] = $this->plant_name;
        $data['plant_password'] = $this->plant_password;
        $data['use_pass'] = $this->plant_password == '' ? 0 : 1;
        $model->insert($data);

        $_SESSION['success'] = "plant was inserted correctly!!!";
        header("Location: index.php?page=plants");
        exit();
    }
    

    public function edit()
    {
        $model = new PlantModel;
        $plant = $model->get( $_GET['id']  );

        $data['action'] = $_GET['action'];
        $data['plant_id'] = $plant->plant_id;
        $data['plant_name'] = $plant->plant_name;
        $data['plant_password'] = $plant->plant_password;

        $this->includeWithVariables("views/andon/plants/plants.php", $data );
    }

    public function update()
    {
        $model = new PlantModel;
        $data['plant_name'] = $this->plant_name;
        $data['plant_password'] = $this->plant_password;
        $model->update($data, $this->plant_id);

        //echo json_encode($this->plant_id);

        $_SESSION['success'] = "plant was updated correctly!!!";
        header("Location: index.php?page=plants");
        exit();
    }


    public function delete()
    {
        $model = new PlantModel;
        $model->delete( $_POST['id'] );

        $_SESSION['success'] = "plant was deleted correctly!!!";
        header("Location: index.php?page=plants");
        exit();
    }

    public function pdf()
    {

        $queryBuilder = new QueryBuilder;
        $queryBuilder->select('plant_id, plant_name, plant_password');
        $query =  $queryBuilder->get('plant');    

        //echo $query;

        $report = new PlantsPdfReport;

        //echo json_encode( $queryBuilder->getData());

        $report->GenerateReport('plantas.pdf', 'Lista de Plantas', 'www.martechmedical.com', 
            $queryBuilder->getColumns(),['id', 'Planta','Password',],  $queryBuilder->getData() );
    }
    

    

}

?>