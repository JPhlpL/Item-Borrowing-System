<?php 

session_start();

  include '../../config.php';

    hideError();
  
  include '../../classes/functions.php'; 
?>

<!DOCTYPE html>

<html lang="en">

<?php include '../../includes/header.css.inc.php'; ?>

    <body class="hold-transition login-page">
    
      <?php include '../model/model_recover-password.php';?>
  
    </body>

  <?php include '../../includes/javaScript.inc.php'; ?>

</html>
