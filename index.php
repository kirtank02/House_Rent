<?php
if (!isset($_GET['regid'])) {
    header("Location: login.php");
    exit();
}
include ('db_conn.php');
$ftotalRows = "";
if (isset($_POST['filter'])) {
    if (isset($_POST['filtercity'])) {
        $filter = $_POST['filtercity'];
        $countQuery = "SELECT COUNT(*) as total FROM property_details where City = '$filter'";
        $countResult = mysqli_query($con, $countQuery);
        $countRow = mysqli_fetch_assoc($countResult);
        $ftotalRows = $countRow['total'];
        $dataQuery = "SELECT * FROM property_details where City = '$filter'";
        $dataResult = mysqli_query($con, $dataQuery);
        $fname = array();
        $fimage = array();
        $fprice = array();
        $faddress = array();
        $fbaths = array();
        $fbed = array();
        $fsqft = array();
        $fid = array();
        while ($row = mysqli_fetch_assoc($dataResult)) {
            $fname[] = $row['Property_name'];
            $fimage[] = $row['Property_Image'];
            $fprice[] = $row['Price'];
            $fbaths[] = $row['Baths'];
            $fsqft[] = $row['SquareFeet'];
            $fbed[] = $row['Beds'];
            $faddress[] = $row['Address1'] . ', ' . $row['City'] . ', ' . $row['Country'];
            $fid[] = $row['Property_id'];
        }
    }
}
$countQuery = "SELECT COUNT(*) as total FROM property_details";
$countResult = mysqli_query($con, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalRows = $countRow['total'];
$dataQuery = "SELECT * FROM property_details";
$dataResult = mysqli_query($con, $dataQuery);
$name = array();
$image = array();
$price = array();
$address = array();
$baths = array();
$bed = array();
$sqft = array();
$id = array();
while ($row = mysqli_fetch_assoc($dataResult)) {
    $name[] = $row['Property_name'];
    $image[] = $row['Property_Image'];
    $price[] = $row['Price'];
    $baths[] = $row['Baths'];
    $sqft[] = $row['SquareFeet'];
    $bed[] = $row['Beds'];
    $address[] = $row['Address1'] . ', ' . $row['City'] . ', ' . $row['Country'];
    $id[] = $row['Property_id'];
}
$reg_id = $_GET['regid'];
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
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

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
    </style>
    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var mobile = document.getElementById("mobile").value;
            var address1 = document.getElementById("address1").value;
            var address2 = document.getElementById("address2").value;
            var city = document.getElementById("city").value;
            var state = document.getElementById("state").value;
            var country = document.getElementById("country").value;
            var pincode = document.getElementById("pincode").value;
            var password = document.getElementById("pass").value;
            var confirmPassword = document.getElementById("cnf").value;
            // Check if any field is empty
            if (username.trim() == '' || email.trim() == '' || mobile.trim() == '' || address1.trim() == '' || address2.trim() == '' || city.trim() == '' || state.trim() == '' || country.trim() == '' || pincode.trim() == '') {
                alert('Please fill in all fields.');
                return false; // Prevent form submission
            }

            // Validate email format
            var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!email.match(emailRegex)) {
                alert('Please enter a valid email address.');
                return false; // Prevent form submission
            }

            // Validate mobile number format (assuming a 10-digit Indian mobile number)
            var mobileRegex = /^[6-9]\d{9}$/;
            if (!mobile.match(mobileRegex)) {
                alert('Please enter a valid mobile number.');
                return false; // Prevent form submission
            }

            // Additional validation rules can be added here

            // If all validations pass, allow form submission
            // Check if password and confirm password fields are empty
            if (password.trim() == '' || confirmPassword.trim() == '') {
                alert('Please fill in both password fields.');
                return false; // Prevent form submission
            }

            // Check if passwords match
            if (password !== confirmPassword) {
                alert('Passwords do not match. Please re-enter.');
                return false; // Prevent form submission
            }

            // Check if password meets strength requirements
            var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})");
            if (!strongRegex.test(password)) {
                alert('Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long.');
                return false; // Prevent form submission
            }

            // If all validations pass, allow form submission
            return true;
        }
    </script>

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                        <a href="index.php?regid=<?php echo $reg_id;?>" class="nav-item nav-link active">Home</a>
                        <a href="about.php?regid=<?php echo $reg_id;?>" class="nav-item nav-link">About</a>
                        <a href="contact.php?regid=<?php echo $reg_id;?>" class="nav-item nav-link">Contact</a>
                    </div>
                    <!-- <div class="d-flex align-items-center">
                        <button type="button" id="loginBtn"
                            class="btn nav-item nav-link btn-primary px-3 d-none d-lg-flex me-2">Login</button>
                        <button type="button" id="signInBtn"
                            class="btn nav-item nav-link btn-primary px-3 d-none d-lg-flex" data-bs-toggle="modal"
                            data-bs-target="#SignIn">Sign IN</button>
                    </div> -->
                </div>
            </nav>
        </div>


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To
                        Live With Your Family</h1>
                    <p class="animated fadeIn mb-4 pb-2">Have overdose of porperty? Then upload here</p>
                    <a href="addpro.php?regid=<?php echo $reg_id ?>"
                        class="btn btn-primary py-3 px-5 me-3 animated fadeIn" style="font-size: 24px;">Add Property</a>
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
        <!-- Header End -->


        <!-- Search Start -->
        <form method="post">
            <div class="container-fluid bg-primary mb-5 wow fadeIn d-flex align-items-center justify-content-center"
                data-wow-delay="0.1s" style="padding: 35px;">
                <div class="container">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" name="filtercity" class="form-control border-0 py-3"
                                placeholder="Search City Name">
                        </div>
                        <div class="col-md-2">
                            <button name="filter" class="btn btn-dark border-0 w-100 py-3">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Filtered Searches</h1>
                            <p>Explore from Apartments, land, builder floors, villas and more</p>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <?php
                            for ($i = 0; $i < $ftotalRows; $i++) {
                                ?>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href="page.html">
                                                <?php
                                                echo '<img class="img-fluid" src="' . $fimage[$i], '" alt="" style="width: 600px; height: 271px;">';
                                                ?>
                                            </a>
                                            <div
                                                class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                For Rent</div>
                                            <!-- <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Appartment</div> -->
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">
                                                <?php
                                                echo '₹' . $fprice[$i];
                                                ?>
                                            </h5>
                                            <a class="d-block h5 mb-2" href="">
                                                <?php
                                                echo $fname[$i];
                                                ?>
                                            </a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>
                                                <?php
                                                echo $faddress[$i];
                                                ?>
                                            </p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-ruler-combined text-primary me-2"></i>
                                                <?php echo $fsqft[$i]; ?> sqft
                                            </small>
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-bed text-primary me-2"></i>
                                                <?php echo $fbed[$i]; ?> Bed
                                            </small>
                                            <small class="flex-fill text-center py-2"><i
                                                    class="fa fa-bath text-primary me-2"></i>
                                                <?php echo $fbaths[$i]; ?> Bath
                                            </small>
                                        </div>
                                        <a class="btn btn-primary border-0 w-100 py-3"
                                            href="page.php?Property_id=<?php echo $fid[$i]; ?>">See Details</a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search End -->
        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Property Listing</h1>
                            <p>Explore from Apartments, land, builder floors, villas and more</p>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <?php
                            for ($i = 0; $i < $totalRows; $i++) {
                                ?>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href="page.html">
                                                <?php
                                                echo '<img class="img-fluid" src="' . $image[$i], '" alt="" style="width: 600px; height: 271px;">';
                                                ?>
                                            </a>
                                            <div
                                                class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                For Rent</div>
                                            <!-- <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Appartment</div> -->
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">
                                                <?php
                                                echo '₹' . $price[$i];
                                                ?>
                                            </h5>
                                            <a class="d-block h5 mb-2" href="">
                                                <?php
                                                echo $name[$i];
                                                ?>
                                            </a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>
                                                <?php
                                                echo $address[$i];
                                                ?>
                                            </p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-ruler-combined text-primary me-2"></i>
                                                <?php echo $sqft[$i]; ?> sqft
                                            </small>
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-bed text-primary me-2"></i>
                                                <?php echo $bed[$i]; ?> Bed
                                            </small>
                                            <small class="flex-fill text-center py-2"><i
                                                    class="fa fa-bath text-primary me-2"></i>
                                                <?php echo $baths[$i]; ?> Bath
                                            </small>
                                        </div>
                                        <a class="btn btn-primary border-0 w-100 py-3"
                                            href="page.php?Property_id=<?php echo $id[$i]; ?>">See Details</a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Property List End -->
        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our Clients Say!</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                        eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet
                                diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg"
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet
                                diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg"
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet
                                diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg"
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


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
    <script>
        document.getElementById('loginBtn').addEventListener('click', function () {
            // Hide the navbar
            document.querySelector('.navbar').style.display = 'none';
            // Show the login modal
            var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        });

        // Show navbar when login modal is closed
        document.getElementById('loginModal').addEventListener('hidden.bs.modal', function () {
            document.querySelector('.navbar').style.display = 'block';
        });
    </script>
    <script>
        // Function to handle showing the navbar and displaying the Sign In modal
        document.getElementById('signInBtn').addEventListener('click', function () {
            // Hide the navbar
            document.querySelector('.navbar').style.display = 'none';
            // Show the Sign In modal
            var signInModal = new bootstrap.Modal(document.getElementById('signInModal'));
            signInModal.show();
        });

        // Show navbar when Sign In modal is closed
        document.getElementById('signInModal').addEventListener('hidden.bs.modal', function () {
            document.querySelector('.navbar').style.display = 'block';
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#registerButton').click(function () {
                console.log("Register button clicked");
                // Hide the navbar
                $('.navbar').parent().css('display', 'none');
                // Show the registration confirmation modal
                $('#registrationConfirmationModal').modal('show');
                // Hide the sign-in modal if it's open
                $('#signInModal').modal('hide');
            });

            $('#registrationConfirmationModal').on('hidden.bs.modal', function () {
                console.log("Registration confirmation modal hidden event triggered");
                // Show the navbar when registration confirmation modal is closed
                $('.navbar').parent().css('display', 'block');
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#registerButton').click(function () {
                console.log("Register button clicked");
                // Hide the navbar
                $('.navbar-new').parent().css('display', 'none');
                // Show the registration confirmation modal
                $('#registrationConfirmationModal').modal('show');
                // Hide the sign-in modal if it's open
                $('#signInModal').modal('hide');
            });

            $('#registrationConfirmationModal').on('hidden.bs.modal', function () {
                console.log("Registration confirmation modal hidden event triggered");
                // Show the navbar when registration confirmation modal is closed
                $('.navbar-new').parent().css('display', 'block');
            });
        });
    </script>
    <!-- JavaScript -->
    <script>
        $(document).ready(function () {
            $('#registerButton').click(function () {
                console.log("Register button clicked");
                // Hide the navbar
                $('.navbar').addClass('navbar-hidden');
                // Show the registration confirmation modal
                $('#registrationConfirmationModal').modal('show');
                // Hide the sign-in modal if it's open
                $('#signInModal').modal('hide');
            });

            $('#registrationConfirmationModal').on('hidden.bs.modal', function () {
                console.log("Registration confirmation modal hidden event triggered");
                // Show the navbar when registration confirmation modal is closed
                $('.navbar').removeClass('navbar-hidden');
            });
        });
    </script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>