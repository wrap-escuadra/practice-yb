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

				<div class="">
					<h1 class="">Student Info</h1>
					
					<div class=" input-div">
						<label>Last Name <span class="text-danger small">(required)</span></label>
						<input class="form-control alpha input-sm" name="last_name" value="<?=set_value('last_name');?>" maxlength="50"   />
					</div>
					<div class=" input-div">
						<label>First Name <span class="text-danger small">(required)</span></label>
						<input class="form-control alpha input-sm" name="first_name" value="<?=set_value('first_name');?>"  maxlength="50" >
					</div>
					<div class=" input-div">
						<label>Middle Name </label> 
						<input class="form-control alpha input-sm" name="middle_name" value="<?=set_value('middle_name');?>" maxlength="50">
					</div>
					<div class=" input-div">
						<label>Birth Date <span class="text-danger small">(required)</span></label> 
						<input class="form-control text-right datepicker nopress input-sm" value="<?=set_value('birth_date');?>"   name="birth_date" >
					</div>
					<div class=" input-div">
						<label>Batch Year <span class="text-danger small">(required)</span></label> 
						<!-- <input class="form-control text-right number input-sm" type="number" min="1950" value="<?=(set_value('batch_year') != "") ? set_value('batch_year') : date('Y');?>"  name="batch_year" maxlength="50"> -->
						<select class="selectpicker form-control input-sm" data-live-search="true" title="--select batch--" name="batch_year" >
							<?php foreach($years as $yr){  ?>
								<option value="<?=$yr['id'];?>" <?=set_select('batch_year',$yr['id']); ?> >
									<?=$yr['school_year']; ?>
								</option>
							<?php  } //end foreach($years as $yr){?>
						</select>
						<div class="text-center" style="padding-top:10px">
							<a href="javascript:void(0)" id="addYear">Add new school year </a>
						</div>

					</div>

					<div class=" input-div">
						<label>Course <span class="text-danger small">(required)</span></label> 
						<!-- <select class="form-control input-sm" name="course_id" > -->
						<select class="selectpicker form-control input-sm" data-live-search="true" title="--select course--" name="course_id" >
						
							<option value="">-Select Course-</option>
							<?php foreach($courses as $course){ ?>
								<option value="<?=$course['course_id'];?>" <?=(set_value('course_id') == $course['course_id']) ? 'selected' : ''; ?> > <?=$course['course_code'] . " - " . $course['course_desc']; ?></option>
							<?php } //end foreach course ?>
						</select>
						<div class="text-center" style="padding-top:10px">
							<a href="javascript:void(0)" id="addCourse">Add new course </a>
						</div>
						
					</div>	
	
					<div class=" input-div">
                            <label>Email Address </label>
						<div class="input-group">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						    <input  type="email" class="form-control input-sm" name="email"  value="<?=set_value('email');?>">
					  	</div>

					</div>

				</div>
			</div>

            <p>
		<div class="col-md-5 ">
			<div class="">
				<h1>Achievements & Awards</h1>
				<div class="awards">
					<?php 
					if(@set_value()){
					foreach(set_value('awards') as $aw){
					    if($aw != '' ):
					    ?>

						<div class="input-group">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
						    <input  type="text" class="form-control" value="<?=$aw;?>" name="awards[]" placeholder="" maxlength="100">
					  	</div>
					<?php endif; } } ?>
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
			<div class="">
			<h1>Graduation Picture</h1>
				<label class="control-label">Select Pictures (3)</label>

	    		<input id="input-image"  name="userfile[]" type="file" class="file lfile-loading " multiple data-max-file-count="3" data-max-file-size="1000" data-show-upload="true" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg", "png", "gif"]' accept="image/*" />
	    		<!-- <input id="input-image"  name="userfile[]" type="file" class="file lfile-loading " multiple data-max-file-count="2" data-show-upload="true" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg", "png", "gif"]' accept="image/*" /> -->
			</div>	
			
		</div>
		<div class="col-xs-8 col-xs-offset-2">
		<br>
			<button class="btn-lg btn-primary col-xs-10 col-xs-offset-1 text-center" type="submit">Submit Student Profile</button>
		</div>
		</div>
	</form>
</div>
<!--course modal -->
<div id="courseModal" class="form-modal modal fade" role="dialog">
    <div class="modal-dialog">
      	<div class="modal-content">
          	<div class="modal-body">
	            <button type="button" class="close" data-dismiss="modal">&times;</button>
	            <div class="row">
	              	<?php echo $course_form;?>
	            </div>
          	</div>
      	</div>
    </div>
</div>
<!--end course modal -->

<!--batch modal -->
<div id="batchModal" class="form-modal modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row">
                    <?php echo $batch_form;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end batch modal -->

<script type="text/javascript">
	$(function(){
		
	});
</script>

