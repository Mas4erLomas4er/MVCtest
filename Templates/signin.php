<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign-in</title>
</head>
<body>
    <?php
        session_start();
        $user = $this->data['user'];
    ?>
    <a href="index.php ">На главную</a><br>
    <form action="/?ctrl=SignIn" method="post">
        <p>
            <label for="login"><b>Логин</b></label><br>
            <input type="text" name="login" id="login">
        </p>
        <p>
            <label for="password"><b>Пароль</b></label><br>
            <input type="text" name="password" id="password">
        </p>
        <p>
            <button type="submit" name="submit">Зарегстрирваться</button>
        </p>
    </form>
    <?php
        $data = $_POST;
        if (isset($data['submit'])) {
            $user = $user::loadBy(['login' => $data['login']]);
            if ($user)
            {
                if (password_verify($data['password'], $user->password))
                {
                    echo "Чувак, а ты мощный!";
                    $_SESSION['logged_user'] = $user;
                    setcookie('is_logged', true);
                    header('Location: /');
                }
                else
                {
                    echo "Ха, лошара! Чё, забыл пароль?))";
                }
            }
            else
            {
                echo "Не нагружай, плиз, бд своими попытками вспомнить логин!";
            }
        }
    ?>
</body>
</html>