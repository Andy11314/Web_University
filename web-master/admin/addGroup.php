<?php
include "../groups.php";
include "../specialities.php";
$specialities = specialities_all($db);
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $speciality = $_POST['speciality'];
    groups_add($db, $name, $speciality);
    header("location: ../admin/groups.php");
}
?>
<!DOCTYPE html>
<html lang="ru-ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Add Group</title>
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
            <h1>Add group</h1>
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
                                    <label class="required" for="speciality">Speciality:</label>
                                    <select id="speciality" name="speciality">
                                        <option value=""></option>
                                        <?php foreach ($specialities as $s): ?>
                                            <option value="<?=$s['id']?>"><?=$s['name']?>:<?=$s['course_id']?></option>
                                        <?php endforeach; ?>
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