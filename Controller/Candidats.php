<?php

require_once "../Model/Candidat.php";
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
            $_SESSION['erreur'] = "Please fill out all the inputs";
            header("Location: ../view/index.php");
            die();
        }
        
        if($this->candidatModel->checkIfUserExists($data['user'])){
            $logged = $this->candidatModel->login($data['user'],$data['password']);
            if($logged){
                $this->makeSession($logged,'candidateur');
                header("Location: ../view/dashboard.php");  
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

    public function uploadFile($file){
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('pdf','doc','docx');
        if(in_array($fileActualExt, $allowed)){
            if($fileError == 0){
                if($fileSize < 5000000){
                    $fileDestination = '../View/cv/'.$fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    return $fileName;
                }else{
                    flash('file_error', 'Your file is too big');
                    return false;
                }
            }else{
                flash('file_error', 'There was an error uploading your file');
                return false;
            }
        }else{
            flash('file_error', 'You cannot upload files of this type');
            return false;
        }
    }


    public function modifyInformations(){

        $data = [
            'name' => trim($_POST['prenom']),
            'family_name' => trim($_POST['nom']),
            'email' => trim($_POST['email']),
            'date' => trim($_POST['birthday']),
            'cv' => $this->uploadFile($_FILES['cv'])
        ];
        $user = $this->candidatModel->checkIfUserExists($_SESSION['email']);
        if(empty($data['name'])) $data['name'] = $user->name;
        if(empty($data['family_name'])) $data['family_name'] = $user->family_name;
        if(empty($data['email'])) $data['email'] = $user->email;
        if(empty($data['date']) && empty($user->date_de_naissance)){
            $_SESSION['error'] = "Il faut remplir la date";
            header("Location: ../view/candidat/profile.php");
            die();
        }elseif(empty($data['date'])){
            $data['date'] = $user->date_de_naissance;
        }
        if(empty($data['cv']) && empty($user->cv)){
            $_SESSION['error'] = "Il faut remplir le cv";
            header("Location: ../view/candidat/profile.php");
            die();
        }elseif(empty($data['cv'])){
            $data['cv'] = $user->cv;
        }  
        if($this->candidatModel->modifyInformations($_SESSION['email'],$data)){
            $_SESSION['email'] = $data['email'];
            $_SESSION['message'] = "Les informations ont ete modifier avec succes";
            header("Location: ../view/candidat/profile.php");
        }
    }

    public function newPass(){
        $data = [
            'ancien' => trim($_POST['oldPass']),
            'nouveau' => trim($_POST['newPass']),
            'confirm' => trim($_POST['confirmPass']),
        ];
        $user = $this->candidatModel->checkIfUserExists($_SESSION['email']);
        if(empty($data['ancien']) && empty($data['nouveau']) && empty($data['confirm'])){
            $_SESSION['error'] = "Il faut remplir tous les camps";
            header("Location: ../view/candidat/modifier.php");
            die();
        }
        if(password_verify($data['ancien'],$user->password)){
            if(strlen($data['nouveau']) < 8 || strlen($data['confirm']) < 8){
                $_SESSION['error'] = "le mot de passe doit etre > 8";
                header("Location: ../view/candidat/modifier.php");
                die();
            }
            if($data['nouveau'] == $data['confirm']){
                $password = password_hash($data['nouveau'],PASSWORD_DEFAULT);
                if($this->candidatModel->newPass($_SESSION['email'],$password)){
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['message'] = "Les informations ont ete modifier avec succes";
                    header("Location: ../view/candidat/modifier.php");
                }
            }else{
                $_SESSION['error'] = "Nouveau mot de passe et confirmer don't match";
                header("Location: ../view/candidat/modifier.php");
                die();
            }
        }else{
            $_SESSION['error'] = "Ancien mot de passe incorrect";
            header("Location: ../view/candidat/modifier.php");
            die();
        }
    }

        
     
    }

    $init = new Candidats;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['register'])) $init->register();
        if(isset($_POST['login'])) $init->login();
        if(isset($_POST['modifier'])) $init->modifyInformations();
        if(isset($_POST['modifierMP'])) $init->newPass();
    }else{
        if(isset($_GET['q'])) $init->logout();
    }
    
?>