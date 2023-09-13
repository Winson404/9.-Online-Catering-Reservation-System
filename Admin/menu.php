<title>Menu | Online Catering Reservation System</title>


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
            <h1>Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Menu</li>
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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="bi bi-plus-circle"></i> Add</button>

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
                    <th>Image</th>
                    <th>Category name</th>
                    <th>Sub-category name</th>
                    <th>Menu name</th>
                    <th>Menu description</th>
                    <th>Price</th>
                    <th>Tools</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM menu JOIN sub_category ON menu.menu_sub_cat_Id=sub_category.sub_category_Id JOIN category ON menu.menu_cat_Id=category.cat_Id ORDER BY menu_name ASC");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                        <td>
                            <img src="../images-menu/<?php echo $row['image']; ?>" alt="" width="50">
                        </td>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td><?php echo $row['sub_cat_name']; ?></td>
                        <td><?php echo $row['menu_name']; ?></td>
                        <td><?php echo $row['menu_description']; ?></td>
                        <td><b>₱ <?php echo number_format((float)$row['menu_price'], 2, '.', ''); ?></b></td>
                        <td>
                            <div class="dropdown dropleft">
                                  <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false"> Actions </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#update<?php echo $row['menu_Id']; ?>">Update</button>
                                      <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#delete<?php echo $row['menu_Id']; ?>">Delete</button>
                                </div>
                            </div>
                        </td> 
                    </tr>

                    <?php include 'menu_update_delete.php'; } ?>

                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Image</th>
                        <th>Category name</th>
                        <th>Sub-category name</th>
                        <th>Menu name</th>
                        <th>Menu description</th>
                        <th>Price</th>
                        <th>Tools</th>
                      </tr>
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


 <?php include 'menu_add.php'; ?>
 <?php include 'footer.php'; ?>

 <script>
   //-----------------------------ALERT TIMEOUT-------------------------//
  $(document).ready(function() {
      setTimeout(function() {
          $('.alert').hide();
      } ,5000);
  }
  );
//-----------------------------END ALERT TIMEOUT---------------------//
 </script>


 <script>
    $(document).ready(function() {

        $("#category").change(function() {
          var category = $(this).val();
          $.ajax( {
            url: "ajaxdata.php",
            method: "POST",
            data: {category: category},
            success: function(data) {
              $("#sub_category_name").html(data);
            }
          })
        })

    });


    $(document).ready(function() {

        $("#category2").change(function() {
          var category2 = $(this).val();
          $.ajax( {
            url: "ajaxdata.php",
            method: "POST",
            data: {category2: category2},
            success: function(data) {
              $("#sub_category_name2").html(data);
            }
          })
        })

    });
</script>


<script>
   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var remove= document.getElementById('remove');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    remove.style['display'] = "none";
    imagediv.appendChild(newimg);
  }

</script>



