<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
      $_SESSION['message'] = 'Заполните все поля!';
      header('location: index.php');
    exit ();
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
$password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
// подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 
$result = mysqli_query($connect, "SELECT * FROM `users11` WHERE `login` = '$login'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysqli_fetch_assoc($result);
    if (empty($myrow['password']))
    {
    //если пользователя с введенным логином не существует
    $_SESSION['message'] = 'Пользователь с данным логином не зарегистрирован';
    header('Location: index.php');
    }
    else {
    //если существует, то сверяем пароли
    if ($myrow['password']==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['id']=$myrow['id'];
        $_SESSION['full_name']=$myrow['full_name'];
        $_SESSION['login']=$myrow['login']; 
    $_SESSION['email']=$myrow['$email'];
    $_SESSION['myrow'] = [
      "id" => $myrow['id'],
      "login" => $myrow['login'],
      "full_name" => $myrow['full_name'],
      // "avatar" => $myrow['avatar'],
      "email" => $myrow['email']
    ];
    header('Location: ../profile.php');
    //эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
       //  echo "Регистрация прошла успешно!";
    }
 else {
    //если пароли не сошлись
          $_SESSION['message'] = 'Неверный пароль!';
      header('Location: index.php');
    }
    }
    ?>