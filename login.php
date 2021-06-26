<?php
include 'include/header.php';
include 'include/nav.php';

?>

<div class="container">
   <div class="row">
      <div class="col-md-5 m-auto mt-5">
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
         <div class="card border-success ">
            <div class="card-header bg-success text-light">
               <h2 class="text-center">Log In</h2>
            </div>
            <div class="card-body">
               <form action="login_code.php" method="post">
                  <div class="form-group mt-3">
                     <label for="my-input">Email</label>
                     <input id="my-input" placeholder="Enter Your Email" class="form-control" type="text" name="email" value="<?php
                                                                                                                              if (isset($_SESSION['log_email'])) {
                                                                                                                                 echo $_SESSION['log_email'];
                                                                                                                                 unset($_SESSION['log_email']);
                                                                                                                              }
                                                                                                                              ?>">
                     <small class="text-danger">
                        <?php
                        if (isset($_SESSION['log_email_error'])) {
                           echo $_SESSION['log_email_error'];
                           unset($_SESSION['log_email_error']);
                        }
                        if (isset($_SESSION['log_email_error2'])) {
                           echo $_SESSION['log_email_error2'];
                           unset($_SESSION['log_email_error2']);
                        }
                        ?>
                     </small>
                  </div>
                  <div class="form-group mt-3">
                     <label for="my-input">Password</label>
                     <input id="my-input" placeholder="Enter Your Password" class="form-control" type="password" name="password" value="<?php
                                                                                                                                          if (isset($_SESSION['log_password'])) {
                                                                                                                                             echo $_SESSION['log_password'];
                                                                                                                                             unset($_SESSION['log_password']);
                                                                                                                                          }
                                                                                                                                          ?>">
                     <small class="text-danger">
                        <?php
                        if (isset($_SESSION['log_password_error'])) {
                           echo $_SESSION['log_password_error'];
                           unset($_SESSION['log_password_error']);
                        }
                        if (isset($_SESSION['log_password_error2'])) {
                           echo $_SESSION['log_password_error2'];
                           unset($_SESSION['log_password_error2']);
                        }
                        ?>
                     </small>
                  </div>

                  <div class="d-grid gap-2">
                     <button class="btn btn-success mt-3" type="submit">Sign In</button>
                  </div>
               </form>
               <p class="pt-2 text-center">If you have no account, so can create <a href="register.php">new acount</a></p>

            </div>
         </div>
      </div>

   </div>
</div>



<?php
include 'include/footer.php';
?>