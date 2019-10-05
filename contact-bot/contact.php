<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $servername = "localhost";
    $dbusername = "host";
    $dbpassword = "";
    $dbname = "morpheus_bot";

    $conn = new mysqli ($servername, $dbusername, $dbpassword, $dbname);

    $q = "INSERT INTO `contact-us`(`id`, `email`, `subject`, `message`) VALUES ([],[$email],[$subject],[$message])";

        if (mysqli_query($conn, $q)) {
            echo 'Message sent.';
            header('Location: http://morph.adeolamade.com.ng/');
            exit;
        } else {
            echo 'Please, try again.' ;
        }
}
?>