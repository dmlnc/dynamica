<?php

namespace App\Http\Controllers\Api\V1\Admin;

use PDF;

use Gate;
use App\Models\User;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Model;
use App\Models\CarModel;
use App\Models\Settings;
use App\Models\ServiceForm;

use App\Models\ServiceField;
use App\Services\CarService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Telegram\Bot\Objects\Update;
use App\Models\ServiceFieldValue;
use App\Models\ServiceFieldComment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceFormRequest;
use App\Http\Requests\UpdateServiceFormRequest;
use App\Http\Resources\Admin\ServiceFormResource;
use App\Http\Resources\Admin\ServiceFieldResource;
use App\Http\Resources\Admin\ServiceFieldPdfResource;
use App\Http\Controllers\Api\V1\Admin\MediaController;
use App\Http\Resources\Admin\ServiceFormIndexResource;
use App\Http\Resources\Admin\ServiceFieldEmptyResource;
use App\Services\LKPService;

class ServiceFormsApiController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $limit = $request->get('limit', 100);
        // $page = $request->get('page', 1); // Default page is 1
        // $offset = $request->get('offset', ($page - 1) * $limit); 
        $companyId = $request->header('X-Company-Id');

        $brandId = $request->input('brand_id');
        $carModelId = $request->input('car_model_id');
        $statusId = $request->input('status_id');
        $diagnostId = $request->input('diagnost_id');
        $vin = $request->input('vin');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $serviceFormQuery = ServiceForm::where('company_id', $companyId);

        if ($brandId) {
            $serviceFormQuery = $serviceFormQuery->where('brand_id', $brandId);
        }
        if ($carModelId) {
            $serviceFormQuery = $serviceFormQuery->where('model_id', $carModelId);
        }
        if ($statusId) {
            $serviceFormQuery = $serviceFormQuery->where('status', $statusId);
        }
        if ($diagnostId) {
            $serviceFormQuery = $serviceFormQuery->where('diagnost_id', $diagnostId);
        }
        if ($vin) {
            $serviceFormQuery = $serviceFormQuery->where('vin', 'LIKE', '%' . $vin . '%');
        }
        if ($dateFrom) { 
            $serviceFormQuery = $serviceFormQuery->where('updated_at', '>=', $dateFrom);
        } 
        if ($dateTo) { 
            $serviceFormQuery = $serviceFormQuery->where('updated_at', '<=', $dateTo);
        }

        $serviceFormQuery = $serviceFormQuery->with(['brand', 'car_model', 'diagnost'])->orderBy('updated_at', 'desc')->paginate($limit);
        
        return ServiceFormIndexResource::collection($serviceFormQuery);

    }

    public function getFilter(){
        return response([
            'brands' => Brand::select(['id', 'name'])->orderBy('name', 'asc')->get(),
            'car_models' => CarModel::select(['id', 'name', 'brand_id'])->orderBy('name', 'asc')->get(),
            'diagnosts' => User::whereHas('roles', function ($query) {
                $query->where('id', 3);
            })->get(),
        ]);
    }

    public function store(StoreServiceFormRequest $request)
    {

        $validated = $request->validated();
        // Сохраняем основные данные формы

        // draft
        // not finished
        // diagnostic
        // published

        $status = $validated['status'];
        if($validated['status'] == 'published'){
            $status = $this->areAllRequiredFieldsFilled($validated['fields']);
            if($status  == false){
                $status = 'not finished';
            }
            else{
                $status = 'published';
            }
        }

        $attributes = [
            'status' => $validated['status'],
            'brand_id' => $validated['brand']['id'],
            'model_id' => $validated['car_model']['id'],
            'color' => $validated['color'],
            'vin' => $validated['vin'],
            // 'diagnost_id' => null,
            'comment' => $validated['comment'],
            'run' => $validated['run'],
            'company_id' => null,
        ];
        
        $user = auth()->user();
        $requiredCount = 0;
        
       

        if ($user) {
            $attributes['company_id'] = $user->company_id;
            if ($user->roles->contains('id', 3)) {  // Diagnost role id
                $attributes['diagnost_id'] = $user->id;
            }
        }
        
        $serviceForm = ServiceForm::create($attributes);
        
        // Обрабатываем каждое поле
        foreach ($validated['fields'] as $field) {
            // Если value == null, проверяем наличие value в базе и удаляем его
            if ($field['value'] == null) {
                continue;
            } else {
                // Если parent_id не null, находим родительское поле
                if ($field['parent_id'] !== null) {
                    $parentField = array_filter($validated['fields'], function($f) use ($field) {
                        return $f['id'] == $field['parent_id'];
                    });
    
                    // Если у родительского поля showSubfields == 0, не сохраняем значение и удаляем его
                    if (isset($parentField['value']) && $parentField['value']['showSubfields'] == 0) {
                        continue;
                    }
                }
    
                // Сохраняем значение
                $value = ServiceFieldValue::create([
                    'field_id' => $field['id'],
                    'service_form_id' => $serviceForm->id,
                    'value' => $field['value']['id']
                ]);
    
                // Если есть media, сохраняем media
                if (isset($field['media'])) {
                    $media_ids = array_map(function($media) {
                        return $media['id'];
                    }, $field['media']);
                    
                    (new MediaController)->syncMedia($media_ids, $value->id);
                }
    
                // Если есть comment и comment != null, сохраняем комментарий
                if (isset($field['comment']) && $field['comment'] != null) {
                    ServiceFieldComment::create([
                        'field_id' => $field['id'],
                        'service_form_id' => $serviceForm->id,
                        'value' => $field['comment']
                    ]);
                }
            }
        }
    
        return (new ServiceFormResource($serviceForm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
    
    

    public function create()
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'brands' => Brand::select(['id', 'name'])->orderBy('name', 'asc')->get(),
                'car_models' => CarModel::select(['id', 'name', 'brand_id'])->orderBy('name', 'asc')->get(),
                'colors' => Color::select(['id', 'name', 'hex'])->get(),
            ],
            'fields' =>  ServiceFieldEmptyResource::collection(
                ServiceField::whereNull('parent_id')
                            ->with(['subfields' => function ($query) {
                                $query->orderBy('order');
                            }])
                            ->orderBy('order')
                            ->get()
            )
        ]);
    }

    public function update(UpdateServiceFormRequest $request, ServiceForm $serviceForm)
    {   
        $validated = $request->validated();
        // Сохраняем основные данные формы

        $validated['fields'] = $this->prepareFields($validated['fields']);

        $status = $validated['status'];
       
        if($validated['status'] == 'published'){
            $status = $this->areAllRequiredFieldsFilled($validated['fields']);
            // return $status;
            if($status  == false){
                $status = 'not finished';
            }
            else{
                $status = 'published';
            }
        }

        if($serviceForm->status == 'published'){
            $status = 'published';
        }
        
        $attributes = [
            'status' => $status,
            'brand_id' => $validated['brand']['id'],
            'model_id' => $validated['car_model']['id'],
            'color_id' => $validated['color'],
            'run' => $validated['run'],
            'vin' => $validated['vin'],
            'comment' => $validated['comment'],
            'recommendation' => $validated['recommendation'],
        ];
        
        $user = auth()->user();

        if ($user) {
            if ($user->roles->contains('id', 3)) {  // Diagnost role id
                $attributes['diagnost_id'] = $user->id;
            }
        }
        
        $serviceForm->update($attributes);
        $serviceForm->touch();
        $serviceForm->save();

        
        // Обрабатываем каждое поле
        foreach ($validated['fields'] as $field) {
            // Если value == null, проверяем наличие value в базе и удаляем его
            if ($field['value'] == null) {
                ServiceFieldValue::where('field_id', $field['id'])
                                 ->where('service_form_id', $serviceForm->id)
                                 ->delete();
                continue;
            } else {
                // Если parent_id не null, находим родительское поле
                if ($field['parent_id'] !== null) {
                    $parentField = array_filter($validated['fields'], function($f) use ($field) {
                        return $f['id'] == $field['parent_id'];
                    });
    
                    // Если у родительского поля showSubfields == 0, не сохраняем значение и удаляем его
                    if (isset($parentField['value']) && $parentField['value']['showSubfields'] == 0) {
                        ServiceFieldValue::where('field_id', $field['id'])
                                         ->where('service_form_id', $serviceForm->id)
                                         ->delete();
                        continue;
                    }
                }
                // Сохраняем значение
                $value = ServiceFieldValue::where('field_id', $field['id'])
                                  ->where('service_form_id', $serviceForm->id)
                                  ->first();
                if ($value) {
                    $value->update(['value' => $field['value']['id']]);
                } else {
                    $value = ServiceFieldValue::create([
                        'field_id' => $field['id'],
                        'service_form_id' => $serviceForm->id,
                        'value' => $field['value']['id']
                    ]);
                }
                // Если есть media, сохраняем media
                if (isset($field['media'])) {
                    $media_ids = array_map(function($media) {
                        return $media['id'];
                    }, $field['media']);
                    
                    (new MediaController)->syncMedia($media_ids, $value->id);
                }
                // Если есть comment и comment != null, сохраняем комментарий
                if (isset($field['comment']) && $field['comment'] != null) {

                    $comment = ServiceFieldComment::where('field_id', $field['id'])
                                  ->where('service_form_id', $serviceForm->id)
                                  ->first();
                    if ($comment) {
                        $comment->update(['value' => $field['comment']]);
                    } else {
                        ServiceFieldComment::create([
                            'field_id' => $field['id'],
                            'service_form_id' => $serviceForm->id,
                            'value' => $field['comment']
                        ]);
                    }
                }
                else{
                    ServiceFieldComment::where('field_id', $field['id'])
                                  ->where('service_form_id', $serviceForm->id)
                                  ->delete();
                }
            }
        }
    
        return (new ServiceFormResource($serviceForm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function edit(Request $request, ServiceForm $serviceForm)
    {
        abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fields = ServiceField::whereNull('parent_id')
            ->with([
                'subfields' => function ($query) {
                    $query->orderBy('order');
                },
                'value',
                'comments'
            ])
            ->orderBy('order')
            ->get();

        
        foreach ($fields as $field) {
            $field->service_form_id = $serviceForm->id;
        }
        return response([
            'data' => new ServiceFormResource($serviceForm->load(['brand', 'car_model', 'diagnost'])),
            'meta' => [
                'brands' => Brand::select(['id', 'name'])->get(),
                'car_models' => CarModel::select(['id', 'name', 'brand_id'])->get(),
                // 'colors' => Color::select(['id', 'name', 'hex'])->get(),
            ],
            'fields' =>  ServiceFieldResource::collection($fields)
        ]);
    }


    public function show(ServiceForm $serviceForm)
    {
        abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceFormResource($serviceForm->load(['brand', 'car_model', 'diagnost']));
    }

    public function destroy(ServiceForm $serviceForm)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceForm->delete();
        // TODO: remove photos

        return response(null, Response::HTTP_NO_CONTENT);
    }


    public function storeMedia(Request $request)
    {
        $model = new ServiceFieldValue();
        return  (new MediaController)->storeMedia($request, $model, 'fieldPhoto');
    }

    protected function areAllRequiredFieldsFilled($fields) {
        foreach ($fields as $field) {
            // Если поле не обязательно, пропускаем его
            if ($field['required'] != 1) {
                continue;
            }
    
            // Если у поля есть parent_id, проверяем условия для обязательности
            if (isset($field['parent_id'])) {
                $parentField = array_filter($fields, function($f) use ($field) {
                    return $f['id'] == $field['parent_id'];
                });
                $parentField = array_values($parentField);

                if(isset($parentField[0])){
                    $parentField = $parentField[0];
                }
    
                // Если у родительского поля showSubfields == 0, пропускаем текущее поле
                if (isset($parentField['value']) && $parentField['value']['showSubfields'] == 0) {
                    continue;
                }
    
                // Если у родительского поля showSubfields == 1 и у текущего поля нет значения, возвращаем false
                if (isset($parentField['value']) && $parentField['value']['showSubfields'] == 1 && $field['value'] == null) {
                    return false;
                }
            }
    
            // Если у обязательного поля нет значения, возвращаем false
            if ($field['value'] == null) {
                // return ['i'=>$field, 'p'=>isset($field['parent_id'])];
                return false;
            }
        }
    
        // Если все обязательные поля заполнены, возвращаем true
        return true;
    }

    protected function prepareFields($fields){
        $keysToRemove = [];
        $fieldsToModify = [];

        foreach ($fields as $key => $field) {
            if ($field['id'] == 148 || $field['id'] == 150) {
                if ($field['value'] !== null) {
                    $targetId = $field['id'] == 148 ? 69 : 70;
                    $fieldsToModify[$targetId] = $field['value']['id'] + 1;
                }
                $keysToRemove[] = $key;
            }
        }

        foreach ($keysToRemove as $key) {
            unset($fields[$key]);
        }

        foreach ($fields as &$field) {
            if (array_key_exists($field['id'], $fieldsToModify)) {
                $field['value']['id'] = $fieldsToModify[$field['id']];
            }
        }
        unset($field);  // Unset reference to last element

        return $fields;
    }

    public function getPdf(Request $request, $type, $formId)
    {  
        // $formId = 7;
        $serviceForm = ServiceForm::findOrFail($formId);
        $serviceForm->load(['brand', 'car_model', 'diagnost']);

        
        $fieldsRaw = ServiceField::whereNull('parent_id')
            ->with([
                'subfields' => function ($query) {
                    $query->orderBy('order');
                },
                'value',
                'comments'
            ])
            ->orderBy('order')
            ->get();
                            
        foreach ($fieldsRaw as $field) {
            $field->service_form_id = $serviceForm->id;
        }
        
        $fieldsCollection = ServiceFieldPdfResource::collection($fieldsRaw);
        $fieldsArray = $fieldsCollection->toArray(request());
        $fieldsCollection = collect($fieldsArray);

        if($type == 'service'){
            $pdf = PDF::loadView('pdf.service_table', ['fields' => $fieldsCollection, 'serviceForm' => $serviceForm]);
        }
        else{
            $pdf = PDF::loadView('pdf.service_client_table', ['fields' => $fieldsCollection, 'serviceForm' => $serviceForm]);
        }
        // return $fields;
        // return view('pdf.service', ['fields' => $fieldsCollection, 'serviceForm' => $serviceForm]);
        $pdf_name = $serviceForm->brand->name .' '.$serviceForm->car_model->name .' '.$serviceForm->vin.'.pdf';
        return $pdf->stream($pdf_name);
        // return $pdf->download('pdf.pdf');

        // return $pdf;
        return 1;
    }

    public function generateLKPSvg($serviceForm_id){
        $serviceForm = ServiceForm::findOrFail($serviceForm_id);
        return (new LKPService(json_decode($serviceForm->lkp_data, true), json_decode($serviceForm->damages_list, true)))->generateSvg();
    }
    public function generateLKPTableData($serviceForm_id){
        $serviceForm = ServiceForm::findOrFail($serviceForm_id);
        return (new LKPService(json_decode($serviceForm->lkp_data, true), json_decode($serviceForm->damages_list, true)))->generateTable(); 
    }

    public function fetchAppraisals(Request $request, ServiceForm $serviceForm)
    {

        $result = $this->fetchAppraisalsCommand($serviceForm);

        if (isset($result['error'])) {
            // Возвращаем ошибку на фронтенд
            return response()->json(['error' => $result['error']], 400);
        }
        // Возвращаем успешный результат на фронтенд
        return response()->json([
            'lkp_data' => $result['lkp_data'],
            'damages_list' => $result['damages_list']
        ]);

    }

    protected function fetchAppraisalsCommand(ServiceForm $serviceForm)
    {
        // Получаем настройки для данной компании
        $settings = Settings::where('company_id', $serviceForm->company_id)->first();

        // Если настройки не найдены, возвращаем ошибку
        if (!$settings) {
            return response()->json(['error' => 'Settings not found for this company_id'], 400);
        }

        $cm_company_id = $settings->cm_company_id;

        // Инициализация CarService с cm_company_id
        $carService = new CarService($cm_company_id);

        // Предположим, что марку и модель мы получаем из $request
        $brand = $serviceForm->brand->name;  
        $model = $serviceForm->car_model->name;  

        // Вызов метода для получения аппретации
        $result = $carService->getAppraisals($brand, $model, $serviceForm->vin);

        // Обработка результата
        if (isset($result['error'])) {
            return $result;
        }

        $lkp_data = [];
        $damages_list = [];

        $keysOfInterest = [
            'bodyLeftFrontFender', 'bodyLeftFrontDoor', 'bodyLeftFrontPillar', 
            'bodyLeftRoofPart', 'bodyLeftCenterPillar', 'bodyLeftBackPillar', 
            'bodyLeftBackDoor', 'bodyLeftBackFender', 'bodyLeftSill', 
            'bodyRoofBackPart', 'bodyTrunkLid', 'bodyBackBumper', 
            'bodyRightBackFender', 'bodyRightBackDoor', 'bodyRightBackPillar', 
            'bodyRightCenterPillar', 'bodyRightRoofPart', 'bodyRightFrontPillar', 
            'bodyRightFrontDoor', 'bodyRightFrontFender', 'bodyRightSill', 
            'bodyRoofFrontPart', 'bodyFrontBumper', 'bodyHood', 'bodyGrille',
            'leftMirror', 'leftFrontGlass', 'leftBackGlass', 'backGlass', 
            'leftTaillight', 'rightTaillight', 'rightBackGlass', 'rightFrontGlass',
            'rightMirror', 'frontGlass', 'leftHeadlight', 'leftFogLight', 'rightHeadlight', 'rightFogLight'
        ];


        // Проверка наличия 'items' в результате
        if (isset($result['items'])) {
            foreach ($keysOfInterest as $key) {
                // Если ключ присутствует в 'items'
                if (isset($result['items'][$key])) {
                    $item = $result['items'][$key];
    
                    // Получаем нужные поля
                    if (isset($item['paintwork'])) {
                        $lkp_data[$key]['max'] = $item['paintwork']['max'] ?? null;
                        $lkp_data[$key]['min'] = $item['paintwork']['min'] ?? null;
                    }
    
                    if (isset($item['damagesList'])) {
                        $damages_list[$key] = $item['damagesList'];
                    }
                }
            }
        }

        // Преобразование массивов в JSON 
        $lkp_data_json = json_encode($lkp_data);
        $damages_list_json = json_encode($damages_list);

        $serviceForm->lkp_data = $lkp_data_json;
        $serviceForm->damages_list = $damages_list_json;
        $serviceForm->save();

        return [
            'lkp_data' => $lkp_data,
            'damages_list' => $damages_list
        ];

    }

    public function cronFetchAppraisals() {
        $cars = ServiceForm::where('lkp_data', null)->get();

        foreach ($cars as $car) {
            $this->fetchAppraisalsCommand($car);
        }
    }
    
    
}
