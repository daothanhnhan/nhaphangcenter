<?php 
    if (!isset($_SESSION['user_id_gbvn'])) {
        echo '<script type="text/javascript">alert(\'Bạn không có quyền đổi mật khẩu.\'); window.location.href = "/forget-password";</script>';
    }

    $message_change = "";

    function change_password () {
        global $conn_vn;
        global $message_change;
        if (isset($_POST['send_change_password'])) {
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            if ($pass1 != $pass2) {
                $message_change = "Mật khẩu nhập vào không khớp.";
            } else {
                $pass = password_hash($pass1, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET password = '$pass' Where id = " . $_SESSION['user_id_gbvn'];
                $result = mysqli_query($conn_vn, $sql) or die('error: ' . mysqli_error($conn_vn));
                echo '<script type="text/javascript">alert(\'Bạn đã đổi mật khẩu thành công.\'); window.location.href = "/";</script>';
            }
        }
    }

    change_password();
?>
<style type="text/css">
    .gb-lost-password-cms h1 {
        font-size: 2em;
        margin: 20px 0;
        font-weight: bold;
    }

    .gb-lost-password-cms label {
        font-weight: bold;
        margin: 10px 0;
    }

    .gb-lost-password-cms button {
        background-color: #f0ad4e;
        color: white;
        padding: 10px;
        min-width: 150px;
    }

    .gb-lost-password-cms-continue {
        float: right;
    }

    .gb-lost-password-cms .container {
        margin: 30px auto;
    }

    .gb-lost-password-cms-back {
        background-color: #f0ad4e;
        color: white;
        padding: 10px;
        display: inline-block;
        min-width: 150px;
        text-align: center;
    }

    .gb-lost-password-cms-back a {
        color: white;
    }

    .gb-lost-password-cms p {
        margin: 20px auto;
    }
</style>
<div class="gb-lost-password-cms">
    <div class="container">
        <h1>Thay đổi mật khẩu?</h1>
        <p>Bạn hãy thay đổi mật khẩu ở đây</p>

        <form action="" method="post">
            <span style="color: red;"><?= $message_change ?></span>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>Mật khẩu</label>
                    </div>
                    <div class="col-md-10">
                        <input type="password" name="pass1" class="form-control" placeholder="Nhập Mật khẩu muốn đổi...." required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label>Nhập lại mật khẩu</label>
                    </div>
                    <div class="col-md-10">
                        <input type="password" name="pass2" class="form-control" placeholder="Nhập mật khẩu muốn đổi...." required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="gb-lost-password-cms-back">
                        <a href="/dangnhap">Quay lại</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="gb-lost-password-cms-continue">
                        <button type="submit" name="send_change_password" class="btn">Tiếp tục</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>