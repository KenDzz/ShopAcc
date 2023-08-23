<?php 
  include_once("$_SERVER[DOCUMENT_ROOT]/Controller/check-reg.class.php");
  if (!empty($_SESSION["username"])) {
    $url = BASE_URL;
    header("Location: $url");
  }
  if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re-password']) && isset($_POST['email']) && isset($_POST['sdt'])) {
      $username = addslashes($_POST['username']);
      $email = addslashes($_POST['email']);
      $password = addslashes($_POST['password']);
      $rePassword = addslashes($_POST['re-password']);
      $sdt = addslashes($_POST['sdt']);
      $reg = new register();
      $reg->check_reg($username,$email,$password,$rePassword,$sdt);
  }
?>
<div class="login-form">
  <form method="POST">
    <p class="h4 title-login">Đăng ký Hệ Thống</p>
    <div class="form-group">
      <label for="exampleInputUser1">Tài khoản</label>
      <input type="username" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tài khoản hoặc email" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mật khẩu</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu" pattern=".{6,}" required title="Mật khẩu phải tối thiểu 6 ký tự">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword2">Nhập lại mật khẩu</label>
      <input type="password" name="re-password" class="form-control" id="exampleInputEmail1" placeholder="Nhập lại mật khẩu" pattern=".{6,}" required title="Mật khẩu phải tối thiểu 6 ký tự">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label for="exampleInputnumberPhone1">Số điện thoại</label>
      <input type="sdt" name="sdt" class="form-control" id="exampleInputPassword1" placeholder="Số điện thoại" pattern=".{10,10}" required title="Số điện thoại chỉ có 10 số thôi!">
    </div>
    <div class="form-group">
      <div class="h-captcha" data-sitekey="b3691d2a-2c8e-4ab9-9a0f-b67ef8740406"></div>
    </div>
    <div class="error-login">
      <span class="text-danger"><?php if (!empty($error_check_reg)) { echo $error_check_reg;}?></span>
    </div>
    <div class="mb-2">
      <a href="login" class="btn btn-outline-danger">Đăng Nhập</a>
    </div>
    <button type="submit" name="loginSubmit" id="login" class="btn btn-outline-success mb-4 mt-2">Đăng ký</button>
  </form>
</div>