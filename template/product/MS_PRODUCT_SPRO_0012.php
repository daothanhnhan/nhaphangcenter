<style type="text/css">
	#title {
		padding: 10px 10px;
		background-color: #666;
		color: white;
	}
	#content-order {
		border: 1px solid #eaeaea;
		margin-top: 10px;
		box-sizing: border-box;
		padding: 20px 30px;
	}
	#content-border textarea {
		width: 100%;
		margin-bottom: 10px;
	}
	#order {
		margin-top: 50px;
	}
</style>
<div class="container">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
    	<div id="order">
    		<div id="title">
    			Nếu không lấy được sản phẩm, mời bạn dán link gốc vào đơn hàng dưới đây!
    		</div>
    		<div id="content-order">
    			<div id="content-border">
    				<textarea rows="5" placeholder="Please input other purchasing information of this item, such as discount price or other requirements.." ></textarea>
    				<div class="form-group">
					    <label for="email">URL <span style="color: red;">*</span></label>
					    <input type="text" class="form-control" id="email">
					</div>
					<div class="form-group">
					    <label for="email">Tên sản phẩm</label>
					    <input type="text" class="form-control" id="email">
					</div>
					<div class="form-group">
					    <label for="email">Đơn giá (¥)<span style="color: red;">*</span></label>
					    <input type="number" step="0.01" min="0" class="form-control" id="email">
					</div>
					<div class="row">
					  <div class="col-sm-3">
					  	<div class="form-group">
						    <label for="email">Size</label>
						    <input type="text" step="0.01" min="0" class="form-control" id="email">
						</div>
					  </div>
					  <div class="col-sm-3">
					  	<div class="form-group">
						    <label for="email">Màu sắc</label>
						    <input type="text" step="0.01" min="0" class="form-control" id="email">
						</div>
					  </div>
					  <div class="col-sm-3">
					  	<div class="form-group">
						    <label for="email">Số lượng</label>
						    <input type="number" min="1" class="form-control" id="email">
						</div>
					  </div>
					  <div class="col-sm-3">
					  	<div class="form-group">
						    <button type="submit" class="btn btn-default" style="margin-top: 16px;float: right;">Order</button>
						</div>
					  </div>
					</div>
    			</div>
    			
    		</div>
    	</div>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>