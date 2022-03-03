<?php 
  session_start();
  if(isset($_SESSION['loginid'])){
    header("location: contacts_home.php");
  }
  else{
    header("location: sign_in.php");
  }
?>