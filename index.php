<?php
require_once 'db.php';

// select table
$sql = "SELECT * FROM film WHERE film_id <= 30 ORDER BY title ASC";
$result = $database->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://kit.fontawesome.com/0d95b64c38.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="stylesheet/custom.css">

    <title>To Do List</title>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="header-left">
                <h1>Loxies Movie's</h1>
            </div>
            <div class="header-right">
                <form class="d-flex input-group w-auto">
                    <input class="form-control" id="search" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </header>
    <div class="container">
        <button type="button" class="btn btn-primary float-end"><i class="fas fa-plus-circle"></i> Create</button>
        <div class="row mt-5">
            <div class="col-md input-group mb-3">
                <select class="form-select" id="filter" aria-label="Default select example">
                    <option class="text-muted" selected>Filter Rating</option>
                    <option value="G">G</option>
                    <option value="PG">PG</option>
                    <option value="PG-13">PG-13</option>
                    <option value="NC-17">NC-17</option>
                    <option value="R">R</option>
                </select>
            </div>
            <div class="col-md input-group mb-3">
                <select class="form-select" id="sort" aria-label="Default select example">
                    <option value="ASC">Sort by Name Ascending</option>
                    <option value="DESC">Sort by Name Descending</option>
                </select>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row" id="content">

                <?php
                require_once 'db.php';
                $query = mysqli_query($database, "SELECT * FROM film");
                while ($row = mysqli_fetch_object($query)) :
                ?>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                    <div class="card" width="250px">
                        <img src="assets/no-poster-available.jpg" width="180px">

                        <div class="card-text">
                            <h1><?= $row->title; ?></h1>
                            <h2>(<?= $row->release_year; ?>)</h2>
                            <div class="card-tag">
                                <p>Length: <?= $row->length; ?> Minutes</p>
                            </div>
                            <div class="card-rating">
                                <p>Rating: <?= $row->rating; ?></p>
                            </div>
                        </div>

                        <div class="card-button">
                            <div class="card-button-right">
                                <button type="button" class="btn card-button-delete btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg>
                                </button>
                                <button type="button" class="btn card-button-edit btn-outline-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="card-button-left">
                                <button type="button" class="btn card-button-details btn-info" onclick="detail()">Details</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="./assets/js/script.js"></script>

    </body>

</html>
