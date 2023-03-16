<?php

require_once ('../../Model/class-category.php');

class CategoryController extends CategoryDetails{
    
    private $category;
    public function __construct(){
        $this->db = new dbclass();
        $this->category = new CategoryDetails();
    }
    public function index(){
        $category = $this->category->getallcategories();
        include('View/cat/index.php');
    }
    // public function insertCategory() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    //         $category = $this->category->addCategories($_POST);
    //     }
    //  }

     public function insertcategory() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $result = $this->category->addCategories($_POST);
            if ($result) {
                $_SESSION['success'] = '';
            } else {
                $_SESSION['Error'] = '';
            }
            // Redirect to category list page after update
            header("Location: InsertCategory.php");
            exit;
        }
     }

     public function treeCat($parent_id = "")
     {
         $categories = $this->category->treeCategory();
     
         $result = array();
     
         foreach ($categories as $category) {
             $result[] = array(
                 'id' => $category['id'],
                 'category_name' => $category['category_name'],
                 'category_description' => $category['category_description']
             );
         }
     
         return $result;
     }

     public function deletecategory($id) {
        if ($this->category->delete($id)) {
            // echo "Category deleted successfully";
            ?>
            <script>
                window.location.href = 'index.php';
            </script>
            <?php
            // header('Location : View/cat/index.php');
            // exit();
        } else {
            echo "Error deleting category";
        }
    }

    public function getcategorybyid($id) {
        $category = $this->category->getCategoryById($id);
        return $category;
    }
    public function getcategorynamebyid($id) {
        $category = $this->category->getCategoryNameById($id);
        return $category;
    }
    function updatecategory($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $result = $this->category->updateCategories($_POST, $id);
            if ($result) {
                $msg = "Data Updated Successfully !";
            } else {
                $msg = "Data Not Updated !";
            }
            // Redirect to category list page after update
            header("Location: index.php");
            exit;
        }
    }
}

?>