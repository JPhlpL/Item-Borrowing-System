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
            title: 'Success!',
            text: 'The account is now created. Thank you!',
            icon: 'success',
            confirmButtonText: 'OK' 
            }).then(function(){
                window.location.href='login.php';
            });
    </script>

</html>
