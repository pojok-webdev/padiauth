<?php
class User extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getusers(){
        $sql = "select * from users";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
}