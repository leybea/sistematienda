<?php
class Ventadetalle_model extends CI_Model{
	function insertar($datos){
		$datos['fecha']=date("Y-m-d");
		$datos['hora']=date("H:i:s");
		$datos['activo']=1;
		$this->db->insert("ventadetalle",$datos);
	}	
	function seleccionar($codventa){
		$this->db->where("ventadetalle.activo=1 and ventadetalle.codventa=$codventa");
		$this->db->from('producto');
		
		$this->db->join("ventadetalle","ventadetalle.codproducto=producto.codproducto");
		return $query = $this->db->get();
	}
	function mes($mes){//recive month
		//do consulting 
		$r=$this->db->query("SELECT count(*) as total FROM ventadetalle WHERE MONTH(fecha)=$mes");
		$dato=$r->row();//take a row from the select
		return$dato->total;

	}
}
?>