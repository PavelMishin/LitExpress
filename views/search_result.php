<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container">
        <?php include ROOT . '/views/layouts/catalog_menu.php'; ?>
        <section class="books">
            <div class="search-result">
                <?php echo $books ? '<b>По запросу <i>' . $searchQuery . '</i> '
                        . 'найдено <i>' . $total . '</i> товаров</b>' :
                        '<b>По вашему запросу ничего не найдено!</b>' ?>
            </div>
            <?php foreach ($books as $book): ?>
                <article class="book">
                    <a href="/catalog/<?= $book['id'] ?>">
                        <div class="small-img">
                            <img src="/views/img/<?= $book['id'] ?>.jpg" height="200">
                        </div>
                        <span><?= $book['title'] ?></span><br>
                        <span><?= $book['author'] ?></span>
                    </a>
                    <div class="in-cart">
                        <span><?= $book['price'] ?> р.</span>
                        <a href="#" id ="<?= $book['id'] ?>" onclick="inCart.call(this)">В корзину</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </div>
</main>
<?php include ROOT . '/views/layouts/footer.php'; ?>