<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_question_model extends CI_Model{

    public function getQuestion($id){
   
        $this->db->order_by('question_id');
        $this->db->where('form_id',$id);
        $this->db->from('tbl_question');
       
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getQuestionByExistingUserAnswer($id){
        
        $this->db->select('*');
        $this->db->where('q.form_id',$id);
        $this->db->where("EXISTS(SELECT question_id FROM tbl_reponse_answer ra WHERE q.question_id=ra.question_id)");    
        $this->db->where("(q.question_type='liste_déroulante' OR q.question_type='cases_à_cochers' OR q.question_type='bouton_radio')");
        
        $this->db->from('tbl_question q');
        
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }

    }

    public function getAnswer($id){
            
        $this->db->order_by('question_answer_id');
        $this->db->where('tbl_question.form_id',$id);
        $this->db->from('tbl_question');
        $this->db->join('tbl_question_answer', 'tbl_question_answer.question_id = tbl_question.question_id');

        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function submit($fid){
        //$qid=$this->session->userdata('form_id');
       
        $field = array(
            'form_id'=>$fid,
            'question_name'=>$this->input->post('question_name'),
            'question_type'=>$this->input->post('question_type'),
            'question_help'=>$this->input->post('question_help'),
            );
        $this->db->where('');
        $this->db->insert('tbl_question', $field);

        $insertId = $this->db->insert_id();
        
        if($this->db->affected_rows() > 0){
            return $insertId;
        }
    }

    public function getQuestionById($fid,$qid){
        $this->db->where('question_id', $qid);
        $this->db->where('form_id', $fid);
        $query = $this->db->get('tbl_question');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function getAnswerById($fid,$qid){
        $this->db->where('question_id', $qid);
        $this->db->where('form_id', $fid);
        $query = $this->db->get('tbl_question_answer');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function update($fid,$qid){
        $id = $this->input->post('txt_hidden');
       
        $field = array(
            'question_name'=>$this->input->post('question_name'),
            'question_type'=>$this->input->post('question_type'),
            'question_help'=>$this->input->post('question_help'),
            );
        $this->db->where('form_id', $fid);
        $this->db->where('question_id', $qid);
        $this->db->update('tbl_question', $field);  
        
        if($this->db->affected_rows() > 0){  
            return true;
        }else{
            return false;
        }
    }

    public function delete($fid,$qid){
        $this->db->where('form_id', $fid);
        $this->db->where('question_id', $qid);
        $this->db->delete('tbl_question');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function check_activate($fid){
        $this->db->select('*');
        $this->db->from('tbl_question');
        $this->db->where('form_id',$fid);
        $query=$this->db->get();
   
        if($query->num_rows()>0){
        return true;
        }else{
        return false;
        }
    }

}