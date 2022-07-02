<?php
    require_once "../Libraries/Database.php";
    
    class Category{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function getCategories(){
            $this->db->query('SELECT * FROM category');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        public function addCategory($data){
            $this->db->query('INSERT INTO category (nom) VALUES (:nom)');
            $this->db->bind(':name', $data);
            
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

    }

?>