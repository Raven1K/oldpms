<?php

require_once "../../processphp/config.php";

// Get lumber_app_id from GET request, defaulting to 0 if not set
$lumber_app_id = isset($_GET['lumber_app_id']) ? intval($_GET['lumber_app_id']) : 0;

// Fetch data grouped by species with total boardfeet
$species_sql = "
    SELECT species, SUM(CAST(boardfeet AS DECIMAL(10,2))) AS total_boardfeet
    FROM wood_species_endorsement
    WHERE lumber_app_id = ?
    GROUP BY species
";
$species_stmt = $con->prepare($species_sql);
$species_stmt->bind_param("i", $lumber_app_id);
$species_stmt->execute();
$species_result = $species_stmt->get_result();

// Prepare a string to display species with total boardfeet
$species_summary = [];
$total_boardfeet_overall = 0;
while ($row = $species_result->fetch_assoc()) {
    $species_summary[] = htmlspecialchars($row['species']) . " : " . htmlspecialchars($row['total_boardfeet']) . " (bd.ft)";
    $total_boardfeet_overall += $row['total_boardfeet'];
}
$species_display = implode(", ", $species_summary);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wood Species Endorsement</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .total {
            font-weight: bold;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Wood Species Endorsement</h1>
    
    <!-- Display species summary -->
    <p><strong>Species Summary:</strong> <?php echo $species_display; ?></p>
    <p><strong>Total Boardfeet:</strong> <?php echo number_format($total_boardfeet_overall, 2); ?> (bd.ft)</p>

    <table>
        <thead>
            <tr>
                <th>Species</th>
                <th>Total Boardfeet</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($species_result->num_rows > 0): ?>
                <?php foreach ($species_summary as $species): ?>
                    <?php $parts = explode(" : ", $species); ?>
                    <tr>
                        <td><?php echo $parts[0]; ?></td>
                        <td><?php echo $parts[1]; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">No data available</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr class="total">
                <td>Total</td>
                <td><?php echo number_format($total_boardfeet_overall, 2); ?> (bd.ft)</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>

<?php
// Close resources
$species_stmt->close();
$con->close();
?>
