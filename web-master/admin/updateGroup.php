<?php
include "../groups.php";
include "../specialities.php";
include "../lessons.php";

$id =(int)($_GET['id']);
$group = groups_get($db, $id);
$specialities = specialities_all($db);
$lessons = lessons_by_group($db, $id);
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $speciality = $_POST['speciality'];
    specialities_update($db, $id, $name, $speciality);
    header("location: ../admin/groups.php");
}
if(isset($_POST['add'])){
    $subject = $_POST['subject'];
    $teacher = $_POST['teacher'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    lessons_add($db, $subject, $teacher, $day, $time, $location, $id);
    header("location: ../admin/updateGroup.php?id=$id");
}

?>
<!DOCTYPE html>
<html lang="ru-ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Add group</title>
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
        <h1>Update group</h1>
        <div id="content-main">
            <form method="post" id="teacher_form" novalidate="">
                <div>
                    <fieldset class="module aligned ">
                        <div class="form-row field-firstName">
                            <div>
                                <label class="required" for="id_firstName">Name:</label>
                                <input type="text" value="<?=$group[1]?>" name="name" class="vTextField" maxlength="50" required="" id="id_firstName">
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
                        <p class="deletelink-box"><a href="../groups.php?action=delete&id=<?=$group[0]?>" class="deletelink">Delete</a></p>
                        <input type="submit" value="Update" name="submit">
                    </div>
                </div>
            </form>
        </div>
        <br class="clear">
        <div class="row">
            <form method="post">
                <input type="hidden" value="<?=$group[0]?>">
                <label for="subject">Subject</label>
                <input id="subject" type="text" name="subject">
                <label for="teacher">Teacher</label>
                <input id="teacher" type="text" name="teacher">
                <label for="day">Day</label>
                <select id="day" name="day">
                    <option value=""></option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                </select>
                <label for="time">Time</label>
                <input id="time" type="text" name="time">
                <label for="location">Location</label>
                <input id="location" type="text" name="location">
                <input type="submit" name="add" value="Add">
            </form>
            <?php foreach ($lessons as $l): ?>
                <p><?=$l['day']?>:<?=$l['subject']?>:<?=$l['time']?></p>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="footer"></div>
</div>
</body>
</html>