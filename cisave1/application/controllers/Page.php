<?php
class Page extends CI_Controller{

  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function index(){
    //Allowing akses to admin only
    $data['username'] = $this->session->userdata('username');
      if($this->session->userdata('level')==='1'){
          $this->load->view('dashboard_view',$data);
      }else{
          echo "Access Denied";
      }

  }

  function staff(){
    //Allowing akses to staff only
  $data['username'] = $this->session->userdata('username');
    if($this->session->userdata('level')==='2'){
      $this->load->view('dashboard_view',$data);
    }else{
        echo "Access Denied";
    }
  }

  function author(){
    //Allowing akses to author only
    if($this->session->userdata('level')==='3'){
      $this->load->view('dashboard_view');
    }else{
        echo "Access Denied";
    }
  }

  function tbl_form(){
    redirect('tbl_form');
  }

}
