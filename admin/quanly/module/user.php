<?php 

    if (isset($_POST["button_napthe"])) {
        if (isset($_POST["usernap"]) && isset($_POST["moneynap"]) && isset($_POST["typepayment"])) {
            $user = addslashes($_POST["usernap"]);
            $money = addslashes($_POST["moneynap"]);
            $type = addslashes($_POST["typepayment"]);
            $idUser = $view->getid($user);
            $CardName = $view->gettypepayment($type);
            if (is_numeric($money)) {
                $add->naptien($user,$money,$type,$idUser,$CardName);
            }
        }else{
          $alert->alert_error("Vui lòng nhập đầy đủ thông tin!");
        }
    }
    if (isset($_POST["button_band"])) {
      if (isset($_POST["userband"])) {
        $user = addslashes($_POST["userband"]);
        $add->band_nick($user);
      }
      else{
        $alert->alert_error("Vui lòng nhập đầy đủ thông tin!");
      }
    }
    if (isset($_POST["button_open"])) {
      if (isset($_POST["useropen"])) {
        $user = addslashes($_POST["useropen"]);
        $add->open_nick($user);
      }
      else{
        $alert->alert_error("Vui lòng nhập đầy đủ thông tin!");
      }
    }
    if (isset($_POST["button_del"])) {
       $id = $_POST["userdel"];
       if (is_numeric($id)) {
          $del->del_user($id);
       }
       else{
        $alert->alert_error("ID Xóa không hợp lệ!");
       }
    }
    if (isset($_POST["button_veri"])) {
        if (isset($_POST["userveri"])) {
            $user = addslashes($_POST["userveri"]);
            $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $user);
            $veri_code = $veri->create_code();
            if ($username_check > 0) {
                $update->veri_user($user,$veri_code);
            }else{
              $alert->alert_error("Kích hoạt không thành công! Error: 1");
            }
        }else{
          $alert->alert_error("Vui lòng nhập tài khoản!");
        }
    }
    if (isset($_POST["button_update_nick"])) {
        if (isset($_POST["id_hidden"]) && isset($_POST["user"]) && isset($_POST["pass_user"]) && isset($_POST["sdt_user"]) && isset($_POST["email_user"])) {
            $user = addslashes($_POST["user"]);
            $id = $_POST["id_hidden"];
            $password = addslashes($_POST["pass_user"]);
            $sdt = addslashes($_POST["sdt_user"]);
            $email = addslashes($_POST["email_user"]);
            $op_user = addslashes($_POST["oauth_provider_user"]);
            $ot_user = addslashes($_POST["oauth_token_user"]);
            $on_user = addslashes($_POST["oauth_name_user"]);
            $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $user);
            $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
            $check_md5 = $update->Check_Valid_Md5_String($password);
            if ($username_check > 0 && $email_check > 0 && is_numeric($id)) {
                if ($check_md5) {
                    $update->update_user($id,$user,$password,$sdt,$email,$op_user,$ot_user,$on_user);
                }else{
                  $alert->alert_error("Vui lòng điền mật khẩu ở dạng mã hóa MD5!");
                }
            }
        }else{
          $alert->alert_error("Vui lòng điền đầy đủ thông tin");
        }
    }
 ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-profile">
            <div class="card-header card-header-primary">
              <h4 class="card-title text-center">Chức Năng</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3 border border-success border-top-0">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nhập tài khoản cần tìm kiếm</label>
                    <input type="text" class="form-control" id="user" name="user" value="userxxx">
                  </div>
                  <button type="submit" class="btn btn-primary pull-right" id="button_search_user">Tìm kiếm</button>
                </div>
                 <div class="col-sm-3 border border-success border-top-0">
                  <form method="POST">
                   <div class="form-group">
                    <select class="selectpicker" data-style="btn btn-primary btn-round" name="typepayment">
                      <option disabled selected>Chọn loại thanh toán</option>
                       <?php $view->show_type_payment(); ?>
                    </select>
                  </div>
                  <div class="form-group">
                     <label class="bmd-label-floating">Nhập tài khoản cần nạp</label>
                      <input type="text" class="form-control" id="user" name="usernap" value="userxxx">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="money" name="moneynap" placeholder="nạp 10k thì nhập 10000">
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" id="button_napthe" name="button_napthe">Nạp tiền</button>
                    </form>
                 </div>
                 <div class="col-sm-3 border border-success border-top-0">
                    <form method="POST">
                      <div class="form-group"> 
                       <label class="bmd-label-floating">Nhập tài khoản cần Banned</label>
                        <input type="text" class="form-control" id="user" name="userband" value="userxxx">
                        <button type="submit" class="btn btn-primary pull-right" id="button_band" name="button_band">Ban nick</button>
                      </div>
                    </form>
                 </div>
                 <div class="col-sm-3 border border-success border-top-0">
                    <form method="POST">
                      <div class="form-group">
                       <label class="bmd-label-floating">Nhập tài khoản cần mở</label>
                        <input type="text" class="form-control" id="user" name="useropen" value="userxxx">
                        <button type="submit" class="btn btn-primary pull-right" id="button_open" name="button_open">Mở lại nick</button>
                      </div>
                    </form>
                 </div>
                  <div class="col-sm-3 border border-success border-top-0 mt-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pass_generator" placeholder="Nhập thông tin cần Mã Hóa MD5">
                        <button type="submit" class="btn btn-primary pull-right" id="button_md5">Mã Hóa</button>
                      </div>
                 </div>
                 <div class="col-sm-3 border border-success border-top-0 mt-3">
                    <form method="POST">
                      <div class="form-group">
                        <input type="text" class="form-control" id="user" name="userveri" placeholder="Nhập tài khoản cần kích hoạt">
                        <button type="submit" class="btn btn-primary pull-right" id="button_veri" name="button_veri">Kích hoạt tài khoản</button>
                      </div>
                    </form>
                 </div>
                 <div class="col-sm-3 border border-success border-top-0 mt-3">
                    <form method="POST">
                      <div class="form-group">
                        <input type="text" class="form-control" id="user" name="userupdate" placeholder="Tài khoản cần chỉnh sửa">
                        <button type="submit" class="btn btn-primary pull-right" id="button_update" name="button_update">Tài khoản cần chỉnh sửa</button>
                      </div>
                    </form>
                 </div>
                 <div class="col-sm-3 border border-success border-top-0 mt-3">
                    <form method="POST">
                      <div class="form-group">
                        <input type="text" class="form-control" id="user" name="userdel" placeholder="Nhập ID tài khoản cần kích hoạt">
                        <button type="submit" class="btn btn-primary pull-right" id="button_del" name="button_del">ID Tài khoản cần xóa</button>
                      </div>
                    </form>
                 </div>
              </div>
            </div>
        </div>
         <?php if (isset($_POST["button_update"]))  {
              if (isset($_POST["userupdate"])) {
                $user = addslashes($_POST["userupdate"]);
                $view->show_update_acc($user);
              }
         } ?>
        <div class="card card-profile">
          <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Tài khoản</h4>
          </div>
          <div class="card-body">
            <form method='POST'> 
              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
                    <th>User</th>
                    <th>Pass</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Money</th>
                    <th>Status</th>
                    <th>Veri</th>
                    <th>Loại NICK</th>
                  </tr>
                </thead>
                  <tbody id="pagination-result-user">
                    <input type="hidden" name="rowcount" id="rowcount-user" />
                  </tbody>
              </table>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>