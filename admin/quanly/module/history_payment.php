<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-profile">
            <div class="card-header card-header-primary">
              <h4 class="card-title text-center">Tìm kiếm</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nhập tài khoản cần tìm kiếm</label>
                    <input type="text" class="form-control" id="user_payment" name="user_payment" value="userxxx">
                  </div>
                </div>
                 <div class="col-sm-1 text-left">
                   <button type="submit" class="btn btn-primary pull-right" id="button_search_payment">Tìm kiếm</button>
                 </div>
                 <div class="col-sm-1">
                    <form method="POST">
                       <button type="submit" class="btn btn-primary pull-right" id="button_export_excel_payment" name="button_export_excel_payment">Xuất excel</button>
                    </form>
                </div>
              </div>
            </div>  
        </div>
        <div class="card card-profile">
          <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Lịch sử mua nick</h4>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th>ID NICK</th>
                  <th>User</th>
                  <th>Money</th>
                  <th>Hình Thức Nạp</th>
                  <th>Mã thẻ cào</th>
                  <th>Seri thẻ cào</th>
                  <th>Loại thẻ cào</th>
                  <th>Date/Time</th>
                </tr>
              </thead>
              <tbody id="pagination-result-payment">
                <input type="hidden" name="rowcount" id="rowcount" />
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>