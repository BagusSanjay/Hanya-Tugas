<?php
session_start();
include 'cek_koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan email
    $stmt = $conn->prepare("SELECT * FROM pengguna WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $email;
            header("Location: Ardui.php"); // Redirect ke dashboard setelah login berhasil
            exit();
        } else {
            echo "Login gagal! Password salah.";
        }
    } else {
        echo "Login gagal! Email tidak ditemukan.";
    }

    $stmt->close();
}

$conn->close();
?>
