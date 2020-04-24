<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PersonaModel extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }

	public function create($arc)
	{
		$nom=$this->input->post("nombre");
		$ape=$this->input->post("apellido");
		$ci=$this->input->post("ci");
		$fnac=$this->input->post("fnac");
		// $fot=$this->input->post("foto");

		$datos=$nom." ".$ape." ".$ci." ".$fnac;

		$info=hash('sha256',$datos);

		$dat = array(
            'nombre'	=>$nom,
            'apellido'	=>$ape,
            'ci' 		=>$ci,
            'f_nac'  	=>$fnac,
            'r_foto'    =>$arc,
            'hash'      =>$info
			);

		// var_dump($arc);
		if($this->db->insert('persona', $dat)){
			return $info;
		}
		else{
			return "";
		}

	}
	public function busqAndGenQR($ci){
		if($ci!=''){
			$query="SELECT * FROM persona WHERE ci = '$ci' ";
			$query=$this->db->query($query);	
			if(!empty($query->result())){
				foreach ($query->result() as $row){
					$id= $row->id_persona;
					$nom=$row->nombre;
					$ape=$row->apellido;
					$ci=$row->ci;
					$fnac=$row->f_nac;
				}
				$info=$id.'|'.$nom.'|'.$ape.'|'.$ci.'|'.$fnac;
				$hash=hash('sha256',$info);
				$this->db->query("UPDATE persona 
							SET hash='$hash'
						  	WHERE id_persona='$id'");

				$infodatos = array('datos' => $query->result(),
									'has'  => $hash
							);
				
				return $infodatos;
			}
			else{
				return $infodatos = array();
			}


		}
		else{
			return $infodatos = array();

		}

	}
}