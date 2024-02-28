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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/a6d8d75c07.js" crossorigin="anonymous"></script>
    <style>
        body {
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
                    <h1> Halaman Home</h1>                  
                    <ul>
                        <li><a href="../admin/index.php"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="../admin/album.php"><i class="fas fa-images"></i> Album</a></li>
                        <li><a href="../admin/foto.php"><i class="fas fa-camera"></i> Foto</a></li>
                        <li><a href="../config/aksi_logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                    </center>
                </div>
            </div>
        </div>
    </div>

<br>
<div class="container mt-3">
Album :
<?php
$album = mysqli_query($koneksi, "SELECT  * FROM album WHERE userid='$userid'");
while ($data=mysqli_fetch_array($album)) { ?>
<a href="home.php?albumid=<?php echo $data['albumid'] ?>" class="btn btn-outline-primary">

<?php echo $data['namaalbum']; ?> </a>
<?php } ?>


    <div class="row">
<?php
$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
while($data = mysqli_fetch_array($query)) {
?>
<div class="col-md-3" mt-2>
            <div class="card">
                <img style="height: 12rem;" src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title=""  class="card-img-top" title="<?php echo $data['judulfoto'] ?>" type="submit" name="suka">
                <div class="card-footer text-center">
                    
                    <?php
                    $fotoid = $data['fotoid'];
                    $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                    if (mysqli_num_rows($ceksuka) == 1) { ?>
                    <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka"><i class="fa fa-heart"></i></a>
                    
                
                <?php }else{ ?> 
                    <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>

                    <?php }
                    $like = mysqli_query ($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($like). 'Suka'; 
                    ?>
                    <a href=""><i class="fa-regular fa-comment"></i>3 komentar</a>
                </div>
            </div>
        </div>
<?php } ?>
</div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-primary fixed-bottom">
    <p>&copy; Website Galeri Foto | Vica lovina</p>
</footer>




<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>