<?php 
  include_once("$_SERVER[DOCUMENT_ROOT]/Controller/check.class.php");
  include_once("$_SERVER[DOCUMENT_ROOT]/facebook/fb-config.php");
  include_once("$_SERVER[DOCUMENT_ROOT]/Controller/login_facebook.class.php");

  $login = new check_login();
  $permissions = array('email'); // Optional permissions
  $url = BASE_URL;
  $loginUrl = $helper->getLoginUrl($url.'/facebook/fb-callback.php', $permissions);
    // Check if $_SESSION or $_COOKIE already set
  if(isset($_SESSION['username']) || isset($_COOKIE['rememberme'])){
     $url = BASE_URL;
      header("Location: $url", true, 303);
     exit;
  }

  if (isset($_SESSION['fbUserId']) && isset($_SESSION['fbUserName']) && isset($_SESSION['fbAccessToken'])) {
      $id_facebook    = $_SESSION['fbUserId'];
      $name_facebook    = $_SESSION['fbUserName'];
      $token_facebook = $_SESSION['fbAccessToken'];
      $facebook = new Facebook_Class();
      $facebook->login_facebook($id_facebook,$name_facebook,$token_facebook);
  }

  if (isset($_POST['loginSubmit'])) {
    if (isset($_POST['usernameEmail']) && isset($_POST['password'])) {
      if (isset($_POST['rememberme'])) {
          $rememberme = $_POST['rememberme'];
      }else{
          $rememberme = 0;
      }
      $usernameEmail = $_POST['usernameEmail'];
      $password = $_POST['password'];
      $login->login($usernameEmail,$password,$rememberme);
    }
    else{
      $alert->alert_error("Vui lòng nhập đầy đủ thông tin!"); 
    }
  }
?>
<div class="login-form">
  <form method="POST">
    <p class="h4 title-login">Đăng Nhập Hệ Thống</p>
    <div class="form-group">
      <label for="exampleInputEmail1">Tài khoản</label>
      <input type="username" name="usernameEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tài khoản hoặc email" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mật khẩu</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu" pattern=".{6,}" required title="Mật khẩu phải tối thiểu 6 ký tự">
    </div>
    <div class="error-login">
      <span class="text-danger"><?php if (!empty($error_check_login)) {
        echo $error_check_login;
      }?></span>
    </div>
    <div class="form-group form-check mt-2">
      <div class="row">
        <div class="col text-center">
          <a href="?page=ForgotPassword" class="reset-pass">Quên mật khẩu?</a>
        </div>
        <div class="col text-center">
          <input type="checkbox" name="rememberme" class="form-check-input" id="exampleCheck1" value="1">
          <label class="form-check-label" for="exampleCheck1">Ghi Nhớ</label>
        </div>
      </div>
    </div>
    <button type="submit" name="loginSubmit" id="login" class="btn btn-outline-success mb-4">Đăng nhập</button>
    <div class="login-network mt-2">
      <p class="h6 text-center">Hoặc đăng nhập với</p>
      <div class="row mb-3 mt-3">
        <div class="col">
          <a href="<?php echo htmlspecialchars($loginUrl); ?>" class="btn btn-primary">
            <i class="fab fa-facebook-f"></i>
            <span>
              Facebook
            </span>
          </a>
        </div>
        <div class="col">
          <a href="#" class="btn btn-danger">
            <i class="fab fa-google-plus-g"></i>
            <span>Google +</span>
          </a>
        </div>
      </div>    
    </div>
  </form>
</div>