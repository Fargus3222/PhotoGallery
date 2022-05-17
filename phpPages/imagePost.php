<?php

    session_start();
    $photo_id = intval($_GET["id"]);
    $user_ID = $_SESSION["user_id"] ?? false;
    require "../vendor/autoload.php";
    $db = new Photos\DataBase();


    $photo = $db->get_image_by_id($photo_id);
    $photo_comment = $db->get_comments($photo_id);
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <link rel="stylesheet" href="../CSS/style.css">

    <link rel="stylesheet" href="../CSS/media.css">

    <link rel="stylesheet" href="../CSS/media2.css">

    <link rel="stylesheet" href="../CSS/style_add_photo.css">
</head>
<body>

    <?php
        require "header.php";
    ?>

        <div id="post">
            <img src="<?= $photo["image"] ?>" alt="">
            <h1><?= $photo["Text"] ?></h1>
            <p><?= $photo["Tags"] ?></p>
            <div class="comments">

                <div class="form">
                    <textarea id="text" rows="5"></textarea>
                    <button id="add_comment">Send</button>
                </div>

                <h2>Comments</h2>
                <?php foreach ($photo_comment as $comment):?>

                    <div class="comment">
                        <p class="autor"> Author -  <?= $comment["Name"]?></p>
                        <p class="text"><?= $comment["Text"]?></p>
                        <p class="date">Date of the post <?= $comment["Date_of_post"]?></p>
                    </div>

                <?php endforeach;?>

            </div>
        </div>

    <script src="../js/add_comment_async.js"></script>

</body>
</html>