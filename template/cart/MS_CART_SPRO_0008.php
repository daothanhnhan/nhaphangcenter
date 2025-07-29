<div class="gb-chi-tiet-add-to-cart">
    <form class="cart" method="post" enctype="multipart/form-data">
        <div class="quantity">
            <div class="form-group">
                <!-- <label>Giá tùy chỉnh:</label> -->
                 <br />
                <!-- <label>Số lượng:</label> -->
                
                <!-- <label>Size:</label> -->
                
                <!-- <label>Color:</label> -->
                
                <input type="hidden" name="id" id="product_id" value="0">
                <input type="hidden" name="name" id="product_name" style="width: 100%;" value="<?= $name_tsl ?>" placeholder="Nhập tên sản phẩm...">
                
                <input type="hidden" name="link" id="product_link" value="<?= $_GET['link'] ?>">
                <input type="hidden" name="img" id="product_img" value="<?= $img_main ?>">
            </div>
        </div>

        <button type="button" name="add-to-cart" class="single_add_to_cart_button button alt btn_addCart">Add to cart</button>
        <div class="clearfix"></div>
    </form>
</div>