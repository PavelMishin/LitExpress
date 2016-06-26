<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container call-page">
        <h1>Заказ звонка</h1>
        <?php if (isset($message)): ?>
        <b><?= $message ?></b>
        <?php else: ?>
        <form action="#" name="forgot" method="post">
            <p>Закажите звонок и наш оператор свяжеться с вами в удобное для вас время</p>
            <input type="text" name="telephone" placeholder="номер телефона" required>
            <input type="text" name="name" placeholder="ваше имя">
            <label>Выберете время
                <input type="time" name="time">
            </label>
            <input type="submit" value="Заказать звонок!">
        </form>
        <?php endif; ?>
    </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>