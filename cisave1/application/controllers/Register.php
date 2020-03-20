<?php
class Register extends CI_Controller{
  function __construct(){
    parent::__construct();
    
    $this->load->helper('url');
  	$this->load->model('register_model'); 		
    $this->load->library('session');
  }

  function index(){
    $this->load->view('register_view');
  }

public function register_user(){

  //$validate = $this->login_model->validate($username,$email,$password);

    $user=array(
    'user_name'=>$this->input->post('user_name'),
    'user_email'=>$this->input->post('user_email'),
    'user_password'=>md5($this->input->post('user_password')),
    'user_level'=> '2'
      );
      print_r($user);

      $email_check=$this->register_model->email_check($user['user_email']);
      $password_check=$this->register_model->password_check($user['user_password']);

      if(($email_check)&&($password_check)){
      $this->register_model->register_user($user);
      echo $this->session->set_flashdata('success_msg','Registered successfully. Now login to your account.');
      redirect('login');
      }

      else{
      echo $this->session->set_flashdata('error_msg','Username or Password is already used');
      redirect('register');
      }

      }

      }
