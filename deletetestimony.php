<?php
include('dbcon.php');
include('session.php');
include('swal.php');
$x = mysqli_real_escape_string($con,$_SESSION['MemberID']);
$data= mysqli_real_escape_string($con,$_GET['id']);
$date = mysqli_real_escape_string($con,date("Y-m-d"));
$search = mysqli_query($con,"Select * from testimonies where TestimonyID = '$data'") or die(mysqli_connect_error());
$identify = mysqli_num_rows($search);
if($identify < 1)
{
	echo "<script>window.location = 'javascript:history.back()'</script>";
}
else
{
$remove = mysqli_query($con,"delete from testimonies where TestimonyID = '$data'") or die (mysqli_connect_error());
$remover = mysqli_query($con,"insert into logs (MemberID, Title, Process_date, Action) values ('$x', 'Testimony','$date','Remove')") or die (mysqli_connect_error());
	echo '<script> swal("Success!", "Testimony has been removed", "success").then(function(){window.location="javascript:history.back()"});</script>';
}
?>
