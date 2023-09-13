<?php include 'header.php'; ?>


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>E-Catering Reservation</span></h1>
          <h2>Delivering great food for more than 18 years!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="#addtocart" class="btn-book animated fadeInUp scrollto">Reserve Now</a>
          </div>
        </div>
        <!-- <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=u6BOC7CDUTQ" class="glightbox play-btn"></a>
        </div> -->

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="../assets-homepage/img/about.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why Us</h2>
          <p>Why Choose Our Catering Reservation</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>We Are Friendly</h4>
              <p>Good customer service, attentive and quick to take care of customers' needs.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Attentive</h4>
              <p>Listens politely to customers' orders and open for suggestions.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4>Available</h4>
              <p>24 hours open for any inquiries and reservations.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->



    <!-- ======= Why Us Section ======= -->
    <section id="addtocart" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Add Menu to Cart, Now!</p>
        </div>

        <div class="row">
          
          <?php 
            $fetch = mysqli_query($conn, "SELECT * FROM menu");
            while($row = mysqli_fetch_array($fetch)) {

            $price = $row['menu_price'];
            $price_text = (string)$price; // convert into a string
            $price_text = strrev($price_text); // reverse string
            $arr = str_split($price_text, "3"); // break string in 3 character sets

            $price_new_text = implode(",", $arr);  // implode array with comma
            $price_new_text = strrev($price_new_text); // reverse string back
            //echo $price_new_text; // will output 1,234
          ?>
          <div class="col-lg-3 mb-4">
            <form action="process_save.php" method="POST">
              <input type="hidden" value="<?php echo $row['menu_Id']; ?>" name="menu_Id">
              <input type="hidden" value="<?php echo $id; ?>" name="user_Id">
                <div class="box" data-aos="zoom-in" data-aos-delay="100">
                      <img src="../images-menu/<?php echo $row['image']; ?>" class="menu-img" style="width: 200px; height: 150px; display: block;margin-left: auto;margin-right: auto;">
                      <span style="font-size: 18px;margin-top: 5px;">₱ <?php echo $price_new_text; ?>.00</span>
                      <h5><?php echo custom_echo($row['menu_name'], 18); ?></h5>
                      <p><?php echo custom_echo($row['menu_description'], 25); ?></p>
                      <input type="number" class="form-control text-center" name="quantity" placeholder="Qty" required style="width: 100px;display: block;margin-left: auto;margin-right: auto;">
                      <button type="submit" class="btn btn-light rounded-pill mt-2" style="display: block;margin-left: auto;margin-right: auto;" name="addtocart"><b>Add to Cart</b></button>
                </div>
            </form>
          </div>
          <?php } ?>
          
        </div>


      </div>
    </section><!-- End Why Us Section -->



    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Check Our Tasty Menu</p>
        </div>

     
        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

          <?php 

            $fetch = mysqli_query($conn, "SELECT * FROM menu LIMIT 6");
            while($row = mysqli_fetch_array($fetch)) {

            $price = $row['menu_price'];

            $price_text = (string)$price; // convert into a string
            $price_text = strrev($price_text); // reverse string
            $arr = str_split($price_text, "3"); // break string in 3 character sets

            $price_new_text = implode(",", $arr);  // implode array with comma
            $price_new_text = strrev($price_new_text); // reverse string back
            //echo $price_new_text; // will output 1,234

          ?>

          <div class="col-lg-6 menu-item filter-starters">
            <img src="../images-menu/<?php echo $row['image']; ?>" class="menu-img" style="width: 70px; height: 70px; border-radius: 50%;">
            <div class="menu-content">
              <a href="#"><?php echo $row['menu_name']; ?></a><span>₱ <?php echo $price_new_text; ?>.00</span>
            </div>
            <div class="menu-ingredients">

              <?php echo custom_echo($row['menu_description'], 40); ?>
            </div>
          </div>

        <?php } ?>

        </div>

      </div>
    </section><!-- End Menu Section -->


    


     <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some Photos We Have</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/gallery/gallery-1.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="../assets-homepage/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/gallery/gallery-2.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="../assets-homepage/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/gallery/gallery-3.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="../assets-homepage/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/gallery/gallery-4.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="../assets-homepage/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/gallery/gallery-5.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="../assets-homepage/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/gallery/gallery-6.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="../assets-homepage/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/gallery/gallery-7.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="../assets-homepage/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/gallery/gallery-8.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="../assets-homepage/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

  </main><!-- End #main -->
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
