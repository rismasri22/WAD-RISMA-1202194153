<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Home</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="Risma_Create.php">
                    <img src="https://drive.google.com/uc?export=view&id=1hqBNDU1Tx1RKd8wzC1bmnhwBr-7YsK23" alt="logo" width="140px">
                </a>
                <a class="btn btn-primary" href="Risma_Tambahbuku.php">Tambah Buku</a>
            </div>
        </nav>

        <div class="container mt-5 pt-5">
            <div class="row d-flex flex-row pt-5 mt-5">
                <?php
                    include "Risma_Config.php";
                    $show = "SELECT * FROM buku_table";
                    $query = mysqli_query($connect, $show);
                    $row = mysqli_num_rows($query);

                    if($row == 0){
                    echo '<p style="font-size:30px;text-align:center">Belum Ada Buku</p>';
                    echo '<hr style="border:2px solid blue"></hr>';
                    echo '<p style="text-align:center">Silahkan Menambahkan Buku</p>';
                    }
                    else{
                    while($data = mysqli_fetch_array($query)){
                ?>

                <div class="card mx-1" style="width:18rem;">
                    <img src="Risma_foto/<?php echo $data['gambar']?>" alt="foto" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['judul_buku']?></h5>
                        <p class="card-text"><?= $data['deskripsi']?></p>
                        <a class="btn btn-primary" href="Risma_Detailbuku.php?id=<?=$data['id_buku']?>">Tampilkan Lebih Lanjut</a>
                    </div>
                </div>
                <?php }?>
                <?php }?>
            </div>
        </div>

        <footer class="container bg-light mt-5 pt-5">
            <div class="row mb-3 mt-3">
                <div class="col text-center">
                    <a class="mb-5 mt-5">
                        <img src="https://drive.google.com/uc?export=view&id=1dQDz2iJRwW4rxttYkLL_TDaqiyGw4_c1" alt="logo" width="140">
                    </a>
                    <h5 class="mt-3">Perpustakaan EAD</h5>
                    <p class="mb-5">Risma_1202194153</p>
                </div>
            </div>
        </footer>
    </body>
</html>