<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container">
        <h1>Корзина</h1>
        <?php if ($goodsInCart): ?>
        <table>
            <tr>
                <th>Код товара</th>
                <th>Название книги</th>
                <th>Стоимость, руб.</th>
                <th>Количество, шт.</th>
            </tr>
            <?php foreach ($cartList as $item): ?>
            <tr>
                <td><?= $item['id']; ?></td>
                <td><?= $item['title']; ?></td>
                <td><?= $item['price']; ?></td>
                <td><?= $goodsInCart[$item['id']]; ?></td>
                <td><a href="cart/delete/<?= $item['id']?>">X</a></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">Общая стоимость: </td>
                <td><?= $totalPrice; ?></td>
            </tr>
        </table>
        <a href="/checkout">Перейти к оформлению заказа</a>
        <?php else: ?>
            <p>В корзине нет товаров.</p>
        <?php endif; ?>
    </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>