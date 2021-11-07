<?php
/**
 * validation msg show
 */
    function msgShow($msg,$type='danger'){
        return "<p class=\"alert alert-{$type}\">{$msg}<button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
    }
    /**
     * image move function
     */
    function move($file, $path = '/')
    {
        $file_name = time() . '_' . rand() . '_' . $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
    
        move_uploaded_file($file_tmp, $path . $file_name);
    
        return $file_name;
    }
    /**
     * Email-check function
     */
    function emailCheck($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        } else{
            return false;
        }
    }
    /**
     * 
     */
    function passCheck($pass,$cpass){
        if($pass==$cpass) {
            return true;
        } else{
            return false;
        }
    }
    /**
     * hash password
     */
    function gethash($pass){
        return password_hash($pass,PASSWORD_DEFAULT);
    }
    /**
     * Cell Check function
     */
    
    function cellCheck($cell){
        $length=strlen($cell);
        if(substr($cell,0,5) AND $length==14 ) {
            return true;
        } elseif(substr($cell,0,4) AND $length==13 ) {
            return true;
        } elseif(substr($cell,0,2) AND $length==11){
            return true;
        } else{
            return false;
        }
    }
    /**
     * old value
     */
    function old($name){
        if(isset($_POST[$name])){
            return $_POST[$name];
        }
    }
    /**
     * form clear
     */
    function formClean(){
        $_POST='';
    }

    /**
     * data check
     */
    function dataCheck($table,$col,$val){
        $data= connect()->query("SELECT {$col} FROM {$table} WHERE {$col}='$val'");
        if($data->num_rows>0) {
            return false;
        } else{
            return true;
        }
    }
?>