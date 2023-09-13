<?php 
  include 'header.php'; 
?>

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us mt-5">
      <div class="container mt-3" data-aos="fade-up">

        <div class="section-title">
            <h2>CHECKOUT</h2>
            <p style="font-size: 20px;">Checked Out Details</p>
        </div>

        <div class="row">

          <div class="table-resposive">
            <table class="table table-bordered table-striped table-hover bg-light">
              <thead class="bg-secondary text-light">
                <tr>
                  <th>Event Name</th>
                  <th>Event Venue</th>
                  <th>Event Date</th>
                  <th>Event Time</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                  <?php 
                      // FETCH GRAND TOTAL ************************************************************************************************************
                      $fetch_total = mysqli_query($conn, "SELECT SUM(cart_total) as total_price FROM cart WHERE cart_user_Id='$id' AND cart_status='Confirmed' AND Paid=0");
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

                      // RIGHT JOIN cart ON users.user_Id=cart.cart_user_Id JOIN menu ON cart.cart_menu_Id=menu.menu_Id
                      $fetch = mysqli_query($conn, "SELECT * FROM checkout JOIN users ON checkout.checkout_user_Id=users.user_Id WHERE checkout_user_Id='$id' AND Paid=0");
                      if(mysqli_num_rows($fetch) > 0) {
                      while ($row = mysqli_fetch_array($fetch)) {
                  ?>
                <tr>
                  <td><?php echo $row['event_name'] ?></td>
                  <td><?php echo $row['event_venue'] ?></td>
                  <td><?php echo $row['event_date'] ?></td>
                  <td><?php echo $row['event_time'] ?></td>

                  <td><b>₱ <?php echo $row['totalAmount']; ?>.00</td>
                  <td>
                        <?php if($row['status'] =='Pending'): ?>
                           <span class="badge bg-danger rounded-pill"><?php echo $row['status'] ?></span>
                        <?php else: ?>
                           <span class="badge bg-primary rounded-pill"><?php echo $row['status'] ?></span>
                        <?php endif; ?>
                  </td>
                  <td>
                    <a href="all_details.php?checkout_Id=<?php echo $row['checkout_Id']; ?>" class="btn btn-success mb-2">Details</a>
                    <form action="process_save.php" method="POST">
                      <input type="hidden" class="form-control" name="user_Id" value="<?php echo $id; ?>">
                      <input type="hidden" class="form-control" name="checkout_Id" value="<?php echo $row['checkout_Id']; ?>">                      
                      <button type="submit" class="btn btn-danger" name="cancel_checkout">Cancel</button>
                      
                    </form>
                  </td>
                </tr>
              <?php } } else { ?>
                <tr>
                  <td class="text-center" colspan="100%">No record found</td>
                </tr>
              <?php } ?>
              </tbody>
              <tfoot>
                <tr>

                  <td class="text-center" colspan="6"></td>
                  <td>
                    <?php 
                      $fetch = mysqli_query($conn, "SELECT * FROM checkout JOIN users ON checkout.checkout_user_Id=users.user_Id WHERE checkout_user_Id='$id' AND Paid=0");
                      $row = mysqli_fetch_array($fetch);
                      if($row['status'] == 'Confirmed'): ?>
                      <form action="process_save.php" method="POST">
                        <input type="hidden" class="form-control" name="user_Id" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-primary" name="paid">Mark as paid/received</button>
                      </form>
                    <?php endif; ?>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </section><!-- End Why Us Section -->
  </main><!-- End #main -->

  <?php include 'footer.php'; ?>
