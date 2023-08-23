<div class="container-fluid">
	<div class="game mt-5"> 
		<p class="h2 text-center font-weight-bold">Tài Khoản Game Liên Minh</p>
		<hr class="hr-home">
		<div class="container-fluid" data-slider="owl">
			<div class="row">
				<div class="col-sm-6 col-md-3 mt-2">
					<select id="price" class="form-control" name="gia">
						<option selected disabled="">Chọn Giá</option>
						<option value="1">Dưới 50k</option>
						<option value="2">50k - 200k</option>
						<option value="3">200k - 500k</option>
						<option value="4">500k - 1 Triệu</option>
						<option value="5">Trên 1 Triệu</option>
					</select>
				</div>
				<div class="col-sm-6 col-md-3 mt-2">
					<select id="status" class="form-control" name="tinh_trang">
						<option selected disabled="">Tình Trạng</option>
						<option value="1">Chưa bán</option>
						<option value="2">Đã đặt cọc</option>
						<option value="3">Đã bán</option>
					</select>
				</div>
				<div class="col-sm-6 col-md-3 mt-2">
					<select id="rank" class="form-control" name="rank">
						<option selected disabled="">Rank</option>
						<option value="1">Đồng</option>
						<option value="2">Bạc</option>
						<option value="3">Vàng</option>
						<option value="4">Bạch kim</option>
						<option value="5">Kim cương</option>
						<option value="6">Cao thủ</option>
						<option value="7">Thách đấu</option>
					</select>
				</div> 
				<div class="col-sm-6 col-md-3 mt-2">
					<select id="status_2" class="form-control" name="trang_thai">
						<option selected disabled="">Trạng thái</option>
						<option value="1">Trắng thông tin</option>
						<option value="2">SĐT đổi - Trắng mail</option>
						<option value="3">SĐT đổi - Gửi mail</option>
						<option value="4">Trắng SĐT - Trắng mail</option>
					</select>
				</div>
				<div class="col-sm-6 col-md-8 mt-2">
					<button type="submit" class="btn btn-success mt-2 search" id="search_keyword">Tìm Kiếm</button>
					<button type="submit" class="btn btn-danger mt-2" id="search_default">Tất Cả</button>
					<button type="submit" class="btn btn-primary mt-2" id="search_sort_first">Giá thấp đến cao</button>
					<button type="submit" class="btn btn-warning mt-2" id="search_sort_second">Giá từ cao đến thấp</button>
				</div>
			</div>
			<div class="list-game row" id="pagination-result-ngocrong">
				<input type="hidden" name="rowcount" id="rowcount" />
			</div>
		</div>
	</div>
</div>