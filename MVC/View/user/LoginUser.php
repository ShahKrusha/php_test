<?php
session_start();
require_once('../../Controller/UserController.php');
$user = new userController();
$user->login();

if(isset($_SESSION["userid"]))
    {
      header("Location : ../cat/index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
      <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="demo.css">
  
  </head>
  <body>
<main>
  <article>
  <div class="wrapper">
<?php
      if (isset($_SESSION['error'])) {
  ?>
        <div class="alert alert-danger alert-dismissible fade show form-outline mb-4">
              <h5>Invalid Login Credentials !!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
  <?php
        unset($_SESSION['error']);
      }
    ?>
  <form class="form-signin" method="post">       
      <h2 class="form-signin-heading">Login</h2>
      <input type="email" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
      <br>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button> 
      <br>
      <footer>New member? <a href="RegisterUser.php">Register here</a></footer>  
    </form>
  </div>
  </article>
 </main>
  </body>
</html>