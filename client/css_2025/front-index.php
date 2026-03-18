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

$perm_email = $lumberApplicationData['perm_email'] ?? '';
$perm_contact = $lumberApplicationData['perm_contact'] ?? '';


// From endorsement_form_for_release table
// Use null coalescing operator for a cleaner check
$date_release = $endorsementData['date'] ?? ""; // Default to empty string if not set


// Using PDO connection object
$title = "Records Unit";
$stmt = $connection->prepare("SELECT Date FROM client_client_document_history WHERE Title = ? AND lumber_app_id = ? LIMIT 1");
if ($stmt === false) {
    error_log("Database Error (client_client_document_history): " . $connection->errorInfo()[2]);
} else {
    $stmt->bindValue(1, $title, PDO::PARAM_STR);
    $stmt->bindValue(2, $lumberAppId, PDO::PARAM_STR);
    $stmt->execute();
    $documentHistory = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($documentHistory && isset($documentHistory['Date'])) {
         $documentHistory['Date'];
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2025 DENR DCSMS Form</title>
    <link rel="stylesheet" href="styleform1.css">
</head>

<body>
    <div class="form-container">
        <div class="form-content">
            <div class="denr-header">
                <div class="header-left">
                    <img src="images/denrlogo.png" alt="DENR Logo" class="denr-logo">
                    <div class="denr-text">
                        <p class="agency">Department of Environment <br> and Natural Resources</p>
                    </div>
                </div>
                <div class="header-right">
                    <img src="images/icon.png" alt="Smiley Icons" class="smiley-icon">
                    <div class="survey-text">
                        <p class="version">| CEBUANO-ENGLISH VERSION</p>
                        <p class="title">DENR CLIENT SATISFACTION<br>MEASUREMENT SURVEY</p>
                        <p class="approval">PSA Approval No. ARTA-2242</p>
                    </div>
                </div>
            </div>

            <div class="help-banner">
                <p class="help-title">TABANGI KAMI NGA MAKAALAGAD NIMO UG MAAYO!</p>
                <p class="help-subtitle">HELP US SERVE YOU BETTER!</p>

                <div class="description-box">
                    <p>
                        <strong>Ang Client Satisfaction Measurement (CSM) nagsubay sa kasinatian sa kustomer sa
                                mga buhatan sa gobyerno. Ang imong feedback sa nakompleto nga transaksyon makatabang sa DENR
                                sa paghatag ug mas
                                maayong serbisyo. Ang imong personal nga impormasyon nga gipaambit pagatipigan nga
                                kompidensyal ug sa kanunay
                                aduna kay kapilian nga dili motubag niini nga porma.
                        </strong>
                        (This Client Satisfaction Measurement (CSM) tracks the customer experience of government
                        offices. Your feedback on your
                        <a href="#" class="underline">recently concluded transaction</a> will help DENR provide a better
                        service. The personal information
                        you share will be kept confidential, and you always have the option to not answer this form.)
                    </p>
                    <div class="form-group">
                        <label for="service" class="form-label">
                            <strong>Serbisyo nga Gikuha</strong><br>
                            <span class="sub-label">(Service Availed)</span>
                        </label>
                        <input type="text" id="service" name="service" value="LUMBER DEALER E-PERMIT" class="form-input">
                    </div>

                    <div class="form-row compact-row">
                        <div class="form-item">
                            <label for="application-date" class="application-date"><strong>Petsa sa
                                        Aplikasyon</strong><br>
                                <span class="sub-label">(Date of Application)</span>
                            </label>
                            <?php
                                // Format the date as "F j, Y" (e.g., January 21, 2025)
                                $formatted_date_applied = '';
                                if (!empty($date_applied) && $date_applied !== 'N/A') {
                                    $timestamp = strtotime($date_applied);
                                    if ($timestamp !== false) {
                                        $formatted_date_applied = date('F j, Y', $timestamp);
                                    }
                                }
                            ?>
                            <input type="text" id="application-date" name="application-date" class="form-short-input1" value="<?php echo htmlspecialchars($formatted_date_applied, ENT_QUOTES, 'UTF-8'); ?>">
                        </div>

                        <div class="form-item">
                            <label for="release-date"><strong>Petsa sa Pagtuman sa Produkto o Serbisyo</strong><br>
                                <span class="sub-label">(Date of Release of Product/Services)</span>
                            </label>
                            <?php
                                // Format the date as "F j, Y" (e.g., January 21, 2025)
                                $formatted_release_date = '';
                                if (isset($documentHistory) && isset($documentHistory['Date']) && !empty($documentHistory['Date'])) {
                                    $timestamp = strtotime($documentHistory['Date']);
                                    if ($timestamp !== false) {
                                        $formatted_release_date = date('F j, Y', $timestamp);
                                    }
                                }
                            ?>
                            <input type="text" id="release-date" name="release-date" class="form-short-input2" value="<?php echo htmlspecialchars($formatted_release_date, ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                    </div>

                    <div class="form-row-between">
                        <label class="label-left">
                            <strong>Ngalan</strong> <span class="sub-label">(Name)</span>
                        </label>

                        <input type="text" class="mid-input" name="client-name" id="client-name" value="<?php echo htmlspecialchars($clientname ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                        <label class="label-right">
                            <strong>Matang sa Kliyente</strong> <span class="sub-label">(Type of Client)</span>
                        </label>
                    </div>

                    <div class="form-row-sex-age">
                        <label class="label-sex">
                            <strong>Kasarian</strong> <span class="sub-label">(Sex)</span>
                        </label>

                        <div class="checksbox">
                            <input
                                style="margin: 5px; width: 20px; height: 20px; accent-color: #28a745;"
                                class="radio__input2"
                                id="radioSexMale"
                                type="radio"
                                name="sex"
                                value="Lalaki"
                                <?php echo (isset($chksexlalaki) && $chksexlalaki == 'Lalaki') ? 'checked' : ''; ?>
                            >
                            <label for="radioSexMale" style="font-size: 16px; text-align: justify; margin-top: 9px; margin-left: 8px;">Lalaki</label>
                        </div>

                        <div class="checksbox">
                            <input
                                style="margin: 5px; width: 20px; height: 20px; accent-color: #28a745;"
                                class="radio__input2"
                                id="radioSexFemale"
                                type="radio"
                                name="sex"
                                value="Babae"
                                <?php echo (isset($chkbabae) && $chkbabae == 'Babae') ? 'checked' : ''; ?>
                            >
                            <label for="radioSexFemale" style="font-size: 16px; text-align: justify; margin-top: 9px; margin-left: 8px;">Babae</label>
                        </div>

                        <label class="label-age">
                            <strong>Edad</strong> <span class="sub-label">(Age)</span>
                        </label>
                        <input type="number" class="age-input" name="edad" id="edad" value="<?php echo htmlspecialchars($edad ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    </div>


                        <div class="client-type-section">

                                
                            <label class="radio-option-lungsuranon">
                                     <!-- <span class="custom-radio-lungsuranon"></span> -->
                                <input 
                                    type="radio"
                                    name="client-type"
                                    value="lungsuranon"
                                    <?php echo (!empty($lungsuranonIndibidwalRepresentante)) ? 'checked' : ''; ?>
                                    style="accent-color: #28a745; width: 20px; height: 20px; margin: 15px; margin-left: -30px; margin-top: 10px;"
                                >
                           
                                <div class="radio-label-lungsuranon">
                                    <strong>Lungsuranon/ Indibidwal/ Representante</strong><br>
                                    <span class="sub-label">(private citizen as transacting public)</span>
                                </div>
                            </label>
                        </div>

                    <div class="form-group email-row-with-radio">
                        <label for="email" class="form-label">
                            <strong>Email address</strong><br>
                            <span class="sub-label">(Optional)</span>
                        </label>

                        <input type="text" id="email" name="email" class="form-input-email" value="<?php echo htmlspecialchars($perm_email ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                        <label class="radio-option-negosyo">
                            <input
                                type="radio"
                                name="client-type"
                                value="negosyo"
                                <?php echo (!empty($negosyoKompanya)) ? 'checked' : ''; ?>
                                style="accent-color: #28a745; width: 20px; height: 20px; margin: 15px; margin-left: -30px; margin-top: 10px;"

                            >
                            <!-- <span class="custom-radio-negosyo"></span> -->
                            <div class="radio-label-negosyo">
                                <strong>Negosyo/ Kompanya</strong><br>
                                <span class="sub-label">(representative of business/company firm)</span>
                            </div>
                        </label>
                    </div>

                    <div class="form-group phone-with-radio">
                        <label for="phone" class="form-label">
                            <strong>Phone/Mobile Number</strong><br>
                            <span class="sub-label">(Optional)</span>
                        </label>
                        <input type="text" id="phone" name="phone" class="form-input-phone">

                        <div class="radio-options-client-type">
                            <label class="radio-option-client">
                                <input
                                    type="radio"
                                    name="client-type"
                                    value="kapunungan"
                                    <?php echo (!empty($myCheckboxnameKapununganPo)) ? 'checked' : ''; ?>
                                style="accent-color: #28a745; width: 20px; height: 20px; margin: 15px; margin-left: 15px; margin-top: 10px;"

                                >
                                <!-- <span class="custom-radio-client"></span> -->
                                <div class="radio-label-client">
                                    <strong>Kapunungan/ PO</strong><br>
                                    <span class="sub-label">(representative of an organization/People's Organization)</span>
                                </div>
                            </label>

                            <label class="radio-option-client">
                                <input
                                    type="radio"
                                    name="client-type"
                                    value="gobyerno"
                                    <?php echo (!empty($myCheckboxnameGobyerno)) ? 'checked' : ''; ?>
                     style="accent-color: #28a745; width: 20px; height: 20px; margin: 15px; margin-left: 15px; margin-top: 10px;"

                                >
                                <!-- <span class="custom-radio-client"></span> -->
                                <div class="radio-label-client">
                                    <strong>Gobyerno</strong><br>
                                    <span class="sub-label">(DENR employee, employee/representative from other
                                        government agencies)</span>
                                </div>
                            </label>

                            <div class="disclaimer-box">
                                <p class="disclaimer-text">
                                    *Pinaagi sa paghatag sa imong impormasyon sa pagkontak, mahimo kang makadawat ug
                                    komunikasyon gikan sa ARTA, SDRMD, o awtorisado nga mga personahe sa DENR sa
                                    pag-validate o pagkumpirma sa imong mga tubag sa survey. Dugang pa, kung adunay
                                    bisan unsang mga reklamo o negatibo nga mga kasinatian, mahimo kang kontakon alang
                                    sa dugang nga mga detalye ug resolusyon bahin sa imong mga kabalaka.
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="green-line-separator"></div>

                    <img src="images/charter.png" class="charter">
                    <img src="images/cc1.png" class="cc1">
                    <img src="images/cc2.png" class="cc2">
                    <img src="images/cc3.png" class="cc3">


                    <div class="panudlo-section">
                        <strong>PANUDLO:</strong> Markahi og tsek <span class="check-icon">(✅)</span> ang imong tubag sa
                        mga pangutana sa Citizen's Charter (CC).<br>
                        <span class="panudlo-translation">
                            (INSTRUCTIONS: Check mark <span class="check-icon">(✅)</span> your answer to the Citizen's
                            Charter (CC) questions.)
                        </span>
                    </div>
                    <div class="question-label">
                        <strong>
                            Hain sa mosunod ang labing maayo nga naghulagway sa imong nahibaloan sa usa ka <br>
                            Citizen's
                            Charter? (Pagpili og usa lang)
                        </strong><br>
                        <span class="question-translation">
                            (Which of the following best describes your awareness of a Citizen’s Charter? (Choose only
                            one))
                        </span>

                        <?php
                            // Determine which option should be checked
                            $citizen_charter_awareness = $clientCssData['citizen_charter_awareness'] ?? null;
                        ?>
                        <label class="custom-radio-option">
                            <input
                                type="radio"
                                name="citizen_charter_awareness"
                                value="1"
                                <?php echo (is_null($citizen_charter_awareness) || $citizen_charter_awareness == '1') ? 'checked' : ''; ?>
                            >
                            <span class="option-box">1</span>
                            <div class="option-text">
                                <span class="cebuano"><strong>Nasayud ko kun unsa ang Citizen's Charter og nakita ko na
                                            niining buhatan.</strong></span><br>
                                <span class="translation">(I know what a Citizen’s Charter is and I saw it in this
                                        office.)</span>
                            </div>
                        </label>

                        <label class="custom-radio-option">
                            <input type="radio" name="citizen_charter_awareness" value="2"
                                <?php echo ($citizen_charter_awareness == '2') ? 'checked' : ''; ?> >
                            <span class="option-box">2</span>
                            <div class="option-text">
                                <span class="cebuano"><strong>Karon lang ko nasayud sa Citizen's Charter pagkakita niini
                                            sa inyong buhatan.</strong></span><br>
                                <span class="translation">(I learned of the Citizen’s Charter only when I saw it in this
                                        office.)</span>
                            </div>
                        </label>


                        <label class="custom-radio-option">
                            <input type="radio" name="citizen_charter_awareness" value="3"
                                <?php echo ($citizen_charter_awareness == '3') ? 'checked' : ''; ?> >
                            <span class="option-box">3</span>
                            <div class="option-text">
                                <span class="cebuano"><strong>Nasayud ko kun unsa ang Citizen's Charter apan wala ko na
                                            makita niiniing buhatan.</strong></span><br>
                                <span class="translation">(I know what a Citizen’s Charter is but I did NOT see it in
                                        this office.)</span>
                            </div>
                        </label>

                        <label class="custom-radio-option">
                            <input type="radio" name="citizen_charter_awareness" value="4"
                                <?php echo ($citizen_charter_awareness == '4') ? 'checked' : ''; ?> >
                            <span class="option-box">4</span>
                            <div class="option-text">
                                <span class="cebuano"><strong>Wala ko nasayud kung unsa ang Citizen's Charter ug wala
                                            pud ako’y nakita niini nga <br> buhatan.</strong></span><br>
                                <span class="translation">(I do not know what a Citizen’s Charter is and I did NOT see
                                        one in this office.)</span>
                            </div>
                        </label>

                    </div>

                    <div class="instruction-note">
                        <div class="icon">!</div>
                        <div class="instruction-text">
                            <strong>Padayon lang sa CC2 ug CC3 kung ang imong tubag sa CC1 kay 1 o 2.</strong><br>
                            <span class="translation">
                                (Proceed only to CC2 and CC3 if your answer in CC1 is 1 or 2.)
                            </span>
                        </div>
                    </div>

                    <div class="question-label">
                        <strong>Unsaon nimo paghulagway ang pagkabutang sa Citizen's Charter niini nga buhatan? (Pagpili
                            og usa lang)</strong><br>
                        <span class="question-translation">
                            (How would you describe the posting of the Citizen’s Charter in this office? (Choose only
                            one))
                        </span>
                    </div>

                    <div class="radio-grid">
                        <?php
                            // Get the value from the database if available
                            $charter_posting = $clientCssData['charter_posting'] ?? '';
                        ?>
                        <label class="radio-item">
                            <input
                                type="radio"
                                name="charter_posting"
                                value="easy"
                                <?php echo (empty($charter_posting) || $charter_posting === 'easy') ? 'checked' : ''; ?>
                            >
                            <div class="option-content">
                                <strong>Dali ra makita-an</strong><br>
                                <span class="translation">(Easy to see)</span>
                            </div>
                        </label>

                        <label class="radio-item">
                            <input type="radio" name="charter_posting" value="somewhat_easy"
                                <?php echo ($charter_posting === 'somewhat_easy') ? 'checked' : ''; ?> >
                            <div class="option-content">
                                <strong>Medyo dali ra makita-an</strong><br>
                                <span class="translation">(Somewhat easy to see)</span>
                            </div>
                        </label>

                        <label class="radio-item">
                            <input type="radio" name="charter_posting" value="difficult"
                                <?php echo ($charter_posting === 'difficult') ? 'checked' : ''; ?> >
                            <div class="option-content">
                                <strong>Lisud makita-an</strong><br>
                                <span class="translation">(Difficult to see)</span>
                            </div>
                        </label>

                        <label class="radio-item">
                            <input type="radio" name="charter_posting" value="not_visible"
                                <?php echo ($charter_posting === 'not_visible') ? 'checked' : ''; ?> >
                            <div class="option-content">
                                <strong>Dili gyud makita-an</strong><br>
                                <span class="translation">(Not visible at all)</span>
                            </div>
                        </label>
                    </div>

                    <div class="question-label">
                        <strong>Unsa ka gamit ang Citizen's Charter sa imong transaksyon? (Pagpili og usa
                            lang)</strong><br>
                        <span class="question-translation">
                            (How helpful is the Citizen’s Charter during your transaction? (Choose only one))
                        </span>
                    </div>

                    <div class="radio-row">
                        <?php
                            // Get the value from the database if available
                            $charter_helpfulness = $clientCssData['charter_helpfulness'] ?? '';
                        ?>
                        <label class="radio-item">
                            <input
                                type="radio"
                                name="charter_helpfulness"
                                value="very_helpful"
                                <?php echo (empty($charter_helpfulness) || $charter_helpfulness === 'very_helpful') ? 'checked' : ''; ?>
                            >
                            <div class="option-content">
                                <strong>Makatabang Kaayo</strong><br>
                                <span class="translation">(Very Helpful)</span>
                            </div>
                        </label>

                        <label class="radio-item">
                            <input type="radio" name="charter_helpfulness" value="somewhat_helpful"
                                <?php echo ($charter_helpfulness === 'somewhat_helpful') ? 'checked' : ''; ?> >
                            <div class="option-content">
                                <strong>Medyo Makatabang</strong><br>
                                <span class="translation">(Somewhat Helpful)</span>
                            </div>
                        </label>

                        <label class="radio-item">
                            <input type="radio" name="charter_helpfulness" value="not_helpful"
                                <?php echo ($charter_helpfulness === 'not_helpful') ? 'checked' : ''; ?> >
                            <div class="option-content">
                                <strong>Dili makatabang</strong><br>
                                <span class="translation">(Not helpful)</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

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