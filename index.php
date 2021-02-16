<?php
include 'ip.php';
//echo "hello";
header('Location: login.html');
exit
?>

<?php
session_start();
include('check.php');


//bhjhjj
if (! isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}

if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    // POST data is valid.
}

?>