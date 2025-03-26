<?php
/*
Site : https://smarttutorials.net
Author :muni
 */
require_once '../../config.php';

$fieldNo = !empty($_GET['fieldNo']) ? $_GET['fieldNo'] : '';
$name = !empty($_GET['name']) ? strtolower(trim($_GET['name'])) : '';

$fieldName = 'IT_ITEM_NAME';

switch ($fieldNo) {
    case 1:
        $fieldName = 'IT_CONTROL_NUMBER';
        break;
}

$data = array();
if (!empty($_GET['name'])) {
    $name = strtolower(trim($_GET['name']));
    $sql = "SELECT IT_ITEM_NAME, IT_CONTROL_NUMBER FROM tblinventory_ref where LOWER($fieldName) LIKE '" . $name . "%'";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['IT_ITEM_NAME'] . '|' . $row['IT_CONTROL_NUMBER'];
        array_push($data, $name);
    }
}
echo json_encode($data);

exit;

?>
