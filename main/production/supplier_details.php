

<?php

require_once "../../processphp/config.php";

?>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    
    
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->







<?php



if ( isset($_POST['contractSubmit'])) {
     // Retrieve form data
	 
	 $lumber_app_id = "1011";
	 $tradeName = $_POST['tradeName'];
	 $address = $_POST['address'];
	 $ownerName = $_POST['ownerName'];
	 $contractVolume = $_POST['contractVolume'];
	 $contractType = $_POST['contractType'];
	 $ptpoc = $_POST['ptpoc'];
	 $dateIssued = $_POST['dateIssued'];
	 $validityYear = $_POST['validityYear'];
	 $boardFeet = $_POST['boardFeet'];
 
	 // Perform any necessary backend processing with the form data
 
	 // Example: Displaying the submitted data
	//  echo "LUMBER ID: " . $lumber_app_id . "<br>";
	//  echo "Supplier Business Trade Name: " . $tradeName . "<br>";
	//  echo "Plantation Address: " . $address . "<br>";
	//  echo "Supplier Owner Name: " . $ownerName . "<br>";
	//  echo "Total Contracted Volume: " . $contractVolume . "<br>";
	//  echo "Type of Contracts: " . $contractType . "<br>";
	//  echo "PTPOC/PTPR Number: " . $ptpoc . "<br>";
	//  echo "Date Issued: " . $dateIssued . "<br>";
	//  echo "Year Validity: " . $validityYear . "<br>";






	 $query2 = $connection->prepare("INSERT INTO lumbersupply (
		lumber_app_id, 
		tradeName, 
		address, 
		ownerName, 
		contractVolume, 
		contractType, 
		ptpoc, 
		dateIssued, 
		validityYear,
		boardFeet)
		VALUES (:lumber_app_id, 
		:tradeName, 
		:address, 
		:ownerName, 
		:contractVolume, 
		:contractType, 
		:ptpoc, 
		:dateIssued, 
		:validityYear,
		:boardFeet
		)");
	
	$query2->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
	$query2->bindParam("tradeName", $tradeName, PDO::PARAM_STR);
	$query2->bindParam("address", $address, PDO::PARAM_STR);
	$query2->bindParam("ownerName", $ownerName, PDO::PARAM_STR);
	$query2->bindParam("contractVolume", $contractVolume, PDO::PARAM_STR);
	$query2->bindParam("contractType", $contractType, PDO::PARAM_STR);
	$query2->bindParam("ptpoc", $ptpoc, PDO::PARAM_STR);
	$query2->bindParam("dateIssued", $dateIssued, PDO::PARAM_STR);
	$query2->bindParam("validityYear", $validityYear, PDO::PARAM_STR);
	$query2->bindParam("boardFeet", $boardFeet, PDO::PARAM_STR);

	

	
	$result2 = $query2->execute();




	function function_alert($message) {
      
		// Display the alert box 
	//   echo "<script type='text/javascript'>alert('Successfully Added');location='application.php';</script>";
	//   echo "<script type='text/javascript'>alert('Successfully Added'); location='dashboard_oldform.php' </script>";

	  echo "<script type='text/javascript'>alert('Successfully Added');  </script>";
	}
	  
	  
	// Function call
	function_alert("Successfully Added!");
	


}



 ?>


<style>
	form {
	  max-width: 600px;
	  margin: 0 auto;
	  border: 2px solid green;
	  padding: 20px;
	  border-radius: 10px;
	}
	
	label {
	  display: block;
	  margin-bottom: 10px;
	  border-bottom: 1px solid black;
	  padding-bottom: 5px;
	  font-family: Arial, sans-serif;
	}
  
	h1 {
	  display: block;
	  margin-bottom: 10px;
	  border-bottom: 1px solid black;
	  padding-bottom: 5px;
	  font-family: Arial, sans-serif;
	}
	
	h2 {
	  display: block;
	  margin-bottom: 5px;
	  border-bottom: 1px solid black;
	  padding-bottom: 5px;
	  font-family: Arial, sans-serif;
	}
	input {
	  padding: 10px;
	  font-size: 16px;
	  border-radius: 5px;
	  border: 1px solid #ccc;
	  width: 100%;
	  font-family: Arial, sans-serif;
	}
	
	input[type="date"] {
	  width: auto;
	}
  </style>
  
  <form method="POST">
	<br>
	<h1><label for="tradeName">Add Supplier Business Trade:</label></h1>
	<br>
	<label for="tradeName">Trade Name:</label>
	<input type="text" id="tradeName" name="tradeName" required>
	<br>
	<label for="address">Plantation Address:</label>
	<input type="text" id="address" name="address" required>
	<br>
	<label for="ownerName">Supplier Owner Name:</label>
	<input type="text" id="ownerName" name="ownerName" required>
	<br>
	<label for="contractVolume">Total Contracted Volume:</label>
	<input type="text" id="contractVolume" name="contractVolume" required>
	<br>
	<label for="contractType">Type of Contracts:</label>
	<input type="text" id="contractType" name="contractType" required>
	<br>
	<label for="ptpoc">PTPOC/PTPR Number:</label>
	<input type="text" id="ptpoc" name="ptpoc" required>
	<br>
	<label for="dateIssued">Date Issued:</label>
	<input type="date" id="dateIssued" name="dateIssued" required>
	<br>
	<label for="validityYear">Year Validity:</label>
	<input type="date" id="validityYear" name="validityYear" required>

	<br>
	<h2><label for="tradeName">Wood Species</label></h2>
	<input type="text" id="Type of Wood Species " placeholder="Type of Wood Specie" name="contractType" >
	<br>
	<br>
	<input type="text" id="Board Feet" placeholder="Board Feet" name="boardFeet" >
	<br>

	<br> <br>
	<input type="submit" value="Submit" name="contractSubmit" >
  </form>
  
  <br><br>
  
  <?php




    // Fetch and display the inserted data in a table
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr>
            <th style='border: 1px solid black; padding: 8px;'>Trade Name</th>
            <th style='border: 1px solid black; padding: 8px;'>Address</th>
            <th style='border: 1px solid black; padding: 8px;'>Owner Name</th>
            <th style='border: 1px solid black; padding: 8px;'>Contracted Volume</th>
            <th style='border: 1px solid black; padding: 8px;'>Contract Type</th>
            <th style='border: 1px solid black; padding: 8px;'>PTPOC/PTPR Number</th>
            <th style='border: 1px solid black; padding: 8px;'>Date Issued</th>
            <th style='border: 1px solid black; padding: 8px;'>Validity Year</th>
			<th style='border: 1px solid black; padding: 8px;'>Action</th>
			<th style='border: 1px solid black; padding: 8px;'>Delete</th>
          </tr>";

    // Fetch the inserted data
    $query3 = $connection->prepare("SELECT * FROM lumbersupply");
    $query3->execute();
    $result3 = $query3->fetchAll(PDO::FETCH_ASSOC);

    // Loop through the fetched data and display it in table rows
    foreach ($result3 as $row) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['tradeName'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['address'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['ownerName'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['contractVolume'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['contractType'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['ptpoc'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['dateIssued'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['validityYear'] . "</td>";
		echo "<td style='border: 1px solid black; padding: 8px;'><a href='supplier_cal.php?id=" . $row['id'] . "'><button>" . $row['id'] . "</button></a></td>";
	
		echo '<form method="post">
		
		
		<td style="border: 1px solid black; padding: 8px;">

		<input type="text" value="'. $row['id'] .'" name="id" hidden>

        <button type="submit" class="btn btn-primary" name="deleteSupplier" >Delete</button>
		

      </td> </form>';

	  
	

	
        echo "</tr>";
    }

    echo "</table>";


	

  ?>


<!-- Modal Delete -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	
		<?php 

			if ( isset($_POST['deleteSupplier'])) {


				echo "<script>$(document).ready(function(){ $('#exampleModal').modal('show'); });</script>";
				$idSupplier = $_POST['id'];
				echo '<form method="post">';

				echo '<input type="text" value="'. $idSupplier .'" name="id" >';

	
			


		

      echo '</div>';
      echo '<div class="modal-footer">';


        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
        echo '<button type="submit" class="btn btn-primary" name="deleteSupplierConfirm">Delete</button>';
		echo '</form>';
			}
		?>
      </div>
    </div>
  </div>
</div>

<?php

// // deleted
// if (isset($_POST['deleteSupplierConfirm'])) {


// 	$idSupplier = $_POST['id'];
	
// 	$query2 = "DELETE FROM lumbersupply WHERE id = $idSupplier";

// 	if ($connection->query($query2) === true) {
// 		echo "Post deleted successfully.";
// 	} else {
// 		echo "Error deleting post: " . $connection->error;
// 	}

// 	$connection->close();




// } 


if (isset($_POST['deleteSupplierConfirm'])) {
    $deleteId = $_POST['id'];

    $deleteQuery = $connection->prepare("DELETE FROM lumbersupply WHERE id = :delete_id");
    $deleteQuery->bindParam("delete_id", $deleteId, PDO::PARAM_INT);
    $deleteResult = $deleteQuery->execute();

    if ($deleteResult) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $deleteQuery->errorInfo()[2];
    }






	function function_alert($message) {
      
		// Display the alert box 
	//   echo "<script type='text/javascript'>alert('Successfully Added');location='application.php';</script>";
	  echo "<script type='text/javascript'>alert('Successfully Added'); location='supplier_details.php' </script>";


	}
	  
	  
	// Function call
	function_alert("Successfully Added!");
	






}
	
?>