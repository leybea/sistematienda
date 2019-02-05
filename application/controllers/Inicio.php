<?php

class Inicio extends CI_Controller{
    //always did it when we have constructors
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata("acceso")){
            redirect("login");
        }
    }
    function index(){
        $config=array("titulo"=>"Inicio");
        $this->load->view("plantilla/cabecerahtml");    
        $this->load->view("plantilla/cabecera",$config);    
        $this->load->view("inicio");

        $this->load->view("plantilla/pie");    
    }












} 


?>