<?php 
    require_once "Database.php";

    class Message{
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
        
        public function getAllMsg($email,$to){
            $this->db->query('SELECT * FROM message WHERE email_from = :email_from AND email_to = :too OR email_to = :email_to AND email_from = :ffrom ORDER BY id DESC');
            $this->db->bind(':email_from', $email);
            $this->db->bind(':email_to', $email);
            $this->db->bind(':too', $to);
            $this->db->bind(':ffrom', $to);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }else{
                return false;
            }
        }

        public function getLastMsg(){
            session_start();
            $this->db->query('SELECT * FROM message WHERE email_from = :email_from AND email_to = :too OR email_to = :email_to AND email_from = :ffrom ORDER BY id DESC');
            $this->db->bind(':email_from', $_GET['receive']);
            $this->db->bind(':email_to', $_GET['receive']);
            $this->db->bind(':too', $_GET['to']);
            $this->db->bind(':ffrom', $_GET['to']);
            $row = $this->db->single();
            if($row){
                if($row->seen == 0){
                    if($row->email_from == $_SESSION['email']){
                        print'<div class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>'.$row->message.'</p>
                                    <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                                </div>';
                    }else{
                        print'<div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>'.$row->message.'</p>
                                    <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                                </div>';
                    }
                    $this->db->query('UPDATE message SET seen = "1" WHERE id = :id');
                    $this->db->bind(':id', $row->id);
                    
                    $this->db->execute();
                }
            }
        }
    }
    $init = new Message;
        if(isset($_GET['message'])){
            $data['message'] = $_GET['message'];
            $data['email_from'] = $_GET['from'];
            $data['email_to'] = $_GET['to'];
            $data['pseudo'] = 'test';
            $init->sendMessage($data);
         }

         if(isset($_GET['receive'])){
            $init->getLastMsg();
         }
            

?>    


