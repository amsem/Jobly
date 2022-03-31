<?php
    require_once "../Model/Candidature.php";
    require_once "../Libraries/flash.php";
    class Candidatures{
        private $candidatureModel;
        public function __construct(){
            $this->candidatureModel = new Candidature;
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
                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        $fileDestination = '../view/cv/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        return $fileNameNew;
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

        public function addCandidature(){
            $data = [
                'job_id' => trim($_SESSION['job_id']),
                'user_id' => trim($_SESSION['id']),
                'cv' => $this->uploadFile($_FILES['cv'])
            ];
            if($this->candidatureModel->checkIfAlreadyApplied($data)){
                flash("applied", "You are already applied");
                unset($_SESSION['job_id']);
                header("Location: ../view/offres.php");
            }else if($this->uploadFile($_FILES['cv'])){
                if($this->candidatureModel->addCandidature($data)){
                    unset($_SESSION['job_id']);
                    header("Location: ../view/index.php");
                }else{
                    die("Something went wrong");
                }
            }else{
                header("Location: ../view/offres.php");
                die();
            }
        }

        public function getCandidatures($id){
            $candidatures = $this->candidatureModel->getCandidatures($id);
            if($candidatures){
                return $candidatures;
            }else{
                flash("candidature", "There isn't any candidate");
                return Array();
            }
        }

    }
    $init = new Candidatures;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['Apply'])) $init->addCandidature();

    }
?>