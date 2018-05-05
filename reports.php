<html>
<head>
</head>
<style>
.mycontent-left {
  border-right: 1px solid black;
}
</style>
<body class="w3-light-grey">
<?php
include('sidebar.php');
?>


<div class="w3-main" style="margin-left:300px;margin-top:60px;">
 <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-area-chart"></i> Reports</b></h5>
  </header>
  
  <!--LEGEND-->
  <div class="w3-container">
  <div class="panel panel-danger">
  <div class="panel-body">
  <div class="w3-row">
  <p style="font-size:30px;" class="w3-center"><strong>Legend</strong></p>
  <div class="w3-quarter">
  <div class="mycontent-left">
  <div class="w3-center">
  <a class="w3-red w3-button w3-hover-red" style="padding: 17px 50px; text-decoration:none; cursor:context-menu;"><strong>Fair</strong></a>
  </div>
  <div class="w3-container" style="padding-top:21px;">
  <p style="font-size:17px;"><i class="fa fa-info-circle" style="font-size:41px;"></i> We need to have attention and improve much more in this field. And pray for more improvements. Let's set some meeting for  more improvement.</p>
  <p class="w3-center"><b>"Work for Gods Kingdom"</b></p></br>
  </div>
  </div>
  </div>
   <div class="w3-quarter">
     <div class="mycontent-left">
  <div class="w3-center">
  <a class="w3-blue w3-button w3-hover-blue" style="padding: 17px 50px; text-decoration:none; cursor:context-menu;"><strong>Average</strong></a>
  </div>
  <div class="w3-container" style="padding-top:21px;">
  <p style="font-size:17px;"><i class="fa fa-info-circle" style="font-size:41px;"></i> We need to improve more in this field. And pray for more improvements. Launch a meeting for more imporovements.</p>
  <p class="w3-center"><b>"Work for Gods Kingdom"</b></p></br>
  </div>
  </div>
  </div>
   <div class="w3-quarter">
        <div class="mycontent-left">
  <div class="w3-center">
  <a class="w3-green w3-button w3-hover-green" style="padding: 17px 50px; text-decoration:none; cursor:context-menu;"><strong>Good</strong></a>
  </div>
  <div class="w3-container" style="padding-top:21px;">
  <p style="font-size:17px;"><i class="fa fa-info-circle" style="font-size:41px;"></i> Good result in this field. And neverHave some meeting for more imporvements.</p>
  <p class="w3-center"><b>"Work for Gods Kingdom"</b></p></br>
  </div>
  </div>
  </div>
   <div class="w3-quarter">
      
  <div class="w3-center">
  <a class="w3-yellow w3-button w3-hover-yellow" style="padding: 17px 50px; text-decoration:none; cursor:context-menu;"><strong>Excellent</strong></a>
  </div>
  <div class="w3-container" style="padding-top:21px;">
  <p style="font-size:17px;"><i class="fa fa-info-circle" style="font-size:41px;"></i> Praise God for excellent result. Continue praying for it.</p>
  <p class="w3-center"><b>"Work for Gods Kingdom"</b></p>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  
  <!--Report for Prayer Request-->
  <div class="w3-container">
  <div class="panel panel-default">
  <p style="font-size:30px; margin-left:15px; padding-top:10px;"><Strong>Prayer Request Report</strong></p>
  <a class="w3-button pull-right w3-blue w3-hide-small w3-hide-medium" data-toggle="tooltip" data-placement="top" title="Print Report"  target="_blank" style="border-radius:10px; margin-right:15px; text-decoration:none;"><i class="glyphicon glyphicon-print"></i> Print</a>
    <div class="w3-container">
    <h4><strong>Prayer Request Stats</strong></h4><br/>
    <p>Members Reacts on Member Prayer Request</p>
    <div class="w3-grey">	
	<?php
	include('dbcon.php');
	$count_data = mysqli_query($con,"select count(DISTINCT MemberID) as Total from prayerlogs") or die(mysqli_connect_error());
	 $PrayerLogs_Data = (mysqli_fetch_array($count_data));	
	 	$count_Request = mysqli_query($con,"select count(DISTINCT MemberID) as TotalRequest from prayerrequest") or die(mysqli_connect_error());
	 $PrayerRequestLogs_Data = (mysqli_fetch_array($count_Request));	
	 $Members  = mysqli_query($con,"select count(*) as TotalMembers from members") or die(mysqli_connect_error());
	 $Total_Members = (mysqli_fetch_array($Members));
	 $PrayerLogs = $PrayerLogs_Data['Total'];
	 $Members = $Total_Members['TotalMembers'];
	 $RequestLogs = $PrayerRequestLogs_Data['TotalRequest'];
	 $Total_Reactors = ($PrayerLogs / $Members) * 100;
	 $Total_Request =  ($RequestLogs / $Members) * 100;
	?>
      <div class="w3-container w3-center w3-padding" id="NewRegister" style="width:<?php echo $Total_Reactors; ?>%; background-color:None;"><?php echo $PrayerLogs; ?> members</div>
    </div><br/>

    <p>Members Sending Prayer Request</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding" id="NewPrayerRequest" style="width:<?php echo $Total_Request; ?>%"><?php echo $Total_Request; ?> members</div>
    </div><br/>
  </div>
  </div>
</div>

<!--Events Report-->
  <div class="w3-container">
  <div class="panel panel-default">
  <p style="font-size:30px; margin-left:15px; padding-top:10px;"><Strong>Events Report</strong></p>
  <a href="eventreport.php" class="w3-button pull-right w3-green" data-toggle="tooltip" data-placement="top" title="Table View" style="border-radius:10px; margin-right:15px; text-decoration:none;"><i class="fa fa-table"></i> View Table</a>
  <!--<a class="w3-button pull-right w3-blue w3-hide-small w3-hide-medium" data-toggle="tooltip" data-placement="top" title="Print Report"  target="_blank" style="border-radius:10px; margin-right:15px; text-decoration:none;"><i class="glyphicon glyphicon-print"></i> Print</a>-->
    <div class="w3-container">
    <h4><strong>Events Stats</strong></h4><br/>
	<div class="w3-row">
	<div class="w3-third" style="padding-right:10px;">
	<?php
		$count_Events = mysqli_query($con,"select count(*) as Total from events") or die(mysqli_connect_error());
	 $events = (mysqli_fetch_array($count_Events));	
	?>
<div class="panel panel-info">
<div class="panel-heading">
<strong>Total Events for the Year</strong>
</div>
<div class="panel-body w3-center">
<p style="font-size:37px;"><b><?php echo $events['Total']; ?></b> Events</p><br/>
<div class="w3-center"style="">
<a class="w3-button w3-hover-yellow" style="background-color:yellow; text-decoration:none; cursor: context-menu;">Rating Result</a>
</div>
</div>
</div>
	</div>
		<div class="w3-third" style="padding-right:10px;">
<div class="panel panel-info">
<div class="panel-heading">
<strong>Highest Rating Event</strong>
</div>
<div class="panel-body w3-center">
<a href="#" target="_blank" style="font-size:37px;"><b>Frontliner</b></a>
<p>Total Rate: <b>273</b></p>
<div class="w3-center">
<a class="w3-button w3-hover-yellow" style="background-color:yellow; text-decoration:none; cursor: context-menu;">Rating Result</a>
</div>
</div>
</div>
	</div>
			<div class="w3-third" style="padding-right:10px;">
<div class="panel panel-info">
<div class="panel-heading">
<strong>Lowest Rating Event</strong>
</div>
<div class="panel-body w3-center">
<a href="#" target="_blank" style="font-size:37px;"><b>Frontliner</b></a>
<p>Total Rate: <b>273</b></p>
<div class="w3-center">
<a class="w3-button w3-hover-red" style="background-color:red; text-decoration:none; cursor: context-menu;">Rating Result</a>
</div>
</div>
</div>
	</div>
	</div>
  </div>
  
  </div>
</div>

<!--Wesite Report-->
  <div class="w3-container">
  <div class="panel panel-default">
  <p style="font-size:30px; margin-left:15px; padding-top:10px;"><Strong>Website Report</strong></p>
  <a class="w3-button pull-right w3-blue w3-hide-small w3-hide-medium" target="_blank" data-toggle="tooltip" data-placement="top" title="Print Report"  style="border-radius:10px; margin-right:15px; text-decoration:none;"><i class="glyphicon glyphicon-print"></i> Print</a>
    <div class="w3-container">
    <h4><strong>Website Stats</strong></h4><br/>

    <div class="w3-container">
		<div class="w3-center">
	<h4><strong>Our Members</strong></h4><br/>
	</div>
	<div class="w3-row">
	<div class="w3-half" style="padding-right:10px;">
<div class="panel panel-info">
<div class="panel-heading w3-center">
<strong>Users</strong>
</div>
<div class="panel-body w3-center">
<?php
$count_admin = mysqli_query($con,"select count(*) as Total from Members where Member_Type = 'Admin'") or die(mysqli_connect_error());
	 $admin = (mysqli_fetch_array($count_admin));	
?>
<p style="font-size:37px;"><b><?php echo $admin['Total'];?></b> Members</p><br/>
<div class="w3-center"style="">
<a class="w3-button w3-hover-yellow" style="background-color:yellow; text-decoration:none; cursor: context-menu;">Rating Result</a>
</div>
</div>
</div>
	</div>
		<div class="w3-half" style="padding-right:10px;">
<div class="panel panel-info">
<div class="panel-heading w3-center">
<strong>Admins</strong>
</div>
<div class="panel-body w3-center">
<?php
$count_mem = mysqli_query($con,"select count(*) as Total from Members where Member_Type = 'Member'") or die(mysqli_connect_error());
	 $member = (mysqli_fetch_array($count_mem));	
?>
<p style="font-size:37px;"><b><?php echo $member['Total'];?></b> Members</p><br/>
<div class="w3-center">
<a class="w3-button w3-hover-yellow" style="background-color:yellow; text-decoration:none; cursor: context-menu;">Rating Result</a>
</div>
</div>
</div>
	</div>
	</div>
	
	<div class="w3-center ">

	<p class="w3-xlarge"><strong>Ministry</strong></p>
	
	</div>
	
	<div class="w3-row">
	<div class="w3-quarter" style="padding-right:10px;">
	<div class="panel panel-Primary">
<div class="panel-heading w3-center">
<strong>Gratitude Ministry</strong>
</div>
<div class="panel-body w3-center">
<?php
$count_grat = mysqli_query($con,"select count(*) as Total from Members where Ministry = 'Gratitude Ministry'") or die(mysqli_connect_error());
	 $grats = (mysqli_fetch_array($count_grat));	
?>
<p style="font-size:23px;"><b><?php echo $grats['Total'];?></b> Members</p><br/>
</div>
</div>
	</div>
	
	
		<div class="w3-quarter" style="padding-right:10px;">
	<div class="panel panel-Primary">
<div class="panel-heading w3-center">
<strong>Creative Tech Ministry</strong>
</div>
<div class="panel-body w3-center">
<?php
$count_CTM = mysqli_query($con,"select count(*) as Total from Members where Ministry = 'Creative Tech Ministry'") or die(mysqli_connect_error());
	 $creative = (mysqli_fetch_array($count_CTM));	
?>
<p style="font-size:23px;"><b><?php echo $creative['Total'];?></b> Members</p><br/>
</div>
</div>
	</div>
	
	
		<div class="w3-quarter" style="padding-right:10px;">
	<div class="panel panel-Primary">
<div class="panel-heading w3-center">
<strong>Ushering Ministry</strong>
</div>
<div class="panel-body w3-center">
<?php
$count_usher = mysqli_query($con,"select count(*) as Total from Members where Ministry = 'Ushering Ministry'") or die(mysqli_connect_error());
	 $usher = (mysqli_fetch_array($count_usher));
?>
<p style="font-size:23px;"><b><?php echo $usher['Total'];?></b> Members</p><br/>
</div>
</div>
	</div>
		<div class="w3-quarter" style="padding-right:10px;">
	<div class="panel panel-Primary">
<div class="panel-heading w3-center">
<strong>Children Ministry</strong>
</div>
<div class="panel-body w3-center">
<?php
$count_child = mysqli_query($con,"select count(*) as Total from Members where Ministry = 'Children Ministry'") or die(mysqli_connect_error());
	 $child = (mysqli_fetch_array($count_child));	
?>
<p style="font-size:23px;"><b><?php echo $child['Total'];?></b> Members</p><br/>
</div>
</div>
	</div>
	
		<div class="w3-quarter" style="padding-right:10px;">
	<div class="panel panel-Primary">
<div class="panel-heading w3-center">
<strong>Secuirity Ministry</strong>
</div>
<div class="panel-body w3-center">
<?php
$count_MAS = mysqli_query($con,"select count(*) as Total from Members where Ministry = 'MAS Ministry'") or die(mysqli_connect_error());
	 $MAS = (mysqli_fetch_array($count_MAS));	
?>
<p style="font-size:23px;"><b><?php echo $MAS['Total'];?></b> Members</p><br/>
</div>
</div>
	</div>
		<div class="w3-quarter" style="padding-right:10px;">
	<div class="panel panel-Primary">
<div class="panel-heading w3-center">
<strong>Prayer Ministry</strong>
</div>
<div class="panel-body w3-center">
<?php
$count_Pray = mysqli_query($con,"select count(*) as Total from Members where Ministry = 'Prayer Ministry'") or die(mysqli_connect_error());
	 $Prayer = (mysqli_fetch_array($count_Pray));	
?>
<p style="font-size:23px;"><b><?php echo $Prayer['Total'];?></b> Members</p><br/>
</div>
</div>
	</div>
		<div class="w3-quarter" style="padding-right:10px;">
	<div class="panel panel-Primary">
<div class="panel-heading w3-center">
<strong>Finance Ministry</strong>
</div>
<div class="panel-body w3-center">
<?php
$count_Finance = mysqli_query($con,"select count(*) as Total from Members where Ministry = 'Finance Ministry'") or die(mysqli_connect_error());
	 $Finance = (mysqli_fetch_array($count_Finance));	
?>
<p style="font-size:23px;"><b><?php echo $Finance['Total'];?></b> Members</p><br/>
</div>
</div>
	</div>
		<div class="w3-quarter" style="padding-right:10px;">
	<div class="panel panel-Primary">
<div class="panel-heading w3-center">
<strong>PARM Ministry</strong>
</div>
<div class="panel-body w3-center">
<?php
$count_PARM = mysqli_query($con,"select count(*) as Total from Members where Ministry = 'PARM Ministry'") or die(mysqli_connect_error());
	 $PARM = (mysqli_fetch_array($count_PARM));	
?>
<p style="font-size:23px;"><b><?php echo $PARM['Total'];?></b> Members</p><br/>
</div>
</div>
	</div>
	</div>
	
  </div>
  </div>
  </div>
</div>
</body>
<script>
(function () { 
var w = $("#NewPrayerRequest").css("width").slice(0,-2);
var ww = $(window).width();
        var udata = [w/ww*100];

        if (udata <= 20.81) {
        document.getElementById("NewPrayerRequest").style.backgroundColor = '#F44336';
        }
        else if (udata > 20.81 && udata <= 47.415919140871765)  
        {
        document.getElementById("NewPrayerRequest").style.backgroundColor = '#2196F3';
        }  
		else if (udata > 47.415919140871765 && udata <= 63.221730890713836)
		{
		document.getElementById("NewPrayerRequest").style.backgroundColor = '#4CAF50';
		}
		else if(udata > 63.23)
		{
		document.getElementById("NewPrayerRequest").style.backgroundColor = '#FFEB3B';
		}
     })();

</script>
<script>
(function () { 
var w = $("#NewRegister").css("width").slice(0,-2);
var ww = $(window).width();
        var udata = [w/ww*100];

        if (udata <= 20.81) {
        document.getElementById("NewRegister").style.backgroundColor = '#F44336';
        }
        else if (udata > 20.81 && udata <= 47.415919140871765)  
        {
        document.getElementById("NewRegister").style.backgroundColor = '#2196F3';
        }  
		else if (udata > 47.415919140871765 && udata <= 63.221730890713836)
		{
		document.getElementById("NewRegister").style.backgroundColor = '#4CAF50';
		}
		else if(udata > 63.23)
		{
		document.getElementById("NewRegister").style.backgroundColor = '#FFEB3B';
		}
     })();

</script>
</html>