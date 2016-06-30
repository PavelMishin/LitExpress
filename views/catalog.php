<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container catalog-container">
        <?php include ROOT . '/views/layouts/catalog_menu.php'; ?>
        <section class="books">
            <?php foreach ($books as $book): ?>
            <article class="book">
                <a href="/catalog/<?= $book['id'] ?>">
                    <div class="small-img">
                        <img src="/views/img/<?= $book['id'] ?>.jpg" height="200">
                    </div>
                    <span><?= $book['title'] ?></span><br>
                    <span class="author"><?= $book['author'] ?></span>
                </a>
                <div class="in-cart">
                    <span><?= $book['price'] ?> р.</span>
                    <a href="#" class="buy-btn" id ="<?= $book['id'] ?>"> <!--onclick="inCart.call(this)"-->В корзину</a>
                </div>
                
            </article>
            <?php endforeach; ?>
        </section>
        <section class="pages">
            <div class="pagination"><?= $pagination->get(); ?></div>
            <div class="capacity">
                <form action ="#" name="capacity-form" method="post">
                    <span>Показвать по:</span>
                    <input type ="submit" name="capacity" value="6" class="<?php if ($_SESSION['capacity'] == 6) echo 'selected';?>">
                    <input type ="submit" name="capacity" value="12" class="<?php if ($_SESSION['capacity'] == 12) echo 'selected';?>">
                    <input type ="submit" name="capacity" value="24" class="<?php if ($_SESSION['capacity'] == 24) echo 'selected';?>">
                </form>
            </div>
        </section>
    </div>
</main>
<?php include ROOT . '/views/layouts/footer.php'; ?>