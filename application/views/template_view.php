<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>Основная страница</title>

	<!-- Link styles -->
	<link rel="stylesheet" href="/css/style.css"/>
	<link rel="stylesheet" href="/css/template_styles.css">

	<!-- Link plugins -->
	<script src="/plugins/jquery/jquery.js"></script>
	<script src="/plugins/tinymce/tinymce.min.js"></script>

</head>
<body>

<!-- Header -->
<header class="header">
	<div class="content">
		<ul class="menu header__menu">
			<li class="menu__item"><a href="#" class="menu__link">Home</a></li>
			<li class="menu__item"><a href="#" class="menu__link">About</a></li>
		</ul>
	</div>
</header>
<!-- / Header -->

<!-- Min Content -->
<main class="wrapper">
	<div class="content">

<!-- Title -->
		<section class="title">
			<a href="/" class="title__text">Mini Blog</a>
			<h6 class="title__desc">
				Author by Vasiliy Nikiforov
			</h6>
		</section>
<!-- / Title -->

<!-- Include content action -->
		<?php
			$controller = $this->controller->get_name_controller();
			include "application/views/$controller/$action.php";
		?>
<!-- / Include content action -->

	</div>
</main>
<!-- / Main Content -->

<!-- Footer -->
<footer class="footer">
	<div class="content"><span class="footer__author">© kaktusv6</span></div>
</footer>
<!-- / Footer -->

<!-- Background -->
<div class="background">
	<div class="background__on-color"></div>
</div>
<!-- / Background -->

<!--<script src="/plugins/jquery/jquery-ui.min.css"></script>-->
<!--<script src="/plugins/jquery/jquery-ui.min.js"></script>-->
<!--<script src="/plugins/jquery/jquery-ui.structure.min.css"></script>-->
<!--<script src="/plugins/jquery/jquery-ui.theme.min.css"></script>-->
<!-- / Link plugins -->
</body>
</html>