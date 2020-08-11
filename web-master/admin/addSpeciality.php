<?php
include "../specialities.php";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $course = $_POST['course'];
    specialities_add($db, $name, $course);
    header("location: ../admin/specialities.php");
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
            <h1>Add speciality</h1>
            <div id="content-main">
                <form method="post" id="teacher_form" novalidate="">
                    <div>
                        <fieldset class="module aligned ">
                            <div class="form-row field-firstName">
                                <div>
                                    <label class="required" for="id_firstName">Name:</label>
                                    <input type="text" name="name" class="vTextField" maxlength="50" required="" id="id_firstName">
                                </div>
                            </div>
                            <div class="form-row field-lastName">
                                <div>
                                    <label class="required" for="id_course">Course:</label>
                                    <select id="id_course" name="course">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
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