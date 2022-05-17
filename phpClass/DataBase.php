<?php 
    namespace Photos;
	use mysqli;
	


    class DataBase
    {
        static $host = "localhost";
        static $user = "root";
        static $password = "root";
        static $database = "lerning";
        
        public $link;


        public function __construct()
        {
            $this->link = new mysqli (DataBase::$host, DataBase::$user,DataBase::$password, DataBase::$database);
            $this->link->set_charset("utf8");
        }

        public function get_all_rows($tablename)
        {
            $rows = $this->link->query("SELECT * FROM `{$tablename}`")->fetch_all(MYSQLI_ASSOC);
            if ($rows)
            {
                return $rows;
            }
            else
            {
                return [];
            }
        }


        public function get_comments($photo_id)
        {

            $rows = $this->link->query("SELECT `c`.*, `u`.`Name` FROM `comments` `c` LEFT JOIN `users` `u` on `u`.`id` = `c`.`Uid` WHERE `c`.`Pid` = {$photo_id}");
            if ($rows->num_rows)
            {
                return $rows->fetch_all(MYSQLI_ASSOC);;
            }
            else
            {
                return [];
            }
        }

        public function get_all_rows_where_uid($tablename, $uid)
        {
            $rows = $this->link->query("SELECT * FROM `{$tablename}` WHERE `Uid` = '{$uid}' ORDER BY `id` DESC ")->fetch_all(MYSQLI_ASSOC);
            if ($rows)
            {
                return $rows;
            }
            else
            {
                return [];
            }
        }

        public function Check_table($password,$login)
        {
            $sql_result = $this->link->query("SELECT * FROM `users` WHERE `Email` = '{$login}' AND `Password` = '{$password}'");

            if($sql_result->num_rows)
            {
                $user_info = $sql_result->fetch_assoc();
                return $user_info["id"];
            }
            else
            {
                return false;
            }
        }

        public function get_image_by_id($id)
        {
            $sql_result = $this->link->query("SELECT * FROM `photos` WHERE `id` = '{$id}'");

            if($sql_result->num_rows)
            {
                return $sql_result->fetch_assoc();
            }
            else
            {
                return false;
            }
        }


        public function Check_login($login)
        {
            $sql_result = $this->link->query("SELECT * FROM `users` WHERE `Email` = '{$login}'");

            if($sql_result->num_rows)
            {
                return false;
            }
            else
            {
                return true;
            }
        }

        public function new_photo($uid, $src, $text)
        {
            $this->link->query("INSERT INTO `photos` VALUES (NULL,{$uid}, '{$src}','{$text}','')");
        }


        public function new_users($name, $password, $email)
        {
            $this->link->query("INSERT INTO `users` VALUES (NULL,'{$name}', '{$password}','{$email}')");
        }

        public function post_comment($pid, $uid, $text)
        {
            $date = date ("Y-m-d");
            $this->link->query("INSERT INTO `comments` (Pid,Uid,Text,Date_of_post) VALUES ($pid,$uid,'$text','$date')");


            $last_id = $this->link->insert_id;

            $inserted_comment = $this->link->query("SELECT `c`.*, `u`.`Name` FROM `comments` `c` LEFT JOIN `users` `u` on `u`.`id`=`c`.Uid WHERE `c`.`id` = '$last_id'");
            return $inserted_comment->fetch_assoc();
        }
    }