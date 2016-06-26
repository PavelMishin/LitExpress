<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container">
        <?php foreach ($newsList as $newsItem): ?>
        <div class="post">
            <h2><?= $newsItem['title'] ?></h2>
            <p><?= $newsItem['date'] ?></p>
            <p class="news-content"><?= $newsItem['content'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</main>
        
<?php include ROOT . '/views/layouts/footer.php'; ?>