<?php $this->load->view('includes/datatable_css');?>
<?php $this->load->view('includes/datatable_js');?>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable(
		 {
	        "columnDefs": [ 
		        {
	          	"targets": 1,
	          	"orderable": false,

			    } ,
			    { orderable: false, targets:0 }
			     
		    ],
		    "order": [[ 2, "asc" ]],

		}
	);
} );
//"order": [[ 3, "desc" ]]
		// $(function(){
		// 	alert();
		//     $('#example').DataTable();
		//     alert();
		// } );
</script>
<div class="container conpad">
	<div class="row">
		<div class="col-md-6 h2">Students</div>
		<div class="col-md-6"><a href="<?=site_url('school/add_student');?>">
		<button type="button" class="btn btn-primary ">Add Student </button></a>
		</div>
		
		<div class="col-md-12">
			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				 <thead>
		            <tr>
		            	<th class="no-sort"></th>
		                <th></th>
		                <th>Name</th>
		                <th>username</th>
		                <th>Batch</th>
		                <th>Course</th>
		                
		            </tr>
		        </thead>
		        <tbody>
						<?php if(empty($students)) echo '<tr><td colspan="5" align="center">No records found.</td></tr>'  ?>
						<?php 
						foreach($students as $stu): ?>
						<tr>
							<td><a href="javascript:void(0)">edit</a></td>
							<td><a href="javascript:void(0)">deactivate</a></td>
							<td><?=$stu['last_name'].', '.$stu['first_name'].' '.$stu['middle_name'];?></td>
							<td><?=$stu['username'];?></td>
							<td><?=$stu['batch_year']?></td>
							<td><?=$stu['course_desc'];?></td>
							
						</tr>
					<?php endforeach; //($students as $stu): ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

