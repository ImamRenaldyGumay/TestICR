<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_Model', 'Auth');
  }

  public function Login()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    $this->form_validation->set_message('valid_email', 'Harus Berupa {field}');
    $this->form_validation->set_message('required', '{field} Harus di Isi!');

    if ($this->form_validation->run() == false) {
      // $data['title'] = 'Halaman Login Aplikasi Penjadwalan Workhop';
      // $this->load->view('templates/auth_header', $data);
      $this->load->view('Auth/v_login');
      // $this->load->view('templates/auth_footer');
    } else {
      $this->AksiLogin();
    }
  }

  private function AksiLogin()
  {
    $email = $this->input->post('email');
    $password = md5($this->input->post('password'));
    $data = array(
      'email' => $email,
      'password' => $password
    );
    if ($this->Auth->cek_login($data)->num_rows() > 0) {
      $user = $this->Auth->cek_login($data)->result();
      foreach ($user as $userakun) {
        $userakun = array(
          'idakun' => $userakun->id_user,
          'status' => 'SUKSES',
          'nama' => $userakun->nama,
          'role' => $userakun->role
        );
        $this->session->set_userdata($userakun);

        if ($userakun['role'] == '1') {
          $this->fungsiPeringatan("Berhasil Sign In");
          redirect('Admin', 'refresh');
        } else if ($userakun['role'] == '2') {
          $this->fungsiPeringatan("Berhasil Sign In");
          redirect('User', 'refresh');
        } else {
          // $this->fungsiPeringatan("Berhasil Sign In");
          // redirect('Instruktur', 'refresh');
        }
      }
    } else {
      // redirect('Auth/ErrorLogin');
      $this->fungsiPeringatan("Pastikan Email dan Password benar");
      redirect('Login', 'refresh');
    }
  }
  public function Logout()
  {
    $this->session->sess_destroy();
    $this->fungsiPeringatan("Terima Kasih");
    redirect("Login");
  }
  public function fungsiPeringatan($isiPeringatan)
  {
    echo "<script>alert('" . $isiPeringatan . "')</script>";
  }
}
