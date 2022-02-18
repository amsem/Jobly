<?php 
    include "../Model/User.php";
    class Users{
        private $userModel;
        public function __construct(){
            $this->userModel = new User;
        }
        public function register(){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'family_name' => trim($_POST['family_name']),
                'email' => trim($_POST['email']),
                'user' => trim($_POST['user']),
                'password' => trim($_POST['password'])
            ];

            if($this->userModel->findUserByUsername($data['user'])){
                echo "<script>alert('username already taken');</script>";
                header("Location: ../test");
            }

            $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

            if($this->userModel->register($data)){
                echo 'registred sucessfully';
            }else{
                die("Something went wrong");
            }
        }
    }
    $init = new Users;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit'])) $init->register();
    }
?>