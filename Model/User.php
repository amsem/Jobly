<?php 
    include "../Libraries/Database.php";

    class User{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function findUserByUsername($username){
            $this->db->query('SELECT * FROM users WHERE user = :username');
            $this->db->bind(':username',$username);
            $row = $this->db->single();

            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        public function register($data){
            $this->db->query('INSERT INTO users (name, family_name, user, email, password) VALUES (:name, :fname, :user, :email, :password)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':fname', $data['family_name']);
            $this->db->bind(':user', $data['user']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            
            if($this->db->execute()){
                return true;
            }else{
                return 5;
            }
        }
    }

?>