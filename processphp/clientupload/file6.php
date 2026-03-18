<?php 

if (empty($_FILES['my_image6']['name'])) {

	$new_img_name6 = 'submission_of_the_Ending_Stocked.pdf';
	$img_upload_path = 'uploads/'.$new_img_name6;
	// copy('submission_of_the_Ending_Stocked.pdf', $img_upload_path);

	$img_name = !empty($_FILES['my_image6']['name']) ? $_FILES['my_image6']['name'] : 'submission_of_the_Ending_Stocked.pdf';
	$img_size = !empty($_FILES['my_image6']['size']) ? $_FILES['my_image6']['size'] : 0;
	$tmp_name = !empty($_FILES['my_image6']['tmp_name']) ? $_FILES['my_image6']['tmp_name'] : '';
	$error = !empty($_FILES['my_image6']['error']) ? $_FILES['my_image6']['error'] : 0;

	$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png", "pdf"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name6 = uniqid("PDF-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name6;
				if(!empty($tmp_name)) {
					move_uploaded_file($tmp_name, $img_upload_path);
				} else {
					copy('submission_of_the_Ending_Stocked.pdf', $img_upload_path);
				}

			}else {
				$em = "You can't upload files of this type on document number 6";
				header("Location: ../univmodal.php?error=$em");
			}


} else {
	echo "<pre>";
	print_r($_FILES['my_image6']);
	echo "</pre>";

	$img_name = $_FILES['my_image6']['name'];
	$img_size = $_FILES['my_image6']['size'];
	$tmp_name = $_FILES['my_image6']['tmp_name'];
	$error = $_FILES['my_image6']['error'];

	if ($error === 0) {
		if ($img_size > 10 * 1024 * 1024) {
			$em = "Sorry, Document number 6 file is too large.";
			header("Location: ../univmodal.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png", "pdf"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name6 = uniqid("PDF-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name6;
				move_uploaded_file($tmp_name, $img_upload_path);

			}else {
				$em = "You can't upload files of this type on document number 6";
				header("Location: ../univmodal.php?error=$em");
			}
		}
	}
}	
	?>