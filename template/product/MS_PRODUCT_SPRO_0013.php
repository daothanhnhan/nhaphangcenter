

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

<?php 

    $action_product = new action_product(); 

    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';



    $rowLang = $action_product->getProductLangDetail_byUrl($slug,$lang);

    $row = $action_product->getProductDetail_byId($rowLang[$nameColIdProduct_productLanguage],$lang);

    $_SESSION['productcat_id_relate'] = $row[$nameColIdProductCat_product];

    $_SESSION['sidebar'] = 'productDetail';

    $arr_id = $row['productcat_ar'];

    $arr_id = explode(',', $arr_id);

    $productcat_id = (int)$arr_id[0];

    $product_breadcrumb = $action_product->getProductCatLangDetail_byId($productcat_id, $lang);

    $breadcrumb_url = $product_breadcrumb['friendly_url'];

    $breadcrumb_name = $product_breadcrumb['lang_productcat_name'];

    $use_breadcrumb = true;



    $img_sub = json_decode($row['product_sub_img']);



    $price = $row['product_price']-($row['product_price']*($row['product_price_sale']/100));

    $name_tsl = $row['product_name'];

    $img_main = $action->curPageURL()."/images/".$row['product_img'];

    $_GET['link'] = $action->curPageURL().'/'.$_GET['page'];

?>

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

                                                        <img class="filter2 animated fadeIn shop1 img-responsive active" src="/images/<?= $row['product_img'] ?>" alt="product">

                                                        <?php 

                                                        $d = 1;

                                                        foreach ($img_sub as $item) {

                                                          $d++;

                                                          $image = json_decode($item, true);

                                                        ?>

                                                        <img class="filter2 animated fadeIn shop<?= $d ?> img-responsive" src="/images/<?= $image['image'] ?>" alt="product">

                                                        <?php } ?>

                                                        <!-- <img class="filter2 animated fadeIn shop1 active img-responsive" src="images/tintuc/2.jpg" alt="product">

                                                        <img class="filter2 animated fadeIn shop3 img-responsive" src="images/tintuc/3.jpg" alt="product">

                                                        <img class="filter2 animated fadeIn shop4 img-responsive" src="images/tintuc/4.jpg" alt="product"> -->

                                                    </div>



                                                    <div class="row-fix">

                                                        <div class="col-xs-3 col-sm-3 col-md-3 uni-clear-padding">

                                                            <div class="img-small active">

                                                                <img data-filter2="shop1" src="/images/<?= $row['product_img'] ?>" alt="product" class="img-responsive">

                                                            </div>

                                                        </div>

                                                        <?php 

                                                        $d = 1;

                                                        foreach ($img_sub as $item) {

                                                          $d++;

                                                          $image = json_decode($item, true);

                                                        ?>

                                                        <div class="col-xs-3 col-sm-3 col-md-3 uni-clear-padding">

                                                            <div class="img-small">

                                                                <img data-filter2="shop<?= $d ?>" src="/images/<?= $image['image'] ?>" alt="product" class="img-responsive">

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

                                        <h1 class="product_title entry-title"><?= $rowLang['lang_product_name'] ?></h1>



                                        <?php include DIR_CART."MS_CART_SPRO_0007.php";?>



                                        <div class="description">

                                            <div class="table-responsive">

                                                <table class="table">

                                                    <!-- <tr>

                                                        <th>Giá:</th>

                                                        <td><?= number_format($price,2) ?> Tệ</td>

                                                    </tr>

                                                    <tr>

                                                        <th>Mã sản phẩm:</th>

                                                        <td><?= $row['product_code'] ?></td>

                                                    </tr>

                                                    <tr>

                                                        <th>Hãng sản xuất:</th>

                                                        <td><?= $row['product_expiration'] ?></td>

                                                    </tr>

                                                    <tr>

                                                        <th>Bảo hành:</th>

                                                        <td>6 tháng</td>

                                                    </tr>

                                                    <tr>

                                                        <th>Xuất sứ:</th>

                                                        <td><?= $row['product_material'] ?></td>

                                                    </tr>

                                                    <tr>

                                                        <th>Tình trạng:</th>

                                                        <td>Còn hàng</td>

                                                    </tr> -->

                                                    <tr>

                                                        <th>Giá:</th>

                                                        <td>
                                                          <div class="input-group"  style="width: 70%;">
                                                            
                                                             <input type="number" step="0.01" class="form-control" name="price" id="product_price" value="<?= $price ?>">
                                                               <span class="input-group-addon">¥</span>
                                                          </div>
                                                          
                                                        </td>

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

                                <?= $rowLang['lang_product_content'] ?>

                            </div>

                        </div>



                        <section class="related products">

                            <?php include DIR_PRODUCT."MS_PRODUCT_SPRO_0009.php";?>

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