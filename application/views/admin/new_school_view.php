<link href="<?=base_url('assets/fileinput/css/fileinput.css');?>" media="all" rel="stylesheet" type="text/css"/>
<script src="<?=base_url('assets/fileinput/js/fileinput.js');?>" type="text/javascript"></script>
<div class="container" >
	<div class="row">
		<form method="post" enctype="multipart/form-data">
			
			<div class="col-md-12 " >

				<div class="formdiv">
					<div class="h1 col-md-12">Add new School</div>
					
					<div class=" input-div">
						<label>School Name <span class="text-danger small">(required)</span></label> 
						<input class="form-control alpha input-sm" name="school_name" value="<?=set_value('school_name');?>" maxlength="100"   />
					</div>
					<div class=" input-div">
						<label>School Abbreviation <span class="text-danger small">(required)</span></label> 
						<input class="form-control alpha text-uppercase input-sm" name="school_abbr" value="<?=set_value('school_abbr');?>" maxlength="10"   />
					</div>
					<div class=" input-div">
						<label>School Location</label> 
						<p>City / Province <label><span class="text-danger small">(required)</span></label><input class="form-control input-sm" name="school_city" value="<?=set_value('school_city');?>" maxlength="50"></p>
						<p>Address</p>
						<textarea name="school_address" class="form-control" rows="5" maxlength="150" style="resize:vertical"><?=set_value('school_address');?></textarea>
					
						
						<p>State / Region <input class="form-control input-sm" name="school_region" value="<?=set_value('school_region');?>" maxlength="50"></p>
						<p>Country 
							<!-- <input class="form-control" name="school_country" value="<?=set_value('school_country');?>" maxlength="50"> -->
							<select name="country" class="selectpicker form-control input-sm" data-live-search="true" title="--select country--">
								<!-- <option disabled selected="">-- select country --</option> -->
							<?php foreach($countries as $country){ ?>
								<option value="<?=iencode($country['country_id']);?>" <?=set_select('country',iencode($country['country_id']) ); ?>><?=$country['country_name'];?></option>
							<?php } ?>
							</select>
							<div class="text-center"><a href="javascript:void(0)"  class="addCountry" data-toggle="modal" data-target=".form-modal">Add new country</a><div>
						</p>
					</div> 

					<div class="input-div hide">
						<label>School Description</label>
						<textarea name="school_description" class="form-control " rows="5" maxlength="200" style="resize:vertical"><?=set_value('school_description');?></textarea>
					</div>
				</div>
			</div>
			<div class="col-md-5 hide ">
				<div class="formdiv">
					<h3>School Logo</h3>
					<label class="">Select Picture</label>
		    		<input id="input-image"  name="school_logo" type="file" class="file "  data-show-upload="true" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg", "png"]'  accept="image/jpg,image/jpeg,image/x-png" /> <!-- accept="image/*" -->
	    		</div>
	    		<div class="formdiv">
					<h3>School Banner</h3>
					<label class="">Select Picture</label>
		    		<input id="input-image"  name="school_banner" type="file" class="file "  data-show-upload="true" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg"]' accept="image/jpg,image/jpeg"/>
	    		</div>
			</div>	
			<div class="col-xs-8 col-xs-offset-2">
				<div>
					<button class="btn-lg btn-primary col-xs-10 col-xs-offset-1 text-center"  type="submit">Submit School Profile</button>	
				</div>
				
			</div>
		
		</form>
	</div>


	<div id="myModal" class="form-modal modal fade" role="dialog">
	    <div class="modal-dialog">
	      	<div class="modal-content">
	          	<div class="modal-body">
		            <button type="button" class="close" data-dismiss="modal">&times;</button>
		            <div class="row">
		              	<?php echo $country_form;?>
		            </div>
	          	</div>
	      	</div>
	    </div>
	</div>

</div>