<?php
    include 'Risma_Config.php';
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    $penulis = "Risma_1202194153";

    $id_buku = $_GET['id_buku'];
    $query = "SELECT * FROM buku_table WHERE id_buku = '$id_buku'";

    $detail = mysqli_query($connect, $query);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Detail Buku</title>
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
                            <a class="btn btn-outline-light btn-primary" href="Risma_Create.php">Tambah Buku</a>
                                
                        </div>
                    </div>
                </nav>

        <div class="container p-3" style="width:50rem">
            <div class="card shadow">
                <h3 class="text-center pt-4 fw-bold">DETAIL BUKU</h3>
                <?php foreach($detail as $data) {?>
                    <div style="margin-left:15px;margin-right:15px;margin-bottom:15px" 
                        class="text-center">
                        <img class="my-3" src="Risma_foto/<?php echo $data['gambar']?>" alt="gambar" class="card-img-top" width="400px">
                        <hr style="border:2px dark;width:95%;margin-left:30px">
                    </div>
                    <div style="margin-left:45px;margin-right:15px;margin-bottom:15px">
                        <div class="mb-4">
                            <label for="judul" class="fw-bold">Judul Buku:</label>
                            <p><?= $data['judul_buku']?></p>
                        </div>
                        <div class="mb-4">
                            <label for="penulis" class="fw-bold">Penulis:</label>
                            <p><?= $penulis?></p>
                        </div>
                        <div class="mb-4">
                            <label for="tahunterbit" class="fw-bold">Tahun Terbit:</label>
                            <p><?= $data['tahun_terbit']?></p>
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi" class="fw-bold">Deskripsi:</label>
                            <p><?= $data['deskripsi']?></p>
                        </div>
                        <div class="mb-4">
                            <label for="bahasa" class="fw-bold">Bahasa:</label>
                            <p><?= $data['bahasa']?></p>
                        </div>
                        <div class="mb-4">
                            <label for="tag" class="fw-bold">Tag:</label>
                            <p><?= $data['tag']?></p>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary col-sm-5" data-bs-toggle="modal" data-bs-target="#sunting">Sunting</button>
                            
                            <button class="btn btn-danger col-sm-5" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>
                            
                        </div>
                            <div class="modal fade" id="sunting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Sunting</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="Risma_Update.php" method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="judul" class="form-label fw-bold">Judul Buku</label>
                                                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $data['judul_buku']?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="penulis" class="form-label fw-bold">Penulis</label>
                                                    <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $penulis ?>" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tahun" class="form-label fw-bold">Tahun Terbit</label>
                                                    <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $data['tahun_terbit']?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="desc" class="form-label fw-bold">Deskripsi</label>
                                                    <textarea class="form-control" rows="3" cols="30" name="desc"> <?= preg_replace('~\x{00a0}~siu', '', $data['deskripsi']); ?> </textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="bahasa" class="form-label fw-bold">Bahasa</label>
                                                    <div class="form-check form-check-inline" style="margin-left:15px">
                                                        <input class="form-check-input" type="radio" name="bahasa" id="bahasa" value="indonesia" <?php echo ($data['bahasa']=='indonesia' ? 'checked' : '');?>>
                                                        <label class="form-check-label" for="inlineRadio1">Indonesia</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="bahasa" id="bahasa" value="lainnya" <?php echo ($data['bahasa']=='lainnya' ? 'checked' : '');?>>
                                                        <label class="form-check-label" for="inlineRadio2">Lainnya</label>
                                                    </div>
                                                </div>
                                                <div class="mb-5">
                                                    <?php
                                                        if (isset($data['tag'])) {
                                                            $tag = explode(",", $data['tag']);
                                                        } else {
                                                            $tag = [];
                                                        }
                                                    ?>
                                                    <label class="fw-bold me-5" for="tag">Tag</label>
                                                    <input class="form-check-input" type="checkbox" value="Pemrograman" id="pemrograman"
                                                        name="tag[]"
                                                        <?php if (in_array("Pemrograman", $tag)): ?> checked> <?php endif; ?>
                                                    <label class="form-check-label me-3" for="pemrograman">
                                                        Pemrograman
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" value="Website" id="website"
                                                        name="tag[]"
                                                        <?php if (in_array("Website", $tag)): ?> checked> <?php endif; ?>
                                                    <label class="form-check-label me-3" for="website">
                                                        Website
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" value="Java" id="java" name="tag[]"
                                                        <?php if (in_array("Java", $tag)): ?> checked> <?php endif; ?>
                                                    <label class="form-check-label me-3" for="java">
                                                        Java
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" value="MVC" id="mvc" name="tag[]"
                                                        <?php if (in_array("MVC", $tag)): ?> checked> <?php endif; ?>
                                                    <label class="form-check-label me-3" for="mvc">
                                                        MVC
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" value="Kalkulus" id="kalkulus"
                                                        name="tag[]"
                                                        <?php if (in_array("Kalkulus", $tag)): ?> checked> <?php endif; ?>
                                                    <label class="form-check-label" for="kalkulus">
                                                        Kalkulus
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" value="Lainnya" id="lainnya"
                                                        name="tag[]"
                                                        <?php if (in_array("Lainnya", $tag)): ?> checked> <?php endif; ?>
                                                    <label class="form-check-label me-3" for="lainnya">
                                                        Lainnya
                                                    </label>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="fw-bold">Gambar</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                                    </div>
                                                </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>                                    
                                        </div>
                                    </div>
                                    </div>
                                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus buku ini ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <a href="Risma_Delete.php?id_buku=<?php echo $data['id_buku']?>">
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
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
                        </footer>
                        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="
                            sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin=" anonymous ">
                        </script>
                    </body>
                </html>