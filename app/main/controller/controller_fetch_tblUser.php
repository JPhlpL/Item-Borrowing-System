<?php 


require_once '../../config.php';
 
// mysql db table to use 
$table = 'tbluser'; 


// Table's primary key 
$primaryKey = 'id'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array( 
        'db'        => 'id',
        'dt'        => 0, 
        'formatter' => function( $d, $row ) { 
            return ''; 
        }),
        array( 
            'db'        => 'id',
            'dt'        => 1, 
            'formatter' => function( $d, $row ) { 
                return "
                <div class='custom-control custom-switch'>
                      <input type='checkbox' class='custom-control-input selectedRow' id='customSwitch".$row['id']."' value='".$row['id']."'>
                      <label class='custom-control-label' for='customSwitch".$row['id']."'></label>
                    </div>            
                "; 
            }),
    array( 'db' => 'USER_ID', 'dt' => 2 ), 
    array( 'db' => 'USER_EMPLOYEE_ID', 'dt' => 3 ), 
    array( 'db' => 'USER_NAME', 'dt' => 4 ), 
    array( 'db' => 'USER_GENDER', 'dt' => 5 ), 
    array( 'db' => 'USER_EMAIL', 'dt' => 6 ), 
    array( 'db' => 'USER_DEPT', 'dt' => 7 ), 
    array( 'db' => 'USER_SECTION', 'dt' => 8 ), 
    array( 'db' => 'USER_POSITION', 'dt' => 9 ), 
    array( 'db' => 'USER_MOBILE', 'dt' => 10 ), 
    array( 'db' => 'USER_ACCOUNT_TYPE', 'dt' => 11 ), 
    array( 'db' => 'USER_PIC', 
           'dt' => 12,
           'formatter' => function ( $d , $row) {
            return '<img alt="User Image" height=80 class="img-circle elevation-2" src="data:image/jpeg;base64,'.base64_encode( $row['USER_PIC'] ).'"/>'.'</td>'; 
           }), 
    array( 
        'db'        => 'id',
        'dt'        => 13, 
        'formatter' => function( $d, $row ) { 
            return 
            '<a href="javascript:void(0)" data-toggle="tooltip" title="Edit Data" id="btn-edit" class="border border-secondary text-dark rounded" data-id="'.$row['id'].'"> 
                <i class="p-2 nav-icon fas fa-pencil-alt"></i>
            </a> 
            <a href="javascript:void(0)" data-toggle="tooltip\ title=\Delete Data" id="btn-delete" class="border border-secondary text-dark rounded ml-2" data-id="'.$row['id'].'"> 
                <i class="p-2 nav-icon fas fa-trash-alt"></i>
            </a>'; 
        }) 
); 
 
// Include SQL query processing class 
require '../../classes/ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns ));