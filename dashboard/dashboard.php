<?php
require_once '../include/function.php';
check_auth();
$users = data_read("users", 0);  // 0 == all, 1 == hide_status, 2 == show_status



// include item 
require_once '../include/header.php';
require_once '../include/nav.php';


?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
   <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
         <a class="breadcrumb-item" href="../dashboard/dashboard.php">Bracket</a>
         <span class="breadcrumb-item active">Dashboard</span>
      </nav>
   </div>
   <!-- br-pageheader -->

   <div class="br-pagebody mg-t-5 pd-x-30">
      <!-- <div class="container mt-5">
         <div class="row row-sm">
            <div class="col-md-8 m-auto">
               <div class="card text-center border-success">
                  <div class="card-header bg-teal text-light">
                     Header
                  </div>
                  <div class="card-body">
                     <table class="table table-bordered border-success">
                        <thead class="thead-light text-uppercase bg-success">
                           <tr>
                              <th>NO</th>
                              <th>Name</th>
                              <th>Email</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           foreach ($users as $user_data) :
                           ?>
                              <tr>
                                 <td>ami</td>
                                 <td><?= $user_data['name'] ?></td>
                                 <td><?= $user_data['email'] ?></td>
                              </tr>
                           <?php
                           endforeach;
                           ?>
                        </tbody>
                     </table>
                  </div>
                  <div class="card-footer bg-teal text-light text-uppercase">
                     total : <?= $users->num_rows ?>
                  </div>
               </div>
            </div>
         </div>
      </div>row -->
      <div class="row row-sm">
         <div class="col-sm-6 col-xl-3">
            <div class="bg-teal rounded overflow-hidden">
               <div class="pd-25 d-flex align-items-center">
                  <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                     <a href="../skill/skill.php" class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1 tx-uppercase text-light">Skills</a>
                     <p class="tx-15 tx-spacing-1 tx-mont tx-medium  tx-white-8 mg-b-0 mg-t-10">Total : 10</p>
                     <p class="tx-15 tx-spacing-1 tx-mont tx-medium  tx-white-8 mg-b-0">Show : 5</p>
                  </div>
               </div>
            </div>
         </div><!-- col-3 -->
         <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-danger rounded overflow-hidden">
               <div class="pd-25 d-flex align-items-center">
                  <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                     <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Today Sales</p>
                     <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">$329,291</p>
                     <span class="tx-11 tx-roboto tx-white-6">$390,212 before tax</span>
                  </div>
               </div>
            </div>
         </div><!-- col-3 -->
         <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-primary rounded overflow-hidden">
               <div class="pd-25 d-flex align-items-center">
                  <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                     <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">% Unique Visits</p>
                     <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">54.45%</p>
                     <span class="tx-11 tx-roboto tx-white-6">23% average duration</span>
                  </div>
               </div>
            </div>
         </div><!-- col-3 -->
         <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-br-primary rounded overflow-hidden">
               <div class="pd-25 d-flex align-items-center">
                  <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                     <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Bounce Rate</p>
                     <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">32.16%</p>
                     <span class="tx-11 tx-roboto tx-white-6">65.45% on average time</span>
                  </div>
               </div>
            </div>
         </div><!-- col-3 -->
      </div><!-- row -->
   </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php
include '../include/footer.php';
?>