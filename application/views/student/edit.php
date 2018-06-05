<style type="text/css">
	

	.awards  .input-group {
		margin-top: 1px;
	}
	.yb-img img{
		max-height: 140px;
	}

	.picEdit{
		position: absolute;
		right: 20px;
		bottom: 24px;
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
	<div class="row">
		<?=$this->session->flashdata('pop');?>
		<?php foreach($pictures as $pic): ?>
		<div class="col-xs-4 " >
			<div class="thumbnail yb-img">
				<img   class=" img-responsive img-round" src="<?=base_url('assets/_uploads/profile_headers/'.$pic['img']);?>">
				<div class="btn btn-default picEdit">
					<span class="glyphicon glyphicon-pencil"></span>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<?php for($x = count($pictures); $x<3 ; $x++): ?>
		<div class="col-xs-4">
			<div class="thumbnail yb-img">
				<img   class=" img-responsive img-round" src="<?=base_url('assets/_uploads/profile_headers/no-image.jpg');?>">
				<div class="btn btn-default picEdit">
					<span class="glyphicon glyphicon-pencil"></span>
				</div>
			</div>
		</div>
		<?php endfor; ?>
 	</div>
	<form action="" method="post" enctype="multipart/form-data" >
		<div class="row">
			<?php 
				
			?>
			<div class="col-md-7 ">

				<div class="">
					<h1 class="">Student Info</h1>
					
					<div class=" input-div">
						<label>Last Name <span class="text-danger small">(required)</span></label>
						<input class="form-control alpha input-sm" name="last_name" value="<?=set_value('last_name') != '' ? set_value('last_name') : $student['last_name'];?>" maxlength="50"   />
					</div>
					<div class=" input-div">
						<label>First Name <span class="text-danger small">(required)</span></label>
						<input class="form-control alpha input-sm" name="first_name" value="<?=set_value('first_name') != '' ? set_value('first_name') : $student['first_name'];?>"  maxlength="50" >
					</div>
					<div class=" input-div">
						<label>Middle Name </label> 
						<input class="form-control alpha input-sm" name="middle_name" value="<?=set_value('middle_name') != '' ? set_value('middle_name') : $student['middle_name'];?>" maxlength="50">
					</div>
					<div class=" input-div">
						<input type="hidden" name="profile_id" value="<?=iencode($student['profile_id']); ?>">
						<label>Birth Date <span class="text-danger small">(required)</span></label> 
						<input class="form-control text-right datepicker nopress input-sm" value="<?=set_value('birth_date') ? set_value('birth_date') : date('m/d/Y', strtotime($student['birth_date']) );?>"   name="birth_date" >
					</div>
					<div class=" input-div">
						<label>Batch Year <span class="text-danger small">(required)</span></label> 
						<!-- <input class="form-control text-right number input-sm" type="number" min="1950" value="<?=(set_value('batch_year') != "") ? set_value('batch_year') : date('Y');?>"  name="batch_year" maxlength="50"> -->
						<select class="selectpicker form-control input-sm" data-live-search="true" title="--select batch--" name="batch_year" >
							<?php 
								$byear = set_value('batch_year') ? set_value('batch_year') : $student['batch_year']; 
								foreach($years as $yr){  ?>
									<option value="<?=$yr['id'];?>" <?=$byear == $yr['id'] ? 'selected' : ''; ?> >
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
							<?php 
							$stud_course = set_value('course_id') ? set_value('course_id') : $student['course_id'];
							foreach($courses as $course){ ?>
								<option value="<?=$course['course_id'];?>" <?=($stud_course == $course['course_id']) ? 'selected' : ''; ?> >
									<?=$course['course_code'] . " - " . $course['course_desc']; ?></option>
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
						    <input  type="email" class="form-control input-sm" name="email"  value="<?=set_value('email') ? set_value('email') : $student['email'];?>">
					  	</div>

					</div>
					<button class="btn-lg btn-primary col-xs-10 col-xs-offset-1 text-center" name="action" value="info" type="submit">Update Student Info</button>
				</div>
			</div>

    </form>
		<div class="col-md-5 ">
			<div class="">
				<h1>Achievements & Awards</h1>
				<form method="post">
				<div class="awards">
						<input type="hidden" name="profile_id" value="<?=iencode($student['profile_id']); ?>">
						<?php 
						if(@(set_value('awards')) ){
						foreach(set_value('awards') as $aw){
						    if($aw != '' ):
						    ?>

							<div class="input-group">
							    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
							    <input  type="text" class="form-control" value="<?=$aw;?>" name="awards[]" placeholder="" maxlength="100">
						  	</div>
						<?php endif; } }else{
							foreach($awards as $award): ?>
							<div class="input-group">
							    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
							    <input  type="text" class="form-control" value="<?=$award['award_description'];?>" name="awards[]" placeholder="" maxlength="100">
						  	</div>
						<?php
							endforeach;
						} ?>
						<!-- <input class="form-control" type="text" name="awards[]" maxlength="100"> -->

						<div class="input-group">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
						    <input  type="text" class="form-control" name="awards[]" placeholder="" maxlength="100">
					  	</div>
					</div>
				<br class="clear-fix">
				<button class="btn btn-default add-award pull-right" type="button" ><span class="glyphicon glyphicon-plus"></span></button>
				<br class="clear-fix">
				<br>
					  	<button class="btn-lg btn-primary col-xs-10 col-xs-offset-1 text-center"  name="action" value="award" type="submit">Update Student Awards</button>
				  </form>

				<br />
				<br />
			</div>
			<!-- <div class="">
			<h1>Graduation Picture</h1>
				<label class="control-label">Select Pictures (3)</label>

	    		<input id="input-image"  name="userfile[]" type="file" class="file lfile-loading " multiple data-max-file-count="3" data-max-file-size="1000" data-show-upload="true" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg", "png", "gif"]' accept="image/*" />
	    		<!-- <input id="input-image"  name="userfile[]" type="file" class="file lfile-loading " multiple data-max-file-count="2" data-show-upload="true" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg", "png", "gif"]' accept="image/*" /> -->
			</div>	 
			
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

