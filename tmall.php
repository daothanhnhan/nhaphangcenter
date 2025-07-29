<?php 
	include_once "functions/simple_html_dom.php";
	$link = 'https://detail.tmall.com/item.htm?spm=a220m.1000858.1000725.7.5906232emcF0Zc&id=572690541733&skuId=3730011833577&user_id=1607784674&cat_id=2&is_b=1&rn=632a42f0eaa04b13b0001fc2ccab8f61';
	$html = file_get_html($link);
	// echo $html->outertext;

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
		$anh = str_replace('60x60', '430x430', $anh);
		echo '<img src="'.$anh.'">';
	}
?>
<?php 
	$div = $html->find('.tb-detail-hd')[0];
	$h1 = $div->find('h1')[0];
	echo $h1->plaintext;
?>
<?php 
	$ul = $html->find('#J_AttrUL')[0];
	echo $ul->outertext;
?>