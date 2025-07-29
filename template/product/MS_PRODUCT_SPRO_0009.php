<?php 
    $product_related1 = $action_product->getListProductRelate_byIdCat_hasLimit($productcat_id, 6);//var_dump($product_related1);die;
?>
<link rel="stylesheet" href="./plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="./plugin/owl-carouse/owl.theme.default.min.css">

<div class="gb-product-home">
    <!--HEADER PRODUICT TOP-->
    <div class="gb-product-top">
        <h2>SẢN PHẨM TƯƠNG TỰ</h2>
    </div>
    <!--SHOW PRODUCT ITEM-->
    <div class="gb-product-show">
        <div class="gb-product-sptt-three-item owl-carousel owl-theme">
            <?php 
            foreach ($product_related1 as $item) {
                $row = $item;
                $rowLang = $action_product->getProductLangDetail_byId($row['product_id'],$lang);
            ?>
            <div class="item">
                <div class="product-item">
                    <!--BOX SALE-->
                    <?php 
                    if ($row['product_price_sale'] != 0) {
                        include DIR_PRODUCT."MS_PRODUCT_SPRO_0005.php";
                    }
                    ?>
                    <div class="item-img">
                        <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $row['product_img'] ?>" alt="<?= $rowLang['lang_product_name'] ?>" class="img-responsive"></a>
                    </div>
                    <div class="item-text">
                        <h3><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_product_name'] ?></a></h3>
                        <!--PRICE-->
                        <?php include DIR_PRODUCT."MS_PRODUCT_SPRO_0002.php";?>
                        <!--tình trạng-->
                        <?php include DIR_PRODUCT."MS_PRODUCT_SPRO_0003.php";?>
                        <!--NHẬN XÉT-->
                        <?php include DIR_PRODUCT."MS_PRODUCT_SPRO_0004.php";?>
                        <!--Add to cart-->
                        <?php include DIR_CART."MS_CART_SPRO_0003.php";?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="./plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $('.gb-product-sptt-three-item').owlCarousel({
            loop:true,
            responsiveClass:true,
            nav:true,
            navText:[],
            dots:false,
            margin:30,
            responsive:{
                0:{
                    items:1
                },
                768:{
                    items:3
                }
            }
        });
    });
</script>