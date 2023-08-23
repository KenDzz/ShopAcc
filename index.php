<?php
session_start();
include_once("Controller/alert.class.php");
include_once("Controller/function.class.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<title><?php require_once("module/title.php") ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="lib/sweetalert2/package/dist/sweetalert2.min.css">
	<link rel="stylesheet" type="text/css" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
	<link rel="icon" type="image/png" href="<?php echo $Func->logo_website(); ?>"/>
	<link rel="stylesheet" type="text/css" href="lib/NProgress/nprogress.css">
	<script src="lib/jquery/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="js/app.js"></script> 
</head>
<body>
	<!-- <div id='loading' style='display: none'>
  		<img src='../img/loading.svg' />
	</div> -->
	<?php include "view/menu.php"; ?>
	<div class="container-fluid-second">
		<?php
		if(isset($_GET['page']) && file_exists("module/".$_GET['page'].".php"))
			include "module/".$_GET['page'].".php";
		else
			include "trangchu.php";
		?>
	</div>
	<?php include "view/footer.php"; ?>
	<!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <div class="fb-customerchat"
	        attribution=setup_tool
	        page_id="1766038873662301"
	  theme_color="#13cf13"
	  logged_in_greeting="Tôi có thể giúp gì cho bạn ^_^"
	  logged_out_greeting="Tôi có thể giúp gì cho bạn ^_^">
      </div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
	<script src="lib/jquerylazy/jquery.lazy.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="lib/fontawesome/js/all.min.js"></script>
	<script src="lib/sweetalert2/package/dist/sweetalert2.all.min.js"></script>
	<script src="lib/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
	<script src="lib/notiflix/notiflix-aio-2.7.0.min.js"></script>
	<script src="lib/NProgress/nprogress.js"></script>
	<script>
		NProgress.start();
		NProgress.set(0.4);
		//Increment 
		var interval = setInterval(function() { NProgress.inc(); }, 1000);
		$(document).ready(function(){
		    NProgress.done();
		    clearInterval(interval);
		});
	</script>
	<script>
		$(function() {
	        $('img').lazy();
    	});
	</script>
	<script>
		$('.owl-carousel').owlCarousel({
			loop: true,
			margin: 20,
			autoplay: true,
			autoplayHoverPause: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 5
				},
			}
		})					
	</script>
	<script src="https://hcaptcha.com/1/api.js?hl=vi" async defer></script>
	<script src="https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
	<script>
		pathnameUrl = window.location.pathname.substr(1);
		getresult(pathnameUrl);
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function(){
      if (window.innerWidth < 768) {
      	 $(".layout-card-list-game").addClass("col-sm-6");
      }
    });
	</script>
</body>
</html>