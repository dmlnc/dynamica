<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Log;
use PDF;
use App\Models\Brand;
use SimpleXMLElement;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarModel;
use App\Models\Color;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ParseXmlController extends Controller
{

    protected $enableLogoScrapper = false;

    protected $colors = [
        "белый" => '#ffffff',
        "серебряный" => '#c0c0c0',
        "желтый" => '#FFFF00',
        "черный" => '#000000',
        "красный" => '#FF0000',
        "серый" => '#808080',
        "коричневый" => '#654321',
        "синий" => '#0000FF',
        "зеленый" => '#00FF00',
    ];

    protected $gearboxes = [
        'автоматическая' => 'АКПП',
        'механическая' => 'MКПП',
        'автомат робот' => 'Робот',
        'автомат вариатор' => ' Вариатор'

    ];

    public function getPdf(Request $request)
    {   

        $vin = $request->input('vin');
        $vin4 = substr((string)$vin, -4);

        $vin6 = '...'.substr((string)$vin, -6);

        $brand = $request->input('brand');
        $model = $request->input('model');

        $year = $request->input('year');
        $run = $request->input('run');

        $pdfData = $request->input('pdf');

        $price = $request->input('price');


        $info = $request->input('info');
        $link = trim($request->input('link'));
        // str_replace('/','%sl%', 
        $type = $request->input('type');
        $name = $brand.' '.$model;
        $info = $year.', '.number_format((string)$run, 0, '.', ' ').'  км';

                // 'name': this.currentCar.brand + ' ' + this.currentCar.model,
                // 'info': this.currentCar.year + ', ' + this.currentCar.run,
        $company_id = $this->getCompanyId($request);
        $settings = Settings::where('company_id', $company_id)->firstOrFail();
        
        // $settings = Settings::find(1);

        $query = [
            'utm_source' => $settings->utm_source,
            'utm_medium' => $settings->utm_medium,
            'utm_content' => $settings->utm_content,
            'utm_term' => $settings->utm_term,
            'utm_campaign' => $settings->utm_campaign,
            'company_id' => $company_id,
        ];
        $queryString = '';

        $segment = 'low_cost';

        $min_price = $settings->min_price;
        if($min_price == null){
            $min_price = 1;
        }
        $max_price = $settings->max_price;
        if($max_price == null){
            $max_price = 1;
        }

        if((int)$price > $min_price){
            $segment = 'middle_cost';
        }

        if((int)$price > $max_price){
            $segment = 'hight_cost';
        }


        foreach ($query as $key => $value) {
            $value = trim($value);
            $value = str_replace('[VIN]', (string)$vin4, $value);
            $value = str_replace('[BRAND]', $this->prepareToUtm($brand), $value);
            $value = str_replace('[MODEL]', $this->prepareToUtm($model), $value);
            $value = str_replace('[YEAR]', (string)$year, $value);
            $value = str_replace('[SEGMENT]', $segment, $value);


            $queryString.='&'.$key.'='.$value;
        }

        if(trim($settings->asp_link)!== '' && $settings->asp_link!= null){
            $link = trim($settings->asp_link).'?link='.$link.$queryString;
        }
        else{
            $link = 'https://dynamica-trade.ru/'.$link.'?'.$queryString;
        }


        $qr = QrCode::size(500)->generate($link);
        $qr = 'data:image/svg+xml;base64,' . base64_encode($qr);


        // return view('pdf.vertical', ['qr' => $qr, 'name' => $name, 'vin'=>$vin, 'info'=>$info]);
        // return view('pdf.horizontal', ['qr' => $qr, 'name' => $name, 'vin'=>$vin, 'info'=>$info]);

        $pdf = null;
        if($type == 1){
            $pdf = PDF::loadView('pdf.vertical', ['qr' => $qr, 'name' => $name, 'vin'=>$vin6, 'info'=>$info, 'pdf' => $pdfData]);
            $pdf->setPaper('A4');
        } else {
            $pdf = PDF::loadView('pdf.horizontal', ['qr' => $qr, 'name' => $name, 'vin'=>$vin6, 'info'=>$info, 'pdf' => $pdfData]);
            $pdf->setPaper('A4', 'landscape');
        }
        

        return $pdf->download('pdf-'.$vin.'.pdf');
    }

    public function index(Request $request)
    {

        $settings = Settings::where('company_id', $this->getCompanyId($request))->firstOrFail();

        set_time_limit(0);

        $url = trim($settings->export_link);
        
        // 'https://media.cm.expert/stock/export/cmexpert/dealer.site/all/1a6f30ed5c29e6b5d2fdd1d87740b925.xml';
        $tUrl = 'http://dynamica-trade.su/api/v1/loadXml?url='.$url;
        $xml = file_get_contents($tUrl);
        
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
                'link' => str_replace('https://dynamica-trade.ru/', '', (string)$car->url),
                'pdf' => [
                    'engine' => (string)$car->engine_type.', '. (int)$car->engine_volume/1000 .', '.(string)$car->engine_power,
                    'gearbox' => (string)$car->gearbox,
                    'drive' => (string)$car->drive,
                    'owners_number' => (string)$car->owners_number,
                ]
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

            $slug = $brand;
            $slug = trim(strtolower(str_replace('(ВАЗ)', '', $slug)));
            $slug = str_replace(' ', '-', $slug);

            if(!empty(trim($brand)) && !empty(trim($model))){
                $this->storeCarData(
                    [
                        'name' => $brand,
                        'slug' => $slug,
                    ], 
                    $model,
                    [
                        'name' => $colorName,
                        'hex' => $colorCode,
                    ]
            
                );
            }


            $image = $slug;
            $carData['image'] = 'https://lkm.tradedealer.ru/assets/images/brands/60/'.$image.'.png';

            // if(array_search($image, $brands) === false){
            //     $brands[] = $image;
            //     $carData['image'] = 'https://lkm.tradedealer.ru/assets/images/brands/60/'.$image.'.png';

            //     // if(!Storage::disk('local')->exists('public/brands/'.$image.'.png')){
            //     //     if($this->enableLogoScrapper){
            //     //         $imageUrl = 'https://lkm.tradedealer.ru/assets/images/brands/60/'.$image.'.png';
            //     //         $filename = $image.'.png';
                        
            //     //         $response = Http::get($imageUrl);
            //     //         if ($response->ok()) {
            //     //             Storage::disk('local')->put('public/brands/'.$filename, $response->body());
            //     //             $carData['image'] = Storage::url('brands/'.$image.'.png');
            //     //         }
            //     //     }
            //     // }
            //     // else{
            //     //     $carData['image'] = Storage::url('brands/'.$image.'.png');
            //     // }
            // }
            // else{
            //     if(Storage::disk('local')->exists('public/brands/'.$image.'.png')){
            //         $carData['image'] = Storage::url('brands/'.$image.'.png');
            //     }
            // }

            $data[] = $carData;
            
            

        }

        return response()->json(['data' => $data, 'meta'=> $meta]);

    }

    function storeCarData($brand, $model, $color) {
        // Get or create brand
        $brand = Brand::firstOrCreate(['name' => $brand['name'], 'slug'=>$brand['slug']]);
    
        // Get or create model associated with the brand
        $model = CarModel::firstOrCreate(['name' => $model, 'brand_id' => $brand->id]);

        $color = Color::firstOrCreate(['name' => $color['name'], 'hex' => $color['hex']]);

    
        return [$brand->id, $model->id];
    }
    

    protected function prepareToUtm($str, $options = array()) {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        // $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
        
        $defaults = array(
          'delimiter' => '-',
          'limit' => null,
          'lowercase' => true,
          'replacements' => array(),
          'transliterate' => true,
        );
        
        // Merge options
        $options = array_merge($defaults, $options);
        
        $char_map = array(
          // Latin
          'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C', 
          'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 
          'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O', 
          'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 
          'ß' => 'ss', 
          'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 
          'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 
          'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 
          'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 
          'ÿ' => 'y',
          // Latin symbols
          '©' => '(c)',
          // Greek
          'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
          'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
          'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
          'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
          'Ϋ' => 'Y',
          'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
          'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
          'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
          'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
          'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
          // Turkish
          'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
          'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g', 
          // Russian
          'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
          'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
          'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
          'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
          'Я' => 'Ya',
          'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
          'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
          'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
          'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
          'я' => 'ya',
          // Ukrainian
          'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
          'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
          // Czech
          'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U', 
          'Ž' => 'Z', 
          'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
          'ž' => 'z', 
          // Polish
          'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z', 
          'Ż' => 'Z', 
          'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
          'ż' => 'z',
          // Latvian
          'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 
          'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
          'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
          'š' => 's', 'ū' => 'u', 'ž' => 'z'
        );
        
        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
        
        // Transliterate characters to ASCII
        if ($options['transliterate']) {
          $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        
        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        
        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        
        // Truncate slug to max. characters
        // $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        
        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);
        
        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    } 
    
    public function getCompanyId(Request $request){
        $companyId = null;

        if ($request->header('X-Company-Id') && $request->header('X-Company-Id') != 'undefined' && auth()->user()->isAdmin) {
            $companyId = $request->header('X-Company-Id');
        }
        else{
            $companyId = auth()->user()->company_id;
        }

        return $companyId;
    }

}
