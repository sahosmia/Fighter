<nav class="navbar navbar-expand-lg navbar-light bg-success">
   <div class="container">
      <a class="navbar-brand text-light" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-uppercase">
            <li class="nav-item">
               <a class="nav-link text-light" href="index.php">home</a>
            </li>
            <?php
            if (isset($_SESSION['log_chack'])) :
            ?>
               <li class="nav-item">
                  <a class="nav-link text-light" href="log_out_code.php">log Out</a>
               </li>
            <?php
            else :
            ?>
               <li class="nav-item">
                  <a class="nav-link text-light" href="login.php">login</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link text-light" href="register.php">register</a>
               </li>
            <?php
            endif;
            ?>
         </ul>
      </div>
   </div>
</nav>
