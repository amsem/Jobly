<?php
    require_once "../Model/User.php";
    require_once "../Model/Role.php";
    require_once "../Libraries/flash.php";
    class Users{
        private $userModel;
        private $roleModel;
        public function __construct(){
            $this->userModel = new User;
            $this->roleModel = new Role;
        }
        public function register(){
            $data = [
                'name' => trim($_POST['name']),
                'family_name' => trim($_POST['family_name']),
                'email' => trim($_POST['email']),
                'user' => trim($_POST['user']),
                'password' => trim($_POST['password']),
                'type' => trim($_POST['type'])
            ];

            if(empty($data['user']) || empty($data['email']) || empty($data['family_name']) || 
            empty($data['password']) || empty($data['name']) || empty($data['type'])){
                flash("register", "Please fill out all inputs");
                header("Location: ../view/index.php");
            }

            if(!preg_match("/^[A-Za-z0-9]*$/", $data['user'])){
                flash("register", "Invalid username");
                header("Location: ../view/index.php");
            }

            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                flash("register", "Invalid email");
                header("Location: ../view/index.php");
            }

            if(strlen($data['password']) < 8){
                flash("register", "Invalid password");
                header("Location: ../view/index.php");
            }

            if($this->userModel->checkIfUserExists($data['user'],$data['email'])){
                flash("register", "Username or email already taken");
                header("Location: ../view/index.php");
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
            $data = [
                'user' => $_POST['user'],
                'password' => $_POST['password']
            ];

            if(empty($data['user']) || empty($data['password'])){
                flash("login", "Please fill out all inputs");
                header("Location: ../view/index.php");
                exit();
            }
            
            if($this->userModel->checkIfUserExists($data['user'],$data['user'])){
                $logged = $this->userModel->login($data['user'],$data['password']);
                if($logged){
                    if($role = $this->roleModel->getRole($logged->user_id)){
                        $this->makeSession($logged,$role);
                        if($_SESSION['role'] == "recruteur"){
                            header("Location: ../view/dashboard.php");
                        }else{
                            header("Location: ../view/offres.php");
                        }
                    }

                }else{
                    flash("login", "Password Incorrect");
                    header("Location: ../view/index.php");
                }
            }else{
                flash("login", "No user found");
                header("Location: ../view/index.php");
            }
        }

        public function logout(){
            unset($_SESSION['id']);
            unset($_SESSION['user']);
            unset($_SESSION['email']);
            unset($_SESSION['role']);
            header("Location: ../view/index.php");
        }

        public function makeSession($user,$role){
            $_SESSION['id'] = $user->user_id;
            $_SESSION['user'] = $user->user;
            $_SESSION['email'] = $user->email;
            $_SESSION['role'] =  $role->role;
        }

    }
    $init = new Users;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['register'])) $init->register();
        if(isset($_POST['login'])) $init->login();
        if(isset($_POST['logout'])) $init->logout();

    }
?>