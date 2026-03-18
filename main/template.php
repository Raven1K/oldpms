<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/gutenberg-css@0.6">
    <style>
        table {
            width: 100%;
        }
        footer {
			text-color: gray;
			font-size: 8pt;
            text-align: center;
            font-style: italic;
			padding-top : 221pt;
			line-height: 0.5;
        }
        .indented {
			padding-top : -20pt;
			padding-bottom : 15pt;
			padding-left : 30pt;
			padding-right : 10pt;
        }
    </style>
    
</head>
<body class="indented">
	<table>
	<tr>
    <td class="title" style="width:15%;">
    <img src="seal.jpg" style="width: 90%; max-width: 90%;" />
</td>
<td style="width:85%;">
    <center>
        <h3 style="margin: 5px 0;"><strong>Department of Environment and Natural Resources</strong></h3>
        Kagawaran ng Kapaligiran at Likas Yaman<br />
        Caraga Region
    </center>
</td>


<td class="title" style="width:15%;">
    <img src="bagongpilipinas.png" style="width: 120%; max-width: 120px;" />
</td>

    </td>
    </tr>
	</table>
	<!-- <hr style="width:100%;text-align:left;margin-left:0;height:5px;background-color:red;margin-left:-70; padding-left: 150"> -->
    
    <p><strong>MEMORANDUM</strong></p>
	
	 <table>
		 <tr>
		 <td style="width:13%;"><strong>FOR</strong></td>
		 <td style="width:7%;"><strong>:</strong></td>
		 <td style="width:80%;"><strong>THE REGIONAL EXECUTIVE DIRECTOR</strong></td>
		 </tr>
	</table>
	</br>
    <table>
		 <tr>
		 <td style="width:13%;"><strong>FROM</strong></td>
		 <td style="width:7%;"><strong>:</strong></td>
		 <td style="width:80%;"><strong>THE CHIEF, LPDD</strong></td>
		 </tr>
	</table>
	</br>
	<table>
		 <tr>
		 <td style="width:13%;padding-bottom:37px;"><strong>SUBJECT</strong></td>
		 <td style="width:7%;padding-bottom:37px;"><strong>:</strong></td>
		 <td style="width:80%;text-transform:uppercase;text-align:justify;"><strong><?php echo $Status_ ;?> APPLICATION OF <?php echo $ldname; ?> FOR CERTIFICATE OF REGISTRATION AS LUMBER DEALER WITH BUSINESS OPERATION LOCATED AT <?php echo $ldaddress; ?> </strong></td>
		 </tr>
	</table>
    <table>
		 <tr>
		 <td style="width:13%;"><strong>DATE</strong></td>
		 <td style="width:7%;"><strong>:</strong></td>
		 <td style="width:80%;"><strong><?php echo $date ; ?> </strong></td>

		 </tr>
	</table>
   <hr style="width:100%;text-align:left;margin-left:0">

   <dt class="col-sm-3" style="text-align:justify;">This pertains to the above subject <?php echo strtolower($Status_) ;?> application for Certificate of Registration as Lumber Dealer of <strong> <?php echo $ldname; ?></strong> with place of operation at <strong> <?php echo $ldaddress; ?></strong>.</dt>
    <br/>    
   <dt class="col-sm-3">Please be apprised of the following information regarding the subject application:</dt>
<br/>
   <dd class="col-sm-9" style="text-align:justify;">a.) <strong><?php echo $ldname ; ?></strong> is a single proprietor owned and managed by <?php echo $owner ; ?> with a business operation at <strong><?php echo $ldaddress; ?> </strong>. The proponent's objective are: to provide employment opportunities; and to firmly established a functional lumber yard in order to cater lumber needs of the growing economic activity in the locality and other neighboring municipalities and provinces;</dd>
   <br/>
   <dd class="col-sm-9" style="text-align:justify;">b.) The applicant has already secured the required Mayor'/Business Permit from the concerned LGU issued on <?php echo $MPdateissued; ?> valid until <?php echo $MPdateexpiry; ?>; </dd>
   <br/>
   <dd class="col-sm-9" style="text-align:justify;">c.) The proponent submitted the required Business Plan for CY <?php echo date("Y"); ?>;</dd>
   <br/>
    <table border=1>
        <thead>
        <tr class="heading">
				<th>Suppliers</th>
                <th>Species</th>
                <th>Particulars</th>
                <th>Validity</th>
				<th>Volume </n>(bd.ft.)</th>
        </tr>
        </thead>
        <tbody>


 <?php
// Query 1: Get all rows for display
$stmt = $connection->prepare("SELECT lumber_app_id, ownername, bname, Species, other, result, validity_val FROM supp_contdetails WHERE lumber_app_id = ?");
$stmt->execute([$lumber_app_id]);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr class="item">';
    echo '<td style="text-align: center">' . $row['ownername'] . '</td>';
    echo '<td style="text-align: center">' . $row['Species'] . ' ' . $row['other'] . '</td>';
    echo '<td style="text-align: center">Chainsaw Cut</td>';
    echo '<td style="text-align: center">' . $row['validity_val'] . '</td>';
    echo '<td style="text-align: center">' . $row['result'] . '</td>';
    echo '</tr>';
}

// Query 2: Get the total sum
$totalStmt = $connection->prepare("SELECT SUM(result) as total_result FROM supp_contdetails WHERE lumber_app_id = ?");
$totalStmt->execute([$lumber_app_id]);
$totalRow = $totalStmt->fetch(PDO::FETCH_ASSOC);
$totalResult = $totalRow['total_result'] ?? 0;

// Output the total row
echo '<tr class="total">';
echo '<td style="text-align: right"><strong></strong></td>';
echo '<td style="text-align: center"><strong></strong></td>';
echo '<td style="text-align: center"><strong></strong></td>';
echo '<td style="text-align: center"><strong>Total:</strong></td>';
echo '<td style="text-align: center"><strong>' . $totalResult . '</strong></td>';
echo '</tr>';
?>


        </tbody>
    </table>
    <br/>
	<dd class="col-sm-9" style="text-align:justify;">d.) The lumber dealer establishment of <?php echo $ldname; ?> was verified/inspected by the personnel of <?php echo $office ?> per attached geotagged photographs on <?php echo $datevalidation2; ?>.</dd>
	<br/>
	<dd class="col-sm-9" style="text-align:justify;">e.) All the requirements pursuant to Memorandum Order No. 13, Series of 1986 were complied and submitted including the payment of the required fees paid under Official Reciept No. <?php echo $refnumber; ?> date <?php echo $datepaid; ?>, as detailed in the table below:</dd>
	<br/>
    <br/>
	<table border=1>
        <thead>
        <tr class="heading">
				<th>Forestry Administrative Fees</th>
                <th>Reference Number</th>
                <th>Amount</th>
        </tr>
        </thead>
        <tbody>
             <!-- <tr class="item">
                <td style="text-align: center">Processing Fee</td>
                <td style="text-align: center"><?php  $refnumber; ?></td>
                <td style="text-align: center">Php 100.00</td>
            </tr> -->
           <tr class="item">
                <td style="text-align: center">Registration Fee</td>
                <td style="text-align: center"><?php echo $refnumber; ?></td>
                <td style="text-align: center">Php 600.00</td>
            </tr>

            <tr class="item">
                <td style="text-align: center">Permit Fee</td>
                <td style="text-align: center"><?php echo $refnumber; ?></td>
                <td style="text-align: center">Php 480.00</td>
            </tr>

           <tr class="item">
                <td style="text-align: center">Oath Fee</td>
                <td style="text-align: center"><?php echo $refnumber; ?></td>
                <td style="text-align: center">Php 36.00</td>
            </tr>
            <tr class="item">
                <td style="text-align: center">Cash Bond</td>
                <td style="text-align: center"><?php echo $refnumber; ?></td>
                <td style="text-align: center">Php <?php echo $cashbond; ?>.00</td>
            </tr>

            <tr class="total">
					<td style="text-align: right"><strong></strong></td>
                    <td style="text-align: center"><strong>Total:</strong></td>
					<td style="text-align: center"><strong>Php <?php echo $Amount_Decimal ; ?></strong></td>
			</tr>
        </tbody>
    </table>
	<br/>
	<p><strong>COMMENTS/RECOMMENDATIONS:</strong></p>
    	
	<dt class="col-sm-3" style="text-align:justify;">The approval of the new application of Certificate of Registration as Lumber Dealer is vested with the Regional Executive Director pursuant to DAO No. 2022-10 dated May 30, 2022 (Revised DENR Manual of Authority on Technical Matters).</dt>
	<br/>
	<dt class="col-sm-3" style="text-align:justify;">In view of the above information and based on the favorable recommendation of the PENRO and CENRO concerned, this Office is recommending for approval of the subject application. Should you concur, attached are the prepared Lumber Supply Contracts and Certificate of Registration as Lumber Dealer for a duration of one (1) year.</dt>
	<br/>
	<dt class="col-sm-3">For information and approval.</dt>
	<br/>
	<br/>
	<br/>


    <?php

if (($Flow_stat) >= ('16')) {
    echo '<img src="garcia.jpg"  class="align padding-right"style="width: 600%; max-width: 600px" />';
}



?>

<!-- <a href="../admin/uploads/TS.png" -->
    <!-- <p align="left"><strong>MARITESS M. OCAMPO</strong></p> -->
<footer>
<p>DENR-13, Ambago, Butuan City, Philippines</p>
<p>Telephone Nos. (085) 8171545 E-Mail: ordcaraga@gmail.com</p>
</footer>

   
</body>
</html>