
<?php
if (isset($_GET['inputString'])) {
    // Sanitize the input string
    $inputString = urlencode($_GET['inputString']);

    // Build the URL
    $url = "http://222.127.109.129:8080/LBP-LinkBiz-RS/rs/echo/{$inputString}";

    // Perform the GET request
    $response = file_get_contents($url);

    // Display the response
    echo "<p>Response:</p>";
    echo "<pre>" . htmlspecialchars($response) . "</pre>";
} else {
    echo "Please enter a string.";
}
?>



<?php
$urlA = "http://58.71.22.7/testegps/portal/index.jsp";
$urlB = "http://222.127.109.129:8080/LBP-LinkBiz-RS/rs/echo/hello";

// Function to check URL accessibility
function checkURL($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $httpCode;
}

// Check URL A
$httpCodeA = checkURL($urlA);
echo "URL A HTTP Code: $httpCodeA<br>";

// Check URL B
$httpCodeB = checkURL($urlB);
echo "URL B HTTP Code: $httpCodeB<br>";
?>
