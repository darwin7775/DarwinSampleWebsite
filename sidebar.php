<?php
ini_set('display_errors',1);	
?>
<html>
<head>
<title>BCI Marikina</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxSaNYLJNA_4qQPuJt2okVK-WrOxBoWps&callback=myMap"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
#side{
text-decoration:none;}

</style>
<body>
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-medium" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" style="margin-top:15px;"onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><b style="color:#ffffff;">BCI Marikina</b> <img style="max-width:70px; margin-top: -1px;"
                     src="../image/bci logo.png"></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
<?php
include('dbcon.php');
include('session.php');
$x = mysqli_real_escape_string($con,$_SESSION['MemberID']);
$data = mysqli_query($con,"Select * from superadmin where MemberID = '$x'") or die (mysqli_connect_error());
$show = (mysqli_fetch_array($data));
if($show['Gender'] = "Male")
{
	$pic = "avatar.png";
}
else
{
	$pic = "girl.png";
}
	
?>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="images/Profile/<?php echo $pic; ?>" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span><strong>
	  <?php
echo mysqli_real_escape_string($con,$show['Firstname']). " " . mysqli_real_escape_string($con,$show['Lastname']);
?></strong></span><br>

      <a href="notification" class="w3-bar-item w3-button" data-toggle="tooltip" data-placement="top" title="Notifications "><i class="fa fa-newspaper-o"></i>
	  <?php
	  include('dbcon.php');
	  $ann = mysqli_query($con,"select count(*) as Pending from announcement where Status = 'Pending'") or die (mysqli_connect_error());
	   $AnnPending = (mysqli_fetch_array($ann));
	  if($AnnPending['Pending'] < 1)
	  {
		  
	  }
	  else
	  {
	 
	  ?>
	    <span class="w3-badge w3-right w3-small w3-blue"><?php 	  echo mysqli_real_escape_string($con,$AnnPending['Pending']);?></span>
	<?php
	  }?></span></a>
      <a href="profile" class="w3-bar-item w3-button" data-toggle="tooltip" data-placement="top" title="Profile"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button" data-toggle="tooltip" data-placement="top" title="Settings"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container w3-blue">
    <h5>Dashboard</h5>
  </div>
 <div class="w3-bar-block w3-grey">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-hide-medium w3-hover-black w3-red" onclick="w3_close()" title="Close Menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="index"  id="side" class="w3-bar-item w3-button w3-padding" title="Home"><i class="fa fa-home fa-fw"></i>  Home</a>
    <a href="events"   id="side" class="w3-bar-item w3-button w3-padding" title="Events"><i class="fa fa-calendar fa-fw"></i>  Events</a>
    <a href="sermons"  id="side" class="w3-bar-item w3-button w3-padding" title="Sermons"><i class="fa fa-headphones fa-fw"></i>  Sermons</a>
    <a href="testimonies"   id="side" class="w3-bar-item w3-button w3-padding" title="Sermons"><i class="fa fa-bookmark fa-fw"></i>  Testimonies</a>
    <a href="camp"  id="side" class="w3-bar-item w3-button w3-padding" title="Members"><i class="fa fa-users fa-fw"></i>  Camp</a>
	<a href="connectus" id="side" class="w3-bar-item w3-button w3-padding" title="Prayer Request"><i class="fa fa-envelope fa-fw"></i>  Connect on Us</a>
    <a href="reports"  id="side" class="w3-bar-item w3-button w3-padding" title="Reports"><i class="fa fa-area-chart fa-fw"></i>  Reports</a>
    <a href="history"  id="side" class="w3-bar-item w3-button w3-padding w3-hide-small" title="History"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="logout" id="side" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i>  Log-out</a><br><br>
  </div>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer; margin-top:10px;" title="close side menu" id="myOverlay"></div>
<script>
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>
<!-- Overlay effect when opening sidebar on small screens -->
</body>
</html>