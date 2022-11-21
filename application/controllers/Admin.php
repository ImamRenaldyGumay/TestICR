<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role') != '1') {
      $this->session->sess_destroy();
      $this->fungsiPeringatan('Anda Bukan Admin');
      redirect('Login', 'refresh');
    } elseif ($this->session->userdata('idakun') == ''  or $this->session->userdata('status') == '') {
      $this->session->sess_destroy();
      $this->fungsiPeringatan('Pastikan Sudah Melakukan Sign In');
      redirect('Login', 'refresh');
    } else {
      // $this->fungsiPeringatan('Selamat Datang Admin');
      $this->load->model('Admin_Model', 'Admin');
      $data = array('user' => $this->Admin->getNama()->row_array());
      // $this->fungsiPeringatan('Selamat Datang <?= $user['nama']');
    }
  }

  public function index()
  {
    $this->load->view('Templates/Header');
    $this->load->view('Templates/Navbar');
    $this->load->view('Templates/Sidebar');
    $this->load->view('Admin/v_index_admin');
    $this->load->view('Templates/Footer');
  }

  public function DataOrders()
  {
    $data = array(
      // 'user' => $this->Admin->getNama()->row_array(),
      'title' => 'Data Fakultas',
      'order' => $this->Admin->getOrder()
    );
    $this->load->view('Templates/Header');
    $this->load->view('Templates/Navbar');
    $this->load->view('Templates/Sidebar');
    $this->load->view('Admin/v_dataOrders');
    $this->load->view('Templates/Footer');
  }
  public function fungsiPeringatan($isiPeringatan)
  {
    echo "<script>alert('" . $isiPeringatan . "');</script>";
  }
}
