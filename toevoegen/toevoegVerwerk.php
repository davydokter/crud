<?php
session_start();
require '../dbconnect.php';

if($_SESSION['username'] && $_SESSION['role'] == 'admin') {
    if (isset($_POST['verzend'])) {
        $naam = $_POST['naamVeld'];
        $omschrijving = $_POST['omschrijvingVeld'];
        $jaar = $_POST['jaarVeld'];
        $categorie = $_POST['categorieVeld'];
        $afbeelding = $_POST['afbeeldingVeld'];
        $prijs = $_POST['prijsVeld'];

        $img_name = $_FILES['afbeeldingVeld'] ['name'];
        $tmp_img_name = $_FILES['afbeeldingVeld'] ['tmp_name'];
        $folder = '../img/';
        move_uploaded_file($tmp_img_name, "$folder/$img_name");

        $query = "INSERT INTO kunstwerken (naam, omschrijving, jaar, categorie, afbeelding, prijs) VALUES ('$naam', '$omschrijving', '$jaar', '$categorie', '$img_name', '$prijs')";

        $result = mysqli_query($db_connect, $query);
        if ($result) {
            echo "Het item is toegevoeged<br/>";
            header("Location: ../index.php");
        } else {
            echo "FOUT bij toevoegen <br/>";
            echo $query . "<br/>";
            echo mysqli_error($db_connect);
        }
    } else {
        echo "Het formulier is niet (goed) verstuurd<br/>";
    }
} else {
    header("Location: ../index.php");
}