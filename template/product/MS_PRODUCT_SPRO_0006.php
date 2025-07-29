<?php 
    $home_product_new = $action_product->getListProductNew_hasLimit(6);
?>
<link rel="stylesheet" href="./plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="./plugin/owl-carouse/owl.theme.default.min.css">

<div class="gb-product-home">
    <!--HEADER PRODUICT TOP-->
    <div class="gb-product-top">
        <h2>SẢN PHẨM MỚI NHẤT</h2>
    </div>
    <!--SHOW PRODUCT ITEM-->
    <div class="gb-product-show">
        <div class="row">
            <!-- <div class="col-md-3">
                <a href=""><img src="images/banner/5_1.jpg" alt="" class="img-responsive"></a>
            </div> -->
            <div class="col-md-12">
                <div class="gb-product-show_slide-three-item owl-carousel owl-theme">
                    <?php 
                    foreach ($home_product_new as $item) {
                        $row = $item;
                        $rowLang = $action_product->getProductLangDetail_byId($item['product_id'],$lang);
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
    </div>
</div>

<script src="./plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $('.gb-product-show_slide-three-item').owlCarousel({
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
                    items:4
                }
            }
        });
    });
</script>