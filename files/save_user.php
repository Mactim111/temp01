<?php
session_start();
    if (isset($_POST['full_name'])) { $full_name = $_POST['full_name']; 
    if ($full_name == '') { unset($full_name);} } 

    if (isset($_POST['login'])) { $login = $_POST['login']; 
    if ($login == '') { unset($login);} }
     //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['email'])) { $email = $_POST['email']; 
    if ($email == '') { unset($email);} } 

    if (isset($_POST['password'])) { $password = $_POST['password']; 
    if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
//     if (empty($full_name) or empty($email))//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
//     {
//     exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
//     } //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    $full_name = stripslashes($full_name);
    $full_name = htmlspecialchars($full_name);
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);


 //удаляем лишние пробелы
    $full_name = trim($full_name);
    $login = trim($login);
    $email = trim($email);
    $password = trim($password);
 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
    $result = mysqli_query($connect, "SELECT `id` FROM `users11` WHERE `login` = '$login'");
    $myrow = mysqli_fetch_assoc($result);
    if (!empty($myrow['id'])) {
     $_SESSION['message'] = 'Извините, введённый вами логин уже зарегистрирован. Введите другой логин.';
     // header('location: index.php');
//     exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
 // если такого нет, то сохраняем данные
     if($password === $password_confirm) {
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $result2 = mysqli_query($connect, "INSERT INTO `users11` (`full_name`, `login`, `email`, `password`) VALUES 
    ('$full_name', '$login', '$email', '$password')");
    // Проверяем, есть ли ошибки
//     if ($result2=='TRUE')
     $_SESSION['message'] = 'Регистрация прошла успешно!';
     header('location: index.php');
    }
 else {
     $_SESSION['message'] = 'Пароли не совпадают. Попробуйте еще раз';
     header('location: reg.php');
    }
    ?>
        if ($_POST['pass'] !== $_POST['pass_rep']) {
        $error = 'Пароли не совпадают';
    }
    
    // Проверка есть ли вообще повторный пароль
    if (!$_POST['pass_rep']) {
        $error = 'Подтвердите пароль';
    }

    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);