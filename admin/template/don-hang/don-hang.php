<?php
$limit = 20;
function hasQuotes ($id) {
    global $conn_vn;
    $sql = "SELECT * FROM quotes WHERE cart_id = $id";
    $result = mysqli_query($conn_vn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 0) {
        return false;
    } else {
        return true;
    }
}

if (isset($_GET['search']) && !empty($_GET['search']))
{
    if ($_GET['chon'] == 1) {
        $rows = $action->getSearchAdmin('cart', array(
            'id_cart'
    ), $_GET['search'], $trang, $limit, $_GET['page']);
    }
    if ($_GET['chon'] == 2) {
        $rows = $action->getSearchAdmin('cart', array(
            'name_buyer'
    ), $_GET['search'], $trang, $limit, $_GET['page']);
    }
    if ($_GET['chon'] == 3) {
        $rows = $action->getSearchAdmin('cart', array(
             'phone_buyer'
    ), $_GET['search'], $trang, $limit, $_GET['page']);
    }
    if ($_GET['chon'] == 4) {
        $rows = $action->getSearchAdmin('cart', array(
             'date_cart'
    ), $_GET['search'], $trang, $limit, $_GET['page']);
    }
    
    // $rows = $rows['data'];
}
elseif (isset($_GET['check_in'])) {
    // echo 'Hello world';
    if (isset($_GET['trang'])) {
        $trang = $_GET['trang'];
        $start = $trang -1;
        $start = $start*$limit;
    } else {
        $trang = 1;
        $start = 0;
    }

    $check_in = $_GET['check_in'];
    $check_out = $_GET['check_out'];

    $sql = "SELECT * From cart WHERE date_cart between '$check_in' and '$check_out' Order By id_cart DESC Limit $start,$limit";
    $result = mysqli_query($conn_vn, $sql);
    $rows1 = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows1[] = $row;
    }
    $rows = array('data' => $rows1);
} else {
    // $rows = $order->getListOrder();
    if (isset($_GET['trang'])) {
        $trang = $_GET['trang'];
        $start = $trang -1;
        $start = $start*$limit;
    } else {
        $trang = 1;
        $start = 0;
    }
    // $rows = $order->getListOrder();
    $sql = "SELECT * From cart Order By id_cart DESC Limit $start,$limit";
    $result = mysqli_query($conn_vn, $sql);
    $rows1 = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows1[] = $row;
    }
    $rows = array('data' => $rows1);
}
?>

<div class="boxPageNews">
<?php if (isset($_GET['check_in'])) { ?>
<a href="/admin/template/excel/xls.php?check_in=<?= $_GET['check_in'] ?>&check_out=<?= $_GET['check_out'] ?>" style="float: right;">EXCEL</a>
<?php } elseif (isset($_GET['chon']) && $_GET['chon']==1) { ?>
<a href="/admin/template/excel/xls.php?ma=<?= $_GET['search'] ?>" style="float: right;">EXCEL</a>
<?php } elseif (isset($_GET['chon']) && $_GET['chon']==2) { ?>
<a href="/admin/template/excel/xls.php?name=<?= $_GET['search'] ?>" style="float: right;">EXCEL</a>
<?php } elseif (isset($_GET['chon']) && $_GET['chon']==3) { ?>
<a href="/admin/template/excel/xls.php?phone=<?= $_GET['search'] ?>" style="float: right;">EXCEL</a>
<?php } else { ?>
<a href="/admin/template/excel/xls.php" style="float: right;">EXCEL</a>
<?php } ?>
    <div class="searchBox">
        <form>
            <input type="hidden" name="page" value="don-hang">
            <button class="btnSearchBox" type="button">
                <select style="width: 100%;" name="chon">
                    <option value="1">Mã</option>
                    <option value="2">Tên khách hàng</option>
                    <option value="3">Số điện thoại</option>
                    <!-- <option value="4">Ngày</option> -->
                </select>
            </button>
            <input type="search" class="txtSearchBox" name="search" placeholder="Nhập tự khóa …" />
            
        </form>

    </div>
    <form>
        <input type="hidden" name="page" value="don-hang">
        <input type="date" name="check_in" value="<?= (isset($_GET['check_in'])) ? $_GET['check_in'] : date('Y-m-d') ?>">
        <input type="date" name="check_out" value="<?= (isset($_GET['check_out'])) ? $_GET['check_out'] : date('Y-m-d') ?>">
        <button type="submit">Lọc ngày</button>
    </form>
    <div class="titleNP">
        <p class="colNP0"><input type="checkbox" name="" value=""></p>
        <p class="colNP1">Đơn hàng</p>
        <p class="colNP2">Ngày đặt</p>
        <p class="colNP3">Khách hàng</p>
        <p class="colNP4">Số điện thoại</p>
        <p class="colNP4">Báo giá</p>
        <p class="colNP6">Tổng tiền</p>
    </div>
    <ul class="titleNP">
        <?php foreach($rows['data'] as $rowOrder) :?>
            <li>
                <p class="colNP0_2"><input type="checkbox" name="ckAction" id="ckAction" value=""></p>
                <div class="colNP1_2">
                    <a href="index.php?page=sua-don-hang&id_cart=<?php echo $rowOrder['id_cart']; ?>" title="">#<?php echo $rowOrder['id_cart']; ?></a>
                </div>
                <p class="colNP2_2"><?php echo $rowOrder['date_cart']; ?></p>
                <p class="colNP3_2"><?php echo $rowOrder['name_buyer'];?></p>
                <p class="colNP4_2"><?php echo $rowOrder['phone_buyer'];?></p>
                <p class="colNP4_2"><?php echo hasQuotes($rowOrder['id_cart']) ? 'Rồi' : 'Chưa';?></p>
                <p class="colNP6_2"><?php echo number_format($rowOrder['total_price'],2);?>Tệ</p>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php  

if (isset($_GET['search']) && !empty($_GET['search'])) {
    // echo '<div>'.$rows["paging"].'</div>';
        $chon = $_GET['chon'];
        $search_dh = $_GET['search'];
        if ($chon == 1) {
            $sql_pagin = "SELECT * From cart WHERE id_cart like '%$search_dh%'";
        }
        if ($chon == 2) {
            $sql_pagin = "SELECT * From cart WHERE name_buyer like '%$search_dh%'";
        }
        if ($chon == 3) {
            $sql_pagin = "SELECT * From cart WHERE phone_buyer like '%$search_dh%'";
        }
        if ($chon == 4) {
            $sql_pagin = "SELECT * From cart WHERE date_cart like '%$search_dh%'";
        }
        
        $result_pagin = mysqli_query($conn_vn, $sql_pagin);
        $num_pagin = mysqli_num_rows($result_pagin);


        $config = array(
            'current_page'  => $trang, // Trang hiện tại
            'total_record'  => $num_pagin, // Tổng số record
            'total_page'    => 1, // Tổng số trang
            'limit'         => $limit,// limit
            'start'         => 0, // start
            'link_full'     => '',// Link full có dạng như sau: domain/com/page/{page}
            'link_first'    => '',// Link trang đầu tiên
            'range'         => 9, // Số button trang bạn muốn hiển thị 
            'min'           => 0, // Tham số min
            'max'           => 0  // tham số max, min và max là 2 tham số private
        );

        $pagination = new Pagination;
        $pagination->init($config);

        echo $pagination->htmlPaging_tuan($_GET['page'].'&chon='.$chon.'&search='.$search_dh);

    } elseif (isset($_GET['check_in'])) {
        if (isset($_GET['trang'])) {
                $trang = $_GET['trang'];
            } else {
                $trang = 1;
            }

            $check_in = $_GET['check_in'];
            $check_out = $_GET['check_out'];

            $sql_pagin = "SELECT * From cart WHERE date_cart between '$check_in' and '$check_out'";
            $result_pagin = mysqli_query($conn_vn, $sql_pagin);
            $num_pagin = mysqli_num_rows($result_pagin);


            $config = array(
                'current_page'  => $trang, // Trang hiện tại
                'total_record'  => $num_pagin, // Tổng số record
                'total_page'    => 1, // Tổng số trang
                'limit'         => $limit,// limit
                'start'         => 0, // start
                'link_full'     => '',// Link full có dạng như sau: domain/com/page/{page}
                'link_first'    => '',// Link trang đầu tiên
                'range'         => 9, // Số button trang bạn muốn hiển thị 
                'min'           => 0, // Tham số min
                'max'           => 0  // tham số max, min và max là 2 tham số private
            );

            $pagination = new Pagination;
            $pagination->init($config);

            echo $pagination->htmlPaging_tuan($_GET['page'].'&check_in='.$check_in.'&check_out='.$check_out);

    } else {
        if (isset($_GET['trang'])) {
                $trang = $_GET['trang'];
            } else {
                $trang = 1;
            }

            $sql_pagin = "SELECT * From cart";
            $result_pagin = mysqli_query($conn_vn, $sql_pagin);
            $num_pagin = mysqli_num_rows($result_pagin);


            $config = array(
                'current_page'  => $trang, // Trang hiện tại
                'total_record'  => $num_pagin, // Tổng số record
                'total_page'    => 1, // Tổng số trang
                'limit'         => $limit,// limit
                'start'         => 0, // start
                'link_full'     => '',// Link full có dạng như sau: domain/com/page/{page}
                'link_first'    => '',// Link trang đầu tiên
                'range'         => 9, // Số button trang bạn muốn hiển thị 
                'min'           => 0, // Tham số min
                'max'           => 0  // tham số max, min và max là 2 tham số private
            );

            $pagination = new Pagination;
            $pagination->init($config);

            echo $pagination->htmlPaging_tuan($_GET['page']);
        }
?>

<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>