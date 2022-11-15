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
			font-size: 6pt;
            text-align: center;
            font-style: italic;
			padding-top : 20px;
			line-height: 0.5;
        }
        .indented {
			padding-top : -20pt;
			padding-bottom : 15pt;
			padding-left : 30pt;
			padding-right : 10pt;
        }
		.broken-line {
		  position: relative;
		  height: 10px;
		  border-top: 1px solid #000;
		}

		.broken-line:before {
			position: absolute; left: -1px; top: -1px;
			content: '';
			border-top: 10px solid #000;
			border-right: 10px solid transparent;
		}

		.broken-line:after {
			position: absolute; left: -2px; top: -2px;
			content: '';
			border-top: 10px solid white;
			border-right: 10px solid transparent;
		}
    </style>
    
</head>
<body class="indented">
	<table>
	<tr>
		<td class="title" style="width:15%;">
        <img src="seal.png" style="width: 100%; max-width: 100px" />
        </td>
        <td style="width:85%;">
        <h3><strong>Department of Environment and Natural Resources<br />
		Caraga Region</strong></h3>
    </td>
    </tr>
	</table>
	<hr style="width:100%;text-align:left;margin-left:0;height:5px;background-color:maroon;margin-left:-70; padding-left: 150">
    
    <p>{{date}}</p>
	</br>
	<p><strong style="text-transform:uppercase">MR./MS. {{owner}}</strong></br>
		Owner/Proprietor </br>
		{{ldname}} </br>
		{{ldaddress}}
	</p>
	</br>
	<p><strong>Dear Mr./Ms. {{surname}}</strong></p>
	
   <dt class="col-sm-3" style="text-align:justify;">Enclosed herewith is the original copy of the approved Certificate of Registration as Lumber Dealer<strong><u>{{regnumber}}</u> ({{status}})</strong> of {{ldname}} and pertinent papers which are integral part of the permit.</dt>
    <br/>    
   <dt class="col-sm-3" style="text-align:justify;">It is suggested that a self-explanatory pro-forma letter below be properly accomplished and returned to the Regional Executive Director DENR, Ambago, Butuan City within (30) days from receipt hereof. Failure to return the said form properly accomplished within the period specified above shall be considered prima facie evidence that you agree with all the terms and conditions stipulated in this permit</dt>
	<br/>
   <dt class="col-sm-3">Thank you.</dt>
	<br/>
   <dt class="col-sm-3">Very truly yours.</dt>
    <br/>
	<p align="left"><strong>NONITO M. TAMAYO, CESO III</strong></br>
		Regional Executive Director
	</p>
	
    <br/>
<footer>
<p style="font-size: 12px;">DENR-13, Ambago, Butuan City, Philippines</p>
<p style="font-size: 12px;">Telephone Nos. (085) 8171545 E-Mail: ordcaraga@gmail.com</p>
</footer>
	
<div class="broken-line"></div>
	</br>
		<p align="left"><strong>The Regional Executive Director</strong> </br>
		DENR Caraga Region </br>
		Ambago, Butuan City</p>
    
	<p align="left"><strong>Sir:</strong></p>
	<dt class="col-sm-3" style="text-align:justify;">I have the honor to acknowledge receipt of approved <strong><u><i>Certificate of Registration as Lumber Dealer</i></u></strong> issued to me/our company on <strong><u>{{dateclient}}</u></strong> located in <strong><u><i>{{municipal}}</i>,</u></strong> Province of <strong><u><i>{{province}}</i></u></strong> and to inform you that I/we read and understand all the terms and conditions to this permit and that we intend to comply with them completely.</dt>
	</br>
	<p align="left">Thank you,</p>
	</br>
	<p align="right">Very truly yours,</p>
	</br>
	<p align="right"><u><strong>{{owner}}</strong></u> </br>
		Permittee
	</p>

</body>
</html>