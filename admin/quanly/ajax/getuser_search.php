<?php
require_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]/admin/quanly/Controller/pagination.class.php");

$perPage = new PerPage();
$user = $_GET["user"];
$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $user);
if ($username_check > 0) {
    $sql = "SELECT * FROM shop_user WHERE USER LIKE '%".$user."%'";
}else{
    $sql = "SELECT * FROM shop_user";
}
$paginationlink = "ajax/getuser_search.php?page=";	
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
        if ($faq[$k]['verified'] > 0) {
            $verified = "Đã verified";
        }else{
            $verified = "Chưa verified";
        }
        if ($faq[$k]['oauth_provider'] != null) {
            $oauth_provider = "Liên Kết Facebook";
        }else{
            $oauth_provider = "Đăng ký bình thường";
        }
    	echo "<form method='POST'><tr>
           <td class='text-center'><input type='hidden' name='id_history' value='".htmlspecialchars($faq[$k]['id'])."'>".htmlspecialchars($faq[$k]['id'])."</td>            <td class='text-center'><input type='hidden' name='id_history_nick' id='id_history_nick' value='".htmlspecialchars($faq[$k]['user'])."'>".htmlspecialchars($faq[$k]['user'])."</td>                <td ><input type='hidden' name='name_history' value='".htmlspecialchars($faq[$k]['pass'])."'>".htmlspecialchars($faq[$k]['pass'])."</td>
                <td ><input type='hidden' name='img_noibat' value='".htmlspecialchars($faq[$k]['sdt'])."'>+84 ".htmlspecialchars($faq[$k]['sdt'])."</td>
                <td ><input type='hidden' name='url_noibat' value='".htmlspecialchars($faq[$k]['email'])."'>".htmlspecialchars($faq[$k]['email'])."</td>
                <td ><input type='hidden' name='url_noibat' value='".htmlspecialchars($faq[$k]['money'])."'>".htmlspecialchars(number_format($faq[$k]['money'], 0, '', ','))." VND</td> 
                <td><input type='hidden' name='url_noibat' value='".htmlspecialchars($faq[$k]['status'])."'>".htmlspecialchars($faq[$k]['status'])."</td>
                <td><input type='hidden' name='url_noibat' value='".htmlspecialchars($faq[$k]['verified'])."'>".$verified."</td>
                <td><input type='hidden' name='url_noibat' value='".htmlspecialchars($faq[$k]['oauth_provider'])."'>".$oauth_provider."</td>  
                <td class='td-actions text-right'>
                  <button type='submit' rel='tooltip' class='btn btn-success' name='edit_noibat'>
                    <i class='material-icons'>edit</i>
                  </button>
                  <button type='submit' rel='tooltip' class='btn btn-danger' name='delete_noibat'>
                    <i class='material-icons'>close</i>
                  </button>
                </td>
                    </tr></form>";
        }
}else {
    echo "<td></td><td></td><td></td><td>Hiện tại không có tài khoản nào phù hợp với yêu cầu của bạn!<td>";
}

$output = '';
if(!empty($perpageresult)) {
	$output .= '<td></td><td></td><td></td><td>' . $perpageresult . '</td>';
}
echo $output;
?>
