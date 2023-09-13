<title>Dashboard | Online Catering Reservation System</title>

<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row d-flex justify-content-evenly">


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $category = mysqli_query($conn, "SELECT cat_Id from category");
                  $row_category = mysqli_num_rows($category);
                 ?>
                <h3><?php echo $row_category; ?></h3>

                <p>Category</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-puzzle-piece"></i>
              </div>
              <a href="category.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $sub_category = mysqli_query($conn, "SELECT sub_category_Id from sub_category");
                  $row_sub_category = mysqli_num_rows($sub_category);
                 ?>
                <h3><?php echo $row_sub_category; ?></h3>

                <p>Sub-category</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-puzzle-piece"></i>
              </div>
              <a href="sub_category.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $menu = mysqli_query($conn, "SELECT menu_Id from menu");
                  $row_menu = mysqli_num_rows($menu);
                 ?>
                <h3><?php echo $row_menu; ?></h3>

                <p>Menu</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-bars"></i>
              </div>
              <a href="menu.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $checkout = mysqli_query($conn, "SELECT checkout_Id from checkout");
                  $row_checkout = mysqli_num_rows($checkout);
                 ?>
                <h3><?php echo $row_checkout; ?></h3>

                <p>Reservation</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-bars"></i>
              </div>
              <a href="reservation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT user_Id from users");
                  $row_users = mysqli_num_rows($users);
                 ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Registered Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>






          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                  $admin = mysqli_query($conn, "SELECT admin_Id from admin");
                  $row_admin = mysqli_num_rows($admin);
                 ?>
                <h3><?php echo $row_admin; ?></h3>

                <p>Administrators</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="admin.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         


        </div>
        <!-- /.row -->
        <!-- Main row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 


 <?php include 'footer.php'; ?>