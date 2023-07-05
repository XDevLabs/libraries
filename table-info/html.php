<?php $shop_info = [
    [
        'label' => '店　名',
        'text' => '学生服のつちや 稲荷前店'
    ],
    [
        'label' => '所在地',
        'text' => '〒305-0061 茨城県つくば市稲荷前23-1'
    ],
    [
        'label' => '電話番号',
        'text' => '<a href="tel:029-851-6636">029-851-6636</a>'
    ],
    [
        'label' => '営業時間',
        'text' => '10：00～19：00（1～5月） <br class="hide-pc">11：00～19：00（6～12月）'
    ],
    [
        'label' => '定休日',
        'text' => '水曜（1～5月）水曜・祭日（6～12月）'
    ]
];
if (isset($shop_info)) { ?>
    <div class="shop-info__detail">
        <?php foreach ($shop_info as $item) { ?>
            <div class="shop-info__detail--row">
                <label for=""><?php echo isset($item['label']) ? $item['label'] : ''; ?></label>
                <p><?php echo isset($item['text']) ? $item['text'] : ''; ?></p>
            </div>
        <?php } ?>
    </div>
<?php }
