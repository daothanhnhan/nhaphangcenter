<?php 

  if (!isset($_SESSION['user_id_gbvn'])) {

    header('location: /dangnhap');

  }



	function listCart ($id) {

		global $conn_vn;

		$sql = "SELECT * FROM cart WHERE user_id = $id";

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

	$list_cart = listCart($_SESSION['user_id_gbvn']);

  function state_cart ($code) {
    if ($code == null) {
      return 'Chờ xác nhận';
    }
    if ($code == 1) {
      return 'Chờ xác nhận';
    }
    if ($code == 2) {
      return 'Đã xác nhận';
    }
    if ($code == 3) {
      return 'Chờ thanh toán';
    }
    if ($code == 4) {
      return 'Đã thanh toán';
    }
    if ($code == 5) {
      return 'Chờ gửi hàng';
    }
    if ($code == 6) {
      return 'Hủy đơn hàng';
    }
    if ($code == 7) {
      return 'Đã chuyển hàng';
    }
  }

?>

<style type="text/css">

	

  .thong-tin li {

    border: 1px solid #eeeeee;

    padding: 10px;

  }

</style>

<div class="container" id="cart">

  <h2 style="font-size: 2em;">Các đơn hàng</h2>

  <div class="row">

    <div class="col-md-3">

      <div class="thong-tin">

        <?php include_once DIR_OTHER . "MS_OTHER_SPRO_0002.php" ?>

      </div>

    </div>

    <div class="col-md-9">

      <table class="table table-striped">

        <thead>

          <tr>

            <th>STT</th>

            <th style="width: 15%;">Mã đơn hàng</th>

            <th>Ngày</th>

            <th>Trạng thái</th>

            <th>Tiền</th>

            <th>Chi tiết</th>

          </tr>

        </thead>

        <tbody>

          <?php 

          $d = 0;

          foreach ($list_cart as $item) { 

            $d++;

          ?>

          <tr>

            <td><?= $d ?></td>

            <td>#<?= $item['id_cart'] ?></td>

            <td><?= $item['date_cart'] ?></td>

            <td><?= state_cart($item['id_orderState']) ?></td>

            <td><?= number_format($item['total_price'],2) ?> Tệ</td>

            <td><a href="/chi-tiet-don-hang/<?= $item['id_cart'] ?>">Chi tiết đơn hàng</a></td>

          </tr>

          <?php } ?>

        </tbody>

      </table>

    </div>

  </div>         

  

</div>