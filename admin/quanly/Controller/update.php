<?php 

	/**
	 * Dev by KenDzz
	 */
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.class.php");
	class update_Class
	{
		public	function Check_Valid_Md5_String($md5){
			if(empty($md5)){
				return false;
			}
			return preg_match('/^[a-f0-9]{32}$/', $md5);
		}


		public function update_Account_Game($id,$id_info,$id_LG,$user_account,$pass_account)
		{
			$alert = new alert_func();
			$db = connectDB();
			$stmt = $db->prepare("UPDATE `shop_nick_game` SET `idinfo`=:id_info,`idLG`=:id_LG,`user`=:user_account,`password`=:pass_account WHERE id = :id");
			$stmt->bindParam("id", $id, PDO::PARAM_STR);
			$stmt->bindParam("id_info", $id_info, PDO::PARAM_STR);
			$stmt->bindParam("id_LG", $id_LG, PDO::PARAM_STR);
			$stmt->bindParam("user_account", $user_account, PDO::PARAM_STR);
			$stmt->bindParam("pass_account", $pass_account, PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {
				$msg = "Cập nhật tài khoản GAME thành công: Tên: " .$id. "";
				$alert->alert_susses($msg);
			}
			else{
				$msg = "Cập nhật không thành công";
				$alert->alert_error($msg);
			}
			$db = null;
		}

		public function update_config($title,$contact,$address,$introduce,$url_img)
		{
			//mệt quá :( viết bừa vài hàm cho nó chạy sơ sơ :"(
			$alert = new alert_func();
			$db = connectDB();
			$stmt1 = $db->prepare("UPDATE `shop_config` SET content=:title WHERE name = 'title'");
			$stmt2 = $db->prepare("UPDATE `shop_config` SET content=:contact WHERE name = 'contact'");
			$stmt3 = $db->prepare("UPDATE `shop_footer` SET content=:address WHERE name = 'address'");
			$stmt4 = $db->prepare("UPDATE `shop_footer` SET content=:introduce WHERE name = 'introduce'");
			$stmt5 = $db->prepare("UPDATE `shop_config` SET content=:url_img WHERE name = 'logo'");
			$stmt1->bindParam("title", $title, PDO::PARAM_STR);
			$stmt2->bindParam("contact", $contact, PDO::PARAM_STR);
			$stmt3->bindParam("address", $address, PDO::PARAM_STR);
			$stmt4->bindParam("introduce", $introduce, PDO::PARAM_STR);
			$stmt5->bindParam("url_img", $url_img, PDO::PARAM_STR);
			$stmt1->execute();
			$stmt2->execute();
			$stmt3->execute();
			$stmt4->execute();
			$stmt5->execute();
			$count1 = $stmt1->rowCount();
			$count2 = $stmt2->rowCount();
			$count3 = $stmt3->rowCount();
			$count4 = $stmt4->rowCount();
			$count5 = $stmt5->rowCount();
			if ($count1 || $count2 || $count3 || $count4 || $count5 > 0) {
				$msg = "Cập nhật thành công!";
				$alert->alert_susses($msg);
			}
			else{
				$msg = "Cập nhật không thành công!";
				$alert->alert_error($msg);
			}
			$db = null;
		}

		public function veri_user($user,$veri_code)
		{
			$alert = new alert_func();
			$db = connectDB();
			$stmt = $db->prepare("UPDATE `shop_user` SET `verified`= 1,`verification_code`=:veri_code WHERE user = :user");
			$stmt->bindParam("user", $user, PDO::PARAM_STR);
			$stmt->bindParam("veri_code", $veri_code, PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {
				$msg = "Kích hoạt tài khoản thành công: Tên: " .$user. "";
				$alert->alert_susses($msg);
			}
			else{
				$msg = "Kích hoạt không thành công";
				$alert->alert_error($msg);
			}
			$db = null;
		}

		public function update_user($id,$user,$pass,$sdt,$email,$op_user,$ot_user,$on_user)
		{
			$alert = new alert_func();
			$db = connectDB();
			$stmt = $db->prepare("UPDATE `shop_user` SET `user`=:user,`pass`=:pass,`sdt`=:sdt,`email`=:email,`oauth_provider`=:op_user,`oauth_token`=:ot_user,`oauth_name`=:on_user WHERE id = :id");
			$stmt->bindParam("id", $id, PDO::PARAM_STR);
			$stmt->bindParam("user", $user, PDO::PARAM_STR);
			$stmt->bindParam("pass", $pass, PDO::PARAM_STR);
			$stmt->bindParam("sdt", $sdt, PDO::PARAM_STR);
			$stmt->bindParam("email", $email, PDO::PARAM_STR);
			$stmt->bindParam("op_user", $op_user, PDO::PARAM_STR);
			$stmt->bindParam("ot_user", $ot_user, PDO::PARAM_STR);
			$stmt->bindParam("on_user", $on_user, PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {
				$msg = "Cập nhật tài khoản thành công: Tên: " .$user. "";
				$alert->alert_susses($msg);
			}
			else{
				$msg = "Cập nhật không thành công";
				$alert->alert_error($msg);
			}
			$db = null;
		}

		public function Update_dm($id_dm_check, $id_dm, $name,$url,$url_img)
		{
			$alert = new alert_func();
			$db = connectDB();
			switch ($id_dm_check) {
				case '1':
					$stmt = $db->prepare("UPDATE `shop_category` SET `name`=:name,`url`=:url,`image`=:url_img WHERE id = :id");
					$stmt->bindParam("id", $id_dm, PDO::PARAM_STR);
					$stmt->bindParam("name", $name, PDO::PARAM_STR);
					$stmt->bindParam("url", $url, PDO::PARAM_STR);
					$stmt->bindParam("url_img", $url_img, PDO::PARAM_STR);
					$stmt->execute();
					$count = $stmt->rowCount();
					if ($count > 0) {
						$msg = "Cập nhật mục nổi bật thành công: Tên: " .$name. " Địa chỉ url: " .$url." Url img: ".$url_img;
						$alert->alert_susses($msg);
					}
					else{
						$msg = "Cập nhật không thành công";
						$alert->alert_error($msg);
					}
				break;
				case '2':
					$stmt = $db->prepare("UPDATE `shop_list_game` SET `name`=:name,`image`=:url_img,`url`=:url WHERE idLG = :id");
					$stmt->bindParam("id", $id_dm, PDO::PARAM_STR);
					$stmt->bindParam("name", $name, PDO::PARAM_STR);
					$stmt->bindParam("url", $url, PDO::PARAM_STR);
					$stmt->bindParam("url_img", $url_img, PDO::PARAM_STR);
					$stmt->execute();
					$count = $stmt->rowCount();
					if ($count > 0) {
						$msg = "Cập nhật mục game thành công: Tên: " .$name. " Địa chỉ url: " .$url." Url img: ".$url_img;
						$alert->alert_susses($msg);
					}
					else{
						$msg = "Cập nhật không thành công";
						$alert->alert_error($msg);
					}
				break;
				case '3':
					$stmt = $db->prepare("UPDATE `shop_list_luckey_wheel` SET `name`=:name,`image`=:url_img,`url`=:url WHERE idLuckey = :id");
					$stmt->bindParam("id", $id_dm, PDO::PARAM_STR);
					$stmt->bindParam("name", $name, PDO::PARAM_STR);
					$stmt->bindParam("url", $url, PDO::PARAM_STR);
					$stmt->bindParam("url_img", $url_img, PDO::PARAM_STR);
					$stmt->execute();
					$count = $stmt->rowCount();
					if ($count > 0) {
						$msg = "Cập nhật mục vòng quay may mắn thành công: Tên: " .$name. " Địa chỉ url: " .$url." Url img: ".$url_img;
						$alert->alert_susses($msg);
					}
					else{
						$msg = "Cập nhật không thành công";
						$alert->alert_error($msg);
					}
				break;
			}
			$db = null;
		}
		public function show_danhmuc_update($id_check,$id,$name,$img,$url)
		{
			switch ($id_check) {
				case '1':
					echo '<div class="card">
					          <div class="card-header card-header-primary">
					            <h4 class="card-title text-center">Cập nhật</h4>
					          </div>
					          <div class="card-body">
					            <form method="POST" enctype="multipart/form-data">
					              <div class="row">
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <label class="bmd-label-floating">DANH MỤC</label>
					                    <input type="text" class="form-control" name="danh-muc" value="Danh Mục Nổi Bật" disabled>
					                    <input type="hidden" name="id_dm_check" value="'.$id_check.'">
					                  </div> 
					                </div>
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <label class="bmd-label-floating">ID</label>
					                    <input type="text" class="form-control" name="id-dm" value="'.$id.'">
					                  </div>
					                </div>
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <label class="bmd-label-floating">Name</label>
					                    <input type="text" class="form-control" name="name-dm" value="'.$name.'">
					                  </div>
					                </div>
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <label class="bmd-label-floating">Url</label>
					                    <input type="text" class="form-control" name="url-dm" value="'.$url.'">
					                  </div>
					                </div>
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
					                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
					                      <div>
					                        <span class="btn btn-rose btn-round btn-file">
					                          <span class="fileinput-new">Chọn File Ảnh</span>
					                          <span class="fileinput-exists">Change</span>
					                          <input type="file" class="inputFileHidden" name="file_upload_update" id="file_upload_update">
					                        </span>
					                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
					                      </div>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <button type="submit" class="btn btn-primary pull-right" name="button_update">Thêm</button>
					              <div class="clearfix"></div>
					            </form>
					          </div>
							</div>';
					break;
				case '2':
						echo '<div class="card">
					          <div class="card-header card-header-primary">
					            <h4 class="card-title text-center">Cập nhật</h4>
					          </div>
					          <div class="card-body">
					            <form method="POST" enctype="multipart/form-data">
					              <div class="row">
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <label class="bmd-label-floating">DANH MỤC</label>
					                    <input type="text" class="form-control" name="danh-muc" value="Danh Mục List Game" disabled>
					                    <input type="hidden" name="id_dm_check" value="'.$id_check.'">
					                  </div> 
					                </div>
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <label class="bmd-label-floating">ID</label>
					                    <input type="text" class="form-control" name="id-dm" value="'.$id.'">
					                  </div>
					                </div>
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <label class="bmd-label-floating">Name</label>
					                    <input type="text" class="form-control" name="name-dm" value="'.$name.'">
					                  </div>
					                </div>
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <label class="bmd-label-floating">Url</label>
					                    <input type="text" class="form-control" name="url-dm" value="'.$url.'">
					                  </div>
					                </div>
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
					                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
					                      <div>
					                        <span class="btn btn-rose btn-round btn-file">
					                          <span class="fileinput-new">Chọn File Ảnh</span>
					                          <span class="fileinput-exists">Change</span>
					                          <input type="file" class="inputFileHidden" name="file_upload_update" id="file_upload_update">
					                        </span>
					                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
					                      </div>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <button type="submit" class="btn btn-primary pull-right" name="button_update">Thêm</button>
					              <div class="clearfix"></div>
					            </form>
					          </div>
							</div>';
					break;
				case '3':
						echo '<div class="card">
					          <div class="card-header card-header-primary">
					            <h4 class="card-title text-center">Cập nhật</h4>
					          </div>
					          <div class="card-body">
					            <form method="POST" enctype="multipart/form-data">
					              <div class="row">
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <label class="bmd-label-floating">DANH MỤC</label>
					                    <input type="text" class="form-control" name="danh-muc" value="Danh Mục Vòng Quay May Mắn" disabled>
					                    <input type="hidden" name="id_dm_check" value="'.$id_check.'">
					                  </div> 
					                </div>
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <label class="bmd-label-floating">ID</label>
					                    <input type="text" class="form-control" name="id-dm" value="'.$id.'">
					                  </div>
					                </div>
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <label class="bmd-label-floating">Name</label>
					                    <input type="text" class="form-control" name="name-dm" value="'.$name.'">
					                  </div>
					                </div>
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <label class="bmd-label-floating">Url</label>
					                    <input type="text" class="form-control" name="url-dm" value="'.$url.'">
					                  </div>
					                </div>
					                <div class="col-md-12">
					                  <div class="form-group">
					                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
					                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
					                      <div>
					                        <span class="btn btn-rose btn-round btn-file">
					                          <span class="fileinput-new">Chọn File Ảnh</span>
					                          <span class="fileinput-exists">Change</span>
					                          <input type="file" class="inputFileHidden" name="file_upload_update" id="file_upload_update">
					                        </span>
					                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
					                      </div>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <button type="submit" class="btn btn-primary pull-right" name="button_update">Thêm</button>
					              <div class="clearfix"></div>
					            </form>
					          </div>
							</div>';
					break;
			}
		}
	}

 ?>