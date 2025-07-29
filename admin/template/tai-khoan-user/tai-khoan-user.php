<?php
    // if (isset($_GET['search']) && $_GET['search'] != '') {
    //     $rows = $action->getSearchAdmin('user',array('name','email'), $_GET['search'],$trang,10,$_GET['page']);
    // }else{
       
    //     $rows = $acc->getList("user","","","id","desc",$trang, 10, "tai-khoan-user");
    // }
    $limit = 20;
    if (isset($_GET['search']) && !empty($_GET['search']))
    {
        if ($_GET['chon'] == 1) {
            $rows = $action->getSearchAdmin('user', array(
                'name'
        ), $_GET['search'], $trang, $limit, $_GET['page']);
        }

        if ($_GET['chon'] == 2) {
            $rows = $action->getSearchAdmin('user', array(
                'email'
        ), $_GET['search'], $trang, $limit, $_GET['page']);
        }

        if ($_GET['chon'] == 3) {
            $rows = $action->getSearchAdmin('user', array(
                 'phone'
        ), $_GET['search'], $trang, $limit, $_GET['page']);
        }
        
        // $rows = $rows['data'];
    } else {
        $rows = $acc->getList("user","","","id","desc",$trang, $limit, "tai-khoan-user");
    }

?>	
    <div class="boxPageNews">
    	<div class="searchBox">
            <form action="">
                <input type="hidden" name="page" value="tai-khoan-user">
            	<button type="button" class="btnSearchBox" name="">
                    <select style="width: 100%;" name="chon">
                        <option value="1">Tên</option>
                        <option value="2">Email</option>
                        <option value="3">Số điện thoại</option>
                    </select>
                </button>
                <input type="text" class="txtSearchBox" name="search" />                	                
            </form>
        </div>
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên tài khoản</th>
                    <th>Email</th>            
                    <th>Phone</th>       
                </tr>
            </thead>
            <tbody>
                <?php 
                    $d = 0;
                    foreach ($rows['data'] as $row) {
                        $d++;
                    ?>
                        <tr>
                            <td><?= $d ?></td>
                            <td><a href="/admin/index.php?page=list-don-hang&id=<?= $row['id'] ?>" title=""><?= $row['name']; ?></a></td>
                            <td><?= $row['email']?></td>
                            <td><?= $row['phone']?></td>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    	
        <div class="paging">             
        	<?php 
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $chon = $_GET['chon'];
                $search_user = $_GET['search'];
                if ($chon == 1) {
                    $sql_pagin = "SELECT * From user WHERE name like '%$search_user%'";
                }
                if ($chon == 2) {
                    $sql_pagin = "SELECT * From user WHERE email like '%$search_user%'";
                }
                if ($chon == 3) {
                    $sql_pagin = "SELECT * From user WHERE phone like '%$search_user%'";
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

                echo $pagination->htmlPaging_tuan($_GET['page'].'&chon='.$chon.'&search='.$search_user);
            } else {
                echo $rows['paging'];
            }

            ?>
		</div>
    </div>
    <p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>             