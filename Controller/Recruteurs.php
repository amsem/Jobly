<?php
session_start();
require_once "../Model/Recruteur.php";
require "Users.php";

class Recruteurs extends Users{
    private $recruteurModel;
    public function __construct(){
        $this->recruteurModel = new Recruteur;
    }

    public function register(){
        $data = [
            'nom' => trim($_POST['name']),
            'prenom' => trim($_POST['family_name']),
            'entreprise' => trim($_POST['company_name']),
            'email' => trim($_POST['email']),
            'tel' => trim($_POST['tel']),
            'password' => trim($_POST['password']),
            'date' => trim($_POST['birthday'])

        ];

        if(empty($data['nom']) || empty($data['prenom']) || 
        empty($data['entreprise']) || empty($data['email']) || empty($data['tel'])){
            // flash("register", "Please fill out all inputs");
            header("Location: ../view/index.php");
            die();
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            // flash("register", "Invalid email");
            header("Location: ../view/index.php");
            die();
        }

        if(strlen($data['password']) < 8){
            // flash("register", "Invalid password");
            header("Location: ../view/index.php");
            die();
        }

        if(strlen($data['tel']) < 10){
            // flash("register", "Invalid telephone number");
            header("Location: ../view/index.php");
            die();
        }

        if($this->recruteurModel->checkIfUserExists($data['email'])){
            // flash("register", "Username or email already taken");
            header("Location: ../view/index.php");
            die();
        }

        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

        if($this->recruteurModel->register($data)){
            header("Location: ../view/index.php");
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
            // flash("login", "Please fill out all inputs");
            header("Location: ../view/index.php");
            exit();
        }
        $user = $this->recruteurModel->checkIfUserExists($data['user']);
        if($user->valider == 1){
            $logged = $this->recruteurModel->login($data['user'],$data['password']);
            if($logged){
                $this->makeSession($logged,'recruteur');
                header("Location: ../view/profil.php");  
                }
            else{
                // flash("login", "Password Incorrect");
                header("Location: ../view/index.php");
            }
        }else{
            // flash("login", "No user found");
            header("Location: ../view/index.php");
        }
    }

    public function modifyInformations(){
        $data = [
            'name' => trim($_POST['prenom']),
            'family_name' => trim($_POST['nom']),
            'tel' => trim($_POST['tel']),
            'date' => trim($_POST['birthday']),
            'entreprise' => trim($_POST['entreprise'])
            
        ];
        $user = $this->recruteurModel->checkIfUserExists($_SESSION['email']);
        
        if(empty($data['name'])) $data['name'] = $user->nom;
        if(empty($data['family_name'])) $data['family_name'] = $user->prenom;
        if(empty($data['tel'])) $data['tel'] = $user->tel;
        if(empty($data['date'])) $data['date'] = $user->date_de_naissance;
        if(empty($data['entreprise'])) $data['entreprise'] = $user->entreprise;
        if($this->recruteurModel->modifyInformations($_SESSION['email'],$data)){
            $_SESSION['message'] = "Les informations ont ete modifier avec succes";
            header("Location: ../view/recruteure/modifier.php");
        }
    }

    public function newPass(){
        session_start();
        $data = [
            'ancien' => trim($_POST['oldPass']),
            'nouveau' => trim($_POST['newPass']),
            'confirm' => trim($_POST['confirmPass'])
        ];
        $user = $this->recruteurModel->checkIfUserExists($_SESSION['email']);
        if(empty($data['ancien']) && empty($data['nouveau']) && empty($data['confirm'])){
            $_SESSION['error'] = "Il faut remplir tous les camps";
            header("Location: ../view/recruteure/modifier_pass.php");
            die();
        }
        if(password_verify($data['ancien'],$user->password)){
            if(strlen($data['nouveau']) < 8 || strlen($data['confirm']) < 8){
                $_SESSION['error'] = "le mot de passe doit etre > 8";
                header("Location: ../view/recruteure/modifier_pass.php");
                die();
            }
            if($data['nouveau'] == $data['confirm']){
                $password = password_hash($data['nouveau'],PASSWORD_DEFAULT);
                if($this->recruteurModel->newPass($_SESSION['email'],$password)){
                    $_SESSION['message'] = "Les informations ont ete modifier avec succes";
                    header("Location: ../view/recruteure/modifier_pass.php");
                }
            }else{
                $_SESSION['error'] = "Nouveau mot de passe et confirmer don't match";
                header("Location: ../view/recruteure/modifier_pass.php");
                die();
            }
        }else{
            $_SESSION['error'] = "Ancien mot de passe incorrect";
            header("Location: ../view/recruteure/modifier_pass.php");
            die();
        }
    }

        

        
    }

    $init = new Recruteurs;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['register'])) $init->register();
        if(isset($_POST['login'])) $init->login();
        if(isset($_POST['modifier'])) $init->modifyInformations();
        if(isset($_POST['pass'])) $init->newPass();
    }else{
        if(isset($_GET['q'])) $init->logout();
    }
    
?>