<?php
    if(isset($_POST["src"], $_POST["text"]))
    {
        require "../vendor/autoload.php";
        $db = new Photos\DataBase();
        session_start();
        $user_id = $_SESSION["user_id"];
        $db->new_photo($user_id,$_POST["src"], $_POST["text"]);
        header("Location: user.php");
    }
?>