<?php 
    // Prevent Clickjacking by setting X-Frame-Options and Content-Security-Policy headers
    header('X-Frame-Options: SAMEORIGIN');
    header("Content-Security-Policy: frame-ancestors 'self';");

    require_once('config.php');

    if(isset($_POST['btn'])) {

        // 1. Sanitize and trim inputs to prevent XSS and clean up whitespace
        $full_name = trim($_POST['name']);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $subject = trim($_POST['subject']);
        $message = htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8');

        // 2. Check for empty fields
        if(empty($full_name) || empty($email) || empty($subject) || empty($message)) {
            echo '<form action="index.php" method="POST">
            <script>alert("Please Fill in the Blanks")</script>
            <button type="submit" name="button"> Backpage </button>
            </form>';
        } 
        else {
            // 3. Use Prepared Statements to prevent SQL Injection
            $stmt = $con->prepare("INSERT INTO contact_us (full_name, email, subject, message) VALUES (?, ?, ?, ?)");
            
            if ($stmt) {
                // "ssss" means we are binding 4 string parameters
                $stmt->bind_param("ssss", $full_name, $email, $subject, $message);
                
                // Execute the prepared statement
                $result = $stmt->execute();

                if($result) {
                    $em = "Your Message Has Been Sent";
                    header("Location: univmodal.php?error=" . urlencode($em));
                    exit(); // Crucial: Always exit after a header redirect
                } else {
                    // Do not expose raw database errors to users in a live environment
                    echo 'An error occurred while saving your message. Please try again later.';
                }
                
                // Close the statement
                $stmt->close();
            } else {
                // Triggers if the SQL query structure is wrong or db connection fails
                echo 'Database configuration error.';
            }
        }
    }
?>