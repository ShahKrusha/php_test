<?php
require_once('../../Controller/CategoryController.php');
$category = new categoryController();
$category->insertcategory();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body>
  <center>
  <?php
      if (isset($_SESSION['success'])) {
  ?>
        <div class="alert alert-success alert-dismissible fade show form-outline mb-4">
              <h5>Data Inserted Successfuly</h5>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
  <?php
        unset($_SESSION['success']);
      }
    ?>
    <br>
    <h3>Add Category Form</h3>
    <a href="index.php"><button class="btn btn-info"> View All Record</button></a>
  </center>
<form method="post" action="">
  <div class="container">
  <div class="form-outline mb-4">
    <label class="form-label" for="form4Example1">Parent Category Name</label>
    <select id="parent_id" name="parent_id" class="form-control">
                                <option value="">Select Category</option>
                                <?php foreach ($category->treeCat() as $category): ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
            <?php endforeach; ?>
                            </select>
  </div>
  <br>
  <div class="form-outline mb-4">
    <label class="form-label" for="category_name">Category Name</label>
    <input type="text" name="category_name" class="form-control" required />
  </div>
  <br>
  <div class="form-outline mb-4">
    <label class="form-label" for="category_description">Category Description</label>
    <textarea class="form-control" name="category_description" rows="4" required></textarea>
  </div>
  <br>
  <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Add</button>
</div>
</form>
</body>
</html>