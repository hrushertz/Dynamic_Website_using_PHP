 

<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Gallery</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

 <!-- CSS here -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/slicknav.css">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/magnific-popup.css">
		<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
		<link rel="stylesheet" href="assets/css/themify-icons.css">
		<link rel="stylesheet" href="assets/css/slick.css">
		<link rel="stylesheet" href="assets/css/nice-select.css">
		<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Preloader Start -->
     
    <!-- Preloader Start -->

 <?php include 'header.php'; ?>

     <main>
		<!-- Hero Start-->
		<div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center">
			<div class="container">
					<div class="row">
						<div class="col-xl-12">
						<div class="hero-cap text-center pt-50">
								<h2>Image Gallery</h2>
						</div>
						</div>
					</div>
			</div>
		</div>
		<!--Hero End -->
		<!-- Start Sample Area -->
 
		  		 <div class="section-top-border">
				 
					<div class="row">

						<?php
 
   $sql = "SELECT * FROM  image_gallery";
$stm = $pdo->query($sql);
// here you go:
$users = $stm->fetchAll();

foreach ($users as $row) {
  
						echo'<div class="col-md-3">
						 
							<img src="admin/'.$row["image"].'" width="310" height="200"class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/img/elements/g1.jpg);"></div>
							</a>
						</div>';

						}
 



                    ?>
                   
						 
	</main>
 
        <?php include('footer.php')?>
</body>
</html>