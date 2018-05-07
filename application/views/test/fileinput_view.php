<link href="<?=base_url('assets/fileinput/css/fileinput.css');?>" media="all" rel="stylesheet" type="text/css"/>

<script src="<?=base_url('assets/fileinput/js/fileinput.js');?>" type="text/javascript"></script>
<script src="<?=base_url('assets/fileinput/themes/explorer/theme.js');?>" type="text/javascript"></script> 
<div class="container" style="margin-top:150px">

	<form method="post" enctype="multipart/form-data" style="background: #FFF;">
		    <label class="control-label">Select File</label>
		    <input type="hidden" name="test" value="<?=date('m d, y');?>" >
    		<input id="input-2" name="userfile[]" type="file" class="file" multiple data-show-upload="true" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg", "png", "gif"]' />
    		<input class="btn btn-default pull-right" type="submit" value="submit">
	</form>
</div>
<style type="text/css">
	
nav{
	opacity: .1 !important;
	visibility:hidden;
}
</style>
<script type="text/javascript">
	$(function(){
	    $("input[type=submit]").click(function(e){
	    	alert('test');
	        var $fileUpload = $("input[type=file]");
	        if (parseInt($fileUpload.get(0).files.length)>2){
		         alert("You can only upload a maximum of 2 files");
		         
	        }
	        e.preventDefault();
	       
	    });    
	});​

</script>