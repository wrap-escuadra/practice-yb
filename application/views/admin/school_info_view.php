
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/footable/css/footable.bootstrap.min.css');?>">
<script type="text/javascript" src="<?=base_url('assets/footable/js/footable.js');?>"></script>
<div class="container">

	<div class="row">
		
		<div class="col-md-4 col-md-push-8 text-center thumbnail ">
				<img class="img-thumbnail img-circle img-responsive  " src="<?=site_url('assets/images/system/no-image.jpg');?>" alt="school logo" />
		</div>
		<div class="col-md-8 col-md-pull-4">
			<p class="h2"><?=$school['school_name'];?><?='('.$school['school_abbr'].')'; ?></p>
			<div class="col-md-12">
				<p>Last update: <?=date('F d, Y H:i:s', strtotime($school['last_updated']));?></p>

				<div class="col-md-12">
					<h4>Address: </h4>
					<p>
						<?=$school['school_address'];?><br />
						<?=$school['school_city'];?><br />
						<?=$school['school_region'];?><br />
						<?=$school['school_country'];?><br />
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<a href="<?=site_url('admin/school_admin_add/'.iencode($school['id']))?>" class="btn btn-primary">
				<span class="glyphicon glyphicon-plus "></span> School Admin
			</a>
			
		</div>
	</div>
		

	
	<div class="row">
		<div class="col-md-12">
			<p class="h4">Users: </p>
			<?php  ?>
		</div>
		<div class="col-xs-12" id="filterDiv" style="padding-bottom: 20px"></div>
		<br />
		<div class=" col-xs-12 ">
			<div class="table-responsive ">
				<table class="table table-hover table-striped table-bordered" 	  >
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
					min: 1,
					container: '#filterDiv',
					position: 'left',
					"dropdownTitle": "Search fields:",
					
				},
				columns: $.get(base_url+'admin/schoolUserColumns'),
				rows: $.get(base_url+'admin/getSchoolUser/<?=$school_id?>')
			}
		);
	});//end jquery

</script>