
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    
    
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
    <style>
        .custom-input {
          width: 200px; /* Adjust width as needed */
          padding: 8px; /* Adjust padding */
          border: 1px solid #ccc; /* Border style */
          border-radius: 4px; /* Rounded corners */
          font-size: 14px; /* Font size */
          /* Additional styles as per your preference */
        }
    </style>

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

                          <?php           

              session_start();
              include "../../processphp/config.php";
              
              $office_id = "CENRO";



              $sql = "SELECT * FROM office ORDER BY office_name ASC";
              $province = mysqli_query($con,$sql);


     $nshow = $_GET['lumber_app_id'];

              
        $lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $nshow";
        $lumber_app_qry = mysqli_query($con, $lumber_app);
        $result = mysqli_fetch_assoc($lumber_app_qry);


        $mun_code = $result['muncity_code'];
        $bussiness_name = $result['bussiness_name'];
        $station =  $result['Office'];
        $suffix = $result['Suffix'];

                   
      $lumber_app2 = "SELECT * FROM muncity where mun_code = $mun_code";
      $lumber_app_qry2 = mysqli_query($con, $lumber_app2);
      $result2 = mysqli_fetch_assoc($lumber_app_qry2);
      $result2['office_cover'];
      $_office_cover = $result2['office_cover'];
      $office_id =   $result2['office_id'];
      $prov_code = $result2['prov_code'];

      $lumber_app3 = "SELECT * FROM office where station = '$station'";
      $lumber_app_qry3 = mysqli_query($con, $lumber_app3);
      $result3 = mysqli_fetch_assoc($lumber_app_qry3);
      $result3['office_address'];



      $lumber_app4 = "SELECT * FROM province where prov_code = $prov_code";
      $lumber_app_qry4 = mysqli_query($con, $lumber_app4);
      $result4 = mysqli_fetch_assoc($lumber_app_qry4);
      
              
              ?>




                          <div class="modal fade" id="myModal1" role="dialog">
                                   <div class="modal-dialog modal-lg">
                                 <!-- Modal content-->
                                    <div class="modal-content">
                                     <div class="modal-header">
                                     <h4 class="modal-title">EDIT CERTIFICATION</h4>
                                       <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                       </div>
                                       <div class="modal-body">

                                  
                                        <!-- Section 1 -->
                                        <div class="form-section" id="section1">

                                 <label>Choice Wood Species</label>

                                  <form action="speciesCheckbox.php" method="post" target="_blank">

                                  <p style="padding: 10px;">
                                  <input type="checkbox" value="Falcata" class="flat" name="fal" id="fal" onchange="toggleTextbox('fal')"> Falcata
                                  <br />
                                  <input type="text" id="falTextbox" style="display: none;" placeholder="enter bd.ft" name="falTextbox">
                                  <br />

                                  <input type="checkbox" value="Gmelina" class="flat" name="gem" id="gem" onchange="toggleTextbox('gem')"> Gmelina
                                  <br />
                                  <input type="text" id="gemTextbox" style="display: none;" placeholder="enter bd.ft" name="gemTextbox">
                                  <br />

                                  <input type="checkbox" value="Caimito" class="flat" name="cai" id="cai" onchange="toggleTextbox('cai')"> Caimito
                                  <br />
                                  <input type="text" id="caiTextbox" style="display: none;" placeholder="enter bd.ft" name="caiTextbox">
                                  <br />

                                  <input type="checkbox" value="Mangium" class="flat" name="mang" id="mang" onchange="toggleTextbox('mang')"> Mangium
                                  <br />
                                  <input type="text" id="mangTextbox" style="display: none;" placeholder="enter bd.ft" name="mangTextbox">
                                  <br />

                                  <input type="checkbox" value="Rubber" class="flat" name="rubber" id="rubber" onchange="toggleTextbox('rubber')"> Rubber
                                  <br />
                                  <input type="text" id="rubberTextbox" style="display: none;" placeholder="enter bd.ft" name="rubberTextbox">
                                  <br />

                                  <input type="checkbox" value="Mahogany" class="flat" name="mah" id="mah" onchange="toggleTextbox('mah')"> Mahogany
                                  <br />
                                  <input type="text" id="mahTextbox" style="display: none;" placeholder="enter bd.ft" name="mahTextbox">
                                  <br />
                     
                                     

                                  <input type="hidden" value="<?php echo $nshow;?>" name="idd">

                                  <input type="submit" value="Add" class="btn btn-success" >
                                  </div>
                                  <div class="form-section" id="section2" style="display:none;">
                                  </p>
                                  </form>

            

                                  <label for="Others">Others:</label>

                                  <form action="species.php" method="post" target="_blank">
                                  <p style="padding: 10px;">
                                      <input type="hidden" value="<?php echo $nshow;?>" name="idd">
                                      <input type="text" name="Others" id="Others" placeholder="Others Please Specify:" class="custom-input" required>
                                      <input type="text" name="boardfeet" id="boardfeet" placeholder="enter bd.ft" class="custom-input" required>
                                      
                  
                                      <br/><br />
                                      <input type="submit" value="Add" class="btn btn-success" >
                                    </p>
                                  </form>

                                  </div>            <!-- Navigation Buttons -->
       
                                  <div class="form-section" id="section3" style="display:none;">



                                  
                                <form class="form-label-left input_mask" method="post" action="generates-pdf.php" target="_blank">

                                <div class="col-md-6 col-sm-6  form-group has-feedback">


                                <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Permitee" name="lumber_app_id" id="lumber_app_id" value="<?php echo $result['lumber_app_id']; ?>"   hidden>


                                  <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Permitee" name="name" id="name" value="<?php echo 
                                  $result['perm_fname']. ' '.  $result['perm_lname'] ; ?>" >




                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                  <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Address" name="address" id="address" value="<?php echo $result['full_address'] ; ?>">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                  <input type="text" class="form-control has-feedback-left" required="required" placeholder="Bussiness Trade Name" name="fname" id="fname" value="<?php echo $bussiness_name; ?>">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                              </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                      <input type="text" class="form-control" name="select" id="select" value="<?php echo $result3['office_address'] ; ?>" hidden>
                                      <input type="text" class="form-control" name="office_cover" id="select" value="<?php echo $result2['office_cover'] ; ?>" hidden>
                                      <input type="text" class="form-control" name="province" id="select" value="<?php echo $result4['prov_name'] ; ?>" hidden>
                                      <input type="text" class="form-control" name="suffix" id="suffix" value="<?php echo $suffix ; ?>" hidden>
                                        <!-- <option>Choose CENRO</option> -->
                                        <!-- <option>CENRO Lianga</option> -->
                                        <!-- <option>CENRO Bislig</option> -->
                                        <!-- <option>CENRO Cantilan</option>           -->
                                        
                                        





             <?php   
            //  while ($row = mysqli_fetch_array($province,MYSQLI_ASSOC)):;
             
            $sql = "UPDATE lumber_application SET Office = :Office, Office_id = :Office_id
            WHERE lumber_app_id = $nshow";
            $stmt = $connection->prepare($sql);
            $stmt->execute(array(
            ':Office' => $_office_cover,
            ':Office_id' => $office_id,));
            
      
             ?>

              <option value="<?php 
              // echo $row["office_id"];?>">  <?php 
              // echo $row["office_name"];?> </option>

              <?php 
            // endwhile;
            ?>



                                      </select>
<br><br><br>
                                    </div>
                                  
                                <!-- <label>Choice Wood Species</label> -->

                                  <p style="padding: 10px;">
                                  <input type="checkbox" value="Falcata" class="flat" name="fal" id="fal" onchange="toggleTextbox('fal')" hidden> 
                                  
                                  <input type="text" id="falTextbox" style="display: none;" placeholder="enter bd.ft" hidden>
                                  

                                  <input type="checkbox" value="Gmelina" class="flat" name="gem" id="gem" onchange="toggleTextbox('gem')" hidden> 
                                  
                                  <input type="text" id="gemTextbox" style="display: none;" placeholder="enter bd.ft" hidden>
                                  

                                  <input type="checkbox" value="Caimito" class="flat" name="cai" id="cai" onchange="toggleTextbox('cai')" hidden> 
                                 
                                  <input type="text" id="caiTextbox" style="display: none;" placeholder="enter bd.ft" hidden>
                                  

                                  <input type="checkbox" value="Mangium" class="flat" name="mang" id="mang" onchange="toggleTextbox('mang')" hidden> 
                                
                                  <input type="text" id="mangTextbox" style="display: none;" placeholder="enter bd.ft" hidden>
                                
                                  <input type="checkbox" value="Rubber" class="flat" name="rubber" id="rubber" onchange="toggleTextbox('rubber')" hidden> 
                                 
                                  <input type="text" id="rubberTextbox" style="display: none;" placeholder="enter bd.ft" hidden>
                            

                                  <input type="checkbox" value="Mahogany" class="flat" name="mah" id="mah" onchange="toggleTextbox('mah')" hidden> 
                               
                                  <input type="text" id="mahTextbox" style="display: none;" placeholder="enter bd.ft" hidden>
                        

                                  <input type="text" name="Others" id="Others" placeholder="Others Please Specify:" class="custom-input" hidden>

                                    <br />
                               
                                    



                                <div class="ln_solid"></div>
                                <div class="form-group row">
                                  <div  class="col-md-5 col-sm-5  offset-md-5">
                                    <!-- <button type="submit" class="btn btn-success" name="submit">Prepare</button> -->
                                    <!-- <input type="submit" class="btn btn-success" value="Prepare" id="submitBtn" disabled> -->
                                    
                                  </div>
                                </div>


            


                                
                            </form>


                            <form method="GET" action="show_species.php" target="_blank" style="display:inline;">
                                <input type="hidden" name="lumber_app_id" value="<?php echo $nshow; ?>"> 
                                <button type="submit" style="background-color: blue; color: white; border: none; padding: 5px 10px; cursor: pointer;">Show Species</button>
                            </form>


                            </div>

<!-- Navigation Buttons -->
<div class="form-navigation">
    <button type="button" id="prevBtn" onclick="prevSection()">Previous</button>
    <button type="button" id="nextBtn" onclick="nextSection()">Next</button>
    <button type="submit" id="submitBtn" style="display:none;">Submit</button>
</div>

</div>

<script>
let currentSection = 1;

function showSection(sectionNumber) {
document.querySelectorAll('.form-section').forEach(section => {
    section.style.display = 'none';
});
document.getElementById(`section${sectionNumber}`).style.display = 'block';

if (sectionNumber === 1) {
    document.getElementById('prevBtn').style.display = 'none';
} else {
    document.getElementById('prevBtn').style.display = 'inline-block';
}

if (sectionNumber === 3) {
    document.getElementById('nextBtn').style.display = 'none';
    document.getElementById('submitBtn').style.display = 'inline-block';
} else {
    document.getElementById('nextBtn').style.display = 'inline-block';
    document.getElementById('submitBtn').style.display = 'none';
}
}

function nextSection() {
if (currentSection < 3) {
    currentSection++;
    showSection(currentSection);
}
}

function prevSection() {
if (currentSection > 1) {
    currentSection--;
    showSection(currentSection);
}
}

// Initialize the form with the first section visible
showSection(currentSection);
</script>

<script>
  $(document).ready(function() {
    $('input[type="checkbox"]').change(function() {
        if ($('input[type="checkbox"]:checked').length > 0 || $('#Others').val() !== '') {
            $('#submitBtn').prop('disabled', false);
        } else {
            $('#submitBtn').prop('disabled', true);
        }
    });
    
    $('#Others').on('input', function() {
        if ($('input[type="checkbox"]:checked').length > 0 || $('#Others').val() !== '') {
            $('#submitBtn').prop('disabled', false);
        } else {
            $('#submitBtn').prop('disabled', true);
        }
    });
});


function toggleTextbox(checkboxId) {
    var checkbox = document.getElementById(checkboxId);
    var textbox = document.getElementById(checkboxId + "Textbox");

    if (checkbox.checked) {
        textbox.style.display = "block";
    } else {
        textbox.style.display = "none";
    }
}

</script>



                   <div class="modal-footer">
                    <!-- END MODAL -->
                   <a hidden class="btn btn-success" data-dismiss="modal" >Endorse to DMO IV</a>
                                <!-- <a class="btn btn-secondary" data-dismiss="modal">Close</a> -->
                                </div>
                                      <!-- target="_blank" -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                              </td>
                          </tr>
                          </tbody>
                      </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

</html>


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
<h1 class="text-center">Edit CERTIFICATION </h1>

<br> <br>

    <p class="text-justify me-5 ms-5 fs-5"> &emsp; &emsp;  &emsp;  This is to certify that <?php echo $result['perm_fname']. ' '.  $result['perm_lname'] ; ?> <?php echo $result2['office_cover'] ; ?>  <?php echo $result['Suffix'] ; ?> Personnel has conducted a verification/validation on the
area applied for Lumber Dealer of  with permit name re: <?php echo $result['bussiness_name'] ; ?> located at <?php echo $result['full_address'] ; ?>.
 Please find attached pictures showing with the current stocks of Lumber of planted species of
Falcata, Gmelina, Caimito and Mahogany as well as the garbage collection installed as the requirement
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


