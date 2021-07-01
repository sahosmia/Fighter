<?php
session_start();
include '../include/header.php';

?>
<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
   <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">

      <?php
      if (isset($_SESSION['reg_success'])) :
      ?>
         <div class="alert alert-success" role="alert">
            <?= $_SESSION['reg_success'] ?>
         </div>
      <?php
         unset($_SESSION['reg_success']);
      endif;
      ?>
      <?php
      if (isset($_SESSION['deny_error'])) :
      ?>
         <div class="alert alert-warning" role="alert">
            <?= $_SESSION['deny_error'] ?>
         </div>
      <?php
         unset($_SESSION['deny_error']);
      endif;
      ?>

      <div class="signin-logo tx-center tx-28 tx-bold tx-inverse mg-b-30"><span class="tx-normal">[</span> bracket <span class="tx-normal">]</span></div>
      <form action="login_code.php" method="post">

         <!-- email  -->
         <div class="form-group">
            <input type="text" class="form-control <?= (isset($_SESSION['log_email_requried'])) || (isset($_SESSION['log_valid_email'])) ? "is-invalid" : "" ?>" placeholder="Enter your email" name="email" value="<?php
                                                                                                                                                                                                                     if (isset($_SESSION['log_email'])) {
                                                                                                                                                                                                                        echo $_SESSION['log_email'];
                                                                                                                                                                                                                        unset($_SESSION['log_email']);
                                                                                                                                                                                                                     }
                                                                                                                                                                                                                     ?>">
            <small class="text-danger">
               <?php
               if (isset($_SESSION['log_email_requried'])) {
                  echo $_SESSION['log_email_requried'];
                  unset($_SESSION['log_email_requried']);
               }
               if (isset($_SESSION['log_valid_email'])) {
                  echo $_SESSION['log_valid_email'];
                  unset($_SESSION['log_valid_email']);
               }
               ?>
            </small>
         </div><!-- form-group -->

         <!-- password -->
         <div class="form-group">
            <input type="password" class="form-control <?= (isset($_SESSION['log_password_requried'])) || (isset($_SESSION['log_password_wrong'])) ? "is-invalid" : "" ?>" placeholder="Enter your password" name="password" value="<?php
                                                                                                                                                                                                                                    if (isset($_SESSION['log_password'])) {
                                                                                                                                                                                                                                       echo $_SESSION['log_password'];
                                                                                                                                                                                                                                       unset($_SESSION['log_password']);
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                    ?>">
            <small class="text-danger">
               <?php
               if (isset($_SESSION['log_password_requried'])) {
                  echo $_SESSION['log_password_requried'];
                  unset($_SESSION['log_password_requried']);
               }
               if (isset($_SESSION['log_password_wrong'])) {
                  echo $_SESSION['log_password_wrong'];
                  unset($_SESSION['log_password_wrong']);
               }
               ?>
            </small>
         </div><!-- form-group -->
         <button type="submit" class="btn btn-info btn-block">Sign In</button>
      </form>

      <div class="mg-t-60 tx-center">Not yet a member? <a href="register.php" class="tx-info">Sign Up</a></div>
   </div><!-- login-wrapper -->
</div><!-- d-flex -->
<?php
include '../include/footer.php';
?>