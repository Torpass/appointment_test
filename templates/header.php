<?php
// session_start();
// if(!isset($_SESSION['user'])){
//     header('Location: http://localhost/appointments/login.php');
//     die();
// }
$base_url = 'http://localhost/appointments';
?>
<!doctype html>
<html lang="en">

<head>
  <title>Grows system </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    

  <!-- Jquery integration -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

  <!-- Datatable integration -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css"/>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

  <!-- Sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo $base_url?>/views/index.php" aria-current="page">Appointment system<span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_url?>/views/locations/">Locations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_url?>/views/schedules/index.php">Schedules</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_url?>/views/employees/index.php">Employees</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_url?>/views/appointments/index.php">Appointments</a>
            </li>
        </ul>
    </nav>
  </header>


  <main class='container'>