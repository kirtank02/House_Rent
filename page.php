<?php
require_once('db_conn.php');
    if(isset($_GET['Property_id'])){
        $pid = $_GET['Property_id'];
    }
    $dataQuery = "SELECT * FROM property_details where Property_id = '$pid'";
    $dataResult = mysqli_query($con, $dataQuery);
    $row = mysqli_fetch_assoc($dataResult);
    $name = $row['Property_name'];
    $bed = $row['Beds'];
    $baths = $row['Baths'];
    $sqft = $row['SquareFeet'];
    $price = $row['Price'];
    $address = $row['Address1'].", ".$row['Address2'].", ".$row['City'].", ".$row['State'].", ".$row['Country'].", ".$row['Pincode'];
    $reg_id = $row['Registration_id'];
    $sql = "SELECT User_name, Mobile, Email from registration where Registration_id = '$reg_id'";
    $result = mysqli_query($con, $sql);
    $row2 = mysqli_fetch_assoc($result);
    $user = $row2["User_name"];
    $email = $row2['Email'];
    $mobile = $row2['Mobile'];
    $countsql = "SELECT COUNT(*) as total FROM review where Property_id = '$pid'";
    $rows = mysqli_query($con, $countsql);
    $countRow = mysqli_fetch_assoc($rows);
    $len = $countRow['total'];
    $reviewsql = "SELECT * from review where Property_id = '$pid'";
    $res = mysqli_query($con, $reviewsql);
    $review = array();
    $uname = array();
    while($row3 = mysqli_fetch_assoc($res)){
        $review[] = $row3['Review'];
        $uname[] = $row3['name'];
    }
    if(isset($_POST['add'])){
        if(isset($_POST['review'])){
            if(isset($_POST['reviewer'])){
                $rname = $_POST['reviewer'];
                $remsg = $_POST['review'];
                $ins = "INSERT INTO review (Review, Property_id, name) VALUES('$remsg', '$pid', '$rname')";
                mysqli_query($con, $ins);
            }
        }
    }       
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Custom CSS */
        
        .navbar-hidden {
            display: none;
        }
        
        .container .col {
            display: flex;
            flex-wrap: wrap;
        }
        
        .container .col a {
            flex: 1 0 33.333%;
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">RentFlow</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>

                </div>
            </nav>
        </div>



        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5"><br><br><br>
                    <h1 class="display-5 animated fadeIn mb-4"><?php echo $name; ?>: <span class="text-primary">Perfect Home</span> To Live With Joy</h1>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="navbar-nav ms-auto">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <ul>
                                                <li><p><i class="fa fa-map-marker-alt text-primary me-2"></i>
                                                    <?php 
                                                        echo $address;
                                                    ?></li>
                                                <li><p><i class="fa fa-bed text-primary me-2"></i>
                                                    Provided with <?php echo $bed; ?> Bedroom</p>
                                                </li>
                                                <li>
                                                    <p><i class="fa fa-bath text-primary me-2"></i>Include <?php echo $baths; ?> Bathroom</p>
                                                </li>
                                                <li>
                                                    <p><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $sqft; ?> sqft large area</p>
                                                </li>
                                            </ul></br>
                                        </div>
                                        <div class="row">
                                            <div class="col"><h5>Price &nbsp;&nbsp;</h5>
                                            <h5 class="text-primary mb-3">
                                            <?php
                                                echo ' ₹'.$price;
                                            ?>
                                        </h5><h5>/Month</h5></div>
                                        </div> 
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn" style="font-size: 20px;">Book Now</a>
                </div>

                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Client -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Property's Agent</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md- wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="2.jpg" alt="">
                                
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Kirtan</h5></br>
                                <h6><i class="fa fa-envelope-open text-primary"></i><?php echo $email; ?></h6>
                                <h6><i class="fa fa-phone-alt text-primary"></i><?php echo $mobile; ?></h6>
                                <small></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Review -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Reviews</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                        eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <?php for($i = 0; $i < $len; $i++){ ?>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p><?php echo $review[$i];?></p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/download.png"
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1"><?php echo $uname[$i];?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <form method="post">
            <div class="container-fluid bg-primary mb-5 wow fadeIn d-flex align-items-center justify-content-center"
                data-wow-delay="0.1s" style="padding: 35px;">
                <div class="container">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" name="review" class="form-control border-0 py-3"
                                placeholder="Add Review"></br>
                                <input type="text" name="reviewer" class="form-control border-0 py-3"
                                placeholder="Your Name">
                        </div>
                        <div class="col-md-2">
                            <button name="add" class="btn btn-dark border-0 w-100 py-3">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <!-- Center aligning the content -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="border-bottom border-white pb-4">
                            <!-- Adding border and padding -->
                            <h5 class="text-white mb-4">Get In Touch</h5>
                            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>PDEU, Gandhinagar</p>
                            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 9879639930</p>
                            <p class="mb-2"><i class="fa fa-envelope me-3"></i>rentflow@gmail.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="border-bottom border-white pb-4">
                            <h5 class="text-white mb-4">Photo Gallery</h5>
                            <div class="row g-2 pt-2">
                                <div class="col-4">
                                    <img class="img-fluid rounded bg-light p-1" src="img/property-1.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid rounded bg-light p-1" src="img/property-2.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid rounded bg-light p-1" src="img/property-3.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid rounded bg-light p-1" src="img/property-4.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid rounded bg-light p-1" src="img/property-5.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid rounded bg-light p-1" src="img/property-6.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="border-bottom border-white pb-4">
                            <h5 class="text-white mb-4">Quick Links</h5>
                            <a class="btn btn-link text-white-50" href="about.html">About Us</a>
                            <a class="btn btn-link text-white-50" href="contact.html">Contact Us</a>
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
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>