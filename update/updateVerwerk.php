<?php
session_start();
require '../dbconnect.php';
if($_SESSION['username'] && $_SESSION['role'] == 'admin'){
    $id = $_POST['idVeld'];
    $naam = $_POST['naamVeld'];
    $omschrijving = $_POST['omschrijvingVeld'];
    $jaar = $_POST['jaarVeld'];
    $categorie = $_POST['categorieVeld'];
    $afbeelding = $_POST['afbeeldingVeld'];
    $prijs = $_POST['prijsVeld'];

    $img_name = $_FILES['afbeeldingVeld'] ['name'];
    $tmp_img_name= $_FILES['afbeeldingVeld'] ['tmp_name'];
    $folder ='../img/';
    move_uploaded_file($tmp_img_name, "$folder/$img_name");

    $query = "UPDATE `kunstwerken` SET `naam`='$naam',`omschrijving`='$omschrijving',`jaar`='$jaar', `categorie`='$categorie', `afbeelding`='$img_name',`prijs`='$prijs' WHERE id = {$id}";

    $result = mysqli_query($db_connect, $query);

    if ($result) {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}