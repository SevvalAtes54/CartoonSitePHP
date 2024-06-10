<?php
include "common_pages/conn.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id']; // Küçük harfle ID alınıyor
  $title = $_POST['title'];
  $description = $_POST['description'];
  $release_date = $_POST['release_date'];
  $imdb = $_POST['imdb'];

  $updateQuery = "UPDATE cartoons SET name=$title, description=$description, release_date=$release_date, imdb=$imdb WHERE id=$id";
  
  if (mysqli_query($conn, $updateQuery)) {
      header("Location: cartoon_info.php");
      exit;
  } else {
      echo "Cartoon could not be updated: " . $stmt->error;
  }
//1 sn
  
  $conn->close();
}
?>
