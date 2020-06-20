<?php
include "connection.php";
$db = new Database();
$connection = $db->getConnection();

$request_method = $_SERVER['REQUEST_METHOD'];

switch($request_method){
    case 'GET':
        if(!empty($_GET['id'])){
            $id = intval($_GET['id']);
            get_employers($id);
        }else{
            get_employers();
        }

    break;
    case 'POST':
        insert_employers();

    break;
    case 'PUT':
        $id = intval($_GET['id']);
        update_employers($id);

    break;
    case 'DELETE':
        $id = intval($_GET['id']);
        delete_employers($id);

    break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
    break;
}

function get_employers($id =0){
    global $connection;
    $query = 'SELECT * FROM employers';
    if ($id != 0){
        $query .= ' WHERE id= ' . $id . 'LIMIT 1';
    }
    $response = array();
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


?>