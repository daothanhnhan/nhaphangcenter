<div class="item-price">
    <div class="row">
        <div class="col-md-8">
            <p class="news-price"><?= number_format($row['product_price']-($row['product_price']*($row['product_price_sale']/100))) ?> Tệ</p>
            <p class="old-price"><?= number_format($row['product_price']) ?> Tệ</p>
        </div>
        <div class="col-md-4">
            <p class="sale-percent">-<?= $row['product_price_sale'] ?>%</p>
        </div>
    </div>
</div>