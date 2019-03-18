<link rel="stylesheet" type="text/css" href="<?=base_url('assets/footable/css/footable.bootstrap.min.css');?>">
<script type="text/javascript" src="<?=base_url('assets/footable/js/footable.js');?>"></script>

<div class="container conpad">
	<div class="row">
		<div class="col-md-12 h1 ">Students <a href="<?=site_url('school/add_student');?>" class="btn btn-default btn-xs" title="add new student"><span class="glyphicon glyphicon-plus"></span></a></div>
		<div class="col-md-12">
		
		</div>
		<?php //	debug($this->session->all_userdata()); ?>
		<div id="filterDiv" class="col-md-6 ">
		</div>
		<div class="col-md-6 text-right">
			<label>Records per page &nbsp;&nbsp;&nbsp;&nbsp;</label>
				<select name="pageSize" class="form-control pull-right" style="width: 80px">
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="30">30</option>
				</select>
		</div>
		<div class="col-xs-12"><br /></div>
		<div class=" col-md-12 ">
			<div class="table-responsive ">
				<table class="table table-hover table-striped table-bordered"   >
				</table>
			</div>
		</div>
		<div id="linksDiv" class="col-xs-12"></div>
		
	</div>
</div>

<script type="text/javascript">

	
	$(function(){
		$('.table').footable(
			{
				paging : {
					enabled: true,
					size: 10,
					position: "center",
					countFormat: "showing {PF} to {PL} of {TR} records",
					limit: 5,
					container: '#linksDiv'
				
				},		
				sorting:{
					enabled: true,
				},
				filtering:{
					enabled: true,
					connectors: false,
					min: 1,
					container: '#filterDiv',
					position: 'left',
					"dropdownTitle": "Search fields:",
					
				},
				columns: $.get(base_url+'school/studentColumns'),
				rows: $.get(base_url+'school/getSchoolStudents')
			}
		);
	});//end jquery


	

	
	$('select[name=pageSize]').on('change', function(e){
		e.preventDefault();
		var newSize = $(this).val();
		FooTable.get('table').pageSize(newSize);
	});


	
</script>