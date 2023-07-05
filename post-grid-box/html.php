<?php
template_part('posts', [
    'class' => 'posts--padding-bottom-lg',
    'limit' => 6,
    'slide_limit' => 2
]); ?>

<section class="posts <?php echo isset($class) ? $class : ''; ?>">
    <div class="container">
        <div class="posts__list <?php echo isset($col) ? 'posts__list--' . $col : ''; ?>" data-slide="<?php echo isset($slide_limit) ? $slide_limit : 3; ?>">
            <?php $limit_post = isset($limit) ? $limit : 6;
            for ($i = 0; $i < $limit_post; $i++) { ?>
                <article class="posts__item">
                    <div class="posts__item--inner">
                        <figure>
                            <a href="#">
                                <img src="<?php assets('images/post.png'); ?>" alt="">
                            </a>
                        </figure>
                        <div class="posts__item--body">
                            <h3><a href="#">デジタルマーケティング支援</a></h3>
                            <?php echo isset($description) ? '<p>自社のマーケティングを支える最適なデジタルマーケティングツールの導入をサポートします。</p>' : ''; ?>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </div>
    </div>
</section>