<?php
class Register_model extends CI_model{

public function register_user($user){
$this->db->insert('tbl_users', $user);
}

   public function email_check($email){

     $this->db->select('*');
     $this->db->from('tbl_users');
     $this->db->where('user_email',$email);
     $query=$this->db->get();
    
     if($query->num_rows()>0){
       return false;
     }else{
       return true;
     }
    
   }

   public function password_check($password){

    $this->db->select('*');
    $this->db->from('tbl_users');
    $this->db->where('user_password',$password);
    $query=$this->db->get();
   
    if($query->num_rows()>0){
      return false;
    }else{
      return true;
    }

   }
 
}
?>
