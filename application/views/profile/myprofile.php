
<div class="container" style="margin-bottom:20px; margin-top:-50px ">
  <div class="row">
    <div class="col-sm-12" style="padding:10px; ">


        <!--full panel -->

      <div class="col-sm-12" style="padding:10px;">
        <div class="center-panel">
          <div class="row">              
              
                <div style="float:left; width:40px; margin-left:15px; margin-right:10px;">
                  <!-- <a href="school.php"><img src="<?=UPLOAD_DIR?>school_logos/university-logo.jpg" alt="School Logo" width="40"></a>         -->
                  <a href="school.php"><img src="<?=site_url('assets/_uploads/school_logos/university-logo.jpg');?>" alt="School Logo" width="40"></a>
                </div>                
              
                <div style="float:left; width:200px;" >         
                  <span class="school_title"><?=$user['school_abbr'];?></span>  <br>          
                  <span class="school_address" style="line-height:12px;"><?=$user['school_name'];?></span>                
                </div>                    

    </div>
  </div>
 </div>



    <!-- LEFT PANEL --> 

      <div class="col-sm-3" style="padding:10; border-radius: 3px 3px 0px 0px;">

        <div class="left-panel-profile" style="padding:0;">
          <div align="center" ><img src="<?=site_url('assets/_uploads/profile_headers/'.$primary_img)?>" alt="profile photo" width="100%" style="border-radius: 3px 3px 0px 0px;"><br></div>
        </div>


          <div class="myprofile_yb_title">
            My Yearbook Profile
          </div>
          

        <div class="left-panel-profile-name">
            <span class="myprofile_name">
              <?php 
                  $fullname = $user['first_name']." " ;
                  if(trim($user['middle_name'] )!= ""){
                    $fullname .= $user['middle_name']. " ";
                  }
                  $fullname .= $user['last_name'];
                  echo strtoupper($fullname);
               ?>
            </span> 
            <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>
            <p class="myprofile_name-txt" style="text-align:left;">
              <span class="glyphicon glyphicon-star"></span> Batch <?=$user['batch_year'];?>
            </p>
            <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>
            <p class="myprofile_name-txt" style="text-align:left;">
              <span class="glyphicon glyphicon-education"></span> <?=$user['course_desc'];?>
            </p>
            <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>
            <p class="myprofile_name-txt" style="text-align:left;">
              <span class="glyphicon glyphicon-tag"></span> <?=$user['username'];?>
            </p>
            <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>
            <p class="myprofile_name-txt" style="text-align:left;">
              <span class="glyphicon glyphicon-calendar"></span> <?=date('F d, Y',strtotime($user['birth_date']))?>
            </p>
        </div>


        <br>


        <div class="left-panel">

       
            <span class="ad_txt_big">Achievements</span>
            <?php // var_dump($awards); ?>
            <?php foreach($awards as $aw){ ?>
              <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>
              <p class="ad_txt" style="text-align:left;">
                <img src="<?=site_url('assets/images/system');?>/achievements_ribbon.svg" alt="achievment_icon" height="15px;"> <?=$aw['award_description'];?>
              </p>
              <?php }  ?> 
            

        </div>




        <br>


<div class="right-panel">

          <p class="ad_txt_big">Other Graduates</p>

          

            <div class="row">
              <div class="col-sm-12">
                <?php for($x=1; $x <= 8; $x++): ?>
                <div class="col-xs-3" style="padding:0;"> <img class=" img-circle img" src="<?=base_url('assets/images/system/profile.svg')?>" alt="profile image thumb" width="100%" style="border-width:1px;border-color:#9caab5;border-style:solid;"> </div>
                <!-- <div class="col-xs-3" style="padding:0;"> <img src="images/circle/c1.jpg" alt="Logo" width="100%" style="border-width:1px;border-color:#9caab5;border-style:solid;"> </div>
                <div class="col-xs-3" style="padding:0;"> <img src="images/circle/c3.jpg" alt="Logo" width="100%" style="border-width:1px;border-color:#9caab5;border-style:solid;"> </div>
                <div class="col-xs-3" style="padding:0;"> <img src="images/circle/c4.jpg" alt="Logo" width="100%" style="border-width:1px;border-color:#9caab5;border-style:solid;"> </div>
                <div class="col-xs-3" style="padding:0;"> <img src="images/circle/c6.png" alt="Logo" width="100%" style="border-width:1px;border-color:#9caab5;border-style:solid;"> </div>
                <div class="col-xs-3" style="padding:0;"> <img src="images/circle/c5.jpg" alt="Logo" width="100%" style="border-width:1px;border-color:#9caab5;border-style:solid;"> </div>
                <div class="col-xs-3" style="padding:0;"> <img src="images/circle/c7.jpg" alt="Logo" width="100%" style="border-width:1px;border-color:#9caab5;border-style:solid;"> </div>
                <div class="col-xs-3" style="padding:0;"> <img src="images/circle/c3.jpg" alt="Logo" width="100%" style="border-width:1px;border-color:#9caab5;border-style:solid;"> </div> -->
                <?php endfor; ?>
              </div>
            </div>

          

          

        </div>

        





      </div>


    <!-- CENTER PANEL -->

      <div class="col-sm-6" style="padding:10px;">

        <div class="center-panel" >


          <p class="ad_txt_big">
              Graduation Photos
            </p>


               
          <div class="row">
            

            <div class="col-md-12" style="padding:0;">
              <?php foreach($grad_photos as $gp){ ?>
              <div class="col-xs-4" style="border-width:1px;border-color:#9caab5;border-style:solid; padding:0;">
                <!-- <img src="<?=UPLOAD_DIR.'profile_headers/'.$gp['img'];?>" alt="Graduation Photo" width="100%"> -->
                <img src="<?=site_url('assets/_uploads/profile_headers/'.$gp['img']);?>" alt="Graduation Photo" width="100%">
              </div>
              <?php } ?>
              
            </div>

            <!-- <div class="col-md-6" style="padding:0;">
              <div class="col-xs-6" style="border-width:1px;border-color:#9caab5;border-style:solid; padding:0;">
                <img src="images/gradphotos/dane-grad01.jpg" alt="Logo" width="100%">
              </div>
              <div class="col-xs-6" style="border-width:1px;border-color:#9caab5;border-style:solid; padding:0;">
                <img src="images/gradphotos/dane-grad04.jpg" alt="Logo" width="100%">
              </div>

          </div> -->
        </div>  

        <div class="row">
          <div style="border-top: 5px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>
        </div> 

        <button id="add" class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-thumbs-up" ></span> Approve</button>
        <button id="add" class="btn btn-info btn-sm" > <span class="glyphicon glyphicon-envelope" ></span> Message</button>
        <button id="add" class="btn btn-success btn-sm" > <span class="glyphicon glyphicon-plus" ></span> Add</button>
        <br><strong>158</strong> <span class="ad_txt"> Approved Dane's Profile.</span>

                


        <div class="row">
          <div style="border-top: 5px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>
        </div>

        

        <span class="ad_txt_big">Graduation Message</span>

          <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>

          <div class="ad_txt">
            TNC, they enter the mid, Wil they go for a gg push? Yes they are, they're attacking the t4 towers, already jumped forward. Cr1t, he needs help now, the wall, won't be enough! Kuku still there, The chronosphere caught two! Kuku is right next to it! Notail is gonna go down, no buyback! They're going for the t4s. Ember's out, rapier is gone! Is these the... Have TNC done it! The impossible! Two-time major winners you are gone! The Filipinos have eliminated OG, TNC have done it! The dream the reality!
          </div>



        <div class="row">
          <div style="border-top: 5px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>
        </div>


        <span class="ad_txt_big">Profile Posts</span>
        <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>

          <div class="row">
            <?php foreach($comments as $comment):?>
            <div class="col-xs-12">
              <div class="col-xs-2" align="center" style="padding-right:0;">
                <img src="<?=base_url('assets/images/system/profile.svg')?>" alt="profile image thumb" width="100%" style="border-radius: 50%;">
              </div>
              <div class="col-xs-10">
                <div class="ad_txt">
                  <blockquote> 
                    <?=$comment['comment'];?>
                    <p class="text-right small"><?=human_date($comment['created_at']);?></p>
                  </blockquote>
                  <p class="text-italic">By: <?=$comment['commentor'];?></p>           
                </div>
                <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>
              </div>
            </div>
            <?php endforeach; ?>
            






          </div>

          <br>

          <div>
            <div id="comments" class="row">
              <form action="<?=site_url('profile/add_comment');?>" method="post">
                <div class="col-xs-12">
                  <div class="col-xs-9" style="padding:0;">
                    <input type="text" name="comment" placeholder="Type comment..." style="width:100%; height:30px;" maxlength="250" required="">
                    <input value="<?=iencode($user['profile_id']);?>" type="hidden" name="profile_id">
                    <!-- <textarea class="form-control" placeholder="Type comment..."></textarea> -->
                  </div>
                  <div class="col-xs-3" style="padding:0;">
                    <button id="add" class="btn btn-default btn-sm" type="submit" style="width:100%; border-radius:0;"> <span class="glyphicon glyphicon-plus" ></span> Add</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>

          <div align="right" style="padding-right:15px;">
            <a href="#">More Post <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
          </div>

          </div>
          </div>
          
















      
     




    <!-- RIGHT PANEL -->

      <div class="col-sm-3" style="padding:10px;">

        




        <div class="myprofile_journey_title" style="padding-bottom:10px;">My Journey </div>    
                          
            <?php for($x = 1; $x < 5;$x++): ?>
              <div class="col-xs-6" style="border-width:1px;border-color:#9caab5;border-style:solid; padding:0;">
                <img src="<?=base_url('assets/images/system/filler/journey.jpeg');?>" alt="Logo" width="100%">
              </div>
              <!-- <div class="col-xs-6" style="border-width:1px;border-color:#9caab5;border-style:solid; padding:0;">
                <img src="images/personalphotos/P02.jpg" alt="Logo" width="100%">
              </div>
              <div class="col-xs-6" style="border-width:1px;border-color:#9caab5;border-style:solid; padding:0;">
                <img src="images/personalphotos/P01.jpg" alt="Logo" width="100%">
              </div>
              <div class="col-xs-6" style="border-width:1px;border-color:#9caab5;border-style:solid; padding:0;">
                <img src="images/personalphotos/P04.jpg" alt="Logo" width="100%">
              </div> -->
            <?php endfor; ?>
        <div class="right-panel" style="border-radius: 0px 0px 3px 3px;">
          
          <div align="right" style="line-height:1;">&nbsp;<br>
            <a href="myjourney.php">Go to My Journey <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
          </div>

        </div>


<br>


        

        <div class="left-panel">

       
            <span class="ad_txt_big">Contact Information</span>

            <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>
              <a href="#" data-toggle="tooltip" title="danearsulo"><img src="<?=base_url('assets/images/system/social/fb.svg')?>" alt="Logo" height="30" style="border-radius: 50%;"></a> 
              <a href="#" data-toggle="tooltip" title="DaneArsulo2015"><img src="<?=base_url('assets/images/system/social/twitter.svg')?>" alt="Logo" height="30" style="border-radius: 50%;"></a>
              <a href="#" data-toggle="tooltip" title="Dane_inta2016"><img src="<?=base_url('assets/images/system/social/')?>instagram.svg" alt="Logo" height="30" style="border-radius: 50%;"></a> 
              <a href="#" data-toggle="tooltip" title="nandzyfe2016"><img src="<?=base_url('assets/images/system/social/pinterest.svg')?>" alt="Logo" height="30" style="border-radius: 50%;"></a>
            <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>
            <p class="ad_txt" style="text-align:left;">
              <span class="glyphicon glyphicon-map-marker"></span> San Dionicio Jaro, Iloilo City
            </p>
            <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>
            <p class="ad_txt" style="text-align:left;">
              <span class="glyphicon glyphicon-phone-alt"></span> +63 928-971-8237
            </p>

        </div>



        <br>




        <div class="right-panel">

          <span class="ad_txt_big">Circles</span>

          <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>

            <div class="row">
              <div class="col-xs-12">            
                <?php for($x=1;$x<=8; $x++): ?>
                <div class="col-xs-3" style="padding:5px;"> <a href="myprofile.php"><img src="<?=base_url('assets/images/system/profile.svg')?>" alt="Logo" width="100%" style="border-radius: 50%;"></a> </div>
                <!-- <div class="col-xs-3" style="padding:5px;"> <a href="myprofile.php"><img src="images/circle/c1.jpg" alt="Logo" width="100%" style="border-radius: 50%;"></a> </div>
                <div class="col-xs-3" style="padding:5px;"> <a href="myprofile.php"><img src="images/circle/c3.jpg" alt="Logo" width="100%" style="border-radius: 50%;"></a> </div>
                <div class="col-xs-3" style="padding:5px;"> <a href="myprofile.php"><img src="images/circle/c4.jpg" alt="Logo" width="100%" style="border-radius: 50%;"></a> </div>
                <div class="col-xs-3" style="padding:5px;"> <a href="myprofile.php"><img src="images/circle/c6.png" alt="Logo" width="100%" style="border-radius: 50%;"></a> </div>
                <div class="col-xs-3" style="padding:5px;"> <a href="myprofile.php"><img src="images/circle/c5.jpg" alt="Logo" width="100%" style="border-radius: 50%;"></a> </div>
                <div class="col-xs-3" style="padding:5px;"> <a href="myprofile.php"><img src="images/circle/c7.jpg" alt="Logo" width="100%" style="border-radius: 50%;"></a> </div>
                <div class="col-xs-3" style="padding:5px;"> <a href="myprofile.php"><img src="images/circle/c3.jpg" alt="Logo" width="100%" style="border-radius: 50%;"></a> </div> -->
                <?php endfor; ?>
              </div>
            </div>

          <div style="border-top: 1px solid #d8e5ee; padding-top:10px; margin-top:10px;"></div>

          <div align="right" >
            <a href="#">More Circles <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
          </div>

        </div>



        


        



<br>


        <div class="left-panel">

          <div align="center" ><img src="<?=base_url('assets/images/system/yp-logo2.svg')?>" alt="Logo" height="125"><br></div>

          <div align="center"><a href="login.php" class="btn btn-success btn-sm"> <span class="glyphicon glyphicon-user"></span> Login </a></div><br>

          <div style="border-top: 1px solid #9caab5; padding-top:10px; "></div>

          <div style="width:100%;">
            <span class="ad_txt_big">
              No Account?
            </span>
            <p class="ad_txt">
              Ask your school to join! Be with the fastest growing online yearbook directory today!
            </p>
          </div>

        </div>


      </div>

