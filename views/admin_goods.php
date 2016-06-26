<?php include ROOT . '/views/layouts/header_admin.php'; ?>
    <main>
        <div class="container">
            <h4>Всего товаров: <?= $total ?></h4>
            <a href="/admin/goods/create">Добавить товар</a>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Цена</th>
                    <th>Раздел</th>
                    <th>Наличие</th>
                    <th>Удалить</th>
                    <th>Редактировать</th>
                </tr>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= $book['id'] ?></td>
                    <td><?= $book['title'] ?></td>
                    <td><?= $book['author'] ?></td>
                    <td><?= $book['price'] ?></td>
                    <td><?= $book['subcategory'] ?></td>
                    <td><?php if ($book['availability'] == 1) echo '+'; else echo '-'; ?></td>
                    <td><a href="/admin/goods/delete/<?= $book['id'] ?>">Х</a></td>
                    <td><a href="/admin/goods/update/<?= $book['id'] ?>">О</a></td>
                </tr>
            <?php endforeach; ?>
            </table>

        <section class="pages">
            <div class="pagination"><?= $pagination->get(); ?></div>
            <div class="capacity">
                <form action ="#" name="capacity-form" method="post">
                    <input type ="submit" name="capacity" value="10" class="<?php if ($_SESSION['capacity'] == 10) echo 'selected';?>">
                    <input type ="submit" name="capacity" value="20" class="<?php if ($_SESSION['capacity'] == 20) echo 'selected';?>">
                    <input type ="submit" name="capacity" value="50" class="<?php if ($_SESSION['capacity'] == 50) echo 'selected';?>">
                </form>
            </div>
        </section>
    </div>
    </main>
</body>
</html>