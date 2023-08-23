<?php 
  if (isset($_POST["password"]) && isset($_POST["passwordnew"]) && isset($_POST["repasswordnew"])) {
      $password = addslashes($_POST["password"]);
      $passwordnew = addslashes($_POST["passwordnew"]);
      $repasswordnew = addslashes($_POST["repasswordnew"]);
      $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
      $passwordnew_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $passwordnew);
      $repasswordnew_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $passwordnew);
      if ($password_check == 1 && $passwordnew_check == 1 && $repasswordnew_check == 1) {
          if ($passwordnew == $repasswordnew) {
              $user->change_password($username,$password,$passwordnew);
          }
          else{
            $msg = "Mật khẩu nhập lại không khớp!";
            $alert->alert_error($msg);
          }
      }
      else{
        $msg2 = "Vui lòng kiểm tra lại Password đã nhập";
        $alert->alert_error($msg2);
      }

  }

 ?>
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <form method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Mật khẩu cũ</label>
                <input type="password" name="password" class="form-control shadow-sm bg-white rounded" pattern=".{6,}" required title="Mật khẩu phải tối thiểu 6 ký tự">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Mật khẩu mới</label>
                <input type="password" name="passwordnew" class="form-control shadow-sm bg-white rounded" pattern=".{6,}" required title="Mật khẩu phải tối thiểu 6 ký tự">
                <span class="badge badge-info">Mật khẩu phải có 6 ký tự trở lên! </span>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nhập lại mật khẩu mới</label>
                <input type="password" name="repasswordnew" class="form-control shadow-sm bg-white rounded" pattern=".{6,}" required title="Mật khẩu phải tối thiểu 6 ký tự">
                <span class="badge badge-info">Mật khẩu mới và Nhập lại mật khẩu mới phải trùng nhau! </span>
              </div>
              <button type="submit" class="btn btn-outline-success">Đổi mật khẩu</button>
            </form>
          </div>
        </div>
      </div>