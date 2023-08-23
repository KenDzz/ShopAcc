<?php

require_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]/Controller/pagination.class.php");
$perPage = new PerPage();

$sql = "SELECT `id`, `idLG`, `rank`, `tuong`, `skin`, `trang_thai`, `bang_ngoc`, rate - (rate*(discount/100)) as price,rate,discount, `img_1`, `img_2`, `img_3`, `img_4`, `img_5` FROM `shop_nick_info` ORDER BY price DESC";
$paginationlink = "ajax/lien-minh/getresult_sort_second.php?page=";	
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
foreach($faq as $k=>$v) {
	echo "
			<div class='col-sm-3 p-3 text-acc-game'>
			<div class='card card-list-game'>";
			if ($faq[$k]['trang_thai'] == '1') {
				if ($faq[$k]['discount'] > 0) {
					echo "<span class='ribbon1'><span>Giảm ".htmlspecialchars($faq[$k]['discount'])."%</span></span>";
				}
				else{
					echo "";
				}
			}else if ($faq[$k]['trang_thai'] == '2') {
				echo "<span class='ribbon1'><span>Đang Trả Góp</span></span>";
			}else if ($faq[$k]['trang_thai'] == '3') {
				echo "<span class='ribbon1'><span>Đã bán</span></span>";
			}
			echo "<img src='".htmlspecialchars($faq[$k]['img_1'])."' class='card-img-top'>
			<form method='POST'>
			<div class='card-body'>
			<div class='row main-accgame'>
			<div class='col-sm-6'>
			Tướng: <b>".htmlspecialchars($faq[$k]['tuong'])."</b>
			</div>
			<div class='col-sm-6'>
			Skin: <b>".htmlspecialchars($faq[$k]['skin'])."</b>
			</div>
			<div class='col-sm-6'>
			Bảng ngọc: <b>".htmlspecialchars($faq[$k]['bang_ngoc'])."</b>
			</div>
			<div class='col-sm-6'>
			Rank: <b>".htmlspecialchars($faq[$k]['rank'])."</b>
			</div>
			</div>
			<div class='mt-2'>";
			if ($faq[$k]["discount"] > 0) {
				$rate = $faq[$k]['rate'];
				$discount = $faq[$k]['discount'];
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
if(!empty($perpageresult)) {
	$output .= '<div class="container text-center"><div id="pagination">' . $perpageresult . '</div><div>';
}
print $output;
?>
