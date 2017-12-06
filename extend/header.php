 <?php //include '../conexion/conexion.php'; DESHABILITAMOS LA CONEXION DEL HEADER PARA QUE NO REDECLARE LA CLASE PRODUCTO?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clinica Lourde</title>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../css/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.1/sweetalert2.all.min.js"></script>
    
    <style media="screen">

 
      header, main, footer {
      padding-left:300px;

    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }
    </style>
    <link rel="stylesheet" href="../css/header.css"> 
    <script type="text/javascript" src="../js/base.js"></script>
</head>

<body>
 
<main>
    <?php  include '../extend/menu_lat.php'?>
   