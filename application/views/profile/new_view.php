<style type="text/css">
	

	.awards  .input-group {
		margin-top: 10px;
	}
	
	/*.file-zoom-content{
		background: #000;
	}*/
	/*.file-preview-frame img,
	.krajee-default img,  
	.kv-preview-thumb img{
		height: 50px !important;
	}*/
</style>
<link href="<?=base_url('assets/fileinput/css/fileinput.css');?>" media="all" rel="stylesheet" type="text/css"/>
<script src="<?=base_url('assets/fileinput/js/fileinput.js');?>" type="text/javascript"></script>

<div class="container" >
	<form action="" method="post" enctype="multipart/form-data" >
		<div class="row">
			<?php 
				
			?>
			<div class="col-md-7 ">

				<div class="formdiv">
					<h1 class="">Student Info</h1>
					<p>Fields with <span class="text-danger h3">*</span> are required</p>
					<div class=" input-div">
						<label>Last Name <span class="text-danger h3">*</span></label> 
						<input class="form-control alpha" name="last_name" value="<?=set_value('last_name');?>" maxlength="50" required  />
					</div>
					<div class=" input-div">
						<label>First Name <span class="text-danger h3">*</span></label>
						<input class="form-control alpha" name="first_name" value="<?=set_value('first_name');?>"  maxlength="50" required>
					</div>
					<div class=" input-div">
						<label>Middle Name </label> 
						<input class="form-control alpha" name="middle_name" value="<?=set_value('middle_name');?>" maxlength="50">
					</div>
					<div class=" input-div">
						<label>Birth Date <span class="text-danger h3">*</span></label> 
						<input class="form-control text-right datepicker nopress" value="<?=set_value('birth_date');?>"   name="birth_date" required>
					</div>
					<div class=" input-div">
						<label>Batch Year <span class="text-danger h3">*</span></label> 
						<input class="form-control text-right number" type="number" min="2000" value="<?=(set_value('batch_year') != "") ? set_value('batch_year') : date('Y');?>"  name="batch_year" maxlength="50">
					</div>

					<div class=" input-div">
						<label>Course <span class="text-danger h3">*</span></label> 
						<select class="form-control" name="course_id" required>
							<option value="">-Select Course-</option>
							<?php foreach($courses as $course){ ?>
								<option value="<?=$course['course_id'];?>" <?=(set_value('course_id') == $course['course_id']) ? 'selected' : ''; ?> > <?=$course['course_code'] . " - " . $course['course_desc']; ?></option>
							<?php } //end foreach course ?>
						</select>
					</div>	
	
					<div class=" input-div">
						<label>Email Address <span class="text-danger h3">*</span> </label> 
						<div class="input-group">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						    <input  type="email" class="form-control" name="email"  value="<?=set_value('email');?>">
					  	</div>

					</div>

				</div>
			</div>
		

		<div class="col-md-5 ">
			<div class="formdiv">
				<h1>Achievements & Awards</h1>
				<div class="awards">
					<?php 
					if(@set_value()){
					foreach(set_value('awards') as $aw){ ?>
						<!-- <input class="form-control" type="text" value="<?=$aw;?>" name="awards[]" maxlength="100"> -->
						<div class="input-group">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
						    <input  type="text" class="form-control" value="<?=$aw;?>" name="awards[]" placeholder="" maxlength="100">
					  	</div>
					<?php } } ?>
					<!-- <input class="form-control" type="text" name="awards[]" maxlength="100"> -->
					<div class="input-group">
					    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
					    <input  type="text" class="form-control" name="awards[]" placeholder="" maxlength="100">
				  	</div>
				</div>
				<br />
				
				<button class="btn btn-default add-award pull-right" type="button" ><span class="glyphicon glyphicon-plus"></span></button>
				<br />
				<br />
			</div>
			<div class="formdiv">
			<h1>Graduation Picture</h1>
				<label class="control-label">Select Picture</label>

	    		<input id="input-image"  name="userfile[]" type="file" class="file " multiple data-show-upload="true" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg", "png", "gif"]' accept="image/*" />
			</div>	
			
		</div>
		<div class="col-xs-8 col-xs-offset-2">
		<br>
			<button class="btn-lg btn-primary col-xs-10 col-xs-offset-1 text-center" type="submit">Submit Student Profile</button>
		</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(function(){
		$(document).on('click','.add-award',function(){
			$('.awards').append('<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input' +
							'  type="text" class="form-control" name="awards[]" placeholder="" maxlength="100"></div>');
		});

		

	});
 	
</script>

