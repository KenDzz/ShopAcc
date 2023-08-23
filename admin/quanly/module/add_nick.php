<?php 
$add = new func_add();
$view = new view_func();
$alert = new alert_func();

if (isset($_POST["button_add_nick"])) {
  if (isset($_POST["loainick"]) && isset($_POST["rank"]) && isset($_POST["tuong"]) && isset($_POST["skin"]) && isset($_POST["ngoc"]) && isset($_POST["rate"]) && isset($_POST["discount"]) && isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["editor_content_nick"])) {
      $loainick = addslashes($_POST["loainick"]);
      $rank = addslashes($_POST["rank"]);
      $tuong = addslashes($_POST["tuong"]);
      $skin = addslashes($_POST["skin"]);
      $ngoc = addslashes($_POST["ngoc"]);
      $rate = addslashes($_POST["rate"]);
      $discount = addslashes($_POST["discount"]);
      $user = addslashes($_POST["user"]);
      $pass = addslashes($_POST["pass"]);
      $content = htmlspecialchars($_POST["editor_content_nick"]);

      if (!empty($_FILES["file_upload_1"]) && !empty($_FILES["file_upload_2"]) && !empty($_FILES["file_upload_3"]) && !empty($_FILES["file_upload_4"]) && !empty($_FILES["file_upload_5"])) {
          if (!empty($_FILES["file_upload_1"])) {
            $url_img_1 = $add->upload_file($_FILES["file_upload_1"]);
          }else{
            $url_img_1 = "#";
          }
          if (!empty($_FILES["file_upload_2"])) {
            $url_img_2 = $add->upload_file($_FILES["file_upload_2"]);
          }else{
            $url_img_2 = "#";
          }
          if (!empty($_FILES["file_upload_3"])) {
            $url_img_3 = $add->upload_file($_FILES["file_upload_3"]);
          }else{
            $url_img_3 = "#";
          }
          if (!empty($_FILES["file_upload_4"])) {
            $url_img_4 = $add->upload_file($_FILES["file_upload_4"]);
          }else{
            $url_img_4 = "#";
          }
          if (!empty($_FILES["file_upload_5"])) {
            $url_img_5 = $add->upload_file($_FILES["file_upload_5"]);
          }else{
            $url_img_5 = "#";
          }
          $add->add_nick_game($loainick,$rank,$tuong,$skin,$ngoc,$rate,$discount,$user,$pass,$url_img_1,$url_img_2,$url_img_3,$url_img_4,$url_img_5,$content);
        }else{
          $alert->alert_error("Vui lòng thêm ít nhất 5 ảnh!");
        }
    }
  else{
    $alert->alert_error("Vui lòng điền đầy đủ thông tin!");
  }
}

 ?> 
<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Thêm tài khoản game</h4>
          </div>
          <div class="card-body">
            <form method="POST" enctype='multipart/form-data'>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <select class="selectpicker" data-style="btn btn-primary btn-round" name="loainick">
                      <option disabled selected>Chọn loại game</option>
                      <?php $view->view_select_LG(); ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Rank</label>
                    <input type="text" class="form-control" name="rank">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Số Tướng</label>
                    <input type="number" class="form-control" name="tuong" value="0">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Số Skin</label>
                    <input type="number" class="form-control" name="skin" value="0">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Bảng Ngọc</label>
                    <input type="number" class="form-control" name="ngoc" value="0">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Giá tiền</label>
                    <input type="number" class="form-control" name="rate" value="0">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Giảm giá. VD: Giảm 10% nhập 10</label>
                    <input type="number" class="form-control" name="discount" value="0">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tài khoản</label>
                    <input type="text" class="form-control" name="user">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Mật Khẩu</label>
                    <input type="text" class="form-control" name="pass">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <select class="selectpicker" data-style="btn btn-primary btn-round" name="thongtintk">
                        <option disabled selected>Chọn loại thông tin</option>
                        <option value="">test</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
                      <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Chọn File Ảnh (Ảnh bìa)</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" class="inputFileHidden" name='file_upload_1' id="file_upload">
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-group">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
                      <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Chọn File Ảnh 2</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" class="inputFileHidden" name='file_upload_2' id="file_upload" multiple>
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-group">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
                      <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Chọn File Ảnh 3</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" class="inputFileHidden" name='file_upload_3' id="file_upload">
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
                      <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Chọn File Ảnh 4</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" class="inputFileHidden" name='file_upload_4' id="file_upload">
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
                      <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Chọn File Ảnh 5</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" class="inputFileHidden" name='file_upload_5' id="file_upload">
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <textarea id="editor_content_nick" name="editor_content_nick">
                  </textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right" name="button_add_nick">Thêm</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
