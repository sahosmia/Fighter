<?php

include '../include/function.php';
include '../include/header.php';
include '../include/nav.php';
check_auth();
$select_query =  "SELECT id, name, email FROM users";
$db_mysqli_query = mysqli_query(db(), $select_query);
?>




<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel ">
   <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
         <a class="breadcrumb-item" href="../dashboard/dashboard.php">Bracket</a>
         <span class="breadcrumb-item active">Edit Profile</span>
      </nav>
   </div>
   <!-- br-pageheader -->
   

   <div class="br-pagebody mg-t-5 pd-x-30">
      <div class="container-fliud mt-5">
         <div class="row row-sm">

            <!-- name update  -->
            <div class="col-md-4">
               <div class="d-flex align-items-center justify-content-center ">
                  <div class="login-wrapper wd-300 wd-xs-450 pd-25 pd-xs-40 bg-white rounded shadow-base">
                     <?php
                     if (isset($_SESSION['name_update_success'])) :
                     ?>
                        <div class="alert alert-success" role="alert">
                           <?= $_SESSION['name_update_success'] ?>
                        </div>
                     <?php
                        unset($_SESSION['name_update_success']);
                     endif;
                     ?>
                     <div class="signin-logo tx-center tx-28 tx-bold tx-inverse mg-b-30"><span class="tx-normal">[</span> Name <span class="tx-normal">]</span></div>

                     <!-- name update  -->
                     <form action="name_update.php" method="post">
                        <p>Your Current Name : <?= $_SESSION['auth']['name'] ?></p>
                        <div class="form-group">
                           <input type="text" class="form-control <?= (isset($_SESSION['update_name_error'])) || (isset($_SESSION['update_name_short'])) ? "is-invalid" : "" ?>" placeholder="Enter your new name" name="name" value="<?php
                                                                                                                                                                                                                                       if (isset($_SESSION['update_name'])) {
                                                                                                                                                                                                                                          echo $_SESSION['update_name'];
                                                                                                                                                                                                                                          unset($_SESSION['update_name']);
                                                                                                                                                                                                                                       }
                                                                                                                                                                                                                                       ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['update_name_requried'])) {
                                 echo $_SESSION['update_name_requried'];
                                 unset($_SESSION['update_name_requried']);
                              }
                              if (isset($_SESSION['update_name_short'])) {
                                 echo $_SESSION['update_name_short'];
                                 unset($_SESSION['update_name_short']);
                              }
                              ?>
                           </small>
                        </div><!-- form-group -->


                        <button type="submit" class="btn btn-info btn-block">Update</button>
                     </form>
                  </div><!-- login-wrapper -->
               </div><!-- d-flex -->
            </div>

            <!-- email update  -->
            <div class="col-md-4">
               <div class="d-flex align-items-center justify-content-center ">
                  <div class="login-wrapper wd-300 wd-xs-450 pd-25 pd-xs-40 bg-white rounded shadow-base">

                     <?php
                     if (isset($_SESSION['email_update_success'])) :
                     ?>
                        <div class="alert alert-success" role="alert">
                           <?= $_SESSION['email_update_success'] ?>
                        </div>
                     <?php
                        unset($_SESSION['email_update_success']);
                     endif;
                     ?>

                     <div class="signin-logo tx-center tx-28 tx-bold tx-inverse mg-b-30"><span class="tx-normal">[</span> Email <span class="tx-normal">]</span></div>
                     <form action="email_update.php" method="post">

                        <!-- email  -->
                        <p>Your Current email : <?= $_SESSION['auth']['email'] ?></p>

                        <div class="form-group">
                           <input type="text" class="form-control <?= (isset($_SESSION['update_email_requried'])) || (isset($_SESSION['update_email_invalid'])) || (isset($_SESSION['update_email_exist'])) ? "is-invalid" : "" ?>" placeholder="Enter your new email" name="email" value="<?php
                                                                                                                                                                                                                                                                                             if (isset($_SESSION['update_email'])) {
                                                                                                                                                                                                                                                                                                echo $_SESSION['update_email'];
                                                                                                                                                                                                                                                                                                unset($_SESSION['update_email']);
                                                                                                                                                                                                                                                                                             }
                                                                                                                                                                                                                                                                                             ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['update_email_requried'])) {
                                 echo $_SESSION['update_email_requried'];
                                 unset($_SESSION['update_email_requried']);
                              }
                              if (isset($_SESSION['update_email_invalid'])) {
                                 echo $_SESSION['update_email_invalid'];
                                 unset($_SESSION['update_email_invalid']);
                              }
                              if (isset($_SESSION['update_email_exist'])) {
                                 echo $_SESSION['update_email_exist'];
                                 unset($_SESSION['update_email_exist']);
                              }
                              ?>
                           </small>
                        </div><!-- form-group -->


                        <button type="submit" class="btn btn-info btn-block">Update</button>
                     </form>
                  </div><!-- login-wrapper -->
               </div><!-- d-flex -->
            </div>


            <!-- password update  -->
            <div class="col-md-4">
               <div class="d-flex align-items-center justify-content-center ">
                  <div class="login-wrapper wd-300 wd-xs-450 pd-25 pd-xs-40 bg-white rounded shadow-base">

                     <?php
                     if (isset($_SESSION['password_update_success'])) :
                     ?>
                        <div class="alert alert-success" role="alert">
                           <?= $_SESSION['password_update_success'] ?>
                        </div>
                     <?php
                        unset($_SESSION['password_update_success']);
                     endif;
                     ?>

                     <div class="signin-logo tx-center tx-28 tx-bold tx-inverse mg-b-30"><span class="tx-normal">[</span> Password <span class="tx-normal">]</span></div>
                     <form action="password_update.php" method="post">

                        <!-- old password -->
                        <div class="form-group">
                           <input type="password" class="form-control <?= (isset($_SESSION['update_old_password_requried'])) || (isset($_SESSION['update_old_password_invalid'])) ? "is-invalid" : "" ?>" placeholder="Enter your old password" name="old_password" value="<?php
                                                                                                                                                                                                                                                                           if (isset($_SESSION['update_old_password'])) {
                                                                                                                                                                                                                                                                              echo $_SESSION['update_old_password'];
                                                                                                                                                                                                                                                                              unset($_SESSION['update_old_password']);
                                                                                                                                                                                                                                                                           }
                                                                                                                                                                                                                                                                           ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['update_old_password_requried'])) {
                                 echo $_SESSION['update_old_password_requried'];
                                 unset($_SESSION['update_old_password_requried']);
                              }
                              if (isset($_SESSION['update_old_password_invalid'])) {
                                 echo $_SESSION['update_old_password_invalid'];
                                 unset($_SESSION['update_old_password_invalid']);
                              }

                              ?>
                           </small>
                        </div><!-- form-group -->

                        <!-- new password  -->
                        <div class="form-group">
                           <input type="password" class="form-control <?= (isset($_SESSION['update_new_password_requried'])) ? "is-invalid" : "" ?>" placeholder="Enter your new password" name="new_password" value="<?php
                                                                                                                                                                                                                        if (isset($_SESSION['update_new_password'])) {
                                                                                                                                                                                                                           echo $_SESSION['update_new_password'];
                                                                                                                                                                                                                           unset($_SESSION['update_new_password']);
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                        ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['update_new_password_requried'])) {
                                 echo $_SESSION['update_new_password_requried'];
                                 unset($_SESSION['update_new_password_requried']);
                              }

                              ?>
                           </small>
                        </div><!-- form-group -->

                        <!-- confirm password  -->
                        <div class="form-group">
                           <input type="password" class="form-control <?= (isset($_SESSION['update_confirm_password_requried'])) || (isset($_SESSION['update_confirm_password_match'])) ? "is-invalid" : "" ?>" placeholder="Enter your confirm password" name="confirm_password" value="<?php
                                                                                                                                                                                                                                                                                          if (isset($_SESSION['update_confirm_password'])) {
                                                                                                                                                                                                                                                                                             echo $_SESSION['update_confirm_password'];
                                                                                                                                                                                                                                                                                             unset($_SESSION['update_confirm_password']);
                                                                                                                                                                                                                                                                                          }
                                                                                                                                                                                                                                                                                          ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['update_confirm_password_requried'])) {
                                 echo $_SESSION['update_confirm_password_requried'];
                                 unset($_SESSION['update_confirm_password_requried']);
                              }
                              if (isset($_SESSION['update_confirm_password_match'])) {
                                 echo $_SESSION['update_confirm_password_match'];
                                 unset($_SESSION['update_confirm_password_match']);
                              }

                              ?>
                           </small>
                        </div><!-- form-group -->
                        <button type="submit" class="btn btn-info btn-block">Update</button>
                     </form>
                  </div><!-- login-wrapper -->
               </div><!-- d-flex -->
            </div>



         </div>
      </div><!-- row -->
   </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->



<?php
include '../include/footer.php';
?>