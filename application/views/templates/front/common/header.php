<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>জীবনজয়ী</title>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">  

    <link rel="icon" type="image/svg+xml" href="<?= base_url();?>/default.svg">
    <link rel="apple-touch-icon" sizes="192x92" href="<?= base_url();?>/favicons/favicon-192x192.png">
    <link rel="icon" type="image/png" sizes="192x92" href="<?= base_url();?>/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url();?>/favicons/favicon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url();?>/favicons/favicon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url();?>/favicons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url();?>/favicons/favicon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url();?>/favicons/favicon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url();?>/favicons/favicon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url();?>/favicons/favicon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url();?>/favicons/favicon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url();?>/favicons/favicon-180x180.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url();?>/favicons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url();?>/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="36x36" href="<?= base_url();?>/favicons/favicon-36x36.png">
    <link rel="icon" type="image/png" sizes="48x48" href="<?= base_url();?>/favicons/favicon-48x48.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url();?>/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="128x128" href="<?= base_url();?>/favicons/favicon-128x128.png">
    <link rel="icon" type="image/png" sizes="512x512" href="<?= base_url();?>/favicons/favicon-512x512.png">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="<?= base_url();?>/css/view/style.css" rel="stylesheet">
	<link href="<?= base_url();?>/css/view/uniq.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Libre+Barcode+128&family=Noto+Sans+Bengali:wght@100..900&display=swap" rel="stylesheet">
	<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=67d3d041069b9100198cfa4c&product=inline-share-buttons&source=platform" async="async"></script>
</head>
<body>
	<section class="menu-blog web">
		<nav class="navbar navbar-dark fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?= base_url();?>">
					<img src="<?= base_url();?>/view/img/jj_logo.svg" alt="logo" class="img-fluid" width="200">
				</a>
				<div class="pc-btn">
					<form class="d-flex mt-3 serch-btn" role="search1" style="top: 11%;">
						<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search1">
						<button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button>
					</form>
				</div>

				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
					<div class="offcanvas-header" style="border-bottom: 2px solid;">
						<h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">জীবনজয়ী</h5>
						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
							<?php foreach ($cats as $category) { ?>							
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('/category/detail/');?><?= $category->slug;?>"><?= $category->title;?></a>
							</li>
							<?php }?>
							 
						</ul>

					</div>
				</div>
			</div>


			<div class="swiper mySwiper">
				<div class="swiper-wrapper">
					<?php foreach ($cats as $category) { ?>
					<div class="swiper-slide"><a href="<?= base_url('/category/detail/');?><?= $category->slug;?>"><?= $category->title;?></a></div>
					<?php }?>
				</div>
				<div class="swiper-pagination"></div>
			</div>


			<div class="menu-tab">
				<ul>
					<?php foreach ($cats as $category) { ?>
					<li><a href="<?= base_url('/category/detail/');?><?= $category->slug;?>" class="<?= ($category->slug==$this->uri->segment(3))?"active":""?>" ><?= $category->title;?></a></li>
					<?php }?>
				</ul>

			</div>

		</nav>
	</section>