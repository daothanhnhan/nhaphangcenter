<!doctype html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8"> -->
    <meta charset="gbk"/>
</head>

<body>
<div id="translate_select"></div>
<?php 
include_once dirname(__FILE__)."/functions/simple_html_dom.php";

$link = $_GET['link'];//echo $link;

if (strpos($link, 'taobao.com')) {
    $html = file_get_html($link);

    $des = $html->find('#J_SubWrap', 0);
    echo $des->outertext;

    $ul = $html->find('#J_UlThumb');
    foreach ($ul as $element) {
        $img = $element->find('img');
        // echo $element->outertext;
        foreach ($img as $e1) {
            // echo $e1->data-src . '<br>';
            $d++;
        }
    }

    for ($i=0; $i < $d; $i++) { 
        $anh = $html->getElementById("J_UlThumb")->childNodes($i)->childNodes(0)->childNodes(0)->childNodes(0)->getAttribute('data-src');//echo '<br>';
        $anh = str_replace('_50x50.jpg', '', $anh);

        echo '<img src="'.$anh.'" align="middle">';
    }
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

    preg_match_all('~<div id="mod-detail-attributes" [^>]*>\K.*(?=</div>)~Uis', $html, $mota);
    echo $mota[0][0];

    preg_match_all('~<ul class="nav nav-tabs fd-clr">\K.*(?=</ul>)~Uis', $html, $matches);
    $ul = $matches[0][0];
    preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $ul, $img);
    $anh = $img['1'];
    foreach ($anh as $item) {
        $src = str_replace('60x60.', '', $item);
        echo '<img src="'.$src.'">';
    }
} elseif (strpos($link, 'tmall.com')) {
    $html = file_get_html($link);
    $ul = $html->find('#J_AttrUL')[0];
    echo $ul->outertext;

    $ul = $html->find('#J_UlThumb');
    $d = 0;
    foreach ($ul as $element) {
        $img = $element->find('img');
        // echo $element->outertext;
        foreach ($img as $e1) {
            // echo $e1->data-src . '<br>';
            $d++;
        }
    }

    for ($i=0; $i < $d; $i++) {
        $anh = $html->getElementById("J_UlThumb")->childNodes($i)->childNodes(0)->childNodes(0)->getAttribute('src');//echo '<br>';
        $anh = str_replace('_60x60q90.jpg', '', $anh);
        echo '<img src="'.$anh.'">';
    }
}


?>
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