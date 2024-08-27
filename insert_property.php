<?php
// Collect form data and sanitize
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
$image = isset($_POST['image']) ? $_POST['image'] : "";
$sqft = isset($_POST['sqft']) ? $_POST['sqft'] : "";
// Connect to your database (replace placeholders with actual database credentials)
$con = mysqli_connect("localhost", "root", "", "dbms");
if (!$con) {
    die("Connection Error");
}

// Prepare SQL statement to insert data into the database
$sql = "INSERT INTO `property_details` (`Property_name`, `Address1`, `Address2`, `City`, `State`, `Country`, `Pincode`, `Beds`, `Baths`, `SquareFeet`, `Price`, `Property_Image`) 
        VALUES ('$name', '$address1', '$address2', '$city', '$state', '$country', '$pincode', '$bath', '$bed', '$sqft', '$price', '$image')";
mysqli_query($con, $sql);
?>
<?