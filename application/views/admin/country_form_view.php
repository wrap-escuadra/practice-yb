

<style type="text/css">
	.form-modal .modal-content{
		border-radius: 0px !important;
	}
</style>


<form id="form-country" action="<?=site_url('admin/country_add');?>" method="post">
	<div class="form-msg col-xs-10 col-xs-offset-1">

	</div>
	<div class="form-group col-xs-10 col-xs-offset-1">
		<label for="country">Country</label>
		<input class="input-sm form-control" type="text" name="country" >
	</div>
	<div class="form-group col-xs-10 col-xs-offset-1">
		<label class="" for="zip_code">Country Code</label>
		<input class="form-control input-sm number" type="text" name="country_code" >
		
	</div>
	<div class="form-group col-xs-10 col-xs-offset-1">
		<button class=" btn-primary btn-sm col-xs-10 col-xs-offset-1" type="submit" name="">Submit</button>
	</div>
</form>