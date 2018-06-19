<aside class="sidebar closed" style="position:center; z-index:88; overflow:hidden; height: ">
  
  <ul class="sidebar__list" style="margin-top:35px; position:static; " >

    <div style="padding-left:30px;">
    <br>
      <div class="panel-title" style="margin-top:20px; width:300px;"><img src="<?=base_url('assets/images/system/sidepanel/button-control-gray.svg');?>" alt="messages" height="30" data-toggle="tooltip" style="margin-bottom:5px;">  Control Panel
        <div style="border-top: 3px solid #4ebad4; padding-top:10px; margin-top:10px; width:100%;"></div>
        <?php if($this->session->userdata['user_role'] == R_STUDENT){ ?>
          <a href="<?=site_url('student/edit/'.iencode($this->session->userdata('student_id')));?>" class="sidebar-box"> <img src="<?=base_url('assets/images/system/sidepanel/button-edit-profile.svg');?>" height="25" style="margin-bottom:5px; margin-right:10px;"> Edit Profile</a>
        <?php } ?>
        <a href="<?=site_url('school/');?>" class="sidebar-box"> <img src="<?=base_url('assets/images/system/yb_logowhite.svg');?>" height="25" style="margin-bottom:5px; margin-right:10px;"> Yearbook Creator<span class="sidebar_txt"> / School Only /</span></a>
        <a href="#" class="sidebar-box"> <img src="<?=base_url('assets/images/system/sidepanel/button-photo-gallery.svg');?>" height="25" style="margin-bottom:5px; margin-right:10px;"> Photo Gallery</a>
        <a href="#" class="sidebar-box"> <img src="<?=base_url('assets/images/system/sidepanel/button-pages.svg');?>" height="25" style="margin-bottom:5px; margin-right:10px;"> Pages <span class="sidebar_txt"> / School All /</span></a>
        <?php if($this->session->userdata('user_role') == R_SYSADMIN ){ ?>
          <a href="<?=site_url('admin/schools');?>" class="sidebar-box"> <img src="<?=base_url('assets/images/system/sidepanel/button-grad.svg');?>" height="25" style="margin-bottom:5px; margin-right:10px;"> Accounts <span class="sidebar_txt"> / School Admin Only /</span></a>
        <?php } ?>
        <?php if($this->session->userdata('user_role') == R_SYSADMIN ){ ?>
          <a href="<?=site_url('admin/schools');?>" class="sidebar-box"> <span class="glyphicon glyphicon-education"></span> &nbsp;&nbsp;&nbsp;&nbsp; Create School <span class="sidebar_txt"> / System Admin Only /</span></a>
        <?php } ?>
        <a href="#" class="sidebar-box"> <img src="<?=base_url('assets/images/system/sidepanel/button-inbox.svg');?>" height="25" style="margin-bottom:5px; margin-right:10px;"> Messages</a>
        <a href="career.php" class="sidebar-box"> <img src="<?=base_url('assets/images/system/sidepanel/button-find-jobs.svg');?>" height="25" style="margin-bottom:5px; margin-right:10px;"> Career <span class="sidebar_txt"> / Students Only /</span></a>
        <a href="<?=site_url('profile/change/password');?>" class="sidebar-box"> <img src="<?=base_url('assets/images/system/sidepanel/button-security.svg');?>" height="25" style="margin-bottom:5px; margin-right:10px;"> Security</a>
        <a href="<?=site_url('user/logout');?>" class="sidebar-box"> <img src="<?=base_url('assets/images/system/sidepanel/button-logout.svg');?>" height="25" style="margin-bottom:5px; margin-right:10px;"> Logout</a>
        <br><br>
        <div class="sidebar_txt">Yearbook Portal : Control Panel v1.0</div>
        <br>        

      </div>
    </div>

    <div class="hide" style="width:360px; background-color:#4b5761; padding:30px; padding-left:40px; padding-right:40px;">

      <div class="row">
        <div class="col-xs-6" style="padding:0;">
          <button type="button" class="btn btn-success" style="font-family: 'Raleway', sans-serif; font-weight:600; font-size:12px; width:100%; border-radius:3px 0px 0px 3px; padding:0; padding-bottom:2px; padding-top:5px;font-weight:600; "><img src="<?=base_url('assets/images/system/sidepanel/button-chat.svg');?>" height="25" > Chat</button>
        </div>
        <div class="col-xs-6" style="padding:0;">
          <button type="button" class="btn btn-primary" style="font-family: 'Raleway', sans-serif; font-weight:600; font-size:12px; width:100%; margin:0; border-radius:0px 3px 3px 0px; padding:0; padding-top:5px; padding-bottom:2px; font-weight:600; "><img src="<?=base_url('assets/images/system/sidepanel/button-group-chat.svg');?>" height="25"> Groups</button>
        </div>
      </div>

      <br>

      <div class="row">
      <a href="#" class="sidebar-box" style="color:#4ebad4; font-size:12px; border-color:#5e6972;"> <img src="images/circle/c6.png" alt="circle" width="30" style="border-radius:50%; margin-right:10px;"> Ramjun Valasote</a>
      <a href="#" class="sidebar-box" style="color:#4ebad4; font-size:12px; border-color:#5e6972;"> <img src="images/circle/c1.jpg" alt="circle" width="30" style="border-radius:50%; margin-right:10px;"> Anna Rivers</a>
      <a href="#" class="sidebar-box" style="color:#4ebad4; font-size:12px; border-color:#5e6972;"> <img src="images/circle/c4.jpg" alt="circle" width="30" style="border-radius:50%; margin-right:10px;"> Dane Arsulo</a>
      <a href="#" class="sidebar-box" style="color:#888; font-size:12px; border-color:#5e6972;"> <img src="images/circle/c2.jpg" alt="circle" width="30" style="border-radius:50%; margin-right:10px;"> Mellisa Banks</a>
      <a href="#" class="sidebar-box" style="color:#4ebad4; font-size:12px; border-color:#5e6972;"> <img src="images/circle/c6.png" alt="circle" width="30" style="border-radius:50%; margin-right:10px;"> Ramjun Valasote</a>
      <a href="#" class="sidebar-box" style="color:#4ebad4; font-size:12px; border-color:#5e6972;"> <img src="images/circle/c1.jpg" alt="circle" width="30" style="border-radius:50%; margin-right:10px;"> Anna Rivers</a>
      <a href="#" class="sidebar-box" style="color:#4ebad4; font-size:12px; border-color:#5e6972;"> <img src="images/circle/c4.jpg" alt="circle" width="30" style="border-radius:50%; margin-right:10px;"> Dane Arsulo</a>
      <a href="#" class="sidebar-box" style="color:#888; font-size:12px; border-color:#5e6972;"> <img src="images/circle/c2.jpg" alt="circle" width="30" style="border-radius:50%; margin-right:10px;"> Mellisa Banks</a>
      </div>

    </div>

  </ul>
</aside>
