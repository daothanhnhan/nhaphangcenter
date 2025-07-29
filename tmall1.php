<?php 
	$url = 'https://detail.tmall.com/item.htm?spm=a220m.1000858.1000725.7.5906232emcF0Zc&id=572690541733&skuId=3730011833577&user_id=1607784674&cat_id=2&is_b=1&rn=632a42f0eaa04b13b0001fc2ccab8f61';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0) Gecko/20100101 Firefox/53.0");
    $html = curl_exec($ch);
    curl_close($ch);
    // print $html;

    preg_match_all('/"defaultItemPrice":"[\d\.]*",/', $html, $matches);
    // var_dump($matches[0][0]);
    preg_match('/[0-9\.]+/', $matches[0][0], $price);
    // var_dump((float)($price[0]/100));
    // $price = substr($matches[0][0], start)
    var_dump($price);
?>