    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title>Booking</title>
    </head>
    <body>

        
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="container d-flex justify-content-center align-item-center">
                <div class="navbar-nav">
                    <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link active" href="Booking.php">Booking</a>
                </div>
                </div>
            </div>
            </nav>
        
            <section>
            <?php
                $username = "Risma_1202194153";
                $photo = "https://drive.google.com/uc?export=view&id=1XVLxfroLQDIyOgjVHTzR5TmVge_eP5_L";
            ?>
            </section>
            <br>
            <section id="hotel">
                    <div class="container">
                        <h5 class="text-center text-light  bg-dark" style="padding: 4px;">Reserve your venue now!</h5>
                        <div class="row">
                            <div class="col-lg-5 d-flex center">
                            
                                <?php if (iset($_POST['image'])) : ?>
                                    <div class = "justify-content-center">
                                    <img class="m-auto p-3"src="<?= $_POST['image'] ?>" alt="pic" height="250px" width="600px">
                                <?php else : ?>
                                    <img class="m-auto p-3" src="<?= $photo ?>"alt="pic" height="250px" width="600px">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>     
            </section>
                            
        </br>

            <div class="container mt-3">
            <div class="card mb-3" style="max-width: 100rem; max-height: 150rem">
                <div class="row no-gutters">
                    <div class="col-md-7">
                        <form action="MyBooking.php" method = "post" class ="ms-5">
                            <div class="form-group col-md-12 mt-3">
                                <label for="nama">Name</label>
                                <input type="text" class="form-control" id="nama1" aria-describedby="" name = "nama" placeholder="risma_1202194xxx">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="eventdate">Event Date</label>
                                <input type="date" class="form-control" id="eventdate1" name = "eventdate">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="starttime">Start Time</label>
                                <input type="time" class="form-control" id="starttime1" name = "starttime">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="duration">Duration(Hours)</label>
                                <input type="text" class="form-control" id="duration1" name = "duration" placeholder="1">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="tipe">Building Type</label>
                                <?php
                                    if(empty($_GET['type'])){
                                ?>
                                    <div class="form-group col-md-13">
                                    <select class="custom-select mr-sm-2" name="tipegedung" value="tipegedung" id="tipegedung1">
                                        <option selected>Choose...</option>
                                        <option value="Nusantara Hall">Nusantara Hall</option>
                                        <option value="Garuda Hall">Garuda Hall</option>
                                        <option value="Gedung Serba Guna">Gedung Serba guna</option>
                                </select>
                                    </div>
                                <?php } else { ?>
                                    <div>
                                        <input type="text" value="<?php echo $_GET['type'] ?>" readonly name="tipegedung" value="tipegedung">
                                    </div> 
                                <?php } ?>  
                                
                                
                            </div>
                            <div class="form-group col-md-12">
                                <label for="hp">Phone Number</label>
                                <input type="text" class="form-control" id="hp1" name="hp">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="service">Add Service(s)</label>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Room Service" id="service1" name="array">
                                <label class="form-check-label" for="defaultCheck1">
                                Catering / $700
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Decoraction" id="service2" name="array">
                                <label class="form-check-label" for="defaultCheck1">
                                    Decoration / $450
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Sound System" id="service2" name="array">
                                <label class="form-check-label" for="defaultCheck1">
                                    Sound System / $250
                                </label>
                            </div>
                            
                            <div class="form-group col-md-12">  
                            <button type="Book" class="btn btn-primary btn-block" href="MyBooking.php">Book</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row pt-3">
                    <div class="col text-center">
                        <p>Created by : risma_1202194153 </p>
                    </div>
                </div>
            </div>
            </div>
    </body>
    </html>