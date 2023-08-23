<?php 
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	switch ($page) {
		case 'login':
			echo "Đăng nhập tài khoản";
		break;
		case 'register':
			echo "Đăng ký tài khoản";
		break;
		case 'ForgotPassword':
			echo "Quên mật khẩu";
		break;
		case 'user':
			if (isset($_GET['form'])) {
				$form = $_GET['form'];
				switch ($form) {
					case 'changepassword':
						echo "Thay đổi mật khẩu - Quản lý tài khoản";
						break;
					case 'changeinfo':
						echo "Thay đổi thông tin - Quản lý tài khoản";
						break;
					case 'paymentcard':
						echo "Lịch sử nạp thẻ - Quản lý tài khoản";
						break;
					case 'paymentatm':
						echo "Lịch sử nạp ATM/MOMO - Quản lý tài khoản";
						break;
					case 'naptien':
						echo "Nạp tiền - Quản lý tài khoản";
						break;
					case 'logbuyacc':
						echo "Lịch sử mua tài khoản game- Quản lý tài khoản";
						break;
					case 'logaccount':
						echo "Tài khoản game đã mua - Quản lý tài khoản";
						break;
				}
			}else{
				echo "Quản lý tài khoản";
			}
		break;
		case 'lien-minh':
			echo "Nick liên minh huyền thoại giá rẻ - Uy Tín - Chất lượng";
		break;
		default:
		echo $Func->title_website();
		break;
	}
}else{
	echo $Func->title_website();
}
?>