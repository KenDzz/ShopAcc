<?php
  if (isset($_POST['button_del'])) {
    if (isset($_POST['id_del'])) {
      if (is_numeric($_POST['id_del'])) {
        $id = $_POST['id_del'];
        $del->del_account_game($id);
      }else{
        $alert->alert_error("ID không hợp lệ!");
      }
    }else{
      $alert->alert_error("Vui lòng nhập thông tin!");
    }
  }
  if (isset($_POST['button_update_acc_game'])) {
      if (isset($_POST['id_info']) && isset($_POST['id_LG']) && isset($_POST['user_account']) && isset($_POST['pass_account']) && is_numeric($_POST['id_info']) && is_numeric($_POST['id_LG']) && is_numeric($_POST['id_hidden'])) {
        $id = addslashes($_POST['id_hidden']);
        $id_info = addslashes($_POST['id_info']);
        $id_LG = addslashes($_POST['id_LG']);
        $user_account = addslashes($_POST['user_account']);
        $pass_account = addslashes($_POST['pass_account']);
        $update->update_Account_Game($id,$id_info,$id_LG,$user_account,$pass_account);
      }else{
        $alert->alert_error("Vui lòng kiểm tra lại dữ liệu đã nhập");
      }
  }
  if (isset($_POST['button_add_acc_game'])) {
    if (isset($_POST['id_nick_Info']) && isset($_POST['user_account']) && isset($_POST['pass_account'])) {
      $id_info = addslashes($_POST['id_nick_Info']);
      $user_account = addslashes($_POST['user_account']);
      $pass_account = addslashes($_POST['pass_account']);
      $info = $view->get_idLG_Nick($id_info);
      $add->add_Account_Game($id_info,$info[0]['idLG'],$user_account,$pass_account);
    }else{
      $alert->alert_error("Vui lòng nhập đầy đủ thông tin");
    }
  }

 ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-profile">
            <div class="card-header card-header-primary">
              <h4 class="card-title text-center">Tìm kiếm</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nhập ID nick tìm kiếm</label>
                    <input type="text" class="form-control" id="id_acc" name="id_acc" value="1xxx">
                  </div>
                </div>
                 <div class="col-sm-1 text-left">
                   <button type="submit" class="btn btn-primary pull-right" id="button_search_acc">Tìm kiếm</button>
                 </div>
                 <div class="col-sm-1">
                 <form method="POST">
                     <button type="submit" class="btn btn-primary pull-right" id="button_export_excel_acc" name="button_export_excel_acc">Xuất excel</button>
                  </form>
                  </div>
                  <div class="col-sm-3 border border-success border-top-0">
                    <form method="POST">
                      <div class="form-group"> 
                       <label class="bmd-label-floating">Nhập ID account game cần xóa</label>
                        <input type="text" class="form-control" id="id_del" name="id_del" value="IDxxxx">
                        <button type="submit" class="btn btn-primary pull-right" id="button_del" name="button_del">Xóa</button>
                      </div>
                    </form>
                 </div>
                 <div class="col-sm-3 border border-success border-top-0">
                    <form method="POST">
                      <div class="form-group"> 
                       <label class="bmd-label-floating">Nhập ID account cần chỉnh sửa</label>
                        <input type="text" class="form-control" id="id_update" name="id_update" value="IDxxxx">
                        <button type="submit" class="btn btn-primary pull-right" id="button_update" name="button_update">Chỉnh sửa</button>
                      </div>
                    </form>
                 </div>
              </div>
            </div>
        </div>
        <div class='card card-profile'>
          <form method='POST'>
            <div class='card-header card-header-primary'>
              <h4 class='card-title text-center'>Thêm tài khoản game</h4>
            </div>
            <div class='card-body'>
              <div class='row'>
                <div class='col-sm-2'>
                  <div class='form-group'>
                    <select class="selectpicker" data-style="btn btn-primary btn-round" name="id_nick_Info">
                      <option disabled selected>Chọn Nick INFO</option>
                       <?php $view->show_nick_info(); ?>
                    </select>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>USER</label>
                    <input type='text' class='form-control' id='user_account' name='user_account' required='true'>
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class='form-group'>
                    <label class='bmd-label-floating'>PASSWORD</label>
                    <input type='text' class='form-control' id='pass_account' name='pass_account' email='true' required='true'>
                  </div>
                </div>
                <div class='col-sm-1'>
                  <button type='submit' class='btn btn-primary pull-right' id='button_add_acc_game' name='button_add_acc_game'>ADD</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <?php 
          if(isset($_POST['button_update'])){
            if (isset($_POST['id_update'])) {
              if (is_numeric($_POST['id_update'])) {
                  $id = $_POST['id_update'];
                  $view->show_update_acc_game($id);
              }else{
                $alert->alert_error("ID không hợp lệ");
              }
            }else{
                $alert->alert_error("Vui lòng nhập ID!");
            }
          }

         ?>
        <div class="card card-profile">
          <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Tài khoản nick game</h4>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>ID NICK</th>
                  <th>ID INFO</th>
                  <th>Loại Game</th>
                  <th>User</th>
                  <th>Pass</th>
                </tr>
              </thead>
              <tbody id="pagination-result-acc">
                <input type="hidden" name="rowcount" id="rowcount" />
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>