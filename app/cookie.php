<?php
    /**
     * cookie msg
     */
    function setMsg($type,$msg){
        setcookie($type,$msg,time() +2);
    }
    /**
     * Get Msg Cookie
     */
    function getMsg($type){
        if(isset($_COOKIE[$type])){
            echo "<p class=\"alert alert-{$type}\">{$_COOKIE[$type]}<button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
        }
    }
?>