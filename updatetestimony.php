<?php
include('dbcon.php');
include('session.php');
include('swal.php');
$title = mysqli_real_escape_string($con,$_GET['title']);
$id = mysqli_real_escape_string($con,$_GET['id']);
$x = mysqli_real_escape_string($con,$_SESSION['MemberID']);
$date = mysqli_real_escape_string($con, date("Y-m-d"));
$titulo = $title. "-".'Testimony'; 
mysqli_query($con,"update testimonies set Testimony_Title = '$title' where TestimonyID = '$id'") or die (mysqli_connect_error());
mysqli_query($con,"insert into logs (MemberID, Title, Process_Date, Action) values ('$x','$titulo', '$date', 'Update') ") or die (mysqli_connect_error());
echo '<script> swal("Success!", "Testimony has been updated", "success").then(function(){window.location="javascript:history.back()"});</script>';
?>