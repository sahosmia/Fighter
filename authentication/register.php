<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
include '../include/header.php';

$old = $_SESSION['old'] ?? [];
$errors = $_SESSION['error'] ?? [];
$success = $_SESSION['success'] ?? null;
?>
<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
  <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">

    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse mg-b-30">
      <span class="tx-normal">[</span> bracket <span class="tx-normal">]</span>
    </div>

    <?php if ($success): ?>
      <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <form action="ragister_code.php" method="post">

      <!-- Name -->
      <div class="form-group">
        <input type="text"
               class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
               placeholder="Enter your name"
               name="name"
               value="<?= $old['name'] ?? '' ?>">
        <small class="text-danger"><?= $errors['name'] ?? '' ?></small>
      </div>

      <!-- Email -->
      <div class="form-group">
        <input type="text"
               class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
               placeholder="Enter your email"
               name="email"
               value="<?= $old['email'] ?? '' ?>">
        <small class="text-danger"><?= $errors['email'] ?? '' ?></small>
      </div>

      <!-- Password -->
      <div class="form-group">
        <input type="password"
               class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
               placeholder="Enter your password"
               name="password">
        <small class="text-danger"><?= $errors['password'] ?? '' ?></small>
      </div>

      <!-- Confirm Password -->
      <div class="form-group">
        <input type="password"
               class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid' : '' ?>"
               placeholder="Confirm your password"
               name="confirm_password">
        <small class="text-danger"><?= $errors['confirm_password'] ?? '' ?></small>
      </div>

      <button type="submit" class="btn btn-info btn-block">Sign Up</button>
    </form>

    <div class="mg-t-60 tx-center">Already a member? <a href="login.php" class="tx-info">Sign in</a></div>

  </div>
</div>

<?php include '../include/footer.php'; ?>

<?php
unset($_SESSION['error'], $_SESSION['old'], $_SESSION['success']);
?>
