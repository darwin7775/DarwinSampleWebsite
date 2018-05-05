<html>
<head>
</head>
<body class="w3-light-grey">
<?php
include('sidebar.php');
?>
 
<div class="w3-main" style="margin-left:300px; margin-top:60px;">
 <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-calendar"></i> Events</b></h5>
  </header>
  <div class="w3-row">
    <p style="margin-left:10px;"><a href="pastevent.php">Past Events</a> -|- <a href="events.php">Events for Month</a> -|- <a href="upcomingevents.php">Upcoming Events</a></p>

  <div class="w3-blue w3-container" style="border-radius:8px; margin-left:10px; ">
  <h1 style="font-family: 'Times New Roman', Times, serif;" >Up Coming Events</h1>
  </div>
  <div class="w3-twothird" style="padding-right:10px;">
<br/>
<div class="w3-row">
<div class="w3-third">
  <form method="GET" action="SortUpcomingEvents.php">
  <div class="form-group" style="margin-left:10px;">
  <select class="form-control" onchange="change()" name="month" id="sel">
  <option selected disabled>Select Month</option>
    <option value="01">January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
	<option value="05">May</option>
	<option value="06">June</option>
	<option value="07">July</option>
	<option value="08">August</option>
	<option value="09">September</option>
	<option value="10">October</option>
	<option value="11">November</option>
	<option value="12">December</option>
  </select>
</div>
</div>
<div class="w3-quarter" style="margin-left:10px;">
<button class="w3-button w3-green" id="search" disabled style="border-radius:8px;"><i class="fa fa-search"></i> Search</button>
</div>
</div>
  </form>
<div class="w3-row-padding" style="height:90%; overflow: auto; margin-top:10px;">
	<?php
include('dbcon.php');

$current = date("Y-m-d");
$a = date_create($current);
$date = date_format($a,"m");
$s = "SDate";

$data = mysqli_query($con,"Select * from events where SDate > '$current' and Event_Status != 'Canceled' Order by SDate ASC ") or die(mysqli_connect_error());
$count = (mysqli_num_rows($data));
if($count < 1)
{
	?>
		<div class="alert alert-info">
<p class="w3-xlarge"><i class="fa fa-info-circle"></i> Wait for Updates</p>
</div>
<?php
}
else
{
while($row = mysqli_fetch_array($data))
{
	$id = $row['EventID'];
	 $date = date_create($row['SDate']);
?>
    <div class="w3-third w3-container w3-margin-bottom">
     <img src="Images/Events/<?php echo $row['Banner'];?>" style="width:100%; height:25%;" class="w3-hover-opacity w3-hide-medium w3-hide-small">
	  <img src="Images/Events/<?php echo $row['Banner'];?>" style="width:100%; height:45%;" class="w3-hover-opacity w3-hide-medium w3-hide-large">
	   <img src="Images/Events/<?php echo $row['Banner'];?>" style="width:100%; height:10%;" class="w3-hover-opacity w3-hide-small w3-hide-large">
      <div class="w3-container w3-blue">
        <p class="w3-center w3-hide-medium" style="padding-left:10px; padding-top:10px; font-size:20px;"><strong><?php echo $row['EventName'];?></strong></p>
		 <p class="w3-center w3-hide-large w3-hide-small" style="padding-left:10px; padding-top:10px; font-size:10px;"><strong><?php echo $row['EventName'];?></strong></p>
		<div class="w3-row">
		<div class="w3-half">
		<div class="w3-center">
		<p style="font-size:50px; font-family:'Arial Black', Gadget, sans-serif;" class="w3-hide-medium"><?php echo date_format($date,"d"); ?></p>
		<p style="font-size:25px; font-family:'Arial Black', Gadget, sans-serif;" class="w3-hide-large w3-hide-small"><?php echo date_format($date,"d"); ?></p>
		</div>
		</div>
		<div class="w3-half">
		<p style="padding-top:15px; font-size:21px;" class="w3-hide-medium"><strong><?php echo date_format($date,"F");?></strong></p><br/>
			<p style="margin-top:-20px; font-size:17px;" class="w3-hide-large w3-hide-small"><strong><?php echo date_format($date,"F");?></strong></p><br/>
        <p class="w3-hide-medium"><b><?php echo $row['Location']; ?></b></p>
		<p class="w3-hide-large w3-hide-small" style="font-size:13px; margin-top:-15px;"><b><?php echo $row['Location']; ?></b></p>
		        <p class="w3-hide-medium"><b><?php echo $row['address']; ?></b></p>
				 <p class="w3-hide-large w3-hide-small" style="font-size:13px;"><b><?php echo $row['address']; ?></b></p>
		<p class="w3-hide-medium"><b><?php echo $row['Time'];?></b></p>
		<p class="w3-hide-small w3-hide-large" style="font-size:11px;"><b><?php echo $row['Time'];?></b></p>
		</div>
		</div>
		<div class="w3-center">
		<a href="#Delete<?php echo $id;?>" class="w3-button w3-pale-blue w3-hide-small w3-hide-medium"  data-toggle="modal" data-target="#Delete<?php echo $id;?>"  style="text-decoration:none; border-radius:8px;"><i class="fa fa-remove"></i></a>
		<a href="viewevent.php?id=<?php echo $id;?>" class="w3-button w3-pale-blue w3-hide-small w3-hide-medium" data-toggle="tooltip" data-placement="top" title="View Details" style="text-decoration:none; border-radius:8px;"><i class="fa fa-eye"></i></a>
		<a href="viewevent.php?id=<?php echo $id;?>" class="w3-button w3-pale-blue w3-hide-large" data-toggle="tooltip" data-placement="top" title="View Details" style="text-decoration:none; border-radius:8px;"><i class="fa fa-eye"></i> View</a>
		<a href="EditEvent.php?id=<?php echo $id;?>" class="w3-button w3-pale-blue w3-hide-small w3-hide-medium" data-toggle="tooltip" data-placement="top" title="Update Details" style="text-decoration:none; border-radius:8px;"><i class="fa fa-edit"></i></a>
      </div>
	  	<div class="modal fade" id="Delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
		      <div class="modal-body">
	<div class="alert alert-danger">
	<p>Are you sure do you want to remove this Event?</p>
	</div>
      </div>
		<div class="modal-footer">
	<a class="w3-button w3-light-grey" data-dismiss="modal" aria-hidden="true" style="border-radius:10px; text-decoration:none;"><i class="glyphicon glyphicon-remove icon-white"></i> Cancel</a>
<a href="DeleteEvent.php?id=<?php echo $id; ?>" style="border-radius:10px; text-decoration:none;" class="w3-button w3-blue" ><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
												</div>
    </div>
										</div>
									</div>
	  <br/>
	  </div>
    </div>
	  	<?php
}}
?>
  </div>

  </div>
 	<?php
include('dbcon.php');
$current = date("Y-m-d");
$a = date_create($current);
$date = date_format($a,"d");
$s = "SDate";
//$data = mysqli_query($con,"Select * from events where SDate < '$current' ") or die(mysqli_connect_error());
//$cel=mysqli_fetch_array($data);
//echo $x = $cel['SDate'];
$datas = mysqli_query($con,"Select * from events where SDate > '$current' and Event_Status != 'Canceled' ") or die(mysqli_connect_error());
$row = mysqli_fetch_array($datas);
$count = (mysqli_num_rows($datas));
$date = date_create($row['SDate']);
	$id = $row['EventID'];
?>
     <div class="w3-third w3-container w3-margin-bottom ">
	 <div class="">
	 <div class="w3-container w3-blue" style="padding-top:10px; margin-top:10px;">
	 <p style="font-size:21px;"><strong>Next Event</strong></p>
	 </div>
	 
      <img src="Images/Events/<?php
if($count < 1)
{
echo "logo.jpg";	
}
else
{
echo $row['Banner'];}?>"  style="width:100%; height:45%;" class="w3-hover-opacity w3-hide-medium">
	  <img src="Images/Events/<?php
if($count < 1)
{
echo "logo.jpg";	
}
else
{
echo $row['Banner'];}?>" style="width:100%; height:20%;" class="w3-hover-opacity w3-hide-small w3-hide-large">
      <div class="w3-container w3-blue">
        <p class="w3-center" style="padding-left:10px; padding-top:10px; font-size:15px;"><b><?php echo $row['EventName'];?></b></p>

		<div class="w3-row">
		<div class="w3-half">
		<div class="w3-center">
		<p style="font-size:50px; font-family:'Arial Black', Gadget, sans-serif"><?php
		if($count < 1)
		{
			echo " ";
		}
		else
		{
		echo date_format($date,"d"); }?></p>
		</div>
		</div>
		<div class="w3-half">
		<p style="padding-top:13px; font-size:25px;" class="w3-hide-medium"><strong><?php 
		if($count < 1)
		{
			echo " ";
		}
		else
		{echo date_format($date,"F");}?></strong></p><br/>
		<p style="padding-top:13px; font-size:17px;" class="w3-hide-large w3-hide-small"><strong><?php echo date_format($date,"F");?></strong></p><br/>
        <p style="margin-top:-31px;"><b><?php echo $row['Location']; ?></b></p>
		<p style="margin-top:-10px;"><b><?php echo $row['address']; ?></b></p>
		<p><b><?php echo $row['Time'];?></b></p>
		</div>
		</div><br/>
	  </div>

  </div>
  </div>
  </div>
</div>
</body>
<script>
function change() {
    var x = document.getElementById("sel").value;
   document.getElementById('search').disabled = false;
}
</script>
</script>
<script>
window.onload=function(){

$('.dropdown').click(function(){
$(this).siblings(".submenu").toggleClass('hide');


});

$('.country').click(function(){
$(this).siblings(".Country").toggleClass('hide');

});

$('.Price').click(function(){
$(this).siblings(".Price").toggleClass('hide');

});

$('.variety').click(function(){
$(this).siblings(".variety").toggleClass('hide');

});
}

</script>
</html>