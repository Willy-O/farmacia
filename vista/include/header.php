<?php
  session_start();
  if(!isset($_SESSION['usuario'])) 
  { 
      ?>
        <script type="text/javascript">
            window.location="./../..";
        </script>
      <?php 
  } 
?>
<!doctype html>
<html lang="es">
  <head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../recursos/bootstrap4/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="../../recursos/bootstrap4/js/jquery-3.4.1.js"></script>
    <script src="../../recursos/js/fontawesome-all.js"></script>
    <script src="../../recursos/js/all.js"></script>
    <link rel="stylesheet" href="../../recursos/css/select2.css">
    <script src="../../recursos/js/select2.js"></script>

    <title>FASMIJ</title>
  </head>
  <body>