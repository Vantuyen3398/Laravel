<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
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
                'name'=>'required|min:6|max:255|alpha',
                'email'=>'required|email|max:255',
                'username'=>'required|min:6|max:255|alpha',
                'password'=>'required|min:8|max:255',
                'avatar'=>'required|image|mimes:jpg,jpeg,png,gif|mimetypes:image/jpg,image/jpeg,image/png,image/gif|max:10000',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                 ->withErrors($validator)
                                 ->withInput();
            }
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $destination_Path = public_path('backend/images/avatar');
                $file_name = time().'_'.$file->getClientOriginalName(); 
                $file->move($destination_Path, $file_name);
            } else {
                $file_name = 'noname.jpg';
            }
            $user = DB::table('users')->where('email', $request->email)->first();
            if (!$user) {
                $newUser = new User();
                $newUser->name = $request->name;
                $newUser->email = $request->email;
                $newUser->username = $request->username;
                $newUser->password = $request->password;
                $newUser->birthday = $request->birthday;
                $newUser->avatar = $file_name;
                $newUser->role = $request->role;
                $newUser->save();
                return redirect()->route('admin.user.create')->with('message','Add User SuccessFully!');
            } else {
                return redirect()->route('admin.user.create')->with('message','Your Email existed, User can not be created');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = User::paginate(5);
        return view('admin.user.list_users',['users'=>$data]);
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
