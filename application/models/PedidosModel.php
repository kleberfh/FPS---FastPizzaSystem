<?php
Class PedidosModel extends CI_Model {

    public $tipo_pizza;
    public $descricao;
    public $valor;
    public $cliente;

    public function listar() {
        $query = $this->db->get('pedidos', 100);
        return $query->result();
    }

    public function listarPorId($id)
    {
        $query = $this->db->get_where('pedidos', array('id'=> $id));
        return $query->result();
    }

	public function inserir() {
        $this->tipo_pizza    = $_POST['tipo_pizza'];
        $this->descricao  = $_POST['descricao'];
        $this->valor  = $_POST['valor'];
        $this->cliente  = $_POST['cliente'];

        $desc = $_POST['descricao']. "\n" .' - Sabores: '.join(',', $_POST['sabores']);

        $dados = array(
            'tipo_pizza'=> $this->tipo_pizza ,
            'descricao'=> $desc,
            'cliente'=> $this->cliente,
            'valor'=> $this->valor,
        );

        $this->db->insert('pedidos', $dados);
	}

    public function editar()
    {
        $this->tipo_pizza    = $_POST['tipo_pizza'];
        $this->descricao  = $_POST['descricao'];
        $this->valor  = $_POST['valor'];

        $dados = array(
            'tipo_pizza'=> $this->tipo_pizza ,
            'descricao'=> $this->descricao,
            'valor'=> $this->valor,
        );

        $this->db->update('pedidos', $dados, array('id' => $_POST['id']));
    }

    public function deletar($id)
    {
        $this->db->delete('pedidos', array('id'=>$id));
    }

    public function buscar($query)
    {
        $this->db->select('*');
        $this->db->from('pedidos');
        $this->db->or_like('descricao', $query);
        $this->db->or_like('cliente', $query);
        $result = $this->db->get()->result();
        return $result;
    }

}
