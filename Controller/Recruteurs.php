<?php

require_once "../Model/Recruteur.php";
require_once "../Libraries/flash.php";
require "Users.php";

class Recruteurs extends Users{
    private $recruteurModel;
    public function __construct(){
        $this->recruteurModel = new Recruteur;
    }

    public function register(){
        $data = [
            'nom' => trim($_POST['nom']),
            'prenom' => trim($_POST['prenom']),
            'entreprise' => trim($_POST['entreprise']),
            'email' => trim($_POST['email']),
            'tel' => trim($_POST['tel'])

        ];

        if(empty($data['nom']) || empty($data['prenom']) || 
        empty($data['entreprise']) || empty($data['email']) || empty($data['tel'])){
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

        if(strlen($data['tel']) < 10){
            flash("register", "Invalid telephone number");
            header("Location: ../view/index.php");
            die();
        }

        if($this->recruteurModel->checkIfUserExists($data['email'])){
            flash("register", "Username or email already taken");
            header("Location: ../view/index.php");
            die();
        }

        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

        if($this->recruteurModel->register($data)){
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
        
        if($this->recruteurModel->checkIfUserExists($data['user'])){
            $logged = $this->recruteurModel->login($data['user'],$data['password']);
            if($logged){
                $this->makeSession($logged,'recruteur');
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

    $init = new Recruteurs;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['register'])) $init->register();
        if(isset($_POST['login'])) $init->login();
    }else{
        if(isset($_GET['q'])) $init->logout();
    }
    
?>