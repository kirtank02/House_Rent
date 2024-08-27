<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@7/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="common.css">
    

    <style>
        
        .avaiLability-form {
        margin-top: -100px;
        z-index: 20; 
        position: relative;
        }
        @media screen and (max-width: 575px) {
        .availability-form{
        margin-top:0 px;
        padding: 0 35px ;
        }
    }

    </style>
    
</head>
<body>

<?php require('header2.php'); ?>

<!-- Swiper Slider -->
<div class="container-fluid px-lg-4 mt-0">
    <div class="swiper swiper-container">
        <div class="swiper-wrapper" style="height:850px; content:cover">
            <div class="swiper-slide">
                <img src="1.jpg" class="w-100 d-block" onclick="changeImage(this)" />
            </div>
            <div class="swiper-slide">
                <img src="2.jpg" class="w-100 d-block" onclick="changeImage(this)" />
            </div>
            <div class="swiper-slide">
                <img src="3.jpg" class="w-100 d-block" onclick="changeImage(this)" />
            </div>
            <div class="swiper-slide">
                <img src="4.jpg" class="w-100 d-block" onclick="changeImage(this)" />
            </div>
        </div>
        <!-- Add Pagination -->
        <!-- <div class="swiper-pagination"></div>
        
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> -->
    </div>
</div>
<?php
if(isset($_POST['form_submit'])) {
    $title = $_POST['title']; // Corrected typo
    $folder = 'image/';
    $image_file = $_FILES['image']['name'];
    $file = $_FILES['image']['tmp_name'];
    $path = $folder . $image_file;
    $imagefileType = pathinfo($image_file, PATHINFO_EXTENSION); // Corrected variable name

    // Check file type
    if($imagefileType != "jpg" && $imagefileType != "jpeg" && $imagefileType != "png" && $imagefileType != "gif"){
        $error[] = 'Sorry, only jpg, png, and jpeg are allowed'; // Corrected error message
    }

    // Check file size
    if($_FILES['image']['size'] > 1048576) {
        $error[] = 'Sorry, your image is too large';
    }

    // If there are no errors, move the uploaded file and insert data into the database
    if(!isset($error)) {
        if(move_uploaded_file($file, $path)) {
            // Perform database insertion here
            // Assuming $db is your database connection object
            $result = mysqli_query($db, "INSERT INTO item (image, title) VALUES ('$image_file', '$title')");

            if($result) {
                $image_success = 1;
            } else {
                echo 'Something went wrong';
            }
        } else {
            echo 'File upload failed';
        }
    }
}


?>
<form action="" method="post" enctype="multipart/form-data">
    <label>image</label>
    <input type="file" name="image" class="form-control" required >
    <lable>Title</lable>
    <input type="text" name="title" class="form-control" >
    <br><br>
    <button name="form_submit" class="btn-primary">Submit</button>
</form>

         
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class ="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Room >>></a>
        </div>
    </div>
</div>

<script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        }
    });

    // Function to change image source
    function changeImage(img) {
        var images = [
            "1.jpg",
            "2.jpg",
            "3.jpg",
            "4.jpg"
        ];
        var currentIndex = images.indexOf(img.src);
        var nextIndex = (currentIndex + 1) % images.length;
        img.src = images[nextIndex];
    }
</script>
