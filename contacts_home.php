<?php 
  session_start();
  if(isset($_SESSION['loginid'])){
  }
  else{
    header("location: sign_in.php");
  }
?>

<?php
if(isset($_POST['SAVE'])){
include('sql_config.php');

$contact_first_name = $_POST['fname'];
$contact_last_name = $_POST['lname'];
$contact_mobile_number = $_POST['mobile_number'];
$contact_email = $_POST['email'];
$user_email = $_SESSION['loginid'];

$sqll = "INSERT INTO contacts (u_email, contact_fname, contact_lname, contact_number, contact_email) VALUES ('$user_email', '$contact_first_name', '$contact_last_name', '$contact_mobile_number', '$contact_email')";

if(mysqli_query($conn, $sqll)){
    echo '<script>alert("Contact saved sucessfully.");window.location.href= "contacts_home.php";</script>';
} 
else{
    echo '<script>alert("Error saving the contact.");window.location.href= "contacts_home.php";</script>';
}
}
?>

<?php include('header.php'); ?>
<html>
<head>
</head>
<body>
  <div class="wrapper">
    <section class="form login">
<section class="users">
<header>
      <h5> Save Contacts Form </h5>
	  <a href='logout.php' class="logout">Logout</a>
</header>
</section>
<form action="contacts_home.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="field input">
			<label for="contact_name">Contact Name</label>
			<label for="contact_first_name">First Name:</label>
			<input type="text" name="fname" placeholder="first name" maxlength="15" required>
        </div>
        <div class="field input">
			<label for="contact_last_name">Last Name:</label>
			<input type="text" name="lname" placeholder="last name" maxlength="15" required>
        </div>
        <div class="field input">
			<label for="contact_number">Contact Number:</label>
			<input type="tel" name="mobile_number" placeholder="9191959460" pattern="[0-9]{10}" required>
        </div>
        <div class="field input">
			<label for="contact_email_id">Contact E-mail Id:</label>
			<input type="text" name="email" placeholder="example@email.com" maxlength="50" required>
        </div>
        <div class="field button">
			<input type="submit" name="SAVE" value="SAVE" >
		</div>
</form>


<h2 align="center"> My Contacts </h2>

<table border="1" cellpadding="3" cellspacing="0" align="center">
	<?php 
	include('sql_config.php');

    $user_email = $_SESSION['loginid'];

	$sql = "select * from contacts where u_email = '$user_email'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) <= 0){
		echo 'No Contacts to display';
	}
	else{
		if (mysqli_num_rows($result) > 0){

		echo "<td bgcolor='black'> <span style='font-weight:bold;color:white;'> Name </span> </td>";
		echo "<td bgcolor='black'> <span style='font-weight:bold;color:white;'> PH NO </span> </td>";
		echo "<td bgcolor='black'> <span style='font-weight:bold;color:white;'> Email </span> </td>";

			$i = 1;
			while($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>".$row['contact_fname']." ".$row['contact_lname']."</td>"."<td>".$row['contact_number']."</td>"."<td>".$row['contact_email']."</td>";
				$i = $i + 1;
			}
		echo "</tr>";
		}
	}
	?>
</table><br></br>

</body>
</html>