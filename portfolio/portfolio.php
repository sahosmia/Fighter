<?php
require_once '../include/function.php';
check_auth();

$count = 1;

// include item 
require_once '../include/header.php';
require_once '../include/nav.php';


$portfolios = data_read("portfolios", 0);  // 0 == all, 1 == hide_status, 2 == show_status
$portfolio_categories = data_read("portfolio_categories", 0);  // 0 == all, 1 == hide_status, 2 == show_status


?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
   <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
         <a class="breadcrumb-item" href="../dashboard/dashboard.php">Bracket</a>
         <span class="breadcrumb-item active text-capitalize">portfolio</span>
      </nav>
   </div>
   <!-- br-pageheader -->

   <div class="br-pagebody mg-t-5 pd-x-30">
      <div class="container-fluid mt-5">
         <div class="row row-sm">
            <div class="col-md-8">
               <div class="card text-center border-success">
                  <div class="card-header bg-teal text-light">
                     Header
                  </div>
                  <div class="card-body">
                     <table class="table table-bordered table-hover">
                        <thead class="thead-light text-uppercase ">
                           <tr>
                              <th>No</th>
                              <th>img</th>
                              <th>Details</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           foreach ($portfolios as $data) :
                           ?>
                              <tr>
                                 <td><?= $count++ ?></td>
                                 <td width='250'><img src="../upload/portfolio/<?= $data['img'] ?>" alt="" class="w-100"></td>
                                 <td width='250' class="text-left">
                                    <li>category : <?= where_data_read('portfolio_categories', $data['category_id'])['name'] ?></li>
                                    <li>Created at : <?= $data['created_at'] ?></li>
                                    <li>Added by : <?= user_name_read($data['added_by']) ?></li>
                                 </td>
                                 <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                       <a href="" class="btn btn-teal  pd-x-15"><i class="fa fa-edit"></i></a>
                                       <a href="../include/action.php?table_name=portfolios&id=<?= $data['id'] ?>&action=show_hide&status=<?= ($data['status']) ?>" class="btn btn-<?= ($data['status'] == 1) ? "warning" : "primary" ?> pd-x-15"><i class="fa <?= ($data['status'] == 1) ? "fa-eye" : "fa-eye-slash" ?>"></i></a>
                                       <a href="../include/action.php?table_name=portfolios&id=<?= $data['id'] ?>&action=img_delete&img_path=../upload/portfolio/<?= $data['img'] ?>" class="btn btn-danger pd-x-15"><i class="fa fa-trash"></i></a>
                                    </div>
                                 </td>
                              </tr>
                           <?php
                           endforeach;
                           ?>
                           <?php
                           if ($count == 1) :
                           ?>
                              <tr>
                                 <td colspan="6" class="text-danger">No data to show</td>
                              </tr>
                           <?php
                           endif;
                           ?>
                        </tbody>
                     </table>
                  </div>
                  <div class="card-footer bg-teal text-light text-uppercase">
                     total : <?= $portfolios->num_rows ?>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="card border-success">
                  <div class="card-header text-center bg-teal text-light">
                     portfolio Add++ <span class="ti-settings"></span>
                  </div>
                  <div class="card-body">

                     <?php
                     if (isset($_SESSION['portfolio_success'])) :
                     ?>
                        <div class="alert alert-success" role="alert">
                           <?= $_SESSION['portfolio_success'] ?>
                        </div>
                     <?php
                        unset($_SESSION['portfolio_success']);
                     endif;
                     ?>
                     <form action="portfolio_code.php" method="post" enctype="multipart/form-data">



                        <select class="form-control" name="category">
                           <option selected value="">Open this select menu</option>
                           <?php
                           foreach ($portfolio_categories as $data) :
                           ?>
                              <option value="<?= $data['id'] ?>" <?php

                                                                  if (isset($_SESSION['category'])) {
                                                                     if ($_SESSION['category'] == $data['id']) {
                                                                        echo "selected";
                                                                     }
                                                                  }
                                                                  ?>><?= $data['name'] ?></option>
                           <?php
                           endforeach;
                           unset($_SESSION['category']);
                           ?>

                        </select>

                        <small class="text-danger">
                           <?php
                           if (isset($_SESSION['category_requried'])) {
                              echo $_SESSION['category_requried'];
                              unset($_SESSION['category_requried']);
                           }

                           ?>
                        </small>


                        <div class="form-group">
                           <label>new file</label>

                           <input type="file" class="form-control-file <?= (isset($_SESSION['portfolio_img_requried'])) ? "is-invalid" : "" ?>" name="portfolio_img" value="<?php
                                                                                                                                                                              if (isset($_SESSION['portfolio_img'])) {
                                                                                                                                                                                 echo $_SESSION['portfolio_img'];
                                                                                                                                                                                 unset($_SESSION['portfolio_img']);
                                                                                                                                                                              }
                                                                                                                                                                              ?>">

                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['portfolio_img_requried'])) {
                                 echo $_SESSION['portfolio_img_requried'];
                                 unset($_SESSION['portfolio_img_requried']);
                              }

                              ?>
                           </small>
                        </div>


                        <button type="submit" class="btn btn-outline-teal btn-block mt-3">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- row -->
   </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php
require_once '../include/footer.php';
?>