<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container cabinet-page">
        <h1>Личный кабинет</h1>
        <?php if (isset($message)) echo $message; ?>
        <a href="/user/edit">Изменение пользовательских данных</a>
        <a href="/user/history">История покупок</a>
        <?php if ($user['admin']) echo '<a href="/admin">Панель администратора</a>' ?>
    </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>