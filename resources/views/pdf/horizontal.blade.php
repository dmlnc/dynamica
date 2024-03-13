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
/*			background: #000;*/
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
			margin-bottom: 240px;
		}

		h2{
			margin-top: 0;
			line-height: 20px;
			font-size: 24px;
			font-weight: 400;
		}
		h3{
			font-weight: bold;
			font-size: 36px;
			margin-top: 0;
			margin-bottom: 5px;
		}
		h4{
			font-weight: normal;
			font-size: 30px;
			margin-top: 0;
			margin-bottom: 0;
		}
		.pdf-body{
			position: relative;
			background: #fff;
			padding: 30px;
			height: 193.5mm;
			width: 280mm;
		}

		.title{
			position: absolute;
			top: 30px;
			left: 50px;
			width: 34%;
			display: inline-block;
		}
		.how{
			position: absolute;
			right: 10px;
			left: 10px;
			bottom: 10px;
			width: calc(100% - 20px);
			display: inline-block;
			
			background: #e1e0e0;
/*			padding: 20px;*/
			height: 100px;
		}
		.how h2{
/*			margin-bottom: 60px;*/
			position: absolute;
			left: 20px;
			bottom: 30px;
			display: inline-block;
			width: 30%;
			margin-bottom: 0;
/*			margin-top: 10px;*/
		}
		.steps{
			display: inline-block;
			width: 69%;
			position: absolute;
			bottom: 10px;
			right: 20px;
		}
		.step{
/*			margin-bottom: 30px;*/
			width: 32%;
			display: inline-block;
		}
		.step-icon{
			margin-right: 10px;
			width: 50px;
			height: 50px;
			font-size: 24px;
			background: #fff;
			border-radius: 5px;
			font-weight: 700;
			text-align: center;
			line-height: 30px;
			display: inline-block;
		}
		.step-text{
			display: inline-block;
			font-weight: 400;
			width: calc(100% - 70px);
			font-size: 21px;
			line-height: 0.8;
		}
		.qr-block{
			position: absolute;
			top: 80px;
			right: 50px;
			padding: 0;
			margin: 0;
			width: 64%;
			text-align: right;
		}
		
		.qr-block p{
			margin-bottom: 0;
		}
		.numbers{
			position: absolute;
			top: 20px;
			right: 20px;
			font-size: 24px;
		}
	</style>

	<div class="pdf-body">
		<div class="numbers">
			{{$data['ownersByPts']}}
			{{$data['pts']}}
			{{$data['accidents']}}
			{{$data['repaints']}}
			{{$data['mileage']}}
		</div>
		<div class="row">
			<div class="title">
				<h1>Узнать цену</h1>

				<h3>{{$name}}</h3>
				<h4>{{$info}}</h4>

			</div>
			<div class="how">
				<h2>Как сканировать<br>QR-код</h2>

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
			
			<img src='{{$qr}}'/>
			<p>VIN: {{$vin}}</p>
		</div>
		
	</div>
	





</body>
</html>