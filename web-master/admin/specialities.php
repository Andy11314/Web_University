<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Partner</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/changelists.css">
    <script type="text/javascript" src="../js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../js/core.js"></script>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
    <meta name="robots" content="NONE,NOARCHIVE">
</head>
<body class=" app-skycode model-teacher change-list" data-admin-utc-offset="0">
<?php
include "../specialities.php";
$specialities = specialities_all($db);
?>
<div id="container">
    <div id="header">
        <div id="branding">
            <h1 id="site-name"><a href="../admin">Administration</a></h1>
        </div>
    </div>
    <div id="content" class="flex">
        <h1>Choose speciality</h1>
        <div id="content-main">
            <ul class="object-tools">
                <li>
                    <a href="../admin/addSpeciality.php" class="addlink">
                        Add speciality
                    </a>
                </li>
            </ul>
            <div class="module" id="changelist">
                <form id="changelist-form" method="post" novalidate="">
                    <div class="results">
                        <table id="result_list">
                            <thead>
                            <tr>
                                <th scope="col" class="column-__str__">
                                    <div class="text"><span>Speciality</span></div>
                                    <div class="clear"></div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($specialities as $s): ?>
                                <tr class="row1">
                                    <th class="field-__str__">
                                        <a href="../admin/updateSpeciality.php?id=<?=$s['id']?>"><?=$s['name']?>:<?=$s['course_id']?></a>
                                    </th>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <br class="clear">
    </div>
    <div id="footer"></div>
</div>
</body>
</html>