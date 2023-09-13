<?php 
  include 'header.php'; 
?>

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us mt-5">
      <div class="container mt-3" data-aos="fade-up">

        <div class="section-title mt-4">
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

                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php 

                      // FETCH GRAND TOTAL ************************************************************************************************************
                      $fetch_total = mysqli_query($conn, "SELECT SUM(cart_total) as total_price FROM cart WHERE cart_user_Id='$id' AND cart_status='Confirmed'");
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
                      $fetch = mysqli_query($conn, "SELECT * FROM checkout JOIN users ON checkout.checkout_user_Id=users.user_Id WHERE checkout_user_Id='$id'");
                      while ($row = mysqli_fetch_array($fetch)) {
                  ?>
                  <td><?php echo $row['event_name'] ?></td>
                  <td><?php echo $row['event_venue'] ?></td>
                  <td><?php echo $row['event_date'] ?></td>
                  <td><?php echo $row['event_time'] ?></td>

                  <td><b>₱ <?php echo $row['totalAmount'] ?>.00</b></td>
                  <td>
                        <?php if($row['Paid'] == 1): ?>
                           <span class="badge bg-success rounded-pill">Paid/Received</span>
                        <?php else: ?>
                           <span class="badge bg-secondary rounded-pill">Unpaid/On process</span>
                        <?php endif; ?>
                  </td>
              
                </tr>
              <?php ; } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section><!-- End Why Us Section -->
  </main><!-- End #main -->

  <?php include 'footer.php'; ?>
