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

    <p style="margin-left:10px;"><a href="pastevent">Past Events List</a> -|- <a href="events">Events for Month</a> -|- <a href="upcomingevents">Upcoming Events</a></p>

  <div class="w3-blue w3-container" style="border-radius:8px; margin-left:10px; ">
  <h1 style="font-family: 'Times New Roman', Times, serif;" >Past Events List</h1>
  </div>

<br/>
<div class="w3-row">
<div class="w3-third">
  <form method="GET" action="SortPastEvent">
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
<button class="w3-button w3-green" disabled id = "search" style="border-radius:8px;"><i class="fa fa-search"></i> Search</button>
</div>
</div>
<br/>
  </form>
  <div class="w3-container" style="height:50%; overflow: auto;">
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
	<thead class="w3-blue">
	<tr>
	<th>Event Name</th>
	<th>Event Date</th>
	<th>Attendees</th>
	</tr>
	</thead>
<?php
include('dbcon.php');

$date = date("Y-m-d");
$data = mysqli_query($con,"select * from events where SDate < '$date' && Event_Status != 'Canceled' order by SDate Desc") or die (mysqli_connect_error());
while($row=mysqli_fetch_array($data))
{
?>
	<tbody>
<tr>
<td><?php echo $row['EventName'];?></td>
<td><?php $x =  date_create ($row['SDate']);
echo date_format($x,"F d, Y")?></td>
<td><?php echo $row['Participants'];?></td>
</tr>
	  </tbody>
	  <?php
}
?>
    </table><br>
  </div>
 


</div>
</body>
<script>
function change() {
    var x = document.getElementById("sel").value;
   document.getElementById('search').disabled = false;
}
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