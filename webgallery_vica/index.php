<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Masuk</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Font Awesome Kit -->
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
                <h1>Halaman Masuk</h1>
                <br>
                   <ul>
                        <li><a href="login.php"><i class="fa-solid fa-user"></i>Login</a></li>
                        <li><a href="register.php"><i class="fa-solid fa-user-plus"></i>Register</a></li>
                    </ul>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-primary fixed-bottom">
    <p>&copy; Website Galeri Foto | Vica lovina</p>
</footer>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
