<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "contacts_app";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){           
     die("Server connect error!!!");        
  }
?>