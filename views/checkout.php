<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container checkout-page">
        <h2>Оформление заказа</h2>
        <div class="total">
            <p>Товаров в корзине: <?= $totalQuantity ?>, на сумму: <?= $totalPrice ?></p>
        </div>
        <form action="#" name="checkout-form" method="post" >
                <label>Введите E-mail: <br>
                    <input type="e-mail" name="e-mail" placeholder="E-mail" value="<?= $email ?>" pattern="([0-9a-z]+@[a-z]+.[a-z]{0,3})" required>
                </label>
                <label>Ф.И.О.<br>
                    <input type="text" name="fio" placeholder="Фамилия Имя Отчество" value="<?= $fio ?>" required>
                </label>
                <label>Адрес<br>
                    <textarea name="address" placeholder="Адрес" rows="4" required><?= $address ?></textarea>
                </label>
                <label>Телефон<br>
                    <input type="text" name="telephone" placeholder="Телефон" value="<?php if (empty($telephone)) echo '+7 '; else echo $telephone ?>" pattern="[0-9+- ]+" required>
                </label>
                <label>Коментарий к заказу<br>
                    <textarea name="comment" placeholder="" rows="4"></textarea>
                </label>
            <input type="submit" name="checkout" value="Оформить заказ">
        </form>
    </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>