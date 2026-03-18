<?php
declare(strict_types=1);

// Set header to return JSON response
header('Content-Type: application/json');

// Include your database configuration
require "../../processphp/config.php";

// Function to send a standardized JSON response and exit
function sendResponse(string $status, string $message): void
{
    echo json_encode(['status' => $status, 'message' => $message]);
    exit;
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse('error', 'Invalid request method.');
}

// Validate input
$app_id = $_POST['app_id'] ?? null;
$emailMessage = $_POST['message'] ?? null;

if (empty($app_id) || empty($emailMessage)) {
    sendResponse('error', 'Missing required parameters.');
}

// Fetch recipient email from the database using a prepared statement for security
$stmt = $con->prepare("SELECT perm_email, perm_fname FROM lumber_application WHERE lumber_app_id = ?");
if (!$stmt) {
    sendResponse('error', 'Database query preparation failed.');
}

$stmt->bind_param("i", $app_id);
$stmt->execute();
$result = $stmt->get_result();
$recipient = $result->fetch_assoc();
$stmt->close();

if (!$recipient || empty($recipient['perm_email'])) {
    sendResponse('error', 'Recipient email not found for this application.');
}

$email = $recipient['perm_email'];
$subject = 'Lumber Permit Expiration Notification';

// --- cURL Email Sending Logic ---
// This uses your existing email sending service
$emailUrl = 'https://o-ldpms.denr.gov.ph/sendemail/send.php';

$queryParams = http_build_query([
    'send' => 1,
    'email' => $email,
    'Subject' => $subject,
    'message' => $emailMessage,
    'yourname' => 'O-LDPMS'
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $emailUrl . '?' . $queryParams);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Note: Disabling SSL verification is not recommended for production
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Note: Disabling SSL verification is not recommended for production
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

// Check for cURL errors or if the response is empty/false
if ($error || $response === false) {
    sendResponse('error', 'Failed to send notification via email service. cURL error: ' . $error);
} else {
    // Assuming the service returns something on success. Adjust if needed.
    sendResponse('success', 'Notification sent successfully to ' . $email);
}