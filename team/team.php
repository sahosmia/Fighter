<?php
require_once '../include/function.php';
check_auth();
$count = 1;

// include item 
require_once '../include/header.php';
require_once '../include/nav.php';


$teams = data_read("teams", 0);  // 0 == all, 1 == hide_status, 2 == show_status


?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
   <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
         <a class="breadcrumb-item" href="../dashboard/dashboard.php">Bracket</a>
         <span class="breadcrumb-item active text-capitalize">team</span>
      </nav>
   </div>
   <!-- br-pageheader -->

   <div class="br-pagebody mg-t-5 pd-x-30">
      <div class="container-fluid mt-5">
         <div class="row row-sm">
            <div class="col-md-9">
               <div class="card text-center border-success">
                  <div class="card-header bg-teal text-light">
                     Header
                  </div>
                  <div class="card-body">
                     <?php

                     if ($teams->num_rows != 0) :
                     ?><form action="mark_delete.php" method="POST">
                           <div class="text-right pb-3">
                              <button type="submit" class="btn btn-info pd-x-15">Mark Delete</button>
                              <a href="../include/action.php?table_name=teams&action=delete_all" class="btn btn-danger pd-x-15">Delete All</a>
                           </div>
                        <?php
                     endif;
                        ?>
                        <table class="table table-bordered table-hover">
                           <thead class="thead-light text-uppercase ">
                              <tr>
                                 <th>Select</th>
                                 <th>No</th>

                                 <th>Image</th>
                                 <th>Details</th>
                                 <th>Socail Midia</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              foreach ($teams as $data) :
                              ?>
                                 <tr>
                                    <td width='25'><input type="checkbox" name="select_item[]" value="<?= $data['id'] ?>"></td>
                                    <td><?= $count++ ?></td>

                                    <td width='100'><img src="../upload/team/<?= $data['img'] ?>" alt="" class="w-100"></td>
                                    <td width='300' class="text-left">
                                       <ul class="list-unstyled">
                                          <li>Name : <?= $data['name'] ?></li>
                                          <li>Title : <?= $data['title'] ?></li>
                                          <li>Time: <?php
                                                      $time = strtotime($data['created_at']);
                                                      echo date('h:i A, l, jS F, Y', $time);

                                                      ?></li>
                                          <li>Added by : <?= user_name_read($data['added_by']) ?></li>
                                       </ul>
                                    </td>

                                    <td width='250' class="text-left text-center">
                                       <?php
                                       if ($data['linkedin'] != null) :
                                       ?>
                                          <a href="#" class="btn btn-outline-success btn-icon rounded-circle mg-r-5 mg-b-10">
                                             <div><i class="fa fa-linkedin"></i></div>
                                          </a>
                                       <?php
                                       endif;
                                       ?>
                                       <a href="#" class="btn btn-outline-primary btn-icon rounded-circle mg-r-5 mg-b-10">
                                          <div><i class="fa fa-facebook"></i></div>
                                       </a>
                                       <?php
                                       if ($data['tumblr'] != null) :
                                       ?>
                                          <a href="#" class="btn btn-outline-dark btn-icon rounded-circle mg-r-5 mg-b-10">
                                             <div><i class="fa fa-tumblr"></i></div>
                                          </a>
                                       <?php
                                       endif;
                                       ?>
                                       <?php
                                       if ($data['twitter'] != null) :
                                       ?>
                                          <a href="#" class="btn btn-outline-warning btn-icon rounded-circle mg-r-5 mg-b-10">
                                             <div><i class="fa fa-twitter"></i></div>
                                          </a>
                                       <?php
                                       endif;
                                       ?>
                                    </td>

                                    <td>
                                       <div class="btn-group" role="group" aria-label="Basic example">
                                          <a href="team_update.php?table_name=teams&id=<?= $data['id'] ?>" class="btn btn-teal  pd-x-15"><i class="fa fa-edit"></i></a>
                                          <a href="../include/action.php?table_name=teams&id=<?= $data['id'] ?>&action=show_hide&status=<?= $data['status'] ?>" class="btn btn-<?= ($data['status'] == 1) ? "warning" : "primary" ?> pd-x-15"><i class="fa <?= ($data['status'] == 1) ? "fa-eye" : "fa-eye-slash" ?>"></i></a>
                                          <a href="../include/action.php?table_name=teams&id=<?= $data['id'] ?>&action=img_delete&img_path=../upload/team/<?= $data['img'] ?>" class="btn btn-danger pd-x-15"><i class="fa fa-trash"></i></a>
                                       </div>
                                    </td>
                                 </tr>
                              <?php
                              endforeach;
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
                        </form>

                  </div>
                  <div class="card-footer bg-teal text-light text-uppercase">
                     total : <?= $teams->num_rows ?>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="card border-success">
                  <div class="card-header text-center bg-teal text-light">
                     team Add++ <span class="ti-settings"></span>
                  </div>
                  <div class="card-body">
                     <?php
                     if (isset($_SESSION['team_success'])) :
                     ?>
                        <div class="alert alert-success" role="alert">
                           <?= $_SESSION['team_success'] ?>
                        </div>
                     <?php
                        unset($_SESSION['team_success']);
                     endif;
                     ?>
                     <form action="team_code.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Team Image</label>

                           <input type="file" name="team_img" class="form-control-file <?= (isset($_SESSION['team_img_requried'])) ? "is-invalid" : "" ?>" value="<?php
                                                                                                                                                                  if (isset($_SESSION['team_img'])) {
                                                                                                                                                                     echo $_SESSION['team_img'];
                                                                                                                                                                     unset($_SESSION['team_img']);
                                                                                                                                                                  }
                                                                                                                                                                  ?>">

                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['team_img_requried'])) {
                                 echo $_SESSION['team_img_requried'];
                                 unset($_SESSION['team_img_requried']);
                              }

                              ?>
                           </small>
                        </div>
                        <div class="form-group">
                           <label>Team Member Name</label>
                           <input placeholder="Enter your team member name" type="text" name="team_name" class="form-control <?= (isset($_SESSION['team_name_requried'])) ? "is-invalid" : "" ?>" value="<?php
                                                                                                                                                                                                         if (isset($_SESSION['team_name'])) {
                                                                                                                                                                                                            echo $_SESSION['team_name'];
                                                                                                                                                                                                            unset($_SESSION['team_name']);
                                                                                                                                                                                                         }
                                                                                                                                                                                                         ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['team_name_requried'])) {
                                 echo $_SESSION['team_name_requried'];
                                 unset($_SESSION['team_name_requried']);
                              }
                              ?>
                           </small>
                        </div>
                        <div class="form-group">
                           <label>Team Member Title</label>
                           <input placeholder="Enter your team member title" type="text" name="team_title" class="form-control <?= (isset($_SESSION['team_title_requried'])) ? "is-invalid" : "" ?>" value="<?php
                                                                                                                                                                                                            if (isset($_SESSION['team_title'])) {
                                                                                                                                                                                                               echo $_SESSION['team_title'];
                                                                                                                                                                                                               unset($_SESSION['team_title']);
                                                                                                                                                                                                            }
                                                                                                                                                                                                            ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['team_title_requried'])) {
                                 echo $_SESSION['team_title_requried'];
                                 unset($_SESSION['team_title_requried']);
                              }
                              ?>
                           </small>
                        </div>

                        <div class="form-group">
                           <label>Facebook</label>
                           <input placeholder="Enter your Facebook link" type="text" name="team_facebook" class="form-control <?= (isset($_SESSION['team_facebook_requried'])) ? "is-invalid" : "" ?>" value="<?php
                                                                                                                                                                                                               if (isset($_SESSION['team_facebook'])) {
                                                                                                                                                                                                                  echo $_SESSION['team_facebook'];
                                                                                                                                                                                                                  unset($_SESSION['team_facebook']);
                                                                                                                                                                                                               }
                                                                                                                                                                                                               ?>">
                           <small class="text-danger">
                              <?php
                              if (isset($_SESSION['team_facebook_requried'])) {
                                 echo $_SESSION['team_facebook_requried'];
                                 unset($_SESSION['team_facebook_requried']);
                              }

                              ?>
                           </small>
                        </div>

                        <div class="form-group">
                           <label>Twitter</label>
                           <input placeholder="Enter your twitter link" class="form-control" type="text" name="team_twitter" value="<?php
                                                                                                                                    if (isset($_SESSION['team_twitter'])) {
                                                                                                                                       echo $_SESSION['team_twitter'];
                                                                                                                                       unset($_SESSION['team_twitter']);
                                                                                                                                    }
                                                                                                                                    ?>">

                        </div>
                        <div class="form-group">
                           <label>Tumblr</label>
                           <input placeholder="Enter your tumblr link" class="form-control" type="text" name="team_tumblr" value="<?php
                                                                                                                                    if (isset($_SESSION['team_tumblr'])) {
                                                                                                                                       echo $_SESSION['team_tumblr'];
                                                                                                                                       unset($_SESSION['team_tumblr']);
                                                                                                                                    }
                                                                                                                                    ?>">

                        </div>
                        <div class="form-group">
                           <label>Linkdin</label>
                           <input placeholder="Enter your linkdin link" class="form-control" type="text" name="team_linkdin" value="<?php
                                                                                                                                    if (isset($_SESSION['team_linkdin'])) {
                                                                                                                                       echo $_SESSION['team_linkdin'];
                                                                                                                                       unset($_SESSION['team_linkdin']);
                                                                                                                                    }
                                                                                                                                    ?>">

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