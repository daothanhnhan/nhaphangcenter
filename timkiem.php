<meta charset="UTF-8">
<!-- <meta charset="gbk"/> -->
<!-- <meta charset="gb2312"> -->
<!-- <meta charset="GB18030"> -->
<!-- <meta charset="HZ"> -->
<!-- <meta charset="Big5"> -->
<!-- <meta http-equiv="Content-Type" content="text/html; charset=GB2312" /> -->
<!-- <meta http-equiv="Content-Type" content="text/html; charset=GBK"> -->
<?php 
// header('Content-Type: text/html; charset=gb2312');
// header('Content-Type: text/html; charset=UTF-8');

include_once "functions/simple_html_dom.php";

	$text = $_GET['x'];
	$page = $_GET['search_param'];
	$text = str_replace(' ', '%20', $text);
	$link = 'https://translate.yandex.net/api/v1.5/tr/translate?key=trnsl.1.1.20180809T113751Z.8d856990ff3511bf.475fc4889b6ca84c685472188a127f551e19bce7&text='.$text.'&lang=vi-zh&format=plain&options=0';
	// echo $link;echo '<br>';

	$html = file_get_html($link);
	// $html = file_get_html('https://translate.yandex.net/api/v1.5/tr/translate?key=trnsl.1.1.20180809T113751Z.8d856990ff3511bf.475fc4889b6ca84c685472188a127f551e19bce7&text=quần%20áo&lang=vi-zh&format=plain&options=0');
	// echo $html->outertext;
	$url = $html->plaintext;
	$url = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $url);
	// echo $url;
	if ($text == 'quần%20áo') {
		$url = '服装';
		// die;
	}
	// echo $url;
	// $url = urlencode($url);
	// echo urlencode('服装');
	// echo $url;

	// $gb = mb_convert_encoding(urldecode($url), 'GB2312', 'UTF-8');
	// echo $gb_url = urlencode($gb);
	// echo urldecode('%B7%FE%D7%B0');
	// header('location: https://s.taobao.com/search?_input_charset=utf-8&q='.$url.'&sort=credit-desc');
	// header('location: https://list.tmall.com/search_product.htm?q='.$url);
	// header('location: https://s.1688.com/selloffer/offer_search.htm?keywords='.$gb_url);
	if ($page == 'all') {
		header('location: https://s.taobao.com/search?_input_charset=utf-8&q='.$url.'&sort=credit-desc');
	}
	if ($page == 'taobao') {
		header('location: https://s.taobao.com/search?_input_charset=utf-8&q='.$url.'&sort=credit-desc');
	}
	if ($page == 'tmall') {
		// $url = urlencode($url);
		header('location: https://list.tmall.com/search_product.htm?q='.$url);
	}
	if ($page == '1688') {
		// $url = urlencode($url);
		$gb = mb_convert_encoding(urldecode($url), 'GB2312', 'UTF-8');
		$gb_url = urlencode($gb);
		header('location: https://s.1688.com/selloffer/offer_search.htm?keywords='.$gb_url);
	}
?>