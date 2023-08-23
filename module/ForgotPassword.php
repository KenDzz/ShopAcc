<?php 
    include_once("$_SERVER[DOCUMENT_ROOT]/Controller/forgotpass.class.php");
    if (isset($_POST["loginForgot"])) {
      if (isset($_POST["Email"]) && isset($_POST["username"])) {
            $email = addslashes($_POST["Email"]);
            $user = addslashes($_POST["username"]);
            $forgotpass->send_mail($email,$user);
      }
    } 
?>
<div class="login-form">
  <form method="POST">
    <p class="h4 title-login">Quên mật khẩu</p>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" name="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập Email" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Tài Khoản</label>
      <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Tài khoản" required>
    </div>
    <div class="alert alert-danger text-center" role="alert">
        Vui lòng điền đầy đủ thông tin! 
    </div>
    <button type="submit" name="loginForgot" id="login" class="btn btn-outline-success mb-4">Lấy lại mật khẩu</button>
  </form>
</div>