<?php include('includes/header.php'); ?>

<?php session_start(); ?>
<div class="container">
<div class="row">
<div class="col-md-12">
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <?php
    unset($_SESSION['status']);
}
?>
</div>
<div class="col-md-12 mt-5">
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th>No</th>
<th>Display</th>
<th>Email</th>
<th>EDIT</th>
<th>DELETE</th>
</tr>
</thead>
<tbody>
    <?php
    include('includes/dbconfig.php');
    $users = $auth->listUsers();
    $i=0;
    foreach ($users as $user) {
        ?>
        <tr>
        <td><?=$i++;?></td>
            <td><?=$user->displayName?></td>
            <td><?=$user->email ?></td>
        </tr>
        <?php
    }
    ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include('includes/footer.php'); ?>