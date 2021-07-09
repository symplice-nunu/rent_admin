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
<th>Id</th>
<th>Username</th>
<th>Email</th>
<th>Phone Number</th>
<th>EDIT</th>
<th>DELETE</th>
</tr>
</thead>
<tbody>
<?php 
include('includes/dbconfig.php');
$ref = "contact/";
$fetchdata = $database->getReference($ref)->getValue();
$i = 0;
if ($fetchdata > 0) {
    # code...

foreach($fetchdata as $key => $row)
{

$i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phoneno']; ?></td>
<td> <a href="edit.php?token=<?php echo $key ?>" class="btn btn-primary">Edit</a> </td>

<td> 
<form action="code.php" method="post">
<input type="hidden" name="ref_toke_delete" value="<?php echo $key; ?>">
<button type="submit" name="delete_data" class="btn btn-danger">Delete</button>
</form></td>
</tr>
<?php 
}
}
else
{
?>
<tr>
<td colspan="6">Data Not Available in the Database</td>
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