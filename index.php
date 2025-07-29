<?php
//phpinfo();die;
// die('tuan');
session_start();
ob_start();
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$folder = dirname(__FILE__);
include_once('config.php');
include_once('__autoload.php');
$action = new action();
include_once dirname(__FILE__).DIR_FUNCTIONS."database.php";
// $urlAnalytic = $action->showabc();    
include_once dirname(__FILE__).'/'.DIR_FUNCTIONS_PAGING."pagination.php";
include_once 'functions/phpmailer/class.smtp.php';
include_once 'functions/phpmailer/class.phpmailer.php';
include_once "functions/vi_en.php";
include_once "functions/simple_html_dom.php";
// // LÀM RÕ NHỮNG THƯ VIỆN NÀY
// // include_once('lib/vi_en.php');
// // include_once('lib/nganLuong/NL_Checkoutv3.php');

// // LÀM RÕ Install Cart

// Install MultiLanguage
include_once dirname(__FILE__).DIR_FUNCTIONS_LANGUAGE."lang_config.php";
include_once dirname(__FILE__).DIR_FUNCTIONS_LANGUAGE.$lang_file;
// Install Friendly Url
include_once dirname(__FILE__).DIR_FUNCTIONS_URL."url_config.php";
// Configure Website
include_once dirname(__FILE__).DIR_FUNCTIONS."website_config.php";
// echo $translate['link_contact'];die;
$trang = isset($_GET['trang']) ? $_GET['trang'] : '1';
// $action = new action();
$cart = new action_cart();
$menu = new action_menu();
$action_product = new action_product();
$action_news = new action_news();
$action_page = new action_page();
if($lang == "vn"){
    $rowConfig_lang = $action->getDetail('config_languages','id',1);
}else{
    $rowConfig_lang = $action->getDetail('config_languages','id',2);
}


$rowConfig = $action->getDetail('config','config_id',1);

function set_login () {
    global $conn_vn;
    if (!isset($_SESSION['user_id_gbvn'])) {
        if (isset($_COOKIE['user_id_trichdan'])) {
            $arr = explode(':', $_COOKIE['user_id_trichdan']);
            $identify = $arr[0];
            $token = $arr[1];
            $sql = "SELECT * FROM user Where remember_me_identify = '$identify' And remember_me_token = '$token'";
            $result = mysqli_query($conn_vn, $sql);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id_gbvn'] = $row['id'];
        }
    }
}
set_login();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta charset="gbk"/> -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $meta_des ?>"> 
    <meta name="keywords" content="<?= $meta_key ?>">
    <title><?= $title ?></title>
    <link rel="icon" href="/images/<?= $rowConfig['icon_web'] ?>" type="image/gif" sizes="16x16">

    <link rel="stylesheet" href="/plugin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugin/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/plugin/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style-spro.min.css">
    <script src="/plugin/jquery/jquery-2.0.2.min.js"></script>
    <script src="/plugin/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<?php include_once dirname(__FILE__).DIR_THEMES."header.php";?>

<div class="gb-content">
    <?php
    if (isset($_GET['page'])){

        $urlAnalytic = $action->getTypePage_byUrl($_GET['page'],$lang);
        // echo $urlAnalytic;
        switch ($urlAnalytic) {

            case 'tin-tuc':

                include_once dirname(__FILE__).DIR_THEMES."tintuc.php"; break;

            case 'chi-tiet-tin-tuc':

                include_once dirname(__FILE__).DIR_THEMES."chitiet_tintuc.php"; break;
            case 'lien-he':

                include_once dirname(__FILE__).DIR_THEMES."lienhe.php"; break;

            case 'gio-hang':

                include_once dirname(__FILE__).DIR_THEMES."giohang1.php"; break;

            case 'khuyen-mai':

                include_once dirname(__FILE__).DIR_THEMES."khuyenmai.php"; break;
            case 'san-pham':

                include_once dirname(__FILE__).DIR_THEMES."sanpham.php"; break;

            case 'productcat_languages':
                include_once dirname(__FILE__) . DIR_THEMES . "sanpham.php";break;

            case 'search-product':
                include_once dirname(__FILE__) . DIR_THEMES . "search-product.php";break;
                
            case 'hang-thanh-ly':

                include_once dirname(__FILE__).DIR_THEMES."hangthanhly.php"; break;

            case 'thanh-toan':

                include_once dirname(__FILE__).DIR_THEMES."cart-payment.php"; break;
            case 'chi-tiet-san-pham':

                include_once dirname(__FILE__).DIR_THEMES."giohang.php"; break;

            case 'product_languages':
                include_once dirname(__FILE__) . DIR_THEMES . "chi-tiet-san-pham-viet.php";break;

            case 'page_language':

                include_once dirname(__FILE__).DIR_THEMES."huongdanmuahang.php"; break;
            case 'cach-thuc-thanh-toan':

                include_once dirname(__FILE__).DIR_THEMES."cachthucthanhtoan.php"; break;

            case 'chinh-sach-van-chuyen':

                include_once dirname(__FILE__).DIR_THEMES."chinhsachvanchuyen.php"; break;

            case 'dangky':
                include_once dirname(__FILE__) . DIR_THEMES . "dang-ky.php";break;

            case 'dangnhap':
                include_once dirname(__FILE__) . DIR_THEMES . "dang-nhap.php";break;

            case 'dangxuat':
                include_once dirname(__FILE__) . DIR_THEMES . "dang-xuat.php";break;

            case 'forget-pass':
                include_once dirname(__FILE__) . DIR_THEMES . "forget-pass.php";break;

            case 'change-password':
                include_once dirname(__FILE__) . DIR_THEMES . "change-password.php";break;

            case 'don-hang':
                include_once dirname(__FILE__) . DIR_THEMES . "don-hang.php";break;

            case 'danh-sach-bao-gia':
                include_once dirname(__FILE__) . DIR_THEMES . "bao-gia.php";break;

            case 'chi-tiet-bao-gia':
                include_once dirname(__FILE__) . DIR_THEMES . "chi-tiet-bao-gia.php";break;

            case 'un-link':
                include_once dirname(__FILE__) . DIR_THEMES . "unlink.php";break;

            case 'thong-tin-ca-nhan':
                include_once dirname(__FILE__) . DIR_THEMES . "thong-tin-ca-nhan.php";break;

            case 'cac-don-hang':
                include_once dirname(__FILE__) . DIR_THEMES . "cac-don-hang.php";break;

            case 'chi-tiet-don-hang':
                include_once dirname(__FILE__) . DIR_THEMES . "chi-tiet-don-hang.php";break;
        }
    }
    else include_once dirname(__FILE__).DIR_THEMES."home.php";
    ?>
</div>


<?php include_once dirname(__FILE__).DIR_THEMES."footer.php"; ?>
</body>

</html>

