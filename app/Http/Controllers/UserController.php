<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Helper\Helper;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Role;

class UserController extends Controller
{

    private $helperObj;

    /**
     * UserController constructor.
     * @param Helper $helper
     */
    public function __construct(Helper $helper){
        $this->helperObj = $helper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $users =User::orderby('id','desc')->paginate(10);
        return view('manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if ( !empty($request->password)) {
            //set the manual password
            $password = trim($request->password);
        } else {
            //generate password
            $password= $this->helperObj->generatePassword();
        }


        $password= Hash::make($password);
        $fields = $request->all();
        $fields['password']= $password;

        $user = User::create($fields);



        Session::flash('success','The user was successfully saved');

        return redirect()->route('users.show',$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::where('id',$id)->with('roles')->first();
        return view('manage.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::where('id',$id)->with('roles')->first();
        $roles=Role::all();
        return view('manage.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user=User::findOrFail($id);
        $fields = $request->all();

        if ($request->password_options == 'manual') {
            //set the manual password
            $password = trim($request->password);
            $fields['password']= Hash::make($password);


        } elseif($request->password_options == 'auto') {
            //generate password
            $password= $this->helperObj->generatePassword();
            $fields['password']= Hash::make($password);

        }

        $user->update($fields);
        $user->syncRoles(explode(',',$request->roles));



        Session::flash('success','The user was successfully updated');

        return redirect()->route('users.show',$user->id);


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
