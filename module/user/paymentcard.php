<?php 
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/history.class.php");
	$history = new history_payment();
 ?>
<div class="col-md-8">
	<div class="card mb-3">
		<div class="card-body">
			<div class="bd-callout bd-callout-info"><p class="h3">Lịch sử nạp thẻ</p></div>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Mệnh giá</th>
						<th scope="col">Loại thẻ</th>
						<th scope="col">Mã thẻ</th>
						<th scope="col">Seri thẻ</th>
						<th scope="col">Ngày nạp</th>
					</tr>
				</thead>
				<tbody>
					<?php $history->payment_card($username); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>