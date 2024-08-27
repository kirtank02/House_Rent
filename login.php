<?php
include('db_conn.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    
    // Fetch the hashed password from the database
    $sql = "SELECT Registration_id, Password FROM registration WHERE User_name = '$name'";
    $res = mysqli_query($con, $sql);

    if($res && mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        $password = $row['Password'];
        if ($pass == $password) {
            $reg_id = $row['Registration_id'];
            header("Location: index.php?regid=" . urlencode($reg_id));
        } else {
            // Passwords don't match, handle the case
            echo "<script>alert('Invalid Password')</script>";
        }
    } else {
        // Handle case when username doesn't exist
        echo "<script>alert('Invalid Username')</script>";
    }
}
?>
    


<!doctype html>

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
        /* Resetting default margin and padding */
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        /* Body styles */
        
        body {
            font-family: 'Inter', sans-serif;
            /* Fallback font */
        }
        /* Custom CSS */
        
        .navbar-hidden {
            display: none;
        }
        /* Section styles */
        
        section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            /* Added padding */
        }
        /* Signin container styles */
        
        .signin {
            background-color: #f9f9f9;
            padding: 40px;
            /* Increased padding */
            border-radius: 10px;
            /* Increased border radius */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            /* Increased box shadow */
        }
        /* Content styles */
        
        .content {
            text-align: center;
        }
        /* Form styles */
        
        .form {
            margin-top: 30px;
            /* Increased margin */
        }
        /* Input box styles */
        
        .inputBox {
            position: relative;
            margin-bottom: 30px;
            /* Increased margin */
        }
        
        .inputBox input {
            width: 100%;
            padding: 15px;
            /* Increased padding */
            border: 1px solid #ccc;
            border-radius: 8px;
            /* Increased border radius */
            outline: none;
        }
        
        .inputBox input:focus {
            border-color: #007bff;
        }
        
        .inputBox i {
            position: absolute;
            top: 50%;
            left: 15px;
            /* Adjusted left position */
            transform: translateY(-50%);
            color: #777;
        }
        /* Links styles */
        
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
        
        .links a:hover {
            text-decoration: underline;
        }
        /* Submit button styles */
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

    <title>Login</title>

    <link rel="stylesheet" href="">


</head>

<body>
    <!-- partial:index.partial.html -->

    <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>

        <div class="signin">

            <div class="content">

                <h2>Login</h2>
                <form method="post">
                <div class="form">

                    <div class="inputBox">

                        <input type="text" name="name" placeholder="Username" required>

                    </div>

                    <div class="inputBox">

                        <input type="password" name="pass" placeholder="Password" required> 

                    </div>

                    <div class="links"> <a href="#">Forgot Password</a> <a href="register.php">Signup</a>

                    </div>

                    <div class="inputBox">

                        <button type="submit" name="submit">Login</button>

                    </div>
                
                </div>
                </form>
            </div>

        </div>

    </section>
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- partial -->

</body>

</html>