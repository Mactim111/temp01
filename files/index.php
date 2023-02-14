<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
    ?>
    <html>
    <head>
    <title>Главная страница</title>
    </head>
    <body>
    <h2>Главная страница</h2>
    <form action="testreg.php" method="post">

    <!--****  testreg.php - это адрес обработчика. То есть, после нажатия на кнопку  "Войти", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
 <p><label>Ваш логин:<br></label>
    <input name="login" type="text" size="15" maxlength="15"></p>
    <p><label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15"></p>
    <p><input type="submit" name="submit" value="Войти"><br>
    <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** --> 
 <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** --> 
<a href="reg.php">Зарегистрироваться</a> 
    </p></form>
    <br>
    <?php
    // Проверяем, пусты ли переменные логина и id пользователя
    // if (empty($_SESSION['login']) or empty($_SESSION['id']))
    // {
    // Если пусты, то мы не выводим ссылку
    // echo "Введите логин и пароль<br>";
    // }
    // else
    // {
      // $_SESSION['message'] = 'Неверный логин или пароль!';
      // header('Location: index.php');
              if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
    ?>
    </body>
    </html>