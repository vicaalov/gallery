<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];


$sql = $koneksi->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
$sql->bind_param("ss", $username, $password);
$sql->execute();
$result = $sql->get_result();

$cek = mysqli_num_rows($result); 

if ($cek > 0) {
    $data = mysqli_fetch_array($result);
    $_SESSION['username'] = $data['username'];
    $_SESSION['userid'] = $data['userid'];
    $_SESSION['status'] = "login";
    echo "<script>
    alert('Login berhasil');
    location.href='../admin/index.php';
    </script>";
} else {
    // Menangani kasus ketika login gagal
    echo "<script>
    alert('Username atau password salah');
    location.href='../login.php'; 
    </script>";
}


?>
