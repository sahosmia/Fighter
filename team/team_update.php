<?php
require_once '../include/function.php';
require_once '../include/header.php';
require_once '../include/nav.php';
check_auth();
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
   <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
         <a class="breadcrumb-item" href="../dashboard/dashboard.php">Bracket</a>
         <a class="breadcrumb-item" href="../team/team.php">Team</a>
         <span class="breadcrumb-item active text-capitalize">Team Update</span>
      </nav>
   </div>
   <!-- br-pageheader -->

   <div class="br-pagebody mg-t-5 pd-x-30 ">
      <div class="container  mt-5">
         <div class="row row-sm">

            <div class="col-md-5">
               <div class="card border-success">
                  <div class="card-header text-center bg-teal text-light">
                     team update </div>
                  <div class="card-body">
                     <?php
                     if (isset($_SESSION['team_update_success'])) :
                     ?>
                        <div class="alert alert-success" role="alert">
                           <?= $_SESSION['team_update_success'] ?>
                        </div>
                     <?php
                        unset($_SESSION['team_update_success']);
                     endif;
                     ?>
                     <?php
                     $table = $_GET['table_name'];
                     $data = where_data_read($_GET['table_name'], $_GET['id']);
                     $data['name'];
                     ?>
                     <form action="team_update_code.php" method="post">
                        <input type="hidden" name="action_type" value="all">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <div class="form-group">
                           <label>Team Member Name</label>
                           <?php
                           $table = $_GET['table_name'];
                           $data = where_data_read($_GET['table_name'], $_GET['id']);
                           $data['name'];
                           ?>
                           <input placeholder="Enter your team member name" type="text" name="team_update_name" class="form-control <?= (isset($_SESSION['team_update_name_requried'])) ? "is-invalid" : "" ?>" value="<?php
                                                                                                                                                                                                                        if (isset($_SESSION['team_update_name'])) {
                                                                                                                                                                                                                           echo $_SESSION['team_update_name'];
                                                                                                                                                                                                                           unset($_SESSION['team_update_name']);
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                           echo $data['name'];
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                        ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['team_update_name_requried'])) {
                                 echo $_SESSION['team_update_name_requried'];
                                 unset($_SESSION['team_update_name_requried']);
                              }
                              ?>
                           </small>
                        </div>
                        <div class="form-group">
                           <label>Team Member Title</label>
                           <input placeholder="Enter your team member title" type="text" name="team_update_title" class="form-control <?= (isset($_SESSION['team_update_title_requried'])) ? "is-invalid" : "" ?>" value="<?php
                                                                                                                                                                                                                           if (isset($_SESSION['team_update_title'])) {
                                                                                                                                                                                                                              echo $_SESSION['team_update_title'];
                                                                                                                                                                                                                              unset($_SESSION['team_update_title']);
                                                                                                                                                                                                                           } else {
                                                                                                                                                                                                                              echo $data['title'];
                                                                                                                                                                                                                           }
                                                                                                                                                                                                                           ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['team_update_title_requried'])) {
                                 echo $_SESSION['team_update_title_requried'];
                                 unset($_SESSION['team_update_title_requried']);
                              }
                              ?>
                           </small>
                        </div>

                        <div class="form-group">
                           <label>Facebook</label>
                           <input placeholder="Enter your Facebook link" type="text" name="team_update_facebook" class="form-control <?= (isset($_SESSION['team_update_facebook_requried'])) ? "is-invalid" : "" ?>" value="<?php
                                                                                                                                                                                                                              if (isset($_SESSION['team_update_facebook'])) {
                                                                                                                                                                                                                                 echo $_SESSION['team_update_facebook'];
                                                                                                                                                                                                                                 unset($_SESSION['team_update_facebook']);
                                                                                                                                                                                                                              } else {
                                                                                                                                                                                                                                 echo $data['facebook'];
                                                                                                                                                                                                                              }
                                                                                                                                                                                                                              ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['team_update_facebook_requried'])) {
                                 echo $_SESSION['team_update_facebook_requried'];
                                 unset($_SESSION['team_update_facebook_requried']);
                              }

                              ?>
                           </small>
                        </div>

                        <div class="form-group">
                           <label>Twitter</label>
                           <input placeholder="Enter your twitter link" class="form-control" type="text" name="team_update_twitter" value="<?php
                                                                                                                                             if (isset($_SESSION['team_update_twitter'])) {
                                                                                                                                                echo $_SESSION['team_update_twitter'];
                                                                                                                                                unset($_SESSION['team_update_twitter']);
                                                                                                                                             } else {
                                                                                                                                                echo $data['twitter'];
                                                                                                                                             }
                                                                                                                                             ?>">

                        </div>
                        <div class="form-group">
                           <label>Tumblr</label>
                           <input placeholder="Enter your tumblr link" class="form-control" type="text" name="team_update_tumblr" value="<?php
                                                                                                                                          if (isset($_SESSION['team_update_tumblr'])) {
                                                                                                                                             echo $_SESSION['team_update_tumblr'];
                                                                                                                                             unset($_SESSION['team_update_tumblr']);
                                                                                                                                          } else {
                                                                                                                                             echo $data['tumblr'];
                                                                                                                                          }
                                                                                                                                          ?>">

                        </div>
                        <div class="form-group">
                           <label>Linkdin</label>
                           <input placeholder="Enter your linkedin link" class="form-control" type="text" name="team_update_linkedin" value="<?php
                                                                                                                                             if (isset($_SESSION['team_update_linkdin'])) {
                                                                                                                                                echo $_SESSION['team_update_linkdin'];
                                                                                                                                                unset($_SESSION['team_update_linkdin']);
                                                                                                                                             } else {
                                                                                                                                                echo $data['linkedin'];
                                                                                                                                             }
                                                                                                                                             ?>">

                        </div>

                        <button type="submit" class="btn btn-outline-teal btn-block mt-3">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="card border-success">
                  <div class="card-header text-center bg-teal text-light">
                     team update </div>
                  <div class="card-body">
                     <?php
                     if (isset($_SESSION['team_update_success'])) :
                     ?>
                        <div class="alert alert-success" role="alert">
                           <?= $_SESSION['team_update_success'] ?>
                        </div>
                     <?php
                        unset($_SESSION['team_update_success']);
                     endif;
                     ?>

                     <form action="team_update_code.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action_type" value="img">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <img src="../upload/team/<?= $data['img'] ?>" alt="">
                        <div class="form-group">
                           <label>Team Image</label>

                           <input type="file" name="team_update_img" class="form-control-file <?= (isset($_SESSION['team_update_img_requried'])) ? "is-invalid" : "" ?>" value="<?php
                                                                                                                                                                                 if (isset($_SESSION['team_update_img'])) {
                                                                                                                                                                                    echo $_SESSION['team_update_img'];
                                                                                                                                                                                    unset($_SESSION['team_update_img']);
                                                                                                                                                                                 }
                                                                                                                                                                                 ?>">

                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['team_update_img_requried'])) {
                                 echo $_SESSION['team_update_img_requried'];
                                 unset($_SESSION['team_update_img_requried']);
                              }

                              ?>
                           </small>
                        </div>


                        <button type="submit" class="btn btn-outline-teal btn-block mt-3">Submit</button>
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