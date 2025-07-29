<?php 
    $home_product_sale = $action_product->getListProductSaleOff_hasLimit(6);
    $home_product_hot = $action_product->getListProductHot_hasLimit(6);
    $home_product_spec = $action_product->getProductFavoriteList_limit(6);
?>
<link rel="stylesheet" href="./plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="./plugin/owl-carouse/owl.theme.default.min.css">

<div class="gb-product-home">
    <!--HEADER PRODUICT TOP-->
    <div class="gb-product-top">
        <div class="row">
            <div class="col-md-4">
                <h2>TOP SẢN PHẨM TAOBAO</h2>
            </div>
            <div class="col-md-7">
                <div class="gb-prodct-top-tab">
                    <div class="panel-heading">
                        <!--NAV ICONS-->
                        <div class="icons-nav-product">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                        <ul class="nav nav-tabs product-menu-content">
                            <li class="active"><a href="#tab1default" data-toggle="tab">Sản phẩm khuyến mại</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Sản phẩm bán chạy</a></li>
                            <li><a href="#tab3default" data-toggle="tab">Sản phẩm nổi bật</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>


    <!--SHOW PRODUCT ITEM-->
    <div class="gb-product-show">
        <div class="panel-body">
            <div class="tab-content">
                <!--SẢN PHẨM KHUYẾN MẠI-->
                <div class="tab-pane fade in active" id="tab1default">
                    <div class="gb-product-show_slide list_product owl-carousel owl-theme">
                        <?php 
                        foreach ($home_product_sale as $item) {
                            $row = $item;
                            $rowLang = $action_product->getProductLangDetail_byId($item['product_id'],$lang);
                        ?>
                        <div class="item">
                            <div class="product-item">

                                <!--BOX SALE-->
                                <?php include DIR_PRODUCT."MS_PRODUCT_SPRO_0005.php";?>

                                <div class="item-img">
                                    <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $row['product_img'] ?>" alt="<?= $rowLang['lang_product_name'] ?>" class="img-responsive"></a>
                                </div>
                                <div class="item-text">
                                    <h3><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_product_name'] ?></a></h3>
                                    <!--PRICE-->
                                    <?php include DIR_PRODUCT."MS_PRODUCT_SPRO_0002.php";?>
                                    <!--tình trạng-->
                                    <?php include DIR_PRODUCT."MS_PRODUCT_SPRO_0003.php";?>
                                    
                                    <!--Add to cart-->
                                    <?php include DIR_CART."MS_CART_SPRO_0003.php";?>

                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!--SẢN PHẨM BÁN CHẠY-->
                <div class="tab-pane fade" id="tab2default">
                    <div class="gb-product-show_slide list_product owl-carousel owl-theme">
                        <?php 
                        foreach ($home_product_hot as $item) {
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
                                    
                                    <!--Add to cart-->
                                    <?php include DIR_CART."MS_CART_SPRO_0003.php";?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!--SẢN PHẨM NỔI BẬT-->
                <div class="tab-pane fade" id="tab3default">
                    <div class="gb-product-show_slide list_product owl-carousel owl-theme">
                        <?php 
                        foreach ($home_product_spec as $item) {
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
</div>

<script src="./plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $('.gb-product-show_slide').owlCarousel({
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
        $('.icons-nav-product').click(function () {
            $('.product-menu-content').slideToggle();
        });
    });
</script>