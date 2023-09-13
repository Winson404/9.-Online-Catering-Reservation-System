<!-- ****************************************************UPDATE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="update<?php echo $row['menu_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bars"></i> Update Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
        <div class="row">
          <input type="hidden" class="form-control"  placeholder="Menu Name" name="menu_Id" required value="<?php echo $row['menu_Id']; ?>">


          <div class="col-lg-6 mb-2">
            <?php                           
                  $category  = mysqli_query($conn, "SELECT * FROM category");
                  $id = $row['menu_Id'];
                  $all_gender = mysqli_query($conn, "SELECT * FROM menu  where menu_cat_Id = '$id' ");
                  $rowe = mysqli_fetch_array($all_gender);
              ?>
              <label>Category name</label>
              <select class="form-control" name="cat_Id" required id="category2">
                  <?php foreach($category as $rows):?>
                        <option value="<?php echo $rows['cat_Id']; ?>"  
                            <?php if($rowe['menu_cat_Id'] == $rows['cat_Id']) echo 'selected="selected"'; ?> 
                             > <!--/////   CLOSING OPTION TAG  -->
                            <?php echo $rows['cat_name']; ?>                                           
                        </option>

                 <?php endforeach;?>
               </select>
          </div>


          <div class="col-lg-6 mb-2">
            <?php        
                  $sub_id = $row['cat_Id'];                   
                  $sub_category  = mysqli_query($conn, "SELECT * FROM sub_category ");
                  $id = $row['menu_sub_cat_Id'];
                  $all_gender = mysqli_query($conn, "SELECT * FROM menu  where menu_sub_cat_Id = '$id' ");
                  $rowe = mysqli_fetch_array($all_gender);
              ?>
              <label>Category name</label>
              <select class="form-control" name="sub_cat_Id" required id="sub_category_name2">
                  <?php foreach($sub_category as $rowsss):?>
                        <option value="<?php echo $rowsss['sub_category_Id']; ?>"  
                            <?php if($rowe['menu_sub_cat_Id'] == $rowsss['sub_category_Id']) echo 'selected="selected"'; ?> 
                             > <!--/////   CLOSING OPTION TAG  -->
                            <?php echo $rowsss['sub_cat_name']; ?>                                           
                        </option>

                 <?php endforeach;?>
               </select>
          </div>

          <!-- <div class="col-lg-6">
              <div class="form-group">
                <label>Category name</label>
                <select class="form-control" name="cat_Id" required id="category2">
                  <option selected disabled>Select category</option>
                  <?php 
                    // $fetch = mysqli_query($conn, "SELECT * FROM category");
                    // while ($rowss = mysqli_fetch_array($fetch)) {
                  ?>
                  <option value="<?php //echo $rowss['cat_Id']; ?>"><?php //echo $rowss['cat_name']; ?></option>
                  <?php// } ?>
                </select>
              </div>
          </div> -->

         <!--  <div class="col-lg-6">
              <div class="form-group">
                <label>Sub-category name</label>
                <select class="form-control" name="sub_cat_Id" required id="sub_category_name2">
                  
                </select>
              </div>
          </div> -->

          <div class="col-lg-6">
            <div class="form-group">
                <label>Menu name</label>
                <input type="text" class="form-control"  placeholder="Menu Name" name="menu" required value="<?php echo $row['menu_name']; ?>">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
                <label>Menu description</label>
                <input type="text" class="form-control"  placeholder="Menu description" name="menudescription" required value="<?php echo $row['menu_description']; ?>">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control"  placeholder="Price" name="price" required value="<?php echo $row['menu_price']; ?>">
            </div>
          </div>


          <div class="col-lg-6">
              <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control-file" name="fileToUpload">
              </div>
          </div>
         
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-success" name="update_menu"><i class="fa-solid fa-floppy-disk"></i> Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ****************************************************END UPDATE*********************************************************************** -->







<!-- ****************************************************DELETE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="delete<?php echo $row['menu_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bars"></i> Delete menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['menu_Id']; ?>" name="menu_Id">
          <h6 class="text-center">Delete record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-danger" name="delete_menu"><i class="fa-solid fa-circle-check"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- ****************************************************END DELETE*********************************************************************** -->



