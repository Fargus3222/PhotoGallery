<?php
    require "../vendor/autoload.php";

    session_start();

    $user_ID = $_SESSION["user_id"] ?? false;

    $db = new Photos\DataBase();


    $photos = $db->get_all_rows("photos");
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../CSS/style.css">

    <link rel="stylesheet" href="../CSS/media.css">

    <link rel="stylesheet" href="../CSS/media2.css">

    <link rel="stylesheet" href="../CSS/style_add_photo.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Document</title>
    
</head>
<body>
    <?php include("header.php") ?>

    <h1>Глалерея</h1>

    <div id="grid">
        <?php foreach($photos as $photo): ?>
            <div class="photo">


                <?= (new Photos\Photo($photo["image"],$photo["Text"],$photo["id"]))->get_html(); ?>
            </div>
        <?php endforeach;?>
    </div>


    
</body>
</html>