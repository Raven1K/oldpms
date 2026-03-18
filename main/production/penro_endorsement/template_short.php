
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
								<td class="title">
                                <img src="DENR_LOGO.png" style="width: 150%; max-width: 150px" />
                                </td>
                                <td>
        <h4><strong>Republic of the Philippines<br />
        Department of Environment and Natural Resources<br />
		PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES<br />
        {{ office_address }}</strong></h4>
    </td>
    </tr>
	</table>
	<hr style="width:100%;text-align:left;margin-left:0;height:5px;background-color:maroon;margin-left:-70; padding-left: 150">

    
    <p><strong>MEMORANDUM</strong></p>
	
	 <table border="0">
		 <tr>
		 <td style="width:13%;"><strong>FOR</strong></td>
		 <td style="width:7%;"><strong>:</strong></td>
		 <td style="width:80%;"><strong>THE REGIONAL EXECUTIVE DIRECTOR</strong></td>
		 </tr>
		 <tr><td style="width:13%;"></td><td style="width:7%;"></td><td style="width:80%;">DENR-13, Regional Office</td></tr>
		 <tr><td style="width:13%;"></td><td style="width:7%;"></td><td style="width:80%;">Ambago, Butuan City, ADN</td></tr>
	</table>
	</br>
    <table border="0">
		 <tr>
		 <td style="width:13%;"><strong>ATTN</strong></td>
		 <td style="width:7%;"><strong>:</strong></td>
		 <td style="width:80%;"><strong>THE	ARD FOR TECHNICAL SERVICES</strong></td>
		 </tr>
	</table>
	</br>
    <table border="0">
		 <tr>
		 <td style="width:13%;"><strong>FROM</strong></td>
		 <td style="width:7%;"><strong>:</strong></td>
		 <td style="width:80%;"><strong>THE	PENR OFFICER</strong></td>
		 </tr>
		<tr><td style="width:13%;"></td><td style="width:7%;"></td><td style="width:80%;">{{ office_under }}</td></tr>
		<tr><td style="width:13%;"></td><td style="width:7%;"></td><td style="width:80%;">{{ penroaddress }}</td></tr>
		 
	</table>
	</br>
    <!-- <table>
		 <tr>
		 <td style="width:13%;"><strong>FROM</strong></td>
		 <td style="width:7%;"><strong>:</strong></td>
		 <td style="width:80%;"><strong>THE	CENR OFFICER</strong></td>
		 </tr>
	</table> -->
	</br>
	<table border="0">
		 <tr>
		 <td style="width:13%;padding-bottom:37px;"><strong>SUBJECT</strong></td>
		 <td style="width:7%;padding-bottom:37px;"><strong>:</strong></td>
		 <td style="width:80%;text-transform:uppercase;text-align:justify; padding-bottom:20px;"><strong>NEW APPLICATION OF {{ bussiness_name }} FOR CERTIFICATE OF REGISTRATION AS LUMBER DEALER LOCATED AT {{ full_address }}.</strong></td>
		 </tr>
	</table>
    <table>
		 <tr>
		 <td style="width:13%;"><strong>DATE</strong></td>
		 <td style="width:7%;"><strong>:</strong></td>
		 <td style="width:80%;text-transform:uppercase;text-align:justify;"><strong>{{ date_ }}</strong></td>
		 </tr>
	</table>
    <br/>
   <hr style="width:100%;text-align:left;margin-left:0">
   <br/>
   <p class="col-sm-9" style="text-align:justify;"> &nbsp; &nbsp; &nbsp; &nbsp; Respecfully forwarded is the new application for Certificate of Registration as Lumber Dealer of {{ bussiness_name }} located at {{ full_address }}.</p>
   <dt class="col-sm-3">Please be apprised of the following information regarding the subject application:</dt>
	<br/>
   <dd class="col-sm-9" style="text-align:justify;">a.) <strong>{{ ldname }}</strong> is a single proprietor owned and managed by {{ owner }} with a business operation at <strong>{{ ldaddress }}</strong>. The proponent's objective are: to provide employment opportunities; and to firmly established a functional lumber yard in order to cater lumber needs of the growing economic activity in the locality and other neighboring municipalities and provinces;</dd>
   <br/>
   <dd class="col-sm-9" style="text-align:justify;">b.) The applicant has already secured the required Mayor'/Business Permit from the concerned LGU issued on {{ MPdateissued }} valid until {{ MPdateexpiry }}. The proponent's business trade name was also registered with the Department of Trade and Industry (DTI) with Business Name No. {{ BNNumber }} issued on {{ DTIdateissued }} valid until {{ DTIdateexpiry }};</dd>
	<br/>
   <dd class="col-sm-9" style="text-align:justify;">c.) Under this application, the proponent has entered Lumber Supply Contracts  {{ SCtype }} {{ municipal }} {{ province2 }} covering {{ totalsupply }} board feet of {{ particulars }} for your approval, as detailed in the table below:</dd>
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

        <tr class="item">
                <td style="text-align: center">{{ lsname }}</td>
                <td style="text-align: center">{{ treespecie }}</td>
                <td style="text-align: center">{{ particulars }}</td>
				<td style="text-align: center">{{ yrvalidity }}</td>
				<td style="text-align: center">{{ totalsupply }}</td>
            </tr>

           <tr class="item">
                <td style="text-align: center">{{ lsname }}</td>
                <td style="text-align: center">{{ treespecie }}</td>
                <td style="text-align: center">{{ particulars }}</td>
				<td style="text-align: center">{{ yrvalidity }}</td>
				<td style="text-align: center">{{ totalsupply }}</td>
            </tr>
            




            <!-- <tr class="total">
					<td style="text-align: right"><strong></strong></td>
                    <td style="text-align: center"><strong></strong></td>
					<td style="text-align: center"><strong></strong></td>
					<td style="text-align: center"><strong>Total:</strong></td>
					<td style="text-align: center"><strong></strong></td>
				</tr> -->
        </tbody>
    </table>
    <br/>
    <br/>
	<dd class="col-sm-9" style="text-align:justify;">d.) The lumber dealer establishment of {{ldname}} were verified/inspected by the personnel of CENRO {{office}} per attached geotagged photographs on {{datevalidation}}.</dd>
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
    <p class="col-sm-9" style="text-align:justify;"> &nbsp; &nbsp; &nbsp; &nbsp; After careful review and evaluation made by this Office, same is found in order and feasible for implementation.</p>
    <p class="col-sm-9" style="text-align:justify;"> &nbsp; &nbsp; &nbsp; &nbsp; For information, record, and recommending approval.</p>
    <br/>  
    <!-- <br/>
    <br/> -->
<!--
    <br/>
    <p style="text-align:right"> CLIFF C. ABRAHAN &nbsp; &nbsp; &nbsp; &nbsp;<br/>
    CENR Officer&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
-->
<img src="uploads/p_endorsement1.png" style="width: 600%; max-width: 600px" />

   
</body>
</html>