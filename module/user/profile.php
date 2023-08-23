      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tài khoản</h6>
              </div>
              <div class="col-sm-9 text-secondary">
               <?php echo htmlspecialchars($user->account($username)); ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo htmlspecialchars($user->email($username)); ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Số điện thoại</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo "+(84) ".htmlspecialchars($user->sdt($username)); ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Số dư</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo htmlspecialchars($user->money($username)); ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">ID</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo htmlspecialchars($user->id($username)); ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Loại tài khoản</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php 
                  $msg = htmlspecialchars($user->category($username));
                  echo strtoupper($msg);
                ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Mật khẩu</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                **************** <a href="doi-mat-khau"><i class="fas fa-edit ml-2" style="color: #7FDBFF"></i></a>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">IP</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php 
                  echo htmlspecialchars($user->getip());
                ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Trình Duyệt</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php 
                  echo htmlspecialchars($user->getbrowser()); 
                ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Vị trí</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php 
                  $return = $user->GetInfoIP($user->getip());
                  if ($return['status'] == "fail") {
                    echo htmlspecialchars("Không thể xác định vị trí!");
                  }else{
                    echo htmlspecialchars($return['city']); 
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>