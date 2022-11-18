<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/gutenberg-css@0.6">
    <style>
		#example1 {
  
		  background: url("img/lpddchief.png");
		  background-size: 20px 20px;
		  background-repeat: no-repeat;
			background-position: 40px 320px;

		}
		#example2 {
		  background: url("img/ardts.png");
		  background-repeat: no-repeat;
		  background-size: 80px 80px;
			background-position: 50px 120px;

		}
        table {
            width: 90%;
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
        <img src="img/seal.jpg" style="width: 100%; max-width: 100px" />
        </td>
        <td style="width:85%;">
        <h3><strong>Department of Environment and Natural Resources<br />
		Caraga Region</strong></h3>
    </td>
    </tr>
	</table>
	<hr style="width:100%;text-align:left;margin-left:0;height:5px;background-color:maroon;margin-left:-70; padding-left: 150">
    
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
		 <td style="width:80%;"><strong>THE OIC, ARD FOR TECHNICAL SERVICES</strong></td>
		 </tr>
	</table>
	</br>
	<table>
		 <tr>
		 <td style="width:13%;padding-bottom:37px;"><strong>SUBJECT</strong></td>
		 <td style="width:7%;padding-bottom:37px;"><strong>:</strong></td>
		 <td style="width:80%;text-transform:uppercase;text-align:justify;"><strong>NEW APPLICATION OF {{ldname}} FOR CERTIFICATE OF REGISTRATION AS LUMBER DEALER WITH BUSINESS OPERATION LOCATED AT {{ldaddress}}</strong></td>
		 </tr>
	</table>
    <table>
		 <tr>
		 <td style="width:13%;"><strong>DATE</strong></td>
		 <td style="width:7%;"><strong>:</strong></td>
		 <td style="width:80%;"><strong>{{date}}</strong></td>
		 </tr>
	</table>
   <hr style="width:100%;text-align:left;margin-left:0">

   <dt class="col-sm-3" style="text-align:justify;">This pertains to the above subject new application for Certificate of Registration as Lumber Dealer of <strong>{{ldname}}</strong> with place of operation at <strong>{{ldaddress}}</strong>.</dt>
    <br/>    
   <dt class="col-sm-3">Please be apprised of the following information regarding the subject application:</dt>
<br/>
   <dd class="col-sm-9" style="text-align:justify;">a.) <strong>{{ldname}}</strong> is a single proprietor owned and managed by {{owner}} with a business operation at <strong>{{ldaddress}}</strong>. The proponent's objective are: to provide employment opportunities; and to firmly established a functional lumber yard in order to cater lumber needs of the growing economic activity in the locality and other neighboring municipalities and provinces;</dd>
   <br/>
   <dd class="col-sm-9" style="text-align:justify;">b.) The applicant has already secured the required Mayor'/Business Permit from the concerned LGU issued on {{MPdateissued}} valid until {{MPdateexpiry}}. The proponent's business trade name was also registered with the Dapartment of Trade and Industry (DTI) with Business Name No. {{BNNumber}} issued on {{DTIdateissued}} valid until {{DTIdateexpiry}};</dd>
	<br/>
   <dd class="col-sm-9" style="text-align:justify;">c.) Under this application, the proponent has entered Lumber Supply Contracts with the legitimate {{SCtype}} holders of {{municipal}},  {{province}} covering {{totalsupply}} board feet of {{particulars}} of {{treespecie}} for your approval, as detailed in the table</dd>
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
             <tr class="item">
                <td style="text-align: center">{{lsname}}</td>
                <td style="text-align: center">{{treespecie}}</td>
                <td style="text-align: center">{{particulars}}</td>
				<td style="text-align: center">{{yrvalidity}}</td>
				<td style="text-align: center">{{volume}}</td>
            </tr>
           <tr class="item">
                <td style="text-align: center">{{lsname}}</td>
                <td style="text-align: center">{{treespecie}}</td>
                <td style="text-align: center">{{particulars}}</td>
				<td style="text-align: center">{{yrvalidity}}</td>
				<td style="text-align: center">{{volume}}</td>
            </tr>
           <tr class="item">
                <td style="text-align: center">{{lsname}}</td>
                <td style="text-align: center">{{treespecie}}</td>
                <td style="text-align: center">{{particulars}}</td>
				<td style="text-align: center">{{yrvalidity}}</td>
				<td style="text-align: center">{{volume}}</td>
            </tr>
            <tr class="item">
                <td style="text-align: center">{{lsname}}</td>
                <td style="text-align: center">{{treespecie}}</td>
                <td style="text-align: center">{{particulars}}</td>
				<td style="text-align: center">{{yrvalidity}}</td>
				<td style="text-align: center">{{volume}}</td>
            </tr>
            <tr class="item">
                <td style="text-align: center">{{lsname}}</td>
                <td style="text-align: center">{{treespecie}}</td>
                <td style="text-align: center">{{particulars}}</td>
				<td style="text-align: center">{{yrvalidity}}</td>
				<td style="text-align: center">{{volume}}</td>
            </tr>
            <tr class="total">
					<td style="text-align: right"><strong></strong></td>
                    <td style="text-align: center"><strong></strong></td>
					<td style="text-align: center"><strong></strong></td>
					<td style="text-align: center"><strong>Total:</strong></td>
					<td style="text-align: center"><strong></strong></td>
				</tr>
        </tbody>
    </table>
    <br/>   
    <dd class="col-sm-9" style="text-align:justify;">Per Certification issued by the concerned CENRO dated {{lsdateissued}}, the total volume as shown in the table above are still intact/available in the area;</dd>
    <br/>
	<dd class="col-sm-9" style="text-align:justify;">d.) The lumber dealer and furniture shop establishment of {{ldname}} were verified/inspected by the personnel of CENRO {{office}} per attached geotagged photographs on {{datevalidation}}.</dd>
	<br/>
	<dd class="col-sm-9" style="text-align:justify;">e.) All the requirements pursuant to Memorandum Order No. 13, Series of 1986 were complied and submitted including the payment of the required fees paid under Official Reciept No. {{refnumber}} date {{datepaid}}, as detailed in the table below:</dd>
	<br/>
	<table border=1>
        <thead>
        <tr class="heading">
				<th>Forestry Administrative Fees</th>
                <th>Official Receipt No.</th>
                <th>Amount</th>
        </tr>
        </thead>
        <tbody>
             <tr class="item">
                <td style="text-align: center">Application Fee</td>
                <td style="text-align: center">{{refnumber}}</td>
                <td style="text-align: center">Php 600.00</td>
            </tr>
           <tr class="item">
                <td style="text-align: center">Registration Fee</td>
                <td style="text-align: center">{{refnumber}}</td>
                <td style="text-align: center">Php 480.00</td>
            </tr>
           <tr class="item">
                <td style="text-align: center">Oath Fee</td>
                <td style="text-align: center">{{refnumber}}</td>
                <td style="text-align: center">Php 36.00</td>
            </tr>
            <tr class="item">
                <td style="text-align: center">Performance Bond</td>
                <td style="text-align: center">{{refnumber}}</td>
                <td style="text-align: center">Php 1,000.00</td>
            </tr>
            <tr class="total">
					<td style="text-align: right"><strong></strong></td>
                    <td style="text-align: center"><strong>Total:</strong></td>
					<td style="text-align: center"><strong>Php 2,116.00</strong></td>
			</tr>
        </tbody>
    </table>
	<br/>
	<div id="example1">
	<p><strong>COMMENTS/RECOMMENDATIONS:</strong></p>
    	
	<dt class="col-sm-3" style="text-align:justify;">The approval of the new application of Certificate of Registration as Lumber Dealer is vested with the Regional Executive Director pursuant to DAO No. 2022-10 dated May 30, 2022 (Revised DENR Manual of Authority on Technical Matters).</dt>
	<br/>
	<div id="example2">
	<dt class="col-sm-3" style="text-align:justify;">In view of the above information and based on the favorable recommendation of the PENRO and CENRO concerned, this Office is recommending for approval of the subject application. Should you concur, attached are the prepared Lumber Supply Contracts and Certificate of Registration as Lumber Dealer for a duration of one (1) year.</dt>
	<br/>
	<dt class="col-sm-3">For information and approval.</dt>
	<br/>
	<br/>
	<br/>
    <p align="left"><strong>MARITESS M. OCAMPO</strong></p>
	</div>
	
<footer>
<p>DENR-13, Ambago, Butuan City, Philippines</p>
<p>Telephone Nos. (085) 8171545 E-Mail: ordcaraga@gmail.com</p>
</footer>
	</div>
	</div>
   
</body>
</html>