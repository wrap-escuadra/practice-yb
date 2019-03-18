<style>

body {
  background-color:#fff;
}

.center-div
{
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 250px;
  height: 350px;

}

</style>


<div class="center-div">

  <div align="center" ><img src="<?=base_url('assets/images/system/yp-logo2.svg');?>" alt="Logo" height="200"><br></div>

  <input type="text" placeholder="Search..." class="form-control" id="" style="height:50px; border-width:6px; border-radius:25px; max-width:275px; border-color:#0086b5;" >



  <div style=" width:250px; background-color:#999;">
          <div class="col-xs-4" style="text-align:center; margin-top:5px;">
            <a href="result.php"><img src="<?=base_url('assets/images/system/button-bygraduates.svg');?>" alt="bygraduates" height="50" style="padding-left:5px; padding-right:5px; margin-top:5px;"></a> <br>
            <div style="color:#999; margin-left:-4px; margin-top:0px;">Graduates</div>
          </div>

          <div class="col-xs-4" style="text-align:center;">
            <a href="result.php"><img src="<?=base_url('assets/images/system/button-byschool.svg');?>" alt="byschool" height="65" style="padding-left:5px; padding-right:5px;"></a> <br>
            <div style="color:#999; margin-left:5px; margin-top:-5px;">School</div>
          </div>

          <div class="col-xs-4" style="text-align:center; margin-top:2px;">
            <a href="result.php"><img src="<?=base_url('assets/images/system/button-bylocation.svg');?>" alt="bylocation" height="45" style="padding-left:5px; padding-right:5px; margin-top:10px;"></a> <br>
            <div style="color:#999;  margin-top:3px;">Location</div>
          </div>
  </div>
</div>
