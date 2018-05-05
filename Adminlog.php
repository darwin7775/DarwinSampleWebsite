<?php
session_start();
?>
<html>

<body>
<?php
include('nav.php');
?>
<div style="margin-top:300px;">
<div class="w3-row">
</div>
<div class="w3-third">
<p style="color:white;">sdfgsfdgfdsgfds</p>
</div>
<div class="w3-third">
<div class="container w3-hide-small w3-hide-medium " style="width:110%; margin-left:-13px;">
<div class="panel panel-danger w3-hide-small w3-hide-medium">
  <div class="panel-body"><p>Account Registration closed after 24 hours Kindly register now BCI Marikina Family <a href="RegistrationForm.php">Register Account</a></p></div>
</div>
</div>
<div class="container w3-hide-large w3-hide-medium" style="margin-top:-200px;">
<div class="panel panel-danger">
  <div class="panel-body"><p style="font-size:19px;">Account Registration closed after 24 hours Kindly register now BCI Marikina Family <a href="RegistrationForm.php">Register Account</a></p></div>
</div>
</div>
<div class="container w3-hide-small w3-hide-large" style="width:110%; margin-left:-13px;">
<div class="panel panel-danger">
  <div class="panel-body"><p>Account Registration closed after 24 hours Kindly register now BCI Marikina Family <a href="RegistrationForm.php">Register Account</a></p></div>
</div>
</div>

<form method="POST">
<div class="w3-container">
<div class="form-group">
<div class="w3-center">
<input class="w3-input" placeholder="Username" name="username" style="width:100%;" type="text"/>
</div>
</div>
<div class="form-group">
<input class="w3-input" placeholder="Password" name="password" style=" width:100%;" type="password"/><br/>
<a href="ForgetPassword.php" style="margin-left:3px;" class="w3-hide-small w3-hide-medium">Forget your Password?</a>
<div class="container w3-hide-large w3-hide-medium">
<a href="ForgetPassword.php" style="margin-left:5px;">Forget your Password?</a>
</div>
</div>
</div>
<br/>
<div class="form-group ">
<div class="w3-center">
<button class="w3-button w3-blue w3-hover-green"  name="Login" style=" width:95%;font-family:arial black; margin-left:2px;">Login</button>
</div>


</div>
</form>
</div>
</div>
<?php
include('SuperAdmin/dbcon.php');
if(isset($_POST['Login']))
{
	$MemberID = mysqli_real_escape_string($con,$_POST['username']);
	$Password = mysqli_real_escape_string($con,$_POST['password']);
	
	$sa = mysqli_query($con,"select * from superadmin where MemberID = '$MemberID' and Password = '$Password'") or die (mysqli_connect_error());
	$saData = (mysqli_num_rows($sa));
	$admin = mysqli_query($con,"select * from members where MemberID = '$MemberID' && Password = '$Password' && Member_Type = 'Admin' OR  MemberID = '$MemberID' && Password = '$Password' && Member_Type = 'SA'") or die (mysqli_connect_error());
		$adminData = (mysqli_num_rows($admin));
	if($saData == 1)
	{
		$_SESSION['MemberID'] = $MemberID;
		echo "<script>window.location='SuperAdmin/index.php'</script>";
		
			}
	elseif($adminData == 1)
		{
			$_SESSION['MemberID'] = $MemberID;
		echo "<script>window.location='Admin/index.php'</script>";
		}
		else
		{
		echo '<script> swal("", "Incorrect Entered Account", "error").then(function(){window.location="login.php"});</script>';
		}
	}
?>
</body>
</html>