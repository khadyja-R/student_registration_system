<?php
include "Languages.php";
$en_select='';
$fr_select='';		
$language='';
if((isset($_GET['language']) && $_GET['language']=='fr') || !isset($_GET['language'])){
	$fr_select='selected';	
	$language='fr';
}else{
	$en_select='selected';
	$language='en';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="text-secondary">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="./assets//img/ests.JPEG" width="60" height="60" class="d-inline-block align-top" alt="">

        </a>
        <nav id="navbar" class="navbar">
            <ul>
            <select onchange="set_language()" name="language" id="language">
                    <option value=""></option>
                    <option value="en" <?php echo $en_select?>>  <?php echo $nav[$language]['2']?></option>
                    <option value="fr" <?php echo $fr_select?>>  <?php echo $nav[$language]['3']?></option>
                </select>
                <i><a class="nav-link scrollto" href="../Login/index.php?language=<?php echo $language; ?>">
                <?php echo $nav[$language]['0']?>
                    </a></i>
                <i> <a href="#sec2">  <?php echo $nav[$language]['1']?></a>
                </i>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </nav>
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="carousel-background"><img src="assets/img/slide/slide-1.jpg" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">
                                    <?php echo $Sub_Title[$language]['0']?><span></span></h2>
                                <p class="animate__animated animate__fadeInUp"><?php echo $Sub_Title[$language]['1']?>
                                </p>
                                <li style="color: white"><?php echo $Sub_Title[$language]['2']?></li>
                                <li style="color: white"><?php echo $Sub_Title[$language]['3']?></li>
                                <li style="color: white"><?php echo $Sub_Title[$language]['4']?></li>
                                <li style="color: white"><?php echo $Sub_Title[$language]['5']?></li>
                                <li style="color: white"><?php echo $Sub_Title[$language]['6']?></li>
                                <li style="color: white"><?php echo $Sub_Title[$language]['7']?></li>
                                <a href="../Inscription/PersonalInfo.php?language=<?php echo $language; ?>"
                                    class="btn-get-started animate__animated animate__fadeInUp scrollto"><?php echo $Sub_Title[$language]['8']?></a>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="carousel-background"><img src="assets/img/slide/slide-2.jpg" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown"><?php echo $Ests[$language]['0']?>
                                </h2>
                                <article class="animate__animated animate__fadeInUp">
                                    <?php echo $Ests[$language]['1']?>
                                </article>
                                <a href="../Inscription/PersonalInfo.php?language=<?php echo $language; ?>"
                                    class="btn-get-started animate__animated animate__fadeInUp scrollto"><?php echo $Ests[$language]['2']?></a>
                            </div>
                            <footer>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section id="sec2">
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span></span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <?php echo $footer[$language]['0']?>
                            </h6>
                            <p>
                                <a href="#!" class="text-reset"> <?php echo $footer[$language]['1']?>
                                </a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset"> <?php echo $footer[$language]['2']?>
                                </a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset"> <?php echo $footer[$language]['3']?></a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset"> <?php echo $footer[$language]['4']?>

                                </a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4"> <?php echo $footer[$language]['5']?></h6>
                            <p><i class="bi bi-geo-alt"></i>Route Dar Si-Aïssa BP. 89 Av. Echahid Mbarek El Mokhtar,
                                Safi</p>
                            <p>
                                <i class="bi bi-envelope-open"></i>
                                info@example.com
                            </p>
                            <p><i class="bi bi-telephone"></i> 05246-12914
                            </p>

                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2022 Copyright:
                <a class="text-reset fw-bold" href="#">ESTS</a>
            </div>
            <!-- Copyright -->
        </footer>
    </section>
    <!-- Footer -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
    function set_language() {
        var language = document.querySelector('#language');
        language = language.value;
        window.location.href = 'index.fr.php?language=' + language;
    }
    </script>
</body>

</html>