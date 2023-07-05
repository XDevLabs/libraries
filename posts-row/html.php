<?php $services = [
    [
        'image' => 'images/credit-card.png',
        'title' => 'CREDIT CARD',
        'content' => '各種クレジットカードがご利用いただけます'
    ],
    [
        'image' => 'images/car-space.png',
        'title' => 'CAR SPACE',
        'content' => '無料駐車場がございます'
    ],
    [
        'image' => 'images/kids-space.png',
        'title' => 'KIDS SPACE',
        'content' => 'EVA素材のやわらか極厚マットを設置しています（只今休止中）'
    ],
    [
        'image' => 'images/point-card.png',
        'title' => 'POINT CARD',
        'content' => 'キャッシュ専用のポイントカードです（一部対象外製品があります）'
    ]
];
foreach ($services as $item) { ?>
    <div class="shop-services__item">
        <?php if (isset($item['image'])) { ?>
            <figure>
                <img src="<?php assets($item['image']); ?>" alt="">
            </figure>
        <?php } ?>
        <div class="shop-services__item--body">
            <?php echo isset($item['title']) ? '<h3>' . $item['title'] . '</h3>' : '';
            echo isset($item['content']) ? '<p>' . $item['content'] . '</p>' : ''; ?>
        </div>
    </div>
<?php } ?>