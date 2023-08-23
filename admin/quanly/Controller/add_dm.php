<?php
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.class.php");
	class func_add
	{
		public function add_Account_Game($id_info,$id_LG,$user_account,$pass_account)
		{
			$alert = new alert_func();
			$db = connectDB();
			$stmt = $db->prepare("INSERT INTO `shop_nick_game`(`idinfo`, `idLG`, `user`, `password`) VALUES (:id_info,:id_LG,:user_account,:pass_account)");
			$stmt->bindParam("id_info", $id_info, PDO::PARAM_STR);
			$stmt->bindParam("id_LG", $id_LG, PDO::PARAM_STR);
			$stmt->bindParam("user_account", $user_account, PDO::PARAM_STR);
			$stmt->bindParam("pass_account", $pass_account, PDO::PARAM_STR);
			$stmt->execute();
			$id = $db->lastInsertId();
			$count = $stmt->rowCount();
			if ($count > 0) {
				$msg = "Thêm tài khoản GAME thành công: ID: " .$id. "";
				$alert->alert_susses($msg);
			}
			else{
				$msg = "Thêm không thành công";
				$alert->alert_error($msg);
			}
			$db = null;
		}
		public function band_nick($user)
		{
			$alert = new alert_func();
			$db = connectDB();
			$stmtuser = $db->prepare("SELECT * FROM shop_user where user=:user");
			$stmtuser->bindParam("user", $user, PDO::PARAM_STR);
			$stmtuser->execute();
			$count_user = $stmtuser->rowCount();
			if ($count_user > 0) {
				$stmtstatus = $db->prepare("SELECT * FROM shop_user where user=:user AND status = '1'");
				$stmtstatus->bindParam("user", $user, PDO::PARAM_STR);
				$stmtstatus->execute();
				$count_status = $stmtstatus->rowCount();
				if ($count_status > 0) {
					$stmtmoney = $db->prepare("UPDATE shop_user set status = 2 where user=:user");
					$stmtmoney->bindParam("user", $user, PDO::PARAM_STR);
					$stmtmoney->execute();
					$msg1 = "Banned tài khoản ".htmlspecialchars($user)." thành công!";
					$alert->alert_susses($msg1);
				}
				else{
					$msg1 = "Tài khoản ".htmlspecialchars($user)." đã Banned Trước đó!";
					$alert->alert_error($msg1);
				}
			}
			else{
				$msg_check = "Tài khoản không tồn tại";
				$alert->alert_error($msg_check);
			}
		}

		public function open_nick($user)
		{
			$alert = new alert_func();
			$db = connectDB();
			$stmtuser = $db->prepare("SELECT * FROM shop_user where user=:user");
			$stmtuser->bindParam("user", $user, PDO::PARAM_STR);
			$stmtuser->execute();
			$count_user = $stmtuser->rowCount();
			if ($count_user > 0) {
				$stmtstatus = $db->prepare("SELECT * FROM shop_user where user=:user AND status = '2'");
				$stmtstatus->bindParam("user", $user, PDO::PARAM_STR);
				$stmtstatus->execute();
				$count_status = $stmtstatus->rowCount();
				if ($count_status > 0) {
					$stmtmoney = $db->prepare("UPDATE shop_user set status = 1 where user=:user");
					$stmtmoney->bindParam("user", $user, PDO::PARAM_STR);
					$stmtmoney->execute();
					$msg1 = "Mở tài khoản ".htmlspecialchars($user)." thành công!";
					$alert->alert_susses($msg1);
				}
				else{
					$msg1 = "Tài khoản ".htmlspecialchars($user)." đang ở trạng thái trực tuyến!";
					$alert->alert_error($msg1);
				}
			}
			else{
				$msg_check = "Tài khoản không tồn tại";
				$alert->alert_error($msg_check);
			}
		}

		public function naptien($user,$money,$type,$idUser,$CardName)
		{
			$alert = new alert_func();
			$db = connectDB();
			date_default_timezone_set("Asia/Bangkok");
			$datetime = date("m/d/Y G:i:s");
			$stmtuser = $db->prepare("SELECT * FROM shop_user where user=:user");
			$stmtuser->bindParam("user", $user, PDO::PARAM_STR);
			$stmtuser->execute();
			$count_user = $stmtuser->rowCount();
			if ($count_user > 0) {
				$stmtmoney = $db->prepare("UPDATE shop_user set money =:money + money where user=:user");
				$stmtmoney->bindParam("user", $user, PDO::PARAM_STR);
				$stmtmoney->bindParam("money", $money, PDO::PARAM_STR);
				$stmtmoney->execute();
				$stmtlogmoney = $db->prepare("INSERT INTO shop_log_payment(idUser, money, id_type_payment, idcard, sericard, datetime,type_card) VALUES (:id_log,:money_log,:type,'999999999','999999999',:datetime_log,:type_card_log)");
				$stmtlogmoney->bindParam("id_log", $idUser, PDO::PARAM_STR);
				$stmtlogmoney->bindParam("type", $type, PDO::PARAM_STR);
				$stmtlogmoney->bindParam("type_card_log", $CardName, PDO::PARAM_STR);
				$stmtlogmoney->bindParam("money_log", $money, PDO::PARAM_STR);
				$stmtlogmoney->bindParam("datetime_log", $datetime, PDO::PARAM_STR);
				$stmtlogmoney->execute();
				$msg1 = "Chúc mừng bạn đã nạp thành công! Mệnh giá " . htmlspecialchars(number_format($money, 0, '', ',')). " VNĐ";
				$alert->alert_susses($msg1);
			}
			else{
				$msg_check = "Tài khoản không tồn tại";
				$alert->alert_error($msg_check);
			}
			$db = null;
		}

		public function add_nick_game($loainick,$rank,$tuong,$skin,$ngoc,$rate,$discount,$user,$pass,$url_img_1,$url_img_2,$url_img_3,$url_img_4,$url_img_5,$content)
		{
			$alert = new alert_func();
			$db = connectDB();
			$stmt_nick = $db->prepare("INSERT INTO `shop_nick_info`(`idLG`, `rank`, `tuong`, `skin`, `trang_thai`, `bang_ngoc`, `rate`, `discount`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `content`) VALUES (:loainick,:rank,:tuong,:skin,'1',:ngoc,:rate,:discount,:url_img_1,:url_img_2,:url_img_3,:url_img_4,:url_img_5,:content)");
			$stmt_nick->bindParam("loainick", $loainick, PDO::PARAM_STR);
			$stmt_nick->bindParam("rank", $rank, PDO::PARAM_STR);
			$stmt_nick->bindParam("tuong", $tuong, PDO::PARAM_STR);
			$stmt_nick->bindParam("skin", $skin, PDO::PARAM_STR);
			$stmt_nick->bindParam("ngoc", $ngoc, PDO::PARAM_STR);
			$stmt_nick->bindParam("rate", $rate, PDO::PARAM_STR);
			$stmt_nick->bindParam("discount", $discount, PDO::PARAM_STR);
			$stmt_nick->bindParam("url_img_1", $url_img_1, PDO::PARAM_STR);
			$stmt_nick->bindParam("url_img_2", $url_img_2, PDO::PARAM_STR);
			$stmt_nick->bindParam("url_img_3", $url_img_3, PDO::PARAM_STR);
			$stmt_nick->bindParam("url_img_4", $url_img_4, PDO::PARAM_STR);
			$stmt_nick->bindParam("url_img_5", $url_img_5, PDO::PARAM_STR);
			$stmt_nick->bindParam("content", $content, PDO::PARAM_STR);
			$stmt_nick->execute();
			$idinfo = $db->lastInsertId();
			$count = $stmt_nick->rowCount();
			if ($count > 0) {
					$stmt_nick_1 = $db->prepare("INSERT INTO `shop_nick_game`(`idinfo`, `idLG`, `user`, `password`) VALUES (:idinfo,:loainick,:user,:pass)");
					$stmt_nick_1->bindParam("idinfo", $idinfo, PDO::PARAM_STR);
					$stmt_nick_1->bindParam("loainick", $loainick, PDO::PARAM_STR);
					$stmt_nick_1->bindParam("user", $user, PDO::PARAM_STR);
					$stmt_nick_1->bindParam("pass", $pass, PDO::PARAM_STR);
					$stmt_nick_1->execute();
					$count1 = $stmt_nick_1->rowCount();
					if ($count1 > 0) {
						$alert->alert_susses("Thêm thành công!");
					}
			}
			$db = null;
		}
		public function add_danhmuc($safe_danhmuc, $safe_name, $safe_url, $safe_img)
		{
			$alert = new alert_func();
			$db = connectDB();
			switch ($safe_danhmuc) { 
				case '2':
					$stmt = $db->prepare("INSERT INTO shop_category(name,url,image) VALUES (:safe_name,:safe_url,:safe_img)");
					$stmt->bindParam("safe_name", $safe_name, PDO::PARAM_STR);
					$stmt->bindParam("safe_url", $safe_url, PDO::PARAM_STR);
					$stmt->bindParam("safe_img", $safe_img, PDO::PARAM_STR);
					$stmt->execute();
					$count = $stmt->rowCount();
					if ($count > 0) {
						$msg = "Thêm mục nổi bật thành công: Tên: " .$safe_name. " Địa chỉ url: " .$safe_url." Url img: ".$safe_img;
						$alert->alert_susses($msg);
					}
					else{
						$msg = "Thêm không thành công";
						$alert->alert_error($msg);
					}
					$db = null;
				break;
				case '3':
					$stmt = $db->prepare("INSERT INTO shop_list_game(name,url,image) VALUES (:safe_name,:safe_url,:safe_img)");
					$stmt->bindParam("safe_name", $safe_name, PDO::PARAM_STR);
					$stmt->bindParam("safe_url", $safe_url, PDO::PARAM_STR);
					$stmt->bindParam("safe_img", $safe_img, PDO::PARAM_STR);
					$stmt->execute();
					$count = $stmt->rowCount();
					if ($count > 0) {
						$msg = "Thêm mục game thành công: Tên: " .$safe_name. " Địa chỉ url: " .$safe_url." Url img: ".$safe_img;
						$alert->alert_susses($msg);
					}
					else{
						$msg = "Thêm không thành công";
						$alert->alert_error($msg);
					}
					$db = null;
				break;
				case '4':
					$stmt = $db->prepare("INSERT INTO shop_list_luckey_wheel(name,url,image) VALUES (:safe_name,:safe_url,:safe_img)");
					$stmt->bindParam("safe_name", $safe_name, PDO::PARAM_STR);
					$stmt->bindParam("safe_url", $safe_url, PDO::PARAM_STR);
					$stmt->bindParam("safe_img", $safe_img, PDO::PARAM_STR);
					$stmt->execute();
					$count = $stmt->rowCount();
					if ($count > 0) {
						$msg = "Thêm mục vòng quay may mắn thành công: Tên: " .$safe_name. " Địa chỉ url: " .$safe_url." Url img: ".$safe_img;
						$alert->alert_susses($msg);
					}
					else{
						$msg = "Thêm không thành công";
						$alert->alert_error($msg);
					}
					$db = null;
				break;
			}
		}

		public function upload_file($file)
		{
			$alert = new alert_func();
			$url_img = null;
			if(isset($file) && $file["error"] == 0){
				$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
				$arrayVar = explode(".",$file["name"]);
				$extension = end($arrayVar);
				$filename = time() . '_' . rand(1000, 999999) . '.' . $extension;
				$filetype = $file["type"];
				$filesize = $file["size"];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if(!array_key_exists($ext, $allowed)){
					$msg1 = "Lỗi : Vui lòng chọn đúng định dang file";
					$alert->alert_error($msg1);
				}
				$maxsize = 5 * 1024 * 1024;
				if($filesize > $maxsize){
					$msg2 = "Lỗi : Kích thước file lớn hơn giới hạn cho phép";
					$alert->alert_error($msg2);
				}

				if(in_array($filetype, $allowed)){
					if(file_exists("../../img/" . $filename)){
						$msg3 = $filename . " đã tồn tại";
						$alert->alert_error($msg3);
					} else{
						move_uploaded_file($file["tmp_name"], "../../img/" . $filename);
						$url_img = "img/". $filename;
					} 
				} else{
					$msg4 =  "Lỗi : Có vấn đề xảy ra khi upload file"; 
					$alert->alert_error($msg4);
				}
			} else{
				$msg5 = "Lỗi: " . $file["error"];
				$alert->alert_error($msg5);
			}
			return $url_img;
		}
	}

	?>