<?php

require_once "C:/xampp/htdocs/dev.jobly.com/Model/Admin.php";

class Adminn{
    private $adminModel;
    public function __construct(){
        $this->adminModel = new Admin;
    }

    public function login(){
        $data = [
            'user' => $_POST['user'],
            'password' => $_POST['password']
        ];

        if(empty($data['user']) || empty($data['password'])){
            $_SESSION['erreur'] = "Please fill out all the inputs";
            header("Location: ../view/index.php");
            die();
        }
                    
        $logged = $this->adminModel->login($data['user'],$data['password']);
        if($logged){
            $this->makeSession($logged,'admin');
            header("Location: ../view/admin/dashboard.php");
            }
        else{
            $_SESSION['erreur'] = "Password incorrect";
            header("Location: ../view/index.php");
            die();
        }
    }
        public function logout(){
            session_start();
            unset($_SESSION['id']);
            unset($_SESSION['email']);
            unset($_SESSION['role']);
            session_destroy();
            header("Location: ../view/index.php");
        }
    
        public function makeSession($data,$role){
            session_start();
            $_SESSION['id'] = $data->id;
            $_SESSION['user'] = $data->user;
            $_SESSION['role'] = $role;
    
        }

        public function getAllCan(){
            $candidats = $this->adminModel->getAllCan();
            if($candidats){
                return $candidats;
            }else{
                return Array();
            }
        }

        public function deleteCan(){
            $id = $_GET['id'];
            if($this->adminModel->deleteCan($id)){
                $_SESSION['message'] = "candidat deleted successfully";
                header("Location: ../view/admin/candidats.php");
            }
        }

        public function getAllRec(){
            $recruteures = $this->adminModel->getAllRec();
            if($recruteures){
                return $recruteures;
            }else{
                return Array();
            }
        }

        public function deleteRec(){
            $id = $_GET['rec'];
            if($this->adminModel->deleteRec($id)){
                $_SESSION['message'] = "recruter deleted successfully";
                header("Location: ../view/admin/recruteures.php");
            }
        }

        public function  validateRec(){
            $id = $_GET['validate'];
            if($this->adminModel->validateRec($id)){
                $_SESSION['message'] = "recruter validated successfully";
                header("Location: ../view/admin/recruteures.php");
            }
        }

        public function getAllOffers(){
            $offers = $this->adminModel->getAllOffers();
            if($offers){
                return $offers;
            }else{
                return Array();
            }
        }

        public function deleteOffer(){
            $id = $_GET['offer'];
            if($this->adminModel->deleteOffer($id)){
                $_SESSION['message'] = "offer deleted successfully";
                header("Location: ../view/admin/offres.php");
            }
        }

    }


    $init = new Adminn;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['login'])) $init->login();
    }else{
        if(isset($_GET['q'])) $init->logout();
        if(isset($_GET['id'])) $init->deleteCan();
        if(isset($_GET['rec'])) $init->deleteRec();
        if(isset($_GET['validate'])) $init->validateRec();
        if(isset($_GET['offer'])) $init->deleteOffer();
    }
    
?>