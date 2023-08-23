<?php
    include("$_SERVER[DOCUMENT_ROOT]/Controller/user.class.php");
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        $user = new user_profile();
    }
    else{
        $url = BASE_URL . 'login';
        header("Location: $url");
    }  
?>
<div class="container mt-4">
  <div class="main-body">
    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="../img/unknown-avatar.jpg" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4><?php echo htmlspecialchars($user->account($username)); ?></h4>
                <p class="text-secondary mb-1"><?php echo htmlspecialchars($user->email($username)); ?></p>
                <p class="text-muted font-size-sm"><?php echo htmlspecialchars($user->money($username)); ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <a class="text-secondary" href="user">Thông tin tài khoản</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <a class="text-secondary" href="doi-mat-khau">Đổi mật khẩu</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <a class="text-secondary" href="doi-thong-tin">Chỉnh sửa Thông tin tài khoản</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <a class="text-secondary" href="lich-su-nap-the">Lịch sử nạp tiền thẻ cào</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <a class="text-secondary" href="lich-su-nap-tien-atm-momo">Lịch sử nạp tiền ATM/MOMO</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <a class="text-secondary" href="lich-su-mua-tai-khoan-game">Lịch sử mua tài khoản game</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <a class="text-secondary" href="tai-khoan-game-da-mua">Tài khoản game đã mua</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <a class="text-secondary" href="#">Tài khoản đang trả góp</a>
            </li>
          </ul>
        </div>
      </div>
      <?php
        if(!empty($_GET['form']) && file_exists("$_SERVER[DOCUMENT_ROOT]/module/user/".$_GET['form'].".php")){
          include "user/".$_GET['form'].".php";
        }
        else{
          include "user/profile.php";
        }
      ?>
    </div>
  </div>
</div>