<html>
<head>
</head>
<body class="w3-light-grey">
<?php
include('sidebar.php');
?>
<div class="w3-main" style="margin-left:300px;margin-top:60px;">
 <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-user"></i> Profile</b></h5>
  </header>
  <div class="w3-container">
  <div class="w3-row">
  <div class="w3-third" style="padding-right:10px;">
  <?php 
  include('dbcon.php');
  $x = $_SESSION['MemberID'];
	$info = mysqli_query($con,"select * from superadmin where MemberID = '$x'") or die (mysqli_connect_error());
	while( $infos = mysqli_fetch_array($info))
	{
  ?>
  <div class="alert alert-info">
  <div class="w3-center">
<img class="w3-circle " src="images/Profile/avatar.png" style="width:50%;">
 <p class="w3-xlarge"><strong><?php echo $infos['Firstname']." " . $infos['Lastname'];?></strong></p>
  </div>
  </div>
    <div class=" w3-container w3-white w3-padding-16">
  <p><i class="fa fa-id-card-o w3-xlarge"></i> <?php echo $infos['MemberID']; ?></p>
  <p><i class="fa fa-universal-access w3-xlarge w3-white"></i> Creative Tech Super Admin</p>
    <p><i class="fa fa-birthday-cake w3-xlarge"></i> <?php $x = date_create($infos['BirthDay']); echo date_format($x,"F d Y");?></p>
  <p><i class="fa fa-envelope-square w3-xlarge"></i> <?php echo $infos['Email']?></p>
  <p><i class="fa fa-phone-square w3-xlarge"></i> <?php echo $infos['Contact']?></p>
   <p><i class="fa fa-map-marker w3-xlarge"></i> <?php echo $infos['Location']?></p>
    <p><i class="fa fa-heart w3-xlarge"></i> <?php echo $infos['Baptism']?></p>
	<div class="w3-center">
	    <a href="#constract" class="w3-button w3-grey w3-hover-blue" data-toggle="modal" data-placement="top" data-target="#constract" style="text-decoration:none; border-radius:8px; padding:14px 40px; margin-bottom:10px;"><i class="fa fa-bullhorn"> <b>Contract Announcement</b></i></a>
	</div>

  </div>
  <?php
	}
	?>
  <br/>
  </div>
  				<div class="modal fade" id="constract" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
	<div class="modal-header">
		<p class="w3-xlarge">Announcement</p>
	</div>
		      <div class="modal-body">
		<form method="POST" autocomplete="off">
		<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" required maxlength="50" class="form-control" />
		</div>
				<div class="form-group">
		<label>Constract</label>
		<textarea type="text" name="content" required rows="7" maxlength="3000" class="form-control"> </textarea>
		</div>
      </div>
		<div class="modal-footer">
	<a class="w3-button w3-light-grey" data-dismiss="modal" aria-hidden="true" style="border-radius:10px; text-decoration:none;"><i class="glyphicon glyphicon-remove icon-white"></i> Cancel</a>
<button name="an" style="border-radius:10px; text-decoration:none;" class="w3-button w3-blue" ><i class="glyphicon glyphicon-ok icon-white"></i> Post</button>
</form>
<?php
include('dbcon.php');
if(isset($_POST['an']))
{
	$title = mysqli_real_escape_string($con,$_POST['title']);
	$content = mysqli_real_escape_string($con,$_POST['content']);
	$date = date("Y-m-d");
	  $x = $_SESSION['MemberID'];
	mysqli_query($con,"Insert into announcement(Title, Content, MemberID,Date_Posted,Status) values ('$title', '$content', '$x','$date','Post')") or die (mysqli_connect_error());
	echo '<script> swal("Success!", "Your Announcement have been post", "success");</script>';
}
?>
												</div>
    </div>
										</div>
									</div>
  <div class="w3-twothird">
  <div class="w3-container w3-white">
  <p class="w3-xxlarge"><strong>My Prayer List</strong></p>
    <a href="#New" class="w3-button w3-yellow w3-hover-blue" data-toggle="modal" data-placement="top" data-target="#New" style="text-decoration:none; border-radius:8px; padding:14px 40px; margin-bottom:10px;"><i class="fa fa-plus"> <b>New</b></i></a>
			
	<div class="modal fade" id="New" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
	<div class="modal-header">
		<p class="w3-xlarge">New Prayer Request</p>
	</div>
		      <div class="modal-body">
			  <div class="alert alert-success">
		<p><b>Proverbs 15:29</b></p>
		<p class="w3-center">The Lord is far from the wicked, but He hears the prayer of the righteous.</p>
		</div>
		<form method="POST" autocomplete="off">
		<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" required maxlength="50" class="form-control" />
		</div>
				<div class="form-group">
		<label>My Prayer</label>
		<textarea type="text" name="content" required rows="7" maxlength="3000" class="form-control"> </textarea>
		</div>
      </div>
		<div class="modal-footer">
	<a class="w3-button w3-light-grey" data-dismiss="modal" aria-hidden="true" style="border-radius:10px; text-decoration:none;"><i class="glyphicon glyphicon-remove icon-white"></i> Cancel</a>
<button name="Prayer" style="border-radius:10px; text-decoration:none;" class="w3-button w3-blue" ><i class="glyphicon glyphicon-ok icon-white"></i> Post</button>
</form>
<?php
include('dbcon.php');
if(isset($_POST['Prayer']))
{
	$title = mysqli_real_escape_string($con,$_POST['title']);
	$content = mysqli_real_escape_string($con,$_POST['content']);
	$date = date("Y-m-d");
	  $x = $_SESSION['MemberID'];
	mysqli_query($con,"Insert into prayerrequest(Title, Content, MemberID,Posted_Date) values ('$title', '$content', '$x','$date')") or die (mysqli_connect_error());
	echo '<script> swal("Success!", "Your Prayer Request have been post", "success");</script>';
}
?>
												</div>
    </div>
										</div>
									</div>
										<div class="scroll" style="height:25%; overflow:auto;">
      <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
	<thead class="w3-blue">
	<tr>
	<th>Title</th>
	<th>Dayte Posted</th>
	<th>Action</th>
	</tr>
	</thead>
	<?php
	include('dbcon.php');
  $x = $_SESSION['MemberID'];
	$data = mysqli_query($con,"select * from prayerrequest where MemberID = '$x' order by PrayerRequestID Desc") or die (mysqli_connect_error());
	$count =(mysqli_num_rows($data));
	if($count < 1)
	{
		?>
		<td colspan="4" class="w3-yellow"><p style="font-style:oblique;"><b>Make and share your prayer request now!</b></p></td>
		<?php
	}
	else
	{
	while($row = mysqli_fetch_array($data))
	{
		$id = $row['PrayerRequestID'];
	?>
	<tbody>
      <tr>
	<td><?php echo $row['Title'];?></td>
	<td><?php  $date = date_create($row['Posted_Date']); echo date_format($date,"F d Y");?></td>
	<td>
	<a href="#Delete<?php echo $id;?>" class="w3-button w3-red w3-hover-blue" data-toggle="modal" data-placement="top" data-target="#Delete<?php echo $id;?>" style="text-decoration:none; border-radius:8px; margin-top:5px;"><i class="fa fa-remove"></i></a>
		<a href="#View<?php echo $id;?>" class="w3-button w3-green w3-hover-blue" data-toggle="modal" data-placement="top" data-target="#View<?php echo $id;?>" title="View Details" style="text-decoration:none; border-radius:8px; margin-top:5px;"><i class="fa fa-eye"></i></a>

		
	</td>
      </tr>
	  									
	  <!--View Prayer Request-->
<div class="modal fade" id="View<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<p class="w3-xlarge">My Prayer Request</p>
										</div>
		      <div class="modal-body">
	  <?php
	  $datas = mysqli_query($con,"select * from prayerrequest where PrayerRequestID = '$id'") or die (mysqli_connect_error());
	  $total = mysqli_query($con,"select count(PrayerRequestID) as TotalPrayed from prayerlogs where PrayerRequestID = '$id' ") or die (mysqli_connect_error());
	$PrayedTotal = (mysqli_fetch_array($total));
	while($rows = mysqli_fetch_array($datas))
	{
	  ?>
	  <p class="w3-large"><strong><?php echo $row['Title'];?></strong><br/>
	  <b class="w3-small" style="color:grey; font-style:oblique;"><?php $x = date_create($row['Posted_Date']); echo date_format($x,"F d Y") ?></b></p>
        <pre style="font-family:arial;"><?php echo $row['Content'];?></pre>
		<p class=" pull-right" style="padding-right:10px;"><i class="fa fa-heart" style="color:red;"></i> <b><?php echo $PrayedTotal['TotalPrayed'];?></b></p><br/>
		<?php
	}
	?>
      </div>
	  
	  
	        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
										</div>
									</div>
									
									<!--Delete Prayer Request-->
									<div class="modal fade" id="Delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<p class="w3-xlarge">My Prayer Request</p>
										</div>
		      <div class="modal-body">
	<div class="alert alert-danger">
	<p>Are you sure do you want to remove this prayer request?</p>
	</div>
      </div>
		<div class="modal-footer">
	<a class="w3-button w3-light-grey" data-dismiss="modal" aria-hidden="true" style="border-radius:10px; text-decoration:none;"><i class="glyphicon glyphicon-remove icon-white"></i> Cancel</a>
<a href="deleteprayer.php?id=<?php echo $id; ?>" style="border-radius:10px; text-decoration:none;" class="w3-button w3-blue" ><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
												</div>
    </div>
										</div>
									</div>
									
									</div>
	  </tbody>
	  	  <?php
	}
	}
	?>
    </table>
	</div>
	<br/>

  </div>
    	
	<div class="w3-container w3-white" style="margin-top:15px;">
	<p class="w3-xxlarge"><strong>My Announcement</strong></p>
	<div class="scroll" style="height:25%; overflow: auto; margin-bottom:15px;" >
	<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
	<thead class="w3-blue">
	<tr>
	<th>Title</th>
	<th>Date Posted</th>
	<th>Action</th>
	</tr>
	</thead>
	<?php
	include('dbcon.php');
	  $x = $_SESSION['MemberID'];
	$an = mysqli_query($con, "select * from announcement where MemberID = '$x' && Status = 'Post' || Status = 'Repost'order by ID desc ") or die (mysqli_connect_error());
	$data = (mysqli_num_rows($an));
	if($data < 1)
	{
		?>
		<td colspan="3" class="w3-yellow"><p style="font-style:oblique;"><b>No Announcements at the moment</b></p></td>
		<?php
	}
	else
	{
	while($data = mysqli_fetch_array($an))
	{
		$id = $data['ID'];
	?>
	<tbody>
	<tr>
	<td><?php echo $data['Title']; ?></td>
	<td><?php $x = date_create($data['Date_Posted']); echo date_format($x,"F d Y"); ?></td>
	<td>
	<a  class="w3-button w3-green w3-hover-blue" href="#repost<?php echo $id;?>"  data-toggle="modal" data-placement="top" data-target="#repost<?php echo $id;?>" style="border-radius:10px;"><i class="fa fa-refresh"></i></a>
	<a  class="w3-button w3-red w3-hover-blue" href="#DeleteAnn<?php echo $id;?>"  data-toggle="modal" data-placement="top" data-target="#DeleteAnn<?php echo $id;?>" style="border-radius:10px;"><i class="fa fa-remove"></i></a>
	</td>
		<div class="modal fade" id="DeleteAnn<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<p class="w3-xlarge">Remove Announcement</p>
										</div>
		      <div class="modal-body">
	<div class="alert alert-danger">
	<p>Are you sure do you want to remove this Announcement?</p>
	</div>
      </div>
		<div class="modal-footer">
	<a class="w3-button w3-light-grey" data-dismiss="modal" aria-hidden="true" style="border-radius:10px; text-decoration:none;"><i class="glyphicon glyphicon-remove icon-white"></i> Cancel</a>
<a href="DeleteAnnouncement.php?id=<?php echo $id; ?>" style="border-radius:10px; text-decoration:none;" class="w3-button w3-blue" ><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
												</div>
    </div>
										</div>
									</div>
									
					<div class="modal fade" id="repost<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<p class="w3-xlarge">Repost Announcement</p>
										</div>
		      <div class="modal-body">
			  
	  <?php
	  $datas = mysqli_query($con,"select * from announcement where ID = '$id'") or die (mysqli_connect_error());
	$rows = mysqli_fetch_array($datas);
	
	  ?>
	  <p class="w3-large"><strong><?php echo $rows['Title'];?></strong><br/>
	  <b class="w3-small" style="color:grey; font-style:oblique;"><?php $x = date_create($rows['Date_Posted']); echo date_format($x,"F d Y") ?></b></p>
        <pre style="font-family:arial;"><?php echo $rows['Content'];?></pre>
      </div>
	  
	  
	        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<a href="repost.php?id=<?php echo $id;?>" style="border-radius:10px; text-decoration:none;" class="w3-button w3-blue" ><i class="glyphicon glyphicon-ok icon-white"></i> Post</a>
      </div>
    </div>
										</div>
									</div>
	</tr>
	</tbody>
	<?php
	}
	}
	?>
	</table>
	</div>
	</div>
  </div>
  </div>
  </div>
</body>
</html>