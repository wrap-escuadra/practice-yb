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


 
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300italic,900italic,900,800italic,800,700italic,600italic,600,700,500italic,500,400italic,200italic,300,200,100,100italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Heebo:400,700' rel='stylesheet' type='text/css'>
  </head>
<body>
<div id="overlay"></div>
<div id="loader"></div>

