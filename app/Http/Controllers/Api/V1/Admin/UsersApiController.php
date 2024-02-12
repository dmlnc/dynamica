<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Gate;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;

class UsersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userQuery = User::with(['roles', 'company']);
        if(!auth()->user()->IsSuperAdmin){
            $userQuery = $userQuery->where('company_id', auth()->user()->company_id);
        }
        return new UserResource($userQuery->advancedFilter());
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->roles()->sync($request->input('roles.*.id', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(auth()->user()->IsSuperAdmin){
            $companies = Company::select(['id'])->selectRaw('name as title')->get();
            $roles = Role::get(['id', 'title']);
        }
        else{
            $companies = Company::where('id', auth()->user()->company_id)->select(['id'])->selectRaw('name as title')->get();
            $roles = Role::whereNotIn('id', [1])->get(['id', 'title']);
        }

        return response([
            'meta' => [
                'roles' => $roles,
                'companies' => $companies
            ],
        ]);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource($user->load(['roles', 'company']));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles.*.id', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function profile(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        return response([
            'data' => new UserResource($user->load(['roles'])),
            'meta' => [
                // 'roles' => Role::get(['id', 'title']),
                // 'companies' => $companies
            ],
        ]);
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(auth()->user()->IsSuperAdmin){
            $companies = Company::select(['id'])->selectRaw('name as title')->get();
            $roles = Role::get(['id', 'title']);
        }
        else{
            $companies = Company::where('id', auth()->user()->company_id)->select(['id'])->selectRaw('name as title')->get();
            $roles = Role::whereNotIn('id', [1])->get(['id', 'title']);
        }
        

        return response([
            'data' => new UserResource($user->load(['roles'])),
            'meta' => [
                'roles' => $roles,
                'companies' => $companies
            ],
        ]);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
