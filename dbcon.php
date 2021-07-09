<?php
   require __DIR__.'/vendor/autoload.php';

   use Kreait\Firebase\Factory;
   $factory = (new Factory)
       ->withServiceAccount('rtotest-891ba-firebase-adminsdk-wjm71-e8478cdd7c.json')
       ->withDatabaseUri('https://rtotest-891ba-default-rtdb.firebaseio.com/');

   $database = $factory->createDatabase();

?>