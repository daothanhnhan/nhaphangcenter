<?php 
    $danh_muc_drop = $action_product->getProductCat_byProductCatIdParent(0, 'desc');
?>
<nav class="menu-category" >
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-1 col-xs-12 prz-ap">
                <div class="menucategory-top">
                    <div class="txtmenucategory-top"><i class="fa fa-bars"></i>&nbsp; <span>Tất cả danh mục</span></div>
                    <!-- trang chu -->

                    <div class="gb-menu-category">
                        <nav class="main-navigation uni-menu-text">
                            <div class="cssmenu">
                                <ul>
                                    <?php
                                    $d = 0;
                                    foreach ($danh_muc_drop as $item) { 
                                        $rowLangCat = $action_product->getProductCatLangDetail_byId($item['productcat_id'], $lang);
                                        $list_procat_1 = $action_product->getProductCat_byProductCatIdParent($item['productcat_id'], 'desc');
                                        $d == 0;
                                        $procat_arr_1 = array();
                                        $procat_arr_2 = array();
                                        foreach ($list_procat_1 as $row) {
                                            $d++;
                                            if ($d%2==1) {
                                                $procat_arr_1[] = $row;
                                            }
                                            if ($d%2==0) {
                                                $procat_arr_2[] = $row;
                                            }
                                        }
                                    ?>
                                    <li class="has-sub"><a href="/<?= $rowLangCat['friendly_url'] ?>">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i> &nbsp; <?= $rowLangCat['lang_productcat_name'] ?></a>
                                        <ul class="row">
                                            <li class="col-md-4">
                                                <?php 
                                                foreach ($procat_arr_1 as $item_1) { 
                                                    $rowLangCat_1 = $action_product->getProductCatLangDetail_byId($item_1['productcat_id'], $lang);
                                                    $list_procat_2 = $action_product->getProductCat_byProductCatIdParent($item_1['productcat_id'], 'desc');
                                                ?>
                                                <div class="item">
                                                    <h3><a href="/<?= $rowLangCat_1['friendly_url'] ?>" title=""><?= $rowLangCat_1['lang_productcat_name'] ?></a></h3>
                                                    <ul>
                                                        <?php 
                                                        foreach ($list_procat_2 as $item_2) {
                                                             $rowLangCat_2 = $action_product->getProductCatLangDetail_byId($item_2['productcat_id'], $lang);
                                                        ?>
                                                        <li><a href="/<?= $rowLangCat_2['friendly_url'] ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?= $rowLangCat_2['lang_productcat_name'] ?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                                <?php } ?>
                                            </li>
                                            <li class="col-md-4">
                                                <?php 
                                                foreach ($procat_arr_2 as $item_1) { 
                                                    $rowLangCat_1 = $action_product->getProductCatLangDetail_byId($item_1['productcat_id'], $lang);
                                                    $list_procat_2 = $action_product->getProductCat_byProductCatIdParent($item_1['productcat_id'], 'desc');
                                                ?>
                                                <div class="item">
                                                    <h3><a href="" title=""><?= $rowLangCat_1['lang_productcat_name'] ?></a></h3>
                                                    <ul>
                                                        <?php 
                                                        foreach ($list_procat_2 as $item_2) {
                                                             $rowLangCat_2 = $action_product->getProductCatLangDetail_byId($item_2['productcat_id'], $lang);
                                                        ?>
                                                        <li><a href="/<?= $rowLangCat_2['friendly_url'] ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?= $rowLangCat_2['lang_productcat_name'] ?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                                <?php } ?>
                                            </li>
                                            <li class="col-md-4">
                                                <a class="img-cat" href="" title="">
                                                    <img src="/images/<?= $item['productcat_img'] ?>" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-11 col-xs-12">
                <div class="menu-right">
                    <?php 
                        $list_menu = $menu->getListMainMenu_byOrderASC();
                        $menu->showMenu_byMultiLevel_mainMenuTraiCam($list_menu,0,$lang,0);
                    ?>
                </div>
            </div>
        </div>
    </div>
</nav>