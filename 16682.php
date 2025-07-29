<!-- <meta charset="utf-8"> -->
<!-- <meta charset="gbk"> -->
<?php 
// $ch = curl_init();
// // curl_setopt ($ch, CURLOPT_URL, "https://detail.1688.com/offer/543783250479.html?sk=consign");
// curl_setopt ($ch, CURLOPT_URL, "https://detail.1688.com/offer/550654317574.html?spm=b26110380.sw1688.0.0.713f5c79m9qcTv");
// curl_setopt($ch, CURLOPT_HEADER, true);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $a = curl_exec($ch);
// $data = curl_exec($ch);
// curl_close($ch);
// var_dump($data);
include_once "functions/simple_html_dom.php";
?>
<?php 
$url = "https://detail.1688.com/offer/39009218583.html?spm=b26110380.sw1688.mof001.9.23556039M37l5h";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0) Gecko/20100101 Firefox/53.0");
$html = curl_exec($ch);
curl_close($ch);
// print $html;
preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $html, $matches);
// var_dump($matches[1])
preg_match_all('#\<div id="dt-tab"\>(.+?)\<\/div\>#s', $html, $matches);
// var_dump($matches);
?>
<?php
  // Read html file to be processed into $data variable
  // $data = file_get_contents('http://www.music.umn.edu/marchingband/index.php');
  
  // Commented regex to extract contents from <div class="main">contents</div>
  //  where "contents" may contain nested <div>s.
  //  Regex uses PCRE's recursive (?1) sub expression syntax to recurs group 1
  // short version of same regex
  // $pattern_short = '{<div\s+id="dt-tab"\s*>((?:(?:(?!<div[^>]*>|</div>).)++|<div[^>]*>(?1)</div>)*)</div>}si';
  
  // $matchcount = preg_match_all($pattern_short, $html, $matches);
  // echo("<div id=\"dt-tab\">\n");
  // if ($matchcount > 0) {
  //     for ($i = 0; $i < $matchcount; $i++) {
  //         // print 1st capture group for match number i
  //         echo($matches[1][$i]);
  //     }
  // } else {
  //     echo('No matches');
  // }
  // echo("</div>\n");
  // var_dump($matchcount)

// preg_match('/\<div id\=[\"]{0,1}dt-tab[\"]{0,1} class\=[\"]{0,1}.*[\"]{0,1}\>(.*?)\<div class="obj-fav"\>/s', $html, $matches);
preg_match_all('/\<div id="dt-tab" class="tab-content.*"\>(.*?)\<\/div\>\<div class="obj.*"\>/s', $html, $matches);
// $content['content_body'] = $matches[1];
// var_dump($matches);

preg_match_all('/\<div id\=[\"]dt-tab[\"]/', $html, $matches);
// var_dump($matches[0][0]);

preg_match_all('/<div class="dt-tab">(?>(?:[^<]++¦<(?!\/?div\b[^>]*>))+¦(?R))*<\/div>/is',$html,$body); 

preg_match_all('/\<li class="tab-trigger.*" [^>*]\>(.*)\<\/li\>/i', $html, $matches);
///////////////////////////
// var_dump($matches);
preg_match_all('~<ul class="nav nav-tabs fd-clr">\K.*(?=</ul>)~Uis', $html, $matches);
// var_dump($matches[0][0]);
$ul = $matches[0][0];
preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $ul, $img);
// var_dump($img[1]);
$anh = $img['1'];
foreach ($anh as $item) {
	$src = str_replace('60x60', '400x400', $item);
	echo '<img src="'.$src.'">';
}
?>
<?php 
preg_match_all('~<tr class="price">\K.*(?=</tr>)~Uis', $html, $matches);
// var_dump($matches[0][0]);
$tr = $matches[0][0];
preg_match_all('~<span class="value price-length-.">\K.*(?=</span>)~Uis', $tr, $span);
var_dump($span[0][0]);
?>
<?php 
// preg_match_all('/\<h1 class="d-title"\>(.*?)\<\/h1\>/Uis', $html, $title);
preg_match_all('~<h1 class="d-title">\K.*(?=</h1>)~Uis', $html, $title);
var_dump($title[0][0]);
$text = $title[0][0];
$text = str_replace(' ', '', $text);
// $text = urlencode($text);
// $text = mb_convert_encoding(urldecode($text), 'GB2312', 'UTF-8');
// $text = urlencode($text);
?>
<?php 
// preg_match_all('~<div class="obj-content">\K.*(?=</div>)~Uis', $html, $mota);
preg_match_all('~<div id="mod-detail-attributes" [^>]*>\K.*(?=</div>)~Uis', $html, $mota);
var_dump($mota);
?>
<?php 
$link = 'https://translate.yandex.net/api/v1.5/tr/translate?key=trnsl.1.1.20180809T113751Z.8d856990ff3511bf.475fc4889b6ca84c685472188a127f551e19bce7&text='.$text.'&lang=zh-vi&format=plain&options=1';
echo $link;echo '<br>';
$html2 = file_get_html($link);
echo $html2;
 echo $html2->getElementById('result_box');
	echo $html2->find('#result_box')[0]->outertext;
	// echo $html2->plaintext;
	// echo $html2->outertext;

?>