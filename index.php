<?php
include 'db.php';
$fetchdata = new DB_con();


error_reporting(E_ALL);
if (isset($_POST["submit"])) {
    if (count($_POST["ids"]) > 0 ) {
        // Imploding checkbox ids
        $all = implode(",", $_POST["ids"]);
        $sql = mysqli_query($con,"DELETE FROM categories WHERE id in ($all)");
        if ($sql) {
            $errmsg ="Data has been deleted successfully";
            echo "<script>window.location.href='index.php'</script>";
        } else {
            $errmsg ="Error while deleting. Please Try again."; 
        }
    } else {
        $errmsg = "You need to select atleast one checkbox to delete!";
    }  
}
?>

<?php
    //Deletion
    if(isset($_GET['del']))
    {
        // Geeting deletion row id
        $rid=$_GET['del'];
        $deletedata=new DB_con();
        $sql=$deletedata->delete($rid);
        if($sql)
        {
            // Message for successfull insertion
            echo "<script>alert('Record deleted successfully');</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
?>

<?php

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<?php
    if(isset($_GET['stid']))
    {
        // Geeting deletion row id
        $stid=$_GET['stid'];
        $statuschange=new DB_con();
        $sql=$statuschange->changeStatus($stid);
        if($sql)
        {
            // Message for successfull insertion
            echo "<script>alert('Status changed successfully');</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
?>   

<!-- Display status message -->
<?php if(!empty($statusMsg)){ ?>
<div class="col-xs-12">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>

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
    <div class="container" align="center">
        <div class="row">
            <div class="col-md-12">
                <h3>PHP CRUD Operations using  PHP OOP</h3> <hr />
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="search" id="search" placeholder="Search...">&nbsp;
                        </div>
                        <div class="col-md-6">
                            <form action="" method="GET">
                                    <select name="sort_alphabet" >
                                        <option value="a-z" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z" ){ echo "selected"; } ?> >A-Z (Ascending Order)</option>
                                        <option value="z-a" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a" ){ echo "selected"; } ?> >Z-A (Descending Order)</option>
                                    </select>
                                    <button type="btnsubmit" class="input-group-text btn btn-secondary" id="basic-addon2">Sort</button>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <a href="insert.php"><button class="btn btn-primary"> Insert Record</button>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i>Import</a>
                            <a href="export.php" class="btn btn-success"><i class="dwn"></i>Export Data</a>
                            
                        </div>
                        <div class="col-md-12" id="importFrm" style="display: none;">
                            <form action="import.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="file" />
                                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                            </form>
                        </div>

                    </div>
                    <br>         
                        <!--<button type="submit" name="save">Go</button>-->
                    
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
                        <th>
                            <input type="checkbox" id="select_all" /> SelectAll
                        </th>
                    </thead>
                    <tbody>

                        <?php

                            $sort_option = "";
                            if(isset($_GET['sort_alphabet']))
                            {
                                if($_GET['sort_alphabet'] == "a-z")
                                {
                                    $sort_option = "ASC";
                                }
                                elseif($_GET['sort_alphabet'] == "z-a")
                                {
                                    $sort_option = "DESC";
                                }
                            }

                            $query = "select * from categories order by category_name $sort_option";
                            $query_run = mysqli_query($con, $query);
                            $cnt = 1;

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt; $cnt++;?></td>
                                            <td><?php echo htmlentities($row['parent_id']);?></td>
                                            <td><?php echo htmlentities($row['category_name']);?></td>
                                            <td><?php echo htmlentities($row['category_description']);?></td>
                                            <td><a href="?stid=<?php echo $row["id"];?>&status=<?php echo $row["status"];?>"><?php echo $row["status"];?></td>
                                            <td><?php echo htmlentities($row['added_datetime']);?></td>
                                                <td>
                                <a href="update.php?id=<?php echo htmlentities($row['id']);?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                            </td>
                            <td>
                                <a href="index.php?del=<?php echo htmlentities($row['id']);?>" class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                                            <td align="center"><input type="checkbox" class="checkbox" name="ids[]" value="<?php echo htmlentities($row['id']);?>"/></td>
                            
                                        </tr>
                                    <?php
                                }
                            }
                                ?>  
                    </tbody>
                </table>
                <input type="submit" name="submit" value="Delete All" class="btn btn-danger btn-md pull-right" onClick="return confirm('Are you sure you want to delete?');" >
 
</div>
            </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').keyup(function() {
                search_table($(this).val());
            });
            function search_table(value) {
                $('#myTable tr').each(function() {
                    var found = "false";
                    $(this).each(function() {
                        if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
                        {
                            found = "true";
                        }
                    });
                    if(found == 'true')
                    {
                        $(this).show();
                    }
                    else
                    {
                        $(this).hide();
                    }
                });
            }

        });
    
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});

function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>
</body>
</html>