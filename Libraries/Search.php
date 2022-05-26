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
            $this->db->query("SELECT * FROM jobs WHERE title LIKE :term or job_desc LIKE :term");
            $this->db->bind(':term','%'.$term.'%');
            $row =  $this->db->resultSet();
                if( $this->db->rowCount() > 0){
                    return $row;
                }else{
                    return "0 results found";
                }
        }
    }

?>    


