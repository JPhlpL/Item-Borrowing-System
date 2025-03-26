        
        
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body p-2">

                            <table id="mainTable" style="font-size:13px;" class="table table-head-fixed table-striped text-nowrap">

                            <div class="row ml-1 ">
                                <div class="col-sm-1">
                                    <label for=""> Select All: </label>
                                </div>
                                <div class="col-sm-1">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input selectAll" id="customSwitch0">
                                        <label class="custom-control-label" for="customSwitch0"></label>
                                    </div>
                                </div>
                            </div>

                                <thead>
                                <tr class="text-center">
                                    <th class="bg-dark text-white"></th>
                                    <th class="bg-dark text-white"></th>                               
                                    <th class="bg-dark text-white"> ITEM NAME </th>
                                    <th class="bg-dark text-white"> ITEM CONTROL NUMBER </th>
                                    <th class="bg-dark text-white"> ITEM PHOTO </th>
                                    <th class="bg-dark text-white"> ITEM QUANTITY </th>
                                    <th class="bg-dark text-white"> ITEM STATUS </th>
                                    <th class="bg-dark text-white"> ITEM REMARKS </th>
                                    <th class="bg-dark text-white"> ITEM DESCRIPTION </th>
                                    <th class="bg-dark text-white"> ITEM FIRSTCLAIM DATETIME </th>
                                    <th class="bg-dark text-white"> ITEM ENCODER </th>
                                    <th class="bg-dark text-white"> ITEM PIC </th>
                                    <th class="bg-dark text-white"> ITEM FORM NO. </th>
                                    <th class="bg-dark text-white"> ITEM CATEGORY </th>
                                    <th class="bg-dark text-white"> Action </th>
                                </tr>
                                </thead>    
                                <tfoot>
                                <tr class="text-center">
                                    <th class="bg-dark text-white"></th>
                                    <th class="bg-dark text-white"></th>                               
                                    <th class="bg-dark text-white"> ITEM NAME </th>
                                    <th class="bg-dark text-white"> ITEM CONTROL NUMBER </th>
                                    <th class="bg-dark text-white"> ITEM PHOTO </th>
                                    <th class="bg-dark text-white"> ITEM QUANTITY </th>
                                    <th class="bg-dark text-white"> ITEM STATUS </th>
                                    <th class="bg-dark text-white"> ITEM REMARKS </th>
                                    <th class="bg-dark text-white"> ITEM DESCRIPTION </th>
                                    <th class="bg-dark text-white"> ITEM FIRSTCLAIM DATETIME </th>
                                    <th class="bg-dark text-white"> ITEM ENCODER </th>
                                    <th class="bg-dark text-white"> ITEM PIC </th>
                                    <th class="bg-dark text-white"> ITEM FORM NO. </th>
                                    <th class="bg-dark text-white"> ITEM CATEGORY  </th>
                                    <th class="bg-dark text-white"> Action </th>
                                </tr>
                                </tfoot>
                            </table>   
                        <div>
                    <div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
    
    <?php include '../crud_modal/tblinventory_edit.inc.php'; ?>

<?php include '../crud_modal/tblinventory_add.inc.php'; ?>