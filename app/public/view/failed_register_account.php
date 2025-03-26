<?php include '../controller/register_account.php';

  include '../../classes/functions.php'; ?>

<!DOCTYPE html>

<html lang="en">

<?php include '../../includes/header.css.inc.php'; ?>

    <body class="hold-transition login-page">
  
    </body>

  <?php include '../../includes/javaScript.inc.php'; ?>

  <script>
           Swal.fire({
            title: 'Error',
            text: 'Please check your inputs before you submit',
            icon: 'error',
            confirmButtonText: 'OK' 
            }).then(function(){
                window.location.href='register.php';
            });
    </script>

</html>
