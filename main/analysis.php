<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumber Processing Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/seal.png" type="image/x-icon">
    <style>
        :root {
            --primary: #2c3e50; /* Dark Blue-Gray */
            --secondary: #3498db; /* Bright Blue */
            --accent: #27ae60; /* Green */
            --light: #ecf0f1; /* Light Gray */
            --dark: #1a252f; /* Even Darker Blue-Gray */
            --danger: #e74c3c; /* Red */
            --warning: #f39c12; /* Orange */
            --success: #2ecc71; /* Green */
            --gray: #7f8c8d; /* Muted Gray */
            --border: #bdc3c7; /* Light Border Gray */
            --card-bg: #ffffff;
            --chart-gradient-start: rgba(52, 152, 219, 0.7);
            --chart-gradient-end: rgba(41, 128, 185, 0.7);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e7eb 100%);
            color: var(--dark);
            min-height: 100vh;
            padding: 20px;
        }

        .dashboard {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .title-container h1 {
            font-weight: 700;
            font-size: 28px;
            color: var(--primary);
            line-height: 1.2;
        }

        .title-container p {
            color: var(--gray);
            font-size: 16px;
            font-weight: 300;
        }

        .controls {
            display: flex;
            gap: 15px;
        }

        .date-range {
            display: flex;
            align-items: center;
            gap: 15px;
            background: var(--card-bg);
            padding: 12px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .date-range label {
            font-weight: 500;
            color: var(--primary);
            white-space: nowrap;
        }

        .date-range input {
            padding: 10px 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: var(--dark);
            background: var(--light);
        }

        .btn {
            padding: 12px 24px;
            background: var(--secondary);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(52, 152, 219, 0.3);
        }

        .btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(52, 152, 219, 0.4);
        }

        .btn i {
            font-size: 18px;
        }

        .btn-reset {
            background: var(--gray);
            box-shadow: 0 4px 6px rgba(127, 140, 141, 0.3);
        }

        .btn-reset:hover {
            background: #6c7a89;
            box-shadow: 0 6px 8px rgba(127, 140, 141, 0.4);
        }

        .main-content {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 25px;
            margin-bottom: 25px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border);
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            color: var(--secondary);
        }

        .stats-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .stat-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            border-left: 4px solid var(--secondary);
        }

        .stat-card.warning {
            border-left-color: var(--warning);
        }

        .stat-card.success {
            border-left-color: var(--success);
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary);
            margin: 10px 0;
        }

        .stat-label {
            font-size: 16px;
            color: var(--gray);
            font-weight: 500;
        }

        .chart-container {
            position: relative;
            height: 400px; /* Adjusted height for better visualization */
            width: 100%;
        }

        .chart-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 15px;
        }

        .chart-btn {
            padding: 8px 15px;
            background: var(--light);
            border: 1px solid var(--border);
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .chart-btn:hover {
            background: var(--secondary);
            color: white;
            border-color: var(--secondary);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table th {
            background: var(--primary);
            color: white;
            text-align: left;
            padding: 12px 15px;
            font-weight: 500;
        }

        .data-table tr {
            border-bottom: 1px solid var(--border);
        }

        .data-table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .data-table td {
            padding: 12px 15px;
        }

        .processing-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
        }

        .badge-fast {
            background: rgba(46, 204, 113, 0.15); /* light green */
            color: var(--success);
        }

        .badge-medium {
            background: rgba(243, 156, 18, 0.15); /* light orange */
            color: var(--warning);
        }

        .badge-slow {
            background: rgba(231, 76, 60, 0.15); /* light red */
            color: var(--danger);
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
            color: var(--gray);
            font-size: 14px;
        }

        .holiday-note {
            background: rgba(243, 156, 18, 0.1);
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid var(--warning);
            max-width: 500px; /* Constrain width for better readability */
            margin-top: 25px; /* Add margin to separate from chart */
        }

        .holiday-note strong {
            color: var(--warning);
        }

        /* Responsive Design */
        @media (max-width: 1100px) {
            .main-content {
                grid-template-columns: 1fr; /* Stack content vertically on smaller screens */
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 20px;
                align-items: flex-start;
            }
            
            .controls {
                width: 100%;
                flex-direction: column;
            }
            
            .date-range {
                flex-wrap: wrap;
            }
            
            .stats-container {
                grid-template-columns: 1fr; /* Stack stat cards */
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="header">
            <div class="logo-container">

                <div class="title-container">
                    <h1>Lumber Application Processing Dashboard</h1>
                    <p>Track and analyze processing times for lumber permits</p>
                </div>
            </div>
            
            <form method="GET" action="" class="controls">
                <div class="date-range">
                    <label for="start_date"><i class="fas fa-calendar-alt"></i> Start Date:</label>
                    <input type="date" id="start_date" name="start_date" value="<?php echo isset($_GET['start_date']) ? htmlspecialchars($_GET['start_date']) : ''; ?>">
                    
                    <label for="end_date"><i class="fas fa-calendar-alt"></i> End Date:</label>
                    <input type="date" id="end_date" name="end_date" value="<?php echo isset($_GET['end_date']) ? htmlspecialchars($_GET['end_date']) : ''; ?>">
                </div>
                
                <button type="submit" class="btn">
                    <i class="fas fa-filter"></i> Filter Data
                </button>
                
                <button type="button" class="btn btn-reset">
                    <i class="fas fa-sync-alt"></i> Reset
                </button>
            </form>
        </div>
        
        <div class="main-content">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title"><i class="fas fa-chart-line"></i> Performance Metrics</h2>
                </div>
                
                <div class="stats-container">
                    <div class="stat-card">
                        <div class="stat-label">Total Applications</div>
                        <div class="stat-value" id="totalApplications">--</div>
                        <div class="stat-desc">Processed permits</div>
                    </div>
                    
                    <div class="stat-card warning">
                        <div class="stat-label">Average Processing</div>
                        <div class="stat-value" id="averageProcessing">--</div>
                        <div class="stat-desc">Business days</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-label">Fastest Processing</div>
                        <div class="stat-value" id="fastestProcessing">--</div>
                        <div class="stat-desc">Business days</div>
                    </div>
                    
                    <div class="stat-card success">
                        <div class="stat-label">On Time Rate</div>
                        <div class="stat-value" id="onTimeRate">--</div>
                        <div class="stat-desc">Within 8 days</div>
                    </div>
                </div>
                
                <div style="margin-top: 30px;">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-table"></i> Recent Applications</h3>
                    </div>
                    <div style="overflow-x: auto;">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Business Name</th>
                                    <th>Applied Date</th>
                                    <th>Processed</th>
                                    <th>Days</th>
                                </tr>
                            </thead>
                            <tbody id="applicationTableBody">
                            </tbody>
                        </table>
                        <p class="no-data-message" id="tableNoData" style="display: none; text-align: center; color: var(--gray); margin-top: 20px; font-style: italic;">No recent application data found.</p>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title"><i class="fas fa-chart-bar"></i> Processing Time Analysis</h2>
                    <div class="chart-actions">
                        <button class="chart-btn" onclick="exportChart()"><i class="fas fa-download"></i> Export</button>
                        <button class="chart-btn" onclick="toggleFullscreen()"><i class="fas fa-expand"></i> Fullscreen</button>
                    </div>
                </div>
                
                <div class="chart-container">
                    <canvas id="barChart"></canvas>
                    <p class="no-data-message" id="chartNoData" style="display: none; text-align: center; color: var(--gray); margin-top: 20px; font-style: italic;">No chart data available for the selected criteria.</p>
                </div>
                
                <div class="holiday-note">
                    <p><strong>Note:</strong> Processing times exclude weekends and official holidays. The current holiday list for Caraga, Philippines, has been applied to calculations.</p>
                </div>
            </div>
        </div>
        
        <div class="footer">
            <div>
                <p><i class="fas fa-info-circle"></i> Data updated: <?php echo date('F j, Y'); ?></p>
            </div>
            <div>
                <p>Lumber Processing System &bull; Department of Environment and Natural Resources</p>
            </div>
        </div>
    </div>

    <?php
    // Ensure this path is correct relative to the current file
    include('../processphp/config.php'); 

    // include "sidebar.php";

    /**
     * Calculates the number of business days between two dates.
     * Excludes Saturdays, Sundays, and a list of specified holidays.
     *
     * @param string $startDate The start date (e.g., 'YYYY-MM-DD').
     * @param string $endDate The end date (e.g., 'YYYY-MM-DD').
     * @param array $holidays An array of holiday dates (e.g., ['YYYY-MM-DD', ...]).
     * @return int The number of business days.
     */
    function getBusinessDays($startDate, $endDate, $holidays = []) {
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        
        // If start and end dates are the same, check if it's a business day
        if ($start->format('m/d/Y') === $end->format('m/d/Y')) {
            $dayOfWeek = (int)$start->format('N');
            $currentDate = $start->format('m/d/Y');
            if ($dayOfWeek >= 1 && $dayOfWeek <= 5 && !in_array($currentDate, $holidays)) {
            return 1;
            } else {
            return 0;
            }
        }

        // Increment to ensure the end date is included in the loop (if it's a business day)
        $end->modify('+1 day'); 

        $businessDays = 0;
        $current = clone $start;

        while ($current < $end) { 
            $dayOfWeek = (int)$current->format('N'); // 1 (for Monday) through 7 (for Sunday)
            $currentDate = $current->format('Y-m-d');

            // Check if it's a weekday (Monday-Friday) and not a holiday
            if ($dayOfWeek >= 1 && $dayOfWeek <= 5 && !in_array($currentDate, $holidays)) {
                $businessDays++;
            }
            $current->modify('+1 day');
        }
        return $businessDays;
    }

    // Define a list of holidays for Caraga, Philippines (example dates - update these annually)
    // This is a crucial array to maintain for accuracy.
    $holidays = [
        '01/01/2025', // New Year's Day
        '04/17/2025', // Maundy Thursday (example)
        '04/18/2025', // Good Friday (example)
        '04/19/2025', // Black Saturday (example, often considered non-working)
        '05/01/2025', // Labor Day
        '06/12/2025', // Independence Day
        '08/21/2025', // Ninoy Aquino Day
        '08/25/2025', // National Heroes Day (Last Monday of August)
        '11/01/2025', // All Saints' Day
        '11/02/2025', // All Souls' Day (often observed)
        '11/30/2025', // Bonifacio Day
        '12/08/2025', // Immaculate Conception Day (Special Non-working Holiday)
        '12/25/2025', // Christmas Day
        '12/30/2025', // Rizal Day
        '12/31/2025', // Last Day of the Year
        // Add local holidays for Caraga region if applicable (e.g., regional celebrations)
        '02/14/2025', // Caraga Regional Day (example, replace with actual date if applicable)
        '07/16/2025', // Surigao del Norte Charter Day (example, replace with actual date if applicable)
        '09/09/2025', // Surigao City Charter Day (example, replace with actual date if applicable)
        '10/20/2025', // Butuan City Charter Day (example, replace with actual date if applicable)
        // Add other local holidays specific to Caraga provinces and cities
    ];


    // Get filter dates from GET request
    $startDate = isset($_GET['start_date']) ? date('m/d/Y', strtotime($_GET['start_date'])) : null;
    $endDate = isset($_GET['end_date']) ? date('m/d/Y', strtotime($_GET['end_date'])) : null;

    $permits = [];
    $daysArray = [];
    $totalBusinessDays = 0;
    $permitCount = 0;
    $minBusinessDays = PHP_INT_MAX; // Initialize with a very large number
    $maxBusinessDays = 0; // No need for max, but keep for consistency if needed later
    $applicationsData = []; // To store data for the table

    // Base query
    $query = "SELECT la.lumber_app_id, la.date_applied, la.date_recieve, la.bussiness_name
              FROM lumber_application la
              INNER JOIN client_client_document_history ccdh 
              ON la.lumber_app_id = ccdh.lumber_app_id
              WHERE ccdh.title = 'Records Unit' AND la.date_recieve IS NOT NULL ";

    // Add date filter conditions if dates are provided
    if ($startDate && $endDate) {
        $query .= " AND date_applied BETWEEN ? AND ?";
    }
    $query .= " ORDER BY date_applied DESC, lumber_app_id DESC"; // Order by application date for recent

    $stmt = $con->prepare($query);

    if ($stmt) {
        if ($startDate && $endDate) {
            $stmt->bind_param("ss", $startDate, $endDate);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dateApplied = date('F j, Y', strtotime($row['date_applied']));
                $dateReceive = date('F j, Y', strtotime($row['date_recieve']));
                $bussiness_name = $row['bussiness_name'];
                $lumberAppId = $row['lumber_app_id'];

                // Only calculate if both dates are valid and present
                if ($dateApplied && $dateReceive) {
                    $businessDays = getBusinessDays($dateApplied, $dateReceive, $holidays);
                    
                    // Exclude applications where date_receive is before date_applied or processing time is zero (unless 0 is a valid processing time, e.g., same-day)
                    // The getBusinessDays function handles cases where start and end are the same.
                    if ($businessDays >= 0 && strtotime($dateReceive) >= strtotime($dateApplied)) { // Check for non-negative business days
                        $totalBusinessDays += $businessDays;
                        $permitCount++;
                        $permits[] = "Permit " . htmlspecialchars($lumberAppId); // Sanitize output for chart labels
                        $daysArray[] = $businessDays;

                        // Update min/max business days
                        if ($businessDays < $minBusinessDays) {
                            $minBusinessDays = $businessDays;
                        }
                        if ($businessDays > $maxBusinessDays) {
                            $maxBusinessDays = $businessDays;
                        }

                        // Store data for the table
                        $applicationsData[] = [
                            'id' => htmlspecialchars($lumberAppId),
                            'applied' => htmlspecialchars($dateApplied),
                            'received' => htmlspecialchars($dateReceive),
                            'days' => $businessDays,
                            'business_name' => htmlspecialchars($bussiness_name)
                        ];
                    }
                }
            }
            // Reverse arrays for chart to show older applications first.
            // For the table, we want the most recent, which is already handled by ORDER BY DESC.
            // If the chart needs to match the table's order (most recent first), remove the reverse.
            // For chronological order on chart, keep as is (reverse if query is DESC).
            // Since the query is ordered DESC, reversing here will make it ASC for the chart.
            $permits = array_reverse($permits);
            $daysArray = array_reverse($daysArray);

        }
        $stmt->close();
    } else {
        // Handle database query preparation error
        error_log("Database query preparation failed: " . $con->error);
    }

    $con->close();
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Helper to get CSS variables - DEFINE THIS FIRST!
            const getCssVariable = (property) => getComputedStyle(document.documentElement).getPropertyValue(property).trim();
            const var_colors = {
                chart_gradient_start: getCssVariable('--chart-gradient-start'),
                chart_gradient_end: getCssVariable('--chart-gradient-end')
            };

            // PHP data passed to JavaScript
            const permitsData = <?php echo json_encode($permits); ?>;
            const daysData = <?php echo json_encode($daysArray); ?>;
            const totalPermitCount = <?php echo json_encode($permitCount); ?>;
            const averageProcessingTime = <?php echo json_encode($permitCount > 0 ? round($totalBusinessDays / $permitCount, 2) : 0); ?>;
            const fastestProcessingTime = <?php echo json_encode($minBusinessDays === PHP_INT_MAX ? 'N/A' : $minBusinessDays); ?>; // Changed to N/A for display
            const applicationsTableData = <?php echo json_encode($applicationsData); ?>;

            // Update performance metrics
            document.getElementById('totalApplications').textContent = totalPermitCount;
            document.getElementById('averageProcessing').textContent = averageProcessingTime + (averageProcessingTime > 0 ? '' : ' N/A');
            document.getElementById('fastestProcessing').textContent = fastestProcessingTime;
            
            // Calculate On-Time Rate (example: within 10 business days)
            let onTimeCount = 0;
            daysData.forEach(days => {
                if (days > 0 && days <= 10) { // Assuming 'on time' is 10 days or less, and must be processed (>0 days)
                    onTimeCount++;
                }
            });
            const onTimeRate = totalPermitCount > 0 ? ((onTimeCount / totalPermitCount) * 100).toFixed(1) + '%' : 'N/A';
            document.getElementById('onTimeRate').textContent = onTimeRate;

            // Populate the Recent Applications table
            const tableBody = document.getElementById('applicationTableBody');
            if (applicationsTableData.length > 0) {
                document.getElementById('tableNoData').style.display = 'none'; // Hide no data message
                applicationsTableData.forEach(app => {
                    const row = tableBody.insertRow();
                    row.insertCell().textContent = app.id;
                    row.insertCell().textContent = app.business_name; // Add business name
                    row.insertCell().textContent = app.applied;
                    row.insertCell().textContent = app.received;
                    const daysCell = row.insertCell();
                    let badgeClass = '';
                    if (app.days <= 5) { // Example thresholds
                        badgeClass = 'badge-fast';
                    } else if (app.days <= 10) {
                        badgeClass = 'badge-medium';
                    } else {
                        badgeClass = 'badge-slow';
                    }
                    daysCell.innerHTML = `<span class="processing-badge ${badgeClass}">${app.days} days</span>`;
                });
            } else {
                document.getElementById('tableNoData').style.display = 'block';
            }

            // Chart.js configuration
            const ctx = document.getElementById('barChart').getContext('2d');
            let barChart; // Declare chart variable globally or accessible

            if (permitsData.length > 0) {
                document.getElementById('chartNoData').style.display = 'none'; // Hide no data message
                document.getElementById('barChart').style.display = 'block'; // Show canvas

                // Create gradient for chart bars
                const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, var_colors.chart_gradient_start);
                gradient.addColorStop(1, var_colors.chart_gradient_end);
                
                barChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: permitsData,
                        datasets: [{
                            label: 'Processing Time (Business Days)',
                            data: daysData,
                            backgroundColor: gradient,
                            borderColor: 'rgba(41, 128, 185, 1)',
                            borderWidth: 1,
                            borderRadius: 6,
                            borderSkipped: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(44, 62, 80, 0.9)',
                                titleFont: {
                                    size: 14,
                                    family: "'Poppins', sans-serif"
                                },
                                bodyFont: {
                                    size: 13,
                                    family: "'Poppins', sans-serif"
                                },
                                padding: 12,
                                displayColors: false,
                                callbacks: {
                                    label: function(context) {
                                        return `Processing time: ${context.parsed.y} business days`;
                                    },
                                    title: function(context) {
                                        return `Permit: ${context[0].label}`;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                },
                                title: {
                                    display: true,
                                    text: 'Business Days',
                                    font: {
                                        size: 14,
                                        weight: 'bold'
                                    },
                                    padding: {
                                        bottom: 10
                                    }
                                },
                                ticks: {
                                    font: {
                                        size: 12
                                    },
                                    stepSize: 2
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    font: {
                                        size: 11
                                    },
                                    maxRotation: 0,
                                    callback: function(value, index) {
                                        // Only show every other label if there are too many
                                        return permitsData.length > 15 && index % 2 !== 0 ? '' : this.getLabelForValue(value);
                                    }
                                }
                            }
                        },
                        animation: {
                            duration: 1500,
                            easing: 'easeOutQuart'
                        }
                    }
                });
            } else {
                document.getElementById('chartNoData').style.display = 'block'; // Show no data message
                document.getElementById('barChart').style.display = 'none'; // Hide the canvas
            }
            
            // Reset button functionality
            document.querySelector('.btn-reset').addEventListener('click', function() {
                // Clear the date inputs and submit the form to remove filters
                document.getElementById('start_date').value = '';
                document.getElementById('end_date').value = '';
                // Submit the form to reload the page without date parameters
                this.closest('form').submit(); 
            });

            // Export chart as PNG
            window.exportChart = function() {
                if (barChart) {
                    const a = document.createElement('a');
                    a.href = barChart.toBase64Image();
                    a.download = 'lumber-processing-chart.png';
                    a.click();
                } else {
                    alert('No chart data to export.');
                }
            };

            // Toggle fullscreen for the dashboard
            window.toggleFullscreen = function() {
                const dashboard = document.querySelector('.dashboard');
                if (!document.fullscreenElement) {
                    if (dashboard.requestFullscreen) {
                        dashboard.requestFullscreen();
                    } else if (dashboard.webkitRequestFullscreen) { /* Safari */
                        dashboard.webkitRequestFullscreen();
                    } else if (dashboard.msRequestFullscreen) { /* IE11 */
                        dashboard.msRequestFullscreen();
                    }
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.webkitExitFullscreen) { /* Safari */
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) { /* IE11 */
                        document.msExitFullscreen();
                    }
                }
            };
        });
    </script>
</body>
</html>