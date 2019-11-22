<?php
Class SaboresModel extends CI_Model {

    public $nome;
    public $descricao;
    public $valor;

    public function listar() {
        $query = $this->db->get('sabores', 100);
        return $query->result();
    }

    public function listarPorId($id)
    {
        $query = $this->db->get_where('sabores', array('id'=> $id));
        return $query->result();
    }

	public function inserir() {
        $this->nome    = $_POST['nome'];
        $this->descricao  = $_POST['descricao'];
        $this->valor  = $_POST['valor'];

        $dados = array(
            'nome'=> $this->nome ,
            'descricao'=> $this->descricao,
            'valor'=> $this->valor,
        );

        $this->db->insert('sabores', $dados);
	}

    public function editar()
    {
        $this->nome    = $_POST['nome'];
        $this->descricao  = $_POST['descricao'];
        $this->valor  = $_POST['valor'];

        $dados = array(
            'nome'=> $this->nome ,
            'descricao'=> $this->descricao,
            'valor'=> $this->valor,
        );

        $this->db->update('sabores', $dados, array('id' => $_POST['id']));
    }

    public function deletar($id)
    {
        $this->db->delete('sabores', array('id'=>$id));
    }

    public function buscar($query)
    {
        $this->db->select('*');
        $this->db->from('sabores');
        $this->db->like('nome', $query);
        $this->db->or_like('descricao', $query);
        $this->db->or_like('email', $query);
        $result = $this->db->get()->result();
        return $result;
    }

}
