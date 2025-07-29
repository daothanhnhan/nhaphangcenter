<?php 
    $sidebar_procat = $action_product->getProductCat_byProductCatIdParentSort(0, 'asc');
?>
<div class="side_bar">
    <aside class="widget">
        <h3 class="widget-title">Danh mục</h3>
        <div class="widget-content">
            <ul class="list_category">

                <?php 
                foreach ($sidebar_procat as $item) {
                    $row = $item;
                    $rowLang = $action_product->getProductCatLangDetail_byId($item['productcat_id'], $lang); 
                ?>
                <li class="item_category"><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_productcat_name'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </aside>
</div>