<?php 

// if (isset($_POST['Submit'])) {


	
	// echo "<pre>";
	// print_r($_FILES['my_image1']);
	// echo "</pre>";

	$img_name = $_FILES['my_image1']['name'];
	$img_size = $_FILES['my_image1']['size'];
	$tmp_name = $_FILES['my_image1']['tmp_name'];
	$error = $_FILES['my_image1']['error'];

	if ($error === 0) {
		if ($img_size > 10 * 1024 * 1024) {
			$em = "Sorry, Document number 1 file is too large.";
		    header("Location: ../univmodal.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png", "pdf"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("PDF-", true).'.'.$img_ex_lc;
				$img_upload_path = '../../processphp/clientupload/uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database

				// $sql = "INSERT INTO images(image_url) 
				        // VALUES('$new_img_name')";
				// mysqli_query($conn, $sql);
				// header("Location: view.php");




$For_Review = 'For Review' ;
$date =  date("d/m/Y") ; 
$doc_app_ind = '0';
$doc_type_name = 'Lumber Dealer Photo' ;
$Number_of_doc = '7';

$query = $connection->prepare("INSERT INTO lumber_app_doc_erow(
	lumber_app_id,   
	name_app_doc,   
	doc_type_name,
	date_applied,
	doc_status,
	doc_app_ind,
	Number_of_doc,
	uniqid_lapp

)
	
	VALUES (
	:lumber_app_id, 
	:name_app_doc,    
	:doc_type_name,
	:date_applied,
	:doc_status,
	:doc_app_ind,
	:Number_of_doc,
	:uniqid_lapp

	)");

$query->bindParam("lumber_app_id", $l_id, PDO::PARAM_STR);
$query->bindParam("name_app_doc", $new_img_name, PDO::PARAM_STR);
$query->bindParam("doc_type_name", $doc_type_name, PDO::PARAM_STR);
$query->bindParam("date_applied", $date, PDO::PARAM_STR);
$query->bindParam("doc_status", $For_Review, PDO::PARAM_STR);
$query->bindParam("doc_app_ind", $doc_app_ind, PDO::PARAM_STR);
$query->bindParam("Number_of_doc", $Number_of_doc, PDO::PARAM_STR);
$query->bindParam("uniqid_lapp", $uniqid_lap, PDO::PARAM_STR);
$result = $query->execute();




			}else {
				$em = "You can't upload files of this type on document number 1";
		        header("Location: ../univmodal.php?error=$em");
			}
		}

	}

	?>