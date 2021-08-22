<?php
include('authentication.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
            
            <?php
  if(isset($_SESSION['status']))
  {
    echo "<h4>".$_SESSION['status']."</h4>";
    unset($_SESSION['status']);
  }
  ?>
 
                <div class="card">
                    <div class="card-header">
                        <h4>Register New User</h4>


                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                        <div class="form-group md-3">
                        <label for="">Full name</label>
                        <input type="text" name="fullname" class="form-control" id="" required>
                        </div>
                        <div class="form-group md-3">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone"class="form-control" id="" required>
                        </div>
                        <div class="form-group md-3">
                        <label for="">Email Address</label>
                        <input type="email" name="email" class="form-control" id="" required>
                        </div>
                        <div class="form-group md-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" id="" required>
                        </div><br />
                        <div class="form-group md-3">
                        <button type="submit" name="register_now_btn" class="btn btn-primary">Register Now</button>
                        <a href="users-list.php" class="btn btn-danger">BACK</a>
                        </div>
                        <div class="form-group md-3">
                        </div> 
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>