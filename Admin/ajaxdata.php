	<?php

	include '../config.php';


	if(isset($_POST['category'])) {
		$category = $_POST['category'];
		$fetch = mysqli_query($conn, "SELECT * FROM sub_category WHERE sub_cat_Id='$category'"); 
	?><option selected disabled>Select sub-category</option>
		<?php 
			while ($row = mysqli_fetch_array($fetch)) {
		?>
		<option value="<?php echo $row['sub_category_Id']; ?>"><?php echo $row['sub_cat_name']; ?></option>
		<?php 
			} 
		?>

		<?php
	}




	if(isset($_POST['category2'])) {
		$category2 = $_POST['category2'];
		$fetch = mysqli_query($conn, "SELECT * FROM sub_category WHERE sub_cat_Id='$category2'"); 
	?><option selected disabled>Select sub-category</option>
		<?php 
			while ($row = mysqli_fetch_array($fetch)) {
		?>
		<option value="<?php echo $row['sub_category_Id']; ?>"><?php echo $row['sub_cat_name']; ?></option>
		<?php 
			} 
		?>

		<?php
	}




?>