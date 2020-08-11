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

function groups_all($db){
    $sql = "SELECT * FROM ugroup";
    $result = mysqli_query($db, $sql);

    $n = mysqli_num_rows($result);
    $groups = array();

    for($i = 0; $i<$n; $i++){
        $row = mysqli_fetch_assoc($result);
        $groups[] = $row;
    }

    return $groups;

}

function groups_add($db, $name, $speciality_id){
    $sql = "INSERT INTO ugroup (name, speciality_id) VALUES ('%s', '%s')";
    $query = sprintf($sql, mysqli_real_escape_string($db, $name), mysqli_real_escape_string($db, $speciality_id));
    mysqli_query($db, $query);
}

function groups_get($db, $id){
    $sql = "SELECT * FROM ugroup WHERE id='$id'";
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_row($result);
}

function groups_update($db, $id, $name, $speciality_id){
    $sql = "UPDATE ugroup SET name='$name', speciality_id='$speciality_id'  WHERE id='$id'";
    mysqli_query($db, $sql);
}

function groups_delete($db, $id){
    $sql = "DELETE FROM ugroup WHERE id='$id'";
    mysqli_query($db, $sql);
}
