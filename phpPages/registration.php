<?php

if(isset($_POST["login"], $_POST["password"], $_POST["name"]))
{
    require "../vendor/autoload.php";

    $db = new Photos\DataBase();



    if($db->Check_login($_POST["login"]))
    {
        $db->new_users($_POST["name"], $_POST["password"], $_POST["login"]);

        header("Location: user.php?reg_secc=login");
    }
    else
    {
        header("Location: user.php?reg_error=login");
    }



}


?>