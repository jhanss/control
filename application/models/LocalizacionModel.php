<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LocalizacionModel extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }

	public function buscarPorQr()
	{
		// $has=$this->input->post("hash");
		// $lat=$this->input->post("latitud");
		// $longi=$this->input->post("longitud");
		// $fecha=$this->input->post("fecha");
		// $hora=$this->input->post("hora");

		$has=$this->input->post("hash");
		$lat=$this->input->post("latitud");
		$longi=$this->input->post("longitud");
		$fecha=date('Y-m-d');
		$hora=date('h:i:s');

		// $info=hash('sha256',$datos);
		$query=$this->db->query("SELECT id_persona FROM `persona` WHERE hash='$has'");

		$data=array('id' =>$query->result());
		$var="";
		//print_r ( $data['id']);
		foreach ($data['id'] as $row){
			$var= $row->id_persona;
		}
		// echo $var;

		//insertar si exisste
		if($query->result()>0){

			$dat = array(
		            'id_persona'	=>$var,
		            'latitud' 		=>$lat,
		            'longitud'  	=>$longi,
		            'fecha'         =>$fecha,
		            'hora'         =>$hora
					);

		// print_r( $dat);
			//$this->db->insert('localizacion', $dat);
			if($this->db->insert('localizacion', $dat)){
			    echo "Registro grabado";
			}
			else{
			    echo " NO grabado";   
			}

		}
		

	}
}