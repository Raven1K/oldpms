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
    margin: 0 auto; /* Center the form horizontally and add 50px margin from the top */
    width: 600px; /* Adjust the width of the form */
    padding: 20px;
    font-family: Arial, sans-serif;
   
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

        table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #dddddd; /* Add border around the table */
        }

        th, td {
            text-align: left;
            padding: 8px;
            border-right: 1px solid #dddddd; /* Add right border to cells */
        }

        th:first-child, td:first-child {
            border-left: 1px solid #dddddd; /* Add left border to first cell */
        }

        th {
            background-color: #f2f2f2;
        }

        /* Alternate column colors */
        tr:nth-child(even) td {
            background-color: #f9f9f9; /* Faded color for even columns */
        }

        tr:nth-child(odd) td {
            background-color: #ffffff; /* Pure color for odd columns */
        }



        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
        }


  

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
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



<?php 
require_once 'adminfooter.php';
?>

<?php
// Assuming you already have a database connection established

// Check if the id is posted
if(isset($_POST['id'])) {
    // If id is posted, store it in session
    $_SESSION['desired_office_id'] = $_POST['id'];
}

// Check if the id is stored in session
if(isset($_SESSION['desired_office_id'])) {
    // Retrieve the id from session
    $desired_office_id = $_SESSION['desired_office_id'];
} else {
    // If id is not stored in session, set a default value or handle the situation accordingly
    $desired_office_id = ''; // You can set any default value here
}

// Prepare the SQL query
$sql = "SELECT * FROM denr_users WHERE office_id = ? ORDER BY user_role_id";

// Prepare the statement
$stmt = $con->prepare($sql);

// Bind parameters
$stmt->bind_param("s", $desired_office_id);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Output table header
    echo "<table border='1'>";
    echo "<tr>
    <th>id</th>
    <th>Name</th>
    <th>Contact Number</th>
    <th>Account</th>
    <th>Role</th>
    <th>Action</th>
    </tr>";
    
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Output the data in table rows
        echo "<tr>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['contact_no'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>";
        if ($row['user_role_id'] == '1') {
            echo '<span class="badge">Validator</span>';
        } elseif ($row['user_role_id'] == '2') {
            echo '<span class="badge">Bill Collector</span>'; 
        } elseif ($row['user_role_id'] == '7') {
            echo '<span class="badge">Chief RPS</span>'; 
        } elseif ($row['user_role_id'] == '8') {
            echo '<span class="badge">Deputy CENRO</span>'; 
        } elseif ($row['user_role_id'] == '9') {
            echo '<span class="badge">CENRO</span>'; 
        } elseif ($row['user_role_id'] == '10') {
            echo '<span class="badge">PENRO RPS</span>'; 
        } elseif ($row['user_role_id'] == '11') {
            echo '<span class="badge">PENRO TS</span>'; 
        } elseif ($row['user_role_id'] == '12') {
            echo '<span class="badge">PENRO</span>'; 
        } elseif ($row['user_role_id'] == '9.1') {
            echo '<span class="badge">PENRO FUU</span>'; 
        } else {
            echo $row['user_role_id'];
        }

       
        echo "<form method='GET' hidden>";
       
        echo "<input type='hidden' name='user_id' value='" . $row['user_id'] . "' />";
        echo "<td>";
        echo "<button type='submit' class='btn btn-primary'>Edit</button>";
        echo "</td>";
        echo "</form>";
       
        
        
        

    
        echo "</td>";
        echo "</tr>";
    }




    // Close the table
    echo "</table>";
} else {
    echo "0 results";
}

// Close the statement and connection

?>

<?php
        // Check if the user ID is set in the GET request
        if(isset($_GET['user_id'])) {
            // Retrieve the user ID from the GET request
     
            // User ID you want to filter by
            $user_id = $_GET['user_id']; // You might need to adjust this based on how you're getting the user ID

            // Prepare SQL statement
            $stmt = $con->prepare("SELECT * FROM denr_users WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);

            // Execute SQL statement
            $stmt->execute();

            // Get the result
            $result = $stmt->get_result();

            // Fetch the row
            $user = $result->fetch_assoc();
          
            $Name = $user['name'];
            $Username = $user['username'];
            $Password = $user['password'];
            $usertype = $user['usertype'];
            $contact_no = $user['contact_no'];
            $user_role_id = $user['user_role_id'];
            $office_id = $user['office_id'];
            $uploadSignature = $user['uploadSignature'];
            $unhashPassword = $user['unhashPassword'];


            echo '<button id="openModalBtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="display: none;">
                      Launch demo modal
                  </button>';
            
            echo "<script>
                      setTimeout(function() {
                          document.getElementById('openModalBtn').click();
                      }, 1000);
                  </script>";


        } else {
            // If the user ID is not set, handle the error or redirect the user
            echo "Error: User ID not provided.";
        }
        ?>


<!-- Button trigger modal -->
<script>
  function suggestUsername() {
    const fullName = document.getElementById("name").value;

    // Splitting full name into first name and last name
    const names = fullName.trim().split(" ");
    const firstName = names[0];
    const lastName = names.length > 1 ? names[names.length - 1] : ""; // If no last name provided, assign an empty string

    const baseSuggestions = [
      firstName.toLowerCase(),
      `${firstName.toLowerCase()}.${lastName.toLowerCase().slice(0, 2)}`,
      `${firstName.toLowerCase()}${lastName.toLowerCase()}`
    ];

    const additionalSuggestions = [];
    // Add more suggestions based on user preferences

    const suggestions = [...new Set([...baseSuggestions, ...additionalSuggestions])];

    const suggestionElement = document.getElementById("username-suggestions");
    suggestionElement.innerHTML = ""; // Clear previous suggestions

    if (suggestions.length > 0) {
      suggestionElement.innerHTML = "<b>Username suggestions:</b><br>";
      suggestionElement.innerHTML += suggestions.map(suggestion => `<li>${suggestion}</li>`).join("");
    } else {
      suggestionElement.textContent = "No suggestions available.";
    }
  }

        function validateForm() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm_password").value;

            // Use a regular expression to check if the password contains at least one letter and one number
            const alphanumericRegex = /^(?=.*[a-zA-Z])(?=.*\d).+$/;

            if (!alphanumericRegex.test(password)) {
                alert("Password must be alphanumeric (contain both letters and numbers).");
                return false; // Prevent form submission
            }

            if (password !== confirmpassword) {
                alert("Password and Confirm Password must match.");
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }




        const paragraph = document.getElementById("pop-out-paragraph");

      // Add a click event listener to the paragraph
      paragraph.addEventListener("click", () => {
          // Toggle the "pop-out" class to apply the pop-out effect
          paragraph.classList.toggle("pop-out");
      });

    </script>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form method="POST" action="updateuser.php" >
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" id="user_id" value="<?php echo  $user_id = !empty($user['user_id']) ? $user['user_id'] : ""; ?>">
        
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $Name = !empty($user['name']) ? $user['name'] : ""; ?>">
        
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $username = !empty($user['username']) ? $user['username'] : ""; ?>">
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $password = !empty($user['password']) ? $user['password'] : ""; ?>" >
    

        <label for="contact_no">Contact No:</label>
        <input type="text" name="contact_no" id="contact_no" value="<?php echo $contact_no = !empty($user['contact_no']) ? $user['contact_no'] : ""; ?>"  >
        
        <label for="user_role_id">User Role ID:</label>
        <input type="text" name="user_role_id" id="user_role_id" value="<?php echo $user_role_id = !empty($user['user_role_id']) ? $user['user_role_id'] : ""; ?>"  >
        
        <label for="office_id">Office ID:</label>
        <input type="text" name="office_id" id="office_id" value="<?php echo $office_id = !empty($user['office_id']) ? $user['office_id'] : ""; ?>">
 
        
        <label for="unhashPassword">Unhashed Password:</label>
        <input type="text" name="unhashPassword" id="unhashPassword" value="<?php echo $unhashPassword = !empty($user['unhashPassword']) ? $user['unhashPassword'] : ""; ?>">

        

               
   <label for="uploadSignature">Signature:</label>
        <?php if (!empty($user['uploadSignature'])): ?>
            <img src="../main/production/<?php echo $user['uploadSignature']; ?>" alt="User Signature" style="width: 100px; height: auto;">
        <?php else: ?>
            <!-- You can display a default image or a placeholder if the signature is empty -->
            <img src="default_signature.png" alt="No Signature">
        <?php endif; ?>
        <br>       <br>
<button type="submit" name="submit">Update</button>

</form>

        <br>
    
    <!-- Signature Uploader -->
    <form action="userprofile_uploadhandler.php" method="post" enctype="multipart/form-data">
        <h3>Signature</h3>
        <input type="file" name="signature" accept="image/*" id="fileInput">
        <input type="hidden"  value="<?php echo is_null($user_id) ? '' : $user_id; ?>" name="id">
        <input type="submit" name="uploadEsig" class=" btn-primary" value="Upload">
    </form>
    
    <!-- Signature Viewer -->
    <div id="signatureContainer"></div>

    <br>

        <form method="post" action="password_handler.php" onsubmit="return validateForm();">

            <h3> Set Signature </h3>

        <div style="text-align: center;">
           <h1>  <label for="forname"><?php echo $username; ?></label> </h1>
        </div>

        <br> 
        <input type="text" id="_id" name="_id" value="<?php echo $user_id ; ?>" required hidden>
        
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $Name; ?>" required>

        <label for="username">Username:</label>
        <input type="text" id="suggestions" name="username" required>
        <br>
        <button type="button" onclick="suggestUsername()">Suggest Username</button>
        <br>
        <span id="username-suggestions"></span>


        <br>
        <label for="password">New Password:</label>
        <input type="password" id="password" oninput="validatePassword()" name="password" required>
        <br><br>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" oninput="validatePassword()" name="confirm_password" required>
        <br><br>
        <input type="submit" value="Set Password" id="submit_button" >

        
        <br><br>




        <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
    <p id="pop-out-paragraph" class="justify-text">Here are some additional tips:</p>
    <ul>
        <li class="justify-text">Use a passphrase instead of a single word. A passphrase is a longer phrase that is easier to remember than a single word. For example, instead of using "password", you could use the phrase "My password is very strong!".</li>
        <li>Change your passwords regularly. This will help to protect your accounts if one of your passwords is compromised.</li>
        <li>Be careful about what websites you enter your password on. Only enter your password on websites that you trust.</li>
    </ul>
            <br>
            <li>Change your passwords regularly. This will help to protect your accounts if one of your passwords is compromised.</li>
            <br>
            <li>Be careful about what websites you enter your password on. Only enter your password on websites that you trust.</li>
        </ul>

        <script src="script.js"></script>
      
    </form>
    


    <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const signatureContainer = document.getElementById('signatureContainer');
                    signatureContainer.innerHTML = `<img src="${e.target.result}" style="max-width: 100%; max-height: 100%;" />`;
                };
                reader.readAsDataURL(file);
            }
        });

       
          </script>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




</body>
</html>

