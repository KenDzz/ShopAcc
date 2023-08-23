<?php 

	/**
	 * Dev By KenDzz
	 */
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.class.php");
	class dashboard_Class
	{
		public function total_nick()
		{
			$db = connectDB();
			$stmtcount = $db->prepare("SELECT count(*) as count FROM shop_nick_info");
			$stmtcount->execute();
			$count = $stmtcount->fetch(PDO::FETCH_OBJ);
			$getresult = $count->count;
			return $getresult;
		}

		public function total_nick_tra_gop()
		{
			$db = connectDB();
			$stmtcount = $db->prepare("SELECT count(*) as count FROM shop_nick_info WHERE trang_thai = '2'");
			$stmtcount->execute();
			$count = $stmtcount->fetch(PDO::FETCH_OBJ);
			$getresult = $count->count;
			return $getresult;
		}

		public function total_nick_buy()
		{
			$db = connectDB();
			$stmtcount1 = $db->prepare("SELECT count(*) as count FROM shop_nick_info WHERE trang_thai = '3'");
			$stmtcount1->execute();
			$count1 = $stmtcount1->fetch(PDO::FETCH_OBJ);
			$getresult1 = $count1->count;
			return $getresult1;
		}
		public function total_nick_acc($idLG)
		{
			$db = connectDB();
			$stmtcount2 = $db->prepare("SELECT count(*) as count FROM shop_nick_info WHERE idLG = :id");
			$stmtcount2->bindParam("id", $idLG, PDO::PARAM_STR);
			$stmtcount2->execute();
			$count2 = $stmtcount2->fetch(PDO::FETCH_OBJ);
			$getresult2 = $count2->count;
			return $getresult2;
		}
		public function show_list_game()
		{
			$db = connectDB();
			$stmt = $db->prepare("SELECT * FROM shop_list_game");
			$stmt->execute();
			$category = $stmt->fetchAll();
			foreach($category as $key => $value) :
				echo "<div class='col-lg-3 col-md-6 col-sm-6'>
		          <div class='card card-stats'>
		            <div class='card-header card-header-danger card-header-icon'>
		              <div class='card-icon'>
		                <i class='material-icons'>store</i>
		              </div>
		              <p class='card-category'>Tài khoản ".htmlspecialchars($value['name'])."</p>
		              <h3 class='card-title'>".htmlspecialchars($this->total_nick_acc($value['idLG']))." <small>Tài khoản</small></h3>
		              <h3 class='card-title'>".htmlspecialchars($this->total_nick_buy_acc($value['idLG']))." <small>Đã bán Tài khoản</small></h3>
		              <h3 class='card-title'>".htmlspecialchars($this->total_nick_not_buy_acc($value['idLG']))." <small>Tài khoản chưa bán</small></h3>
		              <h3 class='card-title'>".htmlspecialchars($this->total_nick_tragop_acc($value['idLG']))." <small>Tài khoản đang trả góp</small></h3>
		            </div>
		          </div>
		        </div>";
			endforeach;	
		}
		public function total_nick_buy_acc($idLG)
		{
			$db = connectDB();
			$stmtcount3 = $db->prepare("SELECT count(*) as count FROM shop_nick_info WHERE idLG = :id AND trang_thai = '3'");
			$stmtcount3->bindParam("id", $idLG, PDO::PARAM_STR);
			$stmtcount3->execute();
			$count3 = $stmtcount3->fetch(PDO::FETCH_OBJ);
			$getresult3 = $count3->count;
			return $getresult3;
		}
		public function total_nick_tragop_acc($idLG)
		{
			$db = connectDB();
			$stmtcount8 = $db->prepare("SELECT count(*) as count FROM shop_nick_info WHERE idLG = :id AND trang_thai = '2'");
			$stmtcount8->bindParam("id", $idLG, PDO::PARAM_STR);
			$stmtcount8->execute();
			$count8 = $stmtcount8->fetch(PDO::FETCH_OBJ);
			$getresult8 = $count8->count;
			return $getresult8;
		}
		public function total_nick_not_buy_acc($idLG)
		{
			$db = connectDB();
			$stmtcount4 = $db->prepare("SELECT count(*) as count FROM shop_nick_info WHERE idLG = :id AND trang_thai = '1'");
			$stmtcount4->bindParam("id", $idLG, PDO::PARAM_STR);
			$stmtcount4->execute();
			$count4 = $stmtcount4->fetch(PDO::FETCH_OBJ);
			$getresult4 = $count4->count;
			return $getresult4;
		}
		public function count_nick()
		{
			$db = connectDB();
			$stmtcount5 = $db->prepare("SELECT count(*) as count FROM shop_user");
			$stmtcount5->execute();
			$count5 = $stmtcount5->fetch(PDO::FETCH_OBJ);
			$getresult5 = $count5->count;
			return $getresult5;
		}
		public function count_nick_money()
		{
			$db = connectDB();
			$stmtcount6 = $db->prepare("SELECT sum(money) as money FROM shop_user");
			$stmtcount6->execute();
			$count6 = $stmtcount6->fetch(PDO::FETCH_OBJ);
			$getresult6 = $count6->money;
			return $getresult6;
		}
		public function count_buy_nick()
		{
			$db = connectDB();
			$stmtcount7 = $db->prepare("SELECT sum(price) as price FROM shop_log_buy");
			$stmtcount7->execute();
			$count7 = $stmtcount7->fetch(PDO::FETCH_OBJ);
			$getresult7 = $count7->price;
			return $getresult7;
		}
	}


 ?>