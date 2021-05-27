<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request -> isMethod('post')) {
            $validator = Validator::make($request->all(),[
                'name'=>'required|min:6|max:30|alpha',
                'emai'=>'required|email',
                'username'=>'required|min:6|max:30|alpha',
                'password'=>'required|min:6|max:30',
                // 'avatar'=>'required|mimes:.jpg,.jpeg,.png,.gif|max:10000',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                 ->withErrors($validator)
                                 ->withInput();
            }
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $destination_Path = public_path('images/avatar');
                $file_name = time().'_'.$file->getClientOriginalName(); 
                $file->move($destination_Path, $file_name);
            } else {
                $file_name = 'noname.jpg';
            }
            $user = DB::table('users')->where('email', $request->email)->first();
            if (!($user)) {
                $newUser = new User();
                $newUser->name = $request->name;
                $newUser->email = $request->email;
                $newUser->username = $request->username;
                $newUser->password = $request->password;
                $newUser->birthday = $request->birthday;
                $newUser->avatar = $request->$file_name;
                $newUser->role = $request->role;
                $newUser -> save();
                return redirect()->route('admin.user.create')->with('message','Add User SuccessFully!');
            } else {
                return redirect()->route('admin.user.create')->with('message','Add User Not SuccessFully!');
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