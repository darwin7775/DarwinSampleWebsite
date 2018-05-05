<html>
<head>
</head>
<body class="w3-light-grey">
<?php
include('sidebar.php');

?>
<div class="w3-main" style="margin-left:300px;margin-top:60px;">
<?php
include('dbcon.php');
$ID = mysqli_real_escape_string($con,$_GET['id']);
$data = mysqli_query ($con,"select * from testimonies where TestimonyID = '$ID'") or die (mysqli_connect_error());
$row = mysqli_fetch_array($data);

?>
<br/>
<?php
if($row['Testimony_Status'] == "Private")
{
?>
<div class="alert alert-info w3-content" style="max-width:1000px;">
<p class="w3-xlarge w3-center"><i class="fa fa-lock"></i> This testimony is Private</p>
</div>
<?php
}
else
{
}
?>
<div class="panel panel-success w3-content" style="margin-top:3%; max-width:1250px; padding:3% 3%;">
<p class="w3-xlarge"><b>Information</b></p>
<p><b>Email Address:</b> <?php echo $row['EmailAdd'];?></p>
<p><b>Name:</b> <?php echo $row['Name'];?></p>
<p><b>Date Shared:</b> <?php echo $row['Date_Posted'];?></p>
<p><b>This testimony is about:</b> <?php echo $row['Testimony_About'];?></p>
<div id="testimony" style="margin-top:3%;">
<p class="w3-center w3-large"><b><?php  if(empty($row['Testimony_Title']))
{
	echo "Ask for Title";
}
else
{
	echo $row['Testimony_Title'];
}?></b></p>
<pre class="w3-white w3-border-white" style="font-family:arial;"><?php echo $row['Testimony'];?></pre>
</div>
<?php
if($row['Testimony_Status'] == "Ask Me")
{
?>
<a class="w3-button w3-green w3-hover-blue" style="padding: 17px 17px; border-radius:10px; text-decoration:none;"><i class="fa fa-check"></i> Confirm</a>
<?php
}
else
{
}
?>
<a class="w3-button w3-grey w3-hover-blue" style="padding: 17px 17px; border-radius:10px; text-decoration:none;" href="testimonies"><i class="fa fa-return"></i> Back</a>
</div>
</div>

</body>
</html>