<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 1125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: ../univmodal.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png", "pdf"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("PDF-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database

				// $sql = "INSERT INTO images(image_url) 
				        // VALUES('$new_img_name')";
				// mysqli_query($conn, $sql);
				// header("Location: view.php");


			}else {
				$em = "You can't upload files of this type";
		        header("Location: ../univmodal.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: ../univmodal.php?error=$em");
	}

}else {
    $em = "unknown error occurred!";
	header("Location: ../univmodal.php");
}