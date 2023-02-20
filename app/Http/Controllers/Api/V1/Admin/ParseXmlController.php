<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use SimpleXMLElement;
use Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ParseXmlController extends Controller
{

    protected function mb_trim($string) {
        return mb_ereg_replace("^[\s　]+|[\s　]+$", "", $string);
    }

    protected $enableLogoScrapper = true;

    protected $colors = [
        "белый" => '#ffffff',
        "серебряный" => '#c0c0c0',
        "желтый" => '#FFFF00',
        "черный" => '#000000',
        "красный" => '#FF0000',
        "серый" => '#808080',
        "коричневый" => '#654321',
        "синий" => '#0000FF',
        "зеленый" => '#00FF00'
    ];

    protected $gearboxes = [
        'автоматическая' => 'АКПП',
        'механическая' => 'MКПП',
        'автомат робот' => 'Робот',
        'автомат вариатор' => ' Вариатор'

    ];

    public function getPdf(Request $request)
    {   
        // QrCode::;

        $vin = $request->input('vin');
        $vin = '...'.substr((string)$vin, -6);
        $name = $request->input('name');
        $info = $request->input('info');
        $link = $request->input('link');
        $type = $request->input('type');

        

        $settings = Settings::find(1);

        $link = 'https:://google.com/?link='.$link.'&utm_source='.$settings->utm_source.'&utm_medium='.$settings->utm_medium.'&utm_content='.$settings->utm_content.'&utm_term='.$settings->utm_term.'&utm_campaign;='.$settings->utm_campaign;

        // format('png')->
        $qr = QrCode::size(500)->generate($link);
        $qr = 'data:image/svg+xml;base64,' . base64_encode($qr);


        // return view('pdf.vertical', ['qr' => $qr, 'name' => $name, 'vin'=>$vin, 'info'=>$info]);
        // return view('pdf.horizontal', ['qr' => $qr, 'name' => $name, 'vin'=>$vin, 'info'=>$info]);

        $pdf = null;
        if($type == 1){
            $pdf = PDF::loadView('pdf.vertical', ['qr' => $qr, 'name' => $name, 'vin'=>$vin, 'info'=>$info]);
            $pdf->setPaper('A4');
        } else {
            $pdf = PDF::loadView('pdf.horizontal', ['qr' => $qr, 'name' => $name, 'vin'=>$vin, 'info'=>$info]);
            $pdf->setPaper('A4', 'landscape');
        }
        

        return $pdf->download('pdf'.$vin.'.pdf');
    }

    public function index()
    {

        set_time_limit(0);

        $url = 'https://media.cm.expert/stock/export/cmexpert/dealer.site/all/1a6f30ed5c29e6b5d2fdd1d87740b925.xml';

        $xml = file_get_contents($url);

        // Parse the XML using SimpleXMLElement
        $xmlData = new SimpleXMLElement($xml);

        $data = [];
        $brands = [];

        $meta = [
            'min_price' => INF,
            'max_price' => 0,
            'min_run' => INF,
            'max_run' => 0,
            'min_year' => INF,
            'max_year' => 0,
            'brands' => [
            ],
        ];


        foreach ($xmlData->cars->car as $car) {

            $colorName = (string)$car->color;
            $colorCode = '#ffffff';


            if(isset($this->colors[mb_strtolower($colorName)]) !== false) {
                $colorCode = $this->colors[mb_strtolower($colorName)];
            }

            $gearbox = (string)$car->gearbox;

            if(isset($this->gearboxes[mb_strtolower($gearbox)])) {
                $gearbox = $this->gearboxes[mb_strtolower($gearbox)];
            }

            $model = (string)$car->folder_id;
            if($result = strstr($model, ',', true)){
                $model = $result;
            }
            $brand = (string)$car->mark_id;

            $carData = [
                'brand' => $brand,
                'model' => $model,
                'year' => (int)$car->year,
                'run' => number_format((string)$car->run, 0, '.', ' ').'  км',
                'run_original' => (int)$car->run,

                'color' => $colorName,
                'color_hex' => $colorCode,
                'vin' => '...'.substr((string)$car->vin, -4),
                'vin_full' => (string)$car->vin,
                'price'=> (string)$car->price,
                'info' => (int)$car->engine_volume/1000 .' ('.(string)$car->engine_power.')',
                'engine_type' => (string)$car->engine_type,
                'gearbox' => $gearbox,
                'drive' => mb_strtolower((string)$car->drive),
                'image' => null,
                'link' => str_replace('https://dynamica-trade.ru/', '', (string)$car->url)
            ];

            if ($carData['price'] < $meta['min_price']) {
                $meta['min_price'] = $carData['price'];
            }
            if ($carData['price'] > $meta['max_price']) {
                $meta['max_price'] = $carData['price'];
            }
            if ($carData['year'] < $meta['min_year']) {
                $meta['min_year'] = $carData['year'];
            }
            if ($carData['year'] > $meta['max_year']) {
                $meta['max_year'] = $carData['year'];
            }
            if ($carData['run_original'] < $meta['min_run']) {
                $meta['min_run'] = $carData['run_original'];
            }
            if ($carData['run_original'] > $meta['max_run']) {
                $meta['max_run'] = $carData['run_original'];
            }

            if(!isset($brand, $meta['brands'][$brand])){
                $meta['brands'][$brand] = [];
            }
            if(!in_array($model, $meta['brands'][$brand])){
                $meta['brands'][$brand][] = $model;
            }




            // Logo scrapper

            $image = $brand;
            $image = trim(strtolower(str_replace('(ВАЗ)', '', $image)));
            $image = str_replace(' ', '-', $image);

            if(array_search($image, $brands) === false){
                $brands[] = $image;
                if(!Storage::disk('local')->exists('public/brands/'.$image.'.png')){
                    if($this->enableLogoScrapper){
                        $imageUrl = 'https://lkm.tradedealer.ru/assets/images/brands/60/'.$image.'.png';
                        $filename = $image.'.png';
                        
                        $response = Http::get($imageUrl);
                        if ($response->ok()) {
                            Storage::disk('local')->put('public/brands/'.$filename, $response->body());
                            $carData['image'] = Storage::url('/brands/'.$image.'.png');
                        }
                    }
                }
                else{
                    $carData['image'] = Storage::url('/brands/'.$image.'.png');
                }
            }
            else{
                if(Storage::disk('local')->exists('public/brands/'.$image.'.png')){
                    $carData['image'] = Storage::url('/brands/'.$image.'.png');
                }
            }

            $data[] = $carData;
            
            

        }

        Log::info($meta);
    

        return response()->json(['data' => $data, 'meta'=> $meta]);

    }


}
