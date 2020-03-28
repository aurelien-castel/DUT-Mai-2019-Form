<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_question extends CI_Controller{

    function __construct(){
        parent:: __construct();
        $this->load->model('Tbl_question_model', 'm');
    }

    function index(){
        $data['questions'] = $this->m->getQuestion();
        $this->load->view('tbl_question/index', $data);
    }

    public function add(){
        $this->load->view('layout/header');
        $this->load->view('tbl_question/add');
        $this->load->view('layout/footer');
    }

    public function submit(){
        $result = $this->m->submit();
        if($result){
            $this->session->set_flashdata('success_msg', 'Record added successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Password already used');
        }
        redirect(base_url('tbl_question/index'));
    }

    public function edit($uid,$qid){
        $data['question'] = $this->m->getQuestionById($uid,$qid);
        $this->load->view('layout/header');
        $this->load->view('tbl_question/edit', $data);
        $this->load->view('layout/footer');
    }

    public function update(){
        $result = $this->m->update();
        if($result){
            $this->session->set_flashdata('success_msg', 'Record updated successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Password already used');
        }
        redirect(base_url('tbl_question/index'));
    }

    public function delete($uid,$qid){
        $result = $this->m->delete($uid,$qid);
        if($result){
            $this->session->set_flashdata('success_msg', 'Record deleted successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Fail to delete record');
        }
        redirect(base_url('tbl_question/index'));
    }

}