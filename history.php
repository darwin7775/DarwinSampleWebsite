<html>
<head>
</head>
<body>
<?php
include('sidebar.php');
?>
<div class="w3-main" style="margin-left:300px;margin-top:60px;">
 <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-history"></i> History</b></h5>
  </header>
  
  <!--Accounts Log-->
  <div class="w3-container">
  <div class="panel panel-default">
  <div class="panel-body">
  <p style="font-size:30px;" class="w3-center"><strong>Account Logs</strong></p>
  <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
  <thead class="w3-blue">
  <tr>
  <th>Name</th>
   <th>Mark</th>
   <th>Time</th>
   <th>User Type</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <td>Darwin Coyos</td>
  <td>Login</td>
  <td>07:07 AM</td>
  <td>Super Admin</td>
  </tr>
    <tr>
  <td>Den Raniola</td>
  <td>Login</td>
  <td>07:07 AM</td>
  <td>Super Admin</td>
  </tr>
    <tr>
  <td>Alexey Aragon</td>
  <td>Login</td>
  <td>07:07 AM</td>
  <td>Super Admin</td>
  </tr>
  </tbody>
  </table>
  </div>
  </div>
  </div>
  
  <!--Member Logs-->
    <div class="w3-container">
  <div class="panel panel-default">
  <div class="panel-body">
  <p style="font-size:30px;" class="w3-center"><strong>Request Logs</strong></p>
  <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
  <thead class="w3-blue">
  <tr>
  <th>Name</th>
   <th>Mark</th>
   <th>Time</th>
   <th>Confirmed By</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <td>
Joselle Tuazon
</td>
  <td>Joined</td>
  <td>07:07 AM</td>
  <td>Darwin Coyos</td>
  </tr>
    <tr>
  <td>Jelly Suan Gumalad</td>
  <td>Joined</td>
  <td>07:07 AM</td>
  <td>Den Raniola</td>
  </tr>
    <tr>
  <td>Jackie Angeles</td>
  <td>Joined</td>
  <td>07:07 AM</td>
  <td>Alexey Aragon</td>
  </tr>
  </tbody>
  </table>
  </div>
  </div>
  </div>
  
      <!--Prayer Logs-->
  <div class="w3-container">
  <div class="panel panel-default">
  <div class="panel-body">
  <p style="font-size:30px;" class="w3-center"><strong>Prayer Logs</strong></p>
  <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
  <thead class="w3-blue">
  <tr>
  <th>Name</th>
   <th>Title</th>
   <th>Date</th>
  </tr>
  </thead>
  <tbody>
  <?php
  include('dbcon.php');
  $data = mysqli_query($con, "select * from prayerrequest left join Members on prayerrequest.MemberID = Members.MemberID order by Posted_Date desc limit 0,5") or die(mysqli_connect_error());
  while($row = mysqli_fetch_array($data))
  {
  ?>
  <tr>
  <td><?php echo $row['FirstName']. " " . $row['LastName'];?></td>
  <td><?php echo $row['Title'];?></td>
  <td><?php echo $row['Posted_Date'];?></td>
  </tr>
  <?php
  }
  ?>
  </tbody>
  </table><br/>
  <div class="w3-center">
  <a class="w3-button w3-black w3-hover-blue" href="viewmoreprayerrequest.php" style="text-decoration:none; border-radius:10px;" data-toggle="tooltip" data-placement="top" title="View more History" >View More</a>
  </div>
  </div>
  </div>
  </div>
  
    <!--Prayed Logs-->
  <div class="w3-container">
  <div class="panel panel-default">
  <div class="panel-body">
  <p style="font-size:30px;" class="w3-center"><strong>Prayed Logs</strong></p>
  <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
  <thead class="w3-blue">
  <tr>
  <th>Name</th>
   <th>Mark</th>
   <th>Date</th>
  </tr>
  </thead>
  <tbody>
  <?php
  include('dbcon.php');
  $data = mysqli_query($con, "select * from prayerlogs left join Members on prayerlogs.MemberID = Members.MemberID order by Date_Prayed desc limit 0,5") or die(mysqli_connect_error());
  while($row = mysqli_fetch_array($data))
  {
  ?>
  <tr>
  <td><?php echo $row['FirstName']. " " . $row['LastName'];?></td>
  <td>Prayed</td>
  <td><?php echo $row['Date_Prayed'];?></td>
  </tr>
  <?php
  }
  ?>
  </tbody>
  </table><br/>
  <div class="w3-center">
  <a class="w3-button w3-black w3-hover-blue" href="viewmoreprayedlog.php" style="text-decoration:none; border-radius:10px;" data-toggle="tooltip" data-placement="top" title="View more History" >View More</a>
  </div>
  </div>
  </div>
  </div>
  
  <!--Log Management-->
      <div class="w3-container">
  <div class="panel panel-default">
  <div class="panel-body">
  <p style="font-size:30px;" class="w3-center"><strong>Logs Management</strong></p>
  <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
  <thead class="w3-blue">
  <tr>
  <th>Name</th>
   <th>Title</th>
   <th>Date</th>
   <th>Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
    include('dbcon.php');
  $data = mysqli_query($con, "select * from logs left join Members on logs.MemberID = Members.MemberID order by LogID desc limit 0,5") or die(mysqli_connect_error());
  while($row = mysqli_fetch_array($data))
  {
  ?>
  <tr>
  <td>
  <?php echo $row['FirstName']. " " . $row['LastName']; ?>
</td>
  <td><?php echo $row['Title']; ?></td>
  <td><?php echo $row['Process_Date']; ?></td>
  <td><?php echo $row['Action']; ?></td>
  </tr>
  <?php
  }
  ?>
  </tbody>
  </table><br/>
    <div class="w3-center">
  <a class="w3-button w3-black w3-hover-blue" href="viewmorelogs.php" style="text-decoration:none; border-radius:10px;" data-toggle="tooltip" data-placement="top" title="View more History" >View More</a>
  </div>
  </div>
  </div>
  </div>
  </div>
</body>
</html>