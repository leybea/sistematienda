<?php

class Producto extends CI_Controller{

    function nuevo(){
        $config=array("titulo"=>"Nuevo Producto");
        $this->load->view("plantilla/cabecerahtml");    
        $this->load->view("plantilla/cabecera",$config);    
        $this->load->view("producto/nuevo");

        $this->load->view("plantilla/pie");    
    }
    function guardar(){
        $nombre=$this->input->post("nombre");
        $precio=$this->input->post("precio");
        $detalle=$this->input->post("detalle");
        //cargar la libreria para subir fotos
        $this->load->library("upload"); //primero cargamos lalibreria
        //configuramos la libreria como segundo paso
        $config["upload_path"]="./imagenes/productos/";
        $config["allowed_types"]="jpg|png|gif";
        
        //inicializamos la libreria como tercer paso
        $this->upload->initialize($config);
        //verdad o falso sobre la carga de archivos
        if(!$this->upload->do_upload("foto")){ //do_upload sube el archivo
            print_r($this->upload->display_errors());
        }else{
            $datosarchivo=$this->upload->data();
            /*echo ("<pre>");
            print_r($datosarchivo);
            echo("</pre>");*/
            $nombrefoto=$datosarchivo['file_name'];
        }
        $datosguardar=array("nombre"=>$nombre, //referencia a los nombres de la tabla
                            "precio"=>$precio,
                            "detalle"=>$detalle,
                            "foto"=>$nombrefoto
                            );
        
        $this->load->model("Producto_model");
        $res=$this->Producto_model->insertar($datosguardar);
        if($res){
            $config=array("titulo"=>"Nuevo Producto");
            $this->load->view("plantilla/cabecerahtml");    
            $this->load->view("plantilla/cabecera",$config);    
            $this->load->view("producto/correcto");
            $this->load->view("plantilla/pie"); 
        }else{
            $config=array("titulo"=>"Nuevo Producto");
            $this->load->view("plantilla/cabecerahtml");    
            $this->load->view("plantilla/cabecera",$config);  
            $this->load->view("producto/error");
            $this->load->view("plantilla/pie"); 
        }



    }
    function listar(){
        $this->load->model("Producto_model");
        $valores=$this->Producto_model->seleccionar();
        $datosvista=array("Productos"=>$valores);

        $config=array("titulo"=>"Nuevo Producto");
        $this->load->view("plantilla/cabecerahtml");    
        $this->load->view("plantilla/cabecera",$config);  
        $this->load->view("producto/listado",$datosvista);
        $this->load->view("plantilla/pie"); 


    }











} 


?>