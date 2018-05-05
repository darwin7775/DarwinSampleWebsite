<html>

<body class="w3-light-grey">
<?php
include('sidebar.php');
?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:60px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Dashboard</b></h5>
  </header>
<div class="w3-container">
  <div class="panel panel-success" style="padding:3% 3%;">
  <p class="w3-xxxlarge w3-center w3-hide-small w3-hide-medium"><b>Creative Tech Ministry<b/></p>
  <p class="w3-large w3-center w3-hide-large"><b>Creative Tech Ministry</b></p>
  <p class="w3-center">Provides a way in advancing the Kingdom through the use of social media and technology.</p>
  </div>
  </div>
  
  <div class="w3-container">
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-third" style="margin-bottom:3%;">
    <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-center"><i class="fa fa-headphones w3-xxxlarge"></i></div>
        <div class="w3-clear"></div>
        <h4 class="w3-center">Sermons</h4>
		<div class="w3-left w3-hide-small w3-hide-medium" style="padding-left:25px;">
		<p style="font-size: 21px;"><strong>Total Sermons</strong></p>
		<p style="font-size: 21px;"><strong>Total Series</strong></p>
		</div>
		<div class="w3-left w3-hide-small w3-hide-large" style="padding-left:25px;">
		<p style="font-size: 10px;"><strong>Total Sermons</strong></p>
		<p style="font-size: 10px;"><strong>Total Series</strong></p>
		</div>
				<div class="w3-left w3-hide-large w3-hide-medium" style="padding-left:25px;">
		<p style="font-size: 15px;"><strong>Total Sermons</strong></p>
		<p style="font-size: 15px;"><strong>Total Series</strong></p>
		</div>
			<div class="w3-right w3-hide-small w3-hide-medium" style="padding-right:25px;">
		<p style="font-size: 21px;"><b>3</b></p>
		<p style="font-size: 21px;"><b>55</b></p>
		</div>
			<div class="w3-right w3-hide-small w3-hide-large" style="padding-right:25px;">
		<p style="font-size: 10px;"><b>3</b></p>
		<p style="font-size: 10px;"><b>55</b></p>
		</div>
				<div class="w3-right w3-hide-large w3-hide-medium" style="padding-right:25px;">
		<p style="font-size: 15px;"><b>3</b></p>
		<p style="font-size: 15px;"><b>55</b></p>
		</div>
	
      </div>
	  
    </div>

    <div class="w3-third" style="margin-bottom:3%;">
    <div class="w3-container w3-blue-gray w3-padding-16">
        <div class="w3-center"><i class="fa fa-calendar w3-xxxlarge"></i></div>
        <div class="w3-clear"></div>
        <h4 class="w3-center">Events</h4>
		<?php
		include('dbcon.php');
		$current = date("Y-m-d");
$a = date_create($current);
$date = date_format($a,"m");
		$data = mysqli_query($con,"Select * from events where SDate like '_____$date%'") or die (mysqli_connect_error());
		$count = mysqli_num_rows($data);
		$datae = mysqli_query($con,"Select * from events where SDate > '$current' && SDate like '_____$date%' ") or die (mysqli_connect_error());
		$counte = mysqli_num_rows($datae);
		?>
		<div class="w3-left w3-hide-small w3-hide-medium" style="padding-left:25px;">
		<p style="font-size: 21px;"><strong>Month</strong></p>
		<p style="font-size: 21px;"><strong>Events Left</strong></p>
		<p style="font-size: 21px;"><strong>Total Events</strong></p>
		</div>
				<div class="w3-left w3-hide-small w3-hide-large" style="padding-left:25px;">
		<p style="font-size: 10px;"><strong>Month</strong></p>
		<p style="font-size: 10px;"><strong>Events Left</strong></p>
		<p style="font-size: 10px;"><strong>Total Events</strong></p>
		</div>
		<div class="w3-left w3-hide-large w3-hide-medium" style="padding-left:25px;">
		<p style="font-size: 15px;"><strong>Month</strong></p>
		<p style="font-size: 15px;"><strong>Events Left</strong></p>
		<p style="font-size: 15px;"><strong>Total Events</strong></p>
		</div>
			<div class="w3-right w3-hide-small w3-hide-medium" style="padding-right:25px;">
			<p style="font-size: 19px;"><b><?php $x=date("Y-m-d"); $y=date_create($x); echo date_format($y,"F");?></b></p>
			<p style="font-size: 21px;"><b><?php echo $counte; ?></b></p>
		<p style="font-size: 21px;"><b><?php echo $count; ?></b></p>
		</div>
				<div class="w3-right w3-hide-small w3-hide-large" style="padding-right:25px;">
			<p style="font-size: 10px;"><b><?php $x=date("Y-m-d"); $y=date_create($x); echo date_format($y,"F");?></b></p>
			<p style="font-size: 10px;"><b><?php echo $counte; ?></b></p>
		<p style="font-size: 10px;"><b><?php echo $count; ?></b></p>
		</div>
					<div class="w3-right w3-hide-large w3-hide-medium" style="padding-right:25px;">
			<p style="font-size: 15px;"><b><?php $x=date("Y-m-d"); $y=date_create($x); echo date_format($y,"F");?></b></p>
			<p style="font-size: 15px;"><b><?php echo $counte; ?></b></p>
		<p style="font-size: 15px;"><b><?php echo $count; ?></b></p>
		</div>

      </div>
	
    </div>
    <div class="w3-third">
    <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-center"><i class="fa fa-bookmark w3-xxxlarge"></i></div>
        <div class="w3-clear"></div>
        <h4 class="w3-center">Testimonies</h4>
		<div class="w3-left w3-hide-small w3-hide-medium" style="padding-left:10px;">
		<p style="font-size: 21px;"><strong>Pending Testimonies</strong></p>
		<p style="font-size: 21px;"><strong>Posted Testimonies</strong></p>
		</div>
			<div class="w3-left w3-hide-small w3-hide-large" style="padding-left:10px;">
		<p style="font-size: 10px;"><strong>Pending Testimonies</strong></p>
		<p style="font-size: 10px;"><strong>Posted Testimonies</strong></p>
		</div>
				<div class="w3-left w3-hide-medium w3-hide-large" style="padding-left:10px;">
		<p style="font-size: 15px;"><strong>Pending Testimonies</strong></p>
		<p style="font-size: 15px;"><strong>Posted Testimonies</strong></p>
		</div>
			<div class="w3-right w3-hide-small w3-hide-medium" style="padding-right:15px;">
		<p style="font-size: 21px;"><b>550</b></p>
		<p style="font-size: 21px;"><b>30007</b></p>
		</div>
			<div class="w3-right w3-hide-small w3-hide-large" style="padding-right:15px;">
		<p style="font-size: 10px;"><b>550</b></p>
		<p style="font-size: 10px;"><b>30007</b></p>
		</div>
					<div class="w3-right w3-hide-medium w3-hide-large" style="padding-right:15px;">
		<p style="font-size: 15px;"><b>550</b></p>
		<p style="font-size: 15px;"><b>30007</b></p>
		</div>

      </div>
    </div>
    </div>
	
<div class="w3-row-padding w3-margin-bottom">
	    <div class="w3-third" style="margin-bottom:3%;">
    <div class="w3-container w3-purple w3-padding-16">
        <div class="w3-center"><i class="fa fa-envelope w3-xxxlarge"></i></div>
        <div class="w3-clear"></div>
        <h4 class="w3-center">Connect on Us</h4>
		<div class="w3-left w3-hide-small w3-hide-medium" style="padding-left:10px;">
		<p style="font-size: 21px;"><strong>New Email</strong></p>
		<p style="font-size: 21px;"><strong>Total</strong></p>
		</div>
			<div class="w3-left w3-hide-small w3-hide-large" style="padding-left:10px;">
		<p style="font-size: 10px;"><strong>New Email</strong></p>
		<p style="font-size: 10px;"><strong>Total</strong></p>
		</div>
				<div class="w3-left w3-hide-medium w3-hide-large" style="padding-left:10px;">
		<p style="font-size: 15px;"><strong>New Email</strong></p>
		<p style="font-size: 15px;"><strong>Total</strong></p>
		</div>
			<div class="w3-right w3-hide-small w3-hide-medium" style="padding-right:15px;">
		<p style="font-size: 21px;"><b>550</b></p>
		<p style="font-size: 21px;"><b>550</b></p>
		</div>
			<div class="w3-right w3-hide-small w3-hide-large" style="padding-right:15px;">
		<p style="font-size: 10px;"><b>550</b></p>
		<p style="font-size: 10px;"><b>550</b></p>
		</div>
					<div class="w3-right w3-hide-medium w3-hide-large" style="padding-right:15px;">
		<p style="font-size: 15px;"><b>550</b></p>
		<p style="font-size: 15px;"><b>550</b></p>
		</div>

      </div>
    </div>
	    <div class="w3-third">
    <div class="w3-container w3-indigo w3-padding-16">
        <div class="w3-center"><i class="fa fa-registered w3-xxxlarge"></i></div>
        <div class="w3-clear"></div>
        <h4 class="w3-center">Camp Online Registration</h4>
		<div class="w3-left w3-hide-small w3-hide-medium" style="padding-left:10px;">
		<p style="font-size: 21px;"><strong>New Registered</strong></p>
		<p style="font-size: 21px;"><strong>Total Registered</strong></p>
		</div>
			<div class="w3-left w3-hide-small w3-hide-large" style="padding-left:10px;">
		<p style="font-size: 10px;"><strong>New Registered</strong></p>
		<p style="font-size: 10px;"><strong>Total Registered</strong></p>

		</div>
				<div class="w3-left w3-hide-medium w3-hide-large" style="padding-left:10px;">
		<p style="font-size: 15px;"><strong>New Registered</strong></p>
		<p style="font-size: 15px;"><strong>Total Registered</strong></p>

		</div>
			<div class="w3-right w3-hide-small w3-hide-medium" style="padding-right:15px;">
		<p style="font-size: 21px;"><b>550</b></p>
		<p style="font-size: 21px;"><b>550</b></p>
		</div>
			<div class="w3-right w3-hide-small w3-hide-large" style="padding-right:15px;">
		<p style="font-size: 10px;"><b>550</b></p>
		<p style="font-size: 10px;"><b>550</b></p>
		</div>
					<div class="w3-right w3-hide-medium w3-hide-large" style="padding-right:15px;">
		<p style="font-size: 15px;"><b>550</b></p>
		<p style="font-size: 15px;"><b>550</b></p>
		</div>

      </div>
	</div>
  </div>
  </div>



</div>


</body>
</html>
