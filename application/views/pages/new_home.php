
<?php if(!$this->session->userdata('logged_in')){ ?>
<div style="padding:10px;">
  <a class="adSearchtxt" href="<?=site_url('user/login');?>" ><img src="<?=base_url('assets/images/system/profile.svg');?>" height="25" alt=""> Login</a>
</div>
<?php } ?>


<style>

.ram.cent-cont{
    width:300px;
    height:300px;
    position:absolute;
    left:50%;
    top:50%;
    margin: -150px 0 0 -150px;
}

.ram a.adSearchplus {
    font-family: 'Roboto', sans-serif; 
    font-size:14px;
    color:#35A8E0;
    text-decoration: none;
}

.ram a.adSearchplus:hover {
    color:#24516D;
    text-decoration: none;
}

.ram a.adSearchtxt {
    font-family: 'Roboto', sans-serif; 
    font-size:12px;
    color:#35A8E0;
    text-decoration: none;
}

.ram a.adSearchtxt:hover {
  text-decoration: none;
  color:#999;
}

</style>


<div class="cent-cont ram" align="center">
    
    <img src="<?=base_url('assets/images/system/main-logo.svg');?>" alt="Logo" height="50%">

    <br><br>

    <form>

    <div class="input-group">
    <input style="border-width:3px;" type="text" class="form-control" placeholder="">
    <div class="input-group-btn">
        <button class="btn btn-primary" type="submit">
          Search
        </button>
      </div>
     </div>

    </form>

 
  
</div>