<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\PermissionMeta;
use Hashids\Hashids;
use App\Permission;
use App\Rule;
use App\Role;

class EmployeeRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = null)
    {
        $roles = Auth::user()->office->roles;

        $sections = Auth::user()->company->employeeInformationSections;
        $permission = new Permission();

        return view('setting.employee-roles.index', compact('roles', 'category', 'sections', 'permission'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function updateMembers(Request $request){
        $role = new Hashids();
        $id = $role->decode($request->role)[0];
        $role = Role::findOrFail($id);
        $role->users()->sync($request->users);
        
        return redirect()->back();

    }

    public function updateRights(Request $request){
        $role = new Hashids();
        $id = $role->decode($request->role)[0];
        $role = Role::findOrFail($id);
        $per_string = 'permission_'.$id;
        $permissions = $request->$per_string;
        $permission_arr = [];
        foreach($permissions as $attr_key =>$req_permission){
            $attr_id = trim($attr_key,'attr_');

            $check = $role->permissions()->whereHas('rules', function($r) use($attr_id){
                        $r->where('attribute_id', $attr_id);
                    })->first();

            if(null !== $check){
                $rule = $check->rules;
            } else {
                $rule = new Rule();
            }
            
            $rule->attribute_id = $attr_id;
            $rule->save();
            foreach($req_permission as $key => $meta){
                $meta_key = trim($key, 'meta_');
                foreach($meta as $type_key => $access){
                    $access_key = trim($type_key, 'access_');

                    $permission = Permission::where('permission_key', $meta_key)->where('access_type', $access_key)
                                ->whereHas('rules', function($r) use($attr_id){
                                    $r->where('attribute_id', $attr_id);
                                })->first();
                    if(null === $permission){
                        $permission = new Permission();
                    }
                    
                    $permission->permission_meta = $permission->permissionMeta()[$meta_key];
                    $permission->permission_key = $meta_key;
                    $permission->access_type = $access_key;
                    $permission->rule_id = $rule->id;
                    $permission->save();

                    $permission_arr = Arr::add($permission_arr, $permission->id, $permission->id);
                }
            }
        }
        $role->permissions()->sync($permission_arr);

        return redirect()->back();

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
