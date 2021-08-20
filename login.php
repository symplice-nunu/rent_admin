

<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">

    <title>َLogin</title>

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
<form class="box" action="logincode.php" method="post" style="background-color: lightskyblue;">

  <h1>Login</h1>

  <input type="text" name="email" placeholder="Email">

  <input type="password" name="password" placeholder="Password">

  <input type="submit" name="login_now_btn" value="Login">

</form>

  </body>

</html>