<header>
    <div class="popup">
        <a href="../index.php">Главная</a>

        <?php if ($user_ID):?>
            <a id="Show_add_photo" href="#">Фото</a>
        <?php endif;?>

        <a href="#">Посты</a>
        <a href="user.php">Личный кабинет</a>

        <?php if ($user_ID):?>
            <a href="logout.php">Выйти</a>
        <?php endif;?>
    </div>
    <div class="mobile_icon">
        <img src="../imgs/Hamburger_icon.svg.png" alt="">
    </div>
</header>



<div id="add_new_photo">
    <form action="new_photo.php" method="post">
        <input id="new_photo_src" type="text" placeholder="Картинка" name="src">
        <input id="new_photo_text" type="text" placeholder="Подпись" name="text">
        <button id="add_photo">Добавить</button>
        <button id="cancel">Отмена</button>
    </form>
</div>

<div id="popup_photo">

    <img src="" alt="">
    
</div>



<script src="../js/script.js"></script>
<script src="../js/script_add_new_photo.js"></script>

