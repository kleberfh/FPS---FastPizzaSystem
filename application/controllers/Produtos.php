<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('ProdutosModel');
	}

	public function index() {
	    $data = array(
            'produtos' => $this->ProdutosModel->listar()
        );

		$this->load->view('produtos/listar', $data);
	}

	public function novo() {
		$this->load->view('produtos/novo');
	}

	public function registrar_produto() {
        $this->ProdutosModel->inserir();
        redirect('produtos');
	}

}
