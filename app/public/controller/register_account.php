<?php
// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Include config file
require_once "../../config.php";

// Define variables and initialize with empty values
$empnum = $name = $dept = $section = $position = $email = $mobile = 
$username = $password = $confirm_password = "";

// Define variables and initialize with empty values
$empnum_err = $name_err = $dept_err = $section_err = $position_err = $email_err = $mobile_err = 
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    //! Validate employee number
    if(empty(trim($_POST["empnum"]))){
        $empnum_err = "Please your employee number.";

    } else{

        // Prepare a select statement
        $sql = "SELECT USER_EMPLOYEE_ID FROM tbluser WHERE USER_EMPLOYEE_ID = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_empnum);
            
            // Set parameters
            $param_empnum = $_POST["empnum"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $empnum_err = "This employee number is already taken.";
                } else{
                    $empnum = $_POST["empnum"];
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    //! Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT USER_EMPLOYEE_ID FROM tbluser WHERE USER_NAME = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            // Set parameters
            $param_name = $_POST["name"];
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $name_err = "This name is already taken.";
                } else{
                    $name = $_POST["name"];
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }

    //! Validate department
    if(empty(trim($_POST["dept"]))){
        $dept_err = "Please enter your department.";     
    } else{
        $dept = trim($_POST["dept"]);
    }

    //! Validate section
    if(empty(trim($_POST["section"]))){
        $section_err = "Please enter your section.";     
    } else{
        $section = trim($_POST["section"]);
    }

    //! Validate position
    if(empty(trim($_POST["position"]))){
        $position_err = "Please enter your position.";     
    } else{
        $position = trim($_POST["position"]);
    }


    //! Validate email
    if(empty(trim($_POST["email"]))){
        $email = " ";     
    } else{
        $email = trim($_POST["email"]);
    }

    //! Validate mobile
    if(empty(trim($_POST["mobile"]))){
        $mobile = " ";     
    } else{
        $mobile = trim($_POST["mobile"]);
    }


    //! Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT USER_EMPLOYEE_ID FROM tbluser WHERE USER_ID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = trim($_POST["username"]);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This name is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    //! Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 3){
        $password_err = "Password must have atleast 3 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    //! Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
        
    }
    
    // Check input errors before inserting in database
    if(empty($empnum_err) && empty($name_err) && empty($dept_err) &&  empty($section_err) && empty($position_err) && 
    empty($username_err) && empty($password_err) && empty($confirm_password_err)){

         //  Insert image data into database
         $image = $_FILES['image']['tmp_name'];
         $imgContent = addslashes(file_get_contents($image));

         if(empty($imgContent))
         {
            $imgContent = NULL;
         }
        
        // Prepare an insert statement
        $sql = "INSERT INTO tbluser (USER_EMPLOYEE_ID , USER_NAME , USER_DEPT , USER_SECTION,
        USER_POSITION , USER_EMAIL , USER_MOBILE , USER_ID , USER_PASS , USER_PIC ) VALUES (?,?,?,?,?,?,?,?,?,'$imgContent')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_empnum, $param_name, $param_dept, $param_section, $param_position, $param_email, $param_mobile,
            $param_username, $param_password);
            
            // Set parameters
            $param_empnum = $empnum;
            $param_name = $name;
            $param_dept = $dept;
            $param_section = $section;
            $param_email = $email;
            $param_mobile = $mobile;
            $param_position = $position;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
       
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header('Location: success_register_account.php');
                exit();
            } else{
                header('Location: failed_register_account.php');
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>