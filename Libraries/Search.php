<?php 
    require_once "Database.php";

    class Search{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function search($term){
            $term= trim(strtolower($term));
            if (empty($term)){
                return "Please enter a search term";
            }
            $this->db->query("SELECT * FROM jobs WHERE title LIKE :term or job_desc LIKE :term ORDER BY job_id DESC");
            $this->db->bind(':term','%'.$term.'%');
            $row =  $this->db->resultSet();
                if( $this->db->rowCount() > 0){
                    return $row;
                }else{
                    return "0 results found";
                }
        }

        public function searchByType($type){
            $type= trim(strtolower($type));
            $this->db->query("SELECT * FROM jobs WHERE type = :type ORDER BY job_id DESC");
            $this->db->bind(':type',$type);
            $row =  $this->db->resultSet();
                if( $this->db->rowCount() > 0){
                    return $row;
                }else{
                    return "0 results found";
                }
        }

        public function searchByCategory($cat){
            $cat= trim(strtolower($cat));
            $this->db->query("SELECT * FROM jobs WHERE category = :cat ORDER BY job_id DESC");
            $this->db->bind(':cat',$cat);
            $row =  $this->db->resultSet();
                if( $this->db->rowCount() > 0){
                    return $row;
                }else{
                    return "0 results found";
                }
        }

        
    }

?>    


