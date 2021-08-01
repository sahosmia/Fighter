<?php
require_once '../include/function.php';

$count = 1;

// include item 
require_once '../include/header.php';
require_once '../include/login_check.php';
require_once '../include/nav.php';


$auto_counters = data_read("auto_counters", 0);  // 0 == all, 1 == hide_status, 2 == show_status


?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
   <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
         <a class="breadcrumb-item" href="../dasbord/dasbord.php">Bracket</a>
         <span class="breadcrumb-item active text-capitalize">auto_counter</span>
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
                           foreach ($auto_counters as $data) :
                           ?>
                              <tr>
                                 <td><?= $count++ ?></td>
                                 <td><?= $data['title'] ?></td>
                                 <td width='250'><?= $data['value'] ?></td>
                                 <td><span class="<?= $data['logo'] ?>"></span></td>
                                 <td width='250' class="text-left">
                                    <li>Created at : <?= $data['created_at'] ?></li>
                                    <li>Added by : <?= user_name_read($data['added_by']) ?></li>

                                 </td>
                                 <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                       <a href="" class="btn btn-teal  pd-x-15"><i class="fa fa-edit"></i></a>
                                       <a href="../include/action.php?table_name=auto_counters&id=<?= $data['id'] ?>&action=show_hide&status=<?= ($data['status']) ?>" class="btn btn-<?= ($data['status'] == 1) ? "warning" : "primary" ?> pd-x-15"><i class="fa <?= ($data['status'] == 1) ? "fa-eye" : "fa-eye-slash" ?>"></i></a>
                                       <a href="../include/action.php?table_name=auto_counters&id=<?= $data['id'] ?>&action=single_delete" class="btn btn-danger pd-x-15"><i class="fa fa-trash"></i></a>
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
                     total : <?= $auto_counters->num_rows ?>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="card border-success">
                  <div class="card-header text-center bg-teal text-light">
                     auto_counter Add++ <span class="ti-settings"></span>
                  </div>
                  <div class="card-body">
                     <?php
                     if (isset($_SESSION['auto_counter_success'])) :
                     ?>
                        <div class="alert alert-success" role="alert">
                           <?= $_SESSION['auto_counter_success'] ?>
                        </div>
                     <?php
                        unset($_SESSION['auto_counter_success']);
                     endif;
                     ?>
                     <form action="auto_counter_code.php" method="post">
                        <div class="form-group">
                           <label>Auto Counter Title</label>
                           <input placeholder="Enter your auto_counter title" class="form-control <?= (isset($_SESSION['auto_counter_title_requried'])) || (isset($_SESSION['auto_counter_title_exist'])) ? "is-invalid" : "" ?>" type=" text" name="auto_counter_title" e="<?php
                                                                                                                                                                                                                                                                              if (isset($_SESSION['auto_counter_title'])) {
                                                                                                                                                                                                                                                                                 echo $_SESSION['auto_counter_title'];
                                                                                                                                                                                                                                                                                 unset($_SESSION['auto_counter_title']);
                                                                                                                                                                                                                                                                              }
                                                                                                                                                                                                                                                                              ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['auto_counter_title_requried'])) {
                                 echo $_SESSION['auto_counter_title_requried'];
                                 unset($_SESSION['auto_counter_title_requried']);
                              }
                              if (isset($_SESSION['auto_counter_title_exist'])) {
                                 echo $_SESSION['auto_counter_title_exist'];
                                 unset($_SESSION['auto_counter_title_exist']);
                              }
                              ?>
                           </small>
                        </div>
                        <div class="form-group">
                           <label>Auto Counter Title</label>
                           <input placeholder="Enter your auto_counter value" class="form-control <?= (isset($_SESSION['auto_counter_value_requried'])) ? "is-invalid" : "" ?>" type=" text" name="auto_counter_value" e="<?php
                                                                                                                                                                                                                           if (isset($_SESSION['auto_counter_value'])) {
                                                                                                                                                                                                                              echo $_SESSION['auto_counter_value'];
                                                                                                                                                                                                                              unset($_SESSION['auto_counter_value']);
                                                                                                                                                                                                                           }
                                                                                                                                                                                                                           ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['auto_counter_value_requried'])) {
                                 echo $_SESSION['auto_counter_value_requried'];
                                 unset($_SESSION['auto_counter_value_requried']);
                              }

                              ?>
                           </small>
                        </div>

                        <div class="form-group">
                           <label>auto_counter Title</label>
                           <input readonly id="icon_input" placeholder="Select your auto_counter logo" class="form-control <?= (isset($_SESSION['auto_counter_logo_requried'])) ? "is-invalid" : "" ?>" type=" text" name="auto_counter_logo" value="<?php
                                                                                                                                                                                                                                                      if (isset($_SESSION['auto_counter_logo'])) {
                                                                                                                                                                                                                                                         echo $_SESSION['auto_counter_logo'];
                                                                                                                                                                                                                                                         unset($_SESSION['auto_counter_logo']);
                                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                                      ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['auto_counter_logo_requried'])) {
                                 echo $_SESSION['auto_counter_logo_requried'];
                                 unset($_SESSION['auto_counter_logo_requried']);
                              }
                              ?>
                           </small>
                        </div>
                        <span id="ti-settings" class="ti-settings auto_counter_input_icon"></span>
                        <span id="ti-wand" class="ti-wand auto_counter_input_icon"></span>
                        <span id="ti-direction-alt" class="ti-direction-alt auto_counter_input_icon"></span>
                        <span id="ti-save" class="ti-save auto_counter_input_icon"></span>
                        <span id="ti-user" class="ti-user auto_counter_input_icon"></span>
                        <span id="ti-link" class="ti-link auto_counter_input_icon"></span>
                        <span id="ti-trash" class="ti-trash auto_counter_input_icon"></span>
                        <span id="ti-desktop" class="ti-desktop auto_counter_input_icon"></span>
                        <span id="ti-tablet" class="ti-tablet auto_counter_input_icon"></span>
                        <span id="ti-mobile" class="ti-mobile auto_counter_input_icon"></span>
                        <span id="ti-email" class="ti-email auto_counter_input_icon"></span>
                        <span id="ti-shopping-cart-full" class="ti-shopping-cart-full auto_counter_input_icon"></span>
                        <span id="ti-search" class="ti-search auto_counter_input_icon"></span>
                        <span id="ti-ruler-pencil" class="ti-ruler-pencil auto_counter_input_icon"></span>
                        <span id="ti-camera" class="ti-camera auto_counter_input_icon"></span>
                        <span id="ti-blackboard" class="ti-blackboard auto_counter_input_icon"></span>
                        <span id="ti-package" class="ti-package auto_counter_input_icon"></span>
                        <span id="ti-server" class="ti-server auto_counter_input_icon"></span>


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
<script>
   $('.auto_counter_input_icon').click(function() {
      var icon_id = $(this).attr('id');
      $('#icon_input').val(icon_id);
      // alert(icon_id);
   });
</script>