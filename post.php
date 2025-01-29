<?php 	require 'admin/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ABCProperty - Real Estate </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
 

        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.php" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 70px; height: 70px;">
                    </div>
                    <h1 class="m-0 text-primary">ABCProperty</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link ">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                                                <a href="terms-conditions.php" class="nav-item nav-link ">Terms and conditions</a>

                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    
                    
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
<!-- fetch data -->
<?php
                        $a=1;
                        $stmt = $conn->prepare(
                                "SELECT * FROM properties where id = '".$_GET["id"]."' LIMIT 1");
                        $stmt->execute();
                        $data = $stmt->fetchAll();
                        
                        foreach($data as $row)
                        {
                    ?>



<div class="text-start mx-auto " >
                            <h1 class="mb-3"><?php echo $row['title']?></h1>
                            <p><?php echo $row['location']?></p>
                        </div>
                    <div class=" " >
                                <div class=" rounded overflow-hidden">
                                        <a href=""><img class="img-fluid w-full"  style="width:100%" src="admin/crud/files/<?php echo $row['image_name']?>" alt=""></a>
                                    <div class="p-4 pb-0">
                                    <h5 class="text-primary mb-3">$ <?php echo $row['price']?></h5>
                                        <a class="d-block h5 mb-2" href=""><?php echo $row['title']?></a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['location']?></p>

                                    </div>
                                    <div class=" border-top text-center">
                                        <small class=" text-center py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $row['size']?> </small>
                                        <hr/>
                                        <p class="text-left"><?php echo $row['description']?></p>
                                    </div>
                                </div>
                            </div>
                    <?php
                    }
                    ?>
                            
<!-- fetch data end -->
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Property List End -->



        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-9 col-md-9">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>No 15,  Colombo </p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+94704238939 </p>
                        <p class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M240-400h320v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z"/></svg
                        >  Whatsapp : +94704238939 </p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>nalindadsn@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <!--<a class="btn btn-link text-white-50" href="about.html">About Us</a>-->
                        <a class="btn btn-link text-white-50" href="index.php">Home</a>
                        <a class="btn btn-link text-white-50" href="about.php">About Us</a>
                        <a class="btn btn-link text-white-50" href="contact.php">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="terms-conditions.php">Terms and conditions</a>
                    </div>
                   
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
							

							Designed By  <a class="border-bottom"  href="https://stackprod.com">stackprod</a> | email: <a class="border-bottom"  href="mailto:stackprod.info@gmail.com">stackprod.info@gmail.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>