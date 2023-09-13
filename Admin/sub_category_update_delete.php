<!-- ****************************************************UPDATE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="update<?php echo $row['sub_category_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Update Sub-category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
        <div class="row">
          <input type="hidden" class="form-control" placeholder="Category name" name="sub_category_Id" required value="<?php echo $row['sub_category_Id']; ?>">
          <div class="col-lg-12">
            <div class="form-group">
              <?php                           
                  $category  = mysqli_query($conn, "SELECT * FROM category");
                  $id = $row['sub_cat_Id'];
                  $all_gender = mysqli_query($conn, "SELECT * FROM sub_category  where sub_cat_Id = '$id' ");
                  $roww = mysqli_fetch_array($all_gender);
              ?>
              <label>Category name</label>
              <select class="custom-select" name="sub_cat_Id" required>
                  <?php foreach($category as $rows):?>
                        <option value="<?php echo $rows['cat_Id']; ?>"  
                            <?php if($roww['sub_cat_Id'] == $rows['cat_Id']) echo 'selected="selected"'; ?> 
                             > <!--/////   CLOSING OPTION TAG  -->
                            <?php echo $rows['cat_name']; ?>                                           
                        </option>

                 <?php endforeach;?>
               </select> 
            </div>
          </div>
          <div class="col-lg-12">
              <div class="form-group">
                <label>Sub-category name</label>
                <input type="text" class="form-control"  placeholder="Category name" name="subcategoryname" required value="<?php echo $row['sub_cat_name']; ?>">
              </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
                <label>Sub-category description</label>
                <input type="text" class="form-control"  placeholder="Category description" name="subcategorydescription" required value="<?php echo $row['sub_description']; ?>">
            </div>
          </div>
         
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-success" name="update_sub_category"><i class="fa-solid fa-floppy-disk"></i> Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ****************************************************END UPDATE*********************************************************************** -->







<!-- ****************************************************DELETE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="delete<?php echo $row['sub_category_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header alert-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Delete sub-category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['sub_category_Id']; ?>" name="sub_category_Id">
          <h6 class="text-center">Delete record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-danger" name="delete_sub_category"><i class="fa-solid fa-circle-check"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- ****************************************************END DELETE*********************************************************************** -->



