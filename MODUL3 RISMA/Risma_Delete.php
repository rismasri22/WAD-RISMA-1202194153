<?php
     include 'Risma_Config.php';

     $id_buku = $_GET['id_buku'];

     $query = "DELETE FROM buku_table WHERE id_buku='$id_buku'";

     $deleteQuery = mysqli_query($connect, $query);

     header('location:Risma_Create.php');
?>