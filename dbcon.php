<?php
   require __DIR__.'/vendor/autoload.php';

   use Kreait\Firebase\Factory;
   use Kreait\Firebase\Auth;
   $factory = (new Factory)
       ->withServiceAccount('house-6dc86-firebase-adminsdk-vq03s-c5b8cc16e9.json')
       ->withDatabaseUri('https://house-6dc86-default-rtdb.firebaseio.com/');

   $database = $factory->createDatabase();
   $auth = $factory->createAuth();

?>