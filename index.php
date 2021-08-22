
<?php

session_start();
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">

    <title>َLogin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
    

    <link rel="stylesheet" href="login.css">

  </head>

  <body style="background-color: teal;">

  <div class="col-md-4">
  <?php
  if(isset($_SESSION['status']))
  {
    echo "<h4 class='alert alert-success'>".$_SESSION['status']."</h4>";
    unset($_SESSION['status']);
  }
  ?>
</div>
<form class="box" onsubmit="return validate();" action="logincode.php" method="post" style="background-color: lightskyblue;">

  <h1>Login</h1>
  <div id="error_message"></div>
  <input type="text" name="email" id="email" placeholder="Email">

  <input type="password" name="password" id="password" placeholder="Password">

  <input type="submit" name="login_now_btn" value="Login">

</form>
<script>
  function validate() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    



    var error_message = document.getElementById("error_message");

    error_message.style.padding = "10px";

    var text;
    
if(email.indexOf("@") == -1 || email.length < 6){
    text = "Please Enter valid Email";
    error_message.innerHTML = text;
    return false;
  }
if (password.length < 5) {
        text = "Please Enter valid Password.";
        error_message.innerHTML = text;
        return false;
    }
  
    return true;
}
</script>
  </body>

</html>