<?php 

  if (!isset($_SESSION['user_id_gbvn'])) {

    echo '<script type="text/javascript">alert(\'Bạn chưa đăng nhập\');window.location.href="/dangnhap"</script>';

  }

  

	function listOrder ($id) {

		global $conn_vn;

		$sql = "SELECT * FROM cartdetail WHERE id_cart = $id";

		$result = mysqli_query($conn_vn, $sql);

		$rows = array();

		$num = mysqli_num_rows($result);

		if ($num > 0) {

			while ($row = mysqli_fetch_assoc($result)) {

				$rows[] = $row;

			}

		}

		return $rows;

	}

	$list_order = listOrder($_GET['trang']);



  function baoGia ($id) {

    global $conn_vn;

    $sql = "SELECT * FROM quotes WHERE cart_id = $id";

    $result = mysqli_query($conn_vn, $sql);

    $row = mysqli_fetch_assoc($result);

    return $row;

  }

  $bao_gia = baoGia($_GET['trang']);

?>

<style type="text/css">

  #cart h2 {

    font-size: 2em;

    margin-bottom: 20px;

  }

  .thong-tin li {

    border: 1px solid #eeeeee;

    padding: 10px;

  }

</style>

<div class="container" id="cart">

  <h2>Chi tiết báo giá</h2>

  <h3>Đơn hàng</h3>   

  <div class="row">

    <div class="col-md-3">

      <div class="thong-tin">

        <?php include_once DIR_OTHER . "MS_OTHER_SPRO_0002.php" ?>

      </div>

    </div>

    <div class="col-md-9">

      <table class="table table-striped" style="margin-top: 0">

        <thead>

          <tr>

            <th>Ảnh</th>

            <th>Tên</th>

            <th>Size</th>

            <th>Màu sắc</th>

            <th>Số lượng</th>

            <th>Giá</th>

            <th>Tổng tiền</th>

          </tr>

        </thead>

        <tbody>

        <?php foreach ($list_order as $item) { ?>

          <tr>

            <td><a href="<?= $item['product_link'] ?>"><img src="<?= $item['product_img'] ?>" width="50"></a></td>

            <td><?= $item['product_name'] ?></td>

            <td><?= $item['product_size'] ?></td>

            <td><?= $item['product_color'] ?></td>

            <td><?= $item['qyt_product'] ?></td>

            <td><?= $item['price_product'] ?></td>

            <td><?= $item['totalprice_product'] ?></td>

          </tr>

        <?php } ?>

        </tbody>

      </table>

      <h3>Báo giá</h3>

      <table class="table table-striped">

        <thead>

          <tr>

            <th>Phí vận chuyển</th>

            <th>Tổng tiền hàng</th>

            <th>Tổng thanh toán</th>

            <th>Ghi chú</th>

          </tr>

        </thead>

        <tbody>

          <tr>

            <td><?= number_format($bao_gia['ship']) ?> VNĐ</td>

            <td><?= number_format($bao_gia['total']) ?> VNĐ</td>

            <td><?= number_format($bao_gia['ship'] + $bao_gia['total']) ?> VNĐ</td>

            <td><?= $bao_gia['note'] ?></td>

          </tr>

        </tbody>

      </table>

    </div>

  </div> 

  

</div>