<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../include/header.php';
require_once '../include/function.php';
check_guest();

$old = $_SESSION['old'] ?? [];
$errors = $_SESSION['error'] ?? [];
?>

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
   <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">

      <!-- Registration Success -->
      <?php if (isset($_SESSION['reg_success'])): ?>
         <div class="alert alert-success"><?= $_SESSION['reg_success']; ?></div>
         <?php unset($_SESSION['reg_success']); ?>
      <?php endif; ?>

      <!-- Access Denied -->
      <?php if (isset($_SESSION['deny_error'])): ?>
         <div class="alert alert-warning"><?= $_SESSION['deny_error']; ?></div>
         <?php unset($_SESSION['deny_error']); ?>
      <?php endif; ?>

      <div class="signin-logo tx-center tx-28 tx-bold tx-inverse mg-b-30">
         <span class="tx-normal">[</span> bracket <span class="tx-normal">]</span>
      </div>

      <form action="login_code.php" method="post">

         <!-- Email -->
         <div class="form-group">
            <input
               type="text"
               class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
               placeholder="Enter your email"
               name="email"
               value="<?= $old['email'] ?? '' ?>"
            >
            <?php if (isset($errors['email'])): ?>
               <small class="text-danger"><?= $errors['email']; ?></small>
            <?php endif; ?>
         </div>

         <!-- Password -->
         <div class="form-group">
            <input
               type="password"
               class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
               placeholder="Enter your password"
               name="password"
            >
            <?php if (isset($errors['password'])): ?>
               <small class="text-danger"><?= $errors['password']; ?></small>
            <?php endif; ?>
         </div>

         <button type="submit" class="btn btn-info btn-block">Sign In</button>
      </form>

      <div class="mg-t-60 tx-center">
         Not yet a member? <a href="register.php" class="tx-info">Sign Up</a>
      </div>
   </div>
</div>

<?php
unset($_SESSION['error'], $_SESSION['old']);
require_once '../include/footer.php';
?>
