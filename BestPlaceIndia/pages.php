  

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Places</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
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

       
        <!--Hero End -->
        <!-- Services Area Start -->
        <div class="services-area section-padding30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <!-- Section Tittle -->
                        <div class="section-tittle single-cat
single-cat text-center mb-80">
                            
                            <h2> The incredible India</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
<?php
 
   $sql = "SELECT * FROM master_places";
$stm = $pdo->query($sql);
// here you go:
$users = $stm->fetchAll();

foreach ($users as $row) {
  

    echo' <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat single-cat2 text-center ">
                            <div class="cat-icon">
                                <img src="admin/'.$row["image"].'" width="350" height="350">
                            </div>
                            <div class="cat-cap"><br>
                                <h5><a href="services.html">'.$row["place_name"].'</a></h5>
                                <p>'.$result = substr($row["place_desc"], 0, 200).'</p>
                            </div>
                            <a style="color:red" href="placedetails.php?id='.$row["id"].'">read more</a>

                           
                        </div>
                    </div>';
}
 



                    ?>
                   
                    
                 </div>
            </div>
        </div>
        <!-- Services Area End -->

    </main>
        <?php include('footer.php')?>
        
    </body>
</html>