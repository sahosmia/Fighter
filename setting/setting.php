<?php
require_once '../include/function.php';

$count = 1;

// include item 
require_once '../include/header.php';
require_once '../include/login_check.php';
require_once '../include/nav.php';


$protfolios = data_read("protfolios", 0);  // 0 == all, 1 == hide_status, 2 == show_status
$protfolio_catagories = data_read("protfolio_catagories", 0);  // 0 == all, 1 == hide_status, 2 == show_status


?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
   <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
         <a class="breadcrumb-item" href="../dasbord/dasbord.php">Bracket</a>
         <span class="breadcrumb-item active text-capitalize">setting</span>
      </nav>
   </div>
   <!-- br-pageheader -->

   <div class="br-pagebody mg-t-5 pd-x-30">
      <div class="container mt-5">
         <div class="row row-sm m-auto">
            <div class="col-md-7">
               <div class="card border-success">
                  <div class="card-header bg-teal text-light">
                     <h6>Banner</h6>
                  </div>
                  <div class="card-body">

                     <img width="550px" src="../upload/banner/<?= settings_data_read("banner") ?>" alt="">
                     <form action="setting_code.php" method="post" enctype="multipart/form-data">
                        <div class="form-group mt-5">
                           <input type="hidden" name="type" value="banner_img">
                           <label>Update Banner Image</label>

                           <input type="file" class="form-control-file <?= (isset($_SESSION['banner_img_requried'])) ? "is-invalid" : "" ?>" name="banner_img" value="<?php
                                                                                                                                                                        if (isset($_SESSION['banner_img'])) {
                                                                                                                                                                           echo $_SESSION['banner_img'];
                                                                                                                                                                           unset($_SESSION['banner_img']);
                                                                                                                                                                        }
                                                                                                                                                                        ?>">

                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['banner_img_requried'])) {
                                 echo $_SESSION['banner_img_requried'];
                                 unset($_SESSION['banner_img_requried']);
                              }
                              if (isset($_SESSION['banner_img_extention'])) {
                                 echo $_SESSION['banner_img_extention'];
                                 unset($_SESSION['banner_img_extention']);
                              }

                              ?>
                           </small>
                        </div>
                        <button class="btn btn-info d-block " type="submit">update</button>
                     </form>
                  </div>

               </div>
               <div class="card border-success mt-5">
                  <div class="card-header bg-teal text-light">
                     <h6>About Image</h6>
                  </div>
                  <div class="card-body">
                     <img width="250px" height="200px" src="../upload/about/<?= settings_data_read("about_img") ?>" alt="">
                     <form action="setting_code.php" method="post" enctype="multipart/form-data">
                        <div class="form-group mt-5">
                           <input type="hidden" name="type" value="about_img">
                           <label>Update About Image</label>

                           <input type="file" class="form-control-file <?= (isset($_SESSION['about_img_requried'])) ? "is-invalid" : "" ?>" name="about_img" value="<?php
                                                                                                                                                                     if (isset($_SESSION['about_img'])) {
                                                                                                                                                                        echo $_SESSION['about_img'];
                                                                                                                                                                        unset($_SESSION['about_img']);
                                                                                                                                                                     }
                                                                                                                                                                     ?>">

                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['about_img_requried'])) {
                                 echo $_SESSION['about_img_requried'];
                                 unset($_SESSION['about_img_requried']);
                              }

                              ?>

                           </small>
                        </div>
                        <button class="btn btn-info d-block " type="submit">update</button>
                     </form>
                  </div>

               </div>
            </div>
            <div class="col-md-5">
               <div class="card border-success ">
                  <div class="card-header bg-teal text-light">
                     <h6>Socail Midia</h6>
                  </div>
                  <div class="card-body">
                     <form action="setting_code.php" method="post">
                        <input type="hidden" name="type" value="socail_midia">
                        <div class="form-group">
                           <label>facebook</label>

                           <input type="text" class="form-control <?= (isset($_SESSION['facebook_requried'])) ? "is-invalid" : "" ?>" name="facebook" value="<?php
                                                                                                                                                               if (isset($_SESSION['facebook'])) {
                                                                                                                                                                  echo $_SESSION['facebook'];
                                                                                                                                                                  unset($_SESSION['facebook']);
                                                                                                                                                               } else {
                                                                                                                                                                  echo settings_data_read("facebook");
                                                                                                                                                               }
                                                                                                                                                               ?>">

                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['facebook_requried'])) {
                                 echo $_SESSION['facebook_requried'];
                                 unset($_SESSION['facebook_requried']);
                              }

                              ?>
                           </small>
                        </div>
                        <div class="form-group">
                           <label>twitter</label>

                           <input type="text" class="form-control <?= (isset($_SESSION['twitter_requried'])) ? "is-invalid" : "" ?>" name="twitter" value="<?php
                                                                                                                                                            if (isset($_SESSION['twitter'])) {
                                                                                                                                                               echo $_SESSION['twitter'];
                                                                                                                                                               unset($_SESSION['twitter']);
                                                                                                                                                            } else {
                                                                                                                                                               echo settings_data_read("twitter");
                                                                                                                                                            }
                                                                                                                                                            ?>">

                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['twitter_requried'])) {
                                 echo $_SESSION['twitter_requried'];
                                 unset($_SESSION['twitter_requried']);
                              }

                              ?>
                           </small>
                        </div>
                        <div class="form-group">
                           <label>tumblr</label>

                           <input type="text" class="form-control <?= (isset($_SESSION['tumblr_requried'])) ? "is-invalid" : "" ?>" name="tumblr" value="<?php
                                                                                                                                                         if (isset($_SESSION['tumblr'])) {
                                                                                                                                                            echo $_SESSION['tumblr'];
                                                                                                                                                            unset($_SESSION['tumblr']);
                                                                                                                                                         } else {
                                                                                                                                                            echo settings_data_read("tumblr");
                                                                                                                                                         }
                                                                                                                                                         ?>">

                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['tumblr_requried'])) {
                                 echo $_SESSION['tumblr_requried'];
                                 unset($_SESSION['tumblr_requried']);
                              }

                              ?>
                           </small>
                        </div>
                        <div class="form-group">
                           <label>linkedin</label>

                           <input type="text" class="form-control <?= (isset($_SESSION['linkedin_requried'])) ? "is-invalid" : "" ?>" name="linkedin" value="<?php
                                                                                                                                                               if (isset($_SESSION['linkedin'])) {
                                                                                                                                                                  echo $_SESSION['linkedin'];
                                                                                                                                                                  unset($_SESSION['linkedin']);
                                                                                                                                                               } else {
                                                                                                                                                                  echo settings_data_read("linkedin");
                                                                                                                                                               }
                                                                                                                                                               ?>">

                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['linkedin_requried'])) {
                                 echo $_SESSION['linkedin_requried'];
                                 unset($_SESSION['linkedin_requried']);
                              }

                              ?>
                           </small>
                        </div>
                        <button class="btn btn-info d-block " type="submit">update</button>
                     </form>
                  </div>

               </div>
               <div class="card border-success mt-5">
                  <div class="card-header bg-teal text-light">
                     <h6>Description</h6>
                  </div>
                  <div class="card-body">
                     <form action="setting_code.php" method="post">
                        <input type="hidden" name="type" value="description">
                        <div class="form-group">
                           <label>About Description</label>
                           <textarea class="form-control <?= (isset($_SESSION['about_des_requried'])) ? "is-invalid" : "" ?>" name="about_des" cols="30" rows="8"><?php
                                                                                                                                                                  if (isset($_SESSION['about_des'])) {
                                                                                                                                                                     echo $_SESSION['about_des'];
                                                                                                                                                                     unset($_SESSION['about_des']);
                                                                                                                                                                  } else {
                                                                                                                                                                     echo settings_data_read("about_des");
                                                                                                                                                                  }
                                                                                                                                                                  ?></textarea>
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['about_des_requried'])) {
                                 echo $_SESSION['about_des_requried'];
                                 unset($_SESSION['about_des_requried']);
                              }

                              ?>
                           </small>

                        </div>
                        <div class="form-group">
                           <label>Footer Description</label>
                           <textarea class="form-control <?= (isset($_SESSION['footer_des_requried'])) ? "is-invalid" : "" ?>" name="footer_des" cols="30" rows="6"><?php
                                                                                                                                                                     if (isset($_SESSION['footer_des'])) {
                                                                                                                                                                        echo $_SESSION['footer_des'];
                                                                                                                                                                        unset($_SESSION['footer_des']);
                                                                                                                                                                     } else {
                                                                                                                                                                        echo settings_data_read("footer_des");
                                                                                                                                                                     }
                                                                                                                                                                     ?></textarea>

                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['footer_des_requried'])) {
                                 echo $_SESSION['footer_des_requried'];
                                 unset($_SESSION['footer_des_requried']);
                              }

                              ?>
                           </small>

                        </div>
                        <button class="btn btn-info d-block " type="submit">update</button>
                     </form>
                  </div>

               </div>

            </div>

         </div>
      </div><!-- row -->
   </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php
require_once '../include/footer.php';
?>