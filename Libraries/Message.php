<?php 
    require_once "Database.php";

    class Search{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }
    
        public function sendMessage($data){
            $this->db->query('INSERT INTO message (message, email_from, email_to, pseudo) VALUES (:message, :email_from, :email_to, :pseudo)');
            $this->db->bind(':message', $data['message']);
            $this->db->bind(':email_from', $data['email_from']);
            $this->db->bind(':email_to', $data['email_to']);
            $this->db->bind(':pseudo', $data['pseudo']);
            
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        
        public function getAllMsg(){
            $this->db->query('SELECT * FROM message');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        public function getLastMsg(){
            $this->db->query('SELECT * FROM message ORDER BY id DESC');
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        
        
    }

    if(isset($_GET)){
        print_r($_GET);
    }

?>    


