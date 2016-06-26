<?php include ROOT . '/views/layouts/header_admin.php'; ?>
    <main>
        <h4>Всего заказов: <?= $total ?></h4>
        <table>
            <tr>
                <th></th>
                <th>Номер заказа</th>
                <th>Ф.И.О.</th>
                <th>E-mail</th>
                <th>Адресс</th>
                <th>Номер телефона</th>
                <th>Комментарий</th>
                <th>Дата</th>
                <th>Статус</th>
            </tr>
        
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><a href="#" id="btn-<?= $order['id'] ?>" class="show">Корзина</a></td>
                <td><?= $order['id'] ?></td>
                <td><?= $order['fio'] ?></td>
                <td><?= $order['email'] ?></td>
                <td><?= $order['address'] ?></td>
                <td><?= $order['phone_number'] ?></td>
                <td><?= $order['comment'] ?></td>
                <td><?= $order['date'] ?></td>
                <td>
                    <form action="#" name="status_change" method="post">
                        <select name="status" class="status" id="status-<?= $order['id'] ?>">
                            <option value="1" <?php if ($order['status'] == 1) echo 'selected'; ?>>необработан</option>
                            <option value="2" <?php if ($order['status'] == 2) echo 'selected'; ?>>выполняется</option>
                            <option value="3" <?php if ($order['status'] == 3) echo 'selected'; ?>>завершён</option>
                        </select>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php foreach ($orders as $order): ?>
        <div class="hidden" id="<?= $order['id'] ?>">
            <a href="#" class="close" id="close-<?= $order['id'] ?>">X</a>
            <table>
                <tr>
                    <th>ID товара</th>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Год</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
                <?php foreach ($carts[$order['id']] as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['author'] ?></td>
                    <td><?= $row['year'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['count'] ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php   endforeach; ?>
    </main>
<script src="/components/admin.js"></script>
</body>
</html>