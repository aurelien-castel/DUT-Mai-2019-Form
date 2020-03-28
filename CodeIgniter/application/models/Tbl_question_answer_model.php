<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_question_answer_model extends CI_Model{  

  public function getAnswer($id){
    //$id=$this->session->userdata('form_id');

    $this->db->order_by('question_answer_id');
    $this->db->where('question_id',$id);
    $this->db->from('tbl_question_answer');
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->result();
    }else{
        return false;
    }
}

    public function submit($fid,$qid,$answer){      
       
        $field = array(
            'form_id'=>$fid,
            'question_id'=>$qid,
            'question_answer'=>$answer,
            );
        $this->db->where('');
        $this->db->insert('tbl_question_answer', $field);
        
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function delete($fid,$qid){
        $this->db->where('form_id', $fid);
        $this->db->where('question_id', $qid);
        $this->db->delete('tbl_question_answer');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
  

}