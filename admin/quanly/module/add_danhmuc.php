<?php
$add = new func_add();
$view = new view_func();
$del = new detele_func();
$alert = new alert_func();
$update = new update_Class();

if (isset($_POST["button_add"])) {
  if (isset($_POST["danhmuc"]) && isset($_POST["name"]) && isset($_POST["url"])) {
    $danhmuc = addslashes($_POST["danhmuc"]);
    $name = addslashes($_POST["name"]);
    $url = addslashes($_POST["url"]);
    if (!empty($_FILES["file_upload"])) {
      $url_img = $add->upload_file($_FILES["file_upload"]);
    }
    else{
      $url_img = "";
    }
    $add->add_danhmuc($danhmuc,$name,$url,$url_img);
  }
  else{
    $msg = "Vui lòng nhập đầy đủ thông tin";
    $alert->alert_error($msg); 
  }
}

if (isset($_POST["button_update"])) {
  if (!empty($_POST["id_dm_check"]) && !empty($_POST["id-dm"]) && !empty($_POST["name-dm"]) && !empty($_POST["url-dm"])) {
    $danhmuc = addslashes($_POST["id_dm_check"]);
    $iddanhmuc = addslashes($_POST["id-dm"]);
    $name = addslashes($_POST["name-dm"]);
    $url = addslashes($_POST["url-dm"]); 
    if (!empty($_FILES["file_upload_update"])) {
      $url_img = $add->upload_file($_FILES["file_upload_update"]);
    }
    else{
      $url_img = "#";
    }
    $update->update_dm($danhmuc,$iddanhmuc,$name,$url,$url_img);
  }
  else{
    $msg = "Vui lòng nhập đầy đủ thông tin";
    $alert->alert_error($msg);
  }
}

if (isset($_POST["delete_noibat"])) {
  $id_del_NB = addslashes($_POST["id_noibat"]);
  $id_NB = 1;
  if (isset($id_del_NB) && (is_numeric($id_del_NB) == 1)) {
    $del->delete_danhmuc($id_del_NB, $id_NB);
  }
  else{
    $msg = "Thông tin xóa không hợp lệ";
    $alert->alert_error($msg);
  }
}
else if (isset($_POST["delete_listgame"])) {
  $id_del_LG = addslashes($_POST["id_LG"]);
  $id_LG = 2;
  if (isset($id_del_LG) && (is_numeric($id_del_LG) == 1)) {
    $del->delete_danhmuc($id_del_LG, $id_LG);
  }
  else{
    $msg = "Thông tin xóa không hợp lệ";
    $alert->alert_error($msg);
  }
}
else if (isset($_POST["delete_luckey"])) {
  $id_del_Luckey = addslashes($_POST["idLuckey"]);
  $id_LK = 3;
  if (isset($id_del_Luckey) && (is_numeric($id_del_Luckey) == 1)) {
    $del->delete_danhmuc($id_del_Luckey, $id_LK);
  }
  else{
    $msg = "Thông tin xóa không hợp lệ";
    $alert->alert_error($msg);
  }
}
?>      

<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Thêm danh mục</h4>
          </div>
          <div class="card-body">
            <form method="POST" enctype='multipart/form-data'>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <select class="selectpicker" data-style="btn btn-primary btn-round" name="danhmuc">
                      <option disabled selected>Chọn danh mục</option>
                      <option value="2">Danh mục nổi bật</option>
                      <option value="3">Danh mục game</option>
                      <option value="4">Danh mục vòng quay may mắn</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tên</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Url</label>
                    <input type="text" class="form-control" name="url">
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
                          <input type="file" class="inputFileHidden" name='file_upload' id="file_upload">
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right" name="button_add">Thêm</button>
              <div class="clearfix"></div>
            </form>
          </div> 
        </div>
        <?php 
            if (isset($_POST["edit_noibat"])) {
              $id_check = 1;
              $id = addslashes($_POST["id_noibat"]);
              $name = addslashes($_POST["name_noibat"]);
              $img = addslashes($_POST["img_noibat"]);
              $url = addslashes($_POST["url_noibat"]);
              $update->show_danhmuc_update($id_check,$id,$name,$img,$url);
            }else if (isset($_POST["edit_listgame"])) {
              $id_check = 2;
              $id = addslashes($_POST["id_LG"]); 
              $name = addslashes($_POST["name_LG"]);
              $img = addslashes($_POST["img_LG"]);
              $url = addslashes($_POST["url_LG"]);
              $update->show_danhmuc_update($id_check,$id,$name,$img,$url);
            }else if (isset($_POST["edit_luckey"])) {
              $id_check = 3;
              $id = addslashes($_POST["idLuckey"]);
              $name = addslashes($_POST["name_Luckey"]);
              $img = addslashes($_POST["img_Luckey"]);
              $url = addslashes($_POST["url_Luckey"]);
              $update->show_danhmuc_update($id_check,$id,$name,$img,$url);
            }
          ?>
      </div>

      <div class="col-md-7">
        <div class="card card-profile">
          <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Danh Mục Nổi Bật</h4>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Url</th>
                  <th>Chỉnh sửa</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $view->view_danhmuc(); 
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card card-profile">
          <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Danh Mục List Game</h4>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Url</th>
                  <th>Chỉnh sửa</th>
                </tr>
              </thead>
              <tbody>
                <?php $view->view_listgame(); ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card card-profile">
          <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Danh Mục Vòng quay may mắn</h4>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr> 
                  <th class="text-center">ID</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Url</th>
                  <th>Chỉnh sửa</th>
                </tr>
              </thead>
              <tbody>
                <?php include_once("$_SERVER[DOCUMENT_ROOT]/admin/quanly/Controller/view.php"); $view = new view_func(); $view->view_vongquaymayman(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
