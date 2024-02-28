   <?php
   session_start();
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
                    <h1> Foto</h1>                  
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

    

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">Tambah Foto</div>
                    <div class="card-body">
                        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                            <label class="form-label">Judul Foto</label>
                            <input type="text" name="judulfoto" class="form-control" required>
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsifoto" required></textarea>
                            <label class="form-label">Album</label>
                            <select class="form-control" name="albumid" required> 
                            <?php 
                            $sql_album = mysqli_query($koneksi,"SELECT * FROM album");
                            while($data_album = mysqli_fetch_array($sql_album)){ ?>
                                <option value="<?php echo $data_album['albumid']?>"><?php echo $data_album['namaalbum']?></option>
                            <?php } ?>
                            </select>
                            <label class="form-label">File</label>
                            <input type="file" class="form-control" name="lokasifile" required>
                            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
         <div class="col-md-8">
               <div class="card mt-2">
                  <div class="card-header">Data Galeri Foto</div>
                  <div class="card-body">
                     <table class="table">
                           <thead>
                              <th>#</th>
                              <th>Judul Foto</th>
                              <th>Deskripsi</th>
                              <th>Tanggal</th>
                              <th>Aksi</th>
                           </thead>
                           <tbody>
                              <?php
                              $no = 1;
                              $userid = $_SESSION['userid'];
                              $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
                              while ($data=mysqli_fetch_array($sql)) { ?>
                              
                           
                              <tr>
                              <td><?php echo $no++ ?></td>
                              <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100"></td>
                              <td><?php echo $data['judulfoto'] ?></td>
                              <td><?php echo $data['deskripsifoto'] ?></td>
                              <td><?php echo $data['tanggalunggah'] ?></td>
                              <td>
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid']?>">
         Edit
         </button>

         
         <div class="modal fade" id="edit<?php echo $data['fotoid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
               <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                  <label class="form-label"> Judul Foto</label>
                     <input type="text" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" class="form-control" required>
                     <label class="form-label">Deskripsi</label>
                     <textarea class="form-control" name="deskripsifoto" required>
                     <?php echo $data['deskripsifoto'] ?>
                     </textarea>
                     <label class="form-label">Album</label>
                     <select class="form-control" name="albumid">
                        <?php
                        $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                        while ($data_album = mysqli_fetch_array($sql_album)) { ?>
                        <option <?php if($data_album['albumid'] == $data['albumid']) { ?> selected="selected" <?php } ?> value="<?php echo $data_album['albumid']; ?>"><?php echo $data_album['namaalbum']; ?></option>

                           <?php } ?>
                        </select>
                        <label class="form-label">Foto</label>
                        <div class="row">
                        <div class="col-md-4">
                        <img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100">
                           </div>
                        <div class="class col-md-8">
                        <label class="form-label">Ganti File</label>
                        <input type="file" class="form_control" name="lokasifile">
                           </div>
                        </div>
                        <br>
                        
               
               </div>
               <div class="modal-footer">
                  <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                  </form>
               </div>
               </div>
         </div>
         </div>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid']?>">
         Hapus
         </button>

         
         <div class="modal fade" id="hapus<?php echo $data['fotoid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
               <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               <form action="../config/aksi_foto.php" method="POST">
                  <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                  Apakah anda yakin akan menghapus data <strong> <?php echo $data['judulfoto'] ?> </strong> ?
                  
               
               </div>
               <div class="modal-footer">
                  <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                  </form>
               </div>
               </div>
         </div>
         </div>

                              </td>
                              </tr>
                              <?php } ?>
                           </tbody>
                     </table>
                  </div>
               </div>
         </div>
      </div>
   </div>

   <footer class="d-flex justify-content-center border-top mt-3 bg-primary fixed-bottom">
      <p>&copy; Website Galeri Foto | Vica lovina</p>
   </footer>




   <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
   </body>
   </html>