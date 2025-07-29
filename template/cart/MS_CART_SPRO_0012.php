<?php 
  if (!isset($_SESSION['user_id_gbvn'])) {
    echo '<script type="text/javascript">alert(\'Bạn chưa đăng nhập\');window.location.href="/dangnhap"</script>';
  }

  function listQuotes () {
    global $conn_vn;
    $user_id = $_SESSION['user_id_gbvn'];
    $sql = "SELECT * FROM cart INNER JOIN quotes ON cart.id_cart = quotes.cart_id WHERE cart.user_id = $user_id";
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
  $list_quotes = listQuotes();
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
  <h2>Danh sách báo giá</h2>
  <div class="row">
    <div class="col-md-3">
      <div class="thong-tin">
        <?php include_once DIR_OTHER . "MS_OTHER_SPRO_0002.php" ?>
      </div>
    </div>
    <div class="col-md-9">
      <table class="table table-striped">
        <!-- <thead>
          <tr>
            <th>Firstname</th>
          </tr>
        </thead> -->
        <tbody>
        <?php foreach ($list_quotes as $item) { ?>
          <tr>
            <td><a href="/chi-tiet-bao-gia/<?= $item['id_cart'] ?>"><?= $item['time']. ' #' . $item['id_cart'] ?></a></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
             
  
</div>