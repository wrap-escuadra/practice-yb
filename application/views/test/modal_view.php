<style type="text/css">
  .padd{
    margin-top: 150px;
  }

  
</style>
<script type="text/javascript">
  $(function(){
    $('#sysModal').modal('show');
  });
</script>
<div class="padd">
  <div id="sysModal" class="modal fade in " data-backdrop="static" role="dialog">
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
</div>