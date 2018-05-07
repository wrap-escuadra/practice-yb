

<div style="padding:10px;">
  <a href="<?=base_url('welcome');?>" ><img src="<?=base_url('assets/images/system/yblogo.svg');?>" height="30" alt=""></a>
</div>




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
    <form action="" method="post">
      <input style="border-width:3px;" type="text" name="username"    value="<?=set_value('username','');?>" class="form-control" placeholder="Login">
      <br>
      <div class="input-group">
        <input style="border-width:3px;" type="password" name="password" class="form-control" placeholder="Password">
        <div class="input-group-btn">
          <button type="submit" class="btn btn-primary" >Login</button>
        </div>
      </div>

    </form>
    <div style="left" width="100%"><a href="#" class="adSearchplus">Forget Password</a></div>
</div>