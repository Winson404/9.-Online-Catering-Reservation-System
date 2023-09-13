<?php 
    include 'header.php'; 
    // FETCH GRAND TOTAL ************************************************************************************************************
    $fetch_total = mysqli_query($conn, "SELECT SUM(cart_total) as total_price FROM cart WHERE cart_user_Id='$id' AND cart_status='Pending'");
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
    
?>


    
<style>
  input.form-control {
    background-color: transparent;
    border: 1px solid #ffdd99;
    box-shadow: none;
    color: white;
  }
  .login {
    background-color: #ffd480;
  }
</style>

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table mt-5">
      <div class="container mt-3" data-aos="fade-up">

        <div class="section-title">
          <h2>Checkout</h2>
          <p>Complete all the fields to create reservation</p>
        </div>

        <form action="process_save.php" method="post" role="form" data-aos="fade-up" data-aos-delay="100" enctype="multipart/form-data">

          <div class="row">

            <div class="col-lg-6 col-md-6">
                <input type="hidden" name="user_Id" class="form-control" value="<?php echo $id; ?>">
                <input type="hidden" name="total" class="form-control" value="<?php echo $grand_price_new_text; ?>">
                <div class="col-lg-12 col-md-12 form-group mt-3">
                    <input type="text" name="eventname" class="form-control" placeholder="Event Name" required>
                </div>
                <div class="col-lg-12 col-md-12 form-group mt-3">
                    <input type="text" name="eventvenue" class="form-control" placeholder="Event Venue" required>
                </div>
                <div class="row">
                      <div class="col-lg-6 col-md-6 form-group mt-3">
                        <input type="date" name="eventdate" class="form-control" placeholder="Event Date" required>
                      </div>

                      <div class="col-lg-6 col-md-6 form-group mt-3">
                        <input type="time" name="eventtime" class="form-control" placeholder="Event Time" required>
                      </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-6 bg-light text-dark p-2 rounded">
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


                            
                            $fetch = mysqli_query($conn, "SELECT * FROM cart JOIN menu ON cart.cart_menu_Id=menu.menu_Id WHERE cart_status='Pending' AND cart_user_Id='$id' AND checkOut=0 ORDER BY menu_name ASC");
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
            <div class="row mt-5 d-flex justify-content-center">
              <div class="input-group mb-3 d-flex justify-content-center">
                <div class="input-group-text">
                  <input class="form-check-input mt-0" type="checkbox" aria-label="Checkbox for following text input" required>
                </div>
                &nbsp;&nbsp;Agree to <a href="terms.php"> &nbsp; Terms and Conditions</a>
              </div>
            </div>  

            <div class="text-center mt-5"><button type="submit" class="btn mt-4 rounded-pill login text-dark" name="checkout"><b>Checkout</b></button></div>

          </div>
         
          
        </form>

      </div>
    </section><!-- End Book A Table Section -->

  

<?php include 'footer.php'; ?>


<?php 

  function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

?>
