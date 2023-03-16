<?php
include 'db.php';
$fetchdata = new DB_con();
?>

<?php
// Get the userid
$catid=intval($_GET['id']);
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecord($catid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
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
<h3>Update Category Form</h3>
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
  <div class="form-outline mb-4">
    <label class="form-label" for="category_name">Category Name</label>
    <input type="text" name="category_name" value="<?php echo htmlentities($row['category_name']);?>" class="form-control" required>
  </div>
  <br>
  <div class="form-outline mb-4">
    <label class="form-label" for="category_description">Category Description</label>
    <input type="text" name="category_description" value="<?php echo htmlentities($row['category_description']);?>" class="form-control" required>
  </div>
  <br>

<div class="form-outline mb-4"><b>Status</b>
<input type="text" readonly="" name="status" value="<?php echo htmlentities($row['status']);?>" class="form-control" required>
</div>
<?php } ?>&nbsp;
<button type="submit" name="update" class="btn btn-primary btn-block mb-4">Update</button>
</form>
</div>
</body>
</html>

<?php
//Object
$updatedata=new DB_con();
if(isset($_POST['update']))
{
// Get the userid
$catid=intval($_GET['id']);
// Posted Values
$parent_id=$_POST['parent_id'];
$category_name=($_POST['category_name']);
$category_description=$_POST['category_description'];
$status=$_POST['status'];

//Function Calling
$sql=$updatedata->update($parent_id,$category_name,$category_description,$status,$catid);
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>";
}
?>
