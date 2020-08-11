<?php
include "../partners.php";

$id =(int)($_GET['id']);
$partner = partner_get($db, $id);

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $file_name = $_FILES['image']['name'];
    if($file_name!=""){
        $file_temp_location = $_FILES['image']['tmp_name'];
        $file_store = "../upload/".$file_name;
        move_uploaded_file($file_temp_location, $file_store);
        partner_update($db, $id, $name, $file_store);
    } else{
        $file_store = $partner[2];
        partner_update($db, $id, $name, $file_store);
    }
    header("location: ../admin/partners.php");
}
?>
<!DOCTYPE html>
<html lang="ru-ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Add partner</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/forms.css">
    <script type="text/javascript" src="../js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../js/core.js"></script>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    <meta name="robots" content="NONE,NOARCHIVE">
</head>
<body class=" app-skycode model-teacher change-form" data-admin-utc-offset="0">
<div id="container">
    <div id="header">
        <div id="branding">
            <h1 id="site-name"><a href="../admin">Administration</a></h1>
        </div>
    </div>

    <div id="content" class="colM">
        <h1>Add partner</h1>
        <div id="content-main">
            <form enctype="multipart/form-data" action="" method="post" id="partner_form" novalidate="">
                <div>
                    <fieldset class="module aligned ">
                        <div class="form-row field-name">
                            <div>
                                <label class="required" for="id_name">Name:</label>
                                <input type="text" value="<?=$partner[1]?>" name="name" class="vTextField" maxlength="50" required="" id="id_name">
                            </div>
                        </div>
                        <div class="form-row field-image">
                            <div>
                                <label class="required" for="id_image">Image:</label>
                                <input type="file" value="" name="image" required="" id="id_image"><span><?=$partner[2]?></span>
                            </div>
                        </div>
                    </fieldset>
                    <div class="submit-row">
                        <p class="deletelink-box"><a href="../partners.php?action=delete&id=<?=$partner[0]?>" class="deletelink">Delete</a></p>
                        <input type="submit" value="Save" class="default" name="submit">
                    </div>
                </div>
            </form>
        </div>
        <br class="clear">
    </div>
    <div id="footer"></div>
</div>
</body>
</html>