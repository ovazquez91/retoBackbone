<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Need these libraries for create Api rest
require_once("application/libraries/REST_Controller.php");
//That libraries is for the format of the Api (JSON, XML, HTML, ETC)
require_once("application/libraries/Format.php");

//I also had to add a file "rest.php" in the parte of the folder "config"


//I was to create a Controller zipCodes and extend of REST_Controller, this is the main class for codeigniter 3
class ZipCodes extends REST_Controller {

  
    //I made a function for show an index, this function receive one parameter (zip code)
    public function index_get($zipCode = 0){

        // if the variable is empty it generates a 404 error
        if(!empty($zipCode)){
            //i genereated a query of my database
            $this->db->select('*');
            $this->db->from('estados');
            $this->db->where('d_codigo', $zipCode);
            $query = $this->db->get();
            //the variable $data show all content of the database where "d_codigo" is equal to variable $zipCode
            $data = $query->result();
            if(!$data){
                //if the variable $data dont have content it generates a 404 error
                $this->response([
                    'status' => FALSE,
                    'message' => 'no data found'
                 ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) 
            }else{
                //if the variable $data have content show HTTP_OK
            $this->response($data, REST_Controller::HTTP_OK);
            }
            }
            else
            {
                //Response - Error 404
                $this->response([
                    //send a status false
                   'status' => FALSE,
                   'message' => 'no data found'
                ], REST_Controller::HTTP_NOT_FOUND); 
            }

    }

    public function hola(){
        $this->load->view('hola.php');
    }

}