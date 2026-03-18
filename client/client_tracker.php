<?php
// Include database conection
require_once "../processphp/config.php";

// Get the lumber_app_id from the request
$lumber_app_id = isset($_GET['lumber_app_id']) ? $_GET['lumber_app_id'] : null;

$bussiness_name = $_GET['bussiness_name'];

if ($lumber_app_id) {
    // Fetch records based on the lumber_app_id
    $query = "SELECT * FROM client_client_document_history WHERE lumber_app_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $lumber_app_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    echo "No ID provided.";
    exit;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document History Timeline</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h1 class="mb-4">Document History Timeline</h2>

    <h2 class="mb-4"><?php echo $bussiness_name; ?></h2>

    <?php if ($result->num_rows > 0): ?>
        <div class="timeline">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="timeline-item mb-4 p-3 border rounded">
                    <h5 class="timeline-title"><?= htmlspecialchars($row['Title']) ?></h5>
                    <p class="text-muted">
    <strong>Date:</strong> <?= date("F j, Y", strtotime($row['Date'])) ?> | 
    <strong>Time:</strong> <?= htmlspecialchars($row['Time']) ?>
</p>

                    <p class="mb-2"><strong>Action:</strong> <?= htmlspecialchars($row['Action_']) ?></p>
                    <p><strong>Details:</strong> <?= nl2br(htmlspecialchars($row['Details'])) ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No records found for the given ID.</p>
    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database conection
$con->close();
?>
