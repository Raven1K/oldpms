<?php

include "../../processphp/config.php";

// Assuming you have established a connection to your MySQL database

// Get the values to insert or update
$species = $_POST["Others"];
$type = $_POST["boardfeet"];
$idd = $_POST["idd"];

// Check if a record with the provided species, type, and idd already exists
$select_query = "SELECT COUNT(*) as count FROM wood_species WHERE species = '$species' AND type = '$type' AND idd = '$idd'";
$result = mysqli_query($con, $select_query);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

if ($count > 0) {
    // If a record with the provided species, type, and idd already exists, perform an UPDATE operation
    $sql = "UPDATE wood_species 
            SET species = '$species', type = '$type' 
            WHERE idd = '$idd'";
} else {
    // If no record with the provided species, type, and idd exists, perform an INSERT operation
    $sql = "INSERT INTO wood_species (species, type, idd) 
            VALUES ('$species', '$type', '$idd')";
}

// Execute the query
if (mysqli_query($con, $sql)) {

echo '<script>
    // Function to display alert and close tab after specified duration
    function showAlertAndClose() {
        // Display alert message
        alert("Record for ' . $species . ' inserted or updated successfully");
        
        // Close tab after 2 seconds (2000 milliseconds)
        setTimeout(function(){
            window.close();
        }, 2000);
    }
    
    // Call the function when the page loads
    window.onload = showAlertAndClose;
</script>';


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close the connection
mysqli_close($con);
?>
