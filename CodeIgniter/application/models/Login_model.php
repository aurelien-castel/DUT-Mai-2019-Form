<?php
class Login_model extends CI_Model{

  function validate($email,$password){
    $this->db->where('user_email',$email);
    $this->db->where('user_password',$password);
    $result = $this->db->get('tbl_users',1);
    return $result;
  }

  function validate_form($form_password){
    $this->db->where('form_password',$form_password);
    $result = $this->db->get('tbl_form',1);
    return $result;
  }

}