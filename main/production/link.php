<!-- Bootstrap -->
<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- JQVMap -->
<link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- Datatables -->

<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="../build/css/old/custom.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function(){
  $("#myBtn1").click(function(){
    $("#myModal1").modal("show");
  });
  $("#myBtn2").click(function(){
    $("#myModal2").modal("show");
  });
  $("#myBtn3").click(function(){
    $("#myModal3").modal("show");
  });
  $("#myBtn4").click(function(){
    $("#myModal4").modal("show");
  });
  $("#myBtn5").click(function(){
    $("#myModal5").modal("show");
  });
  $("#myModal1").on('show.bs.modal', function(){
    alert('The Application of Lumber Dealer Received.');
  });
  $("#myModal2").on('show.bs.modal', function(){
    alert('The Application of Lumber Dealer Received.');
  });
  $("#myModal3").on('show.bs.modal', function(){
    alert('The Application of Lumber Dealer Received.');
  });
  $("#myModal4").on('show.bs.modal', function(){
    alert('The Application of Lumber Dealer Received.');
  });
  $("#myModal5").on('show.bs.modal', function(){
    alert('The Application of Lumber Dealer Received.');
  });
});
</script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});
</script>