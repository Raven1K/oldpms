

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    


    <script>
          $(document).ready(function(){
            $("#myModal1").modal('show');
    
      
        $("#myBtn").click(function(){
        $("#myModal1").modal("hide");
      });
      
      $("#myModal1").on('hide.bs.modal', function(){
        // alert('The modal is about to be hidden.');
        history.back();
      });
    
    
    
    
    
    
          });
    
    
    
    </script>
    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    <h1 class="text-center"> CERTIFICATION </h1>
    
    <br> <br>
    
        <p class="text-justify me-5 ms-5 fs-5"> &emsp; &emsp;  &emsp;  This is to certify that <?php echo $result['perm_fname']. ' '.  $result['perm_lname'] ; ?> <?php echo $result2['office_cover'] ; ?>  <?php echo $result['Suffix'] ; ?> Personnel has conducted a verification/validation on the
    area applied for Lumber Dealer of  with permit name re: <?php echo $result['bussiness_name'] ; ?> located at <?php echo $result['full_address'] ; ?>.
     Please find attached pictures showing with the current stocks of Lumber of planted species of
    Falcata, Gemelina, Caimito and Mahogany as well as the garbage collection installed as the requirement
    for Solid Waste Management. </p>
    
    
    
    <br> <br> 
    <br> <br>
    <br> <br> 
    <br> <br>
    <br> <br> 
    <br> <br>
    
    
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>