<?php 
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/history.class.php");
	$history = new history_payment();
 ?>
<div class="col-md-8">
	<div class="card mb-3">
		<div class="card-body">
			<div class="bd-callout bd-callout-info"><p class="h3">Tài khoản game đã mua</p></div>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Tài Khoản</th>
						<th scope="col">Mật Khẩu</th>
						<th scope="col">Game</th>
					</tr>
				</thead>
				<tbody>
					<?php $history->logaccount($username); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>