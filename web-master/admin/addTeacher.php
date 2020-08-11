<?php
include "../teachers.php";
if(isset($_POST['submit'])){
    $name = $_POST['firstName'];
    $surname = $_POST['lastName'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    teacher_add($db, $name, $surname, $description, $email);
    header("location: ../admin/teachers.php");
}
?>
<!DOCTYPE html>
<html lang="ru-ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Add Teacher</title>
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
            <h1>Add teacher</h1>
            <div id="content-main">
                <form method="post" id="teacher_form" novalidate="">
                    <div>
                        <fieldset class="module aligned ">
                            <div class="form-row field-firstName">
                                <div>
                                    <label class="required" for="id_firstName">Name:</label>
                                    <input type="text" name="firstName" class="vTextField" maxlength="50" required="" id="id_firstName">
                                </div>
                            </div>
                            <div class="form-row field-lastName">
                                <div>
                                    <label class="required" for="id_lastName">Surname:</label>
                                    <input type="text" name="lastName" class="vTextField" maxlength="50" required="" id="id_lastName">
                                </div>
                            </div>
                            <div class="form-row field-description">
                                <div>
                                    <label class="required" for="id_description">Description:</label>
                                    <textarea name="description" cols="40" rows="10" class="vLargeTextField" maxlength="150" required="" id="id_description"></textarea>
                                </div>
                            </div>
                            <div class="form-row field-email">
                                <div>
                                    <label class="required" for="id_email">Email:</label>
                                    <input type="email" name="email" class="vTextField" maxlength="254" required="" id="id_email">
                                </div>
                            </div>
                        </fieldset>
                        <div class="submit-row">
                            <input type="submit" value="Save" name="submit">
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