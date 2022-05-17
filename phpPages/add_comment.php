<?php


session_start();




if (isset($_POST["photo_id"],$_POST["text"],$_SESSION["user_id"]))
{
    require "../vendor/autoload.php";


    $db = new Photos\DataBase();

    $inserted_comment = $db->post_comment($_POST["photo_id"],$_SESSION["user_id"],$_POST["text"]);

    //var_dump($inserted_comment);

    echo json_encode($inserted_comment);

}
