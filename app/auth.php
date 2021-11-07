<?php
    /**
     * email auth
     */

function emailAuth($table,$col,$data){

    $email_data=connect()->query("SELECT * from {$table} WHERE {$col}='$data'");
    if($email_data->num_rows==1){
        return $data=$email_data->fetch_object();
    }else{
        return false;
    }
}

/**
 * password Auth
 */

 function passAuth($user_pass,$db_pass){
     $verify=password_verify($db_pass,$user_pass);
     if($verify==true) {
         return true;
     } else{
         return false;
     }
 }

 /**
  * user login check
  */
  function userLogin(){
      if(isset($_SESSION['id'])){
          return true;
      } else{
          return false;
      }
  }

  /** user login info */

  function userloginData($table,$id){
    $data=connect()->query("SELECT * FROM {$table} WHERE id='$id'");
    return $data->fetch_object();
  }
?>