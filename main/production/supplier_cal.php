<?php

require_once "../../processphp/config.php";

?>


<?php

$lumber_app_id = $_GET['id'];

$lumber_app5 = "SELECT * FROM lumbersupply where id = $lumber_app_id";
$lumber_app_qry5 = mysqli_query($con, $lumber_app5);
$result5 = mysqli_fetch_assoc($lumber_app_qry5);
// require_once "modaltempextension.php";
$contractVolume = $result5["contractVolume"];


if ( isset($_POST['contractSubmit'])) {


	$result = $_POST['result'];




$sql = "UPDATE lumbersupply SET contractVolume = :contractVolume
WHERE id = $lumber_app_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(

':contractVolume' => $result,));




function function_alert($message) {

	echo "<script type='text/javascript'>alert('Successfully Submitted'); location='supplier_details.php' </script>";

  }
	
	
  // Function call
  function_alert("Successfully Submitted!");
  

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
	<!-- Existing form code -->
	
	<label for="contractType">Specie:</label>
	<input type="text" id="contractType" name="contractType" value="<?php echo $result5['contractType']; ?>">
	<br>


	<label for="contractVolume">Total Contracted Volume:</label>
<input type="text" id="contractVolume" name="contractVolume" value="<?php echo $result5['contractVolume']; ?>">
<br>

<br>
<br>

<label for="minusValue">Minus Value:</label>
<input type="text" id="minusValue" name="minusValue">
<br>

<label for="result">Volume Left:</label>
<input type="text" id="result" value="<?php echo $result5['contractVolume']; ?>" name="result"  readonly  >
<br>

<script>
  // Get the input fields by their IDs
  const contractVolumeInput = document.getElementById('contractVolume');
  const minusValueInput = document.getElementById('minusValue');
  const resultInput = document.getElementById('result');

  // Add an event listener to the contractVolumeInput and minusValueInput fields
  contractVolumeInput.addEventListener('input', updateResult);
  minusValueInput.addEventListener('input', updateResult);

  // Function to update the result
  function updateResult() {
    // Parse the input values as numbers
    const contractVolume = parseFloat(contractVolumeInput.value);
    const minusValue = parseFloat(minusValueInput.value);

    // Subtract the minusValue from the contractVolume and set it as the value of the resultInput
    const result = contractVolume - minusValue;
    resultInput.value = isNaN(result) ? '' : result;
  }
</script>

	<br> <br>
	<input type="submit" value="Submit" name="contractSubmit">
</form>







	
