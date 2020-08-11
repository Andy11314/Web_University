<?php

    include 'db.php';
    $action = '';

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if($action=='delete'){
        $id = $_GET['id'];
        teacher_delete($db, $id);
        header("location: ../admin/teachers.php");
    }

    function teachers_all($db){
        $sql = "SELECT * FROM teacher";
        $result = mysqli_query($db, $sql);

        $n = mysqli_num_rows($result);
        $teachers = array();

        for($i = 0; $i<$n; $i++){
            $row = mysqli_fetch_assoc($result);
            $teachers[] = $row;
        }

        return $teachers;

    }

    function teacher_add($db, $name, $surname, $description, $email){
        $sql = "INSERT INTO teacher (name, surname, description, email) VALUES ('%s', '%s', '%s', '%s')";
        $query = sprintf($sql, mysqli_real_escape_string($db, $name), mysqli_real_escape_string($db, $surname),
            mysqli_real_escape_string($db, $description), mysqli_real_escape_string($db, $email));
        mysqli_query($db, $query);
    }

    function teacher_get($db, $id){
        $sql = "SELECT * FROM teacher WHERE id='$id'";
        $result = mysqli_query($db, $sql);
        return mysqli_fetch_row($result);
    }

    function teacher_update($db, $id, $name, $surname, $description, $email){
        $sql = "UPDATE teacher SET name='$name', surname='$surname', description='$description', email='$email' WHERE id='$id'";
        mysqli_query($db, $sql);
    }

    function teacher_delete($db, $id){
        $sql = "DELETE FROM teacher WHERE id='$id'";
        mysqli_query($db, $sql);
    }
