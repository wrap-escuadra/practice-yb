<style type="text/css">
	.picEdit{
		position: absolute;
		right: 20px;
		bottom: 24px;
	}
	.thumbnail{
		background: red;
	}
	.thumbnail > image{
		max-height: auto;
	}
</style>
 <div class="container">
	<div class="row">
		<?php foreach($pictures as $pic): ?>
		<div class="col-xs-4 " >
			<div class="thumbnail text-center">
				<img   class=" img-responsive img-round" src="<?=base_url('assets/_uploads/profile_headers/'.$pic['img']);?>">
				<div class="btn btn-default picEdit">
					<span class="glyphicon glyphicon-pencil"></span>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<?php for($x = count($pictures); $x<3 ; $x++): ?>
		<div class="col-xs-4">
			<div class="thumbnail">
				<img   class=" img-responsive img-round" src="<?=base_url('assets/_uploads/profile_headers/no-image.jpg');?>">
				<div class="btn btn-default picEdit">
					<span class="glyphicon glyphicon-pencil"></span>
				</div>
			</div>
		</div>
		<?php endfor; ?>
 	</div>

 	<div class="container">
 		<div class="col-md-6">
	 		<div class="form-group">
	 			
				<label>Last Name</label>
				<input type="text" name="last_name" value="<?=set_value('last_name') == '' ? $student['last_name'] : set_value('last_name'); ?>" class="form-control">
				
			</div>
	
 			<div class="form-group">
 				<label>First Name</label>
				<input type="text" name="first_name" value="<?=set_value('first_name') == '' ? $student['first_name'] : set_value('first_name'); ?>" class="form-control">
			</div>
		
 			<div class="form-group">
 				<label>Middle Name</label>
				<input type="text" name="middle_name" value="<?=set_value('middle_name') == '' ? $student['middle_name'] : set_value('middle_name'); ?>" class="form-control">
			</div>
			
			<div class="form-group">
 				<label>Email Address</label>
				<input type="text" name="middle_name" value="<?=set_value('email') == '' ? $student['email'] : set_value('email'); ?>" class="form-control">
			</div>
		
		</div>
		<div class="col-md-6">
			<ul>
			<?php foreach($awards as $award): ?>
				<li><?=$award['award_description']?></li>
			<?php endforeach; ?> 
			<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-plus"></span> award</button>
			</ul>
		</div>
	</div>
 
</div>