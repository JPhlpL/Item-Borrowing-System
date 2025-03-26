<?php include '../../classes/session.inc.php'; 

 include '../../classes/functions.php';
 
 include '../controller/controller_import_user.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include '../../includes/header.css.inc.php'; ?>

  <?php include '../../includes/body.inc.php'; ?>

<div class="wrapper">

<?php include '../../includes/preloader.inc.php'; ?>

<?php include '../../includes/navbar.inc.php'; ?>

  <?php include '../../includes/sidebar.inc.php'; ?>
   
    <?php include '../../includes/contentheader.inc.php'; ?>

    <?php include '../model/model_userManagement.inc.php'; ?>

  <?php include '../../includes/footer.inc.php'; ?>

 <?php include '../../includes/controlsidebar.inc.php'; ?>
</div>
</body>
<?php include '../../includes/javaScript.inc.php'; ?>
</html>
