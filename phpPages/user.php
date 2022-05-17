<?php
   session_start();

    $user_ID = $_SESSION["user_id"] ?? false;

    if (isset($_GET["login_error"]))
    {
        $error = "Not current password or username";
    }

    if (isset($_GET["reg_error"]))
    {
        $error = "Not current email";
    }
    if (isset($_GET["reg_secc"]))
    {
        $error = "Registration is complete";
    }

require "../vendor/autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../CSS/style.css">

    <link rel="stylesheet" href="../CSS/media.css">

    <link rel="stylesheet" href="../CSS/media2.css">

    <link rel="stylesheet" href="../CSS/style_add_photo.css">
</head>
<body>



    <?php include("header.php") ?>




    <?php if($user_ID): ?>

        <?php

            $db = new Photos\DataBase();


            $photos = $db->get_all_rows_where_uid("photos", $user_ID);
        ?>


        <h1>Личная галлерея</h1>

        <div id="grid">
            <?php foreach($photos as $photo): ?>
                <div class="photo">


                    <?= (new Photos\Photo($photo["image"],$photo["Text"],$photo["id"]))->get_html(); ?>
                </div>
            <?php endforeach;?>
        </div>


        

    <?php else: ?>

        <div class="form">

            <form action="login.php" method="post">
                <?php if(isset($_GET["login_error"])):?>
                    <h1>Not current login or password</h1>

                    <?php else:?>
                        <h1>Autorization</h1>
                <?php endif;?>

                <input type="text" placeholder="Login" name="login">
                <input type="password" placeholder="Password" name="password">
                <button>Enter</button>
            </form>
        </div>

        <div class="form">

            <form action="registration.php" method="post">
                <?php if(isset($_GET["reg_error"]) || isset($_GET["reg_secc"])):?>
                    <h1><?= $error ?></h1>

                    <?php else:?>
                        <h1>Registration</h1>
                <?php endif;?>
                <input type="name" placeholder="Your name" name="name">
                <input type="text" placeholder="Your Email" name="login">
                <input type="password" placeholder="Your password" name="password">
                <button>Enter</button>
            </form>
        </div>


    <?php endif; ?>



    

    




</body>
</html>