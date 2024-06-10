<?php
include "common_pages/conn.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['title'];
    $description = $_POST['description'];
    $release_date = $_POST['release_date'];
    $imdb = $_POST['imdb'];

    $updateQuery = "UPDATE cartoons SET name='$name', description='$description', release_date='$release_date', imdb='$imdb' WHERE id=$id";
    
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        header("Location: cartoon_info.php");
        exit;
    } else {
        echo "Error updating cartoon: " . mysqli_error($conn);
    }
}
?>
