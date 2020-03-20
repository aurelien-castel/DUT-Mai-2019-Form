<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');

    if($this->input->get('cle',TRUE))
    {
    $this->auth_reponse_link();
    }
  }

  function index(){
    $this->load->view('login_view');
  }

  function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->login_model->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $id    = $data['user_id'];
        $name  = $data['user_name'];
        $email = $data['user_email'];
        $level = $data['user_level'];
        $sesdata = array(
            'user_id'   => $id,
            'username'  => $name,
            'email'     => $email,
            'level'     => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === '1'){
            redirect('page');

        // access login for staff
        }elseif($level === '2'){
            redirect('page/staff');

        // access login for author
        }else{
            redirect('page/author');
        }
    }else{
        echo $this->session->set_flashdata('error_msg','Username or Password is Wrong');
        redirect('login');
    }
  }

  function register(){
    redirect('register');
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }

  function auth_reponse(){
    $form_password = $this->input->post('form_password',TRUE);
    $validate = $this->login_model->validate_form($form_password);
    if($validate->num_rows() > 0){
        $data               = $validate->row_array();
        $form_id            = $data['form_id'];
        $form_name          = $data['form_name'];
        $form_desc          = $data['form_desc'];
        $form_accessible    = $data['form_accessible'];
        $sesdata            = array(
            'form_id'          => $form_id,
            'form_name'        => $form_name,
            'form_desc'        => $form_desc,
            'form_accessible'  => $form_accessible,
            'logged_in'        => TRUE
        );
        $this->session->set_userdata($sesdata);
        
        
          redirect('Tbl_reponse');
        
        
      } else if ($validate->num_rows() <= 0){
        echo $this->session->set_flashdata('error_msg','The Form Password is Wrong');
        redirect('login');
    }
  }

  public function auth_reponse_link(){
    $form_password = $this->input->get('cle',TRUE);
    $validate = $this->login_model->validate_form($form_password);

    if($validate->num_rows() > 0){
      $data               = $validate->row_array();
      $form_id            = $data['form_id'];
      $form_name          = $data['form_name'];
      $form_desc          = $data['form_desc'];
      $form_accessible    = $data['form_accessible'];
      $sesdata            = array(
          'form_id'          => $form_id,
          'form_name'        => $form_name,
          'form_desc'        => $form_desc,
          'form_accessible'  => $form_accessible,
          'logged_in'        => TRUE
      );
      $this->session->set_userdata($sesdata);
      
      
        redirect('Tbl_reponse');
      
      
    } else if ($validate->num_rows() <= 0){
      echo $this->session->set_flashdata('error_msg','The Form Password is Wrong');
      redirect('login');
  }

  }

}