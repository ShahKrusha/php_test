<?php
 require_once ('../../Model/class-db.php');
class CategoryDetails extends dbclass{
    private $id;
    private $parent_id;
    private $category_name;
    private $category_description;
    private $status;
    private $added_datetime;

    public function getId(){
        return $this->id;
    } 
    public function setId($id){
        return $this->id;
    }
    public function getParentId(){
        return $this->parent_id;
    }
    public function setParentId($parent_id){
        return $this->parent_id;
    }
    public function getCategoryName(){
        return $this->category_name;
    }
    public function setCategoryName($category_name){
        return $this->category_name;
    }
    public function getCategoryDescription(){
        return $this->category_description;
    }
    public function setCategoryDescription($category_description){
        return $this->category_description;
    }
    public function getStatus($status = "Active"){
        return $this->status;
    }
    public function setStatus(){
        return $this->status;
    }
    public function getAddedDateTime(){
        return $this->added_datetime;
    }
    public function setAddedDateTime($added_datetime){
        return $this->added_datetime;
    }
    public function treeCategory() {
        $sql = "select * from categories"; // retrieve data from the database
        $result = $this->query($sql);
        return $result;
    }
    public function getallcategories(){
        $sql = "select * from categories"; // retrieve data from the database
        $result = $this->query($sql);

        if ($result == true) {
            $cat = array();

            while($row = $result->fetch_assoc()) {
                // Do something with the data
                $cat[] = $row;
            }
            return $cat;
        } else {
            die("Couldn't get all categories");
        }
    }

    public function addCategories($data) {
        $parent_id = $data['parent_id'];
        $category_name = $data['category_name'];
        $category_description = $data['category_description'];

        if(!empty($parent_id))
        {
            $sql = "insert into categories(parent_id, category_name,category_description,status) values('$parent_id','$category_name','$category_description','Active')";
            $result = $this->query($sql);
            return $result;
        }
        else
        {
            $sql = "insert into categories(category_name,category_description,status) values('$category_name','$category_description','Active')";
            $result = $this->query($sql);
            return $result;
        }
    }   

    public function delete($id) {
        $sql = "DELETE FROM categories WHERE id = $id";
        if ($this->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function getcategorybyid($id)
        {
            $sql = "SELECT * FROM categories WHERE id = '$id'";
            $result = $this->query($sql);
            return $result;
        }
        public function getcategorynamebyid($id)
        {
            $sql = "SELECT c1.category_name AS category_name, c2.category_name AS parent_name
                    FROM categories c1
                    LEFT JOIN categories c2 ON c1.parent_id = c2.id
                    WHERE c1.id = '$id'";
            $result = $this->query($sql);
            return $result;
        }
        public function updateCategories($data, $id) {
            if (isset($data['parent_id'])) {
                $parent_id = $data['parent_id'];
            } else {
                $parent_id = 0;
            }
        
            if (isset($data['category_name'])) {
                $category_name = $data['category_name'];
            } else {
                $category_name = '';
            }
        
            if (isset($data['category_description'])) {
                $category_description = $data['category_description'];
            } else {
                $category_description = '';
            }
        
            // Update category data in database
            $sql = "UPDATE categories SET parent_id = '$parent_id', category_name='$category_name',category_description='$category_description'  WHERE id = '$id'";
            $result = $this->query($sql);

            // Debugging statements
            echo "SQL Query: " . $sql . "<br>";
            echo "Query Result: " . $result . "<br>";
        
            return $result;
        }
           
        public function getdatabyid($id)
        {
            $sql = "SELECT * FROM categories WHERE id = '$id'";
            $result = $this->query($sql);
            if ($result && $result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return null;
            }
        }
}

?>