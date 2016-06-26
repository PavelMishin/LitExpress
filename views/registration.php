<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container registration-page">
        <h1>Регистрация</h1>
        <?php if ($register): ?>
            <p>Вы зарегестрированы!</p>
        <?php else: ?>
        <form action="#" name="registration-form" method="post" >
            <label>Введите E-mail:<br> 
                <input type="e-mail" name="e-mail" placeholder="E-mail" value="<?= $email ?>" pattern="([0-9a-z]+@[a-z]+.[a-z]{0,3})" autofocus required>
            </label>
            <label>Введите пароль:<br>
                <input type="password" name="password" placeholder="не менее 6 символов" value="<?= $password ?>" pattern="([0-9a-zA-Zа-яА-ЯёЁ.,\- ]{6,})" required>
            </label>
            <input type="submit" name="registration" value="Зарегистрироваться">
        </form>
        <div class="error">
            <p><?= $error ?></p>
        </div>
        <?php endif; ?>
    </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>