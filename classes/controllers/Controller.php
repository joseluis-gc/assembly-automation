<?php

class Controller
{


    protected $_data = array();

    function __construct() {
        
        if( isset( $_GET['action']) )
        {
            $action = $_GET['action'];

            //Aqui se llenan todos los campos que trae
            foreach($_POST as $key => $value)
            {
                $this->{$key} = $value;
            }

            switch($action)
            {
                case 'insert':
                {
                    $this->insert();
                }break;

                case 'edit':
                {
                    $this->edit();
                }break;

                case 'update':
                {
                    $this->update();
                }break;


                case 'confirm':
                    {
                        $this->confirm();
                    }break;

                case 'delete':
                {
                    $this->delete();
                }break;
            }
        } else
        {
            $this->view();
        }
    }


    // magic methods!
    public function __set($property, $value){
        return $this->_data[$property] = $value;
    }
      
    public function __get($property){
        return array_key_exists($property, $this->_data)
             ? $this->_data[$property]
              : null;
    }



    function includeWithVariables($filePath, $variables = array(), $print = true)
    {
        $output = NULL;
        if(file_exists($filePath)){
            // Extract the variables to a local namespace
            extract($variables);

            // Start output buffering
            ob_start();

            // Include the template file
            include $filePath;

            // End buffering and return its contents
            $output = ob_get_clean();
        }
        if ($print) {
            print $output;
        }
        return $output;

    }


    public function insert() {}

    public function edit() {}
    public function update() {}


    public function delete(){}

}

?>