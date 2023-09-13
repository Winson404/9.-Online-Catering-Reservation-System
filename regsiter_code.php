<?php 
	
	session_start();
	include 'config.php';

	// SAVE USER
	if(isset($_POST['register'])) {

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
            header("Location: index.php");
		} else {

			if($password != $cpassword) {
				$_SESSION['exists']  = "Password does not matched.";
            	header("Location: index.php");
			} else {

				  		// Check if image file is a actual image or fake image
		          $target_dir = "images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                  header("Location: index.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['error']  = "Your file was not uploaded.";
                  header("Location: index.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	$save = mysqli_query($conn, "INSERT INTO users (user_firstname, user_middlename, user_lastname, user_suffix, gender, address, email, contact, password, image, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$address', '$email', '$contact', '$password', '$file','$date_registered')");

                            if($save) {

			                            		$fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
																			if(mysqli_num_rows($fetch) ===1) {

																					$row = mysqli_fetch_array($fetch);
																					if($row['email'] === $email && $row['password'] === $password) {
																						$_SESSION['user_Id'] = $row['user_Id'];
																						header("Location: Users2/index.php");
																					} else {
																		                $_SESSION['success']  = "User information has been successfully saved!";
				                            								header("Location: index.php");  
																					}

																			} else {
																						$_SESSION['success']  = "User information has been successfully saved!";
				                            				header("Location: index.php");  
																			}

                            } else {
                              $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
                              header("Location: index.php");
                            }
                      } else {
                            $_SESSION['exists'] = "There was an error uploading your file.";
                            header("Location: index.php");
                      }
				 }

			}

		}

	}

?>