<?php 
	session_start();
	include '../config.php';

	// DELETE PATIENT
	if(isset($_POST['delete_patient'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
			$_SESSION['success']  = "User information has been deleted!";
	        header("Location: users.php");   
		} else {
			$_SESSION['exists'] = "Something went wrong while deleting the record. Please try again.";
            header("Location: users.php");
		}
	}


	// DELETE ADMIN
	if(isset($_POST['delete_admin'])) {
		$admin_Id = $_POST['admin_Id'];

		$delete = mysqli_query($conn, "DELETE FROM admin WHERE admin_Id='$admin_Id'");
		if($delete) {
			$_SESSION['success']  = "Admin information has been deleted!";
	        header("Location: admin.php");   
		} else {
			$_SESSION['exists'] = "Something went wrong while deleting the record. Please try again.";
            header("Location: admin.php");
		}
	}




	// DELETE CATEGORY
	if(isset($_POST['delete_category'])) {
		$cat_Id = $_POST['cat_Id'];

		$delete = mysqli_query($conn, "DELETE FROM category WHERE cat_Id='$cat_Id'");
		if($delete) {
			$_SESSION['success']  = "Category has been deleted!";
	        header("Location: category.php");   
		} else {
			$_SESSION['exists'] = "Something went wrong while deleting the record. Please try again.";
            header("Location: category.php");
		}
	}



	// DELETE SUB CATEGORY
	if(isset($_POST['delete_sub_category'])) {
		$sub_category_Id = $_POST['sub_category_Id'];

		$delete = mysqli_query($conn, "DELETE FROM sub_category WHERE sub_category_Id='$sub_category_Id'");
		if($delete) {
			$_SESSION['success']  = "Sub-category has been deleted!";
	        header("Location: sub_category.php");   
		} else {
			$_SESSION['exists'] = "Something went wrong while deleting the record. Please try again.";
            header("Location: sub_category.php");
		}
	}



	// DELETE MENU
	if(isset($_POST['delete_menu'])) {
		$menu_Id = $_POST['menu_Id'];

		$delete = mysqli_query($conn, "DELETE FROM menu WHERE menu_Id='$menu_Id'");
		if($delete) {
			$_SESSION['success']  = "Menu has been deleted!";
	        header("Location: menu.php");   
		} else {
			$_SESSION['exists'] = "Something went wrong while deleting the record. Please try again.";
            header("Location: menu.php");
		}
	}



?>