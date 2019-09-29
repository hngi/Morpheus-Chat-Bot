<?php
ob_start();

if (isset($_POST['submit'])) {
    $definition = $_POST['definition'];
    $word = $_POST['word'];
    $antonyms = $_POST['antonyms'];
    $synonyms = $_POST['synonyms'];
    $example = $_POST['example'];

    
   $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "morpheus_bot";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    $q= "INSERT INTO know_base (ans, qtns, anto, syno, exam) 
    VALUES('$definition', '$word', '$antonyms', '$synonyms', '$example');";

    if (mysqli_query($conn, $q)) {
        echo 'Successfully inputed in dictionary';
        header('Location: http://morph.adeolamade.com.ng/teach/');
        exit;
    } else {
        echo 'Not inserted' ;
    }
}

ob_end_flush()
?>