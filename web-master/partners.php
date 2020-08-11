<?php

    include 'db.php';
    $action = '';

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if($action=='delete'){
        $id = $_GET['id'];
        $partner = partner_get($db, $id);
        $file = $partner[2];
        unlink(substr($file, 3));
        partner_delete($db, $id);
        header("location: ../admin/partners.php");
    }

    function partners_all($db){
        $sql = "SELECT * FROM partner";
        $result = mysqli_query($db, $sql);

        $n = mysqli_num_rows($result);
        $partners = array();

        for($i = 0; $i<$n; $i++){
            $row = mysqli_fetch_assoc($result);
            $partners[] = $row;
        }

        return $partners;

    }

    function partner_add($db, $name, $image){
        $sql = "INSERT INTO partner (name, image) VALUES ('$name', '$image')";
        mysqli_query($db, $sql);
    }

    function partner_get($db, $id){
        $sql = "SELECT * FROM partner WHERE id='$id'";
        $result = mysqli_query($db, $sql);
        return mysqli_fetch_row($result);
    }

    function partner_update($db, $id, $name, $image){
        $sql = "UPDATE partner SET name='$name', image='$image' WHERE id='$id'";
        mysqli_query($db, $sql);
    }

    function partner_delete($db, $id){
        $sql = "DELETE FROM partner WHERE id='$id'";
        mysqli_query($db, $sql);
    }

