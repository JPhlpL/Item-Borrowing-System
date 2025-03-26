<?php


// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../main/view/dashboard.php");
    exit;
  }
   
  // Include config file
  require_once "../../config.php";
   
  // Define variables and initialize with empty values
  $username = $name = $password = "";
  $username_err = $name_err = $password_err = "";
   
  // Processing form data when form is submitted
  if($_SERVER["REQUEST_METHOD"] == "POST"){
   
      // Check if username is empty
      if(empty(trim($_POST["username"]))){
          $username_err = "Please enter username.";
      } else{
          $username = trim($_POST["username"]);
      }
      
      // Check if password is empty
      if(empty(trim($_POST["password"]))){
          $password_err = "Please enter your password.";
      } else{
          $password = trim($_POST["password"]);
      }
      
      // Validate credentials
      if(empty($username_err) && empty($password_err)){
          // Prepare a select statement
          $sql = "SELECT USER_ID, USER_PASS, USER_EMPLOYEE_ID , USER_NAME , USER_ACCOUNT_TYPE FROM tbluser WHERE USER_ID = ?";
          
      if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "s", $param_username);
          
          // Set parameters
          $param_username = $username;
          
          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              // Store result
              mysqli_stmt_store_result($stmt);
              
              // Check if username exists, if yes then verify password
              if(mysqli_stmt_num_rows($stmt) == 1){                    
                  // Bind result variables
                  mysqli_stmt_bind_result($stmt, $username, $hashed_password, $emp_id, $name,  $user_type);
                  if(mysqli_stmt_fetch($stmt)){
                      if(password_verify($password, $hashed_password)){
                          // Password is correct, so start a new session
                          session_start();
                          
                          // Store data in session variables
                          $_SESSION["loggedin"] = true;
                          $_SESSION["USER_ID"] = $username; 
                          $_SESSION["USER_NAME"] = $name; 
                          $_SESSION["USER_EMPLOYEE_ID"] = $emp_id; 
                          $_SESSION["USER_ACCOUNT_TYPE"] = $user_type; 
                                                      
                          
                          // Redirect user to welcome page
                          $_SESSION['fromMain'] = "true";

                          if($_SESSION["USER_ACCOUNT_TYPE"] < 3) {
                          header("location: ../../main/view/dashboard.php");
                          } else {
                            header("location: ../../main/view/announcement.php");
                          }


                      } else{
                          // Display an error message if password is not valid
                          $password_err = "The password you entered was not valid.";
                      }
                  }
              } else{
                  // Display an error message if username doesn't exist
                  $username_err = "No account found with that username.";
              }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
      }
  
      // Close statement
      mysqli_stmt_close($stmt);
      }
  
      // Close connection
      mysqli_close($link);
  }

?>