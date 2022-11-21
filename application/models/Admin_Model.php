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
    return $query->result_array();
  }

  public function getEmployee()
  {
    $query = $this->db->get('employees');
    return $query->result_array();
  }

  public function addEmployee($data)
  {
    $query = $this->db->insert('employees', $data);
    return $query;
  }

  public function deleteEmployee($EmployeeID)
  {
    $where = array('EmployeeID' => $EmployeeID);
    $query =  $this->db->delete('employees', $where);
    return $query;
  }

  public function detail_Edit_Employee($EmployeeID)
  {
    $query = $this->db->get_where('employees', ['EmployeeID' => $EmployeeID]);
    return $query->row_array();
  }

  public function EditEmployee($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  // public function EditEmployee()
  // {
  //   $EmployeeID = $this->input->post('EmployeeID');
  //   $LastName = $this->input->post('LastName');
  //   $data = ['LastName' => $LastName];
  //   $this->db->where('EmployeeID', $EmployeeID);
  //   $query = $this->db->update('employees', $data);
  //   return $query;
  // }

  public function getCustomer()
  {
    $query = $this->db->get('customer');
    return $query->result_array();
  }

  public function addCustomer($data)
  {
    $query = $this->db->insert('customer', $data);
    return $query;
  }

  public function deleteCustomer($CustomerID)
  {
    $where = array('CustomerID' => $CustomerID);
    $query =  $this->db->delete('customer', $where);
    return $query;
  }

  public function getProduct()
  {
    $query = $this->db->get('products');
    return $query->result_array();
  }
}
