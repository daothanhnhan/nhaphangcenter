<!--MENU MOBILE-->

<?php include_once DIR_MENU."MS_MENU_SPRO_0002.php"; ?>

<!-- End menu mobile-->



<!--MENU DESTOP-->

<header>

    <div class="top-header">

        <div class="container">

            <div class="col-md-8">

                <div class="top-header-left">

                    <ul>

                       <!--  <li class="selectmien">

                            <select name="" id="" class="select-region">

                                <option value="">Miền Bắc</option>

                                <option value="">Miền Nam</option>

                            </select>

                        </li> -->

                        <!-- <li class="hotrokhachhang">Hỗ trợ khách hàng

                            <ul>

                                <li><a href="/huong-dan-mua-hang">Hướng dẫn mua hàng</a></li>

                                <li><a href="/chinh-sach-van-chuyen">Chính sách vận chuyển</a></li>

                            </ul>

                        </li> -->

                        <li class="sdttocall">

                            <span><i class="fa fa-phone-square" aria-hidden="true"></i> Hồ Chí Minh: <?= $rowConfig['content_home3'];?></span>

                            <span><i class="fa fa-phone-square" aria-hidden="true"></i> Hà Nội: <?= $rowConfig['content_home6'];?></span>

                        </li>

                    </ul>

                </div>

            </div>

            <div class="col-md-4">

                <div class="top-header-right">

                    <ul>

                        <li class="kiemtradon"><a href="/gio-hang"><i class="fa fa-file-text-o" aria-hidden="true"></i> Kiểm tra đơn hàng</a></li>

                        <li class="taikhoan">

                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> Tài khoản

                            <ul>

                                <?php if (!isset($_SESSION['user_id_gbvn'])) { ?>

                                <li><a href="/dangky">Đăng ký</a></li>

                                <li><a href="/dangnhap">Đăng nhập</a></li>

                                <?php } else { ?>

                                <li><a href="/thong-tin-ca-nhan">Thông tin cá nhân</a></li>

                                <li><a href="/cac-don-hang">Các đơn hàng</a></li>

                                <li><a href="/danh-sach-bao-gia">Danh sách báo giá</a></li>

                                <li><a href="/dangxuat">Đăng Xuất</a></li>

                                <?php } ?>

                            </ul>

                        </li>

                        <li class="giohang">

                            <a href="/gio-hang"><?php include DIR_CART."MS_CART_SPRO_0010.php";?></a>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>



    <!--HEADER between-->

    <div class="gb-header-between">

        <div class="container">

            <div class="row">

                <div class="col-md-2">

                    <div class="gb-header-between-logo">

                        <h1><a href="/"><img src="/images/<?= $rowConfig['web_logo'] ?>" alt="logo" class="img-responsive"></a></h1>

                    </div>

                </div>

                <form action="timkiem.php" method="get" target="_blank">

                <div class="col-md-6">

                    <div class="gb-header-between-search">

                        <div class="input-group">

                            <div class="input-group-btn search-panel">

                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

                                    <span id="search_concept">Tất cả</span> <span class="caret"></span>

                                </button>

                                <ul class="dropdown-menu" role="menu">

                                    <li><a href="#taobao">Taobao (TQ)</a></li>

                                    <li><a href="#tmall">Tmall (TQ)</a></li>

                                    <li><a href="#1688">1688 (TQ)</a></li>

                                    <!-- <li><a href="#all">Coupang (HQ)</a></li>

                                    <li><a href="#all">Gmarket (HQ)</a></li> -->

                                </ul>

                            </div>

                            

                                <input type="hidden" name="search_param" value="all" id="search_param">

                                <input type="text" class="form-control" name="x" placeholder="Nhập tên sản phẩm tiếng Việt">

                                <span class="input-group-btn">

                                    <button class="btn btn-default btn-tim" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>

                                </span>

                            

                            

                        </div>

                    </div>

                </div>

                </form>

                <div class="col-md-4">

                    <div class="gb-header-between-phuongthuc">

                        <ul class="clearfix mgt-15">

                            <li>

                                <a href="cach-thuc-thanh-toan">

                                    <span class="icons"><i class="fa fa-credit-card" aria-hidden="true"></i></span>

                                    <span class="text">Phương thức <br> THANH TOÁN</span>

                                </a>

                            </li>

                            <li>

                                <a href="huong-dan-mua-hang">

                                    <span class="icons"> <i class="fa fa-cart-plus" aria-hidden="true"></i></span>

                                    <span class="text">Hướng dẫn <br> MUA HÀNG</span>

                                </a>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>



   <div id="show_menu">
        <?php include_once DIR_MENU."MS_MENU_SPRO_0001.php"; ?>
   </div>

</header>



<script>

    $(document).ready(function(e){

        $('.search-panel .dropdown-menu').find('a').click(function(e) {

            e.preventDefault();

            var param = $(this).attr("href").replace("#","");

            var concept = $(this).text();

            $('.search-panel span#search_concept').text(concept);

            $('.input-group #search_param').val(param);

        });

    });

</script>

<script type="text/javascript">

    // function sel_taobao () {

    //     alert('taobao');

    //     document.getElementById('search_param').value = 'toabao';

    // }



    // function sel_tmall () {

    //     alert('Tmall');

    // }



    // function sel_1688 () {

    //     alert('1688');

    // }

</script>