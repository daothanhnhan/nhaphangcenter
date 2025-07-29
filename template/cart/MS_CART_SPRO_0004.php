<div class="uni-cart-body">
    <div id="post" class="container">

        <?php include DIR_BREADCRUMBS."MS_BREADCRUMS_SPRO_0001.php";?>

        <div class="entry-content">
            <form class="woocommerce-cart-form" method="post">
                <table class="woocommerce-cart-form__contents table shop_table_responsive">
                    <thead>
                    <tr>
                        <th class="product-remove"></th>
                        <th class="product-name">Sản phẩm</th>
                        <th class="product-price">Giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="product-subtotal">Tổng đơn giá</th>
                    </tr>
                    </thead>

                    <tbody>

                    <tr class="woocommerce-cart-form__cart-item cart_item">
                        <td class="product-remove">
                            <a href="#" class="remove"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </td>
                        <td class="product-name">
                                <span class="product-thumbnail">
                                    <a href="#">
                                        <img src="images/tintuc/1.jpg" alt="" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image img-responsive">
                                    </a>
                                </span>
                            <a href="#">Redufluxes</a>
                        </td>
                        <td class="product-price">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                    26.00
                                </span>
                        </td>
                        <td class="product-quantity">
                            <div class="quantity">
                                <input type="number" class="qty" min="0"  value="1">
                            </div>
                        </td>
                        <td class="product-subtotal">
                            <div class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>
                                26.00
                            </div>
                        </td>
                    </tr>

                    <tr class="woocommerce-cart-form__cart-item cart_item">
                        <td class="product-remove">
                            <a href="#" class="remove"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </td>
                        <td class="product-name">
                                <span class="product-thumbnail">
                                    <a href="#">
                                        <img src="images/tintuc/2.jpg" alt="" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image img-responsive">
                                    </a>
                                </span>
                            <a href="#">Sperm Plus</a>
                        </td>
                        <td class="product-price">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                    26.00
                                </span>
                        </td>
                        <td class="product-quantity">
                            <div class="quantity">
                                <input type="number" class="qty" min="0" value="1">
                            </div>
                        </td>
                        <td class="product-subtotal">
                            <div class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span>
                                26.00
                            </div>
                        </td>
                    </tr>
                    </tbody>

                    <tfoot>
                    <tr>
                        <td class="actions" colspan="5">
                            <div class="coupon">
                                <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Nhập mã giảm giá">
                                <input type="submit" class="button" name="apply_coupon" value="Mã giảm giá">
                            </div>
                            <input type="submit" class="button" name="update_cart" value="Cập nhật giỏ hàng">
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </form>

            <div class="cart-collaterals">
                <div class="row">
                    <div class="col-md-6">
                        <div class="cart_totals">
                            <h2>tổng đơn hàng</h2>
                            <table class="shop_table shop_table_responsive">
                                <tbody><tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span>15.00</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span>15.00</span></strong> </td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="wc-proceed-to-checkout">
                                <a href="#" class="checkout-button button alt wc-forward">THANH TOÁN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>