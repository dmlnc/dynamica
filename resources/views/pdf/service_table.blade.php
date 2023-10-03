<?php

    $lkpTranslates = [
        'left' => 'Левая часть',
        'back' => 'Задняя часть',  
        'right' => 'Правая часть',  
        'front' => 'Передняя часть',  
        'glass' => 'Стеклянные элементы',      
    ];
            $blocks = [
                'Осмотр из салона автомобиля' => 3.1,
                'Осмотр подкапотного пространства сверху' => 3.2,
                'Осмотр автомобиля, поднятого на среднюю высоту' => 3.3,
                'Осмотр снизу автомобиля со снятой защитой двигателя' => 3.4,
            ];

            $allphotos = '';

            function renderField($field, $subfield = false, $index = 0) {
                $photos = '';
                $value = ($field['value']);
                if ($value == null) {
                    return;
                }
                if($value->color == '#ffcc00'){
                    $value->color = '#b79200';
                }

                $name = htmlspecialchars($field['name']);
                $class = '';

                if($subfield){
                    $class = 'tr-subfield';
                }

                if ($value != null && $value->showSubfields) {
                    foreach ($field['subfields'] as $key=>$subfield) {
                        $photos .= renderField($subfield, true, $key+1);
                    }

                } else { 
                    echo '<tr class="'.$class.'">';
                    echo '<td>'. $name .'</td>';
                    
                    if($value != null ){
                        $val = htmlspecialchars($value->value);
                        echo '<td style="color:' . htmlspecialchars($value->color) . '">'. $val . '</td>';

                        if ($value->showComments && $field['comment'] && trim($field['comment']) != '') {
                            echo '<td>' . htmlspecialchars($field['comment']) . '</td>';
                        } else {
                            echo '<td></td>';
                        }

                    } else {
                        echo '<td class="gray">-</td>';
                        echo '<td></td>';
                    }

                    echo '</tr>';
                }


                if ($value != null && $value->showPhoto && count($field['media']) > 0) {
                    $photos = '<tr><th colspan="2">'.$name.'</th></tr>';
                    $i = 0;
                    $count = count($field['media']);
                    $photos .= '<tr>';
                    foreach ($field['media'] as $photo) {
                        $photos .= '<td style="width: 50%; text-align: center;"><img class="field-media-image" src="' . ($photo['base64_url']) . '"></td>';
                        $i += 1;

                        if( $i != 0 && $i % 2 == 0 ){
                            $photos .= '</tr>';
                        }
                        if( $i % 2 == 0 && $count != $i+1 ){
                            $photos .= '<tr>';
                        }
                        
                    }

                    if($count % 2 != 0){
                        $photos.='<td></td></tr>';
                    }
                }

                
                return $photos;
            }
?>

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
            font-size: 12px;
		}

		h1{
			font-size: 20px;
			font-weight: 400;
            margin: 0;
            margin-bottom: 15px
		}

		h2{
			margin-top: 0;
            margin-bottom: 15px;
			/* line-height: 20px; */
			font-size: 14px;
			font-weight: 400;
		}

		.pdf-body{
			position: relative;
			padding: 0 30px;
		}
        
        .subfield-number{
            position: relative;
            top: -2px;
            display: inline-block;
            width: 14px;
            height: 1px;
            background: #ccc;
            margin-right: 10px;
            margin-left: 5px;
        }
        .field-media-image{
            display: inline-block;
            /* margin: 5px; */
            max-width: 100%;
            max-height: 160px;
            height: auto;
            width: auto;
        }
        .page_break { page-break-before: always; }
        .single-field{
            margin-bottom: 2px;
        }
        b{
            font-weight: 400;
        }
        .gray{
            color: #ccc;
        }
        .act-number{
            /* margin-bottom: 20px; */
            font-size: 13px;
        }

        .mb-5{
            margin-bottom: 80px;
        }

        .mb-3{
            margin-bottom: 30px;
        }
        .mb-1{
            margin-bottom: 10px;
        }
        .mb-2{
            margin-bottom: 15px;
        }
        .mb-0{
            margin-bottom: 0px!important;
        }

        .col-7{
            display: inline-block;
            width: 60%;
        }
        .col-5{
            display: inline-block;
            width: 39%;
        }

        table{
            width: 100%;
        }
        table.table-fields{
            font-size: 10px;
        }
        table.table-fields th{
            padding: 5px;
            font-weight: normal;
        }
        table.table-fields td{
            padding: 1px 5px;
            line-height: 0.9;
        }
        table.table-fields, table.table-fields th, table.table-fields td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table.table-fields tr.tr-subfield td{
            /* padding: 1px 5px; */
        }
        table.table-fields tbody th{
            /* text-align: left; */
            text-align: center!important;
            background: #ccc;
            padding: 3px 5px;
            font-size: 12px;
            padding-top: 1px;
            /* font-weight: bold; */
        }
        table.table-fields thead th{
            background: #4ba82e;
            color: #fff;
            font-size: 12px;
            padding-top: 2px;

        }
        table.table-fields .tbody-th-green{
            background: #4ba82e;
            color: #fff;
            text-align: center;
        }
        table.table-fields.three-th thead th:nth-child(1){
            width: 45%;
        }
        table.table-fields.three-th thead th:nth-child(2){
            width: 15%;
        }
        table.table-fields.three-th thead th:nth-child(3){
            width: 40%;
        }
        table.table-fields.three-th tbody tr td:nth-child(2){
            text-align: center;
        }
        .table-photos tbody th{
            text-align: center!important;
        }
        .table-photos .tbody-th-green{
            font-size: 12px;
        }
        table.table-fields.lkp-table thead th:nth-child(1){
            width: 30%;
        }
        table.table-fields.lkp-table thead th:nth-child(2){
            width: 60%;
        }
        table.table-fields.lkp-table thead th:nth-child(3){
            width: 10%;
        }
	</style>

	<div class="pdf-body">
        <h1 class="mb-2">Акт осмотра транспортного средства</h1>
        <p class="act-number">{{$serviceForm->brand->name}} {{$serviceForm->car_model->name}}, &nbsp;{{$serviceForm->color}}, &nbsp;VIN: {{$serviceForm->vin}}, &nbsp;пробег: {{$serviceForm->run}} км.</p>

        <!-- <table style="width: 100%" class="mb-2 table-fields">
            <tbody>
                <tr>
                    <td style="width: 33%">Марка: &nbsp;<b>{{$serviceForm->brand->name}}</b></td>
                    <td style="width: 33%">Модель: &nbsp;<b>{{$serviceForm->car_model->name}}</b></td>
                    <td style="width: 33%">Пробег, км.: &nbsp;<b>{{$serviceForm->run}}</b></td>
                </tr>
                <tr>
                    <td>Цвет: &nbsp;<b>{{$serviceForm->color}}</td>
                    <td>VIN: &nbsp;<b>{{$serviceForm->vin}}</b></td>
                    <td></td>
                </tr>
            </tbody>
        </table> -->

        @if($serviceForm->lkp_data != null)

            @inject('controller', 'App\Http\Controllers\Api\V1\Admin\ServiceFormsApiController')

            <?php
                $lkpTable = $controller->generateLKPTableData($serviceForm->id);
            ?>
            
            <h2>Осмотр кузова с указанием толщины ЛКП</h2>

            <div style="text-align: center;" class="mb-3">
                <img src="data:image/svg+xml;base64,{!! $controller->generateLKPSvg($serviceForm->id) !!}" style="width: 90%;">
            </div>
            <table class="table-fields lkp-table mb-3">
                <thead>
                    <th>Осмотр</th>
                    <th>Комментарий</th>
                    <th>ЛКП</th>
                </thead>
                <tbody>
                    @foreach ($lkpTable as $key => $rows)
                        <th class="th-section" colspan="3">{{ $lkpTranslates[$key] }}</th>
                        @foreach ($rows as $row)
                        <tr>
                            <td>
                                @if($row['note'] == 'warning')
                                    <img style="height: 8px" src="data:image/svg+xml;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAC5zwKfAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABuVBMVEUAAAD/yDf/zDP/zTL/zDP/zDP/zDP/zDP/1Sv/zDP/zDP/zDP/yTb/zDP/zDP/zDP/yjX/zDP/zDP/yzT/zDP/qlX/zDP/zDP/2yT/zDP/zDP/0i3/zDP/zDP/yjX/zDP/yzT/zTL/zDP/zTL/yzT/zDP//wD/zTL/zDP/zDP/zDP/zDP/zDP/0S7/zDP/zDP/zDP/yzT/yzT/zDP/zDP/zDP/yzT/zDP//wD/zTL/yzT/xjn/zDP/zDP/zTL/yzT/yDf/zDP/zDP/zTL/zTL/zjH/yzT/zDP/zDP/v0D/yzT/zDP/xDv/zDP/zDP/xjn/zTL/zTL/zDP/zDP/zDP/yjX/zTL/zTL/zTL/yzT/yzT/zDP/zDP/yzT/zTL/zjH/zDP/zDP/zDP/yzT/zDP/zDP/yzT/yDf/zDP/zTL/zDP/zDP/zTL/yzT/zDP/zDP/zTL/zDP/zDP/yzT/yzX/yzT/zTL/yzT/zDP/zzD/zDP/yzT/zDP/yzT/zDP/zTL/zDP/zjH/zTL/zDP/zDP/zDP/zDP/zTL/yzT/zDP/zDP/yzT/yTb/zTL/zDP/zDP/zTL/zDP///8acFQiAAAAkXRSTlMADgVr0v3TbQYe1dghGeHlHaavQEsD0NsHaXMR6/IYkJkp+jO3xAFMVeIKdHwW8PWbozH8/jzBzAJXXgnf6H+FHPT5JKw5RcnUBGJoDebtEomOI/j7K7G7Qkpx7PGUmCq5w1BU2nh7F5+iMsJbXeeChKqrO0TLZmfqEI0ntUnXcO8Vk5L2937AvMdvbBOnzYw4OKaH7QAAAAFiS0dEkpYE7yAAAAAHdElNRQfjCAkBJjIbt39UAAACK0lEQVRYw+3Y6TtUYRzG8cdkMhJRWbIWUpElMyGRLbuhDJKRUFmiyRYaa4sKofs/tgxmO8uz/K5e+b481zOfNzPXmfscxi76X0VEUGqWS5FW6+UoG5UXfQUnxVyl8WLjcNq1eBIwAeddp/BuIKCb6l5iUiCYnKIM3kJQqapeWnowmJGpCGYhpNtq3p3sUNCaowTmIqy7eQrePWh0X96zxWiBD/KlwQJo9lDWKyzSBoujJcES6PRIziu164GOx1JgGXQrr5DwnsCgSnHvaZX/42fX/Feqxf9insEIRI2oV1tnDNY3yN/3NUE8F/MaHWYgmkS8imaYgi2tAmAbzEG083sdTh6ws4sbfAEeEC95vW4XH9jTywn2gQ/EKz6vH7wgXnNNhUh+kGtIRIEfxADHVHCLgIPmQ+INREAMmXlve8RA0yExDDEQI8ZDYhSiIN4ZToX34qDhkPgAcRBj+t74oAxoMCQmIANiUs/7aJUD9YZE3hQk0xkS05Duk+ZUiJMHPVpD4jMUmgn34otVQFf4kJiFUnOh3rxDDcRCyFT4oughKTEIXDQ8bPLD9rUU9IrCow4ufw0AvVAH4fV7DS4KMHvlHFwFBYjVs3MLoAGx5jvW2kIFrltOjg2ACsTG8amuTpC1+e0I/A7Cfhw9w/6kBLcy2S+QNsZ+04J/2CYt6GZuWtDDymnBbbZDC+4yC+m3MmJj7O8enZeQ5nuW9e477aqW3bl/8O/i9TxJh0jE2+SUYHDwAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE5LTA4LTA5VDAxOjM4OjUwKzAwOjAwH4v/QAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxOS0wOC0wOVQwMTozODo1MCswMDowMG7WR/wAAAAASUVORK5CYII=" alt="">
                                @endif
                                @if($row['note'] == 'danger')
                                    <img style="height: 8px" src="data:image/svg+xml;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAC5zwKfAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABuVBMVEUAAADbNzfMMzPeMjLdMzPdMzPdMzPcMzPVKyvdMzPdMzPdMzPgNjbgMzPdMzPcMzPcNTXdMzPdMzPbNDTdMzP/VVXdMzPdMzPbJCTdMzPeMzPhLS3dMzPdMzPfNTXdMzPeNDTgMjLdMzPcMjLeNDTdMzP/AADdMjLeMzPdMzPmMzPeMzPcMzPcLi7dMzPdMzPcMzPdNDTbNDTdMzPdMzPdMzPdNDTdMzP/AADcMjLcNDTjOTndMzPdMzPdMjLcNDTbNzfdMzPdMzPcMjLdMjLbMTHeNDTdMzPdMzO/QEDdNDTdMzPYOzvdMzPdMzPjOTndMjLdMjLbMzPdMzPdMzPbNTXcMjLdMjLcMjLdNDTdNDTeMzPdMzPdNDTdMjLbMTHdMzPdMzPcMzPeNDTdMzPdMzPeNDTeNzfdMzPcMjLbMzPdMzPdMjLeNDTdMzPeMzPcMjLdMzPdMzPcNDTdNTXdNDTcMjLcNDTdMzPfMDDdMzPeNDTdMzPcNDTdMzPdMjLdMzPbMTHcMjLeMzPdMzPdMzPdMzPcMjLdNDTcMzPdMzPeNDTXNjbdMjLdMzPcMzPfMjLdMzP///8kCjhTAAAAkXRSTlMADgVr0v3TbQYe1dghGeHlHaavQEsD0NsHaXMR6/IYkJkp+jO3xAFMVeIKdHwW8PWbozH8/jzBzAJXXgnf6H+FHPT5JKw5RcnUBGJoDebtEomOI/j7K7G7Qkpx7PGUmCq5w1BU2nh7F5+iMsJbXeeChKqrO0TLZmfqEI0ntUnXcO8Vk5L2937AvMdvbBOnzYw4OKaH7QAAAAFiS0dEkpYE7yAAAAAHdElNRQfjCAoGHxjZcoJTAAACK0lEQVRYw+3Y6TtUYRzG8cdkMhJRWbIWUpElMyGRLbuhDJKRUFmiyRYaa4sKofs/tgxmO8uz/K5e+b481zOfNzPXmfscxi76X0VEUGqWS5FW6+UoG5UXfQUnxVyl8WLjcNq1eBIwAeddp/BuIKCb6l5iUiCYnKIM3kJQqapeWnowmJGpCGYhpNtq3p3sUNCaowTmIqy7eQrePWh0X96zxWiBD/KlwQJo9lDWKyzSBoujJcES6PRIziu164GOx1JgGXQrr5DwnsCgSnHvaZX/42fX/Feqxf9insEIRI2oV1tnDNY3yN/3NUE8F/MaHWYgmkS8imaYgi2tAmAbzEG083sdTh6ws4sbfAEeEC95vW4XH9jTywn2gQ/EKz6vH7wgXnNNhUh+kGtIRIEfxADHVHCLgIPmQ+INREAMmXlve8RA0yExDDEQI8ZDYhSiIN4ZToX34qDhkPgAcRBj+t74oAxoMCQmIANiUs/7aJUD9YZE3hQk0xkS05Duk+ZUiJMHPVpD4jMUmgn34otVQFf4kJiFUnOh3rxDDcRCyFT4oughKTEIXDQ8bPLD9rUU9IrCow4ufw0AvVAH4fV7DS4KMHvlHFwFBYjVs3MLoAGx5jvW2kIFrltOjg2ACsTG8amuTpC1+e0I/A7Cfhw9w/6kBLcy2S+QNsZ+04J/2CYt6GZuWtDDymnBbbZDC+4yC+m3MmJj7O8enZeQ5nuW9e477aqW3bl/8O/i9TxJh0jE2+SUYHDwAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE5LTA4LTEwVDA2OjMxOjI0KzAwOjAwOro6RQAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxOS0wOC0xMFQwNjozMToyNCswMDowMEvngvkAAAAASUVORK5CYII=" alt="">
                                @endif
                                <?php 
                                    $name = $row['name'];
                                    if($row['note'] != null){
                                        $name ='<b>'.$row['name'].'</b>';
                                    }
                                ?>
                                {!! $name !!}
                            </td>
                            <td>{{ $row['problems'] }}</td>
                            <td>{{ $row['lkp'] }}</td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        @endif


        <h2>Техническая диагностика</h2>

        <table class="table-fields three-th mb-3">
            <thead>
                <th>Работа</th>
                <th>Результат</th>
                <th>Комментарий</th>
            </thead>
            <tbody>
            @foreach ($blocks as $block_title => $section_id)
                    <th class="th-section" colspan="3">{{ $block_title }}</th>
                @php
                    $data_fields = $fields->where('section', $section_id);
                @endphp
                
                @foreach ($data_fields as $field)
                    <?php $allphotos .= renderField($field); ?>
                @endforeach
            @endforeach
            </tbody>
        </table>

        @if($serviceForm->comment != null && trim($serviceForm->comment) != '')
            <table class="table-fields mb-3">
                <thead>
                    <th>Дополнительные комментарии по автомобилю</th>
                </thead>
                <tbody>
                    <tr>
                        <td><{!! $serviceForm->comment !!}</td>
                    </tr>
                </tbody>
            </table>
        @endif

        @if($serviceForm->recommendation != null && trim($serviceForm->recommendation) != '')
            <table class="table-fields mb-3">
                <thead>
                    <th>Рекомендации</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{!! $serviceForm->recommendation !!}</td>
                    </tr>
                </tbody>
            </table>
        @endif
        
        @if($serviceForm->diagnost != null)
            <p class="single-field mb-0"><b>Диагност:</b> &nbsp;{{$serviceForm->diagnost->name}} <span class="gray">/ {{$serviceForm->updated_at}}</span></p>
        @endif    
        

        @if ($allphotos != '')
            <div class="page_break"></div>
            <h2>Фотографии в ходе диагностики</h2>
            
            <table class="table-photos table-fields mb-2">
                <tbody>
                    <?=$allphotos;?>
                </tbody>
            </table>
        @endif

	</div>
	





</body>
</html>