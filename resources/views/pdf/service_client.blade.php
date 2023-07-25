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
        @page{
            margin: 50px 0px 0px 0px;
            margin-bottom: 0!important;
        }
        
        *{
            box-sizing: border-box;
        }
        html{
            margin-bottom: 0;
        }

		body{
			font-family: FuturaFuturisC, sans-serif; 
			padding: 0;
			margin: 0;
            font-weight: 300;
		}

		h1{
			font-size: 26px;
			font-weight: 400;
            margin: 0;
            margin-bottom: 25px
		}
        h1.extra{
			font-size: 32px;
		}

		h2{
			margin-top: 0;
            margin-bottom: 13px;
			/* line-height: 20px; */
			font-size: 20px;
			font-weight: 400;
            display: inline-block;
            padding-bottom: 2px;
            border-bottom: 2px solid #000;
		}

		.pdf-body{
			position: relative;
			padding: 0 30px;
            /* width: 196mm; */
            /* margin: 0 auto; */
            /* border: 1px solid black; */
            /* background: red; */
		}
        p{
            margin-bottom: 0px;
            margin-top:  0px;
        }
        .field-name{
            margin-bottom: 10px;
            display: inline-block;
            /* margin-top: 15px; */
        }
        .field-name--subfield{
            margin-bottom: 0px;
            position: relative;
            left: -10px;
        }
        .field-value{
            font-weight: 400;
            margin-bottom: 10px;
            /* text-transform: uppercase; */
        }
        .field-value--subfield{
            margin-bottom: 5px;
        }
        .field-comment{
            margin-bottom: 10px;
            color: #999;
        }
        .field-comment--subfield{
            margin-bottom: 5px;
        }
        .field-comment span{
            text-decoration: underline;
        }
        .field{
            padding-bottom: 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
        }
        .subfield{
            margin-top: 10px;
            padding-left: 30px;
            position: relative;
        }
        .subfield-number{
            position: relative;
            top: -5px;
            left: -25px;
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #ccc;
            /* margin-top: -10px; */
        }
        .field-media-image{
            display: inline-block;
            margin: 5px;
            max-width: 51%;
        }
        .single-field{
            margin-bottom: 10px;
        }
        .block{
            margin-bottom: 30px;
        }
        b{
            font-weight: 400;
        }
        .gray{
            color: #ccc;
        }
        .act-number{
            margin-bottom: 20px;
            font-size: 14px;
        }

        .mb-5{
            margin-bottom: 80px;
        }
        .mb-3{
            margin-bottom: 40px;
        }
        .row{

        }

        .col-7{
            display: inline-block;
            width: 60%;
        }
        .col-5{
            display: inline-block;
            width: 39%;
        }
        .avoid-break{
            page-break-inside: avoid;
        }
	</style>

	<div class="pdf-body">
        <h1 class="extra">Акт осмотра транспортного средства</h1>
        <p class="act-number">ПРИЛОЖЕНИЕ К ДОГОВОРУ КУПЛИ-ПРОДАЖИ</p>
        <div class="block">
            <h2>Транспортное средство</h2>
            <p class="single-field">Марка &nbsp;<b>{{$serviceForm->brand->name}}</b></p>
            <p class="single-field">Модель &nbsp;<b>{{$serviceForm->car_model->name}}</b></p>
            <p class="single-field">Цвет &nbsp;<b>{{$serviceForm->color->name}}</b></p>
            <p class="single-field">VIN &nbsp;<b>{{$serviceForm->vin}}</b></p>
        </div>

        <h1>Техническая диагностика</h1>
        <!-- <div class="block">
            <h2>Двигатель</h2>

        </div> -->



        <?php
            $id_blocks = [
                'Двигатель' => [64, 148, 150, 46, 65, 49, 50, 48, 51],
                'Электронные системы автомобиля' => [41, 42],
                'Подвеска и трансмиссия' => [80, 81, 87, 88, 71, 82, 100, 117, 131, 139, 110, 127, 91],
                'Осмотр кузовных деталей на подъемнике' => [90, 43, 44],
                'Электрика и дополнительные функции автомобиля' => [1, 17, 26],
                // ... add more blocks and field IDs here ...
            ];

            function renderField($field, $subfield = false, $index = 0) {
                $value = ($field['value']);
                if ($value == null || $value->color == '#0070c0') {
                    return;
                }
                $class="field";
                if($subfield){
                    $class="subfield";
                }
                echo '<div class="'.$class.'">';

                if($subfield){
                    echo '<div class="subfield-number"></div>';
                }

                echo '<p class="field-name field-name--'.$class.'">'
                    . htmlspecialchars($field['name']) . '</p>';

                echo '<p class="field-value field-value--'.$class.'" style="color: ' . htmlspecialchars($value->color) . '">'
                    . htmlspecialchars($value->value) . '</p>';
            
                if ($value->showComments && $field['comment'] && trim($field['comment']) != '') {
                    echo '<p class="field-comment field-comment--'.$class.'"><span>Комментарий</span>: ' . htmlspecialchars($field['comment']) . '</p>';
                }
            
                if ($value->showPhoto && count($field['media']) > 0) {
                    echo '<div class="field-media"><p class="field-comment">Фото:</p>';
                    
                    foreach ($field['media'] as $photo) {
                        echo '<img class="field-media-image" src="' . ($photo['base64_url']) . '">';
                    }
                    echo '</div>';
                }
            
                if ($value->showSubfields) {
                    echo '<p class="field-subfields-title"><b>Дополнительно:</b></p>';
                    foreach ($field['subfields'] as $key=>$subfield) {
                        renderField($subfield, true, $key+1);
                    }
                }
                echo '</div>';
            }
        ?>






        @foreach ($id_blocks as $block_title => $field_ids)
            <div class="block">
            <h2>{{ $block_title }}</h2>
            @foreach ($field_ids as $field_id)
                @php
                    $field = $fields->firstWhere('id', $field_id);
                @endphp
                @if ($field)
                    <?php renderField($field); ?>
                @endif
            @endforeach
            </div>
        @endforeach

        @if($serviceForm->comment != null && trim($serviceForm->comment) != '')
            <div class="block">
                <div class="field">
                    <h2>Дополнительные комментарии по автомобилю</h2>
                    <p class="field-comment">{{ $serviceForm->comment }}</p>
                </div>
            </div>
        @endif
        <div class="mb-5"></div>
        <div class="avoid-break">
            @if($serviceForm->diagnost != null)
                <p class="single-field mb-3"><b>Диагност:</b> &nbsp;{{$serviceForm->diagnost->name}} <span class="gray">/ {{$serviceForm->updated_at}}</span></p>
            @endif   
            <p class="single-field mb-3"><b>Продавец:</b> &nbsp;<span class="gray">_______________________________</span></p>
            <p class="single-field mb-3">С транспортным средством и<br>информацией по нему ознакомлен(а):</p>
            <div class="row">
                <div class="col-7">
                    <p class="single-field"><b>Покупатель:</b> &nbsp;<span class="gray">_______________________________</span></p>
                </div>
                <div class="col-5">
                    <p class="single-field"><b>Дата:</b> &nbsp;<span class="gray">_____________</span></p>
                </div>
            </div>
        </div>

        

    
	</div>
	





</body>
</html>