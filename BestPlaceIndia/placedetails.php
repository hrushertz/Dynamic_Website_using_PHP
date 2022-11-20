 
<?php
$id=$_GET['id'];

 ?>


<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Finance HTML-5 Template </title>
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
                
<?php
 
   $sql = "SELECT * FROM master_places WHERE id=$id";
$stm = $pdo->query($sql);
// here you go:
$users = $stm->fetchAll();

foreach ($users as $row) {

  

    echo' <h1 class="text-center"><a href="services.html">'.$row["place_name"].'</a></h1><br><div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="">
                            <div class="cat-icon">
                                
                            </div>
                            <div class="cat-cap"> 
                                
                                <p> '.$row["place_desc"].'</p>
                                <p>Located in : '.$row["location"].'</p>
                                <p>Address : '.$row["address"].'</p>
                                <p>Hours : '.$row["opentime"].'</p>
                                <p> Height : '.$row["heights"].'</p>
                                <p>Floors : '.$row["floors"].'</p>
                                <p>Alternative Name : '.$row["Alt_names"].'</p>
                                <p>Architect : '.$row["architect"].'</p>
                                <p>Main Contractor : '.$row["contractor"].'</p>
                            </div>
                            <a href="placedetails.php?id='.$row["id"].'">read more

                           
                        </div>
                    </div><div class="col-lg-6   col-md-6 col-sm-6">
                        <div class="text-center ">
                            <div class="cat-icon">
                                <img src="admin/'.$row["image"].'" width="600" height="600">
                            </div>
                             
                            
                           
                        </div>
                    </div>   
                 </div>';
}
 



                    ?>
                   
                 
            </div>
        </div>
        <!-- Services Area End -->

    </main>
        <?php include('footer.php')?>
        
    </body>
</html>