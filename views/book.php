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
                <a href="#" class="buy-btn btn" id ="<?= $book['id'] ?>"> <!--onclick="inCart.call(this)"-->Купить</a>
            </div>
            <p><?= $book['description'] ?></p>
            
            <section class="comment-section">
                <?php if (isset($_SESSION['user'])): ?>
                <div class="user-id" id="<?= $_SESSION['user'] ?>"></div>
                <div id="new-comment">
                    <textarea id="comment" rows="3" placeholder="Введите ваше сообщение" required></textarea>
                    <a href="#" class="send-btn btn" id="send"> <!--onclick="sendComment.call(this)"-->Отправить комментарий</a>
                </div>
                <?php else: ?>
                <i>Оставлять комментарии могут только зарегистрированные пользователи</i>
                <?php endif ?>
                <div class="comments">
                    <?php include ROOT . '/views/layouts/comments.php'; ?>
                </div>
            </section>
        </article>
    </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>