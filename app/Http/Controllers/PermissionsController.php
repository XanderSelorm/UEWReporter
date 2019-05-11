<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(10);//all();
        return view('manage.permissions.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->permission_type == 'basic') {
            $this->validate($request, [
                'verb' => 'required',
                'name_resource' => 'required',
                'name' => 'required|alphadash|unique:permissions,name',
                'description' => 'sometimes'
            ]);

            $permission = new Permission();
            $permission->name = $request->name;
            $permission->display_name = $request->display_name;
            $permission->description = $request->description;
            $permission->save();

            return redirect()->route('permissions.index')->with('success', 'Permission added successfully');
        }
        elseif ($request->permission_type == 'crud') {
            $this->validate($request, [
                'resource' => 'required|min:3|alpha'
            ]);

            $crud = explode(',', $request->crud_selected);
            if (count($crud) > 0) {
                foreach ($crud as $key) {
                    $slug = strtolower($key) . '-' . strtolower($request->resource);
                    $display_name = ucwords($key . " " . $request->resource);
                    $description = "Allows user to " . strtoupper($key) . ' ' . ucwords($request->resource);
                
                    $permission = new Permission();
                    $permission->name = $slug;
                    $permission->display_name = $display_name;
                    $permission->description = $description;
                    $permission->save();
                }
                return redirect()->route('permissions.index')->with('success', 'All permissions added successfully');
            }
            else {
                return redirect()->route('permissions.create')->withInput();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('manage.permissions.show')->withPermission($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('manage.permissions.edit')->withPermission($permission);
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
        $this->validate($request, [
            'display_name' => 'required',
            'description' => 'sometimes'
        ]);

        $permission = Permission::findOrFail($id);

        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->route('permissions.index')->with('success', $permission->display_name . ' permission updated successfully');
    } 
}
