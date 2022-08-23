###################
Reto Tecnico
Backend Developer 
###################

Hi everyone,
this project is made in Codeigniter 3:

https://digitaltec.com.mx/api/zip-codes/01210

//Need these libraries for create Api rest
require_once("application/libraries/REST_Controller.php");

//That libraries is for the format of the Api (JSON, XML, HTML, ETC)
require_once("application/libraries/Format.php");

Configure of the database:

In this part a create de configuration of the database
/application/config/database.php 


Configure of the routes:

/application/config/routes.php

In this part i configure de routes for call my controller such as the challenge

$route['zip-codes/(:num)'] = 'zipCodes/$1';

the file that I use for the the challenge is:

/application/controllers/ZipCodes.php

This is my controller with the api rest:

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
