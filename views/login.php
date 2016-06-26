<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container login-page">
        <h1>Страница входа</h1>
        <p><?php
        $message = '';
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        else if (isset($error)) $message = $error;
        echo $message; ?></p>
        <form action="/user/login" name="login" method="post">
            <input type="submit" value="Войти">
            <div class='identify'>
                <input type="e-mail" name="e-mail" placeholder="E-mail" required>
                <input type="password" name="password" placeholder="Пароль" required>
            </div>
          </form>
        <a href="/user/registration">Регистрация</a>
    </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>