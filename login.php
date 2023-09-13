<?php include 'header.php'; ?>
<?php 
  if(isset($_SESSION['admin_Id'])) {
      header('Location: Admin/dashboard.php');
  } elseif(isset($_SESSION['user_Id'])) {
      header('Location: Users2/index.php');
  } else {
?>
<style>
  #username, #password {
    background-color: transparent;
    border: 1px solid #ffdd99;
    box-shadow: none;
  }
  .login {
    background-color: #ffd480;
  }
</style>

<!-- ======= About Section ======= -->
    <section id="about" class="about mt-5">
      <div class="book-a-table">
        <div class="container mt-5" data-aos="fade-up">
            <div class="row">
              <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                <div class="about-img">
                  <img src="assets-homepage/img/about.jpg" alt="">
                </div>
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <form action="login_code.php" method="post" role="form"  data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-8 form-group mb-4">
                      <input type="email" name="email" id="username" class="form-control text-light" placeholder="Enter email">
                    </div>
                    <div class="col-lg-8 form-group">
                      <input type="password" name="password" id="password" class="form-control text-light" placeholder="Enter password">
                    </div>
                    <div class="col-lg-8"><button type="submit" class="btn mt-4 rounded-pill login text-dark" name="login">Login</button></div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </section><!-- End About Section -->

<?php include 'footer.php'; ?>
  <?php } ?>