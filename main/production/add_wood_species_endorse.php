<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wood Species Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<?php 



        $_lumber_app_id = isset($_POST['endorsement_id']) ? $_POST['endorsement_id'] : (isset($_GET['endorsement_id']) ? $_GET['endorsement_id'] : '');
       $lumber_app_id = isset($_POST['lumber_app_id']) ? $_POST['lumber_app_id'] : (isset($_GET['lumber_app_id']) ? $_GET['lumber_app_id'] : '');

?>
<body>
    <div class="container mt-5">
        <h3 class="text-warning">Wood Species:</h3>
    <!-- Assign an ID to the form and remove action and method attributes -->
<!-- Assign an ID to the form and remove action and method attributes -->
<form id="woodSpeciesForm">
    <!-- Hidden Input for lumber_app_id -->
    <input type="hidden" name="lumber_app_id" value="<?php echo $_lumber_app_id; ?>" class="form-control">
    <input type="hidden" name="endorsement_id" value="<?php echo $_lumber_app_id; ?>" class="form-control">

    <!-- Wood Species Input Fields -->
    <div class="row mb-3">
        <div class="col-md-3">Falcata</div>
        <div class="col-md-3">
            <input type="number" step="0.01" name="falcata" class="form-control" placeholder="bd.ft">
        </div>
        <div class="col-md-3">Mahogany</div>
        <div class="col-md-3">
            <input type="number" step="0.01" name="mahogany" class="form-control" placeholder="bd.ft">
        </div>
    </div>

    <!-- Repeat for other species -->
    <div class="row mb-3">
        <div class="col-md-3">Gmelina</div>
        <div class="col-md-3">
            <input type="number" step="0.01" name="gemelina" class="form-control" placeholder="bd.ft">
        </div>
        <div class="col-md-3">Caimito</div>
        <div class="col-md-3">
            <input type="number" step="0.01" name="caimito" class="form-control" placeholder="bd.ft">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">Mango</div>
        <div class="col-md-3">
            <input type="number" step="0.01" name="mango" class="form-control" placeholder="bd.ft">
        </div>
        <div class="col-md-3">Mangium</div>
        <div class="col-md-3">
            <input type="number" step="0.01" name="mangium" class="form-control" placeholder="bd.ft">
        </div>
    </div>

        <!-- Submit Button -->
        <div class="row mb-3">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Add Species</button>
        </div>
    </div> <br><br>

    <body>

    <hr> <!-- This creates a horizontal line -->
    <p>Add Other Species</p>
    </body>

    <!-- Button to Trigger Modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#otherSpecieModal">Add Others</button>
    </div>



    <!-- Div to display messages -->
    <div id="formMessage"></div>
</form>

<!-- Include JavaScript code -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('woodSpeciesForm');
    const messageDiv = document.getElementById('formMessage');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        // Collect form data
        const formData = new FormData(form);

        // Send data via AJAX
        fetch('process_wood_species.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json()) // Assuming the server returns JSON
            .then(data => {
                // Clear previous messages
                messageDiv.innerHTML = '';

                if (data.success) {
                    // Display success message
                    messageDiv.innerHTML = `<div class="alert alert-success">${data.message}</div>`;

                    // Optionally reset the form fields
                    // form.reset();
                } else {
                    // Display error message
                    messageDiv.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Display generic error message
                messageDiv.innerHTML = `<div class="alert alert-danger">An error occurred. Please try again.</div>`;
            });
    });
});
</script>


<!-- Modal for Adding Other Species -->
<div class="modal fade" id="otherSpecieModal" tabindex="-1" aria-labelledby="otherSpecieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Assign an ID to the form and remove action and method attributes -->
            <form id="otherSpeciesForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="otherSpecieModalLabel">Add Other Species</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Hidden input for lumber_app_id -->
                <input type="hidden" name="lumber_app_id" value="<?php echo $_lumber_app_id ; ?>" class="form-control">
                <input type="hidden" name="endorsement_id" value="<?php echo $_lumber_app_id ; ?>" class="form-control">
                <div class="modal-body">
                    <label for="modalOtherSpecie" class="form-label">Species Name:</label>
                    <input type="text" name="other_species_name" id="modalOtherSpecie" class="form-control" placeholder="Enter species name" required>
                </div>
                <div class="modal-body">
                    <label for="modalOtherbdft" class="form-label">bd.ft:</label>
                    <input type="number" step="0.01" name="other_species_bdft" id="modalOtherbdft" class="form-control" placeholder="bd.ft" required>
                </div>
                <div class="modal-footer">
                    <!-- Close button -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include the JavaScript code -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('otherSpeciesForm');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Collect form data
            const formData = new FormData(form);

            // Send data via AJAX
            fetch('process_other_species.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text()) // Assuming the server returns text
            .then(data => {
                // Handle the server response
                // For example, display a success message inside the modal
                const modalBody = form.querySelector('.modal-body');
                modalBody.insertAdjacentHTML('beforeend', `<div class="alert alert-success mt-2">${data}</div>`);

                // Optionally, reset the form fields
                form.reset();

                // Keep the modal open
            })
            .catch(error => {
                console.error('Error:', error);
                // Display error message inside the modal
                const modalBody = form.querySelector('.modal-body');
                modalBody.insertAdjacentHTML('beforeend', `<div class="alert alert-danger mt-2">An error occurred. Please try again.</div>`);
            });
        });
    });
</script>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <!-- HTML placeholder for the table -->
<div id="speciesTableContainer"></div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const lumberAppId = <?php echo intval($_lumber_app_id); ?>; // Replace with your actual lumber_app_id variable

    // Function to fetch and display the table
    function fetchAndDisplaySpecies() {
        fetch(`fetch_wood_species.php?lumber_app_id=${lumberAppId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    buildSpeciesTable(data.data);
                } else {
                    document.getElementById('speciesTableContainer').innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('speciesTableContainer').innerHTML = `<div class="alert alert-danger">An error occurred while fetching data.</div>`;
            });
    }

    // Function to build the HTML table
    function buildSpeciesTable(speciesData) {
        if (speciesData.length === 0) {
            document.getElementById('speciesTableContainer').innerHTML = `<div class="alert alert-info">No data available.</div>`;
            return;
        }

        let tableHTML = `
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Species</th>
                        <th>Board Feet</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
        `;

        speciesData.forEach(item => {
            tableHTML += `
                <tr data-id="${item.id}">
                    <td>${item.species}</td>
                    <td>${parseFloat(item.boardfeet).toFixed(2)}</td>
                    <td>${item.created_at}</td>
                    <td>
                        <button class="btn btn-danger btn-sm delete-button">Delete</button>
                    </td>
                </tr>
            `;
        });

        tableHTML += `
                </tbody>
            </table>
        `;

        document.getElementById('speciesTableContainer').innerHTML = tableHTML;

        // Attach event listeners to delete buttons
        attachDeleteEventListeners();
    }

    // Function to attach event listeners to delete buttons
    function attachDeleteEventListeners() {
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.closest('tr').getAttribute('data-id');
                deleteSpecies(id);
            });
        });
    }

    // Function to delete a species
    function deleteSpecies(id) {
        if (confirm('Are you sure you want to delete this species?')) {
            fetch('delete_wood_species.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `id=${encodeURIComponent(id)}`
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Refresh the table data
                        fetchAndDisplaySpecies();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the species.');
                });
        }
    }

    // Fetch and display the species data on page load
    fetchAndDisplaySpecies();

    // Auto-refresh the table every 30 seconds (adjust the interval as needed)
    setInterval(fetchAndDisplaySpecies, 3000); // 30000 milliseconds = 30 seconds
});
</script>


</body>

</html>

<?php




            require_once "../../processphp/config.php";

           

           $endorsement_id = isset($_POST['endorsement_id']) ? $_POST['endorsement_id'] : (isset($_GET['endorsement_id']) ? $_GET['endorsement_id'] : null);

              // Fetch data grouped by species with total boardfeet
              $species_sql = "
                  SELECT species, SUM(CAST(boardfeet AS DECIMAL(10,2))) AS total_boardfeet
                  FROM wood_species_endorsement
                  WHERE endorsement_id = ?
                  GROUP BY species
              ";

              $species_stmt = $con->prepare($species_sql);
              $species_stmt->bind_param("i", $endorsement_id);
              $species_stmt->execute();
              $species_result = $species_stmt->get_result();

              // Prepare a string to display species with total boardfeet
              $species_summary = [];
              $total_boardfeet_overall = 0;
              while ($row = $species_result->fetch_assoc()) {
                  $species_summary[] = htmlspecialchars($row['species']) . " : " . number_format($row['total_boardfeet'], 2) . " (bd.ft)";
                  $total_boardfeet_overall += $row['total_boardfeet'];
              }
              $species_display = implode(", ", $species_summary);




              if (is_array($total_boardfeet_overall)) {
                $total_boardfeet_overall = implode(", ", $total_boardfeet_overall);
            }
            
            if (is_array($species_summary)) {
                $species_summary = implode(", ", $species_summary);
            }
            
            // Update query
            $sql = "UPDATE supp_contdetails 
                    SET result = '$total_boardfeet_overall', 
                        Species = '$species_summary' 
                    WHERE ID = $_lumber_app_id";
            
            if ($con->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $con->error;
            }


?>

<br><br>
<!-- HTML Button -->

<button class="btn btn-success" id="refreshButton">Save and Close</button>

<!-- JavaScript -->
<script>
  document.getElementById("refreshButton").addEventListener("click", function() {
    // Set a flag in sessionStorage to indicate the tab should close after reload
    sessionStorage.setItem('closeAfterRefresh', 'true');
    // Reload the page
    location.reload();
  });

  // On page load, check if the flag is set
  window.onload = function() {
  if (sessionStorage.getItem('closeAfterRefresh') === 'true') {
    // Remove the flag from sessionStorage
    sessionStorage.removeItem('closeAfterRefresh');
    // Delay the close action by 2 seconds (2000 milliseconds)
    setTimeout(function() {
      // Attempt to close the tab
      window.close();
    }, 2000);
  }
};

</script>