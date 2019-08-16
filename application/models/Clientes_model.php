<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    protected $table = 'clientes';

    public function __construct() {
        parent::__construct();

    }

    public function get_all() {
        return $this->db->get($this->table)
                        ->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, array('id' => $id))
                        ->row();
    }

    public function get_where($where) {
        return $this->db->where($where)
                        ->get($this->table)
                        ->result();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
    public function getProfile($id) {
        
        // query builder no completado por tiempo
        // $this->db->select('clientes.*, pagos.*, ventas.*');
        // $this->db->from('clientes');
        // $this->db->join('pagos','clientes.idclientes = pagos.clientes_idclientes','Left');
        // $this->db->join('ventas','clientes.idclientes = ventas.clientes_idclientes','Left');
        // $this->db->order_by("ventas.create_at", "asc");
        // $this->db->order_by("pagos.create_at", "asc");
        // $this->db->where('id', $id);
        // $query=$this->db->get();
        // return 
        $sql = "SELECT clientes.idclientes AS id_cliente, , pagos.*, ventas.* FROM clientes
        LEFT OUTER JOIN pagos ON (clientes.idclientes = pagos.clientes_idclientes)
        LEFT OUTER JOIN ventas  ON (clientes.idclientes = ventas.clientes_idclientes)
        WHERE clientes.idclientes = ?
        ORDER bY ventas.create_at OR pagos.create_at";
       
        return   $this->db->query($sql, array($id))->result();
       
        // just sql without query builder
        // SELECT clientes.*, pagos.*, ventas.* FROM clientes
        // LEFT OUTER JOIN pagos ON (clientes.idclientes = pagos.clientes_idclientes)
        // LEFT OUTER JOIN ventas  ON (clientes.idclientes = ventas.clientes_idclientes)
        // WHERE clientes.idclientes = 5
        // ORDER bY ventas.create_at OR pagos.create_at
        // LIMIT 10
        // $this->db->where("clientes.idclientes",$id)->where("(status='live' OR status='dead')");
// 
        // $this->db->where('id', $id);
        // $this->db->delete($this->table);
    }

   
}