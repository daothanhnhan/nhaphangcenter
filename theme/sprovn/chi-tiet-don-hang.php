<?php 

	function listCartDetail ($id) {

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

  function getCart ($id) {
    global $conn_vn;
    $sql = "SELECT * FROM cart WHERE id_cart = $id";
    $result = mysqli_query($conn_vn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
  }

  $cart = getCart($_GET['trang']);

	$list_cart_detail = listCartDetail($_GET['trang']);//var_dump($list_cart_detail);

?>

<style type="text/css">


  .thong-tin li {

    border: 1px solid #eeeeee;

    padding: 10px;

  }

  #chitiet1, #chitiet1 tr, #chitiet1 td {
    border: 1px solid black;
  }

  #chitiet1 b {
    font-weight: bold;
  }

  table#chitiet1 {
    width: 100%;
  }

  #chitiet1 td {
    padding: 10px;
  }

  #chitiet2, #chitiet2 tr, #chitiet2 td {
    border: 1px solid black;
  }

  table#chitiet2 {
    margin-top: 20px;
    width: 100%;
    margin-bottom: 20px;
  }

  #chitiet2 td {
    padding: 10px;
  }

</style>

<div class="container" id="cart">

  <h2>Chi tiết đơn hàng</h2>

  <div class="row">

    <div class="col-md-3">

      <div class="thong-tin">

        <?php include_once DIR_OTHER . "MS_OTHER_SPRO_0002.php" ?>

      </div>

    </div>

    <div class="col-md-9">
      <table id="chitiet1">
        <tbody>
          <tr>
            <td style="width: 50%;">
              <p><b>Mã đơn hàng:</b> #<?= $cart['id_cart'] ?></p><br>
              <p><b>Ngày tạo:</b> <?= $cart['date_cart'] ?></p>
            </td>
            <td style="width: 50%;">
              <p><b>Phương thức thanh toán:</b> Thu tiền khi giao hàng</p><br>
              <p><b>Phương thức vận chuyển:</b> Giao hàng nhanh</p>
            </td>
          </tr>
        </tbody>
      </table>

      <table id="chitiet2">
        <tbody>
          <tr>
            <td style="width: 50%;">
              Địa chỉ thanh toán
            </td>
            <td style="width: 50%;">
              Địa chỉ giao hàng
            </td>
          </tr>
          <tr>
            <td>
              <?= $cart['address_buyer'] ?>
            </td>
            <td>
              <?= $cart['address_buyer'] ?>
            </td>
          </tr>
        </tbody>
      </table>

      <table class="table table-striped">

        <thead>

          <tr>

            <th>Ảnh</th>

            <th>Tên sản phẩm</th>

            <th>Size</th>

            <th>Màu sắc</th>

            <th>Giá</th>

            <th>Số lượng</th>

            <th>Tổng tiền</th>

          </tr>

        </thead>

        <tbody>

          <?php 

          foreach ($list_cart_detail as $item) { 

          ?>

          <tr>

            <td><a href="<?= $item['product_link'] ?>" target="_blank"><img src="<?= $item['product_img'] ?>" width="50"></a></td>

            <td><?= $item['product_name'] ?></td>

            <td><?= $item['product_size'] ?></td>

            <td><?= $item['product_color'] ?></td>

            <td><?= number_format($item['price_product'],2) ?> Tệ</td>

            <td><?= $item['qyt_product'] ?></td>

            <td><?= number_format($item['totalprice_product'], 2) ?> Tệ</td>

          </tr>

          <?php } ?>

        </tbody>

      </table>

    </div>

  </div>         

  

</div>