<style type="text/css">
	.sch-logo{
		width: 100px;height: 100px;

	}
	.sch-logo img{
		/*position: relative;*/
		width: 100%;
		height: 100%;
		
	}

</style>
<div class="container conpad">
	<div class="row">
		<div class="col-md-4 col-md-push-8 text-center thumbnail ">

				<img class="img-thumbnail img-circle img-responsive  " src="<?=site_url('assets/images/system/no-image.jpg');?>" alt="school logo" />
		</div>
		<div class="col-md-8	 col-md-pull-4 h2">
				<?=$school_info['school_name']. ' - '.$school_info['school_city'];?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
				<form class="" action="" method="post">
				  	<div class="form-group row">
				  		<div class="col-md-6">
				  			<input type="hidden" name="school_id" value="<?=$school_id;?>">
						    <label class="" for="username">Username:</label>
						    <input type="text" class="form-control" name="username" value="<?=set_value('username');?>">
					    </div>
				  	</div>	
				  	<p class="h3">Name :</p>
				  	<div class="row">
				  		<div class="col-md-5">
					  		<label class="" for="last_name">Last </label>
					  		<input class="form-control" type="text" name="last_name" value="<?=set_value('last_name');?>" maxlength="50">
				  		</div>
				  		<div class="col-md-5">
					  		<label class="" for="first_name">First </label>
					  		<input class="form-control" type="text" name="first_name"  value="<?=set_value('first_name');?>" maxlength="50">
				  		</div>
				  		<div class="col-md-2">
					  		<label class="" for="middle_name">Middle </label>
					  		<input class="form-control" type="text" name="middle_name" value="<?=set_value('middle_name');?>" maxlength="50">
				  		</div>
				  	</div>
				  	<p class="h3">Contact :</p>

				  	<div class="form-group row">
				  		<div class="col-md-4">
					  		<label class="" for="middle_name">Email </label>
					  		<input class="form-control" type="text" name="email" value="<?=set_value('email');?>" maxlength="50">
				  		</div>
				  		<div class="col-md-4">
					  		<label class="" for="middle_name">Mobile </label>
					  		<input class="form-control" type="text" name="mobile" value="<?=set_value('mobile');?>" maxlength="11">
				  		</div>
				  		<div class="col-md-4">
					  		<label class="" for="middle_name">Landline </label>
					  		<input class="form-control" type="text" name="landline" value="<?=set_value('landline');?>" maxlength="11">
				  		</div>
				  	</div>
					
				  <button type="submit" name="school_admin" class="btn-lg btn-primary col-md-offset-1 col-md-10">Submit</button>
				</form>
				
			</div>

	</div>
</div>