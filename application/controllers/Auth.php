<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function Login()
  {
    $this->load->view('Auth/v_login');
  }
}
