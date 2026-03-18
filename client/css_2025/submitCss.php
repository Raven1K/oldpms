<?php
header('Content-Type: application/json');

// Include DB connection if not already available
if (!isset($connection)) {
    require_once "../../processphp/config.php";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $lumber_app_id = filter_var($_POST['lumber_app_id'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $responsiveness = filter_var($_POST['responsiveness'] ?? null, FILTER_SANITIZE_NUMBER_INT);
    $rq = filter_var($_POST['reliability'] ?? null, FILTER_SANITIZE_NUMBER_INT);
    $af = filter_var($_POST['access'] ?? null, FILTER_SANITIZE_NUMBER_INT);
    $co = filter_var($_POST['communication'] ?? null, FILTER_SANITIZE_NUMBER_INT);
    $cosS = filter_var($_POST['cost'] ?? null, FILTER_SANITIZE_NUMBER_INT);
    $int1In = filter_var($_POST['integrity'] ?? null, FILTER_SANITIZE_NUMBER_INT);
    $assu = filter_var($_POST['assurance'] ?? null, FILTER_SANITIZE_NUMBER_INT);
    $outc = filter_var($_POST['outcome'] ?? null, FILTER_SANITIZE_NUMBER_INT);
    $suggestionsComments = filter_var($_POST['suggestions'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Client type
    $clientType = $_POST['client-type'] ?? '';
    $lungsuranonIndibidwalRepresentante = $clientType === 'lungsuranon' ? 'lungsuranon' : '';
    $negosyoKompanya = $clientType === 'negosyo' ? 'negosyo' : '';
    $myCheckboxnameKapununganPo = $clientType === 'kapunungan' ? 'kapunungan' : '';
    $myCheckboxnameGobyerno = $clientType === 'gobyerno' ? 'gobyerno' : '';

    // Sex
    $sex = $_POST['sex'] ?? '';
    $chksexlalaki = $sex === 'Lalaki' ? 'Lalaki' : '';
    $chkbabae = $sex === 'Babae' ? 'Babae' : '';

    $edad = filter_var($_POST['edad'] ?? null, FILTER_SANITIZE_NUMBER_INT);

    // Citizen's Charter questions
    $citizen_charter_awareness = filter_var($_POST['citizen_charter_awareness'] ?? null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $charter_posting = filter_var($_POST['charter_posting'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $charter_helpfulness = filter_var($_POST['charter_helpfulness'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Set values for the new fields from the table schema. These are not in the form data.
    $responsiveness1 = '';
    $rq1 = '';
    $rq2 = '';
    $af1 = '';
    $co1 = '';
    $co2 = '';
    $myCheckboxnamesGitugotan = '';
    $dateOfApplication = date('Y-m-d H:i:s'); // Use current timestamp

    // 🔎 Validate required fields
    $requiredFields = [
        'lumber_app_id' => $lumber_app_id,
        'responsiveness' => $responsiveness,
        'reliability' => $rq,
        'access' => $af,
        'communication' => $co,
        'cost' => $cosS,
        'integrity' => $int1In,
        'assurance' => $assu,
        'outcome' => $outc,
        'client-type' => $clientType,
        'sex' => $sex,
        'edad' => $edad,
        'citizen_charter_awareness' => $citizen_charter_awareness,
        'charter_posting' => $charter_posting,
        'charter_helpfulness' => $charter_helpfulness
    ];

    foreach ($requiredFields as $field => $value) {
        if ($value === null || $value === '') {
            echo json_encode(['status' => 'error', 'message' => "Please complete all required fields. Missing: $field"]);
            exit;
        }
    }

    // ✅ If validation passes -> Insert or Update
    try {
        // --- 1. Insert/Update survey data into client_css table ---
        $sql = "INSERT INTO client_css (
            lumber_app_id, responsiveness, responsiveness1, Rq, Rq1, Rq2, af, af1, co, co1, co2,
            cos_s, int1_in, assu, outc, Suggestions_Comments, Date_of_Application,
            Lungsuranon_Indibidwal_Representante, Negosyo_Kompanya, myCheckboxname_Kapunungan_PO,
            chksexlalaki, chkbabae, myCheckboxname_gobyerno, Edad, myCheckboxnames_Gitugotan,
            citizen_charter_awareness, charter_posting, charter_helpfulness
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            responsiveness = VALUES(responsiveness), responsiveness1 = VALUES(responsiveness1),
            Rq = VALUES(Rq), Rq1 = VALUES(Rq1), Rq2 = VALUES(Rq2),
            af = VALUES(af), af1 = VALUES(af1),
            co = VALUES(co), co1 = VALUES(co1), co2 = VALUES(co2),
            cos_s = VALUES(cos_s), int1_in = VALUES(int1_in), assu = VALUES(assu),
            outc = VALUES(outc), Suggestions_Comments = VALUES(Suggestions_Comments),
            Date_of_Application = VALUES(Date_of_Application),
            Lungsuranon_Indibidwal_Representante = VALUES(Lungsuranon_Indibidwal_Representante),
            Negosyo_Kompanya = VALUES(Negosyo_Kompanya), myCheckboxname_Kapunungan_PO = VALUES(myCheckboxname_Kapunungan_PO),
            chksexlalaki = VALUES(chksexlalaki), chkbabae = VALUES(chkbabae),
            myCheckboxname_gobyerno = VALUES(myCheckboxname_gobyerno), Edad = VALUES(Edad),
            myCheckboxnames_Gitugotan = VALUES(myCheckboxnames_Gitugotan),
            citizen_charter_awareness = VALUES(citizen_charter_awareness),
            charter_posting = VALUES(charter_posting),
            charter_helpfulness = VALUES(charter_helpfulness)";

        $stmt = $connection->prepare($sql);

        $stmt->execute([
            $lumber_app_id, $responsiveness, $responsiveness1, $rq, $rq1, $rq2, $af, $af1, $co, $co1, $co2,
            $cosS, $int1In, $assu, $outc, $suggestionsComments, $dateOfApplication,
            $lungsuranonIndibidwalRepresentante, $negosyoKompanya, $myCheckboxnameKapununganPo,
            $chksexlalaki, $chkbabae, $myCheckboxnameGobyerno, $edad, $myCheckboxnamesGitugotan,
            $citizen_charter_awareness, $charter_posting, $charter_helpfulness
        ]);

        // --- 2. Update Rating in lumber_application table ---
        $updateRatingSql = "UPDATE lumber_application SET Rating = :Rating WHERE lumber_app_id = :lumber_app_id";
        $updateStmt = $connection->prepare($updateRatingSql);
        $updateStmt->execute([':Rating' => 'Rated', ':lumber_app_id' => $lumber_app_id]);

        // --- 3. Insert record into client_client_document_history table ---
        date_default_timezone_set("Asia/Manila");
        $date = date('Y-m-d'); // Use 'Y-m-d' for standard DB date format
        $Time = date("H:i:s"); // Use 'H:i:s' for standard DB time format
        $Title = 'Client ';
        $Details = 'Accomplished Client Satisfaction Survey (CSS)'.'<br><br>'.'
                    Acknowledged'.'<br><br>'.'
                    Downloaded and Printed E-Permit';

        // Check if the record already exists in client_client_document_history
        $checkSql = "SELECT COUNT(*) FROM client_client_document_history WHERE lumber_app_id = :lumber_app_id AND Date = :Date AND Title = :Title";
        $checkStmt = $connection->prepare($checkSql);
        $checkStmt->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
        $checkStmt->bindParam("Date", $date, PDO::PARAM_STR);
        $checkStmt->bindParam("Title", $Title, PDO::PARAM_STR);
        $checkStmt->execute();
        $recordExists = $checkStmt->fetchColumn();

        if ($recordExists == 0) {
            // Insert the record if it does not already exist
            $historySql = "INSERT INTO client_client_document_history (
            lumber_app_id, Date, Title, Details, Time
            ) VALUES (
            :lumber_app_id, :Date, :Title, :Details, :Time
            )";

            $historyStmt = $connection->prepare($historySql);
            $historyStmt->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
            $historyStmt->bindParam("Date", $date, PDO::PARAM_STR);
            $historyStmt->bindParam("Title", $Title, PDO::PARAM_STR);
            $historyStmt->bindParam("Details", $Details, PDO::PARAM_STR);
            $historyStmt->bindParam("Time", $Time, PDO::PARAM_STR);
            $historyStmt->execute();
        }

        // 4. Send success JSON response and exit
        echo json_encode(['status' => 'success', 'message' => 'Survey submitted successfully.']);
        exit; // Exit after sending the JSON response
        
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        exit;
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}
?>