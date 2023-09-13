<?php 
	session_start();
	include '../config.php';

	// SAVE USER
	if(isset($_POST['create_patient'])) {

		$firstname       = $_POST['firstname'];
		$middlename      = $_POST['middlename'];
		$lastname        = $_POST['lastname'];
		$suffix          = $_POST['suffix'];
		$gender          = $_POST['gender'];
		$contact         = $_POST['contact'];
		$email           = $_POST['email'];
		$address         = $_POST['address'];
		$password        = md5($_POST['password']);
		$cpassword       = md5($_POST['cpassword']);
		$date_registered = date('Y-m-d');
		$file            = basename($_FILES["fileToUpload"]["name"]);


		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
			$_SESSION['exists']  = "Email is already taken.";
            header("Location: users.php");
		} else {

			if($password != $cpassword) {
				$_SESSION['exists']  = "Password does not matched.";
            	header("Location: users.php");
			} else {

				  		// Check if image file is a actual image or fake image
		          $target_dir = "../images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                  header("Location: users.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['error']  = "Your file was not uploaded.";
                  header("Location: users.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	$save = mysqli_query($conn, "INSERT INTO users (user_firstname, user_middlename, user_lastname, patient_suffix, gender, address, email, contact, password, image, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$address', '$email', '$contact', '$password', '$file','$date_registered')");

                            if($save) {
	                            $_SESSION['success']  = "User information has been successfully saved!";
	                            header("Location: users.php");                                
                            } else {
                              $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
                              header("Location: users.php");
                            }
                      } else {
                            $_SESSION['exists'] = "There was an error uploading your file.";
                            header("Location: users.php");
                      }
				 }

			}

		}

	}








	// SAVE ADMIN
	if(isset($_POST['create_admin'])) {

		$firstname       = $_POST['firstname'];
		$middlename      = $_POST['middlename'];
		$lastname        = $_POST['lastname'];
		$suffix          = $_POST['suffix'];
		$gender          = $_POST['gender'];
		$dob             = $_POST['dob'];
		$age             = $_POST['age'];
		$contact         = $_POST['contact'];
		$email           = $_POST['email'];
		$address         = $_POST['address'];
		$password        = md5($_POST['password']);
		$cpassword       = md5($_POST['cpassword']);
		$date_registered = date('Y-m-d');
		$file            = basename($_FILES["fileToUpload"]["name"]);


		$check_email = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
			$_SESSION['exists']  = "Email is already taken.";
            header("Location: admin.php");
		} else {

			if($password != $cpassword) {
				$_SESSION['exists']  = "Password does not matched.";
            	header("Location: admin.php");
			} else {

				  		// Check if image file is a actual image or fake image
		          $target_dir = "../images-admin/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                  header("Location: admin.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['error']  = "Your file was not uploaded.";
                  header("Location: admin.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	$save = mysqli_query($conn, "INSERT INTO admin (firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file','$date_registered')");

                            if($save) {
	                            $_SESSION['success']  = "Admin information has been successfully saved!";
	                            header("Location: admin.php");                                
                            } else {
                              $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
                              header("Location: admin.php");
                            }
                      } else {
                            $_SESSION['exists'] = "There was an error uploading your file.";
                            header("Location: admin.php");
                      }
				 }

			}

		}

	}





// CREATE CATEGORY
	if(isset($_POST['create_category'])) {
		$categoryname        = $_POST['categoryname'];
		$categorydescription = $_POST['categorydescription'];
		$date_added          = date('Y-m-d');

			$fetch = mysqli_query($conn, "SELECT * FROM category WHERE cat_name='$categoryname'");
			if(mysqli_num_rows($fetch) > 0) {
					$_SESSION['exists'] = "Category already exists.";
          header("Location: category.php");
			} else {

					$save = mysqli_query($conn, "INSERT INTO category (cat_name, cat_description, date_created) VALUES ('$categoryname', '$categorydescription', '$date_added')");

          if($save) {
	            $_SESSION['success']  = "Category has been added!";
	            header("Location: category.php");                                
          } else {
	            $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	            header("Location: category.php");
          }
			}
	}




	// CREATE SUB CATEGORY
	if(isset($_POST['create_subcategory'])) {
		$sub_cat_Id             = $_POST['sub_cat_Id'];
		$subcategoryname        = $_POST['subcategoryname'];
		$subcategorydescription = $_POST['subcategorydescription'];
		$date_added             = date('Y-m-d');

			$fetch = mysqli_query($conn, "SELECT * FROM sub_category WHERE sub_cat_name='$subcategoryname'");
			if(mysqli_num_rows($fetch) > 0) {
					$_SESSION['exists'] = "Sub-category already exists.";
          header("Location: sub_category.php");
			} else {

					$save = mysqli_query($conn, "INSERT INTO sub_category (sub_cat_Id, sub_cat_name, sub_description, sub_date_added) VALUES ('$sub_cat_Id', '$subcategoryname', '$subcategorydescription', '$date_added')");

          if($save) {
	            $_SESSION['success']  = "Sub-category has been added!";
	            header("Location: sub_category.php");                                
          } else {
	            $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
	            header("Location: sub_category.php");
          }
			}
	}




	// CREATE MENU
	if(isset($_POST['create_menu'])) {
		$cat_Id          = $_POST['cat_Id'];
		$sub_cat_Id      = $_POST['sub_cat_Id'];
		$menu            = $_POST['menu'];
		$menudescription = $_POST['menudescription'];
		$price           = $_POST['price'];
		$file            = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

							$fetch = mysqli_query($conn, "SELECT * FROM menu WHERE menu_name='$menu'");
							if(mysqli_num_rows($fetch) > 0) {
									$_SESSION['exists'] = "Menu already exists.";
				          header("Location: menu.php");
							} else {

									$save = mysqli_query($conn, "INSERT INTO menu (menu_cat_Id, menu_sub_cat_Id, menu_name, menu_description, menu_price) VALUES ('$cat_Id', '$sub_cat_Id', '$menu', '$menudescription', '$price')");

				          if($save) {
					            $_SESSION['success']  = "Menu has been added!";
					            header("Location: menu.php");                                
				          } else {
					            $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
					            header("Location: menu.php");
				          }
							}

		} else {

							$fetch = mysqli_query($conn, "SELECT * FROM menu WHERE menu_name='$menu'");
							if(mysqli_num_rows($fetch) > 0) {
									$_SESSION['exists'] = "Menu already exists.";
				          header("Location: menu.php");
							} else {

									// Check if image file is a actual image or fake image
				          $target_dir = "../images-menu/";
				          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				          $uploadOk = 1;
				          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                  header("Location: menu.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['error']  = "Your file was not uploaded.";
                  header("Location: menu.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
		                      	$save = mysqli_query($conn, "INSERT INTO menu (menu_cat_Id, menu_sub_cat_Id, menu_name, menu_description, menu_price, image) VALUES ('$cat_Id', '$sub_cat_Id', '$menu', '$menudescription', '$price', '$file')");

									          if($save) {
										            $_SESSION['success']  = "Menu has been added!";
										            header("Location: menu.php");                                
									          } else {
										            $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
										            header("Location: menu.php");
									          }

                      } else {
                            $_SESSION['exists'] = "There was an error uploading your file.";
                            header("Location: menu.php");
                      }
				 					}
							}
		}
	}





?>