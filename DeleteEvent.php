   <html>
   <head>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   </head>
   <body>
<?php
include('dbcon.php');
include('session.php');
$x = mysqli_real_escape_string($con,$_SESSION['MemberID']);
$data= $_GET['id'];
$date = mysqli_query($con,"select * from events where EventID = '$data'") or die (mysqli_connect_error());
$row = (mysqli_fetch_array($date));
$EventName = $row['EventName'];
mysqli_query($con,"update events set Event_Status = 'Canceled' where EventID = '$data' ") or die(mysqli_connect_error());
$current = date("Y-m-d");
mysqli_query($con,"insert into logs (MemberID, Title, Process_Date, Action) values ('$x', '$EventName', '$current','Canceled')") or die(mysqli_connect_error());
	echo '<script> swal("Success!", "Event have been Canceled", "success").then(function(){window.location="events.php"});</script>';
?>
</body>
</html>