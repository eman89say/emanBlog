<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Http\Requests\PermissionRequest;
use Illuminate\Support\Facades\Session;



class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions= Permission::all();
        return view('manage.permissions.index',compact('permissions'));

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
    public function store(PermissionRequest $request)
    {
        $fields = $request->all();

      if ($request->permission_type == 'crud') {
          $crud = explode(',', $request->crud_selected);
          if (count($crud) > 0) {
              foreach ($crud as $x) {
                  $slug = strtolower($x) . '-' . strtolower($request->resource);
                  $display_name = ucwords($x . " " . $request->resource);
                  $description = "Allows a user to " . strtoupper($x) . ' a ' . ucwords($request->resource);
                  $permission = Permission::create([
                      'name' => $slug,
                      'display_name' => $display_name,
                      'description' => $description
                  ]);
              }
          }
      }

     else {
         $permission =  Permission::create($fields);
     }

        Session::flash('success','The permission was successfully saved');

        return redirect()->route('permissions.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission= Permission::findOrFail($id);
        return view('manage.permissions.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission= Permission::findOrFail($id);
        return view('manage.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $fields = $request->all();
        $permission-> update($fields);

        Session::flash('success', 'Updated the '. $permission->display_name . ' permission.');
        return redirect()->route('permissions.show', $id);
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
