<?php include('includes/header.php'); ?>



<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 mt-4">
<h3 align="center">Register House</h3>
<form action="code.php" method="POST">
<div class="form-group">
<label for="exampleInputEmail1" class="form-label">House Image</label>
<input type="text" name="imageUrl" class="form-control" placeholder="Enter House Image(URL)">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="form-label">House ID</label>
<input type="text" name="ehouseno" class="form-control" placeholder="Enter House ID" >
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="form-label">Village</label>
<input type="text" name="villagename" class="form-control"  placeholder="Enter Village Name"  >
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="form-label">Location</label>
<input type="text" name="houselocation" class="form-control" placeholder="Enter House Location"  >
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="form-label">Room(s)</label>
<input type="number" name="roomno" class="form-control" placeholder="Enter Number of Rooms"  >
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="form-label">Price</label>
<input type="number" name="price" class="form-control" placeholder="Enter Price" >
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="form-label">Saloon(s)</label>
<input type="number" name="saloonno" class="form-control" placeholder="Enter Number of Saloon(s)"  >
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="form-label">Kitchen(s)</label>
<input type="number" name="kitchenno" class="form-control" placeholder="Enter Number of Kitchen(s)"  >
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="form-label">Toilet and Bathroom(s)</label>
<input type="number" name="tbno" class="form-control" placeholder="Enter Number of Toilet and Bathroom(s)"  >
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="form-label">House Description(s)</label>
<input type="text" name="housedescription" class="form-control" placeholder="Enter Number of House Description(s)"  >
</div>
<div class="form-group">
<button type="submit" name="save_push_data" class="btn btn-primary btn-block">Save House</button>
</div>
</form>
</div>
</div>
</div>

<?php include('includes/footer.php'); ?>