<?php
    include 'Risma_Config.php';
    
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $penulis = "Risma_1202194153";

    if(isset($_POST['submit'])){
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $tahun = $_POST['tahunterbit'];
        $desc = $_POST['deskripsi'];
        $bahasa= $_POST['bahasa'];
        $tag = implode(",",$_POST['tag']);
        
        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['gambar']['name'];
        $ukuran = $_FILES['gambar']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(!in_array($ext,$ekstensi) ) {
            header("location:Risma_Create.php?alert=gagal_ekstensi");
        }else{	
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'Risma_foto/'.$rand.'_'.$filename);
            $postEvent = mysqli_query($connect, "INSERT INTO buku_table VALUES ('', '$judul', '$penulis', '$tahun', '$desc', '$xx', '$tag', '$bahasa')");
            header("location:Risma_Create.php");
        }
    }  
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <title>Document</title>

     <style>
     .card{
          height:65vh;
     }

     textarea{
          resize:none;
     }
     </style>
</head>

<body>
<section id="home" class="home pb-4">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <div class="container">
                        <a class="navbar-brand">
                            <img src="https://drive.google.com/uc?export=view&id=1dQDz2iJRwW4rxttYkLL_TDaqiyGw4_c1" alt="logo" width="140px">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar">
                            <a class="btn btn-outline-light btn-primary" href="create.php">Tambah Buku</a>
                                
                        </div>
                    </div>
                </nav>


          <div class="navbar">
               <a class="btn btn-outline-light btn-primary" href="create.php">Tambah Buku</a>
          </div>
     </div>

     <div class="container mt-3">
          <h3 class="text-center py-2">Tambah Data Buku</h3>
          <form action="Risma_Tambahbuku.php" method="post" enctype="multipart/form-data">
               <div class="row">
                    <div class="col px-12">
                         <div class="card pb-12">
                              <div class="card-body">

                                   <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" class="form-control" placeholder="Contoh:Pemrograman Web Bersama EAD" name="judul">
                                   </div>
                                   <div class="form-group">
                                        <label>Penulis</label>
                                        <input type="text" class="form-control" placeholder="Risma_1202194153" name="penulis"value="<?= $penulis ?>" readonly>
                                   </div>
                                   <div class="form-group">
                                        <label>Tahun Terbit</label>
                                        <input type="text" class="form-control" placeholder="Contoh:1990" name="tahunterbit">
                                   </div>
                                   <div class="form-group my-2">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" rows="3" cols="30" placeholder="contoh: Buku ini menjelaskan tentang..." name="deskripsi"></textarea>
                                   </div>
                                   <div class="form-group mb-1">
                                        <label>Bahasa</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bahasa"
                                             value="Indonesia">
                                        <label class="form-check-label">Indonesia</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bahasa"
                                             id="inlineRadio2" value="Lainnya">
                                        <label class="form-check-label" for="inlineRadio2">Lainnya</label>
                                   </div>
                                   <div class="form-group my-1">
                                        <label>Tag</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tag[]"
                                             value="pemrograman">
                                        <label class="form-check-label" >pemrograman</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tag[]"
                                             value="website">
                                        <label class="form-check-label" >website</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tag[]"
                                             id="inlineRadio2" value="java">
                                        <label class="form-check-label" >java</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tag[]"
                                             id="inlineRadio2" value="oop">
                                        <label class="form-check-label" >OOP</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tag[]"
                                             id="inlineRadio2" value="mvc">
                                        <label class="form-check-label" >MVC</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tag[]"
                                             id="inlineRadio2" value="kalkulus">
                                        <label class="form-check-label" >Kalkulus</label>
                                   </div>
                                   <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tag[]"
                                             id="inlineRadio2" value="lainnya">
                                        <label class="form-check-label" >Lainnya</label>
                                   </div>
                                   <div>
                                    <label>Gambar</label>
                                   <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar">
                                        <label class="custom-file-label">Choose file</label>
                                        <div class="text-center py-2">
                                        <button class="btn btn-primary" type="submit" name="submit">+ Tambah</button>
                                   </div>
                                   
                                   
                              </div>
                              
                              <footer class="container bg-light mt-5 pt-5">
            <div class="row mb-3 mt-3">
                <div class="col text-center">
                    <a class="mb-5 mt-5">
                        <img src="https://drive.google.com/uc?export=view&id=1dQDz2iJRwW4rxttYkLL_TDaqiyGw4_c1" alt="logo" width="100">
                    </a>
                    <h5 class="mt-3">Perpustakaan EAD</h5>
                    <p class="mb-5">Risma_1202194153</p>
                        
                         </div>
                    </div>
               </div>
          </form>
     </div>

</body>

</html>