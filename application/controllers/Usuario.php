<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('UsuarioModel');
	}

// Show login page
	public function index() {
		$this->load->view('login');
	}

	public function cadastrar() {
		$this->load->view('registrar');
	}

	public function registrar_usuario() {

		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('senha', 'Senha', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registrar');
		} else {
			$data = array(
				'user_name' => $this->input->post('nome'),
				'user_email' => $this->input->post('email'),
				'user_password' => $this->input->post('senha')
			);
			$result = $this->UsuarioModel->registrar($data);
			if ($result == TRUE) {
				$data['message_display'] = 'Cadastrado com sucesso!';
				$this->load->view('logar', $data);
			} else {
				$data['message_display'] = 'Email já existente!';
				$this->load->view('registrar', $data);
			}
		}
	}

	public function logar_usuario() {

		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('senha', 'Senha', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logado'])){
				$this->load->view('home');
			}else{
				$this->load->view('logar');
			}
		} else {
			$data = array(
				'email' => $this->input->post('email'),
				'senha' => $this->input->post('senha')
			);
			$result = $this->UsuarioModel->logar($data);
			if ($result == TRUE) {

				$username = $this->input->post('nome');
				$result = $this->UsuarioModel->verificar_usuario($username);
				if ($result != false) {
					$session_data = array(
						'nome' => $result[0]->nome,
						'email' => $result[0]->email,
					);

					$this->session->set_userdata('logado', $session_data);
					$this->load->view('home');
				}
			} else {
				$data = array(
					'error_message' => 'Email ou senha incorreto.'
				);
				$this->load->view('logar', $data);
			}
		}
	}

	public function logout() {

		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logado', $sess_array);
		$data['message_display'] = 'Usuário desconectado.';
		$this->load->view('logar', $data);
	}

}
