
                            <?php if (isset($_GET['error'])): 
                                if(isset($_POST['btn']))
                                  {
                      
                                  
                             
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("Location: ../index.php");
exit;
                                  

                                  }
                                endif;

                              ?>