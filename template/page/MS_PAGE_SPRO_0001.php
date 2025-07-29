<?php 
     $action_page = new action_page(); 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_page->getPageLangDetail_byUrl($slug,$lang);
    $row = $action_page->getPageDetail_byId($rowLang['news_id'],$lang);
    $_SESSION['sidebar'] = 'pageDetail';
?>
<div class="gb-huongdanmuahang">
    <div class="container">
        <?php include DIR_BREADCRUMBS."MS_BREADCRUMS_SPRO_0001.php";?>
        <div class="row">
            <div class="col-md-3">
                <?php include DIR_SIDEBAR."MS_SIDEBAR_SPRO_0002.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_SPRO_0001.php";?>
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_SPRO_0003.php";?>
            </div>
<?php 
     $action_page = new action_page(); 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_page->getPageLangDetail_byUrl($slug,$lang);
    $row = $action_page->getPageDetail_byId($rowLang['news_id'],$lang);
    $_SESSION['sidebar'] = 'pageDetail';
?>
            <div class="col-md-9">
                <div class="gb-huongdanmuahang-right">
                    <h1><?= $rowLang['lang_page_name'] ?></h1>
                    <?= $rowLang['lang_page_content'] ?>
                </div>
            </div>
        </div>
    </div>
</div>