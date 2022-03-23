<?php

include_once("Controller.php");
include_once("classes/models/AreaModel.php");


include_once("classes/reports/PlantsPdfReport.php");
include_once("classes/database/QueryBuilder.php");

class AreaController extends Controller
{

    protected $useDefaultActions = TRUE;

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
        //$field, $rule, $message_error
        $this->set_rule('site_name','required','The area name is required');
        $this->set_rule('plant_id','greater_than[0]','select a plant for insert a new area');

        if(!$this->validateData())
        {
            $_SESSION['errors'] = $this->getErrorMessage();
            header("Location: index.php?page=areas");
            exit();
            return;
        }

        
        //Send the data
        $model = new AreaModel;
        $data['plant_id'] = $this->plant_id;
        $data['site_name'] = $this->site_name;
        $data['date_create'] = date("Y-m-d H:i:s");
        $model->insert($data);

        $_SESSION['success'] = "Area was inserted correctly!!!";
        header("Location: index.php?page=areas");
        exit();
        
    }
    

    public function edit()
    {
        
        $model = new AreaModel;
        $site = $model->get( $_GET['id']  );

        $data['action'] = $_GET['action'];
        $data['site_id'] = $site->site_id;
        $data['site_name'] = $site->site_name;
        $data['plant_id'] = $site->plant_id;

        $this->includeWithVariables("views/andon/plants/areas.php", $data );
    }

    public function update()
    {
        $this->set_rule('site_name','required','The area name is required');
        $this->set_rule('plant_id','greater_than[0]','select a plant for insert a new area');

        if(!$this->validateData())
        {
            $_SESSION['errors'] = $this->getErrorMessage();
            header("Location: index.php?page=areas&action=edit");
            exit();
            return;
        }

        $model = new AreaModel;
        $data['site_name'] = $site->site_name;
        $data['plant_id'] = $site->plant_id;
        $model->update($data, $this->site_id);

        //echo json_encode($this->plant_id);

        $_SESSION['success'] = "plant was updated correctly!!!";
        header("Location: index.php?page=plants");
        exit();
    }




    public function delete()
    {
        $model = new AreaModel;
        $model->delete( $_POST['id'] );

        $_SESSION['success'] = "Area was deleted correctly!!!";
        header("Location: index.php?page=areas");
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

        $report->GenerateReport('areas.pdf', 'Areas List', 'www.martechmedical.com', 
            $queryBuilder->getColumns(),['id', 'Site Name','Plant Id',],  $queryBuilder->getData() );
    }
    

    

}

?>