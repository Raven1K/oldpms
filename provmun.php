<?php
include 'processphp/config.php';

if (isset($_POST["citymun_data"])) {
    $citymun_id = $_POST["citymun_data"];

    // Use a prepared statement to prevent SQL Injection
    $stmt = $con->prepare("SELECT * FROM brgy WHERE mun_code = ?");
    $stmt->bind_param("s", $citymun_id);
    $stmt->execute();
    
    $citymun_qry = $stmt->get_result();

    $output = '<option value=""> Select Barangay </option>';

    while ($citymun_row = $citymun_qry->fetch_assoc()) {
        // Sanitize output to prevent Cross-Site Scripting (XSS)
        $brgy_code = htmlspecialchars($citymun_row['brgy_code'], ENT_QUOTES, 'UTF-8');
        $brgy_name = htmlspecialchars($citymun_row['brgy_name'], ENT_QUOTES, 'UTF-8');
        
        $output .= '<option value="' . $brgy_code . '">' . $brgy_name . '</option>';
    }

    $stmt->close();
    echo $output;
}
?>