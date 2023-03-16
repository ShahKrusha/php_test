<?php
require_once('../../Controller/UserController.php');
$user = new userController();
$user->register();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://demo.plantpot.works/assets/css/normalize.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/opg3wle.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="password_validation.js"></script>
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
<main>
<?php
      if (isset($_SESSION['success'])) {
  ?>
        <div class="alert alert-danger alert-dismissible fade show form-outline mb-4">
              <h5>Register Successfully !!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
  <?php
        unset($_SESSION['success']);
      }
    ?>
    <form action="RegisterUser.php" method="post" id="form">
        <h1>Register</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label class="form-label" for="password">Password<span class="form-required"> *</span></label>
            <div class="form-element">
              <input id="password" class="form-input" type="password" name="password" placeholder="Enter password" oninput="password_validation()" required>
              <label class="switch">
                <input class="password-toggle" type="checkbox" name="checkbox" onchange="changeType()">
              </label>
            </div>
            <div class="strength"><span class="percentage"></span></div>
            <p id="msg" class="msg">Poor</p>
            <ul class="password-policies">
              <li class="lowercase">Lowercase</li>
              <li class="uppercase">Uppercase</li>
              <li class="numbers">Numbers</li>
              <li class="symbols">Symbols</li>
              <li class="length">At least 12 characters</li>
            </ul>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email"required>
        </div>
        <div>
            <label for="contactno">Contactno:</label>
            <input type="contactno" name="contactno" id="contactno"required>
        </div>
        <div>
            <label for="agree">
                <input type="checkbox" name="agree" id="agree" value="yes"/> I agree
                with the
                <a href="#" title="term of services">term of services</a>
            </label>
        </div>
        <button type="submit" name="submit">Register</button>
        <footer>Already a member? <a href="LoginUser.php">Login here</a></footer>
    </form>
</main>
<script type="text/javascript">
    function changeType() {
  var toggle = document.form.checkbox;
  var password = document.getElementById("password");

  if(toggle.checked) {
    password.setAttribute("type", "text");
  }
  else {
    password.setAttribute("type", "password");
  }
}

function password_validation() {
  var form = document.getElementById("form");
  var password = document.getElementById("password").value;
  var msg = document.getElementById("msg");

  var patternLowercase = /[a-z]/;
  var patternUppercase = /[A-Z]/;
  var patternNumbers = /[\d]/;
  var patternSymbols = /[!-/:-@[-`{-~]/;

  var length = document.getElementsByClassName("length");
  var lowercase = document.getElementsByClassName("lowercase");
  var uppercase = document.getElementsByClassName("uppercase");
  var numbers = document.getElementsByClassName("numbers");
  var symbols = document.getElementsByClassName("symbols");

  if(password.length >= 12) {
    length[0].classList.add("active");
  }
  else {
    length[0].classList.remove("active");
  }

  if(patternLowercase.test(password)) {
    lowercase[0].classList.add("active");
  }
  else {
    lowercase[0].classList.remove("active");
  }

  if(patternUppercase.test(password)) {
    uppercase[0].classList.add("active");
  }
  else {
    uppercase[0].classList.remove("active");
  }

  if(patternNumbers.test(password)) {
    numbers[0].classList.add("active");
  }
  else {
    numbers[0].classList.remove("active");
  }

  if(patternSymbols.test(password)) {
    symbols[0].classList.add("active");
  }
  else {
    symbols[0].classList.remove("active");
  }

  var active = document.getElementsByClassName("active");
  var percentage = document.getElementsByClassName("percentage");
  percentage[0].setAttribute("style", "width: " + active.length/5*100 + "%");

  if(active.length <= 1) {
    msg.innerHTML = "Poor";
  }
  else if(active.length == 2) {
    msg.innerHTML = "Weak";
  }
  else if(active.length == 3) {
    msg.innerHTML = "Midium";
  }
  else if(active.length == 4) {
    msg.innerHTML = "Good";
  }
  else {
    msg.innerHTML = "Strong";
  }
}
</script>
</body>
</html>