<?php 
    require_once "../Libraries/Database.php";

    class User{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function checkIfUserExists($username,$email){
            $this->db->query('SELECT * FROM users WHERE user = :username OR email = :email');
            $this->db->bind(':username',$username);
            $this->db->bind(':email',$email);
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
                return false;
            }
        }

        public function login($username,$password){
            $row = $this->checkIfUserExists($username,$username);
            if($row == false) return false;

            $hashedPass = $row->password;
            if(password_verify($password,$hashedPass)){
                return $row;
            }else{
                return false;
            }
        }
    }

?>