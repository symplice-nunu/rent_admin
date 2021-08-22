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
    <title>user edit</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
  if(isset($_SESSION['status']))
  {
    echo "<h4 class='alert alert-success'>".$_SESSION['status']."</h4>";
    unset($_SESSION['status']);
  }
  ?>
 
  <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Enable Or Disable Registered User </h4>
                    </div>
                    <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="user_id" value="<?=$_GET['id'];?>">
                                <div class="form-group mb-3">
                                    <select name="account_disena" required class="form-control">
                                        <option value="">Select Option</option>
                                        <option value="disable">Disable</option>
                                        <option value="enable">Enable</option>
                                    </select>

                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="enabledisable_user_btn" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit and Update Registered User </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                        <?php
                            if(isset($_GET['id']))
                            {
                                $user_id = $_GET['id'];
                                $user = $auth->getUser($user_id);
                            
                            ?>
                          <div class="row">
                              <div class="col-md-6">
                                  <input type="hidden" name="user_id" value="<?=$user_id; ?>">
                              <div class="form-group md-3">
                        <label for="">Full name</label>
                        <input type="text" name="fullname" value="<?=$user->displayName; ?>" class="form-control" id="" required>
                        </div>
                        <div class="form-group md-3">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone"class="form-control" value="<?=$user->phoneNumber; ?>" id="" required>
                        </div>
                        <br>
                        <div class="form-group md-3">
                                        <button type="submit" name="user_edit_update_btn" class="btn btn-primary">Update User</button>
                                        <a href="users-list.php" class="btn btn-danger">BACK</a>
                                    </div>
                              </div>
                          </div>
                          <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>