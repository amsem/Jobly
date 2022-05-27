<?php

require_once "../Model/Candidat.php";
require_once "../Libraries/flash.php";
require "Users.php";

class Candidats extends Users{
    private $candidatModel;
    public function __construct(){
        $this->candidatModel = new Candidat;
    }

    public function register(){
        $data = [
            'name' => trim($_POST['name']),
            'family_name' => trim($_POST['family_name']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password'])
        ];

        if(empty($data['email']) || empty($data['family_name']) || 
        empty($data['password']) || empty($data['name'])){
            $_SESSION['erreur'] = "Please fill out all the inputs";
            header("Location: ../view/index.php");
            die();
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $_SESSION['erreur'] = "Invalid Email";
            header("Location: ../view/index.php");
            die();
        }

        if(strlen($data['password']) < 8){
            $_SESSION['erreur'] = "Invalid password";
            header("Location: ../view/index.php");
            die();
        }

        if($this->candidatModel->checkIfUserExists($data['email'])){
            $_SESSION['erreur'] = "Email already taken";
            header("Location: ../view/index.php");
            die();
        }

        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

        if($this->candidatModel->register($data)){
            echo "registered";
            // header("Location: ../view/index.php");
        }else{
            die("Something went wrong");
        }
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
        
        if($this->candidatModel->checkIfUserExists($data['user'])){
            $logged = $this->candidatModel->login($data['user'],$data['password']);
            if($logged){
                $this->makeSession($logged,'candidateur');
                echo "logged";
                // header("Location: ../view/offres.php");  
                }
            else{
                $_SESSION['erreur'] = "Password incorrect";
                header("Location: ../view/index.php");
                die();
            }
        }else{
            $_SESSION['erreur'] = "No user found";
            header("Location: ../view/index.php");
            die();
        }
    }
        

        
    }

    $init = new Candidats;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['register'])) $init->register();
        if(isset($_POST['login'])) $init->login();
    }else{
        if(isset($_GET['q'])) $init->logout();
    }
    
?>