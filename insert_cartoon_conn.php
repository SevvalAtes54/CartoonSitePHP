<?php
include "common_pages/conn.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['title'];
    $description = $_POST['description'];
    $release_date = $_POST['release_date'];
    $imdb = $_POST['imdb'];

    $insertQuery = "INSERT INTO cartoons (name, description, release_date, imdb) VALUES ('$name', '$description', '$release_date', '$imdb')";
    
    $updateResult = mysqli_query($conn, $insertQuery);

    if ($updateResult) {
        header("Location: cartoon_info.php");
        exit;
    } else {
        echo "Error updating cartoon: " . mysqli_error($conn);
    }
}
?>
