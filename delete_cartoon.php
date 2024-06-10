<?php
include "common_pages/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cartoonID = $_GET['id'];

    $deleteQuery = "DELETE FROM cartoons WHERE ID='$cartoonID'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        header("Location: cartoon_info.php");
        exit;
    } else {
        echo "Cartoon couldn't be deleted: " . mysqli_error($conn);
    }
}
?>
