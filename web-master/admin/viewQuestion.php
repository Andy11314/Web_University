
<?php
include "../questions.php";

$id =(int)($_GET['id']);
$question = question_get($db, $id);

?>
<!DOCTYPE html>
<html lang="ru-ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Question</title>
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
            <h1>Question</h1>
            <div id="content-main">
                <form action="" method="post" id="question_form" novalidate="">
                    <div>
                        <fieldset class="module aligned ">
                            <div class="form-row field-name">
                                <div>
                                    <label class="required" for="id_name">Name:</label>
                                    <input type="text" name="name" value="<?=$question[1]?>" class="vTextField" maxlength="50" required="" id="id_name">
                                </div>
                            </div>
                            <div class="form-row field-email">
                                <div>
                                    <label class="required" for="id_email">Email:</label>
                                    <input type="email" name="email" value="<?=$question[3]?>" class="vTextField" maxlength="50" required="" id="id_email">
                                </div>
                            </div>
                            <div class="form-row field-question">
                                <div>
                                    <label class="required" for="id_question">Question:</label>
                                    <textarea name="question" cols="40" rows="10" class="vLargeTextField" maxlength="200" required="" id="id_question">
                                        <?=$question[2]?>
                                    </textarea>
                                </div>
                            </div>
                        </fieldset>
                        <div class="submit-row">
                            <p class="deletelink-box"><a href="../questions.php?action=delete&id=<?=$question[0]?>" class="deletelink">Delete</a></p>
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