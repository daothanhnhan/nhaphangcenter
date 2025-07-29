<?php 
    $link = $_GET['link'];
    if (strpos($link, 'taobao.com')) {
        $html = file_get_html($link);
        $d = 0;
        $ul = $html->find('#J_UlThumb');
        foreach ($ul as $element) {
            $img = $element->find('img');
            foreach ($img as $e1) {
                $d++;
            }
        }

        $anh_arr = array();
        for ($i=0; $i < $d; $i++) { 
            $anh = $html->getElementById("J_UlThumb")->childNodes($i)->childNodes(0)->childNodes(0)->childNodes(0)->getAttribute('data-src');//echo '<br>';
            $anh = str_replace('50x50', '400x400', $anh);
            $anh_arr[] = $anh;
            if ($i==0) {
              $img_main = $anh;
            }
        }
        //////////////
        $price = $html->find('.tb-rmb-num', 0)->plaintext;//$ $p->plaintext;
        ///////////////
        $title = $html->find('#J_Title', 0);
        $text = $title->plaintext;
        $text = str_replace(' ', '', $text);
        $text = trim($text);
        $text = mb_convert_encoding($text, "UTF-8", "GBK");
        $link_tsl = 'https://translate.yandex.net/api/v1.5/tr/translate?key=trnsl.1.1.20180809T113751Z.8d856990ff3511bf.475fc4889b6ca84c685472188a127f551e19bce7&text='.$text.'&lang=zh-vi&format=plain&options=0';
        $html = file_get_html($link_tsl);
        $name_tsl = $html->plaintext;
        $name_tsl = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $name_tsl);
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

        preg_match_all('~<ul class="nav nav-tabs fd-clr">\K.*(?=</ul>)~Uis', $html, $matches);
        $ul = $matches[0][0];
        preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $ul, $img);
        $anh = $img['1'];
        $anh_arr = array();
        $d = 0;
        foreach ($anh as $item) {
          $d++;
          $src = str_replace('60x60', '400x400', $item);
          // echo '<img src="'.$src.'">';
          $anh_arr[] = $src;
          if ($d==1) {
            $img_main = $src;
          }          
        }
        ///////////////////
        preg_match_all('~<tr class="price">\K.*(?=</tr>)~Uis', $html, $matches);
        $tr = $matches[0][0];
        preg_match_all('~<span class="value price-length-.">\K.*(?=</span>)~Uis', $tr, $span);
        $price = $span[0][0];
        /////////////////////
        preg_match_all('~<h1 class="d-title">\K.*(?=</h1>)~Uis', $html, $title);
        $text = $title[0][0];
        $text = str_replace(' ', '', $text);
        $text = mb_convert_encoding($text, "UTF-8", "GBK");
        $link_tsl = 'https://translate.yandex.net/api/v1.5/tr/translate?key=trnsl.1.1.20180809T113751Z.8d856990ff3511bf.475fc4889b6ca84c685472188a127f551e19bce7&text='.$text.'&lang=zh-vi&format=plain&options=0';
        // echo $link_tsl;
        $html = file_get_html($link_tsl);
        $name_tsl = $html->plaintext;
        $name_tsl = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $name_tsl);
    } elseif (strpos($link, 'tmall.com')) {
        $html = file_get_html($link);

        $ul = $html->find('#J_UlThumb');
        $d = 0;
        foreach ($ul as $element) {
            $img = $element->find('img');
            foreach ($img as $e1) {
                $d++;
            }
        }

        $anh_arr = array();
        for ($i=0; $i < $d; $i++) {
          $anh = $html->getElementById("J_UlThumb")->childNodes($i)->childNodes(0)->childNodes(0)->getAttribute('src');//echo '<br>';
          $anh = str_replace('60x60', '430x430', $anh);
          // echo '<img src="'.$anh.'">';
          $anh_arr[] = $anh;
          if ($i==0) {
              $img_main = $anh;
          }
        }
        ////////////////////////
        $url = $link;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0) Gecko/20100101 Firefox/53.0");
        $html1 = curl_exec($ch);
        curl_close($ch);
        // print $html;

        preg_match_all('/"defaultItemPrice":"[\d\.]*",/', $html1, $matches);
        // var_dump($matches[0][0]);
        preg_match('/[0-9\.]+/', $matches[0][0], $price);
        // var_dump((float)($price[0]/100));
        $price = $price[0];
        ////////////////////
        $div = $html->find('.tb-detail-hd')[0];
        $h1 = $div->find('h1')[0];
        $title = $h1->plaintext;
        $text = str_replace(' ', '', $title);
        $text = mb_convert_encoding($text, "UTF-8", "GBK");
        $link_tsl = 'https://translate.yandex.net/api/v1.5/tr/translate?key=trnsl.1.1.20180809T113751Z.8d856990ff3511bf.475fc4889b6ca84c685472188a127f551e19bce7&text='.$text.'&lang=zh-vi&format=plain&options=0';

        $html = file_get_html($link_tsl);
        $name_tsl = $html->plaintext;
        $name_tsl = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $name_tsl);
    } else {
        echo '<script type="text/javascript">alert(\'Link nhập vào không chuẩn\')</script>';
    }
    
?>

<script type="text/javascript">
   $(document).ready(function(data){  
      $('.btn_addCart').click(function(){  
         // var product_id = $(this).attr("id");
           var product_id = $('#product_id').val();
           var product_name = $('#product_name').val();  
           var product_price = $('#product_price').val();  
           var product_quantity = $('.number_cart').val();  
           var product_link = $('#product_link').val();  
           var product_img = $('#product_img').val();
           var product_size = $('#product_size').val();
           var product_color = $('#product_color').val();
           // alert(product_color);return false;
           var action = "add";
           if (product_name == '') {
                alert('Bạn chưa nhập tên sản phẩm.');
                return false;
           }
           // var a = {a : 'a'};
           if(product_quantity > 0)  
           {                  
                 $.ajax({  
                     url:"/functions/ajax.php?action=add_cart",  
                     method:"POST",  
                     dataType:"json",  
                     data:{  
                          product_id:product_id,   
                          product_name:product_name,   
                          product_price:product_price,   
                          product_quantity:product_quantity,   
                          product_link:product_link,   
                          product_img:product_img,
                          product_size:product_size,
                          product_color:product_color,
                          action:action  
                     },  
                     success:function(data)  
                     {  
                          // $('#order_table').html(data.order_table);  
                          // $('.badge').text(data.cart_item);  
                          if (confirm('Thêm sản phẩm thành công, bạn có muốn thanh toán luôn không')) {
                              window.location = '/gio-hang';
                          }else{
                              location.reload();
                          }  
                     },
                     error: function () {
                        alert('loi');
                     }  
                });  

           }  
           else  
           {  
                alert("Please Enter Number of Quantity")  
           }  
      });
   });
 </script>
<div class="uni-single-product-body">
    <div class="container">
        <?php include DIR_BREADCRUMBS."MS_BREADCRUMS_SPRO_0001.php";?>
        <div id="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="uni-single-product-left">
                        <?php include DIR_SIDEBAR."MS_SIDEBAR_SPRO_0002.php";?>
                        <?php include DIR_SIDEBAR."MS_SIDEBAR_SPRO_0001.php";?>
                        <?php //include DIR_SIDEBAR."MS_SIDEBAR_SPRO_0003.php";?>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="uni-single-product-right">
                        <div id="product">
                            <div class="product-info">
                                <div class="row">
                                    <div class="col-sm-6 left image-panel">
                                        <div id="carousel" class="flexslider thumbnail_product">
                                            <div id="slider" class="flexslider">
                                                <div class="product-slide">
                                                    <div class="img-slide">
                                                        <?php 
                                                        $d = 0;
                                                        foreach ($anh_arr as $item) {
                                                          $d++;
                                                        ?>
                                                        <img class="filter2 animated fadeIn shop<?= $d ?> img-responsive <?= ($d==1) ? 'active' : '' ?>" src="<?= $item ?>" alt="product">
                                                        <?php } ?>
                                                        <!-- <img class="filter2 animated fadeIn shop1 active img-responsive" src="images/tintuc/2.jpg" alt="product">
                                                        <img class="filter2 animated fadeIn shop3 img-responsive" src="images/tintuc/3.jpg" alt="product">
                                                        <img class="filter2 animated fadeIn shop4 img-responsive" src="images/tintuc/4.jpg" alt="product"> -->
                                                    </div>

                                                    <div class="row-fix">
                                                        <?php 
                                                        $d = 0;
                                                        foreach ($anh_arr as $item) {
                                                          $d++;
                                                        ?>
                                                        <div class="col-xs-3 col-sm-3 col-md-3 uni-clear-padding">
                                                            <div class="img-small active">
                                                                <img data-filter2="shop<?= $d ?>" src="<?= $item ?>" alt="product" class="img-responsive">
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        <!-- <div class="col-xs-3 col-sm-3 col-md-3 uni-clear-padding">
                                                            <div class="img-small">
                                                                <img data-filter2="shop2" src="images/tintuc/2.jpg" alt="product" class="img-responsive">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-3 col-sm-3 col-md-3 uni-clear-padding">
                                                            <div class="img-small">
                                                                <img data-filter2="shop3" src="images/tintuc/3.jpg" alt="product" class="img-responsive">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-3 col-sm-3 col-md-3 uni-clear-padding">
                                                            <div class="img-small">
                                                                <img data-filter2="shop4" src="images/tintuc/4.jpg" alt="product" class="img-responsive">
                                                            </div>
                                                        </div> -->
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 right">
                                        <h1 class="product_title entry-title"><iframe src="/title_tb.php?link=<?= urlencode($link) ?>"></iframe></h1>

                                        <?php include DIR_CART."MS_CART_SPRO_0007.php";?>

                                        <div class="description">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>Giá:</th>
                                                        <td><input type="number" step="0.01" class="form-control" name="price" id="product_price" value="<?= $price ?>" style="width: 70%;"> Tệ</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">CNY = <?= $rowConfig['content_home9'] ?> VNĐ</th>
                                                        <!-- <td>Việt nam</td> -->
                                                    </tr>
                                                    <tr>
                                                        <th>Số lượng:</th>
                                                        <td><input type="number" class="form-control qty number_cart" id="pwd" min="0" value="1" style="width: 70%;"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Size:</th>
                                                        <td><input type="text" name="size" id="product_size"  class="form-control" style="width: 70%;"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Màu:</th>
                                                        <td><input type="text" name="color" id="product_color"  class="form-control" style="width: 70%;"></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <th>Xuất sứ:</th>
                                                        <td>Việt nam</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tình trạng:</th>
                                                        <td>Còn hàng</td>
                                                    </tr> -->

                                                </table>
                                            </div>
                                        </div>
                                        <!-- .description -->

                                        <?php include DIR_CART."MS_CART_SPRO_0008.php";?>
                                    </div>
                                    <!-- .summary -->
                                </div>
                            </div>
                            <!--ĐỊA CHỈ-->
                            <?php include DIR_CONTACT."MS_CONTACT_SPRO_0002.php";?>


                            <!--Hướng dẫn mua hàng, cách thức thanh toán, Chính sách vận chuyển-->
                            <?php include DIR_CART."MS_CART_SPRO_0009.php";?>

                            <!--CHI TIẾT SẢN PHẨM-->
                            <div class="gb-mota-chitiet">
                                <iframe src="/mota.php?link=<?= urlencode($link) ?>" width="100%" onload="resizeIframe(this)" ></iframe>
                            </div>
                        </div>

                        <section class="related products">
                            <?php //include DIR_PRODUCT."MS_PRODUCT_SPRO_0009.php";?>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        //-----------------replace image single product----------------
        jQuery('.flexslider .product-slide .img-small img').on('click', function(e) {
            if($(e.target).is('img')){
                var value2 = jQuery(this).attr("data-filter2");
                console.log(value2);

                jQuery('.flexslider .product-slide .img-small img').addClass('none');
                jQuery('.filter2').not("."+value2).removeClass('active');
                jQuery('.filter2').filter("."+value2).addClass('active');
            }

        });

        $('.flexslider .product-slide .img-small').on('click', function (e) {
            if($(e.target).is('img')){
                $('.img-small').removeClass('active');
                $(this).addClass('active');
            }
        });
    });
</script>
<script>
  function resizeIframe(obj) {
    var height = obj.contentWindow.document.body.scrollHeight;
    if (height < 100) {
        // height = 10;
        sleep(1000);
    }
    height = height + 500;
    obj.style.height = height + 'px';
  }
</script>