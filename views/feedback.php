<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container feedback-page">
        <h2>Форма обратной связи</h2>
        <form action="#" name="feedback-form" method="post">
                <label>Ваше имя:<br>
                    <input type="text" name="name" placeholder="Введите имя" value="<?= $name ?>">
                </label>
                <label>E-mail для обратной связи с вами:<br>
                    <input type="e-mail" name="e-mail" placeholder="Введите e-mail" value="<?= $email ?>">
                </label>
                <label>Текст сообщения:<br>
                    <textarea name="text" placeholder="Введите ваше сообщение" rows="6"></textarea>
                </label>
            <input type="submit" name="feedback" value="Отрпавить">
        </form>
        <b><?php if ($result) echo 'Сообщение отправлено!'; ?></b>
    </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>

