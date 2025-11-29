<?php
require_once '../include/function.php';
check_auth();

$count = 1;

// include item 
require_once '../include/header.php';
require_once '../include/nav.php';


$services = data_read("services", 0);  // 0 == all, 1 == hide_status, 2 == show_status


?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
   <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
         <a class="breadcrumb-item" href="../dasbord/dasbord.php">Bracket</a>
         <span class="breadcrumb-item active text-capitalize">service</span>
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
                              <th>Title</th>
                              <th>Description</th>
                              <th>Icon</th>
                              <th>Details</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           foreach ($services as $data) :
                           ?>
                              <tr>
                                 <td><?= $count++ ?></td>
                                 <td><?= $data['service_title'] ?></td>
                                 <td width='250'><?= $data['service_description'] ?></td>
                                 <td><span class="<?= $data['service_icon'] ?>"></span></td>
                                 <td width='250' class="text-left">
                                    <li>Created at : <?= $data['created_at'] ?></li>
                                    <li>Added by : <?= user_name_read($data['added_by']) ?></li>

                                 </td>
                                 <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                       <a href="" class="btn btn-teal  pd-x-15"><i class="fa fa-edit"></i></a>
                                       <a href="../include/action.php?table_name=services&id=<?= $data['id'] ?>&action=show_hide&status=<?= ($data['status']) ?>" class="btn btn-<?= ($data['status'] == 1) ? "warning" : "primary" ?> pd-x-15"><i class="fa <?= ($data['status'] == 1) ? "fa-eye" : "fa-eye-slash" ?>"></i></a>
                                       <a href="../include/action.php?table_name=services&id=<?= $data['id'] ?>&action=single_delete" class="btn btn-danger pd-x-15"><i class="fa fa-trash"></i></a>
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
                     total : <?= $services->num_rows ?>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="card border-success">
                  <div class="card-header text-center bg-teal text-light">
                     service Add++ <span class="ti-settings"></span>
                  </div>
                  <div class="card-body">
                     <?php
                     if (isset($_SESSION['service_success'])) :
                     ?>
                        <div class="alert alert-success" role="alert">
                           <?= $_SESSION['service_success'] ?>
                        </div>
                     <?php
                        unset($_SESSION['service_success']);
                     endif;
                     ?>
                     <form action="service_code.php" method="post">
                        <div class="form-group">
                           <label>Service Title</label>
                           <input placeholder="Enter your service title" class="form-control <?= (isset($_SESSION['service_title_requried'])) || (isset($_SESSION['service_title_exist'])) ? "is-invalid" : "" ?>" type=" text" name="service_title" e="<?php
                                                                                                                                                                                                                                                         if (isset($_SESSION['service_title'])) {
                                                                                                                                                                                                                                                            echo $_SESSION['service_title'];
                                                                                                                                                                                                                                                            unset($_SESSION['service_title']);
                                                                                                                                                                                                                                                         }
                                                                                                                                                                                                                                                         ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['service_title_requried'])) {
                                 echo $_SESSION['service_title_requried'];
                                 unset($_SESSION['service_title_requried']);
                              }
                              if (isset($_SESSION['service_title_exist'])) {
                                 echo $_SESSION['service_title_exist'];
                                 unset($_SESSION['service_title_exist']);
                              }
                              ?>
                           </small>
                        </div>
                        <div class="form-group">
                           <label>Service Dscription</label>
                           <textarea rows="5" placeholder="Enter your service description" class="form-control <?= (isset($_SESSION['service_description_requried'])) ? "is-invalid" : "" ?>" name="service_description" value="<?php
                                                                                                                                                                                                                                 if (isset($_SESSION['service_description'])) {
                                                                                                                                                                                                                                    echo $_SESSION['service_description'];
                                                                                                                                                                                                                                    unset($_SESSION['service_description']);
                                                                                                                                                                                                                                 }
                                                                                                                                                                                                                                 ?>"></textarea>
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['service_description_requried'])) {
                                 echo $_SESSION['service_description_requried'];
                                 unset($_SESSION['service_description_requried']);
                              }
                              ?>
                           </small>
                        </div>
                        <div class="form-group">
                           <label>Service Title</label>
                           <input readonly id="icon_input" placeholder="Select your service icon" class="form-control <?= (isset($_SESSION['service_icon_requried'])) ? "is-invalid" : "" ?>" type=" text" name="service_icon" value="<?php
                                                                                                                                                                                                                                       if (isset($_SESSION['service_icon'])) {
                                                                                                                                                                                                                                          echo $_SESSION['service_icon'];
                                                                                                                                                                                                                                          unset($_SESSION['service_icon']);
                                                                                                                                                                                                                                       }
                                                                                                                                                                                                                                       ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['service_icon_requried'])) {
                                 echo $_SESSION['service_icon_requried'];
                                 unset($_SESSION['service_icon_requried']);
                              }
                              ?>
                           </small>
                        </div>
                        <span id="ti-settings" class="ti-settings service_input_icon"></span>
                        <span id="ti-wand" class="ti-wand service_input_icon"></span>
                        <span id="ti-direction-alt" class="ti-direction-alt service_input_icon"></span>
                        <span id="ti-save" class="ti-save service_input_icon"></span>
                        <span id="ti-user" class="ti-user service_input_icon"></span>
                        <span id="ti-link" class="ti-link service_input_icon"></span>
                        <span id="ti-trash" class="ti-trash service_input_icon"></span>
                        <span id="ti-desktop" class="ti-desktop service_input_icon"></span>
                        <span id="ti-tablet" class="ti-tablet service_input_icon"></span>
                        <span id="ti-mobile" class="ti-mobile service_input_icon"></span>
                        <span id="ti-email" class="ti-email service_input_icon"></span>
                        <span id="ti-shopping-cart-full" class="ti-shopping-cart-full service_input_icon"></span>
                        <span id="ti-search" class="ti-search service_input_icon"></span>
                        <span id="ti-ruler-pencil" class="ti-ruler-pencil service_input_icon"></span>
                        <span id="ti-camera" class="ti-camera service_input_icon"></span>
                        <span id="ti-blackboard" class="ti-blackboard service_input_icon"></span>
                        <span id="ti-package" class="ti-package service_input_icon"></span>
                        <span id="ti-server" class="ti-server service_input_icon"></span>


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
include '../include/footer.php';
?>
<script>
   $('.service_input_icon').click(function() {
      var icon_id = $(this).attr('id');
      $('#icon_input').val(icon_id);
      // alert(icon_id);
   });
</script>