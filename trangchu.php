<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active" data-interval="10000">
			<img src="img/HedHNLutmr_1609907024.jpg" class="d-block w-100 h-100" alt="...">
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="trend mt-5">
		<p class="h2 text-center font-weight-bold">DỊCH VỤ NỔI BẬT</p>
		<hr class="hr-home">
		<div class="slide-trend">
			<div class="owl-carousel owl-theme">
				<?php $Func->show_category(); ?>
			</div>
		</div>
		<?php 	$sale = $Func->timer_sale();
				if (!empty($sale)) {
				foreach($sale as $k=>$v) { 
					$date = $sale[$k]['date'];
					$h = $sale[$k]['h'];
					$m = $sale[$k]['m'];
					$s = $sale[$k]['s'];
				}
				date_default_timezone_set("Asia/Bangkok");
				$timer = strtotime("$date $h:$m:$s" );
				$timer_now = time();
				?>
			<div class="flash-sale mt-5">
				<div class="row flex-nowrap">
					<div class="col-11 img-sale ml-3">
						<div class="d-inline-flex">
							<img src="img/text_sale.png" class="img-flash-sale">
							<div class="flash-layout">
								<img src="img/flash.58c23cbd5acb582e056dc2ef0543121d.png" class="img-flash">
							</div>
						</div>
						<div class="d-inline-flex"> 
							<div id="timer">
								<div class="days">
								  <div class="numbers" id="days-number">0</div><span class="text-timer">Ngày</span>
								</div>
								<div class="hours">
								  <div class="numbers" id="hours-number">0</div><span class="text-timer">Giờ</span>
								</div>
								<div class="minutes">
								  <div class="numbers" id="minutes-number">0</div><span class="text-timer">Phút</span>
								</div>
								<div class="seconds">
								  <div class="numbers" id="seconds-number">0</div><span class="text-timer">Giây</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-1 read-more-sale">
						<div class="d-flex flex-row-reverse">
			                <div class="read-more-sale">
			                	<a class="badge badge-info" href="#">Xem tất cả ></a>
			                </div>
						</div>
					</div>
				</div> 
				<hr>
				<div class="owl-carousel owl-theme">
					<?php $Func->show_sale(); ?>
				</div>
			</div>
			<!-- JS COUNTDOWN SALE HOME -->
			<script>
				var id = $('#id_acc').val();
				var countDownDate = <?php echo $timer; ?> * 1000;
				var now = <?php echo $timer_now; ?> * 1000;
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
					// Output the result in an element with id="demo"
					document.getElementById("days-number").innerHTML = days;
					document.getElementById("hours-number").innerHTML = hours;
					document.getElementById("minutes-number").innerHTML = minutes;
					document.getElementById("seconds-number").innerHTML = seconds; 
					// If the count down is over, write some text 
					if (distance < 0) {
						clearInterval(x);
						document.getElementById("days-number").innerHTML = 0;
						document.getElementById("hours-number").innerHTML = 0;
						document.getElementById("minutes-number").innerHTML = 0;
						document.getElementById("seconds-number").innerHTML = 0;
						sale_timer(id);
						location.reload();
					}
				}, 1000);
			</script>
			<!-- END JS COUNTDOWN SALE HOME -->
		<?php } ?>
		<div class="game mt-5">
			<p class="h2 text-center font-weight-bold">DANH MỤC GAME</p>
			<hr class="hr-home">
			<div class="container" data-slider="owl">
				<div class="list-game row">
					<?php $Func->show_list_game(); ?>
				</div>
			</div>
		</div>
		<div class="lucky mt-5" id="lucky"> 
			<p class="h2 text-center font-weight-bold">VÒNG QUAY MAY MẮN</p>
			<hr class="hr-home">
			<div class="container">
				<div class="list-lucky row">
					<?php $Func->show_list_luckey_wheel(); ?>
				</div>
			</div>
		</div>
	</div>
