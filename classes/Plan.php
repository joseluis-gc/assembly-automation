<?php

class Plan
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    public function __construct()
    {
        if (isset($_POST["register_plan"])) {
            $this->registerPlan();
        }
        if (isset($_POST["update_plan"])) {
            $this->updatePlan();
        }
        if (isset($_POST["delete_plan"])) {
            $this->deletePlan();
        }
    }


    private function registerPlan()
    {
        echo "<h1 style='font-size: 65px'>Works1</h1>";
        $hc_op = 1;
        $partno_op = 1;

        if (empty($_POST['plant_id']))
        {
            $this->errors[] = "Planta no reconocida";
        }
        elseif(empty($_POST['site_id'])){
            $this->errors[] = "Celda o linea no reconocidos";
        }
        elseif(empty($_POST['asset_id'])){
            $this->errors[] = "Punto de captura no reconocido";
        }
        elseif(empty($_POST['date_id'])){
            $this->errors[] = "El plan debe tener una fecha";
        }
        elseif (empty($_POST['hc_6']) && empty($_POST['hc_7']) && empty($_POST['hc_8']) && empty($_POST['hc_9'])
            && empty($_POST['hc_10']) && empty($_POST['hc_11']) && empty($_POST['hc_12']) && empty($_POST['hc_13'])
            && empty($_POST['hc_14']) && empty($_POST['hc_15']) )
        {
            $hc_op = 0;
            $this->errors[] = "Debe llenar al menos un campo de headcount";
        }
        elseif (empty($_POST['partno_6']) && empty($_POST['partno_7']) && empty($_POST['partno_8']) && empty($_POST['partno_9'])
            && empty($_POST['partno_10']) && empty($_POST['partno_11']) && empty($_POST['partno_12']) && empty($_POST['partno_13'])
            && empty($_POST['partno_14']) && empty($_POST['partno_15']) )
        {
            $partno_op = 0;
            $this->errors[] = "Debe llenar al menos un campo de numero de parte";
        }
        elseif (!empty($_POST['plant_id'])
            && !empty($_POST['site_id'])
            && !empty($_POST['asset_id'])
            && !empty($_POST['date_id'])
            && $hc_op == 1
            && $partno_op == 1
        )
        {
            // create a database connection
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            if (!$this->db_connection->connect_errno) {

                $plant_id = $this->db_connection->real_escape_string(strip_tags($_POST['plant_id'], ENT_QUOTES));
                $site_id  = $this->db_connection->real_escape_string(strip_tags($_POST['site_id'], ENT_QUOTES));
                $asset_id = $this->db_connection->real_escape_string(strip_tags($_POST['asset_id'], ENT_QUOTES));
                $date     = $this->db_connection->real_escape_string(strip_tags($_POST['date_id'], ENT_QUOTES));
                $now = date("Y-m-d H:i:s");

                if(isset($_POST['hc_6'])&& $_POST['hc_6'] != 0) { $hc_6=$_POST['hc_6']; } else { $hc_6 = 0; }
                if(isset($_POST['hc_7'])&& $_POST['hc_7'] != 0) { $hc_7=$_POST['hc_7']; } else { $hc_7 = 0; }
                if(isset($_POST['hc_8'])&& $_POST['hc_8'] != 0) { $hc_8=$_POST['hc_8']; } else { $hc_8 = 0; }
                if(isset($_POST['hc_9'])&& $_POST['hc_9'] != 0) { $hc_9=$_POST['hc_9']; } else { $hc_9 = 0; }
                if(isset($_POST['hc_10'])&& $_POST['hc_10'] != 0) { $hc_10=$_POST['hc_10']; } else { $hc_10 = 0; }
                if(isset($_POST['hc_11'])&& $_POST['hc_11'] != 0) { $hc_11=$_POST['hc_11']; } else { $hc_11 = 0; }
                if(isset($_POST['hc_12'])&& $_POST['hc_12'] != 0) { $hc_12=$_POST['hc_12']; } else { $hc_12 = 0; }
                if(isset($_POST['hc_13'])&& $_POST['hc_13'] != 0) { $hc_13=$_POST['hc_13']; } else { $hc_13 = 0; }
                if(isset($_POST['hc_14'])&& $_POST['hc_14'] != 0) { $hc_14=$_POST['hc_14']; } else { $hc_14 = 0; }
                if(isset($_POST['hc_15'])&& $_POST['hc_15'] != 0) { $hc_15=$_POST['hc_15']; } else { $hc_15 = 0; }



                if(isset($_POST['partno_6'])&& $_POST['partno_6'] != 0) { $partno_6=$_POST['partno_6']; } else { $partno_6 = 0; }
                if(isset($_POST['partno_7'])&& $_POST['partno_7'] != 0) { $partno_7=$_POST['partno_7']; } else { $partno_7 = 0; }
                if(isset($_POST['partno_8'])&& $_POST['partno_8'] != 0) { $partno_8=$_POST['partno_8']; } else { $partno_8 = 0; }
                if(isset($_POST['partno_9'])&& $_POST['partno_9'] != 0) { $partno_9=$_POST['partno_9']; } else { $partno_9 = 0; }
                if(isset($_POST['partno_10'])&& $_POST['partno_10'] != 0) { $partno_10=$_POST['partno_10']; } else { $partno_10 = 0; }
                if(isset($_POST['partno_11'])&& $_POST['partno_11'] != 0) { $partno_11=$_POST['partno_11']; } else { $partno_11 = 0; }
                if(isset($_POST['partno_12'])&& $_POST['partno_12'] != 0) { $partno_12=$_POST['partno_12']; } else { $partno_12 = 0; }
                if(isset($_POST['partno_13'])&& $_POST['partno_13'] != 0) { $partno_13=$_POST['partno_13']; } else { $partno_13 = 0; }
                if(isset($_POST['partno_14'])&& $_POST['partno_14'] != 0) { $partno_14=$_POST['partno_14']; } else { $partno_14 = 0; }
                if(isset($_POST['partno_15'])&& $_POST['partno_15'] != 0) { $partno_15=$_POST['partno_15']; } else { $partno_15 = 0; }



                if(isset($_POST['wo_number_6'])&& $_POST['wo_number_6'] != 0) { $wo_number_6=$_POST['wo_number_6']; } else { $wo_number_6 = 0; }
                if(isset($_POST['wo_number_7'])&& $_POST['wo_number_7'] != 0) { $wo_number_7=$_POST['wo_number_7']; } else { $wo_number_7 = 0; }
                if(isset($_POST['wo_number_8'])&& $_POST['wo_number_8'] != 0) { $wo_number_8=$_POST['wo_number_8']; } else { $wo_number_8 = 0; }
                if(isset($_POST['wo_number_9'])&& $_POST['wo_number_9'] != 0) { $wo_number_9=$_POST['wo_number_9']; } else { $wo_number_9 = 0; }
                if(isset($_POST['wo_number_10'])&& $_POST['wo_number_10'] != 0) { $wo_number_10=$_POST['wo_number_10']; } else { $wo_number_10 = 0; }
                if(isset($_POST['wo_number_11'])&& $_POST['wo_number_11'] != 0) { $wo_number_11=$_POST['wo_number_11']; } else { $wo_number_11 = 0; }
                if(isset($_POST['wo_number_12'])&& $_POST['wo_number_12'] != 0) { $wo_number_12=$_POST['wo_number_12']; } else { $wo_number_12 = 0; }
                if(isset($_POST['wo_number_13'])&& $_POST['wo_number_13'] != 0) { $wo_number_13=$_POST['wo_number_13']; } else { $wo_number_13 = 0; }
                if(isset($_POST['wo_number_14'])&& $_POST['wo_number_14'] != 0) { $wo_number_14=$_POST['wo_number_14']; } else { $wo_number_14 = 0; }
                if(isset($_POST['wo_number_15'])&& $_POST['wo_number_15'] != 0) { $wo_number_15=$_POST['wo_number_15']; } else { $wo_number_15 = 0; }


                if(isset($_POST['plan_by_hr_6'])&& $_POST['plan_by_hr_6'] != 0) { $plan_by_hr_6 = $_POST['plan_by_hr_6']; } else { $plan_by_hr_6 = 0; }
                if(isset($_POST['plan_by_hr_7'])&& $_POST['plan_by_hr_7'] != 0) { $plan_by_hr_7=$_POST['plan_by_hr_7']; } else { $plan_by_hr_7 = 0; }
                if(isset($_POST['plan_by_hr_8'])&& $_POST['plan_by_hr_8'] != 0) { $plan_by_hr_8=$_POST['plan_by_hr_8']; } else { $plan_by_hr_8 = 0; }
                if(isset($_POST['plan_by_hr_9'])&& $_POST['plan_by_hr_9'] != 0) { $plan_by_hr_9=$_POST['plan_by_hr_9']; } else { $plan_by_hr_9 = 0; }
                if(isset($_POST['plan_by_hr_10'])&& $_POST['plan_by_hr_10'] != 0) { $plan_by_hr_10=$_POST['plan_by_hr_10']; } else { $plan_by_hr_10 = 0; }
                if(isset($_POST['plan_by_hr_11'])&& $_POST['plan_by_hr_11'] != 0) { $plan_by_hr_11=$_POST['plan_by_hr_11']; } else { $plan_by_hr_11 = 0; }
                if(isset($_POST['plan_by_hr_12'])&& $_POST['plan_by_hr_12'] != 0) { $plan_by_hr_12=$_POST['plan_by_hr_12']; } else { $plan_by_hr_12 = 0; }
                if(isset($_POST['plan_by_hr_13'])&& $_POST['plan_by_hr_13'] != 0) { $plan_by_hr_13=$_POST['plan_by_hr_13']; } else { $plan_by_hr_13 = 0; }
                if(isset($_POST['plan_by_hr_14'])&& $_POST['plan_by_hr_14'] != 0) { $plan_by_hr_14=$_POST['plan_by_hr_14']; } else { $plan_by_hr_14 = 0; }
                if(isset($_POST['plan_by_hr_15'])&& $_POST['plan_by_hr_15'] != 0) { $plan_by_hr_15=$_POST['plan_by_hr_15']; } else { $plan_by_hr_15 = 0; }



                $sql = "SELECT * FROM plan_hrxhr WHERE date = '$date';";
                $query_check_date = $this->db_connection->query($sql);

                if ($query_check_date->num_rows == 1) {
                    $this->errors[] = "Ya existe un plan con esta fecha debe editarlo.";
                } else {

                    $sql = "INSERT INTO plan_hrxhr (plant_id, site_id, plan_asset, date, 
                        `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, 
                        `6h`, `7h`, `8h`, `9h`, `10h`, `11h`, `12h`, `13h`, `14h`, `15h`, 
                        wo_6, wo_7, wo_8, wo_9, wo_10, wo_11, wo_12, wo_13, wo_14, wo_15,  
                        pn_6, pn_7, pn_8, pn_9, pn_10, pn_11, pn_12, pn_13, pn_14, pn_15, 
                        date_create, turno, status, shift, supervisor) 
                    VALUES('" . $plant_id . "', '" . $site_id . "', '" . $asset_id . "', '".$date."', 
                    '".$plan_by_hr_6."', '".$plan_by_hr_7."', '".$plan_by_hr_8."', '".$plan_by_hr_9."', '".$plan_by_hr_10."',
                     '".$plan_by_hr_11."', '".$plan_by_hr_12."', '".$plan_by_hr_13."', '".$plan_by_hr_14."', '".$plan_by_hr_15."', 
                    '".$hc_6."','".$hc_7."','".$hc_8."','".$hc_9."','".$hc_10."','".$hc_11."','".$hc_12."','".$hc_13."','".$hc_14."','".$hc_15."', 
                    '".$wo_number_6."','".$wo_number_7."','".$wo_number_8."','".$wo_number_9."','".$wo_number_10."','".$wo_number_11."','".$wo_number_12."','".$wo_number_13."','".$wo_number_14."','".$wo_number_15."',
                    '".$partno_6."','".$partno_7."','".$partno_8."','".$partno_9."','".$partno_10."','".$partno_11."','".$partno_12."','".$partno_13."','".$partno_14."','".$partno_15."',
                    '".$now."', '1','0', '1','1');";
                    $query_new_plan_insert = $this->db_connection->query($sql);

                    // if user has been added successfully
                    if ($query_new_plan_insert) {
                        $this->messages[] = "Se ha creado un plan para este punto de captura.";
                    } else {
                        $this->errors[] = "Lo sentimos , el registro fallo $sql.";
                    }
                }
            } else {
                $this->errors[] = "Lo sentimos, no hay conexion con la base de datos.";
            }
        } else {
            $this->errors[] = "Ocurrio un error de validacion.";
        }
    }




    private function updatePlan()
    {
        echo "<h1 style='font-size: 65px'>Works1</h1>";
        $hc_op = 1;
        $partno_op = 1;

        if (empty($_POST['plant_id']))
        {
            $this->errors[] = "Planta no reconocida";
        }
        elseif(empty($_POST['site_id'])){
            $this->errors[] = "Celda o linea no reconocidos";
        }
        elseif(empty($_POST['asset_id'])){
            $this->errors[] = "Punto de captura no reconocido";
        }
        elseif(empty($_POST['date_id'])){
            $this->errors[] = "El plan debe tener una fecha";
        }
        elseif (empty($_POST['hc_6']) && empty($_POST['hc_7']) && empty($_POST['hc_8']) && empty($_POST['hc_9'])
            && empty($_POST['hc_10']) && empty($_POST['hc_11']) && empty($_POST['hc_12']) && empty($_POST['hc_13'])
            && empty($_POST['hc_14']) && empty($_POST['hc_15']) )
        {
            $hc_op = 0;
            $this->errors[] = "Debe llenar al menos un campo de headcount";
        }
        elseif (empty($_POST['partno_6']) && empty($_POST['partno_7']) && empty($_POST['partno_8']) && empty($_POST['partno_9'])
            && empty($_POST['partno_10']) && empty($_POST['partno_11']) && empty($_POST['partno_12']) && empty($_POST['partno_13'])
            && empty($_POST['partno_14']) && empty($_POST['partno_15']) )
        {
            $partno_op = 0;
            $this->errors[] = "Debe llenar al menos un campo de numero de parte";
        }
        elseif (!empty($_POST['plant_id'])
            && !empty($_POST['site_id'])
            && !empty($_POST['asset_id'])
            && !empty($_POST['date_id'])
            && $hc_op == 1
            && $partno_op == 1
        )
        {
            // create a database connection
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            if (!$this->db_connection->connect_errno) {

                $plant_id = $this->db_connection->real_escape_string(strip_tags($_POST['plant_id'], ENT_QUOTES));
                $site_id  = $this->db_connection->real_escape_string(strip_tags($_POST['site_id'], ENT_QUOTES));
                $asset_id = $this->db_connection->real_escape_string(strip_tags($_POST['asset_id'], ENT_QUOTES));
                $date     = $this->db_connection->real_escape_string(strip_tags($_POST['date_id'], ENT_QUOTES));
                $now = date("Y-m-d H:i:s");

                if(isset($_POST['hc_6'])&& $_POST['hc_6'] != 0) { $hc_6=$_POST['hc_6']; } else { $hc_6 = 0; }
                if(isset($_POST['hc_7'])&& $_POST['hc_7'] != 0) { $hc_7=$_POST['hc_7']; } else { $hc_7 = 0; }
                if(isset($_POST['hc_8'])&& $_POST['hc_8'] != 0) { $hc_8=$_POST['hc_8']; } else { $hc_8 = 0; }
                if(isset($_POST['hc_9'])&& $_POST['hc_9'] != 0) { $hc_9=$_POST['hc_9']; } else { $hc_9 = 0; }
                if(isset($_POST['hc_10'])&& $_POST['hc_10'] != 0) { $hc_10=$_POST['hc_10']; } else { $hc_10 = 0; }
                if(isset($_POST['hc_11'])&& $_POST['hc_11'] != 0) { $hc_11=$_POST['hc_11']; } else { $hc_11 = 0; }
                if(isset($_POST['hc_12'])&& $_POST['hc_12'] != 0) { $hc_12=$_POST['hc_12']; } else { $hc_12 = 0; }
                if(isset($_POST['hc_13'])&& $_POST['hc_13'] != 0) { $hc_13=$_POST['hc_13']; } else { $hc_13 = 0; }
                if(isset($_POST['hc_14'])&& $_POST['hc_14'] != 0) { $hc_14=$_POST['hc_14']; } else { $hc_14 = 0; }
                if(isset($_POST['hc_15'])&& $_POST['hc_15'] != 0) { $hc_15=$_POST['hc_15']; } else { $hc_15 = 0; }



                if(isset($_POST['partno_6'])&& $_POST['partno_6'] != 0) { $partno_6=$_POST['partno_6']; } else { $partno_6 = 0; }
                if(isset($_POST['partno_7'])&& $_POST['partno_7'] != 0) { $partno_7=$_POST['partno_7']; } else { $partno_7 = 0; }
                if(isset($_POST['partno_8'])&& $_POST['partno_8'] != 0) { $partno_8=$_POST['partno_8']; } else { $partno_8 = 0; }
                if(isset($_POST['partno_9'])&& $_POST['partno_9'] != 0) { $partno_9=$_POST['partno_9']; } else { $partno_9 = 0; }
                if(isset($_POST['partno_10'])&& $_POST['partno_10'] != 0) { $partno_10=$_POST['partno_10']; } else { $partno_10 = 0; }
                if(isset($_POST['partno_11'])&& $_POST['partno_11'] != 0) { $partno_11=$_POST['partno_11']; } else { $partno_11 = 0; }
                if(isset($_POST['partno_12'])&& $_POST['partno_12'] != 0) { $partno_12=$_POST['partno_12']; } else { $partno_12 = 0; }
                if(isset($_POST['partno_13'])&& $_POST['partno_13'] != 0) { $partno_13=$_POST['partno_13']; } else { $partno_13 = 0; }
                if(isset($_POST['partno_14'])&& $_POST['partno_14'] != 0) { $partno_14=$_POST['partno_14']; } else { $partno_14 = 0; }
                if(isset($_POST['partno_15'])&& $_POST['partno_15'] != 0) { $partno_15=$_POST['partno_15']; } else { $partno_15 = 0; }



                if(isset($_POST['wo_number_6'])&& $_POST['wo_number_6'] != 0) { $wo_number_6=$_POST['wo_number_6']; } else { $wo_number_6 = 0; }
                if(isset($_POST['wo_number_7'])&& $_POST['wo_number_7'] != 0) { $wo_number_7=$_POST['wo_number_7']; } else { $wo_number_7 = 0; }
                if(isset($_POST['wo_number_8'])&& $_POST['wo_number_8'] != 0) { $wo_number_8=$_POST['wo_number_8']; } else { $wo_number_8 = 0; }
                if(isset($_POST['wo_number_9'])&& $_POST['wo_number_9'] != 0) { $wo_number_9=$_POST['wo_number_9']; } else { $wo_number_9 = 0; }
                if(isset($_POST['wo_number_10'])&& $_POST['wo_number_10'] != 0) { $wo_number_10=$_POST['wo_number_10']; } else { $wo_number_10 = 0; }
                if(isset($_POST['wo_number_11'])&& $_POST['wo_number_11'] != 0) { $wo_number_11=$_POST['wo_number_11']; } else { $wo_number_11 = 0; }
                if(isset($_POST['wo_number_12'])&& $_POST['wo_number_12'] != 0) { $wo_number_12=$_POST['wo_number_12']; } else { $wo_number_12 = 0; }
                if(isset($_POST['wo_number_13'])&& $_POST['wo_number_13'] != 0) { $wo_number_13=$_POST['wo_number_13']; } else { $wo_number_13 = 0; }
                if(isset($_POST['wo_number_14'])&& $_POST['wo_number_14'] != 0) { $wo_number_14=$_POST['wo_number_14']; } else { $wo_number_14 = 0; }
                if(isset($_POST['wo_number_15'])&& $_POST['wo_number_15'] != 0) { $wo_number_15=$_POST['wo_number_15']; } else { $wo_number_15 = 0; }


                if(isset($_POST['plan_by_hr_6'])&& $_POST['plan_by_hr_6'] != 0) { $plan_by_hr_6 = $_POST['plan_by_hr_6']; } else { $plan_by_hr_6 = 0; }
                if(isset($_POST['plan_by_hr_7'])&& $_POST['plan_by_hr_7'] != 0) { $plan_by_hr_7=$_POST['plan_by_hr_7']; } else { $plan_by_hr_7 = 0; }
                if(isset($_POST['plan_by_hr_8'])&& $_POST['plan_by_hr_8'] != 0) { $plan_by_hr_8=$_POST['plan_by_hr_8']; } else { $plan_by_hr_8 = 0; }
                if(isset($_POST['plan_by_hr_9'])&& $_POST['plan_by_hr_9'] != 0) { $plan_by_hr_9=$_POST['plan_by_hr_9']; } else { $plan_by_hr_9 = 0; }
                if(isset($_POST['plan_by_hr_10'])&& $_POST['plan_by_hr_10'] != 0) { $plan_by_hr_10=$_POST['plan_by_hr_10']; } else { $plan_by_hr_10 = 0; }
                if(isset($_POST['plan_by_hr_11'])&& $_POST['plan_by_hr_11'] != 0) { $plan_by_hr_11=$_POST['plan_by_hr_11']; } else { $plan_by_hr_11 = 0; }
                if(isset($_POST['plan_by_hr_12'])&& $_POST['plan_by_hr_12'] != 0) { $plan_by_hr_12=$_POST['plan_by_hr_12']; } else { $plan_by_hr_12 = 0; }
                if(isset($_POST['plan_by_hr_13'])&& $_POST['plan_by_hr_13'] != 0) { $plan_by_hr_13=$_POST['plan_by_hr_13']; } else { $plan_by_hr_13 = 0; }
                if(isset($_POST['plan_by_hr_14'])&& $_POST['plan_by_hr_14'] != 0) { $plan_by_hr_14=$_POST['plan_by_hr_14']; } else { $plan_by_hr_14 = 0; }
                if(isset($_POST['plan_by_hr_15'])&& $_POST['plan_by_hr_15'] != 0) { $plan_by_hr_15=$_POST['plan_by_hr_15']; } else { $plan_by_hr_15 = 0; }



                $sql = "SELECT * FROM plan_hrxhr WHERE date = '$date';";
                $query_check_date = $this->db_connection->query($sql);

                if ($query_check_date->num_rows == 1) {
                    $this->errors[] = "Ya existe un plan con esta fecha debe editarlo.";
                } else {

                    $sql = "INSERT INTO plan_hrxhr (plant_id, site_id, plan_asset, date, 
                        `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, 
                        `6h`, `7h`, `8h`, `9h`, `10h`, `11h`, `12h`, `13h`, `14h`, `15h`, 
                        wo_6, wo_7, wo_8, wo_9, wo_10, wo_11, wo_12, wo_13, wo_14, wo_15,  
                        pn_6, pn_7, pn_8, pn_9, pn_10, pn_11, pn_12, pn_13, pn_14, pn_15, 
                        date_create, turno, status, shift, supervisor) 
                    VALUES('" . $plant_id . "', '" . $site_id . "', '" . $asset_id . "', '".$date."', 
                    '".$plan_by_hr_6."', '".$plan_by_hr_7."', '".$plan_by_hr_8."', '".$plan_by_hr_9."', '".$plan_by_hr_10."',
                     '".$plan_by_hr_11."', '".$plan_by_hr_12."', '".$plan_by_hr_13."', '".$plan_by_hr_14."', '".$plan_by_hr_15."', 
                    '".$hc_6."','".$hc_7."','".$hc_8."','".$hc_9."','".$hc_10."','".$hc_11."','".$hc_12."','".$hc_13."','".$hc_14."','".$hc_15."', 
                    '".$wo_number_6."','".$wo_number_7."','".$wo_number_8."','".$wo_number_9."','".$wo_number_10."','".$wo_number_11."','".$wo_number_12."','".$wo_number_13."','".$wo_number_14."','".$wo_number_15."',
                    '".$partno_6."','".$partno_7."','".$partno_8."','".$partno_9."','".$partno_10."','".$partno_11."','".$partno_12."','".$partno_13."','".$partno_14."','".$partno_15."',
                    '".$now."', '1','0', '1','1');";
                    $query_new_plan_insert = $this->db_connection->query($sql);

                    // if user has been added successfully
                    if ($query_new_plan_insert) {
                        $this->messages[] = "Se ha creado un plan para este punto de captura.";
                    } else {
                        $this->errors[] = "Lo sentimos , el registro fallo $sql.";
                    }
                }
            } else {
                $this->errors[] = "Lo sentimos, no hay conexion con la base de datos.";
            }
        } else {
            $this->errors[] = "Ocurrio un error de validacion.";
        }
    }



    private function deletePlan()
    {
        echo "<h1 style='font-size: 65px'>Works1</h1>";
        $hc_op = 1;
        $partno_op = 1;

        if (empty($_POST['plant_id']))
        {
            $this->errors[] = "Planta no reconocida";
        }
        elseif(empty($_POST['site_id'])){
            $this->errors[] = "Celda o linea no reconocidos";
        }
        elseif(empty($_POST['asset_id'])){
            $this->errors[] = "Punto de captura no reconocido";
        }
        elseif(empty($_POST['date_id'])){
            $this->errors[] = "El plan debe tener una fecha";
        }
        elseif (empty($_POST['hc_6']) && empty($_POST['hc_7']) && empty($_POST['hc_8']) && empty($_POST['hc_9'])
            && empty($_POST['hc_10']) && empty($_POST['hc_11']) && empty($_POST['hc_12']) && empty($_POST['hc_13'])
            && empty($_POST['hc_14']) && empty($_POST['hc_15']) )
        {
            $hc_op = 0;
            $this->errors[] = "Debe llenar al menos un campo de headcount";
        }
        elseif (empty($_POST['partno_6']) && empty($_POST['partno_7']) && empty($_POST['partno_8']) && empty($_POST['partno_9'])
            && empty($_POST['partno_10']) && empty($_POST['partno_11']) && empty($_POST['partno_12']) && empty($_POST['partno_13'])
            && empty($_POST['partno_14']) && empty($_POST['partno_15']) )
        {
            $partno_op = 0;
            $this->errors[] = "Debe llenar al menos un campo de numero de parte";
        }
        elseif (!empty($_POST['plant_id'])
            && !empty($_POST['site_id'])
            && !empty($_POST['asset_id'])
            && !empty($_POST['date_id'])
            && $hc_op == 1
            && $partno_op == 1
        )
        {
            // create a database connection
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            if (!$this->db_connection->connect_errno) {

                $plant_id = $this->db_connection->real_escape_string(strip_tags($_POST['plant_id'], ENT_QUOTES));
                $site_id  = $this->db_connection->real_escape_string(strip_tags($_POST['site_id'], ENT_QUOTES));
                $asset_id = $this->db_connection->real_escape_string(strip_tags($_POST['asset_id'], ENT_QUOTES));
                $date     = $this->db_connection->real_escape_string(strip_tags($_POST['date_id'], ENT_QUOTES));
                $now = date("Y-m-d H:i:s");

                if(isset($_POST['hc_6'])&& $_POST['hc_6'] != 0) { $hc_6=$_POST['hc_6']; } else { $hc_6 = 0; }
                if(isset($_POST['hc_7'])&& $_POST['hc_7'] != 0) { $hc_7=$_POST['hc_7']; } else { $hc_7 = 0; }
                if(isset($_POST['hc_8'])&& $_POST['hc_8'] != 0) { $hc_8=$_POST['hc_8']; } else { $hc_8 = 0; }
                if(isset($_POST['hc_9'])&& $_POST['hc_9'] != 0) { $hc_9=$_POST['hc_9']; } else { $hc_9 = 0; }
                if(isset($_POST['hc_10'])&& $_POST['hc_10'] != 0) { $hc_10=$_POST['hc_10']; } else { $hc_10 = 0; }
                if(isset($_POST['hc_11'])&& $_POST['hc_11'] != 0) { $hc_11=$_POST['hc_11']; } else { $hc_11 = 0; }
                if(isset($_POST['hc_12'])&& $_POST['hc_12'] != 0) { $hc_12=$_POST['hc_12']; } else { $hc_12 = 0; }
                if(isset($_POST['hc_13'])&& $_POST['hc_13'] != 0) { $hc_13=$_POST['hc_13']; } else { $hc_13 = 0; }
                if(isset($_POST['hc_14'])&& $_POST['hc_14'] != 0) { $hc_14=$_POST['hc_14']; } else { $hc_14 = 0; }
                if(isset($_POST['hc_15'])&& $_POST['hc_15'] != 0) { $hc_15=$_POST['hc_15']; } else { $hc_15 = 0; }



                if(isset($_POST['partno_6'])&& $_POST['partno_6'] != 0) { $partno_6=$_POST['partno_6']; } else { $partno_6 = 0; }
                if(isset($_POST['partno_7'])&& $_POST['partno_7'] != 0) { $partno_7=$_POST['partno_7']; } else { $partno_7 = 0; }
                if(isset($_POST['partno_8'])&& $_POST['partno_8'] != 0) { $partno_8=$_POST['partno_8']; } else { $partno_8 = 0; }
                if(isset($_POST['partno_9'])&& $_POST['partno_9'] != 0) { $partno_9=$_POST['partno_9']; } else { $partno_9 = 0; }
                if(isset($_POST['partno_10'])&& $_POST['partno_10'] != 0) { $partno_10=$_POST['partno_10']; } else { $partno_10 = 0; }
                if(isset($_POST['partno_11'])&& $_POST['partno_11'] != 0) { $partno_11=$_POST['partno_11']; } else { $partno_11 = 0; }
                if(isset($_POST['partno_12'])&& $_POST['partno_12'] != 0) { $partno_12=$_POST['partno_12']; } else { $partno_12 = 0; }
                if(isset($_POST['partno_13'])&& $_POST['partno_13'] != 0) { $partno_13=$_POST['partno_13']; } else { $partno_13 = 0; }
                if(isset($_POST['partno_14'])&& $_POST['partno_14'] != 0) { $partno_14=$_POST['partno_14']; } else { $partno_14 = 0; }
                if(isset($_POST['partno_15'])&& $_POST['partno_15'] != 0) { $partno_15=$_POST['partno_15']; } else { $partno_15 = 0; }



                if(isset($_POST['wo_number_6'])&& $_POST['wo_number_6'] != 0) { $wo_number_6=$_POST['wo_number_6']; } else { $wo_number_6 = 0; }
                if(isset($_POST['wo_number_7'])&& $_POST['wo_number_7'] != 0) { $wo_number_7=$_POST['wo_number_7']; } else { $wo_number_7 = 0; }
                if(isset($_POST['wo_number_8'])&& $_POST['wo_number_8'] != 0) { $wo_number_8=$_POST['wo_number_8']; } else { $wo_number_8 = 0; }
                if(isset($_POST['wo_number_9'])&& $_POST['wo_number_9'] != 0) { $wo_number_9=$_POST['wo_number_9']; } else { $wo_number_9 = 0; }
                if(isset($_POST['wo_number_10'])&& $_POST['wo_number_10'] != 0) { $wo_number_10=$_POST['wo_number_10']; } else { $wo_number_10 = 0; }
                if(isset($_POST['wo_number_11'])&& $_POST['wo_number_11'] != 0) { $wo_number_11=$_POST['wo_number_11']; } else { $wo_number_11 = 0; }
                if(isset($_POST['wo_number_12'])&& $_POST['wo_number_12'] != 0) { $wo_number_12=$_POST['wo_number_12']; } else { $wo_number_12 = 0; }
                if(isset($_POST['wo_number_13'])&& $_POST['wo_number_13'] != 0) { $wo_number_13=$_POST['wo_number_13']; } else { $wo_number_13 = 0; }
                if(isset($_POST['wo_number_14'])&& $_POST['wo_number_14'] != 0) { $wo_number_14=$_POST['wo_number_14']; } else { $wo_number_14 = 0; }
                if(isset($_POST['wo_number_15'])&& $_POST['wo_number_15'] != 0) { $wo_number_15=$_POST['wo_number_15']; } else { $wo_number_15 = 0; }


                if(isset($_POST['plan_by_hr_6'])&& $_POST['plan_by_hr_6'] != 0) { $plan_by_hr_6 = $_POST['plan_by_hr_6']; } else { $plan_by_hr_6 = 0; }
                if(isset($_POST['plan_by_hr_7'])&& $_POST['plan_by_hr_7'] != 0) { $plan_by_hr_7=$_POST['plan_by_hr_7']; } else { $plan_by_hr_7 = 0; }
                if(isset($_POST['plan_by_hr_8'])&& $_POST['plan_by_hr_8'] != 0) { $plan_by_hr_8=$_POST['plan_by_hr_8']; } else { $plan_by_hr_8 = 0; }
                if(isset($_POST['plan_by_hr_9'])&& $_POST['plan_by_hr_9'] != 0) { $plan_by_hr_9=$_POST['plan_by_hr_9']; } else { $plan_by_hr_9 = 0; }
                if(isset($_POST['plan_by_hr_10'])&& $_POST['plan_by_hr_10'] != 0) { $plan_by_hr_10=$_POST['plan_by_hr_10']; } else { $plan_by_hr_10 = 0; }
                if(isset($_POST['plan_by_hr_11'])&& $_POST['plan_by_hr_11'] != 0) { $plan_by_hr_11=$_POST['plan_by_hr_11']; } else { $plan_by_hr_11 = 0; }
                if(isset($_POST['plan_by_hr_12'])&& $_POST['plan_by_hr_12'] != 0) { $plan_by_hr_12=$_POST['plan_by_hr_12']; } else { $plan_by_hr_12 = 0; }
                if(isset($_POST['plan_by_hr_13'])&& $_POST['plan_by_hr_13'] != 0) { $plan_by_hr_13=$_POST['plan_by_hr_13']; } else { $plan_by_hr_13 = 0; }
                if(isset($_POST['plan_by_hr_14'])&& $_POST['plan_by_hr_14'] != 0) { $plan_by_hr_14=$_POST['plan_by_hr_14']; } else { $plan_by_hr_14 = 0; }
                if(isset($_POST['plan_by_hr_15'])&& $_POST['plan_by_hr_15'] != 0) { $plan_by_hr_15=$_POST['plan_by_hr_15']; } else { $plan_by_hr_15 = 0; }



                $sql = "SELECT * FROM plan_hrxhr WHERE date = '$date';";
                $query_check_date = $this->db_connection->query($sql);

                if ($query_check_date->num_rows == 1) {
                    $this->errors[] = "Ya existe un plan con esta fecha debe editarlo.";
                } else {

                    $sql = "INSERT INTO plan_hrxhr (plant_id, site_id, plan_asset, date, 
                        `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, 
                        `6h`, `7h`, `8h`, `9h`, `10h`, `11h`, `12h`, `13h`, `14h`, `15h`, 
                        wo_6, wo_7, wo_8, wo_9, wo_10, wo_11, wo_12, wo_13, wo_14, wo_15,  
                        pn_6, pn_7, pn_8, pn_9, pn_10, pn_11, pn_12, pn_13, pn_14, pn_15, 
                        date_create, turno, status, shift, supervisor) 
                    VALUES('" . $plant_id . "', '" . $site_id . "', '" . $asset_id . "', '".$date."', 
                    '".$plan_by_hr_6."', '".$plan_by_hr_7."', '".$plan_by_hr_8."', '".$plan_by_hr_9."', '".$plan_by_hr_10."',
                     '".$plan_by_hr_11."', '".$plan_by_hr_12."', '".$plan_by_hr_13."', '".$plan_by_hr_14."', '".$plan_by_hr_15."', 
                    '".$hc_6."','".$hc_7."','".$hc_8."','".$hc_9."','".$hc_10."','".$hc_11."','".$hc_12."','".$hc_13."','".$hc_14."','".$hc_15."', 
                    '".$wo_number_6."','".$wo_number_7."','".$wo_number_8."','".$wo_number_9."','".$wo_number_10."','".$wo_number_11."','".$wo_number_12."','".$wo_number_13."','".$wo_number_14."','".$wo_number_15."',
                    '".$partno_6."','".$partno_7."','".$partno_8."','".$partno_9."','".$partno_10."','".$partno_11."','".$partno_12."','".$partno_13."','".$partno_14."','".$partno_15."',
                    '".$now."', '1','0', '1','1');";
                    $query_new_plan_insert = $this->db_connection->query($sql);

                    // if user has been added successfully
                    if ($query_new_plan_insert) {
                        $this->messages[] = "Se ha creado un plan para este punto de captura.";
                    } else {
                        $this->errors[] = "Lo sentimos , el registro fallo $sql.";
                    }
                }
            } else {
                $this->errors[] = "Lo sentimos, no hay conexion con la base de datos.";
            }
        } else {
            $this->errors[] = "Ocurrio un error de validacion.";
        }
    }



}
