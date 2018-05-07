<!DOCTYPE html>
<html lang="en">



  <head>
    <title> Yearbook Plus Login</title>
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

    <link REL=StyleSheet HREF="<?=base_url('assets/css/style.css');?>" TYPE="text/css" MEDIA=screen>
    <link REL=StyleSheet HREF="<?=base_url('assets/css/yb_style.css');?>" TYPE="text/css" MEDIA=screen>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300italic,900italic,900,800italic,800,700italic,600italic,600,700,500italic,500,400italic,200italic,300,200,100,100italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Heebo:400,700' rel='stylesheet' type='text/css'>
    <style type="text/css">
         .col-md-offset-4{
               border: 4px solid gray;
               border-radius: 7px;
               background: #FFF;
               margin-top: 100px;
               padding: 30px;
         }
    </style>
  </head>
<body>
     <div class="container-fluid">
          <div class="row">
               <div class="col-sm-12 col-md-4 col-md-offset-4"  >
                    
                    <h2>Log In </h2>
                    <form action="" method="post">

                    <?php echo $this->session->flashdata('pop'); ?>
                    <p>
                         <input class="form-control" type="text" value="<?=set_value('username');?>" name="username">
                    </p>
                    <p>  
                         <input class="form-control" type="password" name="password">
                    </p>
                    <p>
                         <button class="btn btn-default pull-right" type="submit" name="submit" >Log In</button>
                         <br style="float:clear">
                    </p>
                    </form>
               </div>
          </div>
     </div>
</body>

</html>