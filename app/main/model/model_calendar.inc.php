<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- the events -->
        <div id="external-events">
        </div>
        <div class="card card-primary">
          <div class="card-body p-0">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
          </div>

          <!-- Event Details Modal -->
          <div class="modal fade" id="event-details-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Interview Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <dt class="text-muted">User</dt>
                          <dd id="title" class="fw-bold fs-4"></dd>
                          <dt class="text-muted">Date Time</dt>
                          <dd id="start" class=""></dd>
                        </div>
                        <div class="modal-footer">
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <!-- Event Details Modal -->

          <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

        </div>
      </div>
</section>


    <!-- Event Details Modal -->

<?php 
// Not accept BLOB type so just choose in query for text only
$schedules = mysqli_query($link ,"SELECT id, USER_ID, USER_DATE_TIME_CREATED FROM tbluser WHERE USER_ID = '".$_SESSION['USER_ID']."'");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['date_time'] = date("F d, Y h:i A",strtotime($row['USER_DATE_TIME_CREATED']));
    $sched_res[$row['id']] = $row;
}
?>
