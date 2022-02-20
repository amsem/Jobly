<?php 
    class Role extends User{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }
        public function setRole($role,$user){
            $this->db->query('INSERT INTO roles (role, user_id) VALUES (:role, :user_id)');
            $this->db->bind(':role', $role);
            $this->db->bind(':user_id', $user);
         
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

    }

?>