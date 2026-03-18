<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumber Dealer QR Scanner | DENR</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/instascan/1.0.0/instascan.min.js"></script>
    <style>
        :root {
            --denr-primary: #2c6e49;
            --denr-secondary: #4c956c;
            --denr-light: #fefee3;
            --denr-accent: #d68c45;
            --denr-dark: #1d3c2c;
        }
        
   
        .denr-bg-primary {
            background-color: var(--denr-primary) !important;
        }
        
        .denr-text-primary {
            color: var(--denr-primary) !important;
        }
        
        .scanner-container {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            background: #000;
            height: 380px;
        }
        
        #preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .scanner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 10;
        }
        
        .scan-frame {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70%;
            height: 70%;
            max-width: 280px;
            max-height: 280px;
            border: 3px solid var(--denr-accent);
            border-radius: 8px;
            box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
        }
        
        .scan-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--denr-accent);
            animation: scan 2.5s infinite linear;
            box-shadow: 0 0 10px rgba(214, 140, 69, 0.5);
        }
        
        @keyframes scan {
            0% { top: 0; }
            50% { top: calc(100% - 3px); }
            100% { top: 0; }
        }
        
        .frame-corner {
            position: absolute;
            width: 25px;
            height: 25px;
            border: 3px solid var(--denr-accent);
        }
        
        .top-left { top: -3px; left: -3px; border-right: none; border-bottom: none; }
        .top-right { top: -3px; right: -3px; border-left: none; border-bottom: none; }
        .bottom-left { bottom: -3px; left: -3px; border-right: none; border-top: none; }
        .bottom-right { bottom: -3px; right: -3px; border-left: none; border-top: none; }
        
        .result-card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            background: #fff;
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        .result-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .action-btn {
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
        }
        
        .section-header {
            border-bottom: 2px solid var(--denr-primary);
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: var(--denr-dark);
            font-weight: 600;
        }
        
        .info-card {
            border-left: 4px solid var(--denr-secondary);
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .info-label {
            font-weight: 600;
            color: var(--denr-dark);
            margin-bottom: 3px;
            font-size: 0.9rem;
        }
        
        .info-value {
            font-size: 1.05rem;
            color: #333;
            margin-bottom: 15px;
        }
        
        .scanner-header {
            background: linear-gradient(135deg, var(--denr-primary), var(--denr-secondary));
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 15px 20px;
            font-weight: 600;
            text-align: center;
            font-size: 1.2rem;
        }
        
        .alert-position {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000;
            max-width: 400px;
        }
        
        .scan-instructions {
            background: var(--denr-light);
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
            border: 1px solid rgba(44, 110, 73, 0.2);
        }
        
        .info-icon {
            width: 40px;
            height: 40px;
            background: rgba(76, 149, 108, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--denr-secondary);
        }
        
        .modal-content {
            border-radius: 12px;
            overflow: hidden;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--denr-primary), var(--denr-secondary));
            color: white;
            border-bottom: none;
        }
        
        .qr-input-group {
            border-radius: 50px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }
        
        .qr-input-group .form-control {
            border: none;
            padding-left: 20px;
            height: 50px;
        }
        
        .qr-input-group .btn {
            border-radius: 0 50px 50px 0;
            padding: 0 25px;
            height: 50px;
            background: var(--denr-primary);
            border: none;
        }
        
        .camera-selector {
            position: absolute;
            bottom: 15px;
            right: 15px;
            z-index: 100;
            background: rgba(255,255,255,0.9);
            border-radius: 50px;
            padding: 5px 10px;
            font-size: 0.9rem;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .camera-selector:hover {
            background: white;
        }
    </style>
</head>
<body>
	<div class="container py-4">
		<div class="row mb-4">
			<div class="col-12 text-center">
				<div class="d-flex align-items-center justify-content-center mb-3">
					<h1 class="m-0" style="color: var(--denr-dark);">Lumber Dealer Registration Scanner</h1>
				</div>
				<p class="text-muted">Scan QR codes to verify lumber dealer registration details</p>
			</div>
		</div>

		<div class="alert-position">
			<?php
			if(isset($_SESSION['error'])){
				echo '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fas fa-exclamation-circle me-2"></i>
					'.$_SESSION['error'].'
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				';
				unset($_SESSION['error']);
			}
			if(isset($_SESSION['success'])){
				echo '
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fas fa-check-circle me-2"></i>
					'.$_SESSION['success'].'
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				';
				unset($_SESSION['success']);
			}
			?>
		</div>

		<div class="row">
			<div class="col-lg-5 mb-4">
				<div class="scanner-container">
					<div class="scanner-header">
						<i class="fas fa-camera me-2"></i> SCANNER
					</div>
					<video id="preview"></video>
					<div class="scanner-overlay">
						<div class="scan-frame">
							<div class="scan-line"></div>
							<div class="frame-corner top-left"></div>
							<div class="frame-corner top-right"></div>
							<div class="frame-corner bottom-left"></div>
							<div class="frame-corner bottom-right"></div>
						</div>
					</div>
					<div class="camera-selector" id="cameraSelector">
						<i class="fas fa-camera me-1"></i> Switch Camera
					</div>
				</div>
				
				<div class="scan-instructions mt-3">
					<div class="d-flex align-items-center mb-2">
						<div class="info-icon">
							<i class="fas fa-lightbulb"></i>
						</div>
						<h5 class="m-0">Scanning Tips</h5>
					</div>
					<ul class="mb-0">
						<li>Position QR code within the frame</li>
						<li>Ensure adequate lighting in the area</li>
						<li>Hold device steady for better detection</li>
						<li>Move closer if code is not detected</li>
					</ul>
				</div>
			</div>
			
			<div class="col-lg-7">
				<div class="card border-0 shadow-sm mb-4">
					<div class="card-header bg-white">
						<h3 class="m-0"><i class="fas fa-qrcode text-primary me-2"></i> Scan Results</h3>
					</div>
					<div class="card-body">
						<form method="post" class="mb-4">
							<div class="mb-3">
								<label class="form-label fw-bold">SCAN QR CODE</label>
								<div class="qr-input-group input-group">
									<input type="text" name="studentID" id="text" placeholder="Enter registration number or scan QR code" class="form-control" autofocus>
									<button class="btn btn-primary" type="submit">
										<i class="fas fa-search me-1"></i> Search
									</button>
								</div>
							</div>
						</form>
						
						<?php
						if(isset($_POST['studentID'])){
							// Include database configuration
							include('../../processphp/config.php');
							$reg_id = $_POST['studentID'];
							
							if($con->connect_error){
								die("Connection failed" .$con->connect_error);
							}
							
							$lumber_app = "SELECT * FROM lumber_application WHERE Registration_Number = '$reg_id'";
							$lumber_app_qry = mysqli_query($con, $lumber_app);
							$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
							
							if($lumber_ap_row) {
								$lumber_owner = $lumber_ap_row['perm_fname']. ' ' . $lumber_ap_row['perm_lname'];
								$lumber_dealer_address = $lumber_ap_row['full_address'];
								$lumber_app_id = $lumber_ap_row['lumber_app_id'];
								
								$lumber_app = "SELECT * FROM lumber_dealer_e_permit_form WHERE lumber_app_id = $lumber_app_id";
								$lumber_app_qry = mysqli_query($con, $lumber_app);
								$lumber_ap_row3 = mysqli_fetch_assoc($lumber_app_qry);
								
								$date_issued_date = $lumber_ap_row3['date'];
								$date_gen_issued = date_create($date_issued_date);
								date_add($date_gen_issued, date_interval_create_from_date_string("0 days"));
								$date_issued = date_format($date_gen_issued, "F d, Y");
								
								$date_gen = date_create($date_issued);
								date_add($date_gen, date_interval_create_from_date_string("365 days"));
								$dateexpiry = date_format($date_gen, "F d, Y");

								// Store recent scan in session
								$recent_scan = [
									'time' => date('h:i A'),
									'reg_id' => $reg_id,
									'business_name' => $lumber_ap_row['business_name'] ?? $lumber_owner,
									'status' => 'Active'
								];
								if(!isset($_SESSION['recent_scans'])) $_SESSION['recent_scans'] = [];
								array_unshift($_SESSION['recent_scans'], $recent_scan);
								$_SESSION['recent_scans'] = array_slice($_SESSION['recent_scans'], 0, 10); // Keep only last 10
						?>
						<div class="result-card p-4">
							<div class="d-flex justify-content-between align-items-center mb-4">
								<h4 class="m-0 text-primary">Registration Details</h4>
								<span class="status-badge bg-success text-white">
									<i class="fas fa-check-circle me-1"></i> Valid Registration
								</span>
							</div>
							
							<div class="info-card mb-4">
								<h5 class="section-header">Business Information</h5>
								<div class="mb-3">
									<div class="info-label">Registration Number</div>
									<div class="info-value"><?php echo htmlspecialchars($reg_id); ?></div>
								</div>
								<div class="mb-3">
									<div class="info-label">Lumber Dealer Owner</div>
									<div class="info-value"><?php echo htmlspecialchars($lumber_owner); ?></div>
								</div>
								<div class="mb-3">
									<div class="info-label">Business Address</div>
									<div class="info-value"><?php echo htmlspecialchars($lumber_dealer_address); ?></div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="info-card h-100">
										<div class="info-label">Date of Issuance</div>
										<div class="info-value"><?php echo htmlspecialchars($date_issued); ?></div>
										<div class="small text-muted">Permit issued on this date</div>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="info-card h-100">
										<div class="info-label">Date of Expiry</div>
										<div class="info-value"><?php echo htmlspecialchars($dateexpiry); ?></div>
										<div class="small text-muted">Valid for 1 year from issuance</div>
									</div>
								</div>
							</div>
							
							<div class="d-flex justify-content-end mt-3">
								<button class="btn btn-primary action-btn me-2" data-bs-toggle="modal" data-bs-target="#detailsModal">
									<i class="fas fa-file-alt me-1"></i> View Full Details
								</button>
								<button class="btn btn-outline-primary action-btn">
									<i class="fas fa-download me-1"></i> Export 
								</button>
							</div>
						</div>
						<?php } else { ?>
						<div class="result-card p-4 text-center">
							<div class="py-4">
								<i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
								<h4 class="text-danger">Registration Not Found</h4>
								<p class="mb-0">No records found for registration number: <?php echo htmlspecialchars($reg_id); ?></p>
							</div>
						</div>
						<?php 
							// Store failed scan in session
							$recent_scan = [
								'time' => date('h:i A'),
								'reg_id' => $reg_id,
								'business_name' => '-',
								'status' => 'Not Found'
							];
							if(!isset($_SESSION['recent_scans'])) $_SESSION['recent_scans'] = [];
							array_unshift($_SESSION['recent_scans'], $recent_scan);
							$_SESSION['recent_scans'] = array_slice($_SESSION['recent_scans'], 0, 10);
						}
						} else { ?>
						<div class="result-card p-4 text-center">
							<div class="py-4">
								<i class="fas fa-qrcode fa-3x text-muted mb-3"></i>
								<h4>Scan a QR Code</h4>
								<p class="mb-0">Scan a lumber dealer registration QR code to view details</p>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				
				<div class="card border-0 shadow-sm">
					<div class="card-header bg-white">
						<h3 class="m-0"><i class="fas fa-history text-primary me-2"></i> Recent Scans</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Time</th>
										<th>Registration #</th>
										<th>Business Name</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(isset($_SESSION['recent_scans']) && count($_SESSION['recent_scans']) > 0){
										foreach($_SESSION['recent_scans'] as $scan){
											echo '<tr>
												<td>'.htmlspecialchars($scan['time']).'</td>
												<td>'.htmlspecialchars($scan['reg_id']).'</td>
												<td>'.htmlspecialchars($scan['business_name']).'</td>
												<td><span class="badge '.($scan['status']=='Active' ? 'bg-success' : ($scan['status']=='Not Found' ? 'bg-danger' : 'bg-warning')).'">'.htmlspecialchars($scan['status']).'</span></td>
											</tr>';
										}
									} else {
										echo '<tr><td colspan="4" class="text-center text-muted">No recent scans yet.</td></tr>';
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="max-width: 90vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">
                        <i class="fas fa-file-contract me-2"></i> Lumber Dealer Registration Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body p-0" style="height: 80vh;">
                    <?php if(isset($lumber_app_id)) { ?>
                    <iframe src="records/generate_viewLumberEdealer.php?lumber_app_id=<?php echo htmlspecialchars($lumber_app_id); ?>" frameborder="0" width="100%" height="100%" style="min-height: 100%;"></iframe>
                    <?php } else { ?>
                    <div class="text-center py-5">
                        <i class="fas fa-exclamation-circle fa-3x text-warning mb-3"></i>
                        <h4>No Registration Selected</h4>
                        <p>Please scan a valid QR code first</p>
                    </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-print me-1"></i> Print
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize scanner
            let scanner = null;
            let cameras = [];
            let currentCameraIndex = 0;
            
            // Function to initialize scanner
            function initScanner(cameraIndex = 0) {
                if (scanner) {
                    scanner.stop();
                }
                
                scanner = new Instascan.Scanner({ 
                    video: document.getElementById('preview'),
                    mirror: false // Set to false if the camera image appears mirrored
                });
                
                Instascan.Camera.getCameras().then(function(camerasList) {
                    cameras = camerasList;
                    if (cameras.length > 0) {
                        scanner.start(cameras[cameraIndex]);
                        currentCameraIndex = cameraIndex;
                    } else {
                        console.error('No cameras found');
                        // Optionally display a message to the user that no camera was found
                    }
                }).catch(function(e) {
                    console.error(e);
                    // Handle camera access errors (e.g., permissions)
                });
                
                scanner.addListener('scan', function(c) {
                    document.getElementById('text').value = c;
                    document.forms[0].submit(); // Automatically submit the form on scan
                });
            }
            
            // Initialize with the first camera
            initScanner();
            
            // Camera switcher
            document.getElementById('cameraSelector').addEventListener('click', function() {
                if (cameras.length > 1) {
                    let nextIndex = (currentCameraIndex + 1) % cameras.length;
                    initScanner(nextIndex);
                } else {
                    alert('Only one camera detected.');
                }
            });
            
            // Update live time display
            function updateTime() {
                const now = new Date();
                const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }); // e.g., 10:30 AM
                document.getElementById('time').textContent = timeString;
            }
            
            // Initialize and update time every second
            updateTime();
            setInterval(updateTime, 1000);

            // Hide alerts after a few seconds
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000); // 5000 milliseconds = 5 seconds
        });

        // Placeholder for Export function (from original code, not fully implemented here)
        function Export() {
            var conf = confirm("Please confirm if you wish to proceed in exporting the attendance in to Excel File");
            if(conf == true) {
                window.open("export.php",'_blank');
            }
        }
    </script>
</body>
</html>