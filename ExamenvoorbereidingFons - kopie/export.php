<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['export'])) {

    $filename = "user_data_export.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $print_header = false;

    $db = new database();

    $result = $db->select("SELECT * from users",[]);
    if(!empty($result)){
        foreach($result as $row){
            if(!$print_header){
                echo implode("\t", array_keys($row)) ."\n";
                $print_header=true;
            }
            echo implode("\t", array_values($row)) ."\n";
        }
    }
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['export_id'])) {

    $filename = "user_data_export".date('m-d-Y_hia').".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $print_header = false;

    $db = new database();

    $id = $_GET['id'];

    $result = $db->select("SELECT * from users WHERE id =:id",[':id' =>$id]);
    if(!empty($result)){
        foreach($result as $row){
            if(!$print_header){
                echo implode("\t", array_keys($row)) ."\n";
                $print_header=true;
            }
            echo implode("\t", array_values($row)) ."\n";
        }
    }
    exit;
}
   
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hours'])) {

    $filename = "user_data_export.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $print_header = false;

    $db = new database();

    $id = $_GET['id'];

    $result = $db->select("SELECT hours.id, usertype.type, user.username, departments.name, hours.start_at, hours.end_at, hours.created_at, hours.updated_at FROM HOURS 
    LEFT JOIN user ON hours.id = user.id
    LEFT join department_user ON department_user.user_id = user.id
    LEFT JOIN departments ON department_user.departement_id = departments.id
    LEFT JOIN usertype ON user.type_id = usertype.id WHERE hours.id = :id", [':id'=>$id]);
    if(!empty($result)){
        foreach($result as $row){
            if(!$print_header){
                echo implode("\t", array_keys($row)) ."\n";
                $print_header=true;
            }
            echo implode("\t", array_values($row)) ."\n";
        }
    }
    exit;
}


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['exports'])) {

    $filename = "user_data_export.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $print_header = false;

    $db = new database();

    $result = $db->select("SELECT hours.id, usertype.type, user.username, departments.name, hours.start_at, hours.end_at, hours.created_at, hours.updated_at FROM HOURS 
    LEFT JOIN user ON hours.id = user.id
    LEFT join department_user ON department_user.user_id = user.id
    LEFT JOIN departments ON department_user.departement_id = departments.id
    LEFT JOIN usertype ON user.type_id = usertype.id", []);
    if(!empty($result)){
        foreach($result as $row){
            if(!$print_header){
                echo implode("\t", array_keys($row)) ."\n";
                $print_header=true;
            }
            echo implode("\t", array_values($row)) ."\n";
        }
    }
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['departments'])) {

    $filename = "user_data_export.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $print_header = false;

    $db = new database();

    $result = $db->select("SELECT * FROM departments", []);
    if(!empty($result)){
        foreach($result as $row){
            if(!$print_header){
                echo implode("\t", array_keys($row)) ."\n";
                $print_header=true;
            }
            echo implode("\t", array_values($row)) ."\n";
        }
    }
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['department'])) {

    $filename = "user_data_export.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $print_header = false;

    $db = new database();

    $id = $_GET['id'];

    $result = $db->select("SELECT * FROM departments WHERE id = :id", [':id'=>$id]);
    if(!empty($result)){
        foreach($result as $row){
            if(!$print_header){
                echo implode("\t", array_keys($row)) ."\n";
                $print_header=true;
            }
            echo implode("\t", array_values($row)) ."\n";
        }
    }
    exit;
}


?>