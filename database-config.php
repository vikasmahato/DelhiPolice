<?php
   // define database related variables
   $database = 'jasola';
   $host = 'localhost';
   $user = 'root';
   $pass = 'ghHYGb46889.gh';

   // try to conncet to database
   $dbh = new PDO("mysql:dbname={$database};host={$host}", $user, $pass);


   if(!$dbh){

      echo "unable to connect to database";
   }
  
?>
