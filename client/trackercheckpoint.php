<?php

require_once "../processphp/config.php";
$l_id = $_GET['lumber_app_id'];

// Prepare and execute a parameterized query to prevent SQL injection
$sql = "SELECT * FROM order_of_payment WHERE lumber_app_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $l_id); // Assuming $l_id is a string
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch data from the result set
    while ($row = $result->fetch_assoc()) {
        // Assign values from the database to variables
        $Amount_Decimal = $row['Amount_Decimal'];
        $payment_transaction = $row['payment_transaction'];
        $Serial_No = $row['Serial_No'];
        $Address_Office_of_Payor = $row['Address_Office_of_Payor'];
        $Name_of_Payor = $row['Name_of_Payor'];
        $Entity_Name = $row['Entity_Name'];
        $FundCluster = $row['FundCluster'];
        $Payment_Status = $row['Payment_Status'];

        // Display the data or perform further processing as needed
    }


    if ($Payment_Status == 'Paid') {
        // If payment status is 'Paid', display appropriate message
        // echo '<script>window.location.href = "doctracker.php?lumber_app_id=" + encodeURIComponent("' . $l_id . '");</script>';
    } else {
        // Redirect to forlbpiqdctracker.php with lumber_app_id parameter
    
        // echo '<script>window.location.href = "forlbpiqdctracker.php?lumber_app_id=" + encodeURIComponent("' . $l_id . '");</script>';
        echo '<script>window.open("forlbpiqdctracker.php?lumber_app_id=" + encodeURIComponent("' . $l_id . '"), "_blank");</script>';
    
    
    }

} else {
    echo "No results found for the selected ID";
}




// Close the statement and database connection
$stmt->close();
$con->close();
?>
