<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('id'))) {
      redirect(base_url('auth'));
    }
  }
  public function tambah(Type $var = null)
  {
    // Load Insert view form
    $this->load->view('insert');

    // Check submit button
		if($this->input->post('save'))
		{
		  $data['first_name']=$this->input->post('first_name');
			$data['last_name']=$this->input->post('last_name');
			$data['email']=$this->input->post('email');
			$response=$this->Crud_model->saverecords($data);
			if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		}
  }
}