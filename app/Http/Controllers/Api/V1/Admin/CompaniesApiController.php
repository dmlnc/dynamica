<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Gate;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\Admin\CompanyResource;

class CompaniesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return new CompanyResource(Company::advancedFilter());
    }

    public function list()
    {
        $companies = [];

        if(auth()->user()->isAdmin){
            $companies = Company::select(['id', 'name'])->get();
        }
        else{
            $companies = Company::where('id', auth()->user()->company_id)->select(['id', 'name'])->get();
        }

        return response([
            'data' => $companies
        ]);
    }

    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();
        if(isset($data['abilities'])){
            $data['abilities'] = implode(',', array_map(function($val) {
                return $val['title'];
            }, $data['abilities']));
        }
        else{
            $data['abilities'] = '';
        }
        $company = Company::create($data);

        return (new CompanyResource($company))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([]);
    }

    public function show(Company $company)
    {
        abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompanyResource($company);
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {   
        $data = $request->validated();
        if(isset($data['abilities'])){
            $data['abilities'] = implode(',', array_map(function($val) {
                return $val['title'];
            }, $data['abilities']));
        }
        else{
            $data['abilities'] = '';
        }
        
        $company->update($data);

        return (new CompanyResource($company))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Company $company)
    {
        abort_if(Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompanyResource($company);
        ;
    }

    public function destroy(Company $company)
    {
        abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
