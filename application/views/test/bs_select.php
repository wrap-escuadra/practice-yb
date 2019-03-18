
<link rel="stylesheet" type="text/css" href="<?=site_url('assets/bootstrap_select/bootstrap-select.css');?>">
<script type="text/javascript" src="<?=site_url('assets/bootstrap_select/bootstrap-select.js');?>"></script>


<body>
<div class="container" >
	<div class="row">
		<div class="col-md-12">
			<select class="selectpicker" data-live-search="true">
				<option disabled selected value> -- Select Course -- </option>
				<?php foreach($courses as $course){ ?>
					<option value="<?=iencode($course['course_desc']);?>" data-tokens="<?=$course['course_desc']?>"><?=$course['course_desc'].' - '.$course['course_desc']?></option>
				<?php } ?>
			</select>
		</div>
	</div>

</div>
<script type="text/javascript">
	$(function(){
		$('select').selectpicker();
		// alert();
	});
</script>

