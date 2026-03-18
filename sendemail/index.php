<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Send Email</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>

<?php

$subject = 'Service Request Completion Notification';
$email = 'venzonanthonie@gmail.com';
$message = 'Your request, with Ticket Number , has been successfully repaired/completed/processed. You may now proceed to the RICTU Help Desk for any items or updates related to your request. 
        Thank you for your cooperation and trust in our services. Should you need further assistance or have additional requests, please feel free to contact us.<br><br> 
        Best regards,<br><br>RICTU OTOS/AMSOS Team';
$yourname = 'ICTAMSOS';

?>


    <body>
        <form class="" class="form" action="send.php" method="post" >
            Email <input type="email" name="email" value=""> <br/>
            Subject    <input type="text" name="Subject" value=""><br/>
            Message     <input type="text" name="message"   value=""><br/>

            <button type="submit" name="send">Send</button><br/><br/>


            <button type="button" onclick="window.location.href='send.php?send=1&email=<?php echo urlencode($email); ?>&Subject=<?php echo urlencode($subject); ?>&message=<?php echo urlencode($message); ?>&yourname=<?php echo urlencode($yourname); ?>'">Send Message</button>



        </form>




    </body>
</html>