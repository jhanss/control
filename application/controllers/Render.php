<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Render extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Ciqrcode');
		$this->load->database();
	}
	public function index()
	{
		$data['titulo']="Generar QR";
		$data['data'] = $this->db->get('persona')->result();

		

		// echo "<pre>";
		// 	print_r($data['data']);
		// 	exit();
		// echo "</pre>";
		// $this->load->view('plantilla/header');
		$this->load->view('render',$data);
		// $this->load->view('plantilla/footer');


	}
	public function QRcode($info){
		QRcode::png(
			$info,
			$outfile=false,
			$level=QR_ECLEVEL_H,
			$size=5,
			$margin=1
		);	
	}
}
 