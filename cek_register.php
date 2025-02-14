<?php
include 'cek_koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password1'], PASSWORD_DEFAULT); // Enkripsi password
    $confirm_pass = password_hash($_POST['password2'], PASSWORD_DEFAULT);


    // Cek apakah password dan konfirmasi password cocok
    if ($password !== $confirm_pass) {
    // Redirect kembali ke halaman registrasi dengan pesan error
    header("location:Registers.php?pesan=gagal");
    exit();
}

    $stmt = $conn->prepare("INSERT INTO pengguna (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);
    
    if ($stmt->execute()) {
        echo "Registrasi berhasil! Silakan <a href='index.html'>login</a>.";
    } else {
        echo "Gagal mendaftar. Email mungkin sudah terdaftar.";
    }

    $stmt->close();
    $conn->close();
}
?>
