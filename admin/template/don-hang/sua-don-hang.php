<?php
if ($acc->checkMod()) {
    $acc->redirect("index.php");
}
if(isset($_GET['id_cart'])){
    $id = $_GET['id_cart'];
}else{
    header("location:index.php?page=don-hang");
}

function hasQuotes ($id) {
    global $conn_vn;
    $sql = "SELECT * FROM quotes WHERE cart_id = $id";
    $result = mysqli_query($conn_vn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 0) {
        return true;
    } else {
        return false;
    }
}
?>
<form id="updateOrder">
    <input type="hidden" id="parent_id" name="id_cart" value="<?php echo $id;?>"/>
    <input type="hidden" name="action" value="updateOrder">
    <?php

    $order = new action_order();
    $rowOrder = $order->getOrderDetail($id);//var_dump($rowOrder);
    $listOrderDetail =  $order->getlistOrderDetailByCartId1($rowOrder['id_cart']);//var_dump($listOrderDetail);
    $orderStates = $order->getOrderState();
    ?>

    <script type="text/javascript">
        !function ($, window, document, _undefined){

            $('#updateOrder').on('click', '.deleteDetailID', function (e) {
                e.preventDefault()
                if (window.confirm('Bạn chuẩn bị xóa chi tiết đơn hàng, nếu trong đơn hàng chỉ có 1 sản phẩm thì sẽ xóa toàn bộ đơn hàng.\nBấm "OK" để tiếp tục, "Hủy" để dừng lại.')) {
                    var select = $(this), cart_id = select.closest('form').find('#parent_id').val(),
                        detail_id = select.data('id'),
                        submit = function () {
                            $.post('ajax.php', {
                                cart_id: cart_id,
                                detail_id: detail_id,
                                action: 'deleteOrderDetail'
                            }).done(function (data) {
                                console.log(data);
                                alert(data['status_text']);
                                if('true' == data['redirect']) {
                                    window.location.href = "/admin/index.php?page=don-hang";
                                } else {
                                    window.location.reload();
                                }
                            }).fail(function (t) {
                                alert('Lỗi, bạn vui lòng thử lại sau');
                                console.table(t);
                            });
                        };
                    return submit();
                }
                return false;
            });

        }(jQuery, this, document)


    </script>

    <div class="rowNodeContentPage">
        <div class="coverContentPage">
            <div class="row">
                <div class="contentPage">
                    <div class="box1">
                        <h2>Chi tiết đơn hàng số #<?php echo $rowOrder['id_cart'];?></h2>
                        <h3><?php echo $rowOrder['name_orderState'];?></h3>
                        <ul class="list_item_order">
                            <?php
                            $totalprice = 0;
                            foreach ($listOrderDetail as $rowOrderDetail) {
                                ?>
                                <li class="item_order">
                                        <span class="item_image">
                                            <!-- <img src="../images/<?php echo $rowOrderDetail['product_img'];?>" alt=""> -->
                                            <a href="<?php echo $rowOrderDetail['product_link'] ;?>" target="_blank"><img src="<?php echo $rowOrderDetail['product_img'] ;?>" width="50"></a>
                                        </span>
                                    <span class="item_name">
                                            <!-- <a href="index.php?page=sua-san-pham&id_product=<?php echo $rowOrderDetail['product_name'];?>"><?php echo $rowOrderDetail['product_name'] ;?></a> -->
                                            <a href="<?php echo $rowOrderDetail['product_link'] ;?>" target="_blank"><?php echo $rowOrderDetail['product_name'] ;?></a>
                                        </span>
                                    <span class="item_quantity">
                                            Size: <?php echo $rowOrderDetail['product_size'];?>
                                        </span>
                                    <span class="item_quantity">
                                            Color: <?php echo $rowOrderDetail['product_color'];?>
                                        </span>
                                    <span class="item_price">
                                            <?php echo number_format($rowOrderDetail['price_product'],2);?>
                                        </span>
                                    <span class="countwidth">x</span>
                                    <span class="item_quantity">
                                        <input type="number" style="width: 30px;" name="qyt_product[<?= $rowOrderDetail['id_cartDetail'] ?>]" value="<?= $rowOrderDetail['qyt_product'] ?>">
                                    </span>

                                    <span class="item_total_price">
                                            <?php echo number_format($rowOrderDetail['totalprice_product'],2);?>
                                        </span>
                                    <span class="item-delete-detail">
                                        <a href="javascript:;" class="deleteDetailID" data-id="<?= $rowOrderDetail['id_cartDetail'] ?>">Xóa</a>
                                    </span>
                                </li>
                                <?php
                                $totalprice += $rowOrderDetail['totalprice_product'];
                            }
                            ?>
                        </ul>
                        <div class="infor-order">
                            <span>Tổng tiền: </span>
                            <span class="price"><?php echo number_format($totalprice, "0","",".");?> Tệ</span>
                        </div>
                    </div>

                    <div class="box2">
                        <h2>Chi tiết đơn hàng</h2>
                        <label for="inputTxtNote">Ghi chú</label>
                        <textarea name="note_cart" id="inputTxtNote" cols="30" class="longtxtNCP2" rows="10" placeholder="Nhập ghi chú về đơn hàng"><?php echo $rowOrder['note_cart'];?></textarea>

                        <label for="name_buyer">Tên: </label>
                        <input type="text" class="form-control" name="name_buyer" value="<?= $rowOrder['name_buyer']; ?>">

                        <label for="phone_buyer">Số điện thoại: </label>
                        <input type="text" class="form-control" name="phone_buyer" value="<?= $rowOrder['phone_buyer']; ?>">

                        <label for="address_buyer">Địa chỉ: </label>
                        <input type="text" class="form-control" name="address_buyer" value="<?= $rowOrder['address_buyer']; ?>">

                        <label for="mail_buyer">Email: </label>
                        <input type="text" class="form-control" name="mail_buyer" value="<?= $rowOrder['mail_buyer']; ?>">

                        <label for="note_buyer">Ghi chú: </label>
                        <input type="text" class="form-control" name="note_buyer" value="<?= $rowOrder['note_buyer']; ?>">

                        <label for="inputSelect">Trạng thái đơn hàng</label>
                        <select name="id_orderState" id="inputSelect" class="form-control">
                            <?php
                            foreach ($orderStates as $orderState) {
                                ?>
                                <option <?php if($orderState['order_state_id'] == $rowOrder['id_orderState']){ echo "selected";}?> value="<?php echo $orderState['order_state_id'];?>"><?php echo $orderState['order_state_name'];?></option>
                                <?php
                            }
                            ?>

                        </select>

                    </div>

                </div>
                <div class="sideCusInfo">
                    <h4>Thông tin khách hàng</h4>
                    <hr>

                    <div class="CusInfo">
                        <p><strong>Tên:</strong> <?php echo $rowOrder['name_buyer'];?></p>
                        <p><strong>Số điện thoại:</strong> <?php echo $rowOrder['phone_buyer'];?></p>
                        <p><strong>Địa chỉ:</strong> <?php echo $rowOrder['address_buyer'];?></p>
                        <p><strong>Email:</strong> <?php echo $rowOrder['mail_buyer'];?></p>
                        <p><strong>Ghi chú:</strong> <?php echo $rowOrder['note_buyer'];?></p>
                        <?php if (hasQuotes($_GET['id_cart'])) { ?>
                        <p><a href="/admin/index.php?page=them-bao-gia&id_cart=<?= $_GET['id_cart'] ?>">Tạo báo giá</a></p>
                        <?php } else { ?>
                        <p><a href="/admin/index.php?page=sua-bao-gia&id_cart=<?= $_GET['id_cart'] ?>">Sửa báo giá</a></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end rowNodeContentPage-->
    <button type="button" class="btn btn-danger pull-right" data-id="<?= $rowOrder['id_cart']; ?>" data-action="deleteOrder" id="deleteOrder">Xóa</button>
    <button class="btn btnSave">Lưu</button>
</form>
