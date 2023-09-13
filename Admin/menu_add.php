<!-- ****************************************************CREATE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bars"></i> New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
        <div class="row">


          <!-- LOAD IMAGE PREVIEW -->
          <div class="col-lg-12 mb-2">
              <div class="form-group" id="preview">
              </div>
          </div>


          <div class="col-lg-6">
              <div class="form-group">
                <label>Category name</label>
                <select class="form-control" name="cat_Id" required id="category">
                  <option selected disabled>Select category</option>
                  <?php 
                    $fetch = mysqli_query($conn, "SELECT * FROM category");
                    while ($row = mysqli_fetch_array($fetch)) {
                  ?>
                  <option value="<?php echo $row['cat_Id']; ?>"><?php echo $row['cat_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
          </div>

          <div class="col-lg-6">
              <div class="form-group">
                <label>Sub-category name</label>
                <select class="form-control" name="sub_cat_Id" required id="sub_category_name">
                  
                </select>
              </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
                <label>Menu name</label>
                <input type="text" class="form-control"  placeholder="Menu Name" name="menu" required>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
                <label>Menu description</label>
                <input type="text" class="form-control"  placeholder="Menu description" name="menudescription" required>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control"  placeholder="Price" name="price" required>
            </div>
          </div>


          <div class="col-lg-6">
              <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control-file" name="fileToUpload" onchange="getImagePreview(event)">
              </div>
          </div>
         
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-primary" name="create_menu"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ****************************************************END CREATE*********************************************************************** -->







