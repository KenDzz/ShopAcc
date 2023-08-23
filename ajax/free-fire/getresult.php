<?php
require_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]/Controller/pagination.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]/Controller/function.class.php");
$perPage = new PerPage();
$Func = new Function_class();

$sql = "SELECT * from shop_nick_info WHERE idLG = 3 ORDER BY trang_thai";
$paginationlink = "ajax/free-fire/getresult.php?page=";	
$pagination_setting = "all-links";

$page = 1;
if(!empty($_GET["page"])) {
	$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
$faq = runQuery($query);

if(empty($_GET["rowcount"])) {
	$_GET["rowcount"] = numRows($sql);
}


$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);	


$output = '';
if (isset($faq)) {
	foreach($faq as $k=>$v) {
		$check = $Func->check_sale($faq[$k]['id']);
		if ($check > 0) {
			$get = $Func->get_sale($faq[$k]['id']);
			$discount_sale = $get['discount_sale'];
			foreach($get as $kb=>$vb) {
				$date = $get['date'];
				$h = $get['h'];
				$m = $get['m'];
				$s = $get['s'];
			}
			date_default_timezone_set("Asia/Bangkok");
			$timer = strtotime("$date $h:$m:$s");
			$timer_now = time();
		}else{
			$discount_sale = $faq[$k]['discount'];
		}
		echo "
				<div class='col-sm-3 p-3 text-acc-game'>
				<div class='card card-list-game'>";
				if ($faq[$k]['trang_thai'] == '1') {
					if ($discount_sale > 0) {
						echo "<span class='ribbon1'><span>Giảm ".htmlspecialchars($discount_sale)."%</span></span>";
					}
					else{
						echo "";
					}
				}else if ($faq[$k]['trang_thai'] == '2') {
					echo "<span class='ribbon1'><span>Đang Trả Góp</span></span>";
				}else if ($faq[$k]['trang_thai'] == '3') {
					echo "<span class='ribbon1'><span>Đã bán</span></span>";
				}
				echo "<img src='".htmlspecialchars($faq[$k]['img_1'])."' class='card-img-top'>";
				if ($check > 0) {
					echo "<div class='sale-timer-product-acc'>
							<div class='row'>
								<div class='d-inline-flex img-sale-acc'>
									<img src='img/794478_preview_preview.png' class='img-flash-sale-product-acc'>
									</div>
									<div class='d-inline-flex timer-out-acc'>
									<div id='timer-product-acc'>
									<div class='days-product-acc'>
									  <div class='numbers-product' id='days-number-".htmlspecialchars($faq[$k]['id'])."'>0</div><spclass='text-timer'></span>
									</div> 
									<div class='hours-product-acc'>
									<div class='numbers-product' id='hours-number-".htmlspecialchars($faq[$k]['id'])."'>0</div><spclass='text-timer'></span>
									</div>
									<div class='minutes-product-acc'>
									  <div class='numbers-product' id='minutes-number-".htmlspecialchars($faq[$k]['id'])."'>0</div><spclass='text-timer'></span>
									</div>
									<div class='seconds-product-acc'>
									  <div class='numbers-product' id='seconds-number-".htmlspecialchars($faq[$k]['id'])."'>0</div><spclass='text-timer'></span>
									</div>
									</div>
									</div>
								</div>
						</div>
						<div class='sale-timer-product-acc border-top text-notify'>
							<span class='note-sale-timer'>Sự kiện chỉ diễn ra trong thời gian có hạn</span>
						</div>
						<div class='sale-flash-img d-inline-flex ml-4'>
							<img src='img/794478_preview_preview.png' class='img-flash-sale-product-acc'>
						</div>
						";
						echo "<script>
								var countDownDate = ".$timer." * 1000;
								var now = ".$timer_now." * 1000;
								// Update the count down every 1 second
								var x = setInterval(function() {
									now = now + 1000;
									// Find the distance between now an the count down date
									var distance = countDownDate - now;
									// Time calculations for days, hours, minutes and seconds

									var days = Math.floor(distance / (1000 * 60 * 60 * 24));
									var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
									var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
									var seconds = Math.floor((distance % (1000 * 60)) / 1000);
									// Output the result in an element 
									document.getElementById('days-number-".htmlspecialchars($faq[$k]['id'])."').innerHTML = days;
									document.getElementById('hours-number-".htmlspecialchars($faq[$k]['id'])."').innerHTML = hours;
									document.getElementById('minutes-number-".htmlspecialchars($faq[$k]['id'])."').innerHTML = minutes;
									document.getElementById('seconds-number-".htmlspecialchars($faq[$k]['id'])."').innerHTML = seconds; 
									// If the count down is over, write some text 
									if (distance < 0) {
										clearInterval(x);
										document.getElementById('days-number-".htmlspecialchars($faq[$k]['id'])."').innerHTML = 0;
										document.getElementById('hours-number-".htmlspecialchars($faq[$k]['id'])."').innerHTML = 0;
										document.getElementById('minutes-number-".htmlspecialchars($faq[$k]['id'])."').innerHTML = 0;
										document.getElementById('seconds-number-".htmlspecialchars($faq[$k]['id'])."').innerHTML = 0;
										sale_timer(".htmlspecialchars($faq[$k]['id']).");
										location.reload();
									}
								}, 1000);
							</script>";
					}
				echo" <form method='POST'>
				<div class='card-body'>
				<div class='row main-accgame'>
				<div class='col-6'>
				Tướng: <b>".htmlspecialchars($faq[$k]['tuong'])."</b>
				</div>
				<div class='col-6'>
				Skin: <b>".htmlspecialchars($faq[$k]['skin'])."</b>
				</div>
				<div class='col-6'>
				Bảng ngọc: <b>".htmlspecialchars($faq[$k]['bang_ngoc'])."</b>
				</div>
				<div class='col-6'>
				Rank: <b>".htmlspecialchars($faq[$k]['rank'])."</b>
				</div>
				</div>
				<div class='mt-2'>";
				if ($discount_sale > 0) {
					$rate = $faq[$k]['rate'];
					$discount = $discount_sale;
					$dis_rate = ($rate * ($discount/100));
					$dis_rate_result = $rate - $dis_rate;
					echo "<p class='btn btn-outline-success raise' style='width: 100%;'>".htmlspecialchars(number_format($dis_rate_result, 0, '', ','))." VND<span class='line-through'>".htmlspecialchars(number_format($faq[$k]["rate"], 0, '', ','))." VND</span></p>";
				}
				else{
					echo "<p class='btn btn-outline-success raise' style='width: 100%;'>".htmlspecialchars(number_format($faq[$k]['rate'], 0, '', ','))." VND</p>";
				}
				echo "</div>
				<div class='card'>
				<a class='button-buy' href='nick-lien-minh-gia-re-".htmlspecialchars($faq[$k]['id'])."'><input type='hidden' name='id_acc' value='".htmlspecialchars($faq[$k]['id'])."'>Xem chi tiết</a>
				</div>
				</form>
				</div>
				</div>
				</div>";
	}
}else{
	echo "<div class='container text-center mt-5'>Hiện tại không có tài khoản nào phù hợp với yêu cầu của bạn!<div>";
}
if(!empty($perpageresult)) {
	$output .= '<div class="container text-center"><div id="pagination">' . $perpageresult . '</div><div>';
}
print $output;
?>
