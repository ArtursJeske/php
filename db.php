<?php
function getConn() {
    $conn = new mysqli("localhost", "root", "Rkemalwi1!", "viesu_gramata");
    if ($conn->connect_error) {
        die("Savienojuma kļūda: " . $conn->connect_error);
    }
    return $conn;
}