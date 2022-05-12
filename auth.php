<?php

include('includes/config.php');

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $_SESSION['errors'] = array();

    if($name == '' || $password == '' || $email == '') {
        $_SESSION['errors'][] = 'All fields are required';
        header('Location: register.php');
        exit();
    }

    $password = md5($password);

    $sql = "SELECT * FROM users WHERE email='$email'";

    $conn = getMySQLiConnection();

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $_SESSION['errors'][] = 'Email already exists';
        header('Location: register.php');
        exit();
    }

    $sql = "INSERT INTO users (`name`, `password`, `email`) VALUES ('$name', '$password', '$email')";

    if(mysqli_query($conn, $sql)) {
        header('Location: login.php');
        exit();
    } else {
        $_SESSION['errors'][] = 'Registration failed';
        header('Location: register.php');
        exit();
    }
}

// login
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION['errors'] = array();

    if($email == '' || $password == '') {
        $_SESSION['errors'][] = 'All fields are required';
        header('Location: login.php');
        exit();
    }

    $password = md5($password);

    $sql = "SELECT * FROM users WHERE `email`='$email' AND `password`='$password'";

    $conn = getMySQLiConnection();

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $_SESSION['customer_id'] = $email;
        $_SESSION['customer_email'] = $email;
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['errors'][] = 'Invalid email or password';
        header('Location: login.php');
        exit();
    }
}