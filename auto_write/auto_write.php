<?php
require_once '../include/function.php';
check_auth();
$auto_writes = data_read("auto_writes", 0);

$count = 1;

// include item 
require_once '../include/header.php';
require_once '../include/nav.php';


?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
   <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
         <a class="breadcrumb-item" href="../dasbord/dasbord.php">Bracket</a>
         <span class="breadcrumb-item active">Auto Write</span>
      </nav>
   </div>
   <!-- br-pageheader -->

   <div class="br-pagebody mg-t-5 pd-x-30">
      <div class="container mt-5">
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
                              <th>Details</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           foreach ($auto_writes as $data) :
                           ?>
                              <tr>
                                 <td><?= $count++ ?></td>
                                 <td><?= $data['auto_write_title'] ?></td>

                                 <td width='250' class="text-left">
                                    <ul>
                                       <li>Created at : <?= $data['created_at'] ?></li>
                                       <li>Added by : <?= user_name_read($data['added_by']) ?></li>
                                    </ul>

                                 </td>
                                 <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                       <a href="" class="btn btn-teal  pd-x-15"><i class="fa fa-edit"></i></a>
                                       <a href="../include/action.php?table_name=auto_writes&id=<?= $data['id'] ?>&action=show_hide&status=<?= ($data['status']) ?>" class="btn btn-<?= ($data['status'] == 1) ? "warning" : "primary" ?> pd-x-15"><i class="fa <?= ($data['status'] == 1) ? "fa-eye" : "fa-eye-slash" ?>"></i></a>
                                       <a href="../include/action.php?table_name=auto_writes&id=<?= $data['id'] ?>&action=single_delete" class="btn btn-danger pd-x-15"><i class="fa fa-trash"></i></a>
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
                     total : <?= $auto_writes->num_rows ?>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card border-success">
                  <div class="card-header text-center bg-teal text-light">
                     Auto Write Title Add++
                  </div>
                  <div class="card-body">
                     <?php
                     if (isset($_SESSION['auto_write_success'])) :
                     ?>
                        <div class="alert alert-success" role="alert">
                           <?= $_SESSION['auto_write_success'] ?>
                        </div>
                     <?php
                        unset($_SESSION['auto_write_success']);
                     endif;
                     ?>
                     <form action="auto_write_code.php" method="post">
                        <div class="form-group">
                           <label for="my-input">Skill Title</label>
                           <input id="my-input" placeholder="Enter your auto write title" class="form-control <?= (isset($_SESSION['auto_write_title_requried'])) || (isset($_SESSION['auto_write_title_exist'])) ? "is-invalid" : "" ?>" type=" text" name="auto_write_title" value="<?php
                                                                                                                                                                                                                                                                                       if (isset($_SESSION['auto_write_title'])) {
                                                                                                                                                                                                                                                                                          echo $_SESSION['auto_write_title'];
                                                                                                                                                                                                                                                                                          unset($_SESSION['auto_write_title']);
                                                                                                                                                                                                                                                                                       }
                                                                                                                                                                                                                                                                                       ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['auto_write_title_requried'])) {
                                 echo $_SESSION['auto_write_title_requried'];
                                 unset($_SESSION['auto_write_title_requried']);
                              }
                              if (isset($_SESSION['auto_write_title_exist'])) {
                                 echo $_SESSION['auto_write_title_exist'];
                                 unset($_SESSION['auto_write_title_exist']);
                              }
                              ?>
                           </small>
                        </div>

                        <button type="submit" class="btn btn-outline-teal">Submit</button>
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