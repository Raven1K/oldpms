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
  
		  background: url("backdropseal.png");
		  background-size: 600px 600px;
		  background-repeat: no-repeat;
			background-position: center;

		}

		#example2 {

		  background: url(RED.png);
		  background-repeat: no-repeat;
		  background-size: 80px 80px;
			background-position: 655px 30px;

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
			<td style="width: 10%;"></td>
			<td style="width: 20%; text-align: right"><img src="seal3.png" style="max-width: 60px; vertical-align: middle;" /></td>
			<td style="width: 50%;">
    			<p style="width:100%; text-align: center; font-size: 14px; vertical-align: middle;">Republic of the Philippines </br>
					<STRONG>DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</STRONG> </br>
							Caraga Region 
				</p>
			</td>			
			<td style="width: 25%;"></td>
		</tr>
		
    </table>
	<table border="0">
		<tr>
		 <td style="width: 20%;"></td>
		 <td style="width: 60%;">
		 <h2 style="width:100%; text-align: center; line-height: 0px"><strong>CERTIFICATE OF REGISTRATION</strong></h2>
		 <p style="width:100%; text-align: center; font-size: 17px; line-height: 12px">Registration No. <strong><u>{{regnumber}} ({{status}})</u></strong></p>
		 <p style="width:100%; text-align: center; line-height: 5px; font-size: 13px">This is to certify that,</p>
		 </td>
		 <td style="width: 20%;" style="background-image:url('records/records.png'); background-size: 200px 90px; background-repeat: no-repeat;"><p style="text-align: left; padding-top: 48px; padding-left: 65px; line-height: 10px; font-size: 10px"> {{date}} </br>
					  {{LD-random}}-{{signature}}
			 
			 </p>
		 </td>
		</tr>
	</table>
	
		 <h3 style="width:100%;text-align: center; text-transform: uppercase; line-height: 5px;"><u><strong>{{ldname}}</strong></strong></u></h3>
		 
		 <p style="width:100%;text-align: center; line-height: 0px; font-size: 12px">(Business Name)</p>
		 
		 <p style="width:100%;text-align: center; font-size: 15px">Represented by its owner, Mr./Ms. <u><strong>{{owner}}</strong></u>, a Filipino citizen of <u><strong>{{ldaddress}}</strong></u> that has been registered in this office as</p>
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
             <tr class="item">
                <td style="text-align: left"><u>{{lsname}} {{SCtype}} {{SCregnumber}}</u></td>
                <td style="text-align: left"><u>{{volume}} board feet of Chainsaw-cut lumbers of {{treespecie}}</u></td>
            </tr>
           <tr class="item">
                <td style="text-align: left"><u>{{lsname}} {{SCtype}} {{SCregnumber}}</u></td>
                <td style="text-align: left"><u>{{volume}} board feet of Chainsaw-cut lumbers of {{treespecie}}</u></td>
            </tr>
			<tr class="item">
                <td style="text-align: left"><u>{{lsname}} {{SCtype}} {{SCregnumber}}</u></td>
                <td style="text-align: left"><u>{{volume}} board feet of Chainsaw-cut lumbers of {{treespecie}}</u></td>
            </tr>
        </tbody>
    </table>
	<p style="text-align:justify; font-size: 15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The place of its/his/her business operation is in <u><strong>{{ldaddress}}</strong></u>. This Certificate of Registration is non-negotiable and non-transferable and, unless sooner terminated, will expire on <u><strong>{{dateexpiry}}</strong></u>.</p>
	<p style="text-align:justify; font-size: 15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued on <u><strong>{{dateissued}}</strong></u> at <u><strong>Ambago, Butuan City, Agusan del Norte, Philippines</strong></u>.</p>
<div id="example2">	
	<table border=0 class="center" style="width:90%">
		<tr>
			<td style="width:10%"> <p style="font-size: 10px">Bond (Cash) No. </br> Date:</p> </td>
			<td style="width:10%"> <p style="font-size: 10px"><u>PHP 1,000.00</u> </br> <u>{{datepaid}}</u></p> </td>
			<td style="width:15%"></td>
			<td style="width:10%;"></td>
			<td style="width:15%"></td>
			<td style="width:10%"></td> <img src=
								"https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
										class="qr-code img-thumbnail img-responsive" /> </td>
		</tr>
		<tr>
			<td style="width:10%"> <p style="font-size: 10px"> Application Fee: </br>
					 Reference No. </br>
					 Date:
				</p>
		    </td>
			<td style="width:10%"> <p style="font-size: 10px"> PHP 600.00 </br>
					 {{refnumber}} </br>
					 {{datepaid}} 
				</p>
			</td>
			
			<td style="width:15%"> 
				<p style="font-size: 10px"> Registration Fee: </br>
					 Reference No. </br>
					 Date:
				 </p>
			</td>
			<td style="width:10%"> <p style="font-size: 10px"> PHP 480.00 </br>
					 {{refnumber}} </br>
					 {{datepaid}}
				</p>
			</td>
			<td style="width:15%"></td>
			<td style="width:40%; align-content: center">
				
				<p align="center" style="padding-right: 70px; font-size: 15px"><u><strong>NONITO M. TAMAYO, CESO III</strong></u> </br>
																						Regional Executive Director
			</tr>
		</table>
	</div>
</table>
</div>
<!-- Script for QR Code -->
	  <script src=
		"https://code.jquery.com/jquery-3.5.1.js">
	  </script>

	  
<!-- Script for QR Code -->
</body>
</html>