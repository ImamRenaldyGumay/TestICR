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
      'title' => '',
      'order' => $this->Admin->getOrder()
    );
    $this->load->view('Templates/Header', $data);
    $this->load->view('Templates/Navbar', $data);
    $this->load->view('Templates/Sidebar', $data);
    $this->load->view('Admin/v_dataOrders', $data);
    $this->load->view('Templates/Footer', $data);
  }

  public function DataEmployee()
  {
    $data = array(
      // 'user' => $this->Admin->getNama()->row_array(),
      'title' => '',
      'order' => $this->Admin->getEmployee()
    );
    $this->load->view('Templates/Header', $data);
    $this->load->view('Templates/Navbar', $data);
    $this->load->view('Templates/Sidebar', $data);
    $this->load->view('Admin/v_employees', $data);
    $this->load->view('Templates/Footer', $data);
  }

  public function tambahEmployee()
  {
    $data = [
      'EmployeeID' => $this->input->post('EmployeeID'),
      'LastName' => $this->input->post('LastName')
    ];
    $this->Admin->addEmployee($data);
    redirect("DataEmployee", 'refresh');
  }

  public function HapusEmployee($EmployeeID)
  {
    $this->Admin->deleteEmployee($EmployeeID);
    redirect("DataEmployee", 'refresh');
  }

  public function EditDataEmployee($EmployeeID)
  {
    $data = array(
      'ubah' => $this->Admin->detail_Edit_Employee($EmployeeID),
    );
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/Header', $data);
      $this->load->view('templates/Navbar', $data);
      $this->load->view('templates/Sidebar', $data);
      $this->load->view('Action/v_edit_employee', $data);
      $this->load->view('templates/Footer', $data);
    } else {
      $this->Admin->EditEmployee();
      redirect("DataEmployee", 'refresh');
    }
  }

  public function DataCustomer()
  {
    $data = array(
      // 'user' => $this->Admin->getNama()->row_array(),
      'title' => '',
      'order' => $this->Admin->getCustomer()
    );
    $this->load->view('Templates/Header', $data);
    $this->load->view('Templates/Navbar', $data);
    $this->load->view('Templates/Sidebar', $data);
    $this->load->view('Admin/v_customer', $data);
    $this->load->view('Templates/Footer', $data);
  }

  public function TambahCustomer()
  {
    $this->form_validation->set_rules('CustomerID', 'Customer ID', 'trim|required');
    $this->form_validation->set_rules('CompanyName', 'Company Name', 'trim|required');
    $this->form_validation->set_message('required', '{field} harus di isi!.');
    $data = array(
      // 'user' => $this->Admin->getNama()->row_array(),
      // 'title' => 'Data Prodi',
    );
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/Header', $data);
      $this->load->view('templates/Navbar', $data);
      $this->load->view('templates/Sidebar', $data);
      $this->load->view('Action/v_tambah_customer', $data);
      $this->load->view('templates/Footer', $data);
    } else {
      $data = [
        'CustomerID' => $this->input->post('CustomerID'),
        'CompanyName' => $this->input->post('CompanyName')
      ];
      $tambahCustomer = $this->Admin->addCustomer($data);
      if ($tambahCustomer) {
        $this->fungsiPeringatan("Data Berhasil di Tambahkan");
        redirect('DataCustomer', 'refresh');
      } else {
        $this->fungsiPeringatan("Data Gagal di Tambahkan");
        redirect('DataCustomer', 'refresh');
      }
    }
  }

  public function HapusCustomer($CustomerID)
  {
    $this->Admin->deleteEmployee($CustomerID);
    redirect("DataEmployee", 'refresh');
  }

  public function DataProduct()
  {
    $data = array(
      // 'user' => $this->Admin->getNama()->row_array(),
      'title' => '',
      'order' => $this->Admin->getProduct()
    );
    $this->load->view('Templates/Header', $data);
    $this->load->view('Templates/Navbar', $data);
    $this->load->view('Templates/Sidebar', $data);
    $this->load->view('Admin/v_product', $data);
    $this->load->view('Templates/Footer', $data);
  }

  public function fungsiPeringatan($isiPeringatan)
  {
    echo "<script>alert('" . $isiPeringatan . "');</script>";
  }
}
