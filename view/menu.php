<?php 
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/check.class.php");
	$login = new check_login();
 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom introduce">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#"><i class="fab fa-facebook-square"></i></span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fab fa-twitch"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fab fa-discord"></i></a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0 hotline">
				<a href=""><i class="fas fa-phone-square-alt mr-sm-2 "></i></span></a>
				<span class="mr-sm-5">Liên hệ: <?php echo $Func->contact(); ?></span>
			</form>
		</div>
	</div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light menu">
	<div class="container">
		<a class="navbar-brand" href="<?php echo BASE_URL ?>">
			<img src="<?php echo $Func->logo_website(); ?>" width="30" height="30" alt="">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class = 'navbar-nav mr-auto'>
				<?php $Func->show_menu(); ?>
			</ul>
		</div> 
		<form class="form-inline my-2 my-lg-0">
			<?php
			if (isset($_SESSION["username"])) {
				?>
				<a href="user" class="btn btn-outline-success mr-sm-2 mt-2"><i class="fas fa-user mr-sm-2"></i><?php echo $_SESSION["username"]; echo " - "; $Func->money($_SESSION["username"]);?></a>
				<a href="nap-tien" class="btn btn-outline-success mr-sm-2 mt-2"><i class="fas fa-dollar-sign mr-sm-2"></i>Nạp tiền</a>
				<a href="logout" class="btn btn-outline-success mr-sm-2 mt-2"><i class="fas fa-sign-out-alt mr-sm-2"></i>Đăng Xuất</a>

			<?php 
				}else if(isset($_COOKIE['rememberme'] )){

				     // Decrypt cookie variable value
				     $username1 = $login->decryptCookie($_COOKIE['rememberme']);
				     echo $username1;
				     // Fetch records
				     $count = $login->check_user_cookie($username1);

				     if($count > 0 ){
				        $_SESSION['username'] = $username1; 
				          $url = BASE_URL;
				          header("Refresh:1; url=$url", true, 303);
				        exit;
						}
			 ?>
			 	<a href="user" class="btn btn-outline-success mr-sm-2 mt-2"><i class="fas fa-user mr-sm-2"></i><?php echo $_SESSION["username"]; echo " - "; $Func->money($_SESSION["username"]);?></a>
				<a href="nap-tien" class="btn btn-outline-success mr-sm-2 mt-2"><i class="fas fa-dollar-sign mr-sm-2"></i>Nạp tiền</a>
				<a href="logout" class="btn btn-outline-success mr-sm-2 mt-2"><i class="fas fa-sign-out-alt mr-sm-2"></i>Đăng Xuất</a>
				<?php
			}
			else{
				?>
				<a href="login" class="btn btn-outline-success mr-sm-2"><i class="fas fa-user mr-sm-2"></i>Đăng Nhập</a>
				<a href="register" class="btn btn-outline-success"><i class="fas fa-key mr-sm-2"></i>Đăng Ký</a>
				<?php 
			}  
			?>
		</form>
	</div>
</div>
</nav>