<?php 
  include_once("$_SERVER[DOCUMENT_ROOT]/admin/quanly/Controller/dashboard.php");
  $db_class = new dashboard_Class();
 ?>
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Tổng số tài khoản game đang có</p>
              <h3 class="card-title"><?php echo htmlspecialchars($db_class->total_nick()) ?>
                <small>Tài khoản</small>
              </h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Tổng số tài khoản đã bán</p>
              <h3 class="card-title"><?php echo htmlspecialchars($db_class->total_nick_buy()) ?> <small>Tài khoản</small></h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Tổng số tài khoản đang trả góp</p>
              <h3 class="card-title"><?php echo htmlspecialchars($db_class->total_nick_tra_gop()) ?> <small>Tài khoản</small></h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">account_circle</i>
              </div>
              <p class="card-category">Thành viên</p>
              <h3 class="card-title"><?php echo htmlspecialchars($db_class->count_nick()) ?> <small>Tài khoản</small></h3>
            </div>
          </div>
        </div>
        <?php $db_class->show_list_game(); ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">attach_money</i>
              </div>
              <p class="card-category">Tổng số tiền khách hàng còn</p>
              <h3 class="card-title"><?php $money = $db_class->count_nick_money(); echo htmlspecialchars(number_format($money, 0, '', ',')); ?><small> VND</small></h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">attach_money</i>
              </div>
              <p class="card-category">Doanh thu bán tài khoản game</p>
              <h3 class="card-title"><?php $money = $db_class->count_buy_nick(); echo htmlspecialchars(number_format($money, 0, '', ',')); ?><small> VND</small></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Daily Sales</h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> updated 4 minutes ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header card-header-warning">
                <div class="ct-chart" id="websiteViewsChart"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Email Subscriptions</h4>
                <p class="card-category">Last Campaign Performance</p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> campaign sent 2 days ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header card-header-danger">
                <div class="ct-chart" id="completedTasksChart"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Completed Tasks</h4>
                <p class="card-category">Last Campaign Performance</p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> campaign sent 2 days ago
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>