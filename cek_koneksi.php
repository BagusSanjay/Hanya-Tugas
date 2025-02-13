<?php
// Koneksi ke database
$servername = "sql101.infinityfree.com";
$username = "if0_38292235";
$password = "Bagussss"; 
$dbname = "f0_38292235_users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}



?>