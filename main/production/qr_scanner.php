<!DOCTYPE html>
<html>
<head>
  <title>Web QR Scanner</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
  <video id="preview" style="width: 100%;"></video>
  <script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
      // Send scanned data to PHP using AJAX
      $.ajax({
        type: "POST",
        url: "process.php",
        data: { qrdata: content },
        success: function(response) {
          alert(response); // Display the PHP response
        }
      });
    });
    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        console.error('No cameras found.');
      }
    }).catch(function (e) {
      console.error(e);
    });
  </script>
</body>
</html>
