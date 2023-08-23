<?php 
	/**
	 * dev by KenDzz
	 * https://www.facebook.com/Rin.Boss.Rin/
	 */
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.class.php");
	class detele_func
	{
		public function del_account_game($id)
		{
			$alert = new alert_func();
			$db = connectDB();
			$view = new view_func();
			$stmt = $db->prepare("DELETE FROM shop_nick_game WHERE id =:id_del");
			$stmt->bindParam("id_del", $id, PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {
				$msg = "Xóa thành công tài khoản ID: ".$id."";
				$alert->alert_susses($msg);
			}
			else{
				$msg = "Xóa không thành công tài khoản ID : ".$id. "";
				$alert->alert_error($msg);
			}
			$db = null;
		}
		public function del_user($id)
		{
			$alert = new alert_func();
			$db = connectDB();
			$view = new view_func();
			$stmt = $db->prepare("DELETE FROM shop_user WHERE id =:id_del");
			$stmt->bindParam("id_del", $id, PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {
				$msg = "Xóa thành công tài khoản ID: ".$id."";
				$alert->alert_susses($msg);
			}
			else{
				$msg = "Xóa không thành công tài khoản ID : ".$id. "";
				$alert->alert_error($msg);
			}
			$db = null;
		}
		
		public function delete_danhmuc($id,$id_NB)
		{
			$alert = new alert_func();
			$db = connectDB();
			switch ($id_NB) {
				case '1':
					$stmt = $db->prepare("DELETE FROM shop_category WHERE id =:id_del");
					$stmt->bindParam("id_del", $id, PDO::PARAM_STR);
					$stmt->execute();
					$count = $stmt->rowCount();
					if ($count) {
						$msg = "Xóa thành công id: ".$id." Mục Nổi Bật";
						$alert->alert_susses($msg);
					}
					else{
						$msg = "Xóa không thành công id: ".$id. " Mục Nổi Bật";
						$alert->alert_error($msg);
					}
					break;
				
				case '2':
					$stmt = $db->prepare("DELETE FROM shop_list_game WHERE idLG =:id_del");
					$stmt->bindParam("id_del", $id, PDO::PARAM_STR);
					$stmt->execute();
					$count = $stmt->rowCount();
					if ($count) {
						$msg = "Xóa thành công id: ".$id." Mục List Game";
						$alert->alert_susses($msg);
					}
					else{
						$msg = "Xóa không thành công id: ".$id." Mục List Game";
						$alert->alert_error($msg);
					}
					break;
				case '3':
					$stmt = $db->prepare("DELETE FROM shop_list_luckey_wheel WHERE idLuckey =:id_del");
					$stmt->bindParam("id_del", $id, PDO::PARAM_STR);
					$stmt->execute();
					$count = $stmt->rowCount();
					if ($count) {
						$msg = "Xóa thành công id: ".$id." Mục Vòng Quay";
						$alert->alert_susses($msg);
					}
					else{
						$msg = "Xóa không thành công id: ".$id." Mục Vòng Quay";
						$alert->alert_error($msg);
					}
					break;
			}
		}
	}

 ?>