<?php 
    include "../Model/User.php";
    include "../Model/Role.php";
    class Users{
        private $userModel;
        private $roleModel;
        public function __construct(){
            $this->userModel = new User;
            $this->roleModel = new Role;
        }
        public function register(){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'family_name' => trim($_POST['family_name']),
                'email' => trim($_POST['email']),
                'user' => trim($_POST['user']),
                'password' => trim($_POST['password']),
                'type' => trim($_POST['type'])
            ];

            if($this->userModel->checkIfUserExists($data['user'],$data['email'])){
                header("Location: ../view/index.php");
                die();
            }

            $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

            if($this->userModel->register($data)){
                $row = $this->userModel->checkIfUserExists($data['user'],$data['email']);
                if($this->roleModel->setRole($data['type'],$row->user_id)){
                    header("Location: ../view/index.php");
                }
            }else{
                die("Something went wrong");
            }
        }

        public function login(){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = [
                'user' => $_POST['user'],
                'password' => $_POST['password']
            ];

            if($this->userModel->checkIfUserExists($data['user'],$data['user'])){
                $logged = $this->userModel->login($data['user'],$data['password']);
                if($logged){
                    $this->makeSession($logged);
                    echo "hi";
                }else{
                    echo "password incorrect";
                }
            }else{
                echo "no user found";
            }
        }

        public function makeSession($user){
            $_SESSION['id'] = $user->id;
            $_SESSION['user'] = $user->user;
            $_SESSION['email'] = $user->email;
        }

    }
    $init = new Users;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit'])) $init->register();
        if(isset($_POST['login'])) $init->login();

    }
?>