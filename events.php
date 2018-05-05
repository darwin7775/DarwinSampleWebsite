<html>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">
<?php
include('sidebar.php');
?>
 
<div class="w3-main" style="margin-left:300px; margin-top:60px;">
 <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-calendar"></i> Events</b></h5>
  </header>
  <div class="w3-comtainer w3-row">
    <p style="margin-left:10px;"><a href="pastevent">Past Events</a> -|- <a href="events">Events for Month</a> -|- <a href="upcomingevents">Upcoming Events</a></p>

  <div class="w3-blue w3-container" style="border-radius:8px; margin-left:10px; ">
  
  <h1 style="font-family: 'Times New Roman', Times, serif;" class="w3-hide-small" >Events for <?php $x=date("Y-m-d"); $y=date_create($x); echo date_format($y,"F");?></h1>
  <h1 style="font-family: 'Times New Roman', Times, serif; font-size:25px;" class="w3-hide-large w3-hide-medium">Events for <?php $x=date("Y-m-d"); $y=date_create($x); echo date_format($y,"F");?></h1>
  </div>
  <div class="w3-twothird" style="padding-right:10px;">
<br/>
<div class="w3-row-padding" style="height:90%; overflow: auto;">
	<?php
include('dbcon.php');
$current = date("Y-m-d");
$a = date_create($current);
$date = date_format($a,"m");
$s = "SDate";

$data = mysqli_query($con,"Select * from events where SDate >= '$current' && SDate like '_____$date%' && Event_Status != 'Canceled' Order by SDate ASC ") or die(mysqli_connect_error());
$dat = (mysqli_num_rows($data));
if($dat < 1)
{
	?>
	<div class="alert alert-info">
<p class="w3-xlarge"><i class="fa fa-info-circle"></i> All events for this month already done.</p>
</div>
	<?php
}
else
{
while($row = mysqli_fetch_array($data))
{
	$id = mysqli_real_escape_string($con,$row['EventID']);
	 $date = date_create($row['SDate']);
?>
    <div class="w3-third w3-container w3-margin-bottom ">
      <img src="Images/Events/<?php echo mysqli_real_escape_string($con,$row['Banner']);?>" style="width:100%; height:25%;" class="w3-hover-opacity w3-hide-medium w3-hide-small">
	  <img src="Images/Events/<?php echo mysqli_real_escape_string($con,$row['Banner']);?>" style="width:100%; height:45%;" class="w3-hover-opacity w3-hide-medium w3-hide-large">
	   <img src="Images/Events/<?php echo mysqli_real_escape_string($con,$row['Banner']);?>" style="width:100%; height:10%;" class="w3-hover-opacity w3-hide-small w3-hide-large">
      <div class="w3-container w3-blue">
        <p class="w3-center w3-hide-medium" style="padding-left:10px; padding-top:10px; font-size:20px;"><strong><?php echo $row['EventName'];?></strong></p>
		 <p class="w3-center w3-hide-large w3-hide-small" style="padding-left:10px; padding-top:10px; font-size:15px;"><strong><?php echo $row['EventName'];?></strong></p>
		<div class="w3-row">
		<div class="w3-half">
		<div class="w3-center">
		<p style="font-size:50px; font-family:'Arial Black', Gadget, sans-serif;" class="w3-hide-medium"><?php echo date_format($date,"d"); ?></p>
		<p style="font-size:30px; font-family:'Arial Black', Gadget, sans-serif;" class="w3-hide-large w3-hide-small"><?php echo date_format($date,"d"); ?></p>
		</div>
		</div>
		<div class="w3-half">
		<p style="padding-top:15px; font-size:21px;" class="w3-hide-medium"><strong><?php echo date_format($date,"F");?></strong></p><br/>
		<p style="padding-top:-10px; font-size:13px;" class="w3-hide-large w3-hide-small"><strong><?php echo date_format($date,"F");?></strong></p><br/>
        <p class="w3-hide-medium" style="margin-top:-31px;"><b><?php echo mysqli_real_escape_string($con,$row['Location']); ?></b></p>
		<p class="w3-hide-large w3-hide-small" style="font-size:11px;"><b><?php echo mysqli_real_escape_string($con,$row['Location']);  ?></b></p>
		        <p class="w3-hide-medium"><b><?php echo mysqli_real_escape_string($con,$row['address']); ?></b></p>
				<p class="w3-hide-large w3-hide-small" style="font-size:11px;"><b><?php echo mysqli_real_escape_string($con,$row['address']);?></b></p>
		<p class="w3-hide-medium"><b><?php echo mysqli_real_escape_string($con,$row['Time']);?></b></p>
		<p class="w3-hide-large w3-hide-small" style="font-size:10px;"><b><?php mysqli_real_escape_string($con,$row['Time']);?></b></p>
		</div>
		</div>
		<div class="w3-center">
		<a href="#Delete<?php echo $id;?>" class="w3-button w3-pale-blue w3-hide-small w3-hide-medium"  data-toggle="modal" data-target="#Delete<?php echo $id;?>"  style="text-decoration:none; border-radius:8px;"><i class="fa fa-remove"></i></a>
		<a href="viewevent.php?id=<?php echo $id;?>" class="w3-button w3-pale-blue w3-hide-small w3-hide-medium" data-toggle="tooltip" data-placement="top" title="View Details" style="text-decoration:none; border-radius:8px;"><i class="fa fa-eye"></i></a>
		<a href="viewevent.php?id=<?php echo $id;?>" class="w3-button w3-pale-blue w3-hide-large" data-toggle="tooltip" data-placement="top" title="View Details" style="text-decoration:none; border-radius:8px;"><i class="fa fa-eye"></i> View</a>
		<a href="EditEvent.php?id=<?php echo $id;?>" class="w3-button w3-pale-blue w3-hide-small w3-hide-medium" data-toggle="tooltip" data-placement="top" title="Update Details" style="text-decoration:none; border-radius:8px;"><i class="fa fa-edit"></i></a>
      </div><br/>
	  </div>
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
	  	<?php
}
}
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
$row =  mysqli_fetch_array($datas);
$count = (mysqli_num_rows($datas));
$date = date_create($row['SDate']);
	$id = mysqli_real_escape_string($con,$row['EventID']);
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
echo mysqli_real_escape_string($con,$row['Banner']);}?>"  style="width:100%; height:45%;" class="w3-hover-opacity w3-hide-medium">
	  <img src="Images/Events/<?php
if($count < 1)
{
echo "logo.jpg";	
}
else
{
echo mysqli_real_escape_string($con,$row['Banner']);}?>" style="width:100%; height:20%;" class="w3-hover-opacity w3-hide-small w3-hide-large">
      <div class="w3-container w3-blue">
        <p class="w3-center" style="padding-left:10px; padding-top:10px; font-size:15px;"><b><?php echo mysqli_real_escape_string($con,$row['EventName']);?></b></p>

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
		echo mysqli_real_escape_string($con,date_format($date,"d")); }?></p>
		</div>
		</div>
		<div class="w3-half">
		<p style="padding-top:13px; font-size:25px;" class="w3-hide-medium"><strong><?php 
		if($count < 1)
		{
			echo " ";
		}
		else
		{echo mysqli_real_escape_string($con,date_format($date,"F"));}?></strong></p><br/>
		<p style="padding-top:13px; font-size:17px;" class="w3-hide-large w3-hide-small"><strong><?php echo mysqli_real_escape_string($con,date_format($date,"F"));?></strong></p><br/>
        <p style="margin-top:-31px;"><b><?php echo mysqli_real_escape_string($con,$row['Location']); ?></b></p>
		<p style="margin-top:-10px;"><b><?php echo mysqli_real_escape_string($con,$row['address']); ?></b></p>
		<p><b><?php echo mysqli_real_escape_string($con,$row['Time']);?></b></p>
		</div>
		</div><br/>
	  </div>
	  <div class="w3-center w3-hide-small w3-hide-medium" style="margin-top:30px;">
    <a href="addevent" class="w3-button w3-hover-opacity w3-green" style="padding:32px 16px; border-radius:12px; font-size:19px; text-decoration:none;"><i class="fa fa-calendar-plus-o"></i> Add New Event</a>
  </div>
  </div>
  </div>
  
  </div>
</div>
</body>
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