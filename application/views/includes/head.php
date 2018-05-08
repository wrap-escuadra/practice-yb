<!DOCTYPE html>
<html lang="en">



  <head>
    <title> <?=$page_title;?></title>
    <meta property="og:image" content="<?=base_url('assets/images/system/yp-logo2.png');?>">
    <link rel="shortcut icon" href="<?=base_url('assets/images/system/yp-logo2.ico');?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css');?>">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>=-->
    <script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
    <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>

    <!-- added for custom font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300" rel="stylesheet"> 

    <link REL=StyleSheet HREF="<?=base_url('assets/css/yb_style.css');?>" TYPE="text/css" MEDIA=screen>
    <link REL=StyleSheet HREF="<?=base_url('assets/css/style.css');?>" TYPE="text/css" MEDIA=screen>



    <link REL=StyleSheet HREF="<?=base_url('assets/jquery-ui/jquery-ui.min.css');?>" TYPE="text/css" MEDIA=screen>
    <?php
    if(isset($pageCSS)){
     foreach($pageCSS as $css){ ?>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/'.$css.'.css?'.time());?>" media="screen">
    <?php } 
    }
    ?>
    <script src="<?=base_url('assets/jquery-ui/jquery-ui.min.js');?>"></script>


    <script type="text/javascript">
        var base_url = '<?=base_url();?>';
            window.onload = function() {


        var toggleNav = document.getElementById('js-sidebar__icon');
          var sidebar = document.querySelector('.sidebar');

        function changeClass() {
          if ( sidebar.className.match(/(?:^|\s)closed(?!\S)/) ) {
               sidebar.className = sidebar.className.replace( /(?:^|\s)closed(?!\S)/g , ' open' );
               // Allow focus of text block
               sidebar.setAttribute('tabindex', '-1');
            sidebar.focus();
            }
            else if ( sidebar.className.match(/(?:^|\s)open(?!\S)/) ) {
               sidebar.className = sidebar.className.replace( /(?:^|\s)open(?!\S)/g , ' closed' );
            }

        }
        
        toggleNav.addEventListener( 'click' , changeClass );


        }
    </script> 
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300italic,900italic,900,800italic,800,700italic,600italic,600,700,500italic,500,400italic,200italic,300,200,100,100italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Heebo:400,700' rel='stylesheet' type='text/css'>
  </head>
<body>
<div id="overlay"></div>
<div id="loader"></div>
<div style="position:fixed; z-index:999; width:100%;">
<nav class="navbar-default navbar-fixed-top" >
  <!-- <nav class="navbar-default " > -->
  
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="color:#fff; padding:0px; padding-top:5px; border:0; background-color:#0086b5;" >
        <span class="glyphicon glyphicon-align-justify" style="font-size:20px; background-color:#0086b5; border:0;"></span>
        <!-- <span class="icon-bar" ></span>
        <span class="icon-bar" ></span>
        <span class="icon-bar" ></span> -->
      </button>
      <!-- <div style="padding-top:15px; padding-left:15px; padding-right:0; font-size:13px;" >The World's Yearbook Directory Online!</div> -->
      
      <div style="padding:10px; ">
        <a href="<?=site_url();?>"><img src="<?=base_url('assets/images/system/yb_logowhite.svg');?>" alt="logo" height="30" ></a>
        <?php if($this->session->userdata('logged_in') == true){  ?>
          <?php if($this->session->userdata('user_role') == R_STUDENT){ ?>
            <a href="<?=site_url('profile');?>"><img src="<?=base_url('assets/images/system/button-bygraduates-white.svg');?>" alt="profile" height="25" data-toggle="tooltip" title="Profile" style="padding-left:10px; padding-right:10px;"></a>
          <?php } ?>
          <a href="career.php"><img src="<?=base_url('assets/images/system/button-find-jobs-w.svg');?>" alt="jobs" height="28" data-toggle="tooltip" title="Career" ></a>
          <a id="js-sidebar__icon"><img src="<?=base_url('assets/images/system/button-control.svg');?>" alt="messages" height="22" data-toggle="tooltip" title="Settings" style="padding-left:10px; cursor: pointer;"></a>
        <?php } //end logged_in == true ?>
      </div>
      
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right" >
        <li><a href="<?=site_url('tempo/logout');?>" style="color:yellow" >-Tempo Logout-</a></li> 
        <?php if($this->session->userdata('logged_in') === TRUE ){ ?>
          <li><a href="<?=site_url('user/logout');?>" >Log Out</a></li>
        <?php }else{ ?>
          <li><a href="<?=site_url('user/login');?>" >Log In</a></li>
        <?php } ?>
        
        <li><a href="contact.php" >Contact</a></li>
        <li><a href="faq.php" >Help</a></li>
        <li><a href="about.php" >About</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-search"></span> Search</a></li>
        
        
      </ul>

    </div>

  </div>

</nav>
</div>
<div style="height:50px;"></div>

<?php $this->load->view('includes/aside'); ?>
<div class="wrapper" style=" margin:0; padding:0;">
<br>