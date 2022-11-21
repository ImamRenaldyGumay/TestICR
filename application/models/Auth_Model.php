<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Model extends CI_Model
{
  function cek_login($where)
  {
    $query = $this->db->get_where('tb_user', $where);
    return $query;
  }
}
