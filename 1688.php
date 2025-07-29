<meta charset="utf-8">
<!-- <meta charset="gbk"> -->
<?php 

include_once "functions/simple_html_dom.php";

$url = "https://detail.1688.com/offer/550654317574.html?spm=b26110380.sw1688.0.0.713f5c79m9qcTv";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0) Gecko/20100101 Firefox/53.0");
$html = curl_exec($ch);
curl_close($ch);
// print $html;

preg_match_all('~<h1 class="d-title">\K.*(?=</h1>)~Uis', $html, $title);
// var_dump($title[0][0]);
$text = $title[0][0];
$text = str_replace(' ', '', $text);
echo (string)$text;echo '<br>';
$text = mb_convert_encoding($text, "UTF-8", "GBK");

$link = 'https://translate.yandex.net/api/v1.5/tr/translate?key=trnsl.1.1.20180809T113751Z.8d856990ff3511bf.475fc4889b6ca84c685472188a127f551e19bce7&text='.$text.'&lang=zh-vi&format=plain&options=0';
echo $link;echo '<br>';
$html = file_get_html($link);
	$text1 = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $html->plaintext);
    echo $text1;echo '<br>';
?>
<?php 
// $url = "https://detail.1688.com/offer/550654317574.html?spm=b26110380.sw1688.0.0.713f5c79m9qcTv";
// $url = $link;
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0) Gecko/20100101 Firefox/53.0");
// $html = curl_exec($ch);
// curl_close($ch);
// print $html;
// preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $html, $matches);
// var_dump($matches[1])
// preg_match_all('#\<div id="dt-tab"\>(.+?)\<\/div\>#s', $html, $matches);
// var_dump($matches);
?>