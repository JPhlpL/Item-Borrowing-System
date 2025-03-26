<?php include '../../classes/session.inc.php'; 

 include '../../classes/functions.php'; 
 
 hideError();
 ?>

<!DOCTYPE html>
<html lang="en">

<?php include '../../includes/header.css.inc.php'; ?>

  <?php include '../../includes/body.inc.php'; ?>

<div class="wrapper">

<?php include '../../includes/preloader.inc.php'; ?>

<?php include '../../includes/navbar.inc.php'; ?>

  <?php include '../../includes/sidebar.inc.php'; ?>
   
    <?php include '../../includes/contentheader.inc.php'; ?>

    <?php include '../model/model_changeprofilepic.inc.php'; ?>

  <?php include '../../includes/footer.inc.php'; ?>

 <?php include '../../includes/controlsidebar.inc.php'; ?>
</div>
</body>
<?php include '../../includes/javaScript.inc.php'; ?>
<script>
          Swal.fire({
            title: 'Success!',
            text: 'Your profile picture is now updated. Thank you!',
            icon: 'success',
            confirmButtonText: 'OK' 
            }).then(function(){
                window.location.href='dashboard.php';
            });
    </script>
</html>
