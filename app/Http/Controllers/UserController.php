<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
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
        $this->validate($request, [
            'name'=> ['required'],
            'email' => ['required', Rule::unique('users','email')->whereNull('deleted_at')],
            'password'=> ['required'],
            'type'=> ['required'],
            'phone'=> ['required'],
            'category'=> ['required'],
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => strtolower(trim($request->input('email'))),
            'password' => Hash::make($request->input('password')),
            'type' => $request->input('type'),
            'phone' => $request->input('phone'),
            'category' => $request->input('category'),
        ];
        $user = User::create($data);
        return redirect()->route('user.list')->with('success','User is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $users = User::find($id);
        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name'=> ['required'],
            'email' => ['required'],
            'type'=> ['required'],
            'phone'=> ['required'],
            'category'=> ['required'],
        ]);

        $user = User::find($id);

        $user->name =  $request->input('name');
        $user->email =  strtolower(trim($request->input('email')));
        $user->type =  $request->input('type');
        $user->phone =  $request->input('phone');

        if($request->input('password')){
            $pass = $request->input('password');
            $user->password =  Hash::make($request->input('password'));
        }

        $user->save();
        return redirect()->route('user.list')->with('success','User is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        dd($id);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.list');
    }
}
