<section class="catalog-categories">
    <ul>
        <li>
            <a href="/catalog" class="<?php if (!isset($category)) echo 'active';
            else echo ''?>">Все</a>
        </li>
        <?php foreach($categories as $categoryItem): ?>

        <li>

            <a href="/catalog/<?= $categoryItem['eng']?>" 
               class="<?php if (isset($category) && $category == $categoryItem['eng']) echo 'active';
               else echo ''?>">
                   <?= $categoryItem['rus']?>
            </a>

            <ul class="sub-categories <?php if (isset($category) && $category == $categoryItem['eng']) echo 'show';
            else echo '' ?>">

                <?php foreach($subCategories as $subCategoryItem) {
                    $class = '';
                    if (!isset($subCategory))
                            $subCategory = '';
                    if ($categoryItem['id'] == $subCategoryItem['parent_id']) {
                        if (isset($subCategory) && $subCategory == $subCategoryItem['eng']) {
                            $class = 'active';
                        } else {
                            $class = '';
                        }
                    echo '<li><a href="/catalog/' . $categoryItem['eng'] .
                            '/' . $subCategoryItem['eng'] . '"  class="' .
                            $class . '">' . $subCategoryItem['rus'] . '</a></li>';
                    }
                } ?>
            </ul>
        </li>
        <?php endforeach; ?>
    </ul>
</section>
