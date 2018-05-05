<html>
<head>
</head>
<body class="w3-light-grey">

<?php
include('sidebar.php');
?>
<div class="w3-main" style="margin-left:300px;margin-top:60px;">
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-bookmark"></i> Testimonies</b></h5>
  </header>
  <div class="w3-row w3-container" style="margin-bottom:1%; margin-top:2%;">
  <div class="w3-third">
  <label>Search Bar</label>
    <input class="form-control" id="system-search" name="q" placeholder="Search Here..." />  
	</div>
	</div>
	<div class="w3-container" style="height:50%; overflow: auto;">
  <table class="w3-table w3-bordered w3-border w3-hoverable w3-white table-list-search">
<thead class="w3-blue">
	<tr>
	<th>Email Address</th>
	<th>Name</th>
	<th>Title</th>
	<th>Share on Private</th>
	<th>Testimony About</th>
	<th>Status</th>
	<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
	include('dbcon.php');
	$data = mysqli_query($con,"select * from testimonies order by TestimonyID Desc") or die (mysqli_connect_error());
	$count = mysqli_num_rows($data);
	if($count < 1)
	{
		echo '<td class="w3-red" colspan="8">Theirs No Testimony</td>';
	}
	else
	{
	while($row = mysqli_fetch_array($data))
	{
		$id = mysqli_real_escape_string($con,$row['TestimonyID']);
		$check = mysqli_real_escape_string($con,$row['Testimony_Status']);

	?>
	<tr>
	<td><?php echo mysqli_real_escape_string($con,$row['EmailAdd']);?></td>
	<td><?php echo mysqli_real_escape_string($con,$row['Name']);?></td>
	<td><?php echo mysqli_real_escape_string($con,$row['Testimony_Title']);?></td>
	<td><?php echo mysqli_real_escape_string($con,$row['Testimony_Status']);?></td>
	<td><?php echo mysqli_real_escape_string($con,$row['Testimony_About']);?></td>
	<td><?php echo mysqli_real_escape_string($con,$row['Status']);?></td>
	<td>
	<a href="viewtestimony-<?php echo mysqli_real_escape_string($con,$id); ?>" class="w3-button w3-YELLOW w3-hover-yellow" style="border-radius:9px;" title="View Information"><i class="fa fa-eye"></i></a>
	<?php
	if($row['Testimony_Status'] == "Private")
	{
	}
	else
	{
	?>
		<a href="#edit<?php echo $id;?>" class="w3-button w3-green w3-hover-green" data-toggle="modal" data-placement="top" data-target="#edit<?php echo $id;?>" style="border-radius:9px;" title="Update"><i class="fa fa-edit"></i></a>
	<?php
	}
	?>
	<a href="#Delete<?php echo $id;?>" data-toggle="modal" data-placement="top" data-target="#Delete<?php echo $id;?>" class="w3-button w3-red w3-hover-red" style="border-radius:9px;" title="Remove"><i class="fa fa-remove"></i></a>
	</td>
	</tr>
					<div class="modal fade" id="Delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">

		      <div class="modal-body">
	<div class="alert alert-danger">
	<p>Are you sure do you want to remove this Testimony</p>
	</div>
      </div>
		<div class="modal-footer">
	<a class="w3-button w3-light-grey" data-dismiss="modal" aria-hidden="true" style="border-radius:10px; text-decoration:none;"><i class="glyphicon glyphicon-remove icon-white"></i> Cancel</a>
<a href="testimony/<?php echo mysqli_real_escape_string($con,$id); ?>"  style="border-radius:10px; text-decoration:none;" class="w3-button w3-red w3-hover-red" ><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
												</div>
    </div>
										</div>
									</div>
									
									
										<div class="modal fade" id="edit<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">

		      <div class="modal-body">
<form method="GET" action="updatetestimony">
	<p>Have you already asked the user for title?</p>
	<input type="hidden" name="id" class="w3-input w3-border w3-text-blue" value="<?php echo $id;?>" autocomplete="off" required>
	<input type="text" name="title" class="w3-input w3-border w3-text-blue" placeholder="Testimony Title" autocomplete="off" required>
      </div>
		<div class="modal-footer">
	<a class="w3-button w3-light-grey" data-dismiss="modal" aria-hidden="true" style="border-radius:10px; text-decoration:none;"><i class="glyphicon glyphicon-remove icon-white"></i> Cancel</a>
<button  style="border-radius:10px; text-decoration:none;" name="update" class="w3-button w3-green w3-hover-green" title="Update" ><i class="glyphicon glyphicon-edit icon-white"></i> Update</button>
</form>
												</div>
    </div>
										</div>
									</div>
	<?php
	}
	}
	?>

	</tbody>
	</table>

</div>
</div>
</body>
<script>
$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    //something is entered in search form
    $('#system-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
        }
    });
});
</script>
</html>