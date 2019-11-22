<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('ClientesModel');
	}

	public function index() {
	    $data = array(
            'clientes' => $this->ClientesModel->listar()
        );

		$this->load->view('clientes/listar', $data);
	}

	public function novo() {
		$this->load->view('clientes/novo');
	}

	public function registrar_cliente() {
        $this->ClientesModel->inserir();
        redirect('clientes');
	}

}
