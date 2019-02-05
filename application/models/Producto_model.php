<?php

class Producto_model extends CI_Model{

    function insertar($valores){
        $valores['fecha']=date("Y-m-d");
        $valores['hora']=date("H:i:s");
        $valores['activo']=1;
        $r=$this->db->insert("producto",$valores);
        return($r);

    }
    function seleccionar(){
        $this->db->where("activo=1");



        return $this->db->get("producto");
    }
    function obtenerUno($id){
		$this->db->where("codproducto=$id and activo=1");
		
		$d=$this->db->get("producto");	
		return $d->row();
	}






}



?>