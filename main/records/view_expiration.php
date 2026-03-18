<?php
declare(strict_types=1);

// 1. SETUP & INCLUDES
require "../../processphp/config.php";

$applications = [];

// 2. DATABASE QUERY (UPDATED to include the applicant's email)
$sql = "SELECT
            la.lumber_app_id,
            la.bussiness_name,
            la.perm_fname,
            la.perm_lname,
            la.perm_email, -- Added email field
            la.full_address,
            la.Application_status,
            la.date_applied,
            ccdh.Date AS date_released
        FROM lumber_application AS la
        LEFT JOIN client_client_document_history AS ccdh
            ON la.lumber_app_id = ccdh.lumber_app_id AND ccdh.Title = 'Records Unit'
        ORDER BY la.date_applied DESC";

$result = mysqli_query($con, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $applications[] = $row;
    }
}

// 3. UI HELPER FUNCTIONS & DATA PREPARATION

function getApplicationStatusClasses(string $status): string
{
    switch (strtolower($status)) {
        case 'complete': return 'bg-green-100 text-green-800';
        case 'returned':
        case 'return':
        case 'return_fuu': return 'bg-red-100 text-red-800';
        case 'on process': return 'bg-yellow-100 text-yellow-800';
        default: return 'bg-gray-100 text-gray-800';
    }
}

function getPermitStatus(?string $releaseDate): array
{
    if ($releaseDate === null) {
        return ['status' => 'N/A', 'expiration_date' => '—', 'classes' => 'bg-gray-100 text-gray-800'];
    }
    try {
        $today = new DateTime();
        $expiration = (new DateTime($releaseDate))->modify('+1 year');
        $threeMonthsFromNow = (new DateTime())->modify('+3 months');
        $status = 'Active';
        $classes = 'bg-blue-100 text-blue-800';
        if ($expiration < $today) {
            $status = 'Expired';
            $classes = 'bg-red-100 text-red-800 hover:bg-red-200 cursor-pointer';
        } elseif ($expiration < $threeMonthsFromNow) {
            $status = 'Nearing Expiration';
            $classes = 'bg-orange-100 text-orange-800 hover:bg-orange-200 cursor-pointer';
        }
        return ['status' => $status, 'expiration_date' => $expiration->format('M d, Y'), 'classes' => $classes];
    } catch (Exception $e) {
        return ['status' => 'Invalid Date', 'expiration_date' => '—', 'classes' => 'bg-gray-100 text-gray-800'];
    }
}

// Calculate status counts for the dashboard cards
$statusCounts = ['total' => count($applications), 'complete' => 0, 'returned' => 0, 'on_process' => 0];
$years = [];
foreach ($applications as $app) {
    $status = strtolower($app['Application_status']);
    if ($status === 'complete') $statusCounts['complete']++;
    elseif (in_array($status, ['returned', 'return', 'return_fuu'])) $statusCounts['returned']++;
    elseif ($status === 'on process') $statusCounts['on_process']++;
    if (!empty($app['date_applied'])) $years[] = date('Y', strtotime($app['date_applied']));
}
$unique_years = array_unique($years);
rsort($unique_years);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumber Applications Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7fafc; }
        .stat-card, .application-row { transition: all 0.2s ease-in-out; }
        .stat-card:hover, .application-row:hover { transform: translateY(-2px); box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08); }
        .table-container { max-height: 65vh; overflow-y: auto; }
        .table-container::-webkit-scrollbar { width: 6px; }
        .table-container::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        .table-container::-webkit-scrollbar-thumb { background: #cbd5e0; border-radius: 10px; }
        .table-container::-webkit-scrollbar-thumb:hover { background: #a0aec0; }
        .modal-overlay { transition: opacity 0.3s ease; }
        .modal-content { transition: transform 0.3s ease; }
    </style>
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Lumber Permit Management</h1>
                    <p class="text-sm text-gray-500">Track and manage all lumber permit applications.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold">A</div>
                    <span class="hidden md:block ml-2 text-sm font-medium text-gray-700">Admin User</span>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
             <div class="stat-card bg-white rounded-xl shadow p-6 flex items-center">
                <div class="rounded-full p-3 bg-blue-100 text-blue-500 mr-4"><i class="fas fa-file-alt text-xl"></i></div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800"><?php echo $statusCounts['total']; ?></h2>
                    <p class="text-sm text-gray-600">Total Applications</p>
                </div>
            </div>
            <div class="stat-card bg-white rounded-xl shadow p-6 flex items-center">
                <div class="rounded-full p-3 bg-green-100 text-green-500 mr-4"><i class="fas fa-check-circle text-xl"></i></div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800"><?php echo $statusCounts['complete']; ?></h2>
                    <p class="text-sm text-gray-600">Completed</p>
                </div>
            </div>
            <div class="stat-card bg-white rounded-xl shadow p-6 flex items-center">
                <div class="rounded-full p-3 bg-yellow-100 text-yellow-500 mr-4"><i class="fas fa-spinner text-xl"></i></div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800"><?php echo $statusCounts['on_process']; ?></h2>
                    <p class="text-sm text-gray-600">In Process</p>
                </div>
            </div>
            <div class="stat-card bg-white rounded-xl shadow p-6 flex items-center">
                <div class="rounded-full p-3 bg-red-100 text-red-500 mr-4"><i class="fas fa-times-circle text-xl"></i></div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800"><?php echo $statusCounts['returned']; ?></h2>
                    <p class="text-sm text-gray-600">Returned</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                     <div>
                        <h2 class="text-xl font-semibold text-gray-800">Application List</h2>
                        <p class="text-sm text-gray-500 mt-1">Showing all permit applications and their current status.</p>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto">
                        <div class="relative w-full md:w-56">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><i class="fas fa-search text-gray-400"></i></div>
                            <input type="text" id="searchInput" class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search...">
                        </div>
                        <select id="yearFilter" class="px-4 py-2 border border-gray-300 rounded-lg w-full md:w-auto focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="all">All Years</option>
                            <?php foreach ($unique_years as $year): ?>
                                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select id="statusFilter" class="px-4 py-2 border border-gray-300 rounded-lg w-full md:w-auto focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="all">All Statuses</option>
                            <option value="complete">Complete</option>
                            <option value="returned">Returned</option>
                            <option value="on process">On Process</option>
                        </select>
                    </div>
                </div>
            </div>

            <?php if (empty($applications)): ?>
                <div class="p-12 text-center"><i class="fas fa-folder-open text-5xl text-gray-300 mb-4"></i><p class="text-gray-600 text-lg font-medium">No Applications Found</p></div>
            <?php else: ?>
                <div class="table-container">
                    <table class="w-full text-sm text-left text-gray-600" id="applicationsTable">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 sticky top-0">
                             <tr>
                                <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable(0)">Applicant <i class="fas fa-sort ml-1 text-gray-400"></i></th>
                                <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable(1)">Business & Dates <i class="fas fa-sort ml-1 text-gray-400"></i></th>
                                <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable(2)">Application Status <i class="fas fa-sort ml-1 text-gray-400"></i></th>
                                <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable(3)">Permit Status <i class="fas fa-sort ml-1 text-gray-400"></i></th>
                                <th scope="col" class="px-6 py-3 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($applications as $app): ?>
                                <?php $permit = getPermitStatus($app['date_released']); ?>
                                <tr class="application-row bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900"><?php echo htmlspecialchars($app['perm_fname'] . ' ' . $app['perm_lname']); ?></div>
                                        <div class="text-xs text-gray-500">ID: <?php echo htmlspecialchars((string)$app['lumber_app_id']); ?></div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium"><?php echo htmlspecialchars($app['bussiness_name']); ?></div>
                                        <div class="text-xs text-gray-500 mt-1">Applied: <?php echo date('M d, Y', strtotime($app['date_applied'])); ?></div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?php echo getApplicationStatusClasses($app['Application_status']); ?>">
                                            <?php echo htmlspecialchars($app['Application_status']); ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php if ($permit['status'] === 'Expired' || $permit['status'] === 'Nearing Expiration'): ?>
                                            <button onclick="openModal(this)"
                                                data-appid="<?php echo htmlspecialchars((string)$app['lumber_app_id']); ?>"
                                                data-name="<?php echo htmlspecialchars($app['perm_fname'] . ' ' . $app['perm_lname']); ?>"
                                                data-business="<?php echo htmlspecialchars($app['bussiness_name']); ?>"
                                                data-email="<?php echo htmlspecialchars($app['perm_email'] ?? 'N/A'); ?>"
                                                data-status="<?php echo htmlspecialchars($permit['status']); ?>"
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium transition <?php echo $permit['classes']; ?>">
                                                <i class="fas fa-paper-plane mr-1"></i> Notify <?php echo htmlspecialchars($permit['status']); ?>
                                            </button>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?php echo $permit['classes']; ?>">
                                                <?php echo htmlspecialchars($permit['status']); ?>
                                            </span>
                                        <?php endif; ?>
                                        <div class="text-xs text-gray-500 mt-1">Expires: <?php echo htmlspecialchars($permit['expiration_date']); ?></div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="view_details.php?id=<?php echo $app['lumber_app_id']; ?>" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-xs font-medium hover:bg-blue-700 transition">
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <div id="notificationModal" class="modal-overlay fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 hidden">
        <div class="modal-content bg-white rounded-lg shadow-xl w-full max-w-lg transform scale-95">
            <div class="px-6 py-4 border-b flex justify-between items-center">
                <h3 id="modalTitle" class="text-lg font-semibold text-gray-800">Send Notification</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-800">&times;</button>
            </div>
            <form id="notificationForm" class="p-6">
                <input type="hidden" id="modalAppId" name="app_id">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Recipient</label>
                    <p id="modalRecipientInfo" class="mt-1 text-sm text-gray-900"></p>
                    <p id="modalRecipientEmail" class="text-xs text-gray-500"></p>
                </div>
                <div class="mb-4">
                    <label for="modalMessage" class="block text-sm font-medium text-gray-700">Notification Message</label>
                    <textarea id="modalMessage" name="message" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required></textarea>
                </div>
                <div id="modalFeedback" class="text-sm mb-4"></div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-sm font-medium">Cancel</button>
                    <button type="submit" id="sendButton" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm font-medium flex items-center">
                        <span id="sendButtonText">Send Notification</span>
                        <i id="sendButtonSpinner" class="fas fa-spinner fa-spin ml-2 hidden"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // **CORRECTED SCRIPT SECTION**

        // Get DOM elements for filtering
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const yearFilter = document.getElementById('yearFilter');
        const table = document.getElementById('applicationsTable');
        const tableBody = table.getElementsByTagName('tbody')[0];
        const rows = tableBody.getElementsByTagName('tr');

        // Combined filter function
        function filterTable() {
            const searchText = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;
            const yearValue = yearFilter.value;

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                const rowText = rows[i].textContent.toLowerCase();
                const statusCellText = (cells[2].textContent || cells[2].innerText).toLowerCase().trim();
                const dateText = (cells[1].textContent || cells[1].innerText).trim();
                const rowYear = dateText.slice(-4);

                const matchesSearch = rowText.includes(searchText);
                const matchesStatus = (statusValue === 'all') || statusCellText.includes(statusValue);
                const matchesYear = (yearValue === 'all') || (rowYear === yearValue);

                if (matchesSearch && matchesStatus && matchesYear) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

        // Add event listeners
        searchInput.addEventListener('keyup', filterTable);
        statusFilter.addEventListener('change', filterTable);
        yearFilter.addEventListener('change', filterTable);

        // Table sorting function
        let sortDirection = {};
        function sortTable(columnIndex) {
            const rowsArray = Array.from(rows);
            const direction = sortDirection[columnIndex] = (sortDirection[columnIndex] || 1) * -1;
            
            rowsArray.sort((a, b) => {
                const aText = a.cells[columnIndex].innerText.trim();
                const bText = b.cells[columnIndex].innerText.trim();
                return aText.localeCompare(bText, undefined, {numeric: true}) * direction;
            });

            // Re-append sorted rows to the table body
            rowsArray.forEach(row => tableBody.appendChild(row));

            // Update sort icons in the header
            table.querySelectorAll('th i').forEach(icon => icon.className = 'fas fa-sort ml-1 text-gray-400');
            const currentIcon = table.querySelector(`th:nth-child(${columnIndex + 1}) i`);
            currentIcon.className = direction === 1 ? 'fas fa-sort-down ml-1' : 'fas fa-sort-up ml-1';
        }

        // --- Modal and Email Sending Logic (No changes here) ---
        const modal = document.getElementById('notificationModal');
        const form = document.getElementById('notificationForm');
        const modalFeedback = document.getElementById('modalFeedback');
        const sendButton = document.getElementById('sendButton');
        const sendButtonText = document.getElementById('sendButtonText');
        const sendButtonSpinner = document.getElementById('sendButtonSpinner');

        function openModal(button) {
            const appId = button.dataset.appid;
            const name = button.dataset.name;
            const business = button.dataset.business;
            const email = button.dataset.email;
            const status = button.dataset.status;

            modalFeedback.innerHTML = '';
            modalFeedback.className = 'text-sm mb-4';
            sendButton.disabled = false;

            document.getElementById('modalAppId').value = appId;
            document.getElementById('modalRecipientInfo').textContent = `${name} (${business})`;
            document.getElementById('modalRecipientEmail').textContent = `Email: ${email}`;
            
            let messageText = '';
            const modalTitle = document.getElementById('modalTitle');

            if (status === 'Expired') {
                modalTitle.textContent = 'Send Expiration Notification';
                messageText = `Dear ${name},\n\nThis is to inform you that your lumber permit for "${business}" has expired. Please process your renewal at your earliest convenience.\n\nThank you,\nO-LDPMS`;
            } else { // Nearing Expiration
                modalTitle.textContent = 'Send Renewal Reminder';
                messageText = `Dear ${name},\n\nThis is a friendly reminder that your lumber permit for "${business}" is nearing its expiration date. Please process your renewal soon to ensure continuous validity.\n\nThank you,\nO-LDPMS`;
            }
            document.getElementById('modalMessage').value = messageText;

            modal.classList.remove('hidden');
        }

        function closeModal() {
            modal.classList.add('hidden');
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            sendButton.disabled = true;
            sendButtonText.textContent = 'Sending...';
            sendButtonSpinner.classList.remove('hidden');
            modalFeedback.innerHTML = '';
            const formData = new FormData(form);

            fetch('send_notification.php', { method: 'POST', body: formData })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    modalFeedback.textContent = data.message;
                    modalFeedback.classList.add('text-green-600');
                    setTimeout(closeModal, 2500);
                } else {
                    throw new Error(data.message || 'An unknown error occurred.');
                }
            })
            .catch(error => {
                modalFeedback.textContent = 'Error: ' + error.message;
                modalFeedback.classList.add('text-red-600');
            })
            .finally(() => {
                sendButton.disabled = false;
                sendButtonText.textContent = 'Send Notification';
                sendButtonSpinner.classList.add('hidden');
            });
        });
    </script>
</body>
</html>