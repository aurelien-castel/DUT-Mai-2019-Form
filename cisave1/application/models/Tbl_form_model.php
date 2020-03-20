<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_form_model extends CI_Model{

    public function getForm(){
        $id=$this->session->userdata('user_id');

        $this->db->order_by('form_id');
        $this->db->where('user_id',$id);
        $this->db->from('tbl_form');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function submit(){
        $id=$this->session->userdata('user_id');
       
        $field = array(
            'user_id'=>$id,
            'form_name'=>$this->input->post('form_name'),
            'form_desc'=>$this->input->post('form_desc')
            );
        $this->db->where('');
        $this->db->insert('tbl_form', $field);
        
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function getFormById($id){
        $this->db->where('form_id', $id);
        $query = $this->db->get('tbl_form');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function update(){
        $id = $this->input->post('txt_hidden');
       
        $field = array(
            'form_name'=>$this->input->post('form_name'),
            'form_desc'=>$this->input->post('form_desc')
            );
        $this->db->where('form_id', $id);
        $this->db->update('tbl_form', $field);
        
        
        if($this->db->affected_rows() > 0){  
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){
        $this->db->where('form_id', $id);
        $this->db->delete('tbl_form');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function activated($id){
        $field = array(
            'form_password'=>uniqid()
            );
        $this->db->where('form_id', $id);
        $this->db->update('tbl_form', $field);
    }

    public function desactivated($id){
        $field = array(
            'form_password'=>""
            );
        $this->db->where('form_id', $id);
        $this->db->update('tbl_form', $field);
    }

    /**
     * enabled / disabled
     */

    public function enabled($id){
        $field = array(
            'form_accessible'=>"1"
            );
        $this->db->where('form_id', $id);
        $this->db->update('tbl_form', $field);
    }

    public function disabled($id){
        $field = array(
            'form_accessible'=>"0"
            );
        $this->db->where('form_id', $id);
        $this->db->update('tbl_form', $field);
    }

    /**
     * password
     */

    public function check_password($fid){

        $this->db->from('tbl_form');
        $this->db->where('form_id',$fid);
        $this->db->where('form_password',""); //s'il n'a pas de mot de passe
        $query=$this->db->get();
   
        if($query->num_rows()>0){
        return false; //s'il n'a pas de mot de passe
        }else{
        return true;
        }
    }

}