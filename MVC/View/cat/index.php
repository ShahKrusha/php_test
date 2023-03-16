<?php

require_once ('../../Controller/CategoryController.php');

$category = new CategoryDetails();
$category = $category->getallcategories();
//$db = new category($db);

$categorycontroller = new categorycontroller();
// Check if user has requested to delete a category
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $categorycontroller->deleteCategory($id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CRUD Operations using PHP OOP </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>


<body>
<?php
    require_once('../cat/header.php');
    ?>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <a href="InsertCategory.php"><button class="btn btn-primary"> Insert Record</button>
                            </a>
                            <form action="../../View/user/Logout.php" method="post">
                                <button type="submit"  class="btn btn-primary" name="logout">Logout</button>
                            </form>
                        </div>
                    </div>
                    <br>         
                    
                    <?php
      //session_start();
      if (isset($_SESSION['success'])) {
  ?>
        <div class="alert alert-success alert-dismissible fade show form-outline mb-4">
              <h5>Data Deleted Successfuly</h5>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
  <?php
        unset($_SESSION['success']);
      }
    ?>

            <div class="table-responsive"> 
            <form action="" method="post">               
                <table id="myTable" border="1" class="table table-bordred table-striped">
                    <thead>
                        <th>#</th>
                        <th>Parent Category Name</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Status</th>
                        <th>Addede Date Time</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                    </thead>
                    <tbody>

                        <?php

                            $cnt = 1;
                                foreach($category as $row)
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt; $cnt++;?></td>
                                            <!-- <td><?php echo htmlentities($row['parent_id']);?></td> -->
                                            <td><?php echo $categorycontroller->getcategorynamebyid($row['id'])->fetch_assoc()['parent_name'];?></td>
                                            <td><?php echo htmlentities($row['category_name']);?></td>
                                            <td><?php echo htmlentities($row['category_description']);?></td>
                                            <td><?php echo $row['status'];?></td>
                                            <td><?php echo htmlentities($row['added_datetime']);?></td>
                                                <td>
                                <a href="UpdateCategory.php?id=<?php echo htmlentities($row['id']);?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                            </td>
                            <td>
                                <a href="index.php?delete=<?php echo htmlentities($row['id']);?>" name="delete" value="submit" class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                                        </tr>
                                    <?php
                                }
                                ?>  
                    </tbody>
                </table>
 
</div>
            </form>
    <?php
    require_once('../cat/footer.php');
    ?>
</body>
</html>