<?php
session_start();
$userid = $_SESSION['userid'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum login!');
    location.href='../index.php';
    </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a6d8d75c07.js" crossorigin="anonymous"></script>
    <style>
        body {
        background-image: url('path/fotoo');
        background-size: cover; /* Menutupi seluruh area dengan gambar */
        background-position: center; /* Posisi tengah */
        background-repeat: no-repeat; /* Tidak mengulang gambar */
        background-attachment: fixed; /* Membuat latar belakang tetap pada posisinya saat halaman digulir */
        color: #fff; /* Mengubah warna teks menjadi putih untuk kontras */
}


        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #007bff;
        }

        p {
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            display: inline-block;
            margin-right: 15px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                  <center>
                    <h1> Halaman Index</h1>
                      <ul>
                        <li><a href="../admin/home.php"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="../admin/album.php"><i class="fas fa-images"></i> Album</a></li>
                        <li><a href="../admin/foto.php"><i class="fas fa-camera"></i> Foto</a></li>
                        <li><a href="../config/aksi_logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                    </center>
                </div>
            </div>
        </div>
    </div>

  

<footer class="d-flex justify-content-center border-top mt-3 bg-primary fixed-bottom">
    <p>&copy; Website Galeri Foto | Vica lovina</p>
</footer>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>