<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PDF</title>
	<link rel="stylesheet" type="text/css" href="fonts/futura_futuris/stylesheet.css">
</head>
<body>
	
	<style>
 
		
		body{
			font-family: FuturaFuturisC, sans-serif; 
			padding: 0;
			margin: 0;
		}
		html{
			padding: 0;
			margin: 0;
		}

		h1{
			line-height: 60px;
			font-size: 80px;
			font-weight: 700;
			text-transform: uppercase;
			margin-bottom: 120px;
		}

		h2{
			margin-top: 0;
			line-height: 28px;
			font-size: 32px;
			font-weight: bold;
		}
		h3{
			font-weight: bold;
			font-size: 30px;
			margin-top: 0;
			margin-bottom: 10px;
		}
		h4{
			font-weight: normal;
			font-size: 24px;
			margin-top: 0;
			margin-bottom: 0;
		}
		.pdf-body{
			position: relative;
			background: #fff;
			padding: 30px;
			width: 193.5mm;
			height: 280mm;
		}
		.title{
			position: absolute;
			top: 10px;
			left: 50px;
			width: 65%;
			display: inline-block;
		}
		.how{
			position: absolute;
			right: 10px;
			top: 60px;
			width: 34%;
			display: inline-block;

		}

		.how h2{
			margin-bottom: 60px;
		}

		.step{
			margin-bottom: 30px;
			width: 280px;
		}

		.step-icon{
			margin-right: 10px;
			width: 50px;
			height: 50px;
			font-size: 24px;
			background: #e1e0e0;
			border-radius: 5px;
			font-weight: 700;
			text-align: center;
			line-height: 30px;
			display: inline-block;
		}
		.step-text{

			display: inline-block;
			font-weight: 400;
			width: 180px;
			font-size: 21px;
			line-height: 0.8;
		}

		.qr-block{
			position: absolute;
			top: 500px;
			left: 18%;
			padding: 0;
			margin: 0;
			width: 64%;
			text-align: right;
		}

		.qr-block p{
			margin-top: 0;
		}
	</style>

	<div class="pdf-body">
		<div class="row">
			<div class="title">
				<h1>Узнать цену</h1>

				<h3>{{$name}}</h3>
				<h4>{{$info}}</h4>

			</div>
			<div class="how">
				<h2>Как сканировать QR-код</h2>

				<div class="steps">
					<div class="step">
						<div class="step-icon">
							1
						</div>
						<div class="step-text">Включите<br>камеру</div>
					</div>
					<div class="step">
						<div class="step-icon">
							2
						</div>
						<div class="step-text">Наведите<br>на QR-код</div>
					</div>
					<div class="step">
						<div class="step-icon">
							3
						</div>
						<div class="step-text">Перейдите<br> по ссылке</div>
					</div>
				</div>
			</div>
		</div>
		<div class="qr-block">
			<p>VIN: {{$vin}}</p>
			<img src='{{$qr}}'/>
		</div>
		
	</div>





</body>
</html>