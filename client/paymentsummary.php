<!DOCTYPE html>
<html>
<head>
    <title>Payment Summary</title>
    <style>
/* 52S5 .form-container */
        .form-container {
            max-width: 600px;
            margin:  0 auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #f2f2f2 ;
        }



        body {
            font-family: Arial, sans-serif;
            
        }

        h1 {
            text-align: center;
            background-color: green;
            color: #fff;
            padding: 10px;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            
        }

        table, th, td {
            border: 1px solid #ccc;
        
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        th {
            background-color: green;
            color: #fff;
        }

        
    </style>
    <script src="js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<script>
            document.addEventListener("contextmenu", function(event) {
                console.log("Context menu event detected");
                alert("Inspect Elements Not Allowed");
                event.preventDefault();
                console.log("Default action prevented");
            });
            </script>
<body>



                <form class="form-container">


    <h1>Payment Summary</h1>



    <?php

 

    ?>
    
 
    <br><p>Transaction Number: <b><?php echo $Serial_No; ?></b>

<?php 
    if ($Payment_Status == 'Paid') {

        echo '<br>Status: <b style="color:Green";>Paid</b></p>';
    }else{

        echo '<br>Status: <b style="color:Red";>Pending</b></p>';
    }
        
    ?>



        
        </tr>
        <center><table>
        <tr>
            <th>Details</th>
            <th>Amount</th>
        </tr>


        <!-- <tr>
            <td>Processing Fee</td>
            <td>P100.00</td>
        </tr> -->
        <tr>
            <td>Registration Fee</td>
            <td>P600.00</td>
        </tr>
        <tr>
            <td>Permit Fee</td>
            <td>P480.00</td>
        </tr>
        <tr>
            <td>Oath Fee</td>
            <td>P36.00</td>
        </tr>
        <tr>
            <td>Cash Bond</td>
            <td>P<?php echo $cash;?>.00</td>
        </tr>
        <tr>
            <td><strong>TOTAL</strong></td>
            <td><strong>P<?php echo $Amount_Decimal; ?></strong></td>
        </tr>
        </table></center><br>

        <table>
        <h5 >Note: </h5>
        <p>a.	Future-dated and partial payments are not allowed. <br>
             b.	Cancellation and reversal of transactions are not allowed. <br>
             c.	LANDBANK Link.BizPortal shall accept transactions during weekends and holidays;
             however, it will be reflected as transactions for the next banking day.  </p>
         </table>
        <br>


        <body>
            <p>Payment options:</p>
            <ul>
        <li>a. LANDBANK-ATM Card</li>
        <li>b. BancNet</li>
        <li>c. PCHC PayGate</li>
        <li>d. Cash Payment and GCash, Maya, ShopeePay, and GrabPay via MYEG</li>
            </ul>

        </body>


        </form>
    <br>
    
        
      <!-- <center> <button type="submit" class="btn btn-success" name="payment" >Click Here to Pay</button> </center>  -->

<?php

$link = 'http://58.71.22.7/testegps/LinkbizCaptureServlet?lbpinst=zVUlX9ss%2F8b75VRejK42sDU15bMGhK%2Fl7kroLw5CTwN5vKNkk6smVLI8B2qDAD4%2Fwv46fOU%2B7CrfJr%2FVmmNvlUVtkt3NI197tNvUAXcu25zjHsEiqHIjqjXjnGL5iK5Op43qLb8fVClfdFKfrJe0bV80cGuqskRxYzsu8%2BZCr5IcuPEvC3Hlg3AuWJQxSzGtNsPgOcMEr3jnHu42u%2Bnkjr5kpg%2Fm9x9WHmoEWe%2F0%2FbGlJYmxSha5V%2FEQByXtgRUKKeiQn%2FL6RSyRcHu8qJ6UCpRamUKMm1Ni4la7Rb%2FA64eFkLv6IiNaREfVK7TXqUMQRzFO80k3FpNfV1sTa1M6DtBRU5AbEAAT8X%2BuDrhUaWM89bG%2BH0S87JS5nFAT6pYrWK30o1VI1a4N76CoiRxKMZ2J4PN0WvGIcwXLwf%2BRL1uhYdMPMlJfFQ%3D%3D'; 

?>


    <?php 
            if ($Payment_Status == 'Paid') {
                echo '<center><a href="doctracker.php?lumber_app_id=' . $lumber_app_id . '" class="btn btn-success">Back</a></center>';


            } else {
                echo '<center>';
                echo '<div style="width: 500px;">';
                echo '<form method="GET" action="forlbpf.php" >';
                echo '<input type="hidden" name="lumber_app_id" value="'.$lumber_app_id.'">';
                echo '<p>Please Enter your email to proceed</p>';
                echo '<input type="email" name="email" value="" placeholder="Enter valid email address" required>';
                echo '<br>';
                echo '<button  type="submit" class="btn btn-success"  >Proceed to Payment</button>';
                echo '</form>';
                echo '</div>';
                echo '</center>';
                
               
         

                // echo '<center><a type="button" href="forlbpf.php?lumber_app_id='. $lumber_app_id .'" class="btn btn-success" name="pay">Proceed to Payment</a></center>';
               
            // echo '<br><br>' ;
            //     echo '<center><a type="button" href="' . $link . '" class="btn btn-danger" name="pay">Click Here to Pay</a></center>';



            }
  


                     

                        // JavaScript function to go back in history
                        echo '<script>';
                        echo 'function goBack() {';
                        echo '  window.history.back();';
                        echo '}';
                        echo '</script>';

    ?>




        

  <br> <br>

</body>
</html>
