<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Ciqrcode');
		// $this->load->database(); ya esta autoload
	}

	public function index()
	{
		$this->load->view('plantilla/header');
		$this->load->view('principal');
		$this->load->view('plantilla/footer');
	}
	public function generar(){
		$dat = array('resul' => '');
		$this->load->view('plantilla/header');
		$this->load->view('empezar',$dat);
		$this->load->view('plantilla/footer');	
	}
	public function guardar(){

		$mi_imagen = "foto";
	    $config['upload_path'] = "dist/personas/";
	    $config['file_name'] = date('d-m-Y-h-i-s-u');
	    $config['allowed_types'] = "jpg|jpeg|png";
	    $config['max_size'] = "5000"; // de kb a mb 
	    $config['max_width'] = "1000";
	    $config['max_height'] = "1000";

	    $this->load->library('upload', $config);
	    // var_dump($this->upload->do_upload("foto"));

	    if($this->upload->do_upload("foto")){
	    	// echo $this->upload->display_errors();
	    
	    	$data = array('upload_data' => $this->upload->data());
	    	$arch=$data['upload_data']['file_name'];

			$this->load->model('PersonaModel');
			$res=$this->PersonaModel->create($arch);



	    	if ($res!='') {

	    		$dirCode="dist/codes/";
				$fileCode=date('d-m-Y-h-i-s-u').'.png';
				
				QRcode::png(
					$res,
					$dirCode.$fileCode,
					$level=QR_ECLEVEL_H,
					$size=5,
					$margin=2
				);

				// var_dump($arch);
				// echo 'dd<img class="img-thumbnail" src="../'.$dirCode.$fileCode.'" />gg';

				$infodata='Correcto';
	    		
	    	}
	    	else{
	    		$infodata='error al guardar';
	    	}
	    }
	    else{
	    	$infodata='error en la foto';
	    }



		$arraydata=array('resul' =>$infodata );
		$this->load->view('plantilla/header');
		$this->load->view('empezar',$arraydata);
		$this->load->view('plantilla/footer');	
	}
	// public function QRcode($info){
	// 	$dirCode="dist/codes/";
	// 	$fileCode=date('d-m-Y-h-i-s').'.png';
		
	// 	QRcode::png(
	// 		$info,
	// 		$dirCode.$fileCode,
	// 		$level='H',
	// 		$size=5,
	// 		$margin=2
	// 	);	
	// 	echo 'kkk<img class="img-thumbnail" src="'.$codesDir.$codeFile.'" />';
	// }
	public function busqAndGenQR(){
		$ci=$this->input->post("ci");

		$this->load->model('PersonaModel');
		$res=$this->PersonaModel->busqAndGenQR($ci);
		if(!empty($res)){
			// $dirCode="dist/codes/";
			// $fileCode=date('d-m-Y-h-i-s-u').'.png';
				
			// QRcode::png(
			// 		$res,
			// 		$dirCode.$fileCode,
			// 		$level=QR_ECLEVEL_H,
			// 		$size=5,
			// 		$margin=2
			// 	);

			// echo 'dd<img class="img-thumbnail" src="../'.$dirCode.$fileCode.'" />gg';
			$arraydata=array('infper' =>$res);
			$this->load->view('plantilla/header');
			$this->load->view('mostrar',$arraydata);
			$this->load->view('plantilla/footer');	
			
		}
		else{
			header('Location: http://pruebaq-test.000webhostapp.com/index.php/');
		}


	}
	public function solQR($res){
		QRcode::png(
					$res,
					$outfile=false,
					$level=QR_ECLEVEL_H,
					$size=5,
					$margin=2
				);

	}
}
