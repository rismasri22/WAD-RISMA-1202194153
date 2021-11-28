<?php
    include 'Risma_Config.php';

    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    $desc = $_POST['desc'];
    $bahasa= $_POST['bahasa'];
    $tag = implode(",",$_POST['tag']);
        
    $random = rand();
    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
    if(!in_array($ext,$ekstensi) ) {
        header("location:Risma_Create.php?alert=gagal_ekstensi");
    }else{	
        $xx = $random.'_'.$filename;
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'Risma_foto/'.$random.'_'.$filename);
        $postEvent = mysqli_query($connect, "UPDATE buku_table SET judul_buku='$judul',tahun_terbit='$tahun',deskripsi='$desc',gambar='$xx',tag='$tag',bahasa='$bahasa'");
        header("location:Risma_Create.php");
    }
?>
