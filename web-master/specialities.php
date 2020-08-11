<?php
include 'db.php';
$action = '';

if(isset($_GET['action'])){
    $action = $_GET['action'];
}

if($action=='delete'){
    $id = $_GET['id'];
    specialities_delete($db, $id);
    header("location: ../admin/specialities.php");
}

if($action=='fetch'){
    $id = $_GET['id'];
    header("Content-Type: application/json");
    echo json_encode(specialities_by_course($db, $id));
}

function specialities_by_course($db, $id){
    $sql = "SELECT * FROM speciality WHERE course_id='$id'";
    $result = mysqli_query($db, $sql);

    $n = mysqli_num_rows($result);
    $specialities = array();

    for($i = 0; $i<$n; $i++){
        $row = mysqli_fetch_assoc($result);
        $specialities[] = $row;
    }

    return $specialities;

}

function specialities_all($db){
    $sql = "SELECT * FROM speciality";
    $result = mysqli_query($db, $sql);

    $n = mysqli_num_rows($result);
    $specialities = array();

    for($i = 0; $i<$n; $i++){
        $row = mysqli_fetch_assoc($result);
        $specialities[] = $row;
    }

    return $specialities;

}

function specialities_add($db, $name, $course_id){
    $sql = "INSERT INTO speciality (name, course_id) VALUES ('%s', '%s')";
    $query = sprintf($sql, mysqli_real_escape_string($db, $name), mysqli_real_escape_string($db, $course_id));
    mysqli_query($db, $query);
}

function specialities_get($db, $id){
    $sql = "SELECT * FROM speciality WHERE id='$id'";
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_row($result);
}

function specialities_update($db, $id, $name, $course_id){
    $sql = "UPDATE speciality SET name='$name', course_id='$course_id'  WHERE id='$id'";
    mysqli_query($db, $sql);
}

function specialities_delete($db, $id){
    $sql = "DELETE FROM speciality WHERE id='$id'";
    mysqli_query($db, $sql);
}
