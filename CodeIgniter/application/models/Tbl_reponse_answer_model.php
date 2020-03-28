<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_reponse_answer_model extends CI_Model{  

    public function submit($rid,$fid,$qid,$answer){      
       
        $field = array(
            'reponse_lambda_user_id'=>$rid,
            'form_id'=>$fid,
            'question_id'=>$qid,
            'reponse_answer'=>$answer,
            );
        $this->db->where('');
        $this->db->insert('tbl_reponse_answer', $field);
        
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function getReponse($id){
   
        $this->db->order_by('reponse_answer_id');
        $this->db->where('form_id',$id);
        $this->db->from('tbl_reponse_answer');
       
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getCount($fid,$qid){

        $this->db->order_by('question_id');
        $this->db->select('reponse_answer, COUNT(*) as total');
        $this->db->where('form_id',$fid);
        $this->db->where('question_id',$qid);

        $this->db->group_by('reponse_answer');
        $result = $this->db->get('tbl_reponse_answer');
        $result_array = $result->result_array();  //Get the result as array
        return $result_array;
    }

    public function checkExistingAnswer($fid){

            $this->db->select('*');
            $this->db->from('tbl_reponse_answer');
            $this->db->where('form_id',$fid);
            $query=$this->db->get();
           
            if($query->num_rows()>0){
              return true;
            }else{
              return false;
            }   
          
    }

}