<?php 


require_once '../../config.php';
 
// mysql db table to use 
$table = 'tblinventory'; 


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
    array( 'db' => 'IT_ITEM_NAME', 'dt' => 2),
    array( 'db' => 'IT_ITEM_CONTROL_NUMBER', 'dt' => 3),
    array( 
        'db'        => 'IT_ITEM_PHOTO',
        'dt'        => 4, 
        'formatter' => function( $d, $row ) use($folder_dir){ 
            if($row['IT_ITEM_PHOTO'] == ''){
                return  "<img src='../../uploads/system.jpg' style='height:50px;width:110px;border-radius:3px;'>"; 
            }
            else {
                return  "<a class='text-dark' href='".$folder_dir.$row['IT_ITEM_PHOTO']."' data-toggle='lightbox' data-title='".$row['IT_ITEM_NAME']."'>
                            <img src='../../uploads/".$row['IT_ITEM_PHOTO']."' style='height:50px;width:110px;border-radius:3px;'>
                        </a>
                       "; 
            }
        }),
    array( 'db' => 'IT_ITEM_QUANTITY', 'dt' => 5),
    array( 'db' => 'IT_ITEM_STATUS', 
    'dt' => 6, 
    'formatter' => function( $d, $row ) { 
    switch($row['IT_ITEM_STATUS']){
        case "AVAILABLE":
            return "<label class='bg-success border rounded'> <i class='p-2 nav-icon fas fa-check'>AVAILABLE</i> </label>";
            break;
        case "UNAVAILABLE":
            return "<label class='bg-danger border rounded'> <i class='p-2 nav-icon fas fa-times'>UNAVAILABLE</i> </label>";
            break;
            }
        }
    ),
    array( 'db' => 'IT_ITEM_REMARKS', 'dt' => 7),
    array( 'db' => 'IT_ITEM_DESCRIPTION', 'dt' => 8),
    array( 'db' => 'IT_ITEM_FIRSTCLAIM_DATETIME', 'dt' => 9),
    array( 'db' => 'IT_ITEM_ENCODER', 'dt' => 10),
    array( 'db' => 'IT_ITEM_PIC', 'dt' => 11),
    array( 'db' => 'IT_FORM_NUM', 'dt' => 12),
    array( 'db' => 'IT_CATEGORY_ITEM', 'dt' => 13),
    array( 
        'db'        => 'id',
        'dt'        => 14, 
        'formatter' => function( $d, $row ) { 
            return 
            '<a href="javascript:void(0)" data-toggle="tooltip" title="Edit Data" id="btn-edit" name="btn-edit" class="border border-secondary text-dark rounded" data-id="'.$row['id'].'"> 
                <i class="p-2 nav-icon fas fa-pencil-alt"></i>
            </a> 
            <a href="javascript:void(0)" data-toggle="tooltip" title="View Data" id="btn-view" name="btn-view" class="border border-secondary text-dark rounded ml-2" data-id="'.$row['id'].'"> 
                <i class="p-2 nav-icon fas fa-eye"></i>
            </a>
            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete Data" id="btn-delete" name="btn-delete" class="border border-secondary text-dark rounded ml-2" data-id="'.$row['id'].'"> 
                <i class="p-2 nav-icon fas fa-trash-alt"></i>
            </a>'; 
        }) 
); 
 
// Include SQL query processing class 
require '../../classes/ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns ));