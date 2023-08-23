<?php 
  if (isset($_POST["email"]) && isset($_POST["sdt"]) && isset($_POST["password"])) {
      $email = addslashes($_POST["email"]);
      $sdt = addslashes($_POST["sdt"]);
      $password = addslashes($_POST["password"]);
      $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
      $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
      if ($email_check == 1 && $password_check == 1) {
        if (strlen($sdt) == 10 || strlen($sdt) == 9 && is_numeric($sdt) == 1) {
            $sdt_check = $sdt;
            $user->change_info($username,$email,$sdt,$password);
        }
        else{
          $alert->alert_error("Số điện thoại không hợp lệ");
        }
      }
      else{
        $alert->alert_error("Thông tin không hợp lệ!");
      }

  }
?>
<div class="col-md-8">
  <div class="card mb-3">
    <div class="card-body">
      <form method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" name="email" value="<?php echo htmlspecialchars($user->email($username)); ?>" class="form-control shadow-sm bg-white rounded" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Số điện thoại</label>
          <input type="text" name="sdt" value="<?php echo htmlspecialchars($user->sdt($username)); ?>" class="form-control shadow-sm bg-white rounded" pattern=".{9,10}" required title="Số điện thoại chỉ cho phép 9 hoặc 10 số">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Nhập mật khẩu</label>
          <input type="password" name="password" class="form-control shadow-sm bg-white rounded" pattern=".{6,}" required title="Mật khẩu phải tối thiểu 6 ký tự">
          <span class="badge badge-info">Mật khẩu phải có 6 ký tự trở lên! </span>
        </div>
        <button type="submit" class="btn btn-outline-success">Lưu thông tin</button>
      </form>
    </div>
  </div>
</div>