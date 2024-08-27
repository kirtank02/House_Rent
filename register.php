<?php
include('db_conn.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Collect form data and sanitize
    $username = isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : "";
    $email = isset($_POST["email"]) ? filter_var($_POST["email"], FILTER_SANITIZE_EMAIL) : "";
    $mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : "";
    $address1 = isset($_POST["address1"]) ? htmlspecialchars($_POST["address1"]) : "";
    $address2 = isset($_POST["address2"]) ? htmlspecialchars($_POST["address2"]) : "";
    $city = isset($_POST["city"]) ? htmlspecialchars($_POST["city"]) : "";
    $state = isset($_POST["state"]) ? htmlspecialchars($_POST["state"]) : "";
    $country = isset($_POST["country"]) ? htmlspecialchars($_POST["country"]) : "";
    $pincode = isset($_POST["pincode"]) ? $_POST["pincode"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $confirmPassword = isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : "";

    // Check if passwords match
    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Hash the password for security
    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if username or email already exists
    $checkQuery = "SELECT User_name, Email, Mobile FROM registration WHERE User_name = ? OR Email = ? OR Mobile = ?";
    $stmt = $con->prepare($checkQuery);
    $stmt->bind_param("sss", $username, $email, $mobile);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the row
    $row = $result->fetch_assoc();
    if ($row) {
        if ($row['User_name'] === $username) {
            echo "<script>alert('Username already exists. Please choose a different username.')</script>";
        } elseif ($row['Email'] === $email) {
            echo "<script>alert('Email already exists. Please use a different email address.')</script>";
        } elseif ($row['Mobile'] === $mobile) {
            echo "<script>alert('Mobile already exists. Please use a different Mobile number.')</script>";
        }
    } else {
        // Prepare SQL statement to insert data into the database
        $insertQuery = "INSERT INTO registration (User_name, Password, Email, Address1, Address2, City, State, Country, Pincode, Mobile)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($insertQuery);
        $stmt->bind_param("ssssssssss", $username, $hashedPassword, $email, $address1, $address2, $city, $state, $country, $pincode, $mobile);
        if ($stmt->execute()) {
            echo "<script>alert('Registration successful.')</script>";
        } else {
            echo "<script>alert('Error occurred while registering.')</script>";
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

        /* Resetting default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Section styles */
        section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 40px;
        }

        .links {
            margin-top: 20px;
            /* Increased margin */
        }

        .links a {
            margin-right: 15px;
            /* Adjusted margin */
            text-decoration: none;
            color: #007bff;
        }

        /* Signin container styles */
        .signin {
            background-color: #f9f9f9;
            padding: 60px;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 80%;
        }

        /* Content styles */
        .content {
            text-align: center;
        }

        /* Form container styles */
        .form-container {
            height: 300px;
            /* Set a fixed height */
            overflow-y: auto;
            /* Add vertical scrollbar */
        }

        /* Input box styles */
        .inputBox {
            position: relative;
            margin-bottom: 40px;
        }

        .inputBox input {
            width: 100%;
            padding: 20px;
            font-size: 18px;
            border: 2px solid #ccc;
            border-radius: 10px;
            outline: none;
        }

        .inputBox input:focus {
            border-color: #007bff;
        }

        .inputBox i {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: #777;
            font-size: 18px;
        }

        /* Button styles */
        .inputBox button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 20px 40px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .inputBox button:hover {
            background-color: #0056b3;
        }
    </style>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="">

</head>

<body>
    <!-- partial:index.partial.html -->
    <!doctype html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>Sign Up</title>

        <link rel="stylesheet" href="./style.css">

    </head>

    <body>
        <section>
            <div class="signin">
                <div class="content">
                    <h2>Sign In</h2>
                    <form method="post">
                        <div class="form-container">

                            <div class="inputBox">

                                <input type="text" placeholder="Name" name="username" required>

                            </div>
                            <div class="inputBox">

                                <input type="text" placeholder="Email" name="email" required>

                            </div>
                            <div class="inputBox">

                                <input type="text" placeholder="Mobile" name="mobile" required>

                            </div>
                            <div class="inputBox">

                                <input type="text" placeholder="Address 1" name="address1" required>

                            </div>
                            <div class="inputBox">

                                <input type="text" placeholder="Address 2" name="address2" required>

                            </div>
                            <div class="inputBox">

                                <input type="text" placeholder="City" name="city" required>

                            </div>
                            <div class="inputBox">

                                <input type="text" placeholder="State" name="state" required>

                            </div>
                            <div class="inputBox">

                                <input type="text" placeholder="Country" name="country" required>

                            </div>
                            <div class="inputBox">

                                <input type="text" placeholder="Pincode" name="pincode" required>

                            </div>
                            <div class="inputBox">

                                <input type="Password" placeholder="Password" name="password" required>
                            </div>
                            <div class="inputBox">

                                <input type="Password" placeholder="Confir Password" name="confirm_password" required>

                            </div>
                        </div>
                        
                        <div class="links"><a href="login.php">Login</a></div>
                        <div class="inputBox">

                            <button type="submit" name="submit">Sign IN</button>

                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- partial -->

    </body>

    </html>
    <!-- partial -->

</body>

</html>