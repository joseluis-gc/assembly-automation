<?php

include_once("Controller.php");
include_once("classes/models/AreaModel.php");

//include_once("classes/reports/PlantsPdfReport.php");

class AreaController extends Controller
{

    

    function __construct() {
        parent::__construct();
        //echo json_encode($_GET);
       
    }

    public function view()
    {
        include("views/andon/plants/areas.php");
    }




    public function insert()
    {

        
        $this->set_rule('plant_id', 'required', 'Please select Plant to allow save a new Area');
        $this->set_rule('site_name', 'required', 'Please give a plant name!');
        $this->set_rule('plant_id', 'greater_than[0]', 'Please select Plant to allow save a new Area');
        
        if($this->validateData() == FALSE)
        {
            $_SESSION['errors'] = $this->getErrorMessage();
            header("Location: index.php?page=areas");
            exit();
            return;
        }
        

        
            //Send the data
        $model = new AreaModel;

        $data['site_name'] = $this->site_name;
        $data['plant_id'] = $this->plant_id;
        
        $data['date_create'] = date("Y-m-d H:i:s");
        $model->insert($data);


        $_SESSION['success'] = "Area was inserted correctly!!!";
        header("Location: index.php?page=areas");
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
        $report = new PlantsPdfReport;
        $report->GenerateReport();
    }
    

    

}

?>