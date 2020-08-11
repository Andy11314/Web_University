<?php

    include 'db.php';
    $action = '';

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if($action=='create'){
        $_POST = json_decode(file_get_contents('php://input'), true);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $question = $_POST['question'];
        $date = date('Y-m-d');
        $result = question_add($db, $name, $question, $email, $date);
        if($result){
            echo json_encode(array("error"=>false));
        } else{
            echo json_encode(array("error"=>true));
        }
    }

    if($action=='delete'){
        $id = $_GET['id'];
        question_delete($db, $id);
        header("location: ../admin/questions.php");
    }


    function questions_all($db){
        $sql = "SELECT * FROM question";
        $result = mysqli_query($db, $sql);

        $n = mysqli_num_rows($result);
        $questions = array();

        for($i = 0; $i<$n; $i++){
            $row = mysqli_fetch_assoc($result);
            $questions[] = $row;
        }

        return $questions;

    }

    function question_add($db, $name, $question, $email, $date){
        $sql = "INSERT INTO question (name, question, email, date) VALUES ('$name', '$question', '$email', '$date')";
        if(mysqli_query($db, $sql)) {
            return true;
        }
        return false;
    }

    function question_get($db, $id){
        $sql = "SELECT * FROM question WHERE id='$id'";
        $result = mysqli_query($db, $sql);
        return mysqli_fetch_row($result);
    }

    function question_delete($db, $id){
        $sql = "DELETE FROM question WHERE id='$id'";
        mysqli_query($db, $sql);
    }


