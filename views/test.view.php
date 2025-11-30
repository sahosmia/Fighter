<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once 'partials/header.php';
// require_once 'views/partials/nav.php';
?>

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
   <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">

      <!-- Registration Success -->
      <?php if (!empty($_SESSION['reg_success'])): ?>
         <div class="alert alert-success"><?= $_SESSION['reg_success']; ?></div>
         <?php unset($_SESSION['reg_success']); ?>
      <?php endif; ?>

      <!-- Access Denied -->
      <?php if (!empty($_SESSION['deny_error'])): ?>
         <div class="alert alert-warning"><?= $_SESSION['deny_error']; ?></div>
         <?php unset($_SESSION['deny_error']); ?>
      <?php endif; ?>

      <div class="signin-logo tx-center tx-28 tx-bold tx-inverse mg-b-30">
         <span class="tx-normal">[</span> bracket <span class="tx-normal">]</span>
      </div>

      <form action="" method="post">

         <!-- Email -->
         <div class="form-group">
            <input
               type="text"
               class="form-control <?= isset($_SESSION['error']['email']) ? 'is-invalid' : '' ?>"
               placeholder="Enter your email"
               name="email"
               value="<?= $_SESSION['old']['email'] ?? '' ?>"
            >
            <?php if (isset($_SESSION['error']['email'])): ?>
               <small class="text-danger"><?= $_SESSION['error']['email']; ?></small>
            <?php endif; ?>
         </div>

         <!-- Password -->
         <div class="form-group">
            <input
               type="password"
               class="form-control <?= isset($_SESSION['error']['password']) ? 'is-invalid' : '' ?>"
               placeholder="Enter your password"
               name="password"
            >
            <?php if (isset($_SESSION['error']['password'])): ?>
               <small class="text-danger"><?= $_SESSION['error']['password']; ?></small>
            <?php endif; ?>
         </div>

         <button type="submit" class="btn btn-info btn-block">Sign In</button>
      </form>

      <div class="mg-t-60 tx-center">
         Not yet a member? <a href="/register.php" class="tx-info">Sign Up</a>
      </div>
   </div>
</div>
<?php
require_once 'partials/footer.php';
?>