<?php
include 'db.php';
$action = '';

if(isset($_GET['action'])){
    $action = $_GET['action'];
}

if($action=='delete'){
    $id = $_GET['id'];
    groups_delete($db, $id);
    header("location: ../admin/groups.php");
}

if($action=='fetch'){
    $id = $_GET['id'];
    header("Content-Type: application/json");
    echo json_encode(lessons_all($db, $id));
}

function fill_days($db, $id, $day){
    $sql = "SELECT * FROM lesson WHERE group_id='$id' AND day='$day' ORDER BY time ASC";
    $result = mysqli_query($db, $sql);

    $n = mysqli_num_rows($result);
    $lessons = array();

    for($i = 0; $i<$n; $i++){
        $row = mysqli_fetch_assoc($result);
        $lessons[] = $row;
    }

    return $lessons;
}

function lessons_by_group($db, $id){
    $sql = "SELECT * FROM lesson WHERE group_id='$id'";
    $result = mysqli_query($db, $sql);

    $n = mysqli_num_rows($result);
    $lessons = array();

    for($i = 0; $i<$n; $i++){
        $row = mysqli_fetch_assoc($result);
        $lessons[] = $row;
    }

    return $lessons;

}


function lessons_all($db, $id){
    $days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
    $monday = fill_days($db, $id, 'monday');
    $tuesday = fill_days($db, $id, 'tuesday');
    $wednesday = fill_days($db, $id, 'wednesday');
    $thursday = fill_days($db, $id, 'thursday');
    $friday = fill_days($db, $id, 'friday');
    $saturday = fill_days($db, $id, 'saturday');
    header("Content-Type: application/json");
   return array($monday, $tuesday, $wednesday, $thursday, $friday, $saturday);

}

function lessons_add($db, $subject, $teacher, $day, $time, $location, $group_id){
    $sql = "INSERT INTO lesson (subject, teacher, day, time, location, group_id) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";
    $query = sprintf($sql, mysqli_real_escape_string($db, $subject), mysqli_real_escape_string($db, $teacher),
        mysqli_real_escape_string($db, $day), mysqli_real_escape_string($db, $time),
        mysqli_real_escape_string($db, $location), mysqli_real_escape_string($db, $group_id),);
    mysqli_query($db, $query);
}

function lessons_get($db, $id){
    $sql = "SELECT * FROM lesson WHERE id='$id'";
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_row($result);
}

function lessons_update($db, $id, $name, $speciality_id){
    $sql = "UPDATE lesson SET name='$name', speciality_id='$speciality_id'  WHERE id='$id'";
    mysqli_query($db, $sql);
}

function lessons_delete($db, $id){
    $sql = "DELETE FROM lesson WHERE id='$id'";
    mysqli_query($db, $sql);
}
