
 <?php      
  // if ($first_part === "00|0225") {
  //       $lumber_app_id = $_GET['lumber_app_id'];
  //       echo '<script>
  //                 alert("OTOS WEB+ Team Unable to locate record");
  //                 window.close();
  //             </script>';
  //       exit();
  //   }


    if ($first_part === "00|0813") {
      $lumber_app_id = $_GET['lumber_app_id'];
      echo '<script>
                alert("OTOS WEB+ Team Pending Transaction");
                window.close();
            </script>';
      exit();
  }

  if ($first_part === "00|0833") {
    $lumber_app_id = $_GET['lumber_app_id'];
    echo '<script>
              alert("OTOS WEB+ Team Expired Transaction");
              window.close();
          </script>';
    exit();
  }



  if ($first_part === "00|0833") {
    $lumber_app_id = $_GET['lumber_app_id'];
    echo '<script>
              alert("OTOS WEB+ Team Expired Transaction");
              window.close();
          </script>';
    exit();
  }


  if ($first_part === "00|0205") {
    $lumber_app_id = $_GET['lumber_app_id'];
    echo '<script>
              alert("OTOS WEB+ Team Do not honor / error Transaction Denied, Contact your Bank");
              window.close();
          </script>';
    exit();
  }

  if ($first_part === "00|0208") {
    $lumber_app_id = $_GET['lumber_app_id'];
    echo '<script>
              alert("OTOS WEB+ Team Invalid IP Address");
              window.close();
          </script>';
    exit();
  }

  if ($first_part === "00|0209") {
    $lumber_app_id = $_GET['lumber_app_id'];
    echo '<script>
              alert("OTOS WEB+ Team Balance File Error");
              window.close();
          </script>';
    exit();
  }

  if ($first_part === "00|0212") {
    $lumber_app_id = $_GET['lumber_app_id'];
    echo '<script>
              alert("OTOS WEB+ Team Invalid Transaction");
              window.close();
          </script>';
    exit();
  }

  if ($first_part === "00|0213") {
    $lumber_app_id = $_GET['lumber_app_id'];
    echo '<script>
              alert("OTOS WEB+ Team Invalid Amount");
              window.close();
          </script>';
    exit();
  }

  if ($first_part === "00|0214") {
    $lumber_app_id = $_GET['lumber_app_id'];
    echo '<script>
              alert("OTOS WEB+ Team Invalid Card Number");
              window.close();
          </script>';
    exit();
  }

  if ($first_part === "00|0217") {
    $lumber_app_id = $_GET['lumber_app_id'];
    echo '<script>
              alert("OTOS WEB+ Team Customer Cancel");
              window.close();
          </script>';
    exit();
  }



  ?>
