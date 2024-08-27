<?php
include('db_conn.php');
if(!isset($_GET['regid'])){
    header('Location: login.php');
    exit();
}else{
$regid = isset($_GET['regid']) ? $_GET['regid'] : "";
}
if (isset($_POST['submit'])) {
    
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $address1 = isset($_POST['address1']) ? $_POST['address1'] : "";
    $address2 = isset($_POST['address2']) ? $_POST['address2'] : "";
    $city = isset($_POST['city']) ? $_POST['city'] : "";
    $state = isset($_POST['state']) ? $_POST['state'] : "";
    $country = isset($_POST['country']) ? $_POST['country'] : "";
    $pincode = isset($_POST['pincode']) ? $_POST['pincode'] : "";
    $bath = isset($_POST['baths']) ? $_POST['baths'] : "";
    $bed = isset($_POST['beds']) ? $_POST['beds'] : "";
    $price = isset($_POST['price']) ? $_POST['price'] : "";  
    $sqft = isset($_POST['sqft']) ? $_POST['sqft'] : "";
    $type = isset($_POST['type']) ? $_POST['type'] : "";
    $image = $_POST['image'];
    $folder = "img/" .$image;
    
    $getnamesql = "SELECT User_name from registration where Registration_id = '$regid'";
    $getname = mysqli_query($con, $getnamesql);
    $owner = mysqli_fetch_array($getname);
    $ownername = $owner["User_name"];
    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO `property_details` (`Property_name`, `Address1`, `Address2`, `City`, `State`, `Country`, `Pincode`, `Beds`, `Baths`, `SquareFeet`, `Price`, `Property_Image`, `Registration_id`, `Propertytype`) 
        VALUES ('$name', '$address1', '$address2', '$city', '$state', '$country', '$pincode', '$bath', '$bed', '$sqft', '$price', '$folder','$regid' ,'$type')";
    if(mysqli_query($con, $sql)){
        move_uploaded_file($_POST['image'], "img/$image");
    }
}

$countQuery = "SELECT COUNT(*) as total FROM property_details where Registration_id = '$regid'";
$countResult = mysqli_query($con, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalRows = $countRow['total'];
$dataQuery = "SELECT * FROM property_details where Registration_id = '$regid'";
$dataResult = mysqli_query($con, $dataQuery);
$proname = array();
$proimage = array();
$proprice = array();
$proaddress = array();
$probaths = array();
$probed = array();
$prosqft = array();
$proid = array();
while ($row = mysqli_fetch_assoc($dataResult)) {
    $proname[] = $row['Property_name'];
    $proimage[] = $row['Property_Image'];
    $proprice[] = $row['Price'];
    $probaths[] = $row['Baths'];
    $prosqft[] = $row['SquareFeet'];
    $probed[] = $row['Beds'];
    $proaddress[] = $row['Address1'] . ', ' . $row['City'] . ', ' . $row['Country'];
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

        .container .col {
            display: flex;
            flex-wrap: wrap;
        }

        .container .col a {
            flex: 1 0 33.333%;
            text-align: center;
        }
    </style>
    <style>
        .mb-3-btn {
            margin-bottom: 15px;
            /* Adjust the value as needed */
        }
    </style>

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
                        <a href="index.php?regid=<?php echo $regid;?>" class="nav-item nav-link active">Home</a>
                        <a href="about.php?regid=<?php echo $regid;?>" class="nav-item nav-link">About</a>
                        <a href="contact.php?regid=<?php echo $regid;?>" class="nav-item nav-link">Contact</a>
                    </div>

                </div>
            </nav>
        </div>



        <!-- Header Start -->
        <br><br><br>
        <form method="post" id="propertyForm">
            <!-- Set action to your PHP script handling confirmation -->
            <div class="container-fluid custom-margin custom-padding">
                <div class="row">
                    <div class="col-md-5 ps-0 mb-3 text-center my-1 mb-3">
                        <label class="form-label">Property Name</label>
                        <input type="text" class="form-control shadow-none" name="name">
                    </div>
                    <div class="col-md-5 ps-0 mb-3 text-center my-1 mb-3">
                        <label class="form-label">Property Type</label>
                        <input type="text" class="form-control shadow-none" name="type">
                    </div>
                    <div class="col-md-5 ps-0 mb-7 text-center my-1 mb-3">
                        <label class="form-label">Address 1</label>
                        <input type="text" name="address1" class="form-control shadow-none">
                    </div>
                    <div class="col-md-5 ps-0 mb-7 text-center my-1 mb-3">
                        <!-- Increased mb value to add more space -->
                        <label class="form-label">Address 2</label>
                        <input type="text" name="address2" class="form-control shadow-none">
                    </div>
                    <div class="col-md-5 ps-0 mb-7 text-center my-1 mb-3">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control shadow-none" name="city">
                    </div>
                    <div class="col-md-5 ps-0 mb-3 text-center my-1 mb-3">
                        <label class="form-label">State</label>
                        <input type="text" class="form-control shadow-none" name="state">
                    </div>
                    <div class="col-md-5 ps-0 mb-7 text-center my-1 mb-3">
                        <label class="form-label">Country</label>
                        <input type="text" class="form-control shadow-none" name="country">
                    </div>
                    <div class="col-md-5 ps-0 mb-7 text-center my-1 mb-3">
                        <label class="form-label">Pincode</label>
                        <input type="number" class="form-control shadow-none" name="pincode">
                    </div>
                    <div class="col-md-5 ps-0 mb-8 text-center my-1 mb-3">
                        <label class="form-label">Baths</label>
                        <input type="number" name="baths" class="form-control shadow-none">
                    </div>
                    <div class="col-md-5 ps-0 mb-7 text-center my-1 mb-3">
                        <label class="form-label">Beds</label>
                        <input type="number" name="beds" class="form-control shadow-none">
                    </div>
                    <div class="col-md-5 ps-0 mb-3 text-center my-1 mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control shadow-none" name="password">
                    </div>
                    <div class="col-md-5 ps-0 mb-3 text-center my-1 mb-3">
                        <label class="form-label">Property Image</label>
                        <input type="file" name="image" class="form-control shadow-none" name="otp">
                    </div>
                    <div class="col-md-5 ps-0 mb-3 text-center my-1 mb-3">
                        <label class="form-label">SquareFeet</label>
                        <input type="password" name="sqft" class="form-control shadow-none" name="confirm_password">
                    </div>


                </div>
                <div class=" text-center my-1 mb-3">
                    <button type="submit" id="submitForm" class="btn btn-dark shadow-none" name="submit">Confirm Add
                        Property</button>
                </div>
            </div>
        </form>


        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Your Listings</h1>
                            <p>Explore from Apartments, land, builder floors, villas and more</p>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <?php
                            if (count($proimage) > 0) {
                                for ($i = 0; $i < $totalRows; $i++) {
                                    ?>
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href="page.html">
                                                    <?php
                                                    echo '<img class="img-fluid" src="' . $proimage[$i], '" alt="" style="width: 600px; height: 271px;">';
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
                                                    echo '₹' . $proprice[$i];
                                                    ?>
                                                </h5>
                                                <a class="d-block h5 mb-2" href="">
                                                    <?php
                                                    echo $proname[$i];
                                                    ?>
                                                </a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>
                                                    <?php
                                                    echo $proaddress[$i];
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i
                                                        class="fa fa-ruler-combined text-primary me-2"></i>
                                                    <?php echo $prosqft[$i]; ?> sqft
                                                </small>
                                                <small class="flex-fill text-center border-end py-2"><i
                                                        class="fa fa-bed text-primary me-2"></i>
                                                    <?php echo $probed[$i]; ?> Bed
                                                </small>
                                                <small class="flex-fill text-center py-2"><i
                                                        class="fa fa-bath text-primary me-2"></i>
                                                    <?php echo $probaths[$i]; ?> Bath
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else { ?>
                                <h5> You haven't Uploaded property </h5><?php } ?>  
                        </div>
                    </div>
                </div>
            </div>
        </div>



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