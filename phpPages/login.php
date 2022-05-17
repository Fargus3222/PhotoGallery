<?php

    if(isset($_POST["login"], $_POST["password"]))
    {
        require "../vendor/autoload.php";

        $db = new Photos\DataBase();

        $user_id = $db->Check_table($_POST["password"], $_POST["login"]);

        if($user_id)
        {
            session_start();

            $_SESSION["user_id"] = $user_id;

            header("Location: user.php");
        }
        else
        {
            header("Location: user.php?login_error=login");
        }




    }


?>