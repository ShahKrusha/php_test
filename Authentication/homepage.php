<?php
session_start();
require 'authentication.php';

$select = new Select();


if(isset($_SESSION["userid"]))
{
    $user = $select->selectUserById($_SESSION["userid"]);
}
else
{
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
</head>
<body>
    <center>
        <h1> Welcome To The Home Page!!! <br> <?php echo $user["username"]; ?> </h1>

<form action="logout.php" method="post">
    <button type="submit" name="logout">Logout</button>
</form>
    </center>
</body>
</html>