<title>Reservation | Online Catering Reservation System</title>


<?php 

  include 'navbar.php'; 
?>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Reservation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Reservation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex">
                  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_user"><i class="bi bi-plus-circle"></i> Add</button> -->
                  <span class="text-light">Add</span>
                  <?php if(isset($_SESSION['success'])) { ?> 
                      <h3 class="alert card-title position-absolute py-2 alert-success rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php echo $_SESSION['success']; ?></h3>
                  <?php unset($_SESSION['success']); } ?>


                  <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
                      <h3 class="alert card-title position-absolute py-2 alert-danger rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php echo $_SESSION['invalid']; ?> <?php echo $_SESSION['error']; ?></h3>
                  <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>


                  <?php  if(isset($_SESSION['exists'])) { ?>
                      <h3 class="alert card-title position-absolute py-2 alert-danger rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php echo $_SESSION['exists']; ?></h3>
                  <?php unset($_SESSION['exists']); } ?>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Reserver</th>
                    <th>Event name</th>
                    <th>Event venue</th>
                    <th>Event date</th>
                    <th>Event time</th>
                    <th>Status</th>
                    <th>Tools</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM checkout JOIN users ON checkout.checkout_user_Id=users.user_Id");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                        <td><?php echo ' '.$row['user_firstname'].' '.$row['user_middlename'].' '.$row['user_lastname'].' '.$row['user_suffix'].' '; ?></td>
                        <td><?php echo $row['event_name']; ?></td>
                        <td><?php echo $row['event_venue']; ?></td>
                        <td><?php echo $row['event_date']; ?></td>
                        <td><?php echo $row['event_time']; ?></td>
                        <td>
                          <?php if($row['status'] == 'Pending'): ?>
                            <span class="badge bg-danger rounded-pill"><?php echo $row['status']; ?></span>
                          <?php else: ?>
                            <span class="badge bg-primary rounded-pill"><?php echo $row['status']; ?></span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <span class="badge bg-primary rounded-pill" type="button" data-toggle="modal" data-target="#view<?php echo $row['checkout_Id']; ?>"><a href="reservation_view.php?reservation_Id=<?php echo $row['checkout_Id']; ?>">View</a></span>
                        </td> 
                    </tr>

                    <?php include 'users_update_delete.php'; } ?>

                  </tbody>
                  <tfoot>
                      <!-- <tr>
                        <th>Reserver</th>
                        <th>Event name</th>
                        <th>Event venue</th>
                        <th>Event date</th>
                        <th>Event time</th>
                        <th>Status</th>
                        <th>Tools</th>
                      </tr> -->
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

 <?php include 'footer.php'; ?>



