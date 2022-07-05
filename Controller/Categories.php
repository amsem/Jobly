<?php
    require_once "c:/xampp/htdocs/dev.jobly.com/Model/Category.php";
    class Categories{
        private $categoryModel;
        public function __construct(){
            $this->categoryModel = new Category;
        }

        public function addCategory(){
            $data = trim($_POST['categorieOffre']);
            if($this->categoryModel->addCategory($data)){
                header("Location: ../view/admin/dashboard.php");
            }
        }

        public function getCategories(){
            $categories = $this->categoryModel->getCategories();
            if($categories){
                return $categories;
            }else{
                return Array();
            }
        }
    }
    $init = new Categories;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['cat'])) $init->addCategory();
    }
?>