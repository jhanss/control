<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localizacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('plantilla/header');
		$this->load->view('localizacion/localizacion');
		$this->load->view('plantilla/footer');
	}
	public function insertarUbi(){
		$this->load->model('LocalizacionModel');
		$this->LocalizacionModel->buscarPorQr();



		$this->load->view('plantilla/header');
		$this->load->view('localizacion/localizacion');
		$this->load->view('plantilla/footer');	
	}
}
