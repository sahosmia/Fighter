<?php
include 'include/db.php';
include 'include/header.php';
include 'include/nav.php';
$select_query =  "SELECT id, name, email FROM users";
$db_mysqli_query = mysqli_query($db_connect, $select_query);

if (!isset($_SESSION['log_chack'])) {
   $_SESSION['deny_error'] = "please Log in first";
   header("location: login.php");
}
?>

<div class="container mt-5">
   <div class="row">
      <?= $_SESSION['log_chack_email'] ?>
      <div class="col-md-8 m-auto">
         <div class="card text-center border-success">
            <div class="card-header bg-success text-light">
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
            <div class="card-footer bg-success text-light text-uppercase">
               total : <?= $db_mysqli_query->num_rows ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
include 'include/footer.php';
?>