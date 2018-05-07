
</div>
<div style="height: 35px"></div>
<div style="position:fixed; z-index:999; background-color:#0086b5; color:#fff; width:100%; bottom:0; left:0; font-size:10px; text-align:center; padding:5px; margin-top:20px;">
	Terms & Conditions
</div>

<script type="text/javascript" src="<?=base_url('assets/js/script.js');?>"></script>
<script type="text/javascript">
	$(function(){
		<?php 
			if( $this->session->flashdata('pop') != "" || validation_errors() != "" ){ ?>
				$('#sysModal').modal('show');
		<?php }  ?>
	});
</script>
<?php
if ( isset($customJS) ) {
 	foreach($customJS as $js){  ?>
		<script type="text/javascript" src="<?=base_url('assets/js/'.$js.'.js?'.time());?>"></script>
<?php 
	} //end  foreach($customJS as $js)
} //end isset($customJS)
 ?>

<div id="sysModal" class="modal fade in " data-backdrop="static" role="dialog" style="top: 20%">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times</button>
          <h4 class="modal-title"><img src="<?=site_url('assets/images/system/yb_logowhite.svg');?>" alt="logo" height="30">
              <?=APP_NAME;?>
          </h4>
        </div>
        <div class="modal-body">
           <?=validation_errors();?>
           <?=$this->session->flashdata('pop');?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</body>
</html>