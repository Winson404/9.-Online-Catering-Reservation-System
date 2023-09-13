<title>Reservation | Online Catering Reservation System</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['reservation_Id']))
      $checkout_Id = $_GET['reservation_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM checkout JOIN users ON checkout.checkout_user_Id=users.user_Id WHERE checkout_Id='$checkout_Id'");
    $row = mysqli_fetch_array($fetch);
    $user = $row['checkout_user_Id'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Information</h3>
              </div>
                <?php if(isset($_SESSION['success'])) { ?> 
                    <p class="alert alert-success position-absolute" role="alert" style="right: 0px; height: 46px;"><?php echo $_SESSION['success']; ?></p> 
                <?php unset($_SESSION['success']); } ?>

                <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
                    <p class="alert alert-danger position-absolute" role="alert" style="right: 0px; height: 46px;"><?php echo $_SESSION['invalid']; ?> <?php echo $_SESSION['error']; ?></p>
                <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>


                <?php  if(isset($_SESSION['exists'])) { ?>
                    <p class="alert alert-danger position-absolute" role="alert" style="right: 0px; height: 46px;"><?php echo $_SESSION['exists']; ?></p>
                <?php unset($_SESSION['exists']); } ?>
              <!-- /.card-header -->
              <!-- form start -->
                     <div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6">
                                <div class="row p-2">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                          <label>Reserver name</label>
                                          <input type="text" class="form-control form-control-sm" value="<?php echo ''.$row['user_firstname'].' '.$row['user_middlename'].' '.$row['user_lastname'].' '.$row['user_suffix'].''; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                          <label>Reserver Contact</label>
                                          <input type="text" class="form-control form-control-sm" value="<?php echo $row['contact']; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                          <label>Reserver Email</label>
                                          <input type="text" class="form-control form-control-sm" value="<?php echo $row['email']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12"><hr></div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                          <label>Event Name</label>
                                          <input type="text" class="form-control form-control-sm" value="<?php echo $row['event_name']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                          <label>Event Venue</label>
                                          <input type="text" class="form-control form-control-sm" value="<?php echo $row['event_venue']; ?>" readonly>
                                      </div>
                                    </div>
                                
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                          <label>Event Date</label>
                                          <input type="text" class="form-control form-control-sm" value="<?php echo $row['event_date']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label>Event Time</label>
                                        <input type="text" class="form-control form-control-sm" value="<?php echo $row['event_time']; ?>" readonly>
                                      </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6">
                                  
                                  <p class="text-center"><b>Check out details</b></p>
                                  <hr>
                                  <table class="table-bordered" style="font-size: 15px;">
                                      <thead class="bg-secondary text-light">
                                        <tr>
                                          <th width="20%">Menu name</th>
                                          <th width="15%">Price</th>
                                          <th width="15%">Quantity</th>
                                          <th width="15%">Total</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <?php 

                                              // FETCH GRAND TOTAL ************************************************************************************************************
                                              $fetch_total = mysqli_query($conn, "SELECT SUM(cart_total) as total_price FROM cart WHERE cart_user_Id='$user' AND cart_status='Confirmed'");
                                              $row_total = mysqli_fetch_array($fetch_total);

                                              $grand_price = $row_total['total_price'];
                                              $grand_price_text = (string)$grand_price; // convert into a string
                                              $grand_price_text = strrev($grand_price_text); // reverse string
                                              $arr = str_split($grand_price_text, "3"); // break string in 3 character sets

                                              $grand_price_new_text = implode(",", $arr);  // implode array with comma
                                              $grand_price_new_text = strrev($grand_price_new_text); // reverse string back
                                              //echo $grand_price_new_text; // will output 1,234
                                              //
                                              // END FETCH GRAND TOTAL ********************************************************************************************************
                                              
                                              
                                              $fetch = mysqli_query($conn, "SELECT * FROM cart JOIN menu ON cart.cart_menu_Id=menu.menu_Id WHERE cart_status='Confirmed' AND cart_user_Id='$user' ORDER BY menu_name ASC");
                                              while ($row = mysqli_fetch_array($fetch)) {

                                              // TO ADD COMMA FOR PRICE
                                              $price = $row['menu_price'];
                                              $price_text = (string)$price; // convert into a string
                                              $price_text = strrev($price_text); // reverse string
                                              $arr = str_split($price_text, "3"); // break string in 3 character sets

                                              $price_new_text = implode(",", $arr);  // implode array with comma
                                              $price_new_text = strrev($price_new_text); // reverse string back
                                              //echo $price_new_text; // will output 1,234

                                              // TO ADD COMMA FOR TOTAL
                                              $total_price = $row['cart_total'];
                                              $total_price_text = (string)$total_price; // convert into a string
                                              $total_price_text = strrev($total_price_text); // reverse string
                                              $arr = str_split($total_price_text, "3"); // break string in 3 character sets

                                              $total_price_new_text = implode(",", $arr);  // implode array with comma
                                              $total_price_new_text = strrev($total_price_new_text); // reverse string back
                                              //echo $total_price_new_text; // will output 1,234

                                          ?>
                                          <td><?php echo $row['menu_name'] ?></td>
                                          <td><b>₱ <?php echo $price_new_text; ?>.00</b></td>
                                          <td><?php echo $row['cart_quantity']; ?></td>
                                          <td><b>₱ <?php echo $total_price_new_text; ?>.00</b></td>
                                        </tr>
                                      <?php ; } ?>
                                      </tbody>
                                      <tfoot>
                                          <tr class="bg-secondary text-light">
                                            <th colspan="3" class="text-center">Grand total</th>
                                            <?php if($grand_price_new_text == 0): ?>
                                                <th><b><?php echo $grand_price_new_text; ?></b></th>
                                            <?php else: ?>
                                                <th><b>₱ <?php echo $grand_price_new_text; ?>.00</b></th>
                                            <?php endif; ?>
                                          </tr>
                                      </tfoot>
                                  </table>

                            </div>
                            
                        </div>
                   </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <form action="process_update.php" method="POST">
                      <input type="hidden" class="form-control" name="checkout_Id" value="<?php echo $checkout_Id; ?>">
                      <input type="hidden" class="form-control" name="user_Id" value="<?php echo $user; ?>">
                      <button class="btn btn-primary" type="submit" name="confirm_reservation"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
                      <button class="btn btn-danger" type="submit" name="deny_reservation"><i class="fa-solid fa-ban"></i> Deny</button>
                  </form>
                </div>
            </div>
            <!-- /.card -->
         </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



  <?php include 'footer.php'; ?>
 
</body>
</html>
