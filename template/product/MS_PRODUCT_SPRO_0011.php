<?php                                                                        
    if (isset($_GET['slug']) && $_GET['slug'] != '') {
        $slug = $_GET['slug'];

        $rowCatLang = $action_product->getProductCatLangDetail_byUrl($slug,$lang);
        $rowCat = $action_product->getProductCatDetail_byId($rowCatLang['productcat_id'],$lang);
        $rows = $action_product->getProductList_byMultiLevel_orderProductId($rowCat['productcat_id'],'desc',$trang,9,$slug);//var_dump($rows);
    }else{
        $rows = $action->getList('product','','','product_id','desc',$trang,9,'san-pham');
    }
    
    $_SESSION['sidebar'] = 'productCat';
?>
<div class="gb-sanpham-body">
    <?php include DIR_SEARCH."MS_SEARCH_0002.php";?>
    <div class="row">
        <?php 
        $d = 0;
        foreach ($rows['data'] as $item) {
            $d++;
            $row = $item;
            $rowLang = $action_product->getProductLangDetail_byId($row['product_id'],$lang);
        ?>
        <div class="col-md-4">
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
        <?php
            if ($d%3==0) {
                echo '<hr style="width:100%;border:0;" />';
            }
        }
        ?>
    </div>
    <div><?= $rows['paging'] ?></div>
    <?php //include DIR_PAGINATION."MS_PAGINATION_0001.php";?>
</div>