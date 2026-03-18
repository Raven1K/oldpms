<?php

include "../../processphp/config.php";

// Initialize an array to hold the species and their respective board feet
$species_data = array(
    "Falcata" => isset($_POST["fal"]) ? $_POST["fal"] : "",
    "Gemelina" => isset($_POST["gem"]) ? $_POST["gem"] : "",
    "Caimito" => isset($_POST["cai"]) ? $_POST["cai"] : "",
    "Mangium" => isset($_POST["mang"]) ? $_POST["mang"] : "",
    "Rubber" => isset($_POST["rubber"]) ? $_POST["rubber"] : "",
    "Mahogany" => isset($_POST["mah"]) ? $_POST["mah"] : ""
);

// Initialize an array to hold the species and their respective board feet data
$boardfeet_data = array(
    "Falcata" => isset($_POST["falTextbox"]) ? $_POST["falTextbox"] : "",
    "Gemelina" => isset($_POST["gemTextbox"]) ? $_POST["gemTextbox"] : "",
    "Caimito" => isset($_POST["caiTextbox"]) ? $_POST["caiTextbox"] : "",
    "Mangium" => isset($_POST["mangTextbox"]) ? $_POST["mangTextbox"] : "",
    "Rubber" => isset($_POST["rubberTextbox"]) ? $_POST["rubberTextbox"] : "",
    "Mahogany" => isset($_POST["mahTextbox"]) ? $_POST["mahTextbox"] : ""
);

// Loop through the species data to insert or update records
foreach ($species_data as $species => $board_feet) {
    // Skip if board feet is empty
    if ($board_feet !== "") {
        $board_ft = $boardfeet_data[$species]; // Get the corresponding board feet data
        $idd = $_POST["idd"]; // Assuming idd will be the species name for simplicity

        // Check if a record with the provided species already exists
        $select_query = "SELECT COUNT(*) as count FROM wood_species WHERE species = '$species' AND idd = '$idd'";
        $result = mysqli_query($con, $select_query);
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];

        if ($count > 0) {
            $sql = "INSERT INTO wood_species (species, type, idd) 
                    VALUES ('$species', '$board_ft', '$idd')";
        } else {
            // If no record with the provided species exists, perform an INSERT operation
            $sql = "INSERT INTO wood_species (species, type, idd) 
                    VALUES ('$species', '$board_ft', '$idd')";
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
                }, 1000);
            }
            
            // Call the function when the page loads
            window.onload = showAlertAndClose;
            </script>';

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con) . "<br>";
        }
    }
}

// Close the connection

?>
