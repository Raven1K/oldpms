<?php
// Initialize the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the database configuration
// This file should contain the PDO connection setup, e.g., $connection = new PDO(...);
require_once "../../processphp/config.php";

// Check if lumber_app_id is provided in the URL and is not empty
if (!isset($_GET['lumber_app_id']) || empty($_GET['lumber_app_id'])) {
    // It's better to exit with a clear error message or redirect
    die("Error: Lumber Application ID is missing or empty.");
}

// Sanitize and get the lumber_app_id from the URL.
// Using filter_var with FILTER_SANITIZE_FULL_SPECIAL_CHARS is a good practice.
$lumberAppId = filter_var($_GET['lumber_app_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Initialize variables to hold fetched data
$clientCssData = [];
$lumberApplicationData = [];
$endorsementData = [];

try {
    // 1. Fetch data from client_css table
    $stmt = $connection->prepare("SELECT * FROM client_css WHERE lumber_app_id = :lumber_app_id");
    $stmt->bindParam(":lumber_app_id", $lumberAppId, PDO::PARAM_STR);
    $stmt->execute();
    $clientCssData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$clientCssData) {
        die("No client CSS record found for this lumber application ID.");
    }

    // 2. Fetch data from lumber_application table
    $stmt = $connection->prepare("SELECT * FROM lumber_application WHERE lumber_app_id = :lumber_app_id");
    $stmt->bindParam(":lumber_app_id", $lumberAppId, PDO::PARAM_STR);
    $stmt->execute();
    $lumberApplicationData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$lumberApplicationData) {
        die("No lumber application record found for this ID.");
    }

    // 3. Fetch data from endorsement_form_for_release table
    $stmt = $connection->prepare("SELECT * FROM endorsement_form_for_release WHERE lumber_app_id = :lumber_app_id");
    $stmt->bindParam(":lumber_app_id", $lumberAppId, PDO::PARAM_STR);
    $stmt->execute();
    $endorsementData = $stmt->fetch(PDO::FETCH_ASSOC);
    // No need to die if endorsement data is not found, as it might be optional

} catch (PDOException $e) {
    // Log the database error for debugging purposes
    error_log("Database Error: " . $e->getMessage());
    // Display a generic error message to the user
    die("An unexpected error occurred. Please try again later or contact support.");
}

// --- Assign variables from the fetched data ---

// From client_css table
$responsiveness = $clientCssData['responsiveness'] ?? null;
$responsiveness1 = $clientCssData['responsiveness1'] ?? null;
$rq = $clientCssData['Rq'] ?? null;
$rq1 = $clientCssData['Rq1'] ?? null;
$rq2 = $clientCssData['Rq2'] ?? null;
$af = $clientCssData['af'] ?? null;
$af1 = $clientCssData['af1'] ?? null;
$co = $clientCssData['co'] ?? null;
$co1 = $clientCssData['co1'] ?? null;
$co2 = $clientCssData['co2'] ?? null;
$cosS = $clientCssData['cos_s'] ?? null;
$int1In = $clientCssData['int1_in'] ?? null;
$assu = $clientCssData['assu'] ?? null;
$outc = $clientCssData['outc'] ?? null;
$suggestionsComments = $clientCssData['Suggestions_Comments'] ?? null;
$dateOfApplication = $clientCssData['Date_of_Application'] ?? null;
$lungsuranonIndibidwalRepresentante = $clientCssData['Lungsuranon_Indibidwal_Representante'] ?? null;
$negosyoKompanya = $clientCssData['Negosyo_Kompanya'] ?? null;
$myCheckboxnameKapununganPo = $clientCssData['myCheckboxname_Kapunungan_PO'] ?? null;
$chksexlalaki = $clientCssData['chksexlalaki'] ?? null;
$chkbabae = $clientCssData['chkbabae'] ?? null;
$myCheckboxnameGobyerno = $clientCssData['myCheckboxname_gobyerno'] ?? null;
$edad = $clientCssData['Edad'] ?? null;
$myCheckboxnamesGitugotan = $clientCssData['myCheckboxnames_Gitugotan'] ?? null;

// From lumber_application table
$date_applied = $lumberApplicationData['date_applied'] ?? 'N/A';
$clientname = ($lumberApplicationData['perm_fname'] ?? '') . ' ' . ($lumberApplicationData['perm_lname'] ?? '');
$control_number = 'R1300-' . ($lumberApplicationData['lumber_app_id'] ?? 'N/A');

// From endorsement_form_for_release table
// Use null coalescing operator for a cleaner check
$date_release = $endorsementData['date'] ?? ""; // Default to empty string if not set

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2025 DENR CSMS Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-container">
        <!-- Instructions Section -->
        <div class="form-content">
            <div class="instructions-container">
                <div class="instructions-block">
                    <img src="images/iconlogo.png" alt="Info Icon" class="info-icon">
                    <div class="text-block">
                        <h2 class="form-title">PANUDLO:</h2>
                        <p class="instructions">
                            Palihug ipakita kon unsa ka hugot ang <br>
                            imong pag-uyon o dili pag-uyon sa <br>
                            tanan nga mosunod nga mga pahayag <br>
                            pinaagi sa paglandong o tsek sa lingin <br>
                            gikan sa 'hugot nga pagsupak' ngadto sa <br>
                            'hugot nga pag-uyon'.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Rating Scale -->
            <div class="rating-scale">
                <div class="scale-item">
                    <div class="circle">
                        <img src="images/smile1.png" alt="Strongly Disagree" class="icon1">
                    </div>
                    <div class="label">
                        HUGOT NGA<br>PAGSUPAK<br>(STRONGLY<br>DISAGREE)
                    </div>
                </div>

                <div class="scale-item">
                    <div class="circle">
                        <img src="images/smile2.png" alt="Disagree" class="icon2">
                    </div>
                    <div class="label">PAGSUPAK<br>(DISAGREE)</div>
                </div>

                <div class="scale-item">
                    <div class="circle">
                        <img src="images/smile3.png" alt="Neutral" class="icon3">
                    </div>
                    <div class="label">
                        DILI SEGURADO<br>(NEITHER AGREE<br>NOR DISAGREE)
                    </div>
                </div>

                <div class="scale-item">
                    <div class="circle">
                        <img src="images/smile4.png" alt="Agree" class="icon4">
                    </div>
                    <div class="label">PAG-UYON<br>(AGREE)</div>
                </div>

                <div class="scale-item">
                    <div class="circle">
                        <img src="images/smile5.png" alt="Strongly Agree" class="icon5">
                    </div>
                    <div class="label">
                        HUGOT NGA<br>PAG-UYON<br>(STRONGLY<br>AGREE)
                    </div>
                </div>
            </div>
        </div>

        <!-- Questionnaire -->
        <div class="questionnaire">
            <!-- Question Template (repeated for each question) -->
            <div class="question">
                <div class="question-row">
                    <div class="question-text">
                        <h3 class="question-title" style="color: #000; text-decoration: underline;">
                            <strong>Responsiveness</strong>
                        </h3>
                        <p class="statement">
                            Nag gahin ako og igo nga oras alang sa akong transaksyon.
                            <span class="translation">
                                (I spent a reasonable amount of time for my transaction.)
                            </span>
                        </p>
                    </div>

                    <div class="choices">
                        <label><input type="radio" name="responsiveness" value="1" id="flexRadioDefault1" <?php echo ($responsiveness == 1) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="responsiveness" value="2" id="flexRadioDefault2" <?php echo ($responsiveness == 2) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="responsiveness" value="3" id="flexRadioDefault3" <?php echo ($responsiveness == 3) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="responsiveness" value="4" id="flexRadioDefault4" <?php echo ($responsiveness == 4) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="responsiveness" value="5" id="flexRadioDefault5" <?php echo ($responsiveness == 5) ? 'checked' : ''; ?>></label>

                        <label class="na-box">
                            <span>N/A</span>
                            <input type="checkbox" name="responsiveness_na">
                        </label>
                    </div>
                    <div class="green-line"></div>
                </div>
            </div>

            <div class="question">
                <div class="question-row">
                    <div class="question-text">
                        <div class="question-title" style="color: #000; text-decoration: underline;">
                            <strong>Reliability</strong>
                        </div>
                        <div class="statement">
                            Gisunod niini nga buhatan ang mga kinahanglanon ug lakang sa <br> transaksyon base sa
                            gihatag nga
                            impormasyon.
                            <span class="translation">(The office followed the transaction’s requirements and steps <br>
                                based on the information provided.)</span>
                        </div>
                    </div>

                    <div class="choices">
                        <label><input type="radio" name="reliability" value="1" id="reliability1" <?php echo ($rq == 1) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="reliability" value="2" id="reliability2" <?php echo ($rq == 2) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="reliability" value="3" id="reliability3" <?php echo ($rq == 3) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="reliability" value="4" id="reliability4" <?php echo ($rq == 4) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="reliability" value="5" id="reliability5" <?php echo ($rq == 5) ? 'checked' : ''; ?>></label>
                        <label class="na-box">
                            <span>N/A</span>
                            <input type="checkbox">
                        </label>
                    </div>
                </div>
                <div class="green-line"></div> <!-- ✅ Add this -->
            </div>

            <div class="question">
                <div class="question-row">
                    <div class="question-text">
                        <div class="question-title" style="color: #000; text-decoration: underline;"><strong>Access and
                                Facilities</strong></div>
                        <div class="statement">
                            Sayon ug yano ang mga lakang (lakip ang pagbayad) nga <br> kinahanglan nakong buhaton alang
                            sa
                            akong transaksyon.
                            <span class="translation">(The steps (including payment) I needed to do for my transaction
                                <br>
                                were easy and simple.)</span>
                        </div>
                    </div>

                    <div class="choices">
                        <label><input type="radio" name="access" value="1" id="access1" <?php echo ($af == 1) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="access" value="2" id="access2" <?php echo ($af == 2) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="access" value="3" id="access3" <?php echo ($af == 3) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="access" value="4" id="access4" <?php echo ($af == 4) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="access" value="5" id="access5" <?php echo ($af == 5) ? 'checked' : ''; ?>></label>
                        <label class="na-box">
                            <span>N/A</span>
                            <input type="checkbox">
                        </label>
                    </div>
                    <div class="green-line"></div>
                </div>
            </div>

            <div class="question">
                <div class="question-row">
                    <div class="question-text">
                        <div class="question-title" style="color: #000; text-decoration: underline;">
                            <strong>Communication</strong>
                        </div>
                        <div class="statement">
                            Dali ra nakong nakit-an ang impormasyon bahin sa akong <br> transaksyon gikan sa buhatan o
                            sa
                            website niini.
                            <span class="translation">(I easily found information about my transaction from the office
                                <br>
                                or its website.)</span>
                        </div>
                    </div>

                    <div class="choices">
                        <label><input type="radio" name="communication" value="1" id="communication1" <?php echo ($co == 1) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="communication" value="2" id="communication2" <?php echo ($co == 2) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="communication" value="3" id="communication3" <?php echo ($co == 3) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="communication" value="4" id="communication4" <?php echo ($co == 4) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="communication" value="5" id="communication5" <?php echo ($co == 5) ? 'checked' : ''; ?>></label>
                        <label class="na-box">
                            <span>N/A</span>
                            <input type="checkbox">
                        </label>
                    </div>
                    <div class="green-line"></div>
                </div>
            </div>

            <div class="question">
                <div class="question-row">
                    <div class="question-text">
                        <div class="question-title" style="color: #000; text-decoration: underline;">
                            <strong>Cost</strong>
                        </div>
                        <div class="statement">
                            Nagbayad ako og makatarunganon nga kantidad sa mga <br> bayronon alang sa akong transaksyon.
                            <span class="translation">(I paid a reasonable amount of fees for my
                                transaction.)</span><br>
                            <span class="translation" style="font-style: italic;">
                                (<a href="#" style="color: #000; text-decoration: underline;">If service was free, mark
                                    the ‘N/A’ column</a>)
                            </span>
                        </div>
                    </div>

                    <div class="choices">
                        <label><input type="radio" name="cost" value="1" id="cost1" <?php echo ($cosS == 1) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="cost" value="2" id="cost2" <?php echo ($cosS == 2) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="cost" value="3" id="cost3" <?php echo ($cosS == 3) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="cost" value="4" id="cost4" <?php echo ($cosS == 4) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="cost" value="5" id="cost5" <?php echo ($cosS == 5) ? 'checked' : ''; ?>></label>
                        <label class="na-box">
                            <span>N/A</span>
                            <input type="checkbox">
                        </label>
                    </div>
                    <div class="green-line"></div>
                </div>
            </div>

            <div class="question">
                <div class="question-row">
                    <div class="question-text">
                        <div class="question-title" style="color: #000; text-decoration: underline;">
                            <strong>Integrity</strong>
                        </div>
                        <div class="statement">
                            Nahiaguman nako nga ang kining buhatan patas sa tanan, o <br> "walang palakasan", sa akong
                            transaksyon.
                            <span class="translation">(I feel the office was fair to everyone, or “walang palakasan”,
                                <br>
                                during my transaction.)</span>
                        </div>
                    </div>

                    <div class="choices">
                        <label><input type="radio" name="integrity" value="1" id="integrity1" <?php echo ($int1In == 1) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="integrity" value="2" id="integrity2" <?php echo ($int1In == 2) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="integrity" value="3" id="integrity3" <?php echo ($int1In == 3) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="integrity" value="4" id="integrity4" <?php echo ($int1In == 4) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="integrity" value="5" id="integrity5" <?php echo ($int1In == 5) ? 'checked' : ''; ?>></label>
                        <label class="na-box">
                            <span>N/A</span>
                            <input type="checkbox">
                        </label>
                    </div>
                    <div class="green-line"></div>
                </div>
            </div>

            <div class="question">
                <div class="question-row">
                    <div class="question-text">
                        <div class="question-title" style="color: #000; text-decoration: underline;">
                            <strong>Assurance</strong>
                        </div>
                        <div class="statement">
                            Matinahuron akong gitagad og gitratar sa mga kawani.
                            <span class="translation">(I was treated courteously by the staff, and (if asked for help)
                                the <br> staff was helpful.)</span>
                        </div>
                    </div>

                    <div class="choices">
                        <label><input type="radio" name="assurance" value="1" id="assurance1" <?php echo ($assu == 1) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="assurance" value="2" id="assurance2" <?php echo ($assu == 2) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="assurance" value="3" id="assurance3" <?php echo ($assu == 3) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="assurance" value="4" id="assurance4" <?php echo ($assu == 4) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="assurance" value="5" id="assurance5" <?php echo ($assu == 5) ? 'checked' : ''; ?>></label>
                        <label class="na-box">
                            <span>N/A</span>
                            <input type="checkbox">
                        </label>
                    </div>
                    <div class="green-line"></div>
                </div>
            </div>

            <div class="question">
                <div class="question-row">
                    <div class="question-text">
                        <div class="question-title" style="color: #000; text-decoration: underline;">
                            <strong>Outcome</strong>
                        </div>
                        <div class="statement">
                            Nakuha nako ang akong gikinahanglan gikan niining buhatan.
                            <span class="translation">(I got what I needed from the government office, or (if denied)
                                <br>
                                denial of request was sufficiently explained to me.)</span>
                        </div>
                    </div>

                    <div class="choices">
                        <label><input type="radio" name="outcome" value="1" id="outcome1" <?php echo ($outc == 1) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="outcome" value="2" id="outcome2" <?php echo ($outc == 2) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="outcome" value="3" id="outcome3" <?php echo ($outc == 3) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="outcome" value="4" id="outcome4" <?php echo ($outc == 4) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="outcome" value="5" id="outcome5" <?php echo ($outc == 5) ? 'checked' : ''; ?>></label>
                        <label class="na-box">
                            <span>N/A</span>
                            <input type="checkbox">
                        </label>
                    </div>
                    <div class="green-line"></div>
                </div>
            </div>

            <div class="question">
                <div class="question-row">
                    <div class="question-text">
                        <div class="statement">
                            <strong>Nakontento ako sa serbisyo nga akong nadawat.</strong><br>
                            <span class="translation">(I am satisfied with the service that I availed.)</span><br>
                        </div>
                    </div>

                    <div class="choices">
                        <label><input type="radio" name="satisfaction" value="1" id="satisfaction1" <?php echo (isset($outc) && $outc == 1) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="satisfaction" value="2" id="satisfaction2" <?php echo (isset($outc) && $outc == 2) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="satisfaction" value="3" id="satisfaction3" <?php echo (isset($outc) && $outc == 3) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="satisfaction" value="4" id="satisfaction4" <?php echo (isset($outc) && $outc == 4) ? 'checked' : ''; ?>></label>
                        <label><input type="radio" name="satisfaction" value="5" id="satisfaction5" <?php echo (isset($outc) && $outc == 5) ? 'checked' : ''; ?>></label>
                        <label class="na-box">
                            <span>N/A</span>
                            <input type="checkbox">
                        </label>
                    </div>
                </div>
            </div>

        </div>

        <!-- Suggestion Box -->
        <div class="suggestion-box">
            <h3 class="suggestion-header">Suggestions/Comments</h3>
            <div class="suggestion-content">
                <div class="suggestion-text">
                    <strong>
                        Aron mapalambo pa ang among mga serbisyo, palihug <br>
                        sa paghatag ug bisan unsang mga sugyot o komento <br>
                        kabahin sa serbisyo nga nadawat.
                    </strong>
                    <span class="translation">
                        (Please provide suggestions, comments, or concerns regarding <br>
                        the service received so that we can improve our services further.)
                    </span>
                </div>
                <div class="suggestion-input">
                    <textarea name="suggestions" rows="4" readonly><?php echo htmlspecialchars($suggestionsComments); ?></textarea>
                </div>
            </div>
        </div>

        <!-- Form Footer -->
        <div class="top-form-box">
            <div class="left-box">
                <span class="authorized-label">
                    for DENR authorized personnel only
                </span>
        
                <div class="form-details-offset">
                    <strong>Control Number</strong>
                    <br>
                    <input type="text" class="controlnumber-input" name="control_number" value="<?php echo $control_number; ?>" readonly>
                    <br><br>
                    <strong>2025 DENR CSMS Form</strong>
                    <br>
                    <span class="translation">Version 1 (January 2025)</span>
                </div>
            </div>

            <div class="right-box">
                <strong>Data Privacy Consent</strong>
                <p class="privacy-text">
                    Pinaagi sa akong pagpirma, akong gitugutan ang DENR sa pagkolekta, pagproseso, pagpadala ug pagtipig
                    sa mga datos nga gihatag dinhi ubos sa mga lagda ug regulasyon nga gitakda sa Republic Act No.
                    10173, o nailhan nga Data Privacy Act of 2012.
                    (By affixing my signature, I hereby consent DENR to collect, process, transmit and store the
                    data provided herein subject to the rules and regulations set by Republic Act No. 10173, otherwise
                    known as the Data Privacy Act of 2012.)
                </p>
                <div style="text-align: center; font-weight: bold;">
                    <input type="text" class="signature-input" name="signature" value="<?php echo $clientname; ?>" readonly>
                </div>
                <p class="translation">Pangalan ug Pirma (Name and Signature)</p>
            </div>
        </div>
    </div>
</body>


<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add a screenshot button to the page
    const buttonContainer = document.createElement('div');
    buttonContainer.style.position = 'fixed';
    buttonContainer.style.bottom = '20px';
    buttonContainer.style.right = '20px';
    buttonContainer.style.zIndex = '1000';

    const screenshotButton = document.createElement('button');
    screenshotButton.textContent = 'Take Screenshot';
    screenshotButton.style.padding = '10px 15px';
    screenshotButton.style.backgroundColor = '#28a745';
    screenshotButton.style.color = 'white';
    screenshotButton.style.border = 'none';
    screenshotButton.style.borderRadius = '5px';
    screenshotButton.style.cursor = 'pointer';

    buttonContainer.appendChild(screenshotButton);
    document.body.appendChild(buttonContainer);

    // Screenshot functionality
    screenshotButton.addEventListener('click', function() {
        // Store original body zoom level
        const originalZoom = document.body.style.zoom;
        
        // Temporarily reset zoom to ensure proper rendering
        document.body.style.zoom = '100%';
        
        // Target the form container for screenshot
        const element = document.querySelector('.form-container');
        
        // Options for html2canvas
        const options = {
            scale: 2, // Higher scale for better quality
            allowTaint: true,
            backgroundColor: null,
            logging: false // Disable logging
        };
        
        // Take screenshot with loading indicator
        screenshotButton.disabled = true;
        screenshotButton.textContent = 'Creating screenshot...';
        
        html2canvas(element, options).then(canvas => {
            // Create an image from the canvas
            const image = canvas.toDataURL('image/png');
            
            // Create a download link
            const link = document.createElement('a');
            link.download = 'DENR_Form_Screenshot_' + new Date().toISOString().slice(0,10) + '.png';
            link.href = image;
            link.click();
            
            // Restore original zoom
            document.body.style.zoom = originalZoom;
            
            // Reset button
            screenshotButton.disabled = false;
            screenshotButton.textContent = 'Take Screenshot';
        }).catch(error => {
            console.error('Screenshot failed:', error);
            alert('Failed to create screenshot. Please try again.');
            
            // Restore original zoom
            document.body.style.zoom = originalZoom;
            
            // Reset button
            screenshotButton.disabled = false;
            screenshotButton.textContent = 'Take Screenshot';
        });
    });
});
</script>


</html>