<html>
<head>
    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<body class="w3-light-grey">
<?php
include('sidebar.php');
?>
<?php
// echo date('F Y j', strtotime('15-January-2009'));
?>
<div class="w3-main" style="margin-left:300px; margin-top:60px;">
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-calendar"></i> Events</b></h5>
  </header>

  <div class="w3-cotainer w3-margin-bottom" style="margin-left:13px;">
  <div class="panel panel-default">
  <div class="panel-body">
  <div class="w3-row">
  <div class="w3-quarter">
  <h3 style="font-family:arial; margin-bottom:15px;" class="w3-center"><strong>Banner</strong></h3>
  <img src="images/Events/logo.jpg" id="banner" style="width:100%" >
  
  </div>
  <div class="w3-third" style="margin-left:15px;">
  
    <form  method="post" enctype="multipart/form-data" autocomplete="off">
    <p style="15px;"><strong>Upload Image:</strong></p>
    <input type="file" class="w3-light-grey"  onchange="readURL(this);" name="fileToUpload" id="fileToUpload"><br/>
	
	<textarea type="text" name="Details" placeholder="Details" required id="description" maxlength="3000" class="form-control" rows="7"style="width:350px;"/></textarea><br/>
	<input type="text" name="EventName" required placeholder="Event Name" id="Eventname" maxlength="70" class="form-control" style="width:300px;"/><br/>
	<div class="w3-row">
	<div class="w3-half">
	<p><strong>Start Date</strong></p>
	<input type="date" name="Start_Date" id="startdate"  required placeholder="Start Date" class="form-control"/>
	</div>
	<div class="w3-half">
		<p><strong>End Date</strong></p>
	<input type="date" id="enddate" name="End_Date" placeholder="End Date" class="form-control" /><br/>
	</div>
	</div>
		<input type="text" name="Time" required placeholder="Time" id="Time" class="form-control" maxlength="30" style="width:175px;"/><br/>
		<input type="text" name="amount"  placeholder="Any Event Fee?" id="amount" onkeypress="return isNumberKey(event)" class="form-control" maxlength="9" style="width:175px;"/><br/>

	<input type="text" name="location" required placeholder="Venue" class="form-control" maxlength = "70" style="width:300px;"/><br/>
	<input type="text" name="Address" required placeholder="Address" class="form-control" maxlength = "70" style="width:300px;"/><br/>
	<input type="text" name="PB" required placeholder="Passed By" id = "PB" class="form-control" maxlength = "70" style="width:300px;"/><br/>
	<div id="message" style="display:none;" class="alert alert-info">
	<p>Kindly ask and use his/her MemberID for this portion</p>
	</div>
	<input type="text" name="AB" required placeholder="Approved By" class="form-control" maxlength = "70" style="width:300px;"/><br/>
    <button class="w3-button w3-green w3-hover-blue" style="border-radius:10px; padding:14px 40px;" type="submit" name="submit"><i class="fa fa-upload"></i> Upload</button>
	</form>
	</div>
	<div class="w3-third">
	<div class="alert alert-info">
	  <p style="font-size:21px;"><i class="fa fa-info-circle" style="font-size:41px;"></i> If we upload an event make sure you have been ask our pastors about it, Kindly inform our report team for making the report
	  of event.</p>
	</div>
	</div>
	</div>
  </div>
  <div class="w3-quarter">
  </div>
  </div>
  </div>
  </div>
  </div>
</div>
<?php
include('dbcon.php');

		


if(isset($_POST['submit']))
{
	
		$EventName=mysqli_real_escape_string($con,$_POST['EventName']);
$Details = mysqli_real_escape_string($con,$_POST['Details']);
$Start = mysqli_real_escape_string($con,$_POST['Start_Date']);
$End = mysqli_real_escape_string($con,$_POST['End_Date']);
$Time= mysqli_real_escape_string($con,$_POST['Time']);
$Location = mysqli_real_escape_string($con,$_POST['location']);
$add = mysqli_real_escape_string($con,$_POST['Address']);
$Approved = mysqli_real_escape_string($con,$_POST['AB']);
$fee = mysqli_real_escape_string($con, $_POST['amount']);
$Passed = mysqli_real_escape_string($con,$_POST['PB']);
$x = $_SESSION['MemberID'];
$current = date("Y-m-d");
$target = "Images/Events/".basename($_FILES["fileToUpload"]["name"]);
$banner = $_FILES['fileToUpload']['name'];
	$imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));

	if(empty($banner))
	{
		echo '<script> swal("Failed!", "No Image Available", "error");</script>';
	}		
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
   echo '<script> swal("Failed!", "Images only", "error");</script>';
}
else
{
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"Images/Events/".$_FILES["fileToUpload"]["name"]);	
		mysqli_query($con,"Insert into events(Banner, EventName, Details, Event_Fee, SDate, FDate, Time, Location, address,Passed_by,Approved_by,Date_Approved, Event_Status)
						values ('$banner', '$EventName', '$Details','$fee', '$Start', '$End', '$Time', '$Location', '$add', '$Passed', '$Approved','$current','Upcoming')")or die(mysqli_connect_error());
						mysqli_query($con,"insert into logs (MemberID, Title, Process_Date, Action) values ('$x', '$EventName', '$current','Add')") or die(mysqli_connect_error());
							echo '<script> swal("Complete!", "New Event has been uploaded", "success");</script>';
}
}
?>
</body>
<script>
var myInput = document.getElementById("PB");
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}
</script>
<script>
     function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
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