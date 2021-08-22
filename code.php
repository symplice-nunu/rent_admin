<?php 
session_start();
include('dbcon.php');

if(isset($_POST['register_now_btn']))
{
$name = $_POST['fullname'];
$phone = "+25".$_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$userProperties = [
    'email' => $email,
    'emailVerified' => false,
    'phoneNumber' => $phone,
    'password' => $password,
    'displayName' => $name,
];
$createdUser = $auth->createUser($userProperties);
if ($createdUser) {
    $_SESSION['status'] = "User Created Successfully";
    header("Location: register.php");
} else {
    $_SESSION['status'] = "User nOT Created";
    header("Location: register.php");
}

}

if(isset($_POST['enabledisable_user_btn']))
{
    $disena = $_POST['account_disena'];
    $uid = $_POST['user_id'];
    if($disena == "disable")
    {
        $updatedUser = $auth->disableUser($uid);
        $msg = "User A/C is disabled";
    }
    else
    {
        $updatedUser = $auth->enableUser($uid);
        $msg = "User A/C is enabled";

    }

    
    if ($updatedUser) {
        $_SESSION['status'] = "$msg";
        header("Location: user-edit.php?id=$uid");

    } else {
        $_SESSION['status'] = "Something Went Wrong";
        header("Location: user-edit.php?id=$uid");
    }
}


if(isset($_POST['user_edit_update_btn']))
{
    $name = $_POST['fullname'];
    $phone = $_POST['phone'];

    $uid = $_POST['user_id'];
    $properties = [
        'displayName' => $name,
        'phoneNumber' => $phone,
    ];
    $updatedUser = $auth->updateUser($uid, $properties);
    if ($updatedUser) {
        $_SESSION['status'] = "User Updated Successfully";
        header("Location: user-edit.php?id=$uid");

    } else {
        $_SESSION['status'] = "User Not Updated";
        header("Location: user-edit.php?id=$uid");
    }
    
}

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



if(isset($_POST['user_delete_btn']))
{
    $token = $_POST['ref_toke_delete'];

    $uid = $_POST['user_id'];
    try {
        $auth->deleteUser($uid);
        $_SESSION['status']= "User Account Deleted Successfully";
        header("Location: users-list.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['status']= "User Account Not Found";
        header("Location: users-list.php");
        exit();
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