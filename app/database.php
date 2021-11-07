<?php
    function connect(){
        return new mysqli(HOST,USER,PASS,DB);
    }

    /**
     * craete 
     */
    function create($sql){
       return connect()->query($sql);
    }
    /**
     * all
     */
    function all($table){
       return connect()->query("SELECT * FROM {$table}");
    }
    function find($table,$id){
        $data=connect()->query("SELECT * FROM {$table} WHERE id='$id'");
        return $data->fetch_object();
    }
    function update($sql){
        return connect()->query($sql);
    }
?>