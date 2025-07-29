

<?php 

if (true) {

	// echo 'tuan';

	$link = $_GET['link'];

	// $link = 'https://www.nhaphang247.com/tao-don-hang-trung-quoc?url='.$link;

	$html = file_get_html($link); 

	

	// echo $html->outertext;



	// $img = $html->find('img');

	// foreach ($img as $e) {

	// 	echo $e->src.'<br>';

	// }



	// $text = 'https://translate.yandex.net/api/v1.5/tr/translate?key=trnsl.1.1.20180809T113751Z.8d856990ff3511bf.475fc4889b6ca84c685472188a127f551e19bce7&text=hello world&lang=vi&format=html&options=1';

	// $ret = $html->find('a');

	// var_dump($ret[0]->plaintext);

	// $div = $html->find('#J_UlThumb');

	// echo $div->plaintext; 

	// foreach($div->find('img') as $element) 

 //       echo $element->src . '<br>';

	// $d = 0;

	$ul = $html->find('#J_UlThumb');

	foreach ($ul as $element) {

		$img = $element->find('img');

		// echo $element->outertext;

		foreach ($img as $e1) {

			// echo $e1->data-src . '<br>';

			$d++;

		}

	}



	// echo $ul->outertext;



	for ($i=0; $i < $d; $i++) { 

		$anh = $html->getElementById("J_UlThumb")->childNodes($i)->childNodes(0)->childNodes(0)->childNodes(0)->getAttribute('data-src');//echo '<br>';

		$anh = str_replace('50x50', '400x400', $anh);

		echo '<img src="'.$anh.'" >';

	}

	// echo $html->getElementById("J_UlThumb")->childNodes(0)->childNodes(0)->childNodes(0)->childNodes(0)->getAttribute('data-src');

	// echo $html->getElementById('J_UlThumb')->childNodes(0)->getAttribute('class');



	// foreach($html->find('img') as $e2) 

 //       echo $e2->src . '<br>';



	// $box = $html->find('.tb-skin');

	// foreach ($box as $e1) {

	// 	echo $e1->outertext;

	// }



	$title = $html->find('#J_Title', 0);

	$text = $title->plaintext;

	$text = trim($text);



	// $text = $html->getElementById("J_Title")->childNodes(0)->getAttribute('data-title');

}

	// $google = 'https://translate.google.com/?hl=vi#zh-CN/vi/素素意代';echo $google;



	// $html2 = file_get_html('https://translate.yandex.com/?lang=en-vi&text=hello%20world');

	// // echo $html2->getElementById('result_box');

	// // echo $html2->find('#result_box')[0]->outertext;

	// echo $html2->outertext;



	// $link1 = 'https://translate.yandex.net/api/v1.5/tr/translate?key=trnsl.1.1.20180809T113751Z.8d856990ff3511bf.475fc4889b6ca84c685472188a127f551e19bce7&text='.$text.'&lang=vi&format=html&options=1';

	// $link2 = 'https://translate.yandex.net/api/v1.5/tr/translate?key=trnsl.1.1.20180809T113751Z.8d856990ff3511bf.475fc4889b6ca84c685472188a127f551e19bce7&text=秋季长袖t恤男韩版修身印花大码秋衣打底衫男装体恤潮流衣服上衣&lang=vi&format=html&options=1';

	// echo $link1;

	// $html1 = file_get_html($link2);

	// $translate = $html1->find('text', 0);

	// echo $html1->plaintext;

?>

<iframe src="/title_tb.php?link=<?= urlencode($link) ?>"></iframe>

<?php

    // //** Bước 1: Khởi tạo request

    // $ch = curl_init(); 



    // //** Bước 2: Thiết lập các tuỳ chọn

    // // Thiết lập URL trong request

    // curl_setopt($ch, CURLOPT_URL, $link); 



    // // Thiết lập để trả về dữ liệu request thay vì hiển thị dữ liệu ra màn hình

    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 



    // // ** Bước 3: thực hiện việc gửi request

    // $output = curl_exec($ch); 

    // echo $output; // hiển thị nội dung



    // // ** Bước 4 (tuỳ chọn): Đóng request để giải phóng tài nguyên trên hệ thống

    // curl_close($ch);

?>

<script type="text/javascript">

	function dich () {



	}

	dich();

</script>