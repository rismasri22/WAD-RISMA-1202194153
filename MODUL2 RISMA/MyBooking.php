<?php
    $nama = $_POST['nama'];
    $username ="Risma_1202194153" ;
    $eventdate = $_POST['eventdate'];
    $strtime = $_POST ['starttime'];
    $durasi = $_POST['duration'];
    $cekout = date('d-m-y', strtotime('+'.$strtime. 'Hours' , strtotime($eventdate)));
    $tipegedung = $_POST['tipegedung'];
    $hp = $_POST['hp'];
    $ser = 0;
    if (empty($_POST['array'])) {
        $service = 'No Service';
    }else {
        $service = $_POST['array'];
        $ser = count($service);
    }
    if ($tipegedung == 'Nusantara Hall') {
        $total = 700 * $durasi;
    }else if ($tipegedung == 'Garuda Hall'){
        $total = 450 * $durasi;
    }else if ($tipegedung == 'Gedung Serba Guna'){
        $total = 250 * $durasi;
    }
    $total = $total+(20*$ser);

    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>MyBooking</title>
  </head>
  <body>
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="container d-flex justify-content-center align-item-center">
                <div class="navbar-nav">
                    <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="Booking.php">Booking</a>
                </div>
                </div>
            </div>
        </nav>
        <br>
        <h3 class="text-center pt-3" style="padding-top: 10px;">Thank you <?= $username ?> for reserving</h3>
        <h5 style="text-align: center; color: black">Please double check your reservation details</h5> 
        <br>
        <div class="container-xl mt-5 d-flex justify-content-center align-item-center">
        <table class="table" style="width: 365mm;">
        <thead class="thead-dark">
            <tr>
            <th scope="col" class="text-center">Booking Number</th>
            <th scope="col" class="text-center">Name</th>
            <th scope="col" class="">Check-in</th>
            <th scope="col">Check-out</th>
            <th scope="col">Building Type</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Service</th>
            <th scope="col">Total Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row" class='text-center'><?= rand(1000000000, 9999999999) ?></th>
            <div class="footer">
            <td><?= $nama ?></td>
            <td><?= $eventdate,  $strtime ?></td>
            <td><?= $cekout, $strtime ?></td>
            <td><?= $tipegedung ?></td>
            <td><?= $hp ?></td>
            <td>
                <?php
                if (empty($_POST['array'])) {
                    echo $service;
                } else {
                    foreach ($service as $data) { 
                    echo'<ul>';
                        echo '<li>' . $data . '</li>';
                    echo '</ul>' ;    
                    }
                }
                ?>
            </td>
            <td class="text-center"> $ <?= $total ?></td>
            </tr>
        </tbody>
        </table>
        </div>
        </div>
        <div> </div>
        <div class="container">
            <div class="row pt-3">
                <div class="col text-center">
                    <p>Created by : risma_1202194153 </p>
                </div>
            </div>
        </div>
  </body>
</html>