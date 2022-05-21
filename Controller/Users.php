<?php
    abstract class Users{
        
        abstract public function register();
        abstract public function login();
        
        public function logout(){
            unset($_SESSION['id']);
            unset($_SESSION['email']);
            unset($_SESSION['role']);
            session_destroy();
            header("Location: ../view/index.php");
        }

        public function makeSession($data,$role){
            $_SESSION['id'] = $data->id;
            $_SESSION['email'] = $data->email;
            $_SESSION['name'] = $data->name;
            $_SESSION['role'] = $role;

        }

    }
?>