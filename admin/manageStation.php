<?php


// require_once('configmysqli.php');
session_start();
include('../processphp/config.php');
// block if no log in 
          if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            // if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

              header("location: login.php");
              exit;
            }
            else{

         
            }

     




              $userid = $_SESSION["user_id"] ;

              $lumber_app = "SELECT * FROM denr_users where user_id = $userid";
              $lumber_app_qry = mysqli_query($con, $lumber_app);
              $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);


               $clientname = $lumber_ap_row['name'] ;

              
               $_SESSION['clientname'] = $clientname ;

               
               $user_role = $lumber_ap_row['user_role_id'] ;








?> 







  













<!DOCTYPE html>
<html lang="en">
<style>
        /* CSS for select element */
        #Office_id {
            padding: 5px;
            font-size: 16px;
        }

        /* CSS for submit button */
        #submitBtn {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        /* CSS for DataTable */
        table.dataTable {
            border-collapse: collapse;
            width: 100%;
        }
        table.dataTable th, table.dataTable td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table.dataTable th {
            background-color: #f2f2f2;
        }
        table.dataTable tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
                border-radius: 5px;
                }

button:hover {
            background-color: #45a049; /* Darker Green */
            }

            form {
    margin: 0px auto; /* Center the form horizontally and add 50px margin from the top */
    width: 300px;
    padding: 20px;
    font-family: Arial, sans-serif;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

    label {
        margin-bottom: 10px;
        display: block;
    }

    select {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* CSS to stick footer to the bottom */
    footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #f8f9fa; /* Adjust as needed */
    text-align: center;
    padding: 5px 0; /* Adjust padding as needed for the desired height */
}

    </style>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OLDPMS Admin Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>

  <!-- Custom fonts for this template-->
    <!-- Bootstrap -->
  
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">

</head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
      
    <!-- sidebar navigation -->        
      <?php
        require_once('adminsidebar.php');
      ?>        
    <!-- /sidebar navigation -->
      
        <!-- top navigation -->
      
      <?php
        require_once('adminnavbar.php');
      ?> 
      
        <!-- /top navigation -->

<!-- page content -->
      <div class="right_col" role="main">
        <div class="">
        
        <div style="height: 100px;">
</div>
<form method="post" action="" id="officeForm">
    <label for="Office">Select an office:</label>
    <select name="Office" id="Office_id">
        <?php




        // Check if connection is successful
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        // SQL query to retrieve office names
        $sql = "SELECT Office_id, station, code FROM office";

        // Prepare and execute SQL query
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        // Initialize an array to store unique office names
        $unique_offices = array();

        // Get the last selected value from the form submission
        $last_selected_value = isset($_POST['Office']) ? $_POST['Office'] : '';

        // Check if there are rows in the result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Check if the office name already exists in the array
                if (!in_array($row['station'], $unique_offices)) {
                    $selected = ($row['Office_id'] == $last_selected_value) ? 'selected' : '';
                    echo "<option value='" . htmlspecialchars($row['code']) . "' $selected>" . htmlspecialchars($row['station']) . "</option>";
                    // Add the office name to the array
                    $unique_offices[] = $row['station'];
                }
            }
        } else {
            echo "0 results";
        }

        ?>
    </select>
    <div class="text-left mt-3"> <!-- mt-3 adds margin-top -->
    <button type="submit" class="btn btn-primary" value="Submit">Select</button>
    </div>


</form>

<br>

<script>
    // Retain selected option after form submission
    document.addEventListener("DOMContentLoaded", function() {
        var officeForm = document.getElementById('officeForm');
        var selectElement = officeForm.elements['Office'];
        var lastSelectedValue = "<?php echo $last_selected_value; ?>";

        for (var i = 0; i < selectElement.options.length; i++) {
            if (selectElement.options[i].value === lastSelectedValue) {
                selectElement.selectedIndex = i;
                break;
            }
        }
    });
</script>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if Office is set and not empty
    if (isset($_POST['Office']) && !empty($_POST['Office'])) {

        

        // Prepare SQL query
        $sql = "SELECT DISTINCT office_id, office_name, station, code FROM office WHERE code = ?";


        // Prepare and execute SQL query
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $_POST['Office']);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if there are rows in the result
        if ($result->num_rows > 0) {
            // Output table header
            echo "<table class='dataTable'>";
            echo "<thead><tr>
            
            <th>ID</th>
            <th>Office Name</th>
            <th>Station</th>
            <th>Action</th>
            </tr></thead><tbody>";
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row['office_id']) . "</td>
                
                <td>" . htmlspecialchars($row['office_name']) . "</td>
                
                <td>" . htmlspecialchars($row['station']) . "</td>
                
             
                <form method='POST' action='viewaccount.php' target='_blank' hidden>
                    <input type='hidden' name='id' value='" . $row['office_id'] . "'>
                    <td>
                    <button type='submit' name='submit'>View User</button>
                    </td>
                </form>
            

                </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "0 results";
        }

        // Close prepared statement
        $stmt->close();
    } else {
        echo "Please select an office.";
    }
}



// Close database connection
$con->close();
?>

<div style="height: 900px;">
</div>
<?php
// // Check if form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Check if Office is set and not empty
//     if (isset($_POST['Office']) && !empty($_POST['Office'])) {



//         // Prepare SQL query
//         $sql = "SELECT DISTINCT name, contact_no FROM denr_users WHERE office_id = ?";


//         // Prepare and execute SQL query
//         $stmt = $con->prepare($sql);
//         $stmt->bind_param("i", $_POST['Office']);
//         $stmt->execute();
//         $result = $stmt->get_result();

//         // Check if there are rows in the result
//         if ($result->num_rows > 0) {
//             // Output table header
//             echo "<table class='dataTable'>";
//             echo "<thead><tr><th>Name</th><th>Contact No</th></tr></thead><tbody>";
//             // Output data of each row
//             while ($row = $result->fetch_assoc()) {
//                 echo "<tr><td>" . htmlspecialchars($row['name']) . "</td><td>" . htmlspecialchars($row['contact_no']) . "</td></tr>";
//             }
//             echo "</tbody></table>";
//         } else {
//             echo "0 results";
//         }

//         // Close prepared statement
//         $stmt->close();
//     } else {
//         echo "Please select an office.";
//     }
// }

// // Close database connection
// $con->close();
?>


<?php 
      require_once 'adminfooter.php';
  ?>

</body>
</html>

