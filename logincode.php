<?php
session_start();
include('dbcon.php');

if(isset($_POST['login_now_btn']))
{
    $email = $_POST['email'];
    $clearTextPassword = $_POST['password'];

    try{
        $user = $auth->getUserByEmail("$email");

        $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
        $idTokenString = $signInResult->idToken();

        try{
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
            $uid = $verifiedIdToken->claims()->get('sub');

            $_SESSION['verified_user_id'] = $uid;
            $_SESSION['idTokenString'] = $idTokenString;

            $_SESSION['status'] = "You are logged in Successfully";
            header("Location: inde.php");
            exit();

        }catch(InvalidToken $e){
            echo 'The token is invalid: '.$e->getMessage();
            $_SESSION['status'] = "Token Invalid/Expired. login Again";
            header("Location: logout.php");
        exit();
        }catch(\InvalidArgumentException $e){
            echo 'The token could not be parsed: '.$e->getMessage();
            
        }

    }catch(\Kreait\Firebase\Exception\Auth\UserNotFound $e){

        $_SESSION['status'] = "Email is Incorrect";
        header("Location: login.php");
        exit();
    }
}
?>