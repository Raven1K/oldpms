<?php 

// if (isset($_POST['btn']) && isset($_FILES['my_image4'])) {


	
	// echo "<pre>";
	// print_r($_FILES['my_image4']);
	// echo "</pre>";

	$img_name = $_FILES['my_image4']['name'];
	$img_size = $_FILES['my_image4']['size'];
	$tmp_name = $_FILES['my_image4']['tmp_name'];
	$error = $_FILES['my_image4']['error'];

	if ($error === 0) {
		if ($img_size > 10 * 1024 * 1024) {
            $em = "Sorry, Document number 4 file is too large.";
		    header("Location: ../univmodal.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png", "pdf"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name4 = uniqid("PDF-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name4;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database

				// $sql = "INSERT INTO images(image_url) 
				        // VALUES('$new_img_name')";
				// mysqli_query($conn, $sql);
				// header("Location: view.php");


			}else {
				$em = "You can't upload files of this type on document number 4";
		        header("Location: ../univmodal.php?error=$em");
			}
		}

	}
