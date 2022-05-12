<?php

// clear session
session_start();


// unset all session variables
$_SESSION = array();


// destroy the session
session_destroy();


// redirect to index page
header('Location: index.php');