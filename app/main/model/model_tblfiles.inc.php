        
        
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body p-2">
                 
                    <?php //include '../addins/import_user.php'; ?>

                        <table id="mainTable" style="font-size:13px;" class="table table-head-fixed table-striped text-nowrap">

                            <thead>
                            <tr class="text-center">
                                <th class="bg-dark text-white"></th>
                                <th class="bg-dark text-white">id</th>
                                <th class="bg-dark text-white">File Name</th>
                                <th class="bg-dark text-white">Date and Time</th>
                                <th class="bg-dark text-white">Action</th>
                            </tr>
                            </thead>    
                            <tfoot>
                            <tr class="text-center">
                                <th class="bg-dark text-white"></th>
                                <th class="bg-dark text-white">id</th>
                                <th class="bg-dark text-white">File Name</th>
                                <th class="bg-dark text-white">Date and Time</th>
                                <th class="bg-dark text-white">Action</th>
                            </tr>
                            </tfoot>
                        </table>   
                    <div>
                <div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

    <?php include '../crud_modal/tblfiles_edit.inc.php'; ?>

<?php include '../crud_modal/tblfiles_add.inc.php'; ?>