<?php 
  include 'header.php'; 
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
<link rel="stylesheet" href="datatable/jquery.dataTables.min.css">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us mt-5">
      <div class="container mt-3" data-aos="fade-up">

        <div class="section-title">
          <h2>CART</h2>
          <p style="font-size: 20px;">Menu That You Have Added To Cart</p>
        </div>

        <div class="row">

          <div class="table-resposive bg-light p-3">
            <table class="table table-bordered table-striped table-hover" id="example">
              <thead class="bg-secondary text-light">
                <tr>
                  <th width="20%">Menu name</th>
                  <th width="20%">Menu description</th>
                  <th width="15%">Price</th>
                  <th width="15%">Quantity</th>
                  <th width="15%">Total</th>
                  <th width="15%">Action</th>
                </tr>
              </thead>
              <tbody>
                
                  <?php 

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
                      


                      // FETCH CART STATUS ************************************************************************************************************
                       
                        $fetch_status = mysqli_query($conn, "SELECT * FROM cart WHERE cart_user_Id='$id'");
                        $row_status = mysqli_fetch_array($fetch_status);
                      
                      // END FETCH CART STATUS ********************************************************************************************************

                      
                      $fetch = mysqli_query($conn, "SELECT * FROM cart JOIN menu ON cart.cart_menu_Id=menu.menu_Id WHERE cart_status='Pending' AND cart_user_Id='$id' AND checkOut=0 ORDER BY menu_name ASC");
                      if(mysqli_num_rows($fetch) > 0) {
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
                <tr>
                  <td><?php echo $row['menu_name'] ?></td>
                  <td><?php echo $row['menu_description'] ?></td>
                  <td><b>₱ <?php echo $price_new_text; ?>.00</b></td>
                  <td>
                    <form action="process_save.php" method="POST">
                      <div class="d-flex justify-content-center">
                            <input type="hidden" class="form-control text-center" name="cart_Id" value="<?php echo $row['cart_Id']; ?>">
                            <input type="hidden" class="form-control text-center" name="menu_price" value="<?php echo $row['menu_price']; ?>">
                            <input type="number" class="form-control text-center" name="quantity" value="<?php echo $row['cart_quantity']; ?>" style="width: 65px;margin-right: 10px;">
                            <button type="submit" class="btn btn-success" name="update_cart">Update</button>
                      </div>
                    </form>
                  </td>
                  <td><b>₱ <?php echo $total_price_new_text; ?>.00</b></td>
                  <td>
                    <form action="process_save.php" method="POST">
                      <input type="hidden" class="form-control" name="cart_Id" value="<?php echo $row['cart_Id']; ?>">
                      <!-- <button class="btn btn-success">Basin way Update</button> -->
                      <button type="submit" class="btn btn-danger" name="delete">Delete</button>
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
                  <tr class="bg-secondary text-light">
                      <th colspan="4" class="text-center">Grand total</th>

                      <?php if($grand_price_new_text == 0): ?>
                          <th><b><?php echo $grand_price_new_text; ?></b></th>
                      <?php else: ?>
                          <th><b>₱ <?php echo $grand_price_new_text; ?>.00</b></th>
                      <?php endif; ?>

                      <th class="bg-secondary">
                          <a href="checkout.php" class="btn btn-dark" type="button">Checkout</a>
                      </th>
                  </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </section><!-- End Why Us Section -->
  </main><!-- End #main -->
  <script src="datatable/jquery-3.5.1.js"></script>
  <script src="datatable/jquery.dataTables.min.js"></script>

  <?php include 'footer.php'; ?>

  <script>
    $(document).ready(function () {
      $('#example').DataTable();
  });
  </script>