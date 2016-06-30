                    <?php foreach ($comments as $comment): ?>
                    <article class="comment">
                        <span><?= $comment['date'] ?></span>
                        <p><?= $comment['comment'] ?></p>
                    </article>
                    <?php endforeach; ?>