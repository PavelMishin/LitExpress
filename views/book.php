<?php
include ROOT . '/views/layouts/header.php';
$category = $book['category'];
$subCategory = $book['subCategory'];
?>

<main>
    <div class="container catalog-container">
        <?php include ROOT . '/views/layouts/catalog_menu.php'; ?>
        <article class="book-detail">
            <img src="/views/img/<?= $book['id'] ?>.jpg" width="250">
            <div class="detail">
                <span>Название: <em><?= $book['title'] ?></em></span>
                <span>Автор: <em><?= $book['author'] ?></em></span>
                <span>Год издания: <i><?= $book['year'] ?></i></span>
                <span>Количество страниц: <i><?= $book['pages'] ?></i></span>
                <span>Издательство: <em><?= $book['publisher'] ?></em></span>
                <span>Код ISBN: <em><?= $book['ISBN'] ?></em></span>
                <span><?php if ($book['availability'] == 1)
                            echo 'В наличии'; else echo 'нет в наличии'; ?></span>
                <span>Цена: <i><?= $book['price'] ?> р.</i></span><br>
                <a id ="<?= $book['id'] ?>" onclick="inCart.call(this)">Купить</a>
            </div>
            <p><?= $book['description'] ?></p>
        </article>
    </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>