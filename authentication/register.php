<?php
session_start();
include '../include/header.php';
?>
<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
  <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse mg-b-30"><span class="tx-normal">[</span> bracket <span class="tx-normal">]</span></div>
    <form action="ragister_code.php" method="post">

      <!-- name -->
      <div class="form-group">
        <input type="text" class="form-control <?= (isset($_SESSION['reg_name_requried'])) ? "is-invalid" : "" ?>" placeholder="Enter your email" name="name" value="<?php
                                                                                                                                                                      if (isset($_SESSION['reg_name'])) {
                                                                                                                                                                        echo $_SESSION['reg_name'];
                                                                                                                                                                        unset($_SESSION['reg_name']);
                                                                                                                                                                      }
                                                                                                                                                                      ?>">
        <small class="text-danger">
          <?php
          if (isset($_SESSION['reg_name_requried'])) {
            echo $_SESSION['reg_name_requried'];
            unset($_SESSION['reg_name_requried']);
          }
          ?>
        </small>
      </div><!-- form-group -->

      <!-- email  -->
      <div class="form-group">
        <input type="text" class="form-control <?= (isset($_SESSION['reg_email_requried'])) || (isset($_SESSION['reg_email_invalid'])) || (isset($_SESSION['reg_email_exist'])) ? "is-invalid" : "" ?>" placeholder="Enter your email" name="email" value="<?php
                                                                                                                                                                                                                                                            if (isset($_SESSION['reg_email'])) {
                                                                                                                                                                                                                                                              echo $_SESSION['reg_email'];
                                                                                                                                                                                                                                                              unset($_SESSION['reg_email']);
                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                            ?>">
        <small class="text-danger">
          <?php
          if (isset($_SESSION['reg_email_requried'])) {
            echo $_SESSION['reg_email_requried'];
            unset($_SESSION['reg_email_requried']);
          }
          if (isset($_SESSION['reg_email_invalid'])) {
            echo $_SESSION['reg_email_invalid'];
            unset($_SESSION['reg_email_invalid']);
          }
          if (isset($_SESSION['reg_email_exist'])) {
            echo $_SESSION['reg_email_exist'];
            unset($_SESSION['reg_email_exist']);
          }
          ?>
        </small>
      </div><!-- form-group -->

      <!-- password  -->
      <div class="form-group">
        <input type="password" class="form-control <?= (isset($_SESSION['reg_password_requried'])) ? "is-invalid" : "" ?>" placeholder="Enter your password" name="password" value="<?php
                                                                                                                                                                                    if (isset($_SESSION['reg_password'])) {
                                                                                                                                                                                      echo $_SESSION['reg_password'];
                                                                                                                                                                                      unset($_SESSION['reg_password']);
                                                                                                                                                                                    }
                                                                                                                                                                                    ?>">
        <small class="text-danger">
          <?php
          if (isset($_SESSION['reg_password_requried'])) {
            echo $_SESSION['reg_password_requried'];
            unset($_SESSION['reg_password_requried']);
          }
          ?>
        </small>
      </div><!-- form-group -->

      <!-- confirmed password -->
      <div class="form-group">
        <input type="password" class="form-control <?= (isset($_SESSION['reg_confirm_password_requried'])) || (isset($_SESSION['confirm_password_match']))  ? "is-invalid" : "" ?>" placeholder=" Enter your confirmed password" name="confirm_password" value="<?php
                                                                                                                                                                                                                                                                if (isset($_SESSION['reg_confirm_password'])) {
                                                                                                                                                                                                                                                                  echo $_SESSION['reg_confirm_password'];
                                                                                                                                                                                                                                                                  unset($_SESSION['reg_confirm_password']);
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                ?>">
        <small class="text-danger">
          <?php
          if (isset($_SESSION['reg_confirm_password_requried'])) {
            echo $_SESSION['reg_confirm_password_requried'];
            unset($_SESSION['reg_confirm_password_requried']);
          }
          if (isset($_SESSION['confirm_password_match'])) {
            echo $_SESSION['confirm_password_match'];
            unset($_SESSION['confirm_password_match']);
          }
          ?>
        </small>
      </div><!-- form-group -->

      <button type="submit" class="btn btn-info btn-block">Sign Up</button>
    </form>

    <div class="mg-t-60 tx-center">Are you a member? <a href="login.php" class="tx-info">Sign in</a></div>
  </div><!-- login-wrapper -->
</div><!-- d-flex -->
<script>
  $(function() {
    'use strict'

    // FOR DEMO ONLY
    // menu collapsed by default during first page load or refresh with screen
    // having a size between 992px and 1299px. This is intended on this page only
    // for better viewing of widgets demo.
    $(window).resize(function() {
      minimizeMenu();
    });

    minimizeMenu();

    function minimizeMenu() {
      if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
        // show only the icons and hide left menu label by default
        $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
        $('body').addClass('collapsed-menu');
        $('.show-sub + .br-menu-sub').slideUp();
      } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
        $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
        $('body').removeClass('collapsed-menu');
        $('.show-sub + .br-menu-sub').slideDown();
      }
    }
  });
  <?php
  include '../include/footer.php';
  ?>