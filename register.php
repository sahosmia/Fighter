<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Hello, world!</title>
</head>

<body>
  <?php include 'include/nav.php'; ?>
  <div class="container">
    <div class="row">
      <div class="col-md-5 m-auto mt-5">
        <div class="card border-success ">
          <div class="card-header bg-success text-light">
            <h2 class="text-center">Ragister</h2>
          </div>
          <div class="card-body">
            <form action="ragister_code.php" method="post">
              <div class="form-group">
                <label for="my-input">Name</label>
                <input id="my-input" placeholder="Enter Your Name" class="form-control" type="text" name="name" value="<?php
                                                                                                                        if (isset($_SESSION['name'])) {
                                                                                                                          echo $_SESSION['name'];
                                                                                                                          unset($_SESSION['name']);
                                                                                                                        }
                                                                                                                        ?>">
                <small class="text-danger">
                  <?php
                  if (isset($_SESSION['name_error'])) {
                    echo $_SESSION['name_error'];
                    unset($_SESSION['name_error']);
                  }
                  ?>
                </small>
              </div>
              <div class="form-group mt-3">
                <label for="my-input">Email</label>
                <input id="my-input" placeholder="Enter Your Email" class="form-control" type="text" name="email" value="<?php
                                                                                                                          if (isset($_SESSION['email'])) {
                                                                                                                            echo $_SESSION['email'];
                                                                                                                            unset($_SESSION['email']);
                                                                                                                          }
                                                                                                                          ?>">
                <small class="text-danger">
                  <?php
                  if (isset($_SESSION['email_error'])) {
                    echo $_SESSION['email_error'];
                    unset($_SESSION['email_error']);
                  }
                  if (isset($_SESSION['email_error2'])) {
                    echo $_SESSION['email_error2'];
                    unset($_SESSION['email_error2']);
                  }
                  if (isset($_SESSION['email_error3'])) {
                    echo $_SESSION['email_error3'];
                    unset($_SESSION['email_error3']);
                  }
                  ?>
                </small>
              </div>
              <div class="form-group mt-3">
                <label for="my-input">Password</label>
                <input id="my-input" placeholder="Enter Your Password" class="form-control" type="password" name="password" value="<?php
                                                                                                                                    if (isset($_SESSION['password'])) {
                                                                                                                                      echo $_SESSION['password'];
                                                                                                                                      unset($_SESSION['password']);
                                                                                                                                    }
                                                                                                                                    ?>">
                <small class="text-danger">
                  <?php
                  if (isset($_SESSION['password_error'])) {
                    echo $_SESSION['password_error'];
                    unset($_SESSION['password_error']);
                  }
                  ?>
                </small>
              </div>
              <div class="form-group mt-3">
                <label>Confirm Password</label>
                <input placeholder="Enter Your Confirm Password" class="form-control" type="password" name="confirm_password" value="<?php
                                                                                                                                      if (isset($_SESSION['confirm_password'])) {
                                                                                                                                        echo $_SESSION['confirm_password'];
                                                                                                                                        unset($_SESSION['confirm_password']);
                                                                                                                                      }
                                                                                                                                      ?>">
                <small class="text-danger">
                  <?php
                  if (isset($_SESSION['confirm_password_error'])) {
                    echo $_SESSION['confirm_password_error'];
                    unset($_SESSION['confirm_password_error']);
                  }
                  if (isset($_SESSION['confirm_password_error2'])) {
                    echo $_SESSION['confirm_password_error2'];
                    unset($_SESSION['confirm_password_error2']);
                  }
                  ?>
                </small>
              </div>
              <div class="d-grid gap-2">
                <button class="btn btn-success mt-3" type="submit">Sign Up</button>
              </div>
            </form>
            <p class="pt-2 text-center">If you have an account, so can <a href="login.php">login</a></p>
          </div>
        </div>
      </div>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>