<?php
// Initialize the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
     header("location: ../login.php");
    exit;



}

// Include the database configuration
require_once "../../processphp/config.php";

// Check if lumber_app_id is provided in the URL and is not empty
if (!isset($_GET['lumber_app_id']) || empty($_GET['lumber_app_id'])) {
    die("Error: Lumber Application ID is missing or empty.");
} else {
    // Sanitize and get the lumber_app_id from the URL.
    $lumberAppId = filter_var($_GET['lumber_app_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Initialize variables to hold fetched data
    $clientCssData = [];
    $lumberApplicationData = [];
    $endorsementData = [];
    $documentHistory = [];

    try {
        // 1. Fetch data from client_css table
        $stmt = $connection->prepare("SELECT * FROM client_css WHERE lumber_app_id = :lumber_app_id");
        $stmt->bindParam(":lumber_app_id", $lumberAppId, PDO::PARAM_STR);
        $stmt->execute();
        $clientCssData = $stmt->fetch(PDO::FETCH_ASSOC);

        // If no client CSS record, just continue (do not die)
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

        // 4. Fetch data from client_client_document_history table
        $title = "Records Unit";
        $stmt = $connection->prepare("SELECT Date FROM client_client_document_history WHERE Title = ? AND lumber_app_id = ? LIMIT 1");
        if ($stmt === false) {
            error_log("Database Error (client_client_document_history): " . $connection->errorInfo()[2]);
        } else {
            $stmt->bindValue(1, $title, PDO::PARAM_STR);
            $stmt->bindValue(2, $lumberAppId, PDO::PARAM_STR);
            $stmt->execute();
            $documentHistory = $stmt->fetch(PDO::FETCH_ASSOC);
        }

    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        die("An unexpected error occurred. Please try again later or contact support.");
    }

    // --- Assign variables from the fetched data ---

    // From client_css table
    $responsiveness = $clientCssData['responsiveness'] ?? null;
    $rq = $clientCssData['Rq'] ?? null;
    $af = $clientCssData['af'] ?? null;
    $co = $clientCssData['co'] ?? null;
    $cosS = $clientCssData['cos_s'] ?? null;
    $int1In = $clientCssData['int1_in'] ?? null;
    $assu = $clientCssData['assu'] ?? null;
    $outc = $clientCssData['outc'] ?? null;
    $suggestionsComments = $clientCssData['Suggestions_Comments'] ?? null;
    $lungsuranonIndibidwalRepresentante = $clientCssData['Lungsuranon_Indibidwal_Representante'] ?? null;
    $negosyoKompanya = $clientCssData['Negosyo_Kompanya'] ?? null;
    $myCheckboxnameKapununganPo = $clientCssData['myCheckboxname_Kapunungan_PO'] ?? null;
    $chksexlalaki = $clientCssData['chksexlalaki'] ?? null;
    $chkbabae = $clientCssData['chkbabae'] ?? null;
    $myCheckboxnameGobyerno = $clientCssData['myCheckboxname_gobyerno'] ?? null;
    $edad = $clientCssData['Edad'] ?? null;
    $citizen_charter_awareness = $clientCssData['citizen_charter_awareness'] ?? null;
    $charter_posting = $clientCssData['charter_posting'] ?? '';
    $charter_helpfulness = $clientCssData['charter_helpfulness'] ?? '';

    // From lumber_application table
    $date_applied = $lumberApplicationData['date_applied'] ?? 'N/A';
    $clientname = ($lumberApplicationData['perm_fname'] ?? '') . ' ' . ($lumberApplicationData['perm_lname'] ?? '');
    $control_number = 'R1300-' . ($lumberApplicationData['lumber_app_id'] ?? 'N/A');
    $perm_email = $lumberApplicationData['perm_email'] ?? '';
    $perm_contact = $lumberApplicationData['perm_contact'] ?? '';

    // From endorsement_form_for_release table
    // From lumber_application table
    $date_applied = $lumberApplicationData['date_applied'] ?? 'N/A';
    $clientname = ($lumberApplicationData['perm_fname'] ?? '') . ' ' . ($lumberApplicationData['perm_lname'] ?? '');
    $control_number = 'R1300-' . ($lumberApplicationData['lumber_app_id'] ?? 'N/A');
    $perm_email = $lumberApplicationData['perm_email'] ?? '';
    $perm_contact = $lumberApplicationData['perm_contact'] ?? '';

    // From endorsement_form_for_release table
    $date_release = $endorsementData['date'] ?? "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DENR Client Satisfaction Survey</title>
    <link rel="stylesheet" href="styleOne.css">
</head>
<body>

    <div class="form-container">
        <form id="multiStepForm">
            <div class="form-section" id="section1">

                <div id="front-page">
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
                                <input type="hidden" name="lumber_app_id" value="<?php echo htmlspecialchars($lumberAppId, ENT_QUOTES, 'UTF-8'); ?>">   

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
                                <input type="text" id="phone" name="phone" class="form-input-phone" value="<?php echo htmlspecialchars($perm_contact ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                                <div class="radio-options-client-type">
                                    <label class="radio-option-client">
                                        <input
                                            type="radio"
                                            name="client-type"
                                            value="kapunungan"
                                            <?php echo (!empty($myCheckboxnameKapununganPo)) ? 'checked' : ''; ?>
                                        style="accent-color: #28a745; width: 20px; height: 20px; margin: 15px; margin-left: 15px; margin-top: 10px;"

                                        >
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

            <div class="form-section" id="section2" style="display:none;">

                <hr style="border: 2px solid white; margin: 30px 0;">

                <div id="back-page">
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

                    <div class="questionnaire">
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
                                    <label><input type="radio" name="responsiveness" value="1" id="flexRadioDefault1" <?php echo (isset($responsiveness) && $responsiveness == 1) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="responsiveness" value="2" id="flexRadioDefault2" <?php echo (isset($responsiveness) && $responsiveness == 2) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="responsiveness" value="3" id="flexRadioDefault3" <?php echo (isset($responsiveness) && $responsiveness == 3) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="responsiveness" value="4" id="flexRadioDefault4" <?php echo (isset($responsiveness) && $responsiveness == 4) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="responsiveness" value="5" id="flexRadioDefault5" <?php echo (isset($responsiveness) && $responsiveness == 5) ? 'checked' : ''; ?>></label>

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
                                    <label><input type="radio" name="reliability" value="1" id="reliability1" <?php echo (isset($rq) && $rq == 1) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="reliability" value="2" id="reliability2" <?php echo (isset($rq) && $rq == 2) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="reliability" value="3" id="reliability3" <?php echo (isset($rq) && $rq == 3) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="reliability" value="4" id="reliability4" <?php echo (isset($rq) && $rq == 4) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="reliability" value="5" id="reliability5" <?php echo (isset($rq) && $rq == 5) ? 'checked' : ''; ?>></label>
                                    <label class="na-box">
                                        <span>N/A</span>
                                        <input type="checkbox">
                                    </label>
                                </div>
                            </div>
                            <div class="green-line"></div> </div>

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
                                    <label><input type="radio" name="access" value="1" id="access1" <?php echo (isset($af) && $af == 1) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="access" value="2" id="access2" <?php echo (isset($af) && $af == 2) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="access" value="3" id="access3" <?php echo (isset($af) && $af == 3) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="access" value="4" id="access4" <?php echo (isset($af) && $af == 4) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="access" value="5" id="access5" <?php echo (isset($af) && $af == 5) ? 'checked' : ''; ?>></label>
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
                                    <label><input type="radio" name="communication" value="1" id="communication1" <?php echo (isset($co) && $co == 1) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="communication" value="2" id="communication2" <?php echo (isset($co) && $co == 2) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="communication" value="3" id="communication3" <?php echo (isset($co) && $co == 3) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="communication" value="4" id="communication4" <?php echo (isset($co) && $co == 4) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="communication" value="5" id="communication5" <?php echo (isset($co) && $co == 5) ? 'checked' : ''; ?>></label>
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
                                    <label><input type="radio" name="cost" value="1" id="cost1" <?php echo (isset($cosS) && $cosS == 1) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="cost" value="2" id="cost2" <?php echo (isset($cosS) && $cosS == 2) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="cost" value="3" id="cost3" <?php echo (isset($cosS) && $cosS == 3) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="cost" value="4" id="cost4" <?php echo (isset($cosS) && $cosS == 4) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="cost" value="5" id="cost5" <?php echo (isset($cosS) && $cosS == 5) ? 'checked' : ''; ?>></label>
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
                                    <label><input type="radio" name="integrity" value="1" id="integrity1" <?php echo (isset($int1In) && $int1In == 1) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="integrity" value="2" id="integrity2" <?php echo (isset($int1In) && $int1In == 2) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="integrity" value="3" id="integrity3" <?php echo (isset($int1In) && $int1In == 3) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="integrity" value="4" id="integrity4" <?php echo (isset($int1In) && $int1In == 4) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="integrity" value="5" id="integrity5" <?php echo (isset($int1In) && $int1In == 5) ? 'checked' : ''; ?>></label>
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
                                    <label><input type="radio" name="assurance" value="1" id="assurance1" <?php echo (isset($assu) && $assu == 1) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="assurance" value="2" id="assurance2" <?php echo (isset($assu) && $assu == 2) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="assurance" value="3" id="assurance3" <?php echo (isset($assu) && $assu == 3) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="assurance" value="4" id="assurance4" <?php echo (isset($assu) && $assu == 4) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="assurance" value="5" id="assurance5" <?php echo (isset($assu) && $assu == 5) ? 'checked' : ''; ?>></label>
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
                                    <label><input type="radio" name="outcome" value="1" id="outcome1" <?php echo (isset($outc) && $outc == 1) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="outcome" value="2" id="outcome2" <?php echo (isset($outc) && $outc == 2) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="outcome" value="3" id="outcome3" <?php echo (isset($outc) && $outc == 3) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="outcome" value="4" id="outcome4" <?php echo (isset($outc) && $outc == 4) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="outcome" value="5" id="outcome5" <?php echo (isset($outc) && $outc == 5) ? 'checked' : ''; ?>></label>
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
                                    <label><input type="radio" name="satisfaction" value="1" id="satisfaction1" <?php echo (isset($outc) && $outc !== null && $outc == 1) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="satisfaction" value="2" id="satisfaction2" <?php echo (isset($outc) && $outc !== null && $outc == 2) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="satisfaction" value="3" id="satisfaction3" <?php echo (isset($outc) && $outc !== null && $outc == 3) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="satisfaction" value="4" id="satisfaction4" <?php echo (isset($outc) && $outc !== null && $outc == 4) ? 'checked' : ''; ?>></label>
                                    <label><input type="radio" name="satisfaction" value="5" id="satisfaction5" <?php echo (isset($outc) && $outc !== null && $outc == 5) ? 'checked' : ''; ?>></label>
                                    <label class="na-box">
                                        <span>N/A</span>
                                        <input type="checkbox">
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

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
                                <textarea name="suggestions" rows="4"><?php echo isset($suggestionsComments) ? htmlspecialchars($suggestionsComments) : ''; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="top-form-box">
                        <div class="left-box">
                            <span class="authorized-label">
                                for DENR authorized personnel only
                            </span>

                            <div class="form-details-offset">
                                <strong>Control Number</strong>
                                <br>
                                <input type="text" class="controlnumber-input" name="control_number" value="<?php echo isset($control_number) ? $control_number : ''; ?>" readonly>
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
                                <input type="text" class="signature-input" name="signature" value="<?php echo isset($clientname) ? $clientname : ''; ?>" readonly>
                            </div>
                            <p class="translation">Pangalan ug Pirma (Name and Signature)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-navigation">
                <button type="button" id="prevBtn">Previous</button>
                <button type="button" id="nextBtn">Next</button>
                <button type="submit" id="submitBtn" style="display:none;">Submit</button>
            </div>
        </form>
    </div>


    <div id="toast-container" class="toast-container">
        <div id="toast-message" class="toast-message"></div>
    </div>

   <script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentSection = 0;
        const sections = document.querySelectorAll('.form-section');
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        const submitBtn = document.getElementById('submitBtn');
        const form = document.getElementById('multiStepForm');
        const toastMessage = document.getElementById('toast-message');

        function showSection(index) {
            sections.forEach((section, i) => {
                section.style.display = (i === index) ? 'block' : 'none';
            });
            prevBtn.style.display = (index === 0) ? 'none' : 'inline-block';
            nextBtn.style.display = (index === sections.length - 1) ? 'none' : 'inline-block';
            submitBtn.style.display = (index === sections.length - 1) ? 'inline-block' : 'none';
        }

        // Toast notifications
        function showToast(message, type) {
            toastMessage.textContent = message;
            toastMessage.className = 'toast-message show ' + type;
            setTimeout(() => {
                toastMessage.className = 'toast-message';
            }, 3000);
        }

        // ✅ Validation function for current section
        function validateCurrentSection() {
            const currentSectionDiv = sections[currentSection];
            const questionGroups = currentSectionDiv.querySelectorAll('.question-row');

            for (const group of questionGroups) {
                const radioInput = group.querySelector('input[type="radio"]:checked');
                const naCheckbox = group.querySelector('input[type="checkbox"]:checked');

                if (!radioInput && !naCheckbox) {
                    showToast('Please answer all questions before proceeding.', 'error');
                    return false;
                }
            }

            // 🔒 Extra validation for Section 1 (Form 1)
            if (currentSection === 0) {
                const inputs = currentSectionDiv.querySelectorAll('input[required], select[required], textarea[required]');
                for (const input of inputs) {
                    if (!input.value.trim()) {
                        showToast('Please complete all required fields in Form 1.', 'error');
                        return false;
                    }
                }
            }

            return true;
        }

        // Next button handler
        nextBtn.addEventListener('click', function() {
            if (validateCurrentSection()) {
                if (currentSection < sections.length - 1) {
                    currentSection++;
                    showSection(currentSection);
                }
            }
        });

        // Previous button handler
        prevBtn.addEventListener('click', function() {
            if (currentSection > 0) {
                currentSection--;
                showSection(currentSection);
            }
        });

        // Submit handler
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Re-check validation before submission
            if (!validateCurrentSection()) {
                return;
            }

            const formData = new FormData(form);
            const data = {};
            for (const [key, value] of formData.entries()) {
                data[key] = value;
            }

            // ✅ Refined fetch with backend message handling
            fetch('submitCss.php', {
                method: 'POST',
                body: new URLSearchParams(data),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(result => {
                console.log('Success:', result);
                if (result.status === 'success') {
                    showToast(result.message, 'success');
                    // Optional: reset or redirect after success
                    // window.location.href = 'thank-you.html';
                } else {
                    showToast(result.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An unexpected error occurred. Please try again later.', 'error');
            });
        });

        showSection(currentSection);
    });
</script>





</body>
</html>