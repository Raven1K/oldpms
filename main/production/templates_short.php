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
			padding-left : 0pt;
			padding-right : 10pt;
        }
    </style>
    
</head>
<body class="indented">
<table>
							<tr>
 <td class="title">
        <img src="DENR_LOGO.png" style="width: 200%; max-width: 200px" />
    </td>


    <td style="width:85%;">
    <center>
        <h3 style="margin: 5px 0;"><strong>Department of Environment and Natural Resources</strong></h3>
        Kagawaran ng Kapaligiran at Likas Yaman<br />
        <?php if($_office_cover == "SIPLAS"){ ?>
            DENR PENRO Surigao del Norte Satellite Office<br />
        <?php } else { ?>
            Community Environment and Natural Resources<br />
        <?php } ?>        <?php echo $select; ?></strong></center>
    </center>
</td>
    <td class="title">
        <img src="bagongpilipinas.png" style="width: 200%; max-width: 200px" />
    </td>
    </tr>
	</table>
	<!-- <hr style="width:100%;text-align:left;margin-left:0;height:5px;background-color:maroon;margin-left:-70; padding-left: 150"> -->
    <br/>
    <br/>
    <h1 align="center">CERTIFICATION</h1>
    <br/>
   <p class="col-sm-9" style="text-align:justify;"> &nbsp; &nbsp; &nbsp; &nbsp; This is to certify that <?php echo $office; ?> <?php echo $suffix; ?> Personnel has conducted a verification/validation on
        the area applied for Lumber Dealer of <strong><?php echo $name; ?></strong> with bussiness name <?php echo $fname; ?> located at <?php echo $address; ?>.</p>
    <p class="col-sm-9" style="text-align:justify;"> &nbsp; &nbsp; &nbsp; &nbsp; Please find attached pictures showing with the current stocks of Lumber of planted species such as 
   
    <?php
                    // SQL query to select all data from the wood_species table
                    $sql = "SELECT * FROM wood_species where idd = $nshow";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        $rowCount = 0;
                        while($row = $result->fetch_assoc()) {
                            // Access individual columns like $row['column_name']
                            $rowCount++;
                            if ($rowCount == $result->num_rows) {
                              
                                echo " and " . $row["species"] . " (" . $row["type"] . " bd.ft), ";
                            } else {
                                echo " " . $row["species"] . " (" . $row["type"] . " bd.ft), ";
                            }
                        }
                    } else {
                        echo "0 results";
                    }

                 
    ?>
    
     as well as the waste segregation bin installed as the requirement for Ecological Solid Waste Management.</p>


    <br/>
    <br/>
    <!-- <br/>
    <br/> -->

    <?php
function formatDaySuffix($day) {
    if ($day >= 11 && $day <= 13) {
        $suffix = 'th';
    } else {
        switch ($day % 10) {
            case 1:
                $suffix = 'st';
                break;
            case 2:
                $suffix = 'nd';
                break;
            case 3:
                $suffix = 'rd';
                break;
            default:
                $suffix = 'th';
                break;
        }
    }
    return $day . $suffix;
}

// Usage example:// Replace this with your variable $day
$formattedDay = formatDaySuffix($day);
?>



    <?php

if (($Flow_stat) >= ('9')) {
    echo '<img src="uploads/' . $signature_1 . '"  class="align padding-right"style="width: 600%; max-width: 600px" />';
}

?>


    <p class="col-sm-9" style="text-align:justify;"> &nbsp; &nbsp; &nbsp; &nbsp; <strong>SUBSCRIBED AND SWORN </strong> to before me this <u><?php echo $formattedDay ; ?></u> day of <u> <?php echo $month ; ?></u>, <?php echo $year ; ?> at DENR - <?php echo $office ; ?>, <?php echo $province ; ?>, Philippines.</p>
    



    <?php

    if (($Flow_stat) >= ('9')) {
        echo '<img src="uploads/' . $signature_2 . '"  class="align padding-right"style="width: 600%; max-width: 600px" />';
    }

?>

</body>
</html>

