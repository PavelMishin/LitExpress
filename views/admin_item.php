<?php include ROOT . '/views/layouts/header_admin.php'; ?>
    <main>
        <div class="container">
            <h2></h2>
            <form action="#"  name="add-form" method="post">
                <label>Название<br>
                    <input type="text" name="title" value="<?= $book['title'] ?>" required>
                </label>
                <label>Автор<br>
                    <input type="text" name="author" value="<?= $book['author'] ?>" required>
                </label>
                <label>Подраздел<br>
                    <select name="subcategory">
                        <?php foreach ($subCategories as $sub): ?>
                            <option value="<?= $sub['id'] ?>" 
                                <?php if ($sub['eng'] == $book['subCategory']) echo 'selected'?>>
                                <?= $sub['rus'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label>Год издания<br>
                    <input type="number" name="year" value="<?= $book['year'] ?>" required>
                </label>
                <label>ISBN<br>
                    <input type="text" name="isbn" value="<?= $book['ISBN'] ?>" required>
                </label>
                <label>Цена<br>
                    <input type="number" name="price" value="<?= $book['price'] ?>" required>
                </label>
                <label>Количество страниц<br>
                    <input type="number" name="pages" value="<?= $book['pages'] ?>" required>
                </label>
                <label>Издатель<br>
                    <input type="text" name="publisher" value="<?= $book['publisher'] ?>">
                </label>
                <label>Описание<br>
                    <textarea name="description" rows="10" cols="100"><?= $book['description'] ?></textarea>
                </label>                
                <input type="submit" name="save" value="Сохранить">
            </form>
            <b><?php if (isset($result)) echo 'Товар c id = ' . $id . 'успешно сохранён'?></b>
            
            <a href="/admin/goods">Назад</a>
    </main>
</body>
</html>

