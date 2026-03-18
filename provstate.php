<?php
include 'processphp/config.php';

// Check if the POST variable is set
if (isset($_POST["province_data"])) {
    $province_id = $_POST["province_data"];

    // Use a prepared statement to prevent SQL Injection
    $stmt = $con->prepare("SELECT * FROM muncity WHERE prov_code = ?");
    
    // Bind the parameter ("s" means string. If prov_code is strictly an integer in your DB, you can use "i")
    $stmt->bind_param("s", $province_id);
    $stmt->execute();
    
    // Get the result set
    $province_qry = $stmt->get_result();

    $output = '<option value=""> Select Municipality </option>';

    while ($province_row = $province_qry->fetch_assoc()) {
        // Sanitize output to prevent Cross-Site Scripting (XSS)
        $mun_code = htmlspecialchars($province_row['mun_code'], ENT_QUOTES, 'UTF-8');
        $muncity_name = htmlspecialchars($province_row['muncity_name'], ENT_QUOTES, 'UTF-8');
        
        $output .= '<option value="' . $mun_code . '">' . $muncity_name . '</option>';
    }

    $stmt->close();
    echo $output;
}
?>