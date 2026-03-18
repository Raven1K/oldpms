

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
<!--    <link rel="stylesheet" href="https://unpkg.com/gutenberg-css@0.6">-->
		

	  <style>
		.qr-code {
		  max-width: 200px;
		  margin: 10px;
		}
	  </style>
    <style>
		#example1 {
  
		  background: url("img/backdropseal.png");
		  background-size: 600px 600px;
		  background-repeat: no-repeat;
		  background-position: center;

		}

		#example2 {
/* sig source */
		  background: url(img/RED_OCAMPO.png); 
		  background-repeat: no-repeat;
		  background-size: 170px 170px;
		  background-position: 700px 60px;

		}
		
        table {
            width: 100%;
        }
        footer {
			text-color: gray;
			font-size: 8pt;
            text-align: center;
            font-style: italic;
			padding-top : 5pt;
			line-height: 0.5;
        }
        .indented {
			size: A4;
    		margin: 2mm 2mm 2mm 2mm;
        }
		table.center {
  			margin-left: auto; 
  			margin-right: auto;
		}
		.qr-code {
			  max-width: 60px;
			  margin: 1px;
			}
    </style>
    
</head>
<body >
<div id="example1">
	
<table border="7">

	
	<table border="0">
		
		<tr>
			<td style="width: 24%;"></td>
			<td style="width: 20%; text-align: center"><img src="img/seal.jpg" style="max-width: 60px; vertical-align: middle;" /></td>
			<td style="width: 50%;">
    			<h4 style="width:100%; text-align: center; font-size: 14px; vertical-align: middle; white-space: nowrap;" >Republic of the Philippines </br>
					<STRONG>DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</STRONG> </br>
							Caraga Region 
		</h4>
			</td>		
			<td style="width: 20%; text-align: right"><img src="img/bagongpilipinas.png" style="max-width: 90px; vertical-align: middle;" /></td>	
			<td style="width: 25%;"></td>
		</tr>
		
    </table>
	<table border="0">
		<tr>
		 <td style="width: 20%;"></td>
		 <td style="width: 60%;">
		 <h3 style="width:100%; text-align: center; line-height: 0px"><strong>CERTIFICATE OF REGISTRATION</strong></h3>
		 <p style="width:100%; text-align: center; font-size: 17px; line-height: 12px">Registration No. <strong><u><?php echo $regnumber;?> (<?php echo $status ; ?>)</u></strong></p>
		 <p style="width:100%; text-align: center; line-height: 5px; font-size: 13px">This is to certify that,</p>
		 </td>
		 <td style="width: 20%;" style="background-image:url('records.png'); background-size: 200px 90px; background-repeat: no-repeat;">
		 <p style="text-align: left; padding-top: 48px; padding-left: 65px; line-height: 10px; font-size: 10px"> <?php echo $date; ?></br>
			GANDE G. BAGOT </br>
					LD-<?php echo date("Y") . "-"; ?><?php echo $lumber_app_id; ?>
			 </p>
		 </td>
		</tr>
	</table>
	
		 <h3 style="width:100%;text-align: center; text-transform: uppercase; line-height: 5px;"><u><strong><?php echo $ldname ; ?></strong></strong></u></h3>
		 
		 <p style="width:100%;text-align: center; line-height: 0px; font-size: 12px">(Business Name)</p>
		 
		 <p style="width:100%;text-align: center; font-size: 15px">Represented by its owner, Mr./Ms. <u><strong> <?php echo $owner; ?> </strong></u>, a Filipino citizen of <u><strong> <?php echo $ldaddress; ?> </strong></u> that has been registered in this office as</p>
		 <h3 style="width:100%;text-align: center; line-height: 10px;"><strong><u>LUMBER DEALER</u></strong></h3>
	
	<p style="font-size: 15px; text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pursuant to the pertinent provisions of Presidential Decree 705, as amended, in accordance with the provisions of Republic Act No. 1239, and the regulations promulgated thereto, subject to the terms and conditions enumerated in the succeeding pages, and such other additional regulation which may herein after be prescribed. The registrant has lumber supply contract(s) with the following:</p>
	
	<table border=0 class="center" style="width:70%; font-size: 10px">
        <thead>
        <tr class="heading">
			<th style="font-size: 12px; text-align: center">SUPPLIERS </br> NAME/COMPANY</th>
			<th style="font-size: 12px; text-align: center">VOLUME FOR DISPOSITION </br> (BD.FT.)</th>
        </tr>
        </thead>

        <tbody>
			<?php

$stmt = $connection->query("SELECT lumber_app_id, ownername, bname, Species, other, result, validity_val
FROM supp_contdetails 
where lumber_app_id  = '$lumber_app_id'


");

// while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	            echo '<tr class="item">';
	            echo '<td style="text-align: center"><u>'.$row['ownername']. ' - ' . $row['bname'].' </u></td>';
	            echo '<td style="text-align: center"><u>'.$row['result'].' '.'board feet of Chainsaw-cut lumbers of '.' ' .$row['Species'].'</u></td>';
	            echo '</tr>';
            }
			?>
        </tbody>

    </table>
	<p style="text-align:justify; font-size: 15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The place of its/his/her business operation is in <u><strong><?php echo $ldaddress; ?></strong></u>. This Certificate of Registration is non-negotiable and non-transferable and, unless sooner terminated, will expire on <u><strong><?php echo date('F d, Y', strtotime($date_release . ' + 1 year')); ?></strong></u>.</p>
	<p style="text-align:justify; font-size: 15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued on <u><strong> <?php echo $date; ?> </strong></u> at <u><strong>Ambago, Butuan City, Agusan del Norte, Philippines</strong></u>.</p>
<div id="example2">	
	<table border=0 class="center" style="width:90%">
		<tr>
			<td style="width:10%"><p style="font-size: 10px">Bond (Cash) No. </br> Date:</p> </td>
			<td style="width:10%"><p style="font-size: 10px"><u>PHP <?php echo $cashbond ; ?>.00</u> </br> <u><?php echo $datepaid; ?></u></p> </td>
			<td style="width:15%"></td>
			<td style="width:10%;"></td>
			<td style="width:15%"></td>
			
			<?php
			echo '<td style="width:10%; align:right">' ;
			// echo('<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$regnumber.'" class="img-fluid" alt="QR Not available" style="align: right;" width="70" height="70"');

            echo '</td>';

			echo '<td style="width:10%; align:left">' ;
			// echo('<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$regnumber.'" class="img-fluid" alt="QR Not available" style="align: right;" width="85" height="85"');
			// echo('<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$regnumber.'" class="img-fluid" alt="QR Not available" style="align: right;border:1px solid black;" width="85" height="85"');
			echo('<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='.$regnumber.'" class="img-fluid" alt="QR Not available" style="align: right;border:1px solid black;" width="85" height="85"');
			echo '</td>';

			?>
		
		</tr>
		



		<tr>
			<td style="width:10%"> <p style="font-size: 10px"> Application Fee: </br>
					 Reference No. </br>
					 Date:
				</p>
		    </td>
			<td style="width:10%"> <p style="font-size: 10px"> PHP 600.00 </br>
					<?php echo $refnumber; ?> </br>
					<?php echo $datepaid; ?>  
				</p>
			</td>
			
			<td style="width:15%"> 
				<p style="font-size: 10px"> Registration Fee: </br>
					 Reference No. </br>
					 Date:
				 </p>
			</td>
			<td style="width:10%"> <p style="font-size: 10px"> PHP 480.00 </br>
					<?php echo $refnumber; ?> </br>
					<?php echo $datepaid; ?>  
				</p>
			</td>
			<td style="width:20%"></td>
			<td style="width:40%; align-content: center">
				
				<p align="center" style="padding-right: 70px; font-size: 15px"><u><strong>MARITES M. OCAMPO</strong></u> </br>
																						OIC, Regional Executive Director
			</tr>
		</table>
	</div>
</table>
</div>
<!-- Script for QR Code -->
	  <script src="https://code.jquery.com/jquery-3.5.1.js">
	  </script>

	  
<!-- Script for QR Code -->
</body>
</html>