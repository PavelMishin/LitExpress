<?php include ROOT . '/views/layouts/header.php'; ?>

  <main>
    <div class="container">
      <section class="main-categories">
        <?php foreach ($categoriesList as $category):?>
        <div class="category">
          <a href="catalog/<?= $category['eng']?>">
            <img src="views/img/<?= $category['image']?>" width="200" height="150" alt=""><br>
            <span><?= $category['rus']?></span>
          </a>
        </div>
        <?php endforeach;?>
      </section>
      <section class="news">
        <h2>Последние новости</h2>
        <?php foreach ($newsList as $newsItem):?>
        <article class="news-item">
          <h3><?= $newsItem['title']?></h3>
          <span><?= $newsItem['date']?></span>
          <p class="news-content"><?= $newsItem['content']?></p>
        </article>
        <?php endforeach;?>
        <a href="news">Все новости</a>
      </section>
    </div>
  </main>

<?php include ROOT . '/views/layouts/footer.php'; ?>