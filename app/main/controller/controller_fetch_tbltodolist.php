<?php 


require_once '../../config.php';
 
// mysql db table to use 
$table = 'tbltodolistform'; 


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
    array( 'db' => 'RECORD_NUM', 'dt' => 1 ), 
    array( 'db' => 'RECORD_NAME', 'dt' => 2 ), 
    array( 'db' => 'RECORD_DATETIME', 'dt' => 3 ), 
    array( 'db' => 'RECORD_REMARKS', 'dt' => 4 ), 
    array( 
        'db'        => 'RECORD_NUM',
        'dt'        => 5, 
        'formatter' => function( $d, $row ) { 
            return 
            "<a data-toggle=\"tooltip\" title=\"View Data\"
            class='border border-secondary text-dark rounded' href='viewToDoList.php?".$row['RECORD_NUM']."'> 
                <i class='p-2 nav-icon fas fa-eye'></i>
            </a>"; 
        }) 
); 
 
// Include SQL query processing class 
require '../../classes/ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns ));