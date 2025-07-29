<?php 
    $order = new action_order();

    function addQuotes ($id) {
        global $conn_vn;
        if (isset($_POST['add_quotes'])) {
            $ship = $_POST['ship'];
            $ship = str_replace(',', '', $ship);
            $vnd = $_POST['vnd'];
            $vnd = str_replace(',', '', $vnd);
            $note = $_POST['note'];
            $user_id = $_POST['user_id'];

            $sql = "INSERT INTO quotes (ship, total, note, user_id, cart_id) VALUES ($ship, $vnd, '$note', $user_id, $id)";
            $result = mysqli_query($conn_vn, $sql) or die('loi1:');

            // $sql = "SELECT * FROM quotes WHERE cart_id = $id";
            // $result = mysqli_query($conn_vn, $sql) or die('loi2');
            // $row = mysqli_fetch_assoc($result);
            // $quotes_id = $row['id'];
            header('location: /admin/index.php?page=sua-bao-gia&id_cart='.$id);
        }
    }
    addQuotes($_GET['id_cart']);
    $rowOrder = $order->getOrderDetail($_GET['id_cart']);
?>

<form action="" method="post" id="addAccount1">
    <input type="hidden" name="action" value="addAccount">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Báo giá</span>
            <p class="subLeftNCP">Nhập thông tin Báo giá<br /><br /></p>     
            <p class="subLeftNCP"><a href="http://www.bidv.com.vn/Ty-gia-ngoai-te.aspx" target="_blank">Tỷ giá</a><br /><br /></p>
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Phí vận chuyển</p>
            <input type="text" id="ship" class="txtNCP1" name="ship" onkeyup="money(this)" required/>
            <p class="titleRightNCP">Giá nhân dân tệ</p>
            <input type="text" class="txtNCP1" value="<?= number_format($rowOrder['total_price']) ?>" name="te" />
            <p class="titleRightNCP">Giá việt nam đồng</p>
            <input type="text" id="vnd" class="txtNCP1" name="vnd" onkeyup="money(this)" required/>
            <input type="hidden" name="user_id" value="<?= $rowOrder['user_id'] ?>">
            <p class="titleRightNCP">Ghi chú</p>
            <textarea class="longtxtNCP2" name="note" ></textarea>
            
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_quotes">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>
<script type="text/javascript">
    function money (data) {
        // alert('phi');
        var so = data.value;
        var rong = data.value;
        so = so.split(",").join("");
        so = so.replace(/[^\d]/,'');
        so = Number(so);

        if (rong === "") {
            document.getElementById(data.id).value = "";
        } else {
            document.getElementById(data.id).value = number_format(so);
        }      
    }

    function number_format (number, decimals, dec_point, thousands_sep) {
        var n = number, prec = decimals;

        var toFixedFix = function (n,prec) {
            var k = Math.pow(10,prec);
            return (Math.round(n*k)/k).toString();
        };

        n = !isFinite(+n) ? 0 : +n;
        prec = !isFinite(+prec) ? 0 : Math.abs(prec);
        var sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep;
        var dec = (typeof dec_point === 'undefined') ? '.' : dec_point;

        var s = (prec > 0) ? toFixedFix(n, prec) : toFixedFix(Math.round(n), prec); 
        //fix for IE parseFloat(0.55).toFixed(0) = 0;

        var abs = toFixedFix(Math.abs(n), prec);
        var _, i;

        if (abs >= 1000) {
            _ = abs.split(/\D/);
            i = _[0].length % 3 || 3;

            _[0] = s.slice(0,i + (n < 0)) +
                   _[0].slice(i).replace(/(\d{3})/g, sep+'$1');
            s = _.join(dec);
        } else {
            s = s.replace('.', dec);
        }

        var decPos = s.indexOf(dec);
        if (prec >= 1 && decPos !== -1 && (s.length-decPos-1) < prec) {
            s += new Array(prec-(s.length-decPos-1)).join(0)+'0';
        }
        else if (prec >= 1 && decPos === -1) {
            s += dec+new Array(prec).join(0)+'0';
        }
        return s; 
    }

</script>