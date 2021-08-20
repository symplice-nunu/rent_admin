<?php

session_start();
include('dbcon.php');

use Firebase\Auth\Token\Exception\InvalidToken;

if (isset($_SESSION['verified_user_id'])) {

    $uid = $_SESSION['verified_user_id'];
    $idTokenString = $_SESSION['idTokenString'];
   

        try{
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
        }catch(InvalidToken $e){
            echo 'The token is invalid: '.$e->getMessage();
            $_SESSION['status'] = "Token Invalid/Expired. login Again";
            header("Location: logout.php");
            exit();
        }catch(\InvalidArgumentException $e){
            echo 'The token could not be parsed: '.$e->getMessage();
            
        }
      
    
} else {
    $_SESSION['status'] = "Login first to use this system";
    header("Location: index.php");
    exit();
}


?>