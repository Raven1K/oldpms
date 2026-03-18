<?php
			session_start();
			require_once "../../processphp/config.php";

			$l_id = $_GET['lumber_app_id'];

			$date =  date("m/d/Y") ; 
			$inddoc = '1';
			$inddoc2 = '2';
			$docstat = 'Approved';
			$docstat2 = 'Disapproved';
			// $id_name = '36';
			$dtdis = "";




// approve

			$sql = "UPDATE lumber_app_doc_erow SET date_approved = :date_approved, date_disapprove = :date_disapprove,
			doc_app_ind = :doc_app_ind, doc_status = :doc_status
			WHERE upload_id_doc  = $l_id &&  Number_of_doc = '12'";
			
			$stmt = $connection->prepare($sql);
			$stmt->execute(array(
			':date_approved' => $date,
			':date_disapprove' => $dtdis,
			':doc_app_ind' => $inddoc,
			':doc_status' => $docstat,));

// disapprove 

			// $sql = "UPDATE lumber_app_doc_erow SET date_approved = :date_approved, date_disapprove = :date_disapprove,
			// doc_app_ind = :doc_app_ind, doc_status = :doc_status
			// WHERE upload_id_doc  = $l_id";
			// $stmt = $connection->prepare($sql);
			// $stmt->execute(array(
			// ':date_approved' => $dtdis,
			// ':date_disapprove' => $date,
			// ':doc_app_ind' => $inddoc2,
			// ':doc_status' => $docstat2,));
			




?>
