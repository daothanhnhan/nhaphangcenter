<?php
  // var_dump($_SESSION) ;
  if (!isset($_SESSION['user_id_gbvn'])) {
    echo '<script type="text/javascript">alert(\'Bạn chưa đăng nhập\');window.location.href="/dangnhap"</script>';
  }
  $donhang = $cart->getCartDetail_userid($_SESSION['user_id_gbvn']);//var_dump($donhang);
?>
<style type="text/css">
  #cart h2 {
    font-size: 2em;
    margin-bottom: 20px;
  }
</style>
<div class="container" id="cart">
  <h2>Đơn hàng</h2>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Ảnh</th>
        <th>Tên</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Tổng tiền</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($donhang as $item) { ?>
      <tr>
        <td><a href="<?= $item['product_link'] ?>"><img src="<?= $item['product_img'] ?>" width="50"></a></td>
        <td><?= $item['product_name'] ?></td>
        <td><?= $item['qyt_product'] ?></td>
        <td><?= $item['price_product'] ?></td>
        <td><?= $item['totalprice_product'] ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>