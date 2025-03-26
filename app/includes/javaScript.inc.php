
<!-- //! For Tables -->
<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../../plugins/datatables-searchpanes/js/dataTables.searchPanes.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-staterestore/js/dataTables.staterestore.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../plugins/jszip/jszip.min.js"></script>
<script src="../../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../../../plugins/datatables-select/js/dataTables.select.min.js"></script>
<script src="../../../plugins/datatables-searchbuilder/js/dataTables.searchbuilder.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../../plugins/moment/moment.min.js"></script>
<script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- SweetAlert2 -->
<script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../dist/js/pages/dashboard.js"></script>
<!-- Filterizr-->
<script src="../../../plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../../../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
<!-- dropzonejs -->
<script src="../../../plugins/dropzone/min/dropzone.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="../../../plugins/moment/moment.min.js"></script>
<script src="../../../plugins/fullcalendar/main.js"></script>

<!-- BS Stepper -->
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<!-- Personal Scripts -->
  <!-- bs-custom-file-input -->
  <script src="../../../plugins/scripts/customFileInput.js"></script>
  <?php 
  switch(param_title())
  {
    case "changeuserpass.php":
      echo '<script src="../../../plugins/scripts/validatepass.js"></script>';
      echo '<script src="../../../plugins/scripts/changeuserpass.js"></script>';
      break;
    case "register.php":
    case "login.php":
      echo '<script src="../../../plugins/scripts/account-registration-stepper.js"></script>';
      break;
    case "recover-password.php":
      echo '<script src="../../../plugins/scripts/recover_password.js"></script>';
      echo '<script src="../../../plugins/scripts/validate_recover_password.js"></script>';
      break;
    // CRUD
    case "userManagement.php":
      echo '<script src="../../../plugins/scripts/crud_datatables_tbluser.js"></script>';
      break;
    case "tbltoDoList.php":
      echo '<script src="../../../plugins/scripts/crud_datatables_tbltodolist.js"></script>';
      break;
    case "tblfiles.php":
      echo '<script src="../../../plugins/scripts/crud_datatables_tblfiles.js"></script>';
      break;
    case "toDoList.php":
      echo '<script src="../../../plugins/scripts/add_tbltodolist.js"></script>';
      break;
    case "announcement.php":
      echo '<script src="../../../plugins/scripts/announcement.js"></script>';
      echo '<script src="../../../plugins/scripts/deleteannouncement.js"></script>';
      break;
    case "comment.php":
      echo '<script src="../../../plugins/scripts/comment.js"></script>';
      echo '<script src="../../../plugins/scripts/deletecomment.js"></script>';
      break;
    // MAIN
    // request table
    case "tblrequest.php":
      echo '<script src="../../../plugins/scripts/crud_datatables_tblrequest.js"></script>';
      break;
    // Inventory
    case "tblinventory.php":
      echo '<script src="../../../plugins/scripts/crud_datatables_tblinventory.js"></script>';
      break;
    // Approve Table
    case "tblapprove.php":
      echo '<script src="../../../plugins/scripts/crud_datatables_tblapprove.js"></script>';
      break;
    case "addRequestForm.php":
      echo '<script src="../../../plugins/scripts/addRequestForm.js"></script>';
      break;
    case "editRequestForm.php":
      echo '<script src="../../../plugins/scripts/editRequestForm.js"></script>';
      break;
    case "approveRequestForm.php":
      echo '<script src="../../../plugins/scripts/approveRequestForm.js"></script>';
      break;
    case "returnRequestForm.php":
      echo '<script src="../../../plugins/scripts/returnRequestForm.js"></script>';
      break;
    case "addMultipleItem.php":
      echo '<script src="../../../plugins/scripts/addMultiple_tblinventory.js"></script>';
      break;
    case "cartrequest.php":
      echo '<script src="../../../plugins/scripts/cartrequest.js"></script>';
      break;
    case "addtocart.php":
      echo '<script src="../../../plugins/scripts/addtocart.js"></script>';
      break;
    case "request_comment.php":
      echo '<script src="../../../plugins/scripts/request_comment.js"></script>';
      echo '<script src="../../../plugins/scripts/delete_requestComment.js"></script>';
      break;
    // Approver Table
    case "tblapprove.php":
      echo '<script src="../../../plugins/scripts/crud_datatables_tblapprove.js"></script>';
      break;
  }
  ?>

  <!-- Dropzone JS -->
  <script src="../../../plugins/scripts/mydropzone.js"></script>
  <!-- For Summernote -->
  <script src="../../../plugins/scripts/mysummernote.js"></script>
  <!-- For Profile Picture Preview -->
  <script>
    function preview() {
  thumb1.src=URL.createObjectURL(event.target.files[0]);
}
    function previewItemPhoto() {
  photoPreview.src=URL.createObjectURL(event.target.files[0]);
}
    function previewItemPhotoEdit() {
  photoPreviewEdit.src=URL.createObjectURL(event.target.files[0]);
}
  </script>
  <script src="../../../plugins/scripts/checkboxAgreement.js"></script>
  <script src="../../../plugins/scripts/autofill_info.js"></script>
  <script src="../../../plugins/scripts/updateprofile.js"></script>
  <script src="../../../plugins/scripts/changeprofilepic.js"></script>
  <script src="../../../plugins/scripts/forgot_password.js"></script>
  <script src="../../../plugins/scripts/calendar.js"></script>
  <script src="../../../plugins/scripts/digital-clock.js"></script>
  <script src="../../../plugins/scripts/display-date.js"></script>
 
  <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
  </script>
  <script src="../../../plugins/scripts/logout.js"></script>
  <script src="../../../plugins/scripts/support.js"></script>
  <script src="../../../plugins/scripts/emailConfig.js"></script>
  <script src="../../../plugins/scripts/systemConfig.js"></script>
  <script src="../../../plugins/scripts/import_xlsx.js"></script>
  <script src="../../../plugins/scripts/preventRefreshSubmit.js"></script>
<!-- Personal Scripts -->

<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
