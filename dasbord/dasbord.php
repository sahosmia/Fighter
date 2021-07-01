<?php
include '../include/db.php';
$select_query =  "SELECT id, name, email FROM users";
$db_mysqli_query = mysqli_query($db_connect, $select_query);


// include item 
include '../include/header.php';
include '../include/login_check.php';
include '../include/nav.php';
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
   <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
         <a class="breadcrumb-item" href="../dasbord/dasbord.php">Bracket</a>
         <span class="breadcrumb-item active">Dashboard</span>
      </nav>
   </div>
   <!-- br-pageheader -->

   <div class="br-pagebody mg-t-5 pd-x-30">
      <div class="container mt-5">
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
                           foreach ($db_mysqli_query as $user_data) :
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
                     total : <?= $db_mysqli_query->num_rows ?>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- row -->
   </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php
include '../include/footer.php';
?>