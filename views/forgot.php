<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container login-page">
        <h1>Забыли пароль?</h1>
        <form action="#" name="forgot" method="post">
            <p>Введите адрес электронной почты указанный при регистрации:</p>
            <input type="e-mail" name="e-mail" placeholder="E-mail" required>
            <input type="submit" value="Напомнить пароль">
        </form>
    </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>