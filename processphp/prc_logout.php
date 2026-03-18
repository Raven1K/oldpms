
                            <?php 
                            
                            
                      
                            if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                               }
                              
                            if (isset($_POST['btn'])) {
                      
                                  
                             
// Initialize the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
   }
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
   }
 
// Redirect to login page
header("Location: ../index.php");
exit;
                                  



                                  }
                  

                              ?>