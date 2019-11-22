<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('PedidosModel');
		$this->load->model('SaboresModel');
		$this->load->model('ClientesModel');
	}

	public function index() {
	    $data = array(
            'pedidos' => $this->PedidosModel->listar()
        );

		$this->load->view('pedidos/listar', $data);
	}

	public function novo() {
        $data = array(
            'sabores' => $this->SaboresModel->listar(),
            'clientes' => $this->ClientesModel->listar()
        );
		$this->load->view('pedidos/novo', $data);
	}

	public function registrar_pedido() {
        $this->PedidosModel->inserir();
        redirect('pedidos');
	}

	public function buscar()
    {
        $pedidos = $this->PedidosModel->buscar($_POST['query']);

        $data = array(
            'pedidos' => $pedidos
        );

        $this->load->view('pedidos/listar', $data);
    }

}
