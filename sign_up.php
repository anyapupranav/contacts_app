<?php 
  session_start();
  if(isset($_SESSION['loginid'])){
    header("location: contacts_home.php");
  }
?>

<?php
if(isset($_POST['SIGN-UP'])){
include('sql_config.php');

$signid = $_POST['email'];
$password = $_POST['password'];
$secrect_code = $_POST['secrect_code'];
 
$hashed_password = hash("sha512", $password);
$hashed_secrect_code = hash("sha512", $secrect_code);

$sql = "INSERT INTO users (user_email, user_password, secrect_code) VALUES ('$signid', '$hashed_password', '$hashed_secrect_code')";

if(mysqli_query($conn, $sql)){
    echo '<script>alert("successfully Created the account.");window.location.href= "sign_in.php";</script>';
} 
else{
    die('<script>alert("Error creating the account.");window.location.href= "sign_up.php";</script>');
}
}
?>

<?php include('header.php'); ?>
<html>
<head>
</head>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>SIGN UP FORM</header>
      <form action="sign_up.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>E-mail Id:</label>
          <input type="text" placeholder="example@email.com" name="email" maxlength="50" required>
        </div>
        <div class="field input">
          <label>Password:</label>
          <input type="password" placeholder="Password" name="password" maxlength="128" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field input">
          <label>Secrect Code:</label>
          <input type="password" placeholder="secrect code" name="secrect_code" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="SIGN-UP" value="submit">
        </div>
      </form>
      <div class="link">Already have an account? <a href="sign_in.php">Sign in</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>

</body>
</html>