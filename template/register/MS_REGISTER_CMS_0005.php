<?php 

    $message = "";



    function set_ca_nhan () {

        global $conn_vn;

        global $message;

        if (isset($_POST['edit_user'])) {

            $ok = 'true';

            $name = ($_POST['name']==NULL) ? '' : trim($_POST['name']);

            // $first_name = ($_POST['first_name']==NULL) ? '' : trim($_POST['first_name']);

            // $last_name = ($_POST['last_name']==NULL) ? '' : trim($_POST['last_name']);

            // $alias = ($_POST['alias']==NULL) ? '' : trim($_POST['alias']);

            // $email = ($_POST['email']==NULL) ? '' : $_POST['email'];

            $phone = $_POST['phone'];

            $address = $_POST['address'];

            // $pass1 = ($_POST['pass1']==NULL) ? '' : $_POST['pass1'];

            // $pass2 = ($_POST['pass2']==NULL) ? '' : $_POST['pass2'];

            // $time = time();

            // $ask = password_hash(trim($_POST['ask']), PASSWORD_DEFAULT);



            // $sql_nick = "SELECT * FROM user Where name = '$name'";

            // $result_nick = mysqli_query($conn_vn, $sql_nick);

            // $row_nick = mysqli_num_rows($result_nick);

            // if ($row_nick > 0) {

            //     $ok = "false";

            //     $message .= "Tên đăng nhập đã tồn tại. ";

            // }



            // kiem tra email ton tai.

            // $sql_email = "SELECT * FROM user Where email = '$email'";

            // $result_email = mysqli_query($conn_vn, $sql_email);

            // $row_email = mysqli_num_rows($result_email);

            // if ($row_email > 0) {

            //     $ok = "false";

            //     $message .= "email đã tồn tại. ";

            // }



            // if ($pass1 != $pass2) {

            //     $ok = "false";

            //     $message .= "Mật khẩu không khớp.";

            // }

            $user_id = $_SESSION['user_id_gbvn'];

            if ($ok == "true") {

                // $pass = password_hash($pass1, PASSWORD_DEFAULT);

                $sql = "UPDATE user SET name = '$name', phone = '$phone', address = '$address' Where id = $user_id";

                $result = mysqli_query($conn_vn, $sql) or die('error :' . mysqli_error($conn_vn));

                // $sql_user = "SELECT * FROM user Where email = '$email'";

                // $result_user = mysqli_query($conn_vn, $sql_user);

                // $row_user = mysqli_fetch_assoc($result_user);

                // $_SESSION['user_id_gbvn'] = $row_user['id'];

                echo '<script type="text/javascript">alert(\'Bạn đã cập nhật thành công\');</script>';

            }

        }

    }



    set_ca_nhan();



    $user = getUser();

?>

<style type="text/css">

    h1 {

        text-align: center;

        font-size: 2em;

        margin: 20px 0;

        font-weight: bold;

    }



    label {

        font-weight: bold;

        margin: 10px 0;

    }



    button {

        width: 100%;

        background-color: #f0ad4e;

        text-transform: uppercase;

        font-weight: 600 !important;

        font-size: 18px !important;

        margin-bottom: 40px !important;

    }

    .thong-tin li {

        border: 1px solid #eeeeee;

        padding: 10px;

      }

</style>

<div class="gb-register-cms">

    <div class="container">

        <div class="row">

            <div class="col-md-3">

              <div class="thong-tin" style="margin-top: 30px">

                <?php include_once DIR_OTHER . "MS_OTHER_SPRO_0002.php" ?>

              </div>

            </div>

            <div class="col-md-9">

                <div class="row">

                    <div class="col-md-12" id="cart">

                        <div class="gb-register-cms-body" id="info_users_">

                            <h2 style="margin-bottom: 0">Thông tin cá nhân</h2 style="margin-bottom: 0">

                            <!-- <p style="text-align: center;">Tạo tài khoản để hưởng trọn ưu đãi: tích điểm nhận quà, chương trình tri ân dành cho

                                thành viên, theo dõi đơn đặt hàng dễ dàng, thanh toán thuận tiện và rất nhiều tiện ích khác.

                            </p> -->



                            <div class="row">

                                <div class="col-md-5 ">

                                    <form action="" method="post">

                                        <label style="color: red;"><?= $message ?></label>

                                        <div class="form-group">

                                            <label>Họ và tên:</label>

                                            <input type="text" class="form-control" name="name" placeholder="Họ và tên" value="<?= $user['name'] ?>" required>

                                        </div>

                                        <div class="form-group">

                                            <label>Email:</label>

                                            <input type="email" class="form-control" name="email" placeholder="Nhập địa chỉ Email." value="<?= $user['email'] ?>" readonly >

                                        </div>

                                        <div class="form-group">

                                            <label>Phone:</label>

                                            <input type="number" class="form-control" name="phone" placeholder="Nhập địa chỉ Phone." value="<?= $user['phone'] ?>" required>

                                        </div>

                                        <div class="form-group">

                                            <label>Address:</label>

                                            <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ Address." value="<?= $user['address'] ?>" required>

                                        </div>

                                        <button type="submit" name="edit_user" class="btn">Cập nhật thông tin</button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        

    </div>

</div>