<?php
class Admin_Model extends CI_Model
{
  public function getNama()
  {
    $query = $this->db->get_where('tb_user', ['nama' => $this->session->userdata('nama')]);
    return $query;
  }
  public function getOrder()
  {
    $query = $this->db->get('orders');
    return $query;
  }
}
