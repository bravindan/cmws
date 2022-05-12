<?php //error_reporting(0);
include('includes/config.php');

if(isset($_SESSION['customer_id'])) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AutoWash | Login</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .footer {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <?php include_once('includes/header.php'); ?>

    <div class="container-fluid pt-3 pb-3 bg-secondary">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <form action="auth.php" method="post">
                    <!-- hidden login field -->
                    <input type="hidden" name="login" value="1">
                    <div class="card p-3">
                        <h2>Login</h2>
                        <?php
                        if (isset($_SESSION['errors'])) {
                            foreach ($_SESSION['errors'] as $error) {
                                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                            }
                        }

                        $_SESSION['errors'] = array();
                        ?>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Pasword</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="clearfix">
                            <div class="float-right">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </div>
                        <div class="p-3 text-center">
                            Don't have an account? <a href="register.php">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('includes/footer.php'); ?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>