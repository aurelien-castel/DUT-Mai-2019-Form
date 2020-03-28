<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_form extends CI_Controller{

    /**
     * form
     */

    function __construct(){
        parent:: __construct();
        $this->load->model('Tbl_form_model', 'fm');
        $this->load->model('Tbl_question_model', 'qm');
        $this->load->model('Tbl_question_answer_model', 'qam');
        $this->load->model('Tbl_reponse_answer_model', 'ram');
    }

    function index(){
        $data['forms'] = $this->fm->getForm();
        $this->load->view('layout/header');
        $this->load->view('tbl_form/index', $data);
        $this->load->view('layout/footer');
    }

    public function add(){
        $this->load->view('layout/header');
        $this->load->view('tbl_form/add');
        $this->load->view('layout/footer');
    }

    public function submit(){
        $result = $this->fm->submit();
        if($result){
            $this->session->set_flashdata('success_msg', 'Record added successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'No change');
        }
        redirect(base_url('tbl_form/index'));
    }

    public function edit($id){
        $data['form'] = $this->fm->getFormById($id);
        $this->load->view('layout/header');
        $this->load->view('tbl_form/edit', $data);
        $this->qindex($id);
        if ( $this->ram->checkExistingAnswer($id) ) { //s'il existe bien des réponses pour ce formulaire
        $this->rindex($id);
        }
        $this->load->view('layout/footer');
    }

    public function update(){
        $result = $this->fm->update();
        if($result){
            $this->session->set_flashdata('success_msg', 'Record updated successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'No change');
        }
        redirect(base_url('tbl_form/index'));
    }

    public function delete($id){
        $result = $this->fm->delete($id);
        if($result){
            $this->session->set_flashdata('success_msg', 'Record deleted successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Fail to delete form');
        }

        redirect(base_url('tbl_form/index'));
    }

    public function activate($id){
        $result = $this->qm->check_activate($id);
        if($result){
            $this->fm->activated($id);
            $this->session->set_flashdata('success_msg', 'This form is now activated');
        }else{
            $this->fm->desactivated($id);
            $this->session->set_flashdata('error_msg', 'No question: this form cannot be activated');
        }
        redirect(base_url('tbl_form/edit/'.$id));
    }

    public function desactivate($id){
        $result = $this->qm->check_activate($id);

        $this->fm->desactivated($id);
        $this->desactivate_accessible($id);
        $this->session->set_flashdata('success_msg', 'This form is no more activated');

        redirect(base_url('tbl_form/edit/'.$id));
    }

    public function activate_accessible($id){

        $result = $this->qm->check_activate($id);
        $result1 = $this->fm->check_password($id);
        if(($result)&&($result1)){
            $this->fm->enabled($id);
            $this->session->set_flashdata('success_msg', 'This form is now enabled');
        }else{
            $this->fm->disabled($id);
            $this->session->set_flashdata('error_msg', 'No question or no password: this form cannot be enabled');
        }
        redirect(base_url('tbl_form/edit/'.$id));

    }

    public function desactivate_accessible($id){

        $result = $this->qm->check_activate($id);

        $this->fm->disabled($id);
        $this->session->set_flashdata('success_msg', 'This form is no more enabled');

        redirect(base_url('tbl_form/edit/'.$id));
        
    }

   /**
    * question
    * */ 

    function qindex($id){
        $data['questions'] = $this->qm->getQuestion($id);
        $data['answers'] = $this->qm->getAnswer($id);
        $this->load->view('tbl_question/index', $data);
    }

    public function qadd($id){
        $data['form'] = $this->fm->getFormById($id); //on récupère l'id du formulaire pour caractériser une question
        $this->load->view('layout/header');
        $this->load->view('tbl_question/add',$data);
        $this->load->view('layout/footer');
    }

    public function qsubmit($fid){
        $insertId = $this->qm->submit($fid);

        $answer=$this->input->post('question_answer'); 
        
        $answer=preg_split('/\n|$/', $answer, -1, PREG_SPLIT_NO_EMPTY); //séparation par /n
        $answer = preg_replace("/[\n\r]/","",$answer); 
        foreach($answer as $key => $item) {
            if (($item==="")||(empty($item)))
            {
              unset($answer[$key]);
            }
          }

        foreach($answer as $key => $item) {
        $result = $this->qam->submit($fid,$insertId,$item);
        }

        if(($insertId)&&($result)){
            $this->session->set_flashdata('success_msg', 'Record added successfully');
        }
        redirect(base_url('tbl_form/edit/'.$fid));
    }

    public function qedit($fid,$qid){
        $data['form'] = $this->fm->getFormById($fid); //on récupère l'id du formulaire pour caractériser une question
        $data['question'] = $this->qm->getQuestionById($fid,$qid);
        $data['answers'] = $this->qm->getAnswer($fid);
        $data['answer'] = $this->qm->getAnswerById($fid,$qid);
        $this->load->view('layout/header');
        $this->load->view('tbl_question/edit', $data);
        $this->load->view('layout/footer');
    }

    public function qupdate($fid,$qid){
        $result1 = $this->qm->update($fid,$qid);

        $answer=$this->input->post('question_answer'); 

        $result2 = $this->qam->delete($fid,$qid);
        
        $answer=preg_split('/\n|$/', $answer, -1, PREG_SPLIT_NO_EMPTY); //séparation par /n
        $answer = preg_replace("/[\n\r]/","",$answer); 
        foreach($answer as $key => $item) {
            if (($item==="")||(empty($item)))
            {
              unset($answer[$key]);
            }
          }

        foreach($answer as $key => $item) {
        $result3 = $this->qam->submit($fid,$qid,$item);
        }

        if(($result1)||($result3)){
            $this->session->set_flashdata('success_msg', 'Record updated successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'No change');
        }
        redirect(base_url('tbl_form/edit/'.$fid));
    }

    public function qdelete($fid,$qid){
        $result = $this->qm->delete($fid,$qid);
        if($result){
            $this->session->set_flashdata('success_msg', 'Record deleted successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Fail to delete record');
        }

        $result = $this->qm->check_activate($fid);
        if(!$result){
            $this->fm->desactivated($fid);
            $this->session->set_flashdata('error_msg', 'No question: this form is no more activated');
        }

        redirect(base_url('tbl_form/edit/'.$fid));
    }

    /**
    * resultats
    * */ 

    public function rindex($fid){
    $data['questions'] = $this->qm->getQuestionByExistingUserAnswer($fid); //toutes les questions avec des réponses user pour cette question

    foreach($data['questions'] as $question) { //pour chaque question     

        if ((($question->question_type)==='liste_déroulante')||(($question->question_type)==='cases_à_cochers')||(($question->question_type)==='bouton_radio')){

                $id=$question->question_id;
                
                $data['counts'][$id]=$this->ram->getCount($fid,$question->question_id);
                // echo $id." : ";
                // print_r ($this->ram->getCount($fid,$question->question_id));
                // echo "  |   ";
                /*EX:
                 [count] => Array 
                 ( 
                 [1] => Array ( [0] => Array ( [reponse_answer] => 7 [total] => 1 ) [1] => Array ( [reponse_answer] => 4 [total] => 4 ) [2] => Array ( [reponse_answer] => 6 [total] => 2 ) [3] => Array ( [reponse_answer] => 1 2 3 [total] => 1 ) ) 
                 [2] => Array ( [0] => Array ( [reponse_answer] => ok [total] => 6 ) [1] => Array ( [reponse_answer] => ko [total] => 2 ) ) 
                 [3] => Array ( [0] => Array ( [reponse_answer] => question [total] => 3 ) [1] => Array ( [reponse_answer] => 3 [total] => 3 ) [2] => Array ( [reponse_answer] => ma [total] => 3 ) ) 
                 ) */
            }   

        /**
         * Pour chaque question on demande à la base les réponses des utilisateurs des questions correspondantes
         */

    }

    //print_r($data);

    $this->load->view('tbl_reponse_answer/index', $data);    
    }

}