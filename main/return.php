
<style>


/* Basic button styling */
.btn {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
  border: none;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

/* Specific styling for the return button */
.btn-return {
  background-color: #007bff; /* Blue background */
  color: #fff; /* White text */
}

/* Hover effect for the return button */
.btn-return:hover {
  background-color: #0056b3; /* Darker blue on hover */
}

/* Ensure the button is visible */
.btn-return {
  visibility: visible;
}


</style>


            <button type="button" class="btn btn-return" data-toggle="modal" data-target="#exampleModal" style="visibility:visible;">
            Return
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="return_fuu.php">
                    <div class="modal-body">
                    <div class="form-group">

                    <input  type="hidden" name="lumber_app_id" value="<?php echo $l_id; ?>">
                    <input  type="hidden" name="user_name" value="<?php echo $clientname; ?>">
                        <label for="message-text" class="col-form-label">Remarks:</label>
                    
                        <textarea class="form-control" id="message-text" name="message-text" required></textarea>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="return">Return FUU</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
