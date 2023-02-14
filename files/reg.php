<html>
    <head>
    <title>Регистрация</title>
    </head>
    <body>
    <h2>Регистрация</h2>
    <form action="save_user.php" method="post" enctype="multipart/form-data">
    <p><label>ФИО:<br></label>
    <input name="full_name" type="text" placeholder="Введите ФИО"><samp style="color:red">*</samp></p></p>

     <p><label>Ваш email:<br></label>
    <input name="email" type="email" placeholder="Введите адрес почты"><samp style="color:red">*</samp></p></p>

    <p><label>Ваш логин:<br></label>
    <input name="login" type="text" placeholder="Введите свой логин"><samp style="color:red">*</samp></p></p>

    <p><label>Ваш пароль:<br></label></p>
    <p><input name="password" type="password" placeholder="Введите пароль"><samp style="color:red">*</samp></p></p>
    <p><label>Подтверждение пароля:</label><br>
    <input type="password" name="password_confirm" placeholder="Подтвердите пароль"><samp style="color:red">*</samp></p></p>

<p><input type="submit" name="submit" value="Зарегистрироваться"></p>
<p>У вас уже есть аккаунт? - <a href="/">авторизируйтесь</a>!</p>
</form>
    </body>
    </html>
    <?php
    if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
    <!-- size="15" maxlength="15"  -->