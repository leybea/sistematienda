<?php
class Login extends CI_Controller{
    function index(){
        //cargando vista login/formulario
        $this->load->view("login/formulario");

    }
    function verificar(){
        //cargando la libreria
        $this->load->library("form_validation");
        $this->form_validation->set_message("required","El campo {field} es obligatorio"); //este mensaje aparece en vez del validation error
        $this->form_validation->set_message("min_length","El {field} debe tener como mínimo {param} caracteres");
        $this->form_validation->set_message("max_length","El {field} debe tener como máximo {param} caracteres");
        
        //en este caso no se configurase establece reglas de validacion
        //en la primera comilla colocar el campo que se quiere validar y el segundo es un sobrenombre que  uno le coloca
        $this->form_validation->set_rules("nick","Usuario","required|min_length[3]|max_length[10]"); //en requiere le ponemos la cantidad minima que debe tener de caracter
        $this->form_validation->set_rules("contra","Contraseña","required|min_length[4]");
        //en este caso no se inicializa esta libreria se ejecuta y se validaria
        if($this->form_validation->run()==FALSE){//preguntando si nos da un error
            //cargar la vista login formulario
            $this->load->view("login/formulario");
        }else{
            $nick=$this->input->post("nick"); //recibiendo
            $contra=$this->input->post("contra");
            //cargar modelo usuario
            $this->load->model("Usuario_model");
            $r=$this->Usuario_model->validar($nick,$contra);
            if($r->num_rows()==1){
                $datos=$r->row();
                $datossesion=array(
                    "nombre"=>$datos->nombre,
                    "apellidos"=>$datos->paterno."".$datos->materno,
                    "nivel"=>$datos->nivel,
                    "acceso"=>1
                );
                $this->session->set_userdata($datossesion);
                redirect("inicio");

            }else{
                //cargar la vista formulario
                $this->load->view("login/formulario");
            }

        }
        
    }
    function salir(){
        //cerrar sesion
        $variables=Array("nombre","apellidos","nivel","acceso");
        $this->session->unset_userdata($variables);
        $this->session->sess_destroy();
        redirect("login");
    }




}
?>