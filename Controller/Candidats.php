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
            flash("register", "Please fill out all inputs");
            header("Location: ../view/index.php");
            die();
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            flash("register", "Invalid email");
            header("Location: ../view/index.php");
            die();
        }

        if(strlen($data['password']) < 8){
            flash("register", "Invalid password");
            header("Location: ../view/index.php");
            die();
        }

        if($this->candidatModel->checkIfUserExists($data['email'])){
            flash("register", "Username or email already taken");
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
            flash("login", "Please fill out all inputs");
            header("Location: ../view/index.php");
            exit();
        }
        
        if($this->candidatModel->checkIfUserExists($data['user'])){
            $logged = $this->candidatModel->login($data['user'],$data['password']);
            if($logged){
                $this->makeSession($logged,'candidateur');
                echo "logged";
                // header("Location: ../view/offres.php");  
                }
            else{
                flash("login", "Password Incorrect");
                header("Location: ../view/index.php");
            }
        }else{
            flash("login", "No user found");
            header("Location: ../view/index.php");
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