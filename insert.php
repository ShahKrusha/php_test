<?php
include 'db.php';
$fetchdata = new DB_con();
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
    <h3>Add Category Form</h3>
  </center>
<form method="post">
  <div class="container">
  <div class="form-outline mb-4">
    <label class="form-label" for="form4Example1">Parent Category Name</label>
    <select id="parent_id" name="parent_id">
                                <option value="">Select Category</option>

                                <?php
                                    $sql=$fetchdata->treeCat();
                                    $count=1;
                                    while($row1=mysqli_fetch_array($sql))
                                    {
                                ?>
                                <option value="<?php echo $row1['id'];?>"><?php echo $row1["category_name"];?></option>
                                <?php
                                    }
                                ?>

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
  <button type="submit" name="insert" class="btn btn-primary btn-block mb-4">Add</button>
</div>
</form>
</body>
</html>

<?php
// Object creation
$insertdata=new DB_con();
if(isset($_POST['insert']))
{
// Posted Values
$parent_id=$_POST['parent_id'];
$category_name=$_POST['category_name'];
$category_description=$_POST['category_description'];

//Function Calling
$sql=$insertdata->insert($parent_id,$category_name,$category_description,'Active');
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='index.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='index.php'</script>";
}
}
?>