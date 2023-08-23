<?php
require_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]/admin/quanly/Controller/pagination.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]/admin/quanly/Controller/view.php");

$perPage = new PerPage();
$view = new view_func();
$sql = "SELECT * FROM shop_log_buy"; 
$paginationlink = "ajax/getresult.php?page=";	
$pagination_setting = "all-links";

$page = 1;
if(!empty($_GET["page"])) {
	$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
$faq = $perPage->runQuery($query);

if(empty($_GET["rowcount"])) {
	$_GET["rowcount"] = $perPage->numRows($sql);
}


$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);	
if (isset($faq)) {
    foreach($faq as $k=>$v) {
    			echo "<tr>
                        <td class='text-center'><input type='hidden' name='id_history' value='".htmlspecialchars($faq[$k]['id'])."'>".htmlspecialchars($faq[$k]['id'])."</td>
                        <td class='text-center'><input type='hidden' name='id_history_nick' id='id_history_nick' value='".htmlspecialchars($faq[$k]['idnick'])."'>".htmlspecialchars($faq[$k]['idnick'])."</td>
                            <td ><input type='hidden' name='name_history' value='".htmlspecialchars($view->getuser($faq[$k]['idUser']))."'>".htmlspecialchars($view->getuser($faq[$k]['idUser']))."</td>
                            <td ><input type='hidden' name='img_noibat' value='".htmlspecialchars($view->getlg($faq[$k]['idLG']))."'>".htmlspecialchars($view->getlg($faq[$k]['idLG']))."</td>
                            <td ><input type='hidden' name='url_noibat' value='".htmlspecialchars($faq[$k]['price'])."'>".htmlspecialchars(number_format($faq[$k]['price'], 0, '', ','))." VND</td>
                            <td ><input type='hidden' name='url_noibat' value='".htmlspecialchars($faq[$k]['datetime'])."'>".htmlspecialchars($faq[$k]['datetime'])."</td>
                    </tr>";
    }
}else{
    echo "<td></td><td></td><td></td><td>Hiện tại không có tài khoản nào phù hợp với yêu cầu của bạn!<td>";
}

$output = '';
if(!empty($perpageresult)) {
	$output .= '<td></td><td></td><td></td><td>' . $perpageresult . '</td>';
}
echo $output;
?>
