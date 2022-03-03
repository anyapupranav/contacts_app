<?php 
  session_start();
  if(isset($_SESSION['loginid'])){
    header("location: contacts_home.php");
  }
?>

<?php
if(isset($_POST['SIGN-IN'])){
include('sql_config.php');
$loginid = $_POST['email'];
$password = $_POST['password'];

$hashed_password = hash("sha512", $password);

$sql = "SELECT * FROM `contacts_app`.`users` WHERE `user_email`='$loginid' and `user_password`='$hashed_password'";
$result=mysqli_query($conn, $sql);
    
    if($result->num_rows == 1){
        echo '<script>alert("You Have Successfully Logged in.")</script>';
        session_start();
        $_SESSION['loginid'] = $loginid;
        header("location: contacts_home.php");
    }
    else{
        die('<script>alert("Invalid username or password.")</script>');
    }
}
?>




<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header> SIGN-IN FORM </header>
      <form action="sign_in.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>E-mail Id:</label>
          <input type="text" name="email" placeholder="example@email.com" maxlength="50" required>
        </div>
        <div class="field input">
          <label>Password:</label>
          <input type="password" name="password" placeholder="Password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="SIGN-IN" value="submit">
        </div>
      </form>
      <div class="link">Don't have an account? <a href="sign_up.php">create here</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/sign_in.js"></script>

</body>
</html>