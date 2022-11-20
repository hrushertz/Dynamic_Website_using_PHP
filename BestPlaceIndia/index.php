 <!doctype html>

<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "best_places_india");
function make_query($connect)
{
 $query = "SELECT * FROM master_banner ORDER BY id ASC";
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_slide_indicators($connect)
{
 $output = ''; 
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($connect)
{
 $output = '';
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="admin/'.$row["image"].'" alt="'.$row["id"].'" />
   <div class="carousel-caption">
     
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}

?>

<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Index</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  
 
 <?php include 'header.php'; ?>
    <main>

        <!-- slider Area Start-->
        <div class="slider-area slider-height" data-background="assets/img/hero/h1_hero.jpg">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider">
                    <div class="slider-cap-wrapper">
                        <div class="hero__caption">
                             
                            <h1 data-animation="fadeInLeft" data-delay=".5s">Magnificent Bharat</h1>
                            <!-- Hero Btn -->
                            
                        </div>
                        <div class="hero__img">
                          <div class="container">
 
   <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators($connect); ?>
    </ol>

    <div class="carousel-inner">
     <?php echo make_slides($connect); ?>
    </div>
    <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>

   </div>
  </div>
                        </div>
                    </div>
                </div>
                
            </div>
 
        <!-- About Law Start-->
        <div class="about-low-area section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class=" text-center about-caption mb-50">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-35">
                                <span>About Us</span>
                                <h2>    The best places in india</h2>
                            </div>
                            <p>Interesting and Intriguing, India offers incredible holiday experiences through its cultural, topography, and wildlife diversity. With these amazing and unique experiences, this south Asian country conveniently finds its way into the world tourism map as one of the finest destinations for a holistic vacation.</p>
                            <p>India establishes its identity as the country of architectural masterpieces, making it an ideal travel destination to plan a heritage tour in the world. While Taj Mahal makes for the major draw on an India tour, there are a plethora of monuments and edifices in every India travel guide displaying the fine architecture and grandiose of different eras in the country.</p>
                             
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- About Law End-->
        <!-- Services Area Start -->


        <div class="services-area pt-150 pb-150" data-background="assets/img/gallery/section_bg02.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <span>Best Places</span>
                            <h2>The best places in india</h2>
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
  
  echo'<div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat text-center mb-50">
                            <div class="cat-icon">
                                 <img src="admin/'.$row["image"].'" width="230" height="300">
                            </div>
                            <div class="cat-cap">
                               <h5><a href="pages.php">'.$row["place_name"].'</a></h5>
                                
                            </div>
                        </div>
                    </div>';
}
 



                    ?>
                   
                    


 

                 </div>
            </div>
        </div>
        <!-- Services Area End -->

        <?php include('footer.php')?>
        <!-- Support Company Start-->
         
    </main>
        
    </body>
</html>