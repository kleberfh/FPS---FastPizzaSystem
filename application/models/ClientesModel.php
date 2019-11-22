<?php
Class ClientesModel extends CI_Model {

    public $nome;
    public $telefone;
    public $cpf;
    public $rua;
    public $numero;
    public $bairro;
    public $cep;
    public $complemento;

    public function listar() {
        $query = $this->db->get('clientes', 100);
        return $query->result();
    }

    public function listarPorId($id)
    {
        $query = $this->db->get_where('clientes', array('id'=> $id));
        return $query->result();
    }

	public function inserir() {
        $this->nome    = $_POST['nome'];
        $this->telefone  = $_POST['telefone'];
        $this->cpf  = $_POST['cpf'];
        $this->rua     = $_POST['rua'];
        $this->numero     = $_POST['numero'];
        $this->bairro     = $_POST['bairro'];
        $this->cep     = $_POST['cep'];
        $this->complemento     = $_POST['complemento'];

        $dados = array(
            'nome'=> $this->nome ,
            'telefone'=> $this->telefone,
            'cpf'=> $this->cpf,
            'rua'=> $this->rua,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'cep' => $this->cep,
            'complemento' => $this->complemento
        );

        $this->db->insert('clientes', $dados);
	}

    public function editar()
    {
        $this->nome    = $_POST['nome'];
        $this->telefone  = $_POST['telefone'];
        $this->cpf  = $_POST['cpf'];
        $this->rua     = $_POST['rua'];
        $this->numero     = $_POST['numero'];
        $this->bairro     = $_POST['bairro'];
        $this->cep     = $_POST['cep'];
        $this->complemento     = $_POST['complemento'];

        $dados = array(
            'nome'=> $this->nome ,
            'telefone'=> $this->telefone,
            'email'=> $this->cpf,
            'rua'=> $this->rua,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'cep' => $this->cep,
            'complemento' => $this->complemento
        );

        $this->db->update('clientes', $dados, array('id' => $_POST['id']));
    }

    public function deletar($id)
    {
        $this->db->delete('clientes', array('id'=>$id));
    }

    public function buscar($query)
    {
        $this->db->select('*');
        $this->db->from('clientes');
        $this->db->like('nome', $query);
        $this->db->or_like('telefone', $query);
        $this->db->or_like('email', $query);
        $this->db->or_like('rua', $query);
        $this->db->or_like('numero', $query);
        $this->db->or_like('bairro', $query);
        $this->db->or_like('cep', $query);
        $this->db->or_like('complemento', $query);
        $result = $this->db->get()->result();
        return $result;
    }

}
