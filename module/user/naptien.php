<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/Controller/naptien.class.php");
$payment = new payment();
if (isset($_POST["payment"])) {
	if (isset($_POST["card_type_id"]) && isset($_POST["rate"]) && isset($_POST["idcard"]) && isset($_POST["sericard"])) {
		$card_type_id = addslashes($_POST["card_type_id"]);
		$rate = addslashes($_POST["rate"]);
		$idcard = addslashes($_POST["idcard"]);
		$sericard = addslashes($_POST["sericard"]);
		$rate_check = is_numeric($rate);
		if ($rate_check == 1) {
			if (!empty($_POST['h-captcha-response'])) {
				$token = $_POST['h-captcha-response'];
				$responseData = $Func->captcha($token);
			    if($responseData->success){
			    	$merchant_id = merchant_id;
			    	$api_user = api_user;
			    	$api_password = api_password;
			    	if (isset($merchant_id) && isset($api_user) && isset($api_password)) {
				    		$payment->payment_card($username,$card_type_id,$rate,$idcard,$sericard,$merchant_id,$api_user,$api_password);
			    	}else{
				   		$alert->alert_error('Lỗi hệ thống');
			    	}
			    }else{
					$alert->alert_error('Robot verification failed, please try again.');
				}
			}else{
				$alert->alert_error("Vui lòng xác minh Captcha");
			}
		}else{
			$alert->alert_error("Dữ liệu nhập không đúng");
		}
	}else{
		$alert->alert_error("Vui lòng điền đầy đủ thông tin");
	}
}

if (isset($_POST["payment-momo"])) {
	if (isset($_POST["idPayment-MOMO"])) {
		$maGD = addslashes($_POST["idPayment-MOMO"]);
		if (!empty($_POST['h-captcha-response'])) {
			$token = $_POST['h-captcha-response'];
			$responseData = $Func->captcha($token);
			if($responseData->success){
				$payment->PaymentMOMO($username,$maGD);
			}else{
				$alert->alert_error('Robot verification failed, please try again.');
			}
		}else{
			$alert->alert_error("Vui lòng xác minh Captcha");
		}
	}else{
		$alert->alert_error("Vui lòng điền đầy đủ thông tin");
	}
}
?>
<article class="card col-md-8">
	<div class="container">
		<div class="card-body">
			<div class="payment-type">
				<div class="types flex justify-space-between">
					<div class="type type-1 selected">
						<div class="logo">
							<i class="fas fa-money-check-alt"></i>
						</div>
						<div class="text">
							<p>Nạp tiền tự động</p>
						</div>
					</div>
					<div class="type type-2">
						<div class="logo">
							<i class="fas fa-landmark"></i>
						</div>
						<div class="text">
							<p>Nạp tiền bằng ATM</p>
						</div>
					</div>
					<div class="type type-3">
						<div class="logo">
							<i class="fas fa-credit-card"></i>
						</div>
						<div class="text">
							<p>Nạp tiền bằng MOMO</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group nap-card">
			<div class="alert alert-danger mt-2" role="alert">
				*Chú ý: Nạp thẻ sai mệnh giá mất 100% giá trị thẻ
			</div>
			<form method="POST">
				<div class="form-group mt-2">
					<span>Tài khoản:</span>
					<input  class="form-control" type='text'  value='<?php echo htmlspecialchars($user->account($username)); ?>'readonly>
				</div>
				<div class="form-group">
					<span>Loại thẻ</span>
					<select name="card_type_id" class="form-control">
						<option value='0' disabled selected>---- Chọn loại thẻ ----</option>
						<option value="1">Viettel</option>
						<option value="2">Mobiphone</option>
						<option value="3">Vinaphone</option>
						<option value="4">Gate</option>
						<option value="5">VTC (vcoin)</option>
						<option value="6">Vietnammobile</option>
						<option value="7">Zing</option>
						<option value="8">Bit</option>
						<option value="9">Megacard</option>
						<option value="10">Oncash</option>
					</select>
				</div>
				<div class="form-group">
					<span>Mệnh giá</span>
					<select  id='card' name="rate" class="form-control">
						<option value='0' disabled selected>---- Chọn mệnh giá ----</option>
						<option value="10000">10.000 VND</option>
						<option value="20000">20.000 VND</option>
						<option value="30000">30.000 VND</option>
						<option value="50000">50.000 VND</option>
						<option value="100000">100.000 VND</option>
						<option value="200000">200.000 VND</option>
						<option value="300000">300.000 VND</option>
						<option value="500000">500.000 VND</option>
						<option value="1000000">1.000.000 VND</option>
					</select>
				</div>
				<div class="form-group">
					<span>Mã thẻ</span>
					<input class="form-control" type='text' name="idcard" required>
				</div>
				<div class="form-group">
					<span>Seri thẻ</span>
					<input  type="text"  class="form-control" name="sericard" required>
				</div>
				<div class="form-group">
			     	<div class="h-captcha" data-sitekey="b3691d2a-2c8e-4ab9-9a0f-b67ef8740406"></div>
			    </div>
				<div class="mt-2">
					<button name="payment" id="payment" class="btn btn-outline-success">Nạp ngay</button>
				</div>
			</form>
		</div>
		<div class="form-group nap-atm">
			<div class="alert alert-success" role="alert">
				<p>Khi chuyển tiền ghi rõ dung : Nạp tiền SHOP360GAME + tên tài khoản hoặc ID tài khoản</p>
				<hr>
				<p class="mb-0">Ví dụ : Tài khoản trên web của bạn là abcxyc1 thì sẽ là : naptien SHOP360GAME + tên website truy cập tài khoản</p>
			</div>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Vui lòng!</strong> Thực hiện đúng các bước để nạp tiền.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Tên</th>
						<th scope="col">Ngân Hàng</th>
						<th scope="col">Số tài khoản</th>
						<th scope="col">Chi Nhánh</th>
					</tr>
				</thead>
				<tbody>
					<?php $payment->show_payment_atm();?>
				</tbody>
			</table>
		</div>
		<div class="form-group nap-momo">
			<div class="alert alert-success" role="alert">
				<p>VUI LÒNG QUÉT MÃ VẠCH PHÍA DƯỚI ĐỂ THANH TOÁN</p>
				<hr>
				<p>Thanh toán sẽ được thực hiện tự động!</p>
			</div>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Vui lòng!</strong> Thực hiện đúng các bước để nạp tiền.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="img-payment-momo text-center">
				<img src="https://api.gatepay.vn/api/momo/qrcode?key=d77eee9253e2ed1beb065fe612763db1&phone=<?php $payment->show_payment_momo();?>">
			</div>
			<form method="POST">
				<div class="form-group">
					<span>Mã giao dịch:</span>
					<input  type="text"  class="form-control" name="idPayment-MOMO" required>
				</div>
				<div class="form-group">
			     	<div class="h-captcha" data-sitekey="b3691d2a-2c8e-4ab9-9a0f-b67ef8740406"></div>
			    </div>
				<div class="mt-2">
					<button name="payment-momo" id="payment" class="btn btn-outline-success">Nạp ngay</button>
				</div>
			</form>
			<?php include_once("hdmomo.php"); ?>
		</div>
	</div>
</article> 