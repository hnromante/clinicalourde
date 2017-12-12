<?php
include '../conexion/conexion.php';
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alerta!</title>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/materialize.min.css">   
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.1/sweetalert2.all.min.js"></script>
</head>

<body>
	<?php 
		$msj = htmlentities($_GET['msj']);
		$carp = htmlentities($_GET['carp']);
		$pag = htmlentities($_GET['pag']);
		$tipo = htmlentities($_GET['tipo']);

		switch ($carp) {
			case 'us':
				$carpeta = "../usuarios/";
				break;
		}
		switch ($pag) {
			case 'in':
				$pagina = "index.php";
				break;
		}

		//Combinacion la carpeta y la pagina recibida
		$dir = $carpeta.$pagina;

		if($tipo =="error"){
			$titulo = "Oppss";
		}else{
			$titulo = "Bien hecho!";
		}
	?>
	<script>
		swal({
		  title: '<?php echo $titulo ?>',
		  text: "<?php echo $msj ?>",
		  type: '<?php echo $tipo ?>',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ok'
			}).then(function () {
			location.href='<?php echo $dir ?>';
		});

		$(document).click(function(){
			location.href='<?php echo $dir ?>';
		});

		$(document).click(function(e){
			if(e.which == 27){
				location.href='<?php echo $dir ?>';
			}
		});
	</script>
</body>

