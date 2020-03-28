<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_reponse extends CI_Controller{

    function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
    $this->load->helper('url');
    $this->load->model('Tbl_reponse_model', 'rm');

    $this->load->model('Tbl_question_model', 'qm');  
    $this->load->model('Tbl_question_answer_model', 'qam'); 

    $this->load->model('Tbl_reponse_model', 'rm');  
    $this->load->model('Tbl_reponse_answer_model', 'ram'); 
    $this->load->library('session');

  }

  function index(){
        
    if(($this->session->userdata('form_accessible'))==1){
        $fid=$this->session->userdata('form_id');

        $data['form_id'] = $fid;
        $data['form_name'] = $this->session->userdata('form_name');
        $data['form_desc'] = $this->session->userdata('form_desc');
        $data['questions'] = $this->qm->getQuestion($fid);
        $data['answers'] = $this->qm->getAnswer($fid);        
        $this->load->view('reponse_view', $data);

    } else { $this->disabled(); }
             
  }

  public function disabled(){

    $fid=$this->session->userdata('form_id');

    $data['form_id'] = $fid;
    $data['form_name'] = $this->session->userdata('form_name');
    
    $this->load->view('reponse_disabled_view', $data);

  }

  public function submit(){

    $fid=$this->session->userdata('form_id');
    $questions=$this->qm->getQuestion($fid);

    $useranswers=$this->input->post('useranswer');

    $insertId = $this->rm->submit($fid);

    foreach($useranswers as $key => $item) {
      $useranswers[$key]=str_replace("\r\n","",$item);
      if ($item===""){
        unset($useranswers[$key]);
      }
    }

    foreach($questions as $question) { 

      if(isset($useranswers[$question->question_id])) {

        if ($question->question_type==='cases_à_cochers') {

          $useranswer = $useranswers[$question->question_id];

          //$useranswer=str_replace("\r\n","",$useranswer);

          for ($i=0 ; $i < count($useranswer) ; $i++) {

              $result = $this->ram->submit($insertId,$fid,$question->question_id,$useranswer[$i]);
              
              print_r($useranswer[$i]);

            }
            

          } else {

          $useranswer = $useranswers[$question->question_id];

          $result = $this->ram->submit($insertId,$fid,$question->question_id,$useranswer);

          print_r($useranswer);
      
      }     

    }

  }
  print_r($useranswers);
  
    //$this->session->set_flashdata('success_msg', 'Record added successfully');
    redirect(base_url('login/logout'));
}

}