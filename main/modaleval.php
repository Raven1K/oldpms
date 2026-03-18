<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>








<script>
      $(document).ready(function(){
        $("#myModal1").modal('show');


   $("#myModal1").click(function(){
    $("#myModal1").modal("hide");
  });
  
  $("#myModal1").on('hide.bs.modal', function(){
    // alert('The modal is about to be hidden.');
    history.back();
  });






      });
    </script>





<div id="myModal1" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-9">
			
			<embed src="sample.pdf" frameborder="0" width="100%" height="400px">

		    <div class="modal-footer">
			   <a class="btn btn-success" data-dismiss="modal">
				<i class="fas fa-thumbs-o-up"> </i>Accept</a>
			   <a class="btn btn-danger" data-dismiss="modal">
				<i class="fas fa-thumbs-o-down"> </i>Return</a>
			   
		   </div>
	    </div>	   
	   <div class="col-md-3 ms-auto">
		   <h2><strong>Remarks *</strong></h2>
  		     <textarea maxlength="5000" data-msg-required="Please type your remarks." rows="15" class="form-control" name="message" id="message" placeholder="Please type your remarks if returned." required></textarea>
	   </div>											      
   </div>
</div>
</div>
</div>
</div>
</div>