        
        
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body p-2">
                 
                    <?php include '../addins/import_user.php'; ?>

                        <table id="mainTable" style="font-size:13px;" class="table table-head-fixed table-striped text-nowrap">

                            <thead>
                            <tr class="text-center">
                                <th class="bg-dark text-white"></th>
                                <th class="bg-dark text-white">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input selectAll" id="customSwitch0">
                                        <label class="custom-control-label" for="customSwitch0"></label>
                                    </div>
                                </th>
                                <th class="bg-dark text-white">User ID</th>
                                <th class="bg-dark text-white">Employe ID</th>
                                <th class="bg-dark text-white">Name</th>
                                <th class="bg-dark text-white">Gender</th>
                                <th class="bg-dark text-white">Email</th>
                                <th class="bg-dark text-white">Department</th>
                                <th class="bg-dark text-white">Section</th>
                                <th class="bg-dark text-white">Position</th>
                                <th class="bg-dark text-white">Mobile Number</th>
                                <th class="bg-dark text-white">Account Type</th>
                                <th class="bg-dark text-white">User Pic</th>
                                <th class="bg-dark text-white">Action</th>
                            </tr>
                            </thead>    
                            <tfoot>
                            <tr class="text-center">
                                <th class="bg-dark text-white"></th>
                                <th class="bg-dark text-white"></th>
                                <th class="bg-dark text-white">User ID</th>
                                <th class="bg-dark text-white">Employe ID</th>
                                <th class="bg-dark text-white">Name</th>
                                <th class="bg-dark text-white">Gender</th>
                                <th class="bg-dark text-white">Email</th>
                                <th class="bg-dark text-white">Department</th>
                                <th class="bg-dark text-white">Section</th>
                                <th class="bg-dark text-white">Position</th>
                                <th class="bg-dark text-white">Mobile Number</th>
                                <th class="bg-dark text-white">Account Type</th>
                                <th class="bg-dark text-white">User Pic</th>
                                <th class="bg-dark text-white">Action</th>
                            </tr>
                            </tfoot>
                        </table>   
                    <div>
                <div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

    <?php include '../crud_modal/tblUsers_edit.inc.php'; ?>

<?php include '../crud_modal/tblUsers_add.inc.php'; ?>