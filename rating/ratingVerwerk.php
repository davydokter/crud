<?php
require "../dbconnect.php";
    $id = $_POST['idVeld'];
    $rating = $_POST['ratingVeld'];

    $query = "INSERT INTO ratings (id, rating) VALUES ('$id', '$rating')";

    $result = mysqli_query($db_connect, $query);

    header("Location: ../index.php");