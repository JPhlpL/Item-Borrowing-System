<?php
/*
Site : https://smarttutorials.net
Author :muni
 */
require_once '../../config.php';

$fieldNo = !empty($_GET['fieldNo']) ? $_GET['fieldNo'] : '';
$name = !empty($_GET['name']) ? strtolower(trim($_GET['name'])) : '';

$fieldName = 'TODO_NAME';

switch ($fieldNo) {
    case 1:
        $fieldName = 'TODO_NUMBER';
        break;
}

$data = array();
if (!empty($_GET['name'])) {
    $name = strtolower(trim($_GET['name']));
    $sql = "SELECT TODO_NAME, TODO_NUMBER FROM tbltodolist_ref where LOWER($fieldName) LIKE '" . $name . "%'";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['TODO_NAME'] . '|' . $row['TODO_NUMBER'];
        array_push($data, $name);
    }
}
echo json_encode($data);exit;
