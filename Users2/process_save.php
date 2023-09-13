<?php

	session_start();
	include '../config.php';


	if(isset($_POST['addtocart'])) {
		$menu_Id  = $_POST['menu_Id'];
		$user_Id  = $_POST['user_Id'];
		$quantity = $_POST['quantity'];

		$fetch_price = mysqli_query($conn, "SELECT * FROM menu WHERE menu_Id='$menu_Id'");
		$row = mysqli_fetch_array($fetch_price);

		$total = $row['menu_price']*$quantity;



		$fetch = mysqli_query($conn, "SELECT * FROM cart WHERE cart_menu_Id='$menu_Id' AND cart_user_Id='$user_Id' AND cart_status='Pending'");
		if(mysqli_num_rows($fetch) > 0) {

			echo '<script type="text/javascript"> alert ("You have already added this menu to your cart.");
			      		window.location = "index.php?#addtocart"
			     </script>';

		} else {
			$save = mysqli_query($conn, "INSERT INTO cart (cart_menu_Id, cart_user_Id, cart_quantity, cart_total) VALUES ('$menu_Id', '$user_Id', '$quantity', '$total') ");
			if($save) {

				echo '<script> alert ("You have successfully added this menu to your Cart.");
                		window.location = "index.php?#addtocart"
                	  </script>';

			} else {

				echo '<script> alert ("Something went wrong. Please try again.");
                		window.location = "index.php?#addtocart"
                	  </script>';

			}
		}

	}





	// DELETE CART
	if(isset($_POST['delete'])) {
		$cart_Id = $_POST['cart_Id'];

		$delete = mysqli_query($conn, "DELETE FROM cart WHERE cart_Id='$cart_Id'");
		if($delete) {
			echo '<script> alert ("Successfully deleted.");
	        		window.location = "cart.php"
	        	  </script>';
		} else {
			echo '<script> alert ("Something went wrong while deleting the record. Please try again.");
	        		window.location = "cart.php"
	        	  </script>';
		}
	}




	// UPDATE CART
	if(isset($_POST['update_cart'])) {
		$cart_Id    = $_POST['cart_Id'];
		$menu_price = $_POST['menu_price'];
		$quantity   = $_POST['quantity'];

		$total = $menu_price*$quantity;

		if($quantity == 0 || $quantity < 0) {
			echo '<script> alert ("Invalid input.");
		        		window.location = "cart.php"
		        	  </script>';
		} else {

			$save = mysqli_query($conn, "UPDATE cart SET cart_quantity='$quantity', cart_total='$total' WHERE cart_Id='$cart_Id'");
			if($save) {
				echo '<script> alert ("Successfully updated.");
		        		window.location = "cart.php"
		        	  </script>';
			} else {
				echo '<script> alert ("Something went wrong while updating the record. Please try again.");
		        		window.location = "cart.php"
		        	  </script>';
			}

		}
	}




	// CHECKOUT
	if(isset($_POST['checkout'])) {

		$user_Id    = $_POST['user_Id'];
		$total      = $_POST['total'];
		$eventname  = $_POST['eventname'];
		$eventvenue = $_POST['eventvenue'];
		$eventdate  = $_POST['eventdate'];
		$eventtime  = $_POST['eventtime'];


		$check_pending_checkout = mysqli_query($conn, "SELECT * FROM checkout WHERE checkout_user_Id='$user_Id' AND status='Pending'");
		if(mysqli_num_rows($check_pending_checkout) > 0) {

			echo '<script> alert ("You still have a pending checkout. Please wait for the Admin to confirm it. Thank you!");
		        		window.location = "checkout.php"
		        	  </script>';

		} else {


			$save = mysqli_query($conn, "INSERT INTO checkout (checkout_user_Id, event_name, event_venue, event_date, event_time, totalAmount) VALUES ('$user_Id', '$eventname', '$eventvenue', '$eventdate', '$eventtime', '$total')");
			if($save) {
					$update = mysqli_query($conn, "UPDATE cart SET cart_status='Confirmed', checkOut=1 WHERE cart_user_Id='$user_Id'");
					if($update) {
						echo '<script> alert ("You have successfully checked out.");
				        		window.location = "checked_out.php"
				        	  </script>';
					} else {
						echo '<script> alert ("Something went wrong.");
				        		window.location = "checkout.php"
				        	  </script>';
					}
			} else {
				echo '<script> alert ("Something went wrong.");
		        		window.location = "checkout.php"
		        	  </script>';
			}


		}

		

	}






	if(isset($_POST['cancel_checkout'])) {

		$user_Id     = $_POST['user_Id'];
		$checkout_Id = $_POST['checkout_Id'];

		$delete = mysqli_query($conn, "DELETE FROM checkout WHERE checkout_Id='$checkout_Id'");
		if($delete) {

			$fetch_pending = mysqli_query($conn, "SELECT * FROM cart WHERE cart_status='Confirmed' AND cart_user_Id='$user_Id'");
			if(mysqli_num_rows($fetch_pending) > 0 ) {

				$update = mysqli_query($conn, "UPDATE cart SET cart_status='Pending' WHERE cart_user_Id='$user_Id'");
				if($update) {

					echo '<script> alert ("You have cancelled your checked out menu.");
	        				window.location = "cart.php"
        	  			  </script>';	

				} else {
					echo '<script> alert ("Something went wrong. Please try again.");
			        		window.location = "cart.php"
			        	  </script>';

				}

			} else {

				echo '<script> alert ("Something went wrong. Please try again.");
		        		window.location = "cart.php"
		        	  </script>';

			}

			
		} else {
			echo '<script> alert ("Something went wrong while deleting the record. Please try again.");
	        		window.location = "cart.php"
	        	  </script>';
		}
	}




	if(isset($_POST['paid'])) {
		$user_Id     = $_POST['user_Id'];
		$paid = mysqli_query($conn, "UPDATE checkout SET Paid=1 WHERE status='Confirmed' AND checkout_user_Id='$user_Id' ");
		if($paid) {
			$paid2 = mysqli_query($conn, "UPDATE cart SET Paid=1 WHERE cart_status='Confirmed' AND cart_user_Id='$user_Id' ");
			if($paid2) {
				echo '<script> alert ("You have marked your order as Paid/Received.");
	    				window.location = "purchaseHistory.php"
		  			  </script>';	
			} else {
				echo '<script> alert ("Something went wrong. Please try again.");
		        		window.location = "purchaseHistory.php"
		        	  </script>';
			}
		} else {
			echo '<script> alert ("Something went wrong. Please try again.");
	        		window.location = "purchaseHistory.php"
	        	  </script>';
		}
	}









	

?>