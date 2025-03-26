<?php

// Define variables and initialize with empty values
$username = "";

// Processing form data when form is submitted
if(isset($_POST["empnum"]) && !empty($_POST["empnum"])){

    // Get hidden input value
    $empnum = $_POST["empnum"];

    //  Insert image data into database
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
   
    $sql = "UPDATE tbluser
         SET USER_PIC = '$imgContent'
         WHERE USER_EMPLOYEE_ID=?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_empnum);

        // Set parameters
        $param_empnum =                     $empnum; 


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                echo '<script language="javascript">';
                echo "window.location.href='success_changeprofilepic.php'";
                echo '</script>';
                exit();
            } else{
                echo '<script language="javascript">';
                echo "window.location.href='success_changeprofilepic.php'";
                echo '</script>';
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);


    // Close connection
    mysqli_close($link);
    
} else{
    // Check existence of empnum parameter before processing further
    if(isset($_GET["empnum"]) && !empty(trim($_GET["empnum"]))){
        // Get URL parameter
        $empnum =  trim($_GET["empnum"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM tblUser WHERE USER_EMPLOYEE_ID = ? ";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_empnum);
            
            // Set parameters
            $param_empnum = $empnum;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    // $username =             $row["username"]; 
                    // $password =             $row["password"];

                } else{
                    // URL doesn't contain valid empnum. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
       
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}

?>