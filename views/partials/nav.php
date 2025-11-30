<!-- ########## START: LEFT PANEL ########## -->

<div class="br-logo"><a href=""><span>[</span>bracket<span>]</span></a></div>
<div class="br-sideleft overflow-y-auto">
   <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
   <div class="br-sideleft-menu">

      <a href="../dashboard/dashboard.php" class="br-menu-link <?= ($_SERVER['REQUEST_URI'] == "/new_php/dashboard/dashboard.php") ? "active" : "" ?> ">
         <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
         </div><!-- menu-item -->
      </a><!-- br-menu-link -->
      <a href="../profile/edit.php" class="br-menu-link <?= ($_SERVER['REQUEST_URI'] == "/new_php/profile/edit.php") ? "active" : "" ?> ">
         <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-compose-outline tx-24"></i>
            <span class="menu-item-label">Edit Profile</span>
         </div><!-- menu-item -->
      </a><!-- br-menu-link -->
      <a href="../auto_write/auto_write.php" class="br-menu-link <?= ($_SERVER['REQUEST_URI'] == "/new_php/auto_write/auto_write.php") ? "active" : "" ?> ">
         <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-settings tx-24"></i>
            <span class="menu-item-label">Auto Write</span>
         </div><!-- menu-item -->
      </a><!-- br-menu-link -->
      <a href="../skill/skill.php" class="br-menu-link <?= ($_SERVER['REQUEST_URI'] == "/new_php/skill/skill.php") ? "active" : "" ?> ">
         <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-settings tx-24"></i>
            <span class="menu-item-label">Skill</span>
         </div><!-- menu-item -->
      </a><!-- br-menu-link -->
      <a href="../service/service.php" class="br-menu-link <?= ($_SERVER['REQUEST_URI'] == "/new_php/service/service.php") ? "active" : "" ?> ">
         <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-24"></i>
            <span class="menu-item-label">Service</span>
         </div><!-- menu-item -->
      </a><!-- br-menu-link -->
      <a href="../portfolio/portfolio.php" class="br-menu-link <?= ($_SERVER['REQUEST_URI'] == "/new_php/portfolio/portfolio.php") ? "active" : "" ?> ">
         <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-24"></i>
            <span class="menu-item-label">portfolio</span>
         </div><!-- menu-item -->
      </a><!-- br-menu-link -->
      <a href="../portfolio/portfolio_category.php" class="br-menu-link <?= ($_SERVER['REQUEST_URI'] == "/new_php/portfolio/portfolio_category.php") ? "active" : "" ?> ">
         <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-24"></i>
            <span class="menu-item-label">portfolio category</span>
         </div><!-- menu-item -->
      </a><!-- br-menu-link -->
      <a href="../auto_counter/auto_counter.php" class="br-menu-link <?= ($_SERVER['REQUEST_URI'] == "/new_php/auto_counter/auto_counter.php") ? "active" : "" ?> ">
         <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-24"></i>
            <span class="menu-item-label">Auto Counter</span>
         </div><!-- menu-item -->
      </a><!-- br-menu-link -->
      <?php
      if (isset($_GET['table_name'])) {

         $table_name = $_GET['table_name'];
      }
      if (isset($_GET['id'])) {

         $id = $_GET['id'];
      }
      ?>
      <a href="../team/team.php" class="br-menu-link <?= ($_SERVER['REQUEST_URI'] == "/new_php/team/team.php") || ($_SERVER['REQUEST_URI'] == "/new_php/team/team_update.php?table_name=$table_name&id=$id") ? "active" : "" ?> ">
         <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-24"></i>
            <span class="menu-item-label">Team</span>
         </div><!-- menu-item -->
      </a><!-- br-menu-link -->
      <a href="../setting/setting.php" class="br-menu-link <?= ($_SERVER['REQUEST_URI'] == "/new_php/setting/setting.php") ? "active" : "" ?> ">
         <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-24"></i>
            <span class="menu-item-label">Setting</span>
         </div><!-- menu-item -->
      </a><!-- br-menu-link -->




      <a href="../index.php" class="br-menu-link <?= ($_SERVER['REQUEST_URI'] == "/new_php/index.php") ? "active" : "" ?> ">
         <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Visit Site</span>
         </div><!-- menu-item -->
      </a><!-- br-menu-link -->


   </div><!-- info-lst -->

   <br>
</div><!-- br-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<div class="br-header">
   <div class="br-header-left">
      <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
      <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>

   </div><!-- br-header-left -->
   <div class="br-header-right">
      <nav class="nav">
         <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
               <span class="logged-name hidden-md-down">Katherine</span>
               <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
               <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
               <ul class="list-unstyled user-profile-nav">
                  <li><a href="../profile/edit.php"><i class="icon ion-ios-compose"></i> Edit Profile</a></li>
                  <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li>
                  <li><a href="../authentication/log_out_code.php"><i class="icon ion-power"></i> Sign Out</a></li>
               </ul>
            </div><!-- dropdown-menu -->
         </div><!-- dropdown -->
      </nav>
   </div><!-- br-header-right -->
</div><!-- br-header -->
<!-- ########## END: HEAD PANEL ########## -->