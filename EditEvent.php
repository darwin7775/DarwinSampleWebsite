<html>
<head>
</head>
<body class="w3-light-grey">
<?php
include('sidebar.php');
include('dbcon.php');
  $data = $_GET['id'];
  $d = mysqli_query($con,"select * from events where EventID = '$data'") or die(mysqli_connect_error());
  $row=(mysqli_fetch_array($d));
?>
<div class="w3-main" style="margin-left:300px; margin-top:60px;">
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-calendar"></i> Events</b></h5>
  </header>
  
<div class="panel-body">
<form method="POST" enctype="multipart/form-data" autocomplete="off">
<div class="w3-row">
<div class="w3-quarter">
<p class="w3-center"><strong>Banner</strong></p>
<img src="Images/Events/<?php echo $row['Banner']; ?>"  style="width:100%; height:30%;" id="banner">
<div class="panel panel-info" style="margin-top:10px;">
<div class="panel-body">
    <p style="15px;" class="w3-center"><strong>Upload Image:</strong></p>
    <input type="file" class="w3-light-grey"  onchange="readURL(this);" name="fileToUpload" id="fileToUpload"  style="width:290px;"><br/>
	</div>
</div>
</div>
<p class="w3-center" style="font-size:25px;"><strong>Event Information</strong></p>
<div class="w3-third" style="margin-left:10px; margin-top:10px;">
<div class="form-group">
<label>Event Name</label>
<input type="text" name="EventName" required placeholder="Event Name" id="Eventname" maxlength="70" class="form-control" value ="<?php echo $row['EventName'];?>" style="width:300px;"/><br/>
</div>
<div class="form-group">
<label>Details</label>
<textarea type="text" name="Details" placeholder="Details" required id="description" maxlength="3000" class="form-control" rows="7"style="width:350px;"><?php echo $row['Details'];?></textarea>
</div>
<div class="w3-row">
<div class="w3-half">
<div class="form-group">
<label>Start Date</label>
<input type="date" name="Start_Date" id="startdate" required  value="<?php echo $row['SDate']; ?>" placeholder="Start Date" class="form-control" style="width:165px;"/>
</div>
</div>
<div class="w3-half">
<div class="form-group">
<label>End Date</label>
<input type="date" id="enddate" name="End_Date" placeholder="End Date" value="<?php 
if(empty($row['FDate']))
{
	echo "mm/dd/yyyy";
}
else
{
	echo $row['FDate'];
}
?>"
 class="form-control" style="width:175px;"/>
</div>
</div>
</div>
</div>
<div class="w3-third">
<div class="form-group">
<label>Time Span</label>
<input type="text" name="Time"  placeholder="Time" required value="<?php echo $row['Time'];?>" id="Time" class="form-control" maxlength="30" style="width:300px;"/>
</div>
<div class="form-group">
<label>Location</label>
<input type="text" name="location" required value="<?php echo $row['Location'];?>" placeholder="Venue" class="form-control" maxlength = "70" style="width:300px;"/>
</div>
<div class="form-group">
<label>Address</label>
<input type="text" name="Address" required value="<?php echo $row['address'];?>" placeholder="Venue" class="form-control" maxlength = "70" style="width:300px;"/>
</div>

<button class="w3-button w3-green w3-hover-blue" disabled style="padding:11px 35px; border-radius:10px;" name="submit" id ="submit"><i class="fa fa-check"></i> Update</button>
	<a href="javascript:history.back()" class="w3-button w3-grey w3-hover-blue" style="padding:11px 35px; border-radius:10px; text-decoration:none;">Back</a>
		 
</form>
	<div class="alert alert-info" style="margin-top:15px;">
	<div class="w3-row">
	<div class="w3-twothird">
	  <p ><i class="fa fa-info-circle" style="font-size:41px;"></i> Hi as super admin kindly check your updated input for this event.</p>
	  </div>
	  <div class="w3-quarter">
		<p><strong>Capcha</strong></p>
		<a style="margin-left:10px; border-radius:10px; text-decoration:none;" class="w3-button w3-green w3-hover-blue" id="capt" onclick="Activate()"><i class="fa fa-gavel"></i> Click Me</a>
	  </div>
	</div>
	</div>

</div>


</div>
<?php
if(isset($_POST['submit']))
{
	$id = $_GET['id'];
	$EventName=mysqli_real_escape_string($con,$_POST['EventName']);
$Details = mysqli_real_escape_string($con,$_POST['Details']);
$Start = mysqli_real_escape_string($con,$_POST['Start_Date']);
$End = mysqli_real_escape_string($con,$_POST['End_Date']);
$Time= mysqli_real_escape_string($con,$_POST['Time']);
$Location = mysqli_real_escape_string($con,$_POST['location']);
$add = mysqli_real_escape_string($con,$_POST['Address']);
$current = date("Y-m-d");
$x = $_SESSION['MemberID'];
$banner = $_FILES['fileToUpload']['name'];
if(empty($_FILES['fileToUpload']['name']))
{
	mysqli_query($con,"Update events set EventName ='$EventName', Details ='$Details', SDate='$Start', FDate='$End', Time = '$Time', Location = '$Location', address = '$add' where EventID = '$id'")or die(mysqli_connect_error());
							mysqli_query($con,"insert into logs (MemberID, Title, Process_Date, Action) values ('$x', '$EventName', '$current','Edit')") or die(mysqli_connect_error());
						echo '<script> swal("Complete!", "Event have been updated", "success").then(function(){window.location="events.php"});</script>';
}
else{	

$target = "Images/Events/".basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
   echo '<script> swal("Not Supported!", "Images only", "error");</script>';
}
else
{
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"Images/Events/".$_FILES["fileToUpload"]["name"]);	
		mysqli_query($con,"Update events set Banner = '$banner', EventName ='$EventName', Details ='$Details', SDate='$Start', FDate='$End', Time = '$Time', Location = '$Location', address = '$add' where EventID = '$id'")or die(mysqli_connect_error());
			mysqli_query($con,"insert into logs (MemberID, Title, Process_Date, Action) values ('$x', '$EventName', '$current','Edit')") or die(mysqli_connect_error());
						echo '<script> swal("Complete!", "Event have been updated", "success").then(function(){window.location="events.php"});</script>';
}
}
}
?>
</body>
<script>
function Activate(){
document.getElementById('submit').disabled = false;
}
</script>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#banner').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</html>