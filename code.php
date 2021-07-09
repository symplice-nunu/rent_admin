<?php 
session_start();
include('dbcon.php');

if(isset($_POST['save_push_data']))
{
    $houseid = $_POST['ehouseno'];
    $village = $_POST['villagename'];
    $location = $_POST['houselocation'];
    $roomno = $_POST['roomno'];
    $price = $_POST['price'];
    $saloonno = $_POST['saloonno'];
    $image = $_POST['imageUrl'];
    $kitchen = $_POST['kitchenno'];
    $tbno = $_POST['tbno'];
    $housedescription = $_POST['housedescription'];

    $data = [
        'ehouseno' => $houseid,
        'villagename' => $village,
        'houselocation' => $location,
        'roomno' => $roomno,
        'price' => $price,
        'saloonno' => $saloonno,
        'imageUrl' => $image,
        'kitchenno' => $kitchen,
        'tbno' => $tbno,
        'housedescription' => $housedescription
    ];

    $ref = "houses/";
    $postdata = $database->getReference($ref)->push($data);

    if ($postdata) {
        $_SESSION['status'] = "Data Inserted Successfully";
        header("Location: houses.php");
    } else {
        $_SESSION['status'] = "Data Not Inserted. Something went wrong.!";
        header("Location: houses.php");
    }
    
}
if(isset($_POST['update_data']))
{
    $houseid = $_POST['ehouseno'];
    $village = $_POST['villagename'];
    $location = $_POST['houselocation'];
    $roomno = $_POST['roomno'];
    $price = $_POST['price'];
    $saloonno = $_POST['saloonno'];
    $image = $_POST['imageUrl'];
    $token = $_POST['token'];

    $data = [
        'ehouseno' => $houseid,
        'villagename' => $village,
        'houselocation' => $location,
        'roomno' => $roomno,
        'price' => $price,
        'saloonno' => $saloonno,
        'imageUrl' => $image
    ];

    $ref = "houses/".$token;
    $postdata = $database->getReference($ref)->update($data);

    if ($postdata) {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: houses.php");
    } else {
        $_SESSION['status'] = "Data Not Updated. Something went wrong.!";
        header("Location: houses.php");
    }
    
}




if(isset($_POST['delete_data']))
{
    $token = $_POST['ref_toke_delete'];

    $ref = "houses/".$token;
    $deleteData = $database->getReference($ref)->remove();

    if ($deleteData) {
        $_SESSION['status'] = "Data Deleted Successfully";
        header("Location: houses.php");
    } else {
        $_SESSION['status'] = "Data Not Deleted. Something went wrong.!";
        header("Location: houses.php");
    }
    
}

?>