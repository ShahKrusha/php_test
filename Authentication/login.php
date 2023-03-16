<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
      <link rel="stylesheet" href="style.css">
    <!-- Demo CSS -->
    <link rel="stylesheet" href="demo.css">
  
  </head>
  <body>
  
 <main>
  <article>
  <div class="wrapper">
    <?php
  if(isset($_SESSION['login'])) {
    header("Location: homepage.php");
}
require_once 'authentication.php';

$error = false;
if(isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $login = new Login();
    if($login->log($email, $password)) {
        $_SESSION['login'] = true;
        $_SESSION['userid'] = $login->getUserId();
        header("Location: homepage.php");
        exit;
    } else {
?>
      <?php
        echo "Invalid Login Credentials !";
    }
}

            // if($error) {
            //     echo '<p style="color:red;">Invalid login credentials</p>';
            // }
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
      <footer>New member? <a href="reg.php">Register here</a></footer>  
    </form>
  </div>
  </article>
 </main>
  </body>
</html>