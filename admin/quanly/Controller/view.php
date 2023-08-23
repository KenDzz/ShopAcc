<?php 
	/**
	 * Dev by KenDzz
	 */
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.class.php");
	include_once("pagination.class.php");
	class view_func
	{
		public function get_account_game()
		{
			$perPage = new PerPage();
			$sql = "SELECT * FROM shop_nick_game"; 
      		$faq = $perPage->runQuery($sql);
      		return $faq;
      		$db = null;
		}
		public function get_idLG_Nick($id)
		{
			$perPage = new PerPage();
			$sql = "SELECT * FROM shop_nick_info WHERE id = ".$id.""; 
      		$faq = $perPage->runQuery($sql);
      		return  $faq;
      		$db = null;
		}
		public function get_history_buy()
		{
			$perPage = new PerPage();
			$sql = "SELECT * FROM shop_log_buy"; 
      		$faq = $perPage->runQuery($sql);
      		return $faq;
      		$db = null;
		}
		public function get_history_payment()
		{
			$perPage = new PerPage();
			$sql1 = "SELECT * FROM shop_log_payment"; 
      		$faq1 = $perPage->runQuery($sql1);
      		return $faq1;
      		$db = null;
		}
		public function exportDatabase($productResult) {
	        $timestamp = time();
	        $filename = 'Export_excel_Shopacc_DevByKenDzz_' . $timestamp . '.xls';
	       	header("Content-type: application/vnd.ms-excel");
	        header("Content-Disposition: attachment; filename=".$filename);
	        $isPrintHeader = false;
	        foreach ($productResult as $row) {
	            if (! $isPrintHeader) {
	                echo implode("\t", array_keys($row)) . "\n";
	                $isPrintHeader = true;
	            }
	            echo implode("\t", array_values($row)) . "\n";
	        }
	        exit();
	    }
		public function show_config()
		{
			$db = connectDB();
			$stmt = $db->prepare("SELECT * FROM shop_config");
			$stmt->execute();
			$category = $stmt->fetchAll();
			foreach($category as $key => $value) :
				if ($value['name'] == "logo") {
					echo "  <div class='col-sm-3'>
			                  <div class='form-group'>
			                    <div class='fileinput fileinput-new text-center' data-provides='fileinput'>
			                    <div class='fileinput-preview fileinput-exists thumbnail></div>
			                      <div class='fileinput-new thumbnail img-circle'>
			                          <img src='../../".$value['content']."' class='h-25'>
			                          <input type='hidden' class='form-control' id='user' name='".$value["name"]."' value='".$value["content"]."'>
			                        </div>
			                      <div>
			                        <span class='btn btn-rose btn-round btn-file'>
			                          <span class='fileinput-new'>Chọn Logo Mới</span>
			                          <span class='fileinput-exists'>Change</span>
			                          <input type='file' class='inputFileHidden' name='file_upload_logo' id='file_upload_logo'>
			                        </span>
			                        <a href='#pablo' class='btn btn-danger btn-round fileinput-exists' data-dismiss='fileinput'><i class='fa fa-times'></i> Remove</a>
			                      </div>
			                    </div>
			                  </div>
			                </div>";
					}else{
				echo " <div class='col-sm-3'>
		                  <div class='form-group'>
		                    <label class='bmd-label-floating'>".$value["name"]."</label>
		                    <input type='text' class='form-control' id='user' name='".$value["name"]."' value='".$value["content"]."' required'>
		                  </div>
		               </div>";
		          }
			endforeach;
		    $db = null;
		}

		public function show_footer()
		{
			$db = connectDB();
			$stmt = $db->prepare("SELECT * FROM shop_footer");
			$stmt->execute();
			$category = $stmt->fetchAll();
			foreach($category as $key => $value) :

				echo " <div class='col-sm-3'>
		                  <div class='form-group'>
		                    <label class='bmd-label-floating'>".$value["name"]."</label>
		                    <input type='text' class='form-control' id='user' name='".$value["name"]."' value='".$value["content"]."' required'>
		                  </div>
		               </div>";
			endforeach;
		    $db = null;
		}
		public function show_update_acc_game($id)
		{
			$db = connectDB();
			$stmt = $db->prepare("SELECT * FROM shop_nick_game WHERE id=:id");
			$stmt->bindParam("id", $id, PDO::PARAM_STR);
			$stmt->execute();
			$category = $stmt->fetchAll();
			foreach($category as $key => $value) :
			echo "<div class='card card-profile'>
			<form method='POST'>
            <div class='card-header card-header-primary'>
              <h4 class='card-title text-center'>Chỉnh sửa tài khoản</h4>
            </div>
            <div class='card-body'>
              <div class='row'>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>ID</label>
                    <input type='text' class='form-control' id='user' name='id' value='".$value["id"]."' disabled>
                    <input type='hidden' class='form-control' id='user' name='id_hidden' value='".$value["id"]."'>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>ID INFO</label>
                    <input type='text' class='form-control' id='id_info' name='id_info' value='".$value["idinfo"]."' required='true' minLength='6'>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>ID LOẠI GAME</label>
                    <input type='text' class='form-control' id='id_LG' name='id_LG' value='".$value["idLG"]."' required='true'>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>USER</label>
                    <input type='text' class='form-control' id='user_account' name='user_account' value='".$value["user"]."' required='true'>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>PASSWORD</label>
                    <input type='text' class='form-control' id='pass_account' name='pass_account' value='".$value["password"]."' email='true' required='true'>
                  </div>
                </div>
                <div class='col-sm-12'>
                <button type='submit' class='btn btn-primary pull-right' id='button_update_acc_game' name='button_update_acc_game'>Update</button>
              	</div>
            	</div>
            	</form>
        		</div>";
        	endforeach;
		    $db = null;
		}
		public function show_update_acc($user)
		{
			$db = connectDB();
			$stmt = $db->prepare("SELECT * FROM shop_user WHERE user=:user");
			$stmt->bindParam("user", $user, PDO::PARAM_STR);
			$stmt->execute();
			$category = $stmt->fetchAll();
			foreach($category as $key => $value) :
			echo "<div class='card card-profile'>
			<form method='POST'>
            <div class='card-header card-header-primary'>
              <h4 class='card-title text-center'>Chỉnh sửa tài khoản</h4>
            </div>
            <div class='card-body'>
              <div class='row'>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>ID</label>
                    <input type='text' class='form-control' id='user' name='id' value='".$value["id"]."' disabled>
                    <input type='hidden' class='form-control' id='user' name='id_hidden' value='".$value["id"]."'>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>User</label>
                    <input type='text' class='form-control' id='user' name='user' value='".$value["user"]."' required='true' minLength='6'>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>Pass</label>
                    <input type='text' class='form-control' id='user' name='pass_user' value='".$value["pass"]."' required='true'>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>SĐT</label>
                    <input type='text' class='form-control' id='user' name='sdt_user' value='".$value["sdt"]."' required='true'>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>Email</label>
                    <input type='text' class='form-control' id='user' name='email_user' value='".$value["email"]."' email='true' required='true'>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>Money</label>
                    <input type='text' class='form-control' id='user' name='money_user' value='".$value["money"]."' disabled>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>Status</label>
                    <input type='text' class='form-control' id='user' name='status_user' value='".$value["status"]."' disabled>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>verified</label>
                    <input type='text' class='form-control' id='user' name='verified_user' value='".$value["verified"]."' disabled>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>verification_code</label>
                    <input type='text' class='form-control' id='user' name='verification_code_user' value='".$value["verification_code"]."' disabled>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>oauth_provider</label>
                    <input type='text' class='form-control' id='user' name='oauth_provider_user' value='".$value["oauth_provider"]."'>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>oauth_token</label>
                    <input type='text' class='form-control' id='user' name='oauth_token_user' value='".$value["oauth_token"]."'>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>oauth_name</label>
                    <input type='text' class='form-control' id='user' name='oauth_name_user' value='".$value["oauth_name"]."'>
                  </div>
                </div>
                <button type='submit' class='btn btn-primary pull-right' id='button_open' name='button_update_nick'>Update</button>
              	</div>
            	</div>
            	</form>
        		</div>";
        	endforeach;
		    $db = null;
		}
		public function show_type_payment()
		{
			$db = connectDB();
			$stmt = $db->prepare("SELECT * FROM shop_type_payment");
			$stmt->execute();
			$category = $stmt->fetchAll();
			foreach($category as $key => $value) :
	        	echo "<option value='".htmlspecialchars($value['id'])."'>".htmlspecialchars($value['type'])."</option>";
		    endforeach;
		    $db = null;
		}
		public function show_nick_info()
		{
			$db = connectDB();
			$stmt = $db->prepare("SELECT * FROM `shop_nick_info` WHERE id NOT IN (SELECT shop_nick_info.id FROM shop_nick_info INNER JOIN shop_nick_game ON shop_nick_info.id = shop_nick_game.idinfo)");
			$stmt->execute();
			$category = $stmt->fetchAll();
			foreach($category as $key => $value) :
	        	echo "<option value='".htmlspecialchars($value['id'])."'>".htmlspecialchars($value['id'])."(".$this->getlg($value['idLG']).")</option>";
		    endforeach;
		    $db = null;
		}
		public function show_List_Game()
		{
			$db = connectDB();
			$stmt = $db->prepare("SELECT * FROM shop_list_game");
			$stmt->execute();
			$category = $stmt->fetchAll();
			foreach($category as $key => $value) :
	        	echo "<option value='".htmlspecialchars($value['idLG'])."'>".htmlspecialchars($value['name'])."</option>";
		    endforeach;
		    $db = null;
		}
		public function getuser($idUser)
		{
			$db = connectDB();
			$stmtuser = $db->prepare("SELECT * FROM shop_user where id=:id");
			$stmtuser->bindParam("id", $idUser, PDO::PARAM_STR);
			$stmtuser->execute();
			$user = $stmtuser->fetch(PDO::FETCH_OBJ);
			$count = $stmtuser->rowCount();
			if ($count > 0) {
				$username = $user->user;
			}else{
				$username = "Tài khoản không tồn tại hoặc đã bị xóa!";
			}
			return $username;
			$db = null;
		}

		public function gettypepayment($id)
		{
			$db = connectDB();
			$stmttype = $db->prepare("SELECT * FROM shop_type_payment where id=:id");
			$stmttype->bindParam("id", $id, PDO::PARAM_STR);
			$stmttype->execute();
			$user = $stmttype->fetch(PDO::FETCH_OBJ);
			$count = $stmttype->rowCount();
			if ($count > 0) {
				$type = $user->type;
			}else{
				$type = "Loại thanh toán không tồn tại!";
			}
			return $type;
			$db = null;
		}

		public function getid($user)
		{
			$db = connectDB();
			$stmtuser = $db->prepare("SELECT * FROM shop_user where user=:user");
			$stmtuser->bindParam('user', $user, PDO::PARAM_STR);
			$stmtuser->execute();
			$user = $stmtuser->fetch(PDO::FETCH_OBJ);
			$count = $stmtuser->rowCount();
			if ($count > 0) {
				$getid = $user->id;
			}else{
				$getid = "Tài khoản không tồn tại hoặc đã bị xóa!";
			}
			return $getid;
			$db = null;
		}
		public function getlg($idLG)
		{
			$db = connectDB();
			$stmtlg = $db->prepare("SELECT * FROM shop_list_game where idLG=:id");
			$stmtlg->bindParam("id", $idLG, PDO::PARAM_STR);
			$stmtlg->execute();
			$lg = $stmtlg->fetch(PDO::FETCH_OBJ);
			$count = $stmtlg->rowCount();
			if ($count > 0) {
				$namelg = $lg->name;
			}else{
				$namelg = "List game không tồn tại!";
			}
			return $namelg;
			$db = null;
		}
		public function view_history_buy()
		{
			$db = connectDB();
			$stmt = $db->prepare("SELECT * FROM shop_log_buy");
			$stmt->execute();
			$category = $stmt->fetchAll();
			foreach($category as $key => $value) :
	        	echo "
	        	<tr>
                    <td class='text-center'><input type='hidden' name='id_history' value='".htmlspecialchars($value['id'])."'>".htmlspecialchars($value['id'])."</td>
                    <td class='text-center'><input type='hidden' name='id_history' value='".htmlspecialchars($value['idnick'])."'>".htmlspecialchars($value['idnick'])."</td>
                        <td ><input type='hidden' name='name_history' value='".htmlspecialchars($this->getuser($value['idUser']))."'>".htmlspecialchars($this->getuser($value['idUser']))."</td>
                        <td ><input type='hidden' name='img_noibat' value='".htmlspecialchars($this->getlg($value['idLG']))."'>".htmlspecialchars($this->getlg($value['idLG']))."</td>
                        <td ><input type='hidden' name='url_noibat' value='".htmlspecialchars($value['price'])."'>".htmlspecialchars(number_format($value['price'], 0, '', ','))." VND</td>
                        <td ><input type='hidden' name='date_noibat' value='".htmlspecialchars($value['datetime'])."'>".htmlspecialchars($value['datetime'])."</td>
                      </tr>";
		    endforeach;
		    $db = null;
		}
		public function view_select_LG()
		{
			$db = connectDB();
			$stmtlg = $db->prepare("SELECT * FROM shop_list_game");
			$stmtlg->execute();
			$category = $stmtlg->fetchAll();
			foreach($category as $key => $value) :
	        	echo "<option value='".htmlspecialchars($value["idLG"])."'>".htmlspecialchars($value["name"])."</option>";
		    endforeach;
		    $db = null;
		}
		public function view_danhmuc()
		{
			$db = connectDB();
			$stmt = $db->prepare("SELECT * FROM shop_category");
			$stmt->execute();
			$category = $stmt->fetchAll();
			foreach($category as $key => $value) :
	        	echo "
	        	<form method='POST'>
	        	<tr>
                        <td class='text-center'><input type='hidden' name='id_noibat' value='".htmlspecialchars($value['id'])."'>".htmlspecialchars($value['id'])."</td>
                        <td ><input type='hidden' name='name_noibat' value='".htmlspecialchars($value['name'])."'>".htmlspecialchars($value['name'])."</td>
                        <td ><input type='hidden' name='img_noibat' value='".htmlspecialchars($value['image'])."'>".htmlspecialchars($value['image'])."</td>
                        <td ><input type='hidden' name='url_noibat' value='".htmlspecialchars($value['url'])."'>".htmlspecialchars($value['url'])."</td>
                        <td class='td-actions text-right'>
                          <button type='submit' rel='tooltip' class='btn btn-success' name='edit_noibat'>
                            <i class='material-icons'>edit</i>
                          </button>
                          <button type='submit' rel='tooltip' class='btn btn-danger' name='delete_noibat'>
                            <i class='material-icons'>close</i>
                          </button>
                        </td>
                      </tr>
                      </form>";
		    endforeach;
		    $db = null;
		}

		public function view_listgame()
		{
			$db = connectDB();
			$stmt = $db->prepare("SELECT * FROM shop_list_game");
			$stmt->execute();
			$category = $stmt->fetchAll();
			foreach($category as $key => $value) :
	        	echo "
	        		<form method='POST'>
	        		<tr>
                        <td class='text-center'><input type='hidden' name='id_LG' value='".htmlspecialchars($value['idLG'])."'>".htmlspecialchars($value['idLG'])."</td>
                        <td><input type='hidden' name='name_LG' value='".htmlspecialchars($value['name'])."'>".htmlspecialchars($value['name'])."</td>
                        <td><input type='hidden' name='img_LG' value='".htmlspecialchars($value['image'])."'>".htmlspecialchars($value['image'])."</td>
                        <td><input type='hidden' name='url_LG' value='".htmlspecialchars($value['url'])."'>".htmlspecialchars($value['url'])."</td>
                        <td class='td-actions text-right'>
                          <button type='submit' rel='tooltip' class='btn btn-success' name='edit_listgame'>
                            <i class='material-icons'>edit</i>
                          </button>
                          <button type='submit' rel='tooltip' class='btn btn-danger' name='delete_listgame'>
                            <i class='material-icons'>close</i>
                          </button>
                        </td>
                      </tr>
                      </form>";
		    endforeach;
		    $db = null;
		}

		public function view_vongquaymayman()
		{
			$db = connectDB();
			$stmt = $db->prepare("SELECT * FROM shop_list_luckey_wheel");
			$stmt->execute();
			$category = $stmt->fetchAll();
			foreach($category as $key => $value) :
	        	echo "
	        	<form method='POST'>
	        	<tr>
                        <td class='text-center'><input type='hidden' name='idLuckey' value='".htmlspecialchars($value['idLuckey'])."'>".htmlspecialchars($value['idLuckey'])."</td>
                        <td><input type='hidden' name='name_Luckey' value='".htmlspecialchars($value['name'])."'>".htmlspecialchars($value['name'])."</td>
                        <td><input type='hidden' name='img_Luckey' value='".htmlspecialchars($value['image'])."'>".htmlspecialchars($value['image'])."</td>
                        <td><input type='hidden' name='url_Luckey' value='".htmlspecialchars($value['url'])."'>".htmlspecialchars($value['url'])."</td>
                        <td class='td-actions text-right'>
                          <button type='submit' rel='tooltip' class='btn btn-success' name='edit_luckey'>
                            <i class='material-icons'>edit</i>
                          </button>
                          <button type='submit' rel='tooltip' class='btn btn-danger' name='delete_luckey'>
                            <i class='material-icons'>close</i>
                          </button>
                        </td>
                      </tr>
                      </form>";
		    endforeach;
		    $db = null;
		}
	}

 ?>