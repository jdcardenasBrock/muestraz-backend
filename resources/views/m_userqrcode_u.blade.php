<style>
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	background: #f2f2f2;
}

body {
	font-family: 'Open Sans', sans-serif;
}

.contenedor {
	max-width: 90%;
	width: 400px;
	margin: 80px auto;
}

.formulario input[type='text'] {
	padding: 20px;
	border: none;
	background: #fff;
	width: 100%;
	border-radius: 5px;
	box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	font-size: 20px;
	margin-bottom: 20px;
	font-family: 'Open Sans', sans-serif;
}

.formulario .btn {
	width: 100%;
	border: none;
	background: rgb(0, 0, 0);
	color: #fff;
	cursor: pointer;
	padding: 20px;
	font-size: 20px;
	border-radius: 5px;
	font-family: 'Open Sans', sans-serif;
}

.formulario .btn:hover {
	background: #3e14b2;
}

.contenedorQR {
	display: flex;
	justify-content: center;
	padding: 40px 0;
}
</style>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Código QR con Javascript</title>
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />
		<link rel="stylesheet" href="estilos.css" />
		<script defer src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
		<script defer src="app.js"></script>
	</head>
	<body>
		<div class="contenedor">
			<form action="" id="formulario" class="formulario">
				<input type="text" id="link" placeholder="Escribe el texto o URL" />
				<button class="btn">Generar QR</button>
			</form>

			<div id="contenedorQR" class="contenedorQR"></div>
		</div>
	</body>
</html>


