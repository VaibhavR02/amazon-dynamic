<?php

// $servername="localhost";
// $username="root";
// $password="Root@123";
// $database="ecommerse";

// $connection= new mysqli($servername, $username , $password , $database);
// if(!$connection ){
//     die("Connection failed :".$connection->connect_error);

// }


$connection=mysqli_connect('localhost','root','Root@123','ecommerse');
if(!$connection ){
        die(mysqli_error($connection));
        
     }
   
?>