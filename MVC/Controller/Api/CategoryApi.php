<?php

include_once '../../Model/class-category.php';
// Create object of Users class
$category = new CategoryDetails();



// Get all or a single user from database

class CategoryApi extends CategoryDetails {

    private $category;

    public function __construct() {
        $this->db = new dbclass();
        $this->category = new CategoryDetails();
        // create a api variable to get HTTP method dynamically
        $api = $_SERVER['REQUEST_METHOD'];
        // // get id from url
        $id = intval($_GET['id'] ?? '');
        
        if ($api == 'GET') {
            if ($id != 0) {
                $data = $this->category->getdatabyid($id);
                if ($data !== null) {
                    echo json_encode($data);
                } else {
                    // Return an error message if the ID is not found
                    echo json_encode(['error' => 'Category not found']);
                }
            }
            else{
                $data = $this->getalldata();
                echo json_encode($data);
            }
        }
        elseif ($api == 'POST') {
            $this->adddata();
    }
    elseif ($api == 'DELETE') {
        $this->deletedata($id);
    }
    elseif ($api == 'PUT') {
        $this->updatedata($id);
    }
}

    function getalldata() {
        $data = $this->category->getallcategories();
        $res['success'] = true;
        $res['count'] = count($data);
        $res['data'] = $data;
        return $res;       

    }
    function adddata() {
        $data = $_POST;
        
        $result = $this->category->addCategories($data);
        if ($result) {
            $response = array('status' => 'success', 'message' => 'Category added successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to add category.');
        }
        echo json_encode($response);
    }
    function deletedata($id) {
        $result = $this->category->delete($id);
        if ($result) {
            $response = array('status' => 'success', 'message' => 'Category deleted successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to delete category.');
        }
        echo json_encode($response);
    }
    function updatedata($id){
        $method = $_SERVER['REQUEST_METHOD'];
        if ('PUT' === $method) {
            $decoded_input = json_decode(file_get_contents("php://input"), true);
        } else {
            return false;
        }
        var_dump($decoded_input['category_name']);
        
        $data = $decoded_input;
        $result = $this->category->updateCategories($data, $id);
        if ($result) {
            $response = array('status' =>'success','message' => 'Category updated successfully.');
        } else {
            $response = array('status' => 'error','message' => 'Failed to update category.');
        }
        echo json_encode($response);
    }
}

new CategoryApi();