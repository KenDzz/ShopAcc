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
                    <input type="text" class="form-control" id="user" name="user" value="userxxx">
                  </div>
                </div>
                 <div class="col-sm-1 text-left">
                   <button type="submit" class="btn btn-primary pull-right" id="button_search">Tìm kiếm</button>
                 </div>
                 <div class="col-sm-1">
                 <form method="POST">
                     <button type="submit" class="btn btn-primary pull-right" id="button_export_excel_buy" name="button_export_excel_buy">Xuất excel</button>
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
                  <th>Loại Game</th>
                  <th>Giá tiền</th>
                  <th>Date/Time</th>
                </tr>
              </thead>
              <tbody id="pagination-result">
                <input type="hidden" name="rowcount" id="rowcount" />
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>