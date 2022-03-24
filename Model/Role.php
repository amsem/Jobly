<?php 
    require_once "../Libraries/Database.php";
    class Role{
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

        public function getRole($user){
            $this->db->query('SELECT role FROM roles WHERE user_id = :user_id');
            $this->db->bind(':user_id', $user);
            
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

    }

?>