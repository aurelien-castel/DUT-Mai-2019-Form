<?php
class Tbl_reponse_model extends CI_Model{

    public function submit($fid){
      //$qid=$this->session->userdata('form_id');
     
      $field = array(
        'form_id'=>$fid
        );
      $this->db->where('');
      $this->db->insert('tbl_reponse', $field);

      $insertId = $this->db->insert_id();
      
      if($this->db->affected_rows() > 0){
          return $insertId;
      }
  }


}
