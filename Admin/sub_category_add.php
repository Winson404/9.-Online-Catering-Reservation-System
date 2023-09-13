<!-- ****************************************************CREATE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> New Sub-category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
        <div class="row">

          <div class="col-lg-12">
              <div class="form-group">
                <label>Category name</label>
                <select class="form-control" name="sub_cat_Id" required>
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

          <div class="col-lg-12">
              <div class="form-group">
                <label>Sub-category name</label>
                <input type="text" class="form-control"  placeholder="Category name" name="subcategoryname" required>
              </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
                <label>Sub-category description</label>
                <input type="text" class="form-control"  placeholder="Category description" name="subcategorydescription" required>
            </div>
          </div>
         
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-primary" name="create_subcategory"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ****************************************************END CREATE*********************************************************************** -->







