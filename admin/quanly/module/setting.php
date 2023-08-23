<?php 
  $add = new func_add();
  $update = new update_Class();
  $view = new view_func();
  $alert = new alert_func();

  if (isset($_POST["button_update_config"])) {
    if (isset($_POST["title"]) && isset($_POST["contact"]) && isset($_POST["address"]) && isset($_POST["introduce"])) {
       $title = addslashes($_POST["title"]);
       $contact = addslashes($_POST["contact"]);
       $address = addslashes($_POST["address"]);
       $introduce = addslashes($_POST["introduce"]);
       if (!empty($_FILES["file_upload_logo"])) {
          $url_img = $add->upload_file($_FILES["file_upload_logo"]);
        }
        else{
            $url_img = addslashes($_POST["logo"]);
        }
        $update->update_config($title,$contact,$address,$introduce,$url_img);
    }
    else{
        $alert->alert_error("Vui lòng điền đầy đủ thông tin!");
    }
  }

 ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class='card card-profile'>
          <form method='POST' enctype='multipart/form-data'>
            <div class='card-header card-header-primary'>
              <h4 class='card-title text-center'>Setting</h4>
            </div>
            <div class='card-body'>
              <div class='row'>
                <?php htmlspecialchars($view->show_config()); ?>
                <div class="col-sm-3">
                  <button type='submit' class='btn btn-primary pull-right' id='button_open' name='button_update_config'>Update</button>
                </div>
                <?php htmlspecialchars($view->show_footer()); ?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
