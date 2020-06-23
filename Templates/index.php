<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php if (isset($_SESSION['logged_user'])) : ?>
        <a href="/?ctrl=User&user=<?= $_SESSION['logged_user']->login ?>"><?= $_SESSION['logged_user']->login ?></a>
        <a href="/?ctrl=SignOut">Выйти</a><br>
    <?php else: ?>
        <a href="/?ctrl=SignIn">Войти</a>
        <a href="/?ctrl=SignUp">Зарегистрироваться</a><br>
    <?php endif; ?>
    <?php foreach ($this->articles as $article) : ?>
        <article>
            <h1><a href="/?ctrl=Article&user=123&id=<?= $article->getId() ?>"><?= $article->title ?></a></h1>
            <p><?= $article->content ?></p>
        </article>
    <?php endforeach; ?>
</body>
</html>