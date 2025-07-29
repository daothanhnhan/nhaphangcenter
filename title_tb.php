<!doctype html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8"> -->
    <meta charset="gbk"/>
</head>

<body>
<?php 
include_once dirname(__FILE__)."/functions/simple_html_dom.php";

// $html = file_get_html('https://item.taobao.com/item.htm?spm=2013.1.20141001.1.43f734271MhnNO&id=571266797992&scm=1007.12144.81309.42296_42296&pvid=299ab7c3-f9ac-47f5-a5eb-107e51159b68&utparam=%7B%22x_hestia_source%22%3A%2242296%22%2C%22x_object_type%22%3A%22item%22%2C%22x_mt%22%3A0%2C%22x_src%22%3A%2242296%22%2C%22x_pos%22%3A1%2C%22x_pvid%22%3A%22299ab7c3-f9ac-47f5-a5eb-107e51159b68%22%2C%22x_object_id%22%3A571266797992%7D&utparam=%7B%22x_hestia_source%22%3A%2242296%22%2C%22x_object_type%22%3A%22item%22%2C%22x_mt%22%3A0%2C%22x_src%22%3A%2242296%22%2C%22x_pos%22%3A1%2C%22x_pvid%22%3A%22299ab7c3-f9ac-47f5-a5eb-107e51159b68%22%2C%22x_object_id%22%3A571266797992%7D');

$link = $_GET['link'];//echo $link;
if (strpos($link, 'taobao.com')) {
    $html = file_get_html($link);
    $title = $html->find('#J_Title', 0);
    $text = $title->plaintext;
    $text = trim($text);echo $text;
} elseif (strpos($link, '1688.com')) {
    $url = $link;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0) Gecko/20100101 Firefox/53.0");
    $html = curl_exec($ch);
    curl_close($ch);
    // print $html;

    preg_match_all('~<h1 class="d-title">\K.*(?=</h1>)~Uis', $html, $title);
    echo $title[0][0];
} elseif (strpos($link, 'tmall.com')) {
    $html = file_get_html($link);
    $div = $html->find('.tb-detail-hd')[0];
    $h1 = $div->find('h1')[0];
    echo $h1->plaintext;
}


?>
    <div id="translate_select"></div>
	<script type="text/javascript" 
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'zh',
      includedLanguages: 'vi',
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'translate_select');
        }
    </script>
</body>
</html>