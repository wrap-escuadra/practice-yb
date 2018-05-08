	
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>DataTables example - Bootstrap styling</title>
	<?php $this->load->view('includes/datatable_css');?>
	<?php $this->load->view('includes/datatable_js');?>
	<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );



	</script>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>First name</th>
		                <th>Last name</th>
		                <th>Position</th>
		                <th>Office</th>
		                <th>Age</th>
		                <th>Start date</th>
		            </tr>
		        </thead>
		        <tbody>
						<?php if(empty($students)) echo '<tr><td colspan="5" align="center">No records found.</td></tr>'  ?>
						<?php 
						foreach($students as $stu): ?>
						<tr>
							<td><?=$stu['last_name'].', '.$stu['first_name'].' '.$stu['middle_name'];?></td>
							<td><?=$stu['username'];?></td>
							<td><?=$stu['batch_year']?></td>
							<td><?=$stu['course_desc'];?></td>
							<td><a href="javascript:void(0)">edit</a></td>
							<td><a href="javascript:void(0)">deactivate</a></td>
						</tr>
					<?php endforeach; //($students as $stu): ?>
				</tbody>
		    </table>
		</div>
	</div>
</div>

	

</body>
</html>