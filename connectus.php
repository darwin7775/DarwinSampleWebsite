<html>
<head>
</head>
<body class="w3-light-grey">
<?php
include('sidebar.php');
?>
<div class="w3-main" style="margin-left:300px;margin-top:60px;">
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-envelope"></i> Connect Us</b></h5>
  </header>
    <div class="w3-row w3-container" style="margin-bottom:1%; margin-top:2%;">
  <div class="w3-third">
  <label>Search Bar</label>
    <input class="form-control" id="system-search" name="q" placeholder="Search Here..." /> 
	</div>
	</div>
  <div class="w3-container" style="height:70%; overflow:auto;">
    <table class="w3-table w3-bordered w3-border w3-hoverable w3-white table-list-search">
	<thead class="w3-blue">
	<tr>
	<th>Email Address</th>
	<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
	include('dbcon.php');
	$data = mysqli_query($con,"select * from connectus") or die(mysqli_connect_error());
	$count = mysqli_num_rows($data);
	if($count < 1)
	{
		?>
		<td colspan="2" class="w3-red">No data</td>
		<?php
	}
	else
	{
		while($row = mysqli_fetch_array($data))
		{
			 $id = mysqli_real_escape_string($con,$row['User_ID']);
			
	?>
	<tr>
	<td><?php echo mysqli_real_escape_string($con,$row['Email_Add']);?></td>
	<td>
	<a href="#Delete<?php echo $id;?>" data-toggle="modal" data-placement="top" data-target="#Delete<?php echo $id;?>" class="w3-button w3-red w3-hover-red" style="border-radius:9px;" title="Remove"><i class="fa fa-remove"></i></a>
	</td>
		
	</tr>
			<div class="modal fade" id="Delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">

		      <div class="modal-body">
	<div class="alert alert-danger">
	<p>Are you sure do you want to remove?</p>
	</div>
      </div>
		<div class="modal-footer">
	<a class="w3-button w3-light-grey" data-dismiss="modal" aria-hidden="true" style="border-radius:10px; text-decoration:none;"><i class="glyphicon glyphicon-remove icon-white"></i> Cancel</a>
<a href="remove-connect-us/<?php echo mysqli_real_escape_string($con,$id); ?>"  style="border-radius:10px; text-decoration:none;" class="w3-button w3-blue" ><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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