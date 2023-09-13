<?php 
	
	  use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require 'vendor/PHPMailer/src/Exception.php';
		require 'vendor/PHPMailer/src/PHPMailer.php';
		require 'vendor/PHPMailer/src/SMTP.php';

	session_start();
	include '../config.php';

	// UPDATE PATIENT
	if(isset($_POST['update_patient'])) {

		$user_Id = $_POST['user_Id'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$dob        = $_POST['dob'];
		$age        = $_POST['age'];
		$contact    = $_POST['contact'];
		$email      = $_POST['email'];
		$address    = $_POST['address'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

					$save = mysqli_query($conn, "UPDATE users SET user_firstname='$firstname', user_middlename='$middlename', user_lastname='$lastname', patient_suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
		            if($save) {
			                $_SESSION['success']  = "User information has been updated!";
			                header("Location: users.php");                                
		            } else {
			                $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
			                header("Location: users.php");
		            }

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
	                      	$save = mysqli_query($conn, "UPDATE users SET user_firstname='$firstname', user_middlename='$middlename', user_lastname='$lastname', patient_suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', image='$file' WHERE user_Id='$user_Id'");
				            if($save) {
					                $_SESSION['success']  = "User information has been updated!";
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






	// CHANGE PATIENT PASSWORD
	if(isset($_POST['password_patient'])) {

    	$user_Id  = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
    				// COMPARE BOTH NEW AND CONFIRM PASSWORD
		    		if($password != $cpassword) {
		    				$_SESSION['exists']  = "Password does not matched. Please try again";
		          			header("Location: users.php");
		    		} else {
			    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");

			    			if($update_password) {
			    					$_SESSION['success']  = "Password has been changed.";
		          					header("Location: users.php");
			    			} else {
			    					$_SESSION['exists']  = "Something went wrong while changing the password.";
			          				header("Location: users.php");
			    			}
		    		}
    	} else {
    		$_SESSION['exists']  = "Old password is incorrect.";
            header("Location: users.php");
    	}

    }







  // APPROVE PATIENT ACCOUNT
	if(isset($_POST['approve_patient'])) {
		$user_Id = $_POST['user_Id'];
		$user_email  = $_POST['email'];

		$delete = mysqli_query($conn, "UPDATE users SET user_status='Confirmed' WHERE User_Id='$user_Id'");
		if($delete) {


							$email   = $user_email ;
					    $subject = 'Account approved!';
					    $message = '<h3>Congratulations!</h3>
													<p>Good day sir/maam , we have successfully approved your account. Thank you!</p>';

									//Load composer's autoloader

							    $mail = new PHPMailer(true);                            
							    try {
							        //Server settings
							        $mail->isSMTP();                                     
							        $mail->Host = 'smtp.gmail.com';                      
							        $mail->SMTPAuth = true;                             
							        $mail->Username = 'ifelse297@gmail.com';     
							        $mail->Password = 'programmer297';             
							        $mail->SMTPOptions = array(
							            'ssl' => array(
							            'verify_peer' => false,
							            'verify_peer_name' => false,
							            'allow_self_signed' => true
							            )
							        );                         
							        $mail->SMTPSecure = 'ssl';                           
							        $mail->Port = 465;                                   

							        //Send Email
							        $mail->setFrom('ifelse297@gmail.com');
							        
							        //Recipients
							        $mail->addAddress($email);              
							        $mail->addReplyTo('ifelse297@gmail.com');
							        
							        //Content
							        $mail->isHTML(true);                                  
							        $mail->Subject = $subject;
							        $mail->Body    = $message;

							        $mail->send();
									
							     		$_SESSION['success']  = "Patient account has been confirmed!";
	           					header("Location: users.php");

							    } catch (Exception $e) {
							    	echo 'failed';
							    	$_SESSION['success']  = "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
        			      header("Location: users.php");
							    }

		} else {
			$_SESSION['exists'] = "Something went wrong while updating the record. Please try again.";
            header("Location: users.php");
		}
	}








    // UPDATE ADMIN
	if(isset($_POST['update_admin'])) {

		$admin_Id    = $_POST['admin_Id'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$dob        = $_POST['dob'];
		$age        = $_POST['age'];
		$contact    = $_POST['contact'];
		$email      = $_POST['email'];
		$address    = $_POST['address'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

					$save = mysqli_query($conn, "UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact' WHERE admin_Id='$admin_Id'");
		            if($save) {
			                $_SESSION['success']  = "Admin information has been updated!";
			                header("Location: admin.php");                                
		            } else {
			                $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
			                header("Location: admin.php");
		            }

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
	                      	$save = mysqli_query($conn, "UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', image='$file' WHERE admin_Id='$admin_Id'");
				            if($save) {
					                $_SESSION['success']  = "Admin information has been updated!";
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




	// CHANGE ADMIN PASSWORD
	if(isset($_POST['password_admin'])) {

    	$admin_Id    = $_POST['admin_Id'];	
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM admin WHERE password='$OldPassword' AND admin_Id='$admin_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
    				// COMPARE BOTH NEW AND CONFIRM PASSWORD
		    		if($password != $cpassword) {
		    				$_SESSION['exists']  = "Password does not matched. Please try again";
		          			header("Location: admin.php");
		    		} else {
			    			$update_password = mysqli_query($conn, "UPDATE admin SET password='$password' WHERE admin_Id='$admin_Id' ");

			    			if($update_password) {
			    					$_SESSION['success']  = "Password has been changed.";
		          					header("Location: admin.php");
			    			} else {
			    					$_SESSION['exists']  = "Something went wrong while changing the password.";
			          				header("Location: admin.php");
			    			}
		    		}
    	} else {
    		$_SESSION['exists']  = "Old password is incorrect.";
            header("Location: admin.php");
    	}

    }







    // UPDATE CATEGORY
	if(isset($_POST['update_category'])) {
		$cat_Id              = $_POST['cat_Id'];
		$categoryname        = $_POST['categoryname'];
		$categorydescription = $_POST['categorydescription'];

			$save = mysqli_query($conn, "UPDATE category SET cat_name='$categoryname', cat_description='$categorydescription' WHERE cat_Id='$cat_Id'");

      if($save) {
          $_SESSION['success']  = "Category has been updated!";
          header("Location: category.php");                                
      } else {
          $_SESSION['exists'] = "Something went wrong while updating the information. Please try again.";
          header("Location: category.php");
      }
	}




	 // UPDATE SUB CATEGORY
	if(isset($_POST['update_sub_category'])) {
		$sub_category_Id        = $_POST['sub_category_Id'];
		$sub_cat_Id             = $_POST['sub_cat_Id'];
		$subcategoryname        = $_POST['subcategoryname'];
		$subcategorydescription = $_POST['subcategorydescription'];

			$save = mysqli_query($conn, "UPDATE sub_category SET sub_cat_Id='$sub_cat_Id', sub_cat_name='$subcategoryname', sub_description='$subcategorydescription' WHERE sub_category_Id='$sub_category_Id'");

      if($save) {
          $_SESSION['success']  = "Sub-category has been updated!";
          header("Location: sub_category.php");                                
      } else {
          $_SESSION['exists'] = "Something went wrong while updating the information. Please try again.";
          header("Location: sub_category.php");
      }
	}









	// UPDATE MENU
	if(isset($_POST['update_menu'])) {
		$menu_Id        = $_POST['menu_Id'];
		$cat_Id          = $_POST['cat_Id'];
		$sub_cat_Id      = $_POST['sub_cat_Id'];
		$menu            = $_POST['menu'];
		$menudescription = $_POST['menudescription'];
		$price           = $_POST['price'];
		$file            = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

									$save = mysqli_query($conn, "UPDATE menu SET menu_cat_Id='$cat_Id', menu_sub_cat_Id='$sub_cat_Id', menu_name='$menu', menu_description='$menudescription', menu_price='$price' WHERE menu_Id='$menu_Id'");

				          if($save) {
					            $_SESSION['success']  = "Menu has been updated!";
					            header("Location: menu.php");                                
				          } else {
					            $_SESSION['exists'] = "Something went wrong while saving the information. Please try again.";
					            header("Location: menu.php");
				          }

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
                     	
		                      	$save = mysqli_query($conn, "UPDATE menu SET menu_cat_Id='$cat_Id', menu_sub_cat_Id='$sub_cat_Id', menu_name='$menu', menu_description='$menudescription', menu_price='$price', image='$file' WHERE menu_Id='$menu_Id'");

									          if($save) {
										            $_SESSION['success']  = "Menu has been updated!";
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




	// CONFIRM RESERVATION
	if(isset($_POST['confirm_reservation'])) {

			$checkout_Id = $_POST['checkout_Id'];
			$user_Id     = $_POST['user_Id'];

			$update = mysqli_query($conn, "UPDATE checkout SET status='Confirmed' WHERE checkout_Id='$checkout_Id'");
			if($update) {

					$_SESSION['success'] = "Customer's reservation has been confirmed.";
					header('Location: reservation_view.php?reservation_Id='.$checkout_Id.'');

			} else {

					$_SESSION['exists'] = "Something went wrong. Please try again.";
					header('Location: reservation_view.php?reservation_Id='.$checkout_Id.'');

			}	
	}




	// DENY RESERVATION
	if(isset($_POST['deny_reservation'])) {

			$checkout_Id = $_POST['checkout_Id'];
			$user_Id     = $_POST['user_Id'];

			$delete = mysqli_query($conn, "DELETE FROM checkout WHERE checkout_Id='$checkout_Id'");
			if($delete) {

					$_SESSION['success'] = "Customer's reservation has been denied.";
					header('Location: reservation.php');

			} else {

					$_SESSION['exists'] = "Something went wrong. Please try again.";
					header('Location: reservation_view.php?reservation_Id='.$checkout_Id.'');

			}	
	}



?>