<?php 
  include 'header.php'; 

  if(isset($_GET['checkout_Id']))
    $checkout_Id = $_GET['checkout_Id'];
  $fetch = mysqli_query($conn, "SELECT * FROM checkout WHERE checkout_Id='$checkout_Id'");
  $row = mysqli_fetch_array($fetch);
?>
  



    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us mt-5">
      <div class="container mt-3" data-aos="fade-up">

        <div class="section-title">
            <h2>CHECKOUT</h2>
            <p style="font-size: 20px;">Checked Out Information</p>
        </div>

        <div class="row bg-light p-5">

            <div class="col-lg-6 col-md-6 bg-secondary">
                <div class="col-lg-12 col-md-12 form-group mt-3">
                    <label for="" class="text-light"><b>Event Name</b></label>
                    <input type="text" class="form-control" value="<?php echo $row['event_name']; ?>" readonly >
                </div>
                <div class="col-lg-12 col-md-12 form-group mt-3">
                    <label for="" class="text-light"><b>Event Venue</b></label>
                    <input type="text" class="form-control" value="<?php echo $row['event_venue']; ?>" readonly>
                </div>
                <div class="row">
                      <div class="col-lg-6 col-md-6 form-group mt-3">
                        <label for="" class="text-light"><b>Event Date</b></label>
                        <input type="date" class="form-control" value="<?php echo $row['event_date']; ?>" readonly>
                      </div>

                      <div class="col-lg-6 col-md-6 form-group mt-3">
                        <label for="" class="text-light"><b>Event Time</b></label>
                        <input type="time" class="form-control" value="<?php echo $row['event_time']; ?>" readonly>
                      </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-6 bg-light text-dark p-2 rounded">
                <div class="d-flex justify-content-center">
                  <?php if($row['status'] == 'Confirmed'): ?>
                    <p class="text-center"><b>Check out details and Status: </b><span class="badge bg-info rounded-pill"><?php echo $row['status']; ?></span></p>
                  <?php else: ?>
                    <p class="text-center"><b>Check out details and Status: </b><span class="badge bg-danger rounded-pill"><?php echo $row['status']; ?></span></p>
                  <?php endif; ?>
                </div>
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
                            $fetch_total = mysqli_query($conn, "SELECT SUM(cart_total) as total_price FROM cart WHERE cart_user_Id='$id' AND cart_status='Confirmed' AND Paid=0 ");
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
                            
                            
                            $fetch = mysqli_query($conn, "SELECT * FROM cart JOIN menu ON cart.cart_menu_Id=menu.menu_Id WHERE cart_status='Confirmed' AND cart_user_Id='$id' AND checkOut=1 AND Paid=0 ORDER BY menu_name ASC");
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
    </section><!-- End Why Us Section -->
  </main><!-- End #main -->

  <?php include 'footer.php'; ?>
